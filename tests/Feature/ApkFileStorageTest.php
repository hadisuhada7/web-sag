<?php

namespace Tests\Feature;

use App\Models\ApkFile;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ApkFileStorageTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'app.key'  => 'base64:' . base64_encode(str_repeat('k', 32)),
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
        DB::purge();

        require_once database_path('migrations/2026_10_13_000001_create_apk_files_table.php');
        (new \CreateApkFilesTable())->up();

        Storage::fake('local');
    }

    private function makeApk($name = 'app.apk', $content = null)
    {
        return UploadedFile::fake()->createWithContent($name, $content ?? ("PK\x03\x04" . str_repeat('x', 2048)));
    }

    private function admin()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'Admin';
        $user->email = 'admin@example.test';

        return $user;
    }

    private function createRecord(array $override = [])
    {
        Storage::disk('local')->put('apk/test.apk', "PK\x03\x04dummy");

        return ApkFile::create(array_merge([
            'app_name'     => 'SAG Contract Farming',
            'version'      => '3.0.0',
            'release_date' => '2026-05-01',
            'file_name'    => 'sag-cf.apk',
            'file_path'    => 'apk/test.apk',
            'file_size'    => 2048,
            'publish'      => 1,
        ], $override));
    }

    public function test_public_page_lists_only_published_apk()
    {
        $this->createRecord();
        $this->createRecord(['app_name' => 'Hidden App', 'publish' => 0]);

        $response = $this->get('/file-storage');

        $response->assertStatus(200);
        $response->assertSee('SAG Contract Farming');
        $response->assertSee('3.0.0');
        $response->assertSee('01-05-2026');
        $response->assertDontSee('Hidden App');
    }

    public function test_published_apk_can_be_downloaded()
    {
        $apk = $this->createRecord();

        $response = $this->get('/file-storage/download/' . $apk->id);

        $response->assertStatus(200);
        $response->assertHeader('content-disposition');
        $this->assertStringContainsString('sag-cf.apk', $response->headers->get('content-disposition'));
    }

    public function test_unpublished_apk_cannot_be_downloaded()
    {
        $apk = $this->createRecord(['publish' => 0]);

        $this->get('/file-storage/download/' . $apk->id)->assertStatus(404);
    }

    public function test_admin_routes_require_login()
    {
        $this->get('/wongelek/file-storage')->assertRedirect();
        $this->post('/wongelek/file-storage/save', [])->assertRedirect();
    }

    public function test_admin_can_upload_apk()
    {
        $response = $this->actingAs($this->admin())->post('/wongelek/file-storage/save', [
            'app_name'     => 'SAG AMS',
            'version'      => '1.2.3',
            'release_date' => '2026-10-13',
            'publish'      => 1,
            'apk'          => $this->makeApk('SAG AMS v1.2.3.apk'),
        ]);

        $response->assertJson(['code' => 200]);

        $apk = ApkFile::first();
        $this->assertNotNull($apk);
        $this->assertSame('SAG AMS', $apk->app_name);
        $this->assertSame('1.2.3', $apk->version);
        $this->assertSame('SAG-AMS-v1.2.3.apk', $apk->file_name);
        $this->assertTrue($apk->publish);
        Storage::disk('local')->assertExists($apk->file_path);
    }

    public function test_admin_rejects_non_apk_extension()
    {
        $response = $this->actingAs($this->admin())->post('/wongelek/file-storage/save', [
            'app_name'     => 'Bad',
            'version'      => '1',
            'release_date' => '2026-10-13',
            'apk'          => UploadedFile::fake()->createWithContent('payload.php', "PK\x03\x04xx"),
        ]);

        $response->assertJson(['code' => 0]);
        $this->assertSame(0, ApkFile::count());
    }

    public function test_admin_rejects_renamed_non_zip_file()
    {
        $response = $this->actingAs($this->admin())->post('/wongelek/file-storage/save', [
            'app_name'     => 'Bad',
            'version'      => '1',
            'release_date' => '2026-10-13',
            'apk'          => $this->makeApk('fake.apk', '<?php echo 1;'),
        ]);

        $response->assertJson(['code' => 0]);
        $this->assertSame(0, ApkFile::count());
    }

    public function test_admin_requires_file_on_create()
    {
        $response = $this->actingAs($this->admin())->post('/wongelek/file-storage/save', [
            'app_name'     => 'No File',
            'version'      => '1',
            'release_date' => '2026-10-13',
        ]);

        $response->assertJson(['code' => 0]);
        $this->assertSame(0, ApkFile::count());
    }

    public function test_admin_can_edit_without_replacing_file_and_replace_deletes_old_file()
    {
        $apk = $this->createRecord();
        $id = encrypt($apk->id);

        // Edit metadata saja: file tetap.
        $this->actingAs($this->admin())->post('/wongelek/file-storage/save', [
            'id'           => $id,
            'app_name'     => 'Renamed',
            'version'      => '3.0.1',
            'release_date' => '2026-06-01',
            'publish'      => 1,
        ])->assertJson(['code' => 200]);

        $apk->refresh();
        $this->assertSame('Renamed', $apk->app_name);
        $this->assertSame('apk/test.apk', $apk->file_path);
        Storage::disk('local')->assertExists('apk/test.apk');

        // Ganti file: file lama terhapus.
        $this->actingAs($this->admin())->post('/wongelek/file-storage/save', [
            'id'           => $id,
            'app_name'     => 'Renamed',
            'version'      => '3.0.2',
            'release_date' => '2026-06-02',
            'publish'      => 1,
            'apk'          => $this->makeApk('new.apk'),
        ])->assertJson(['code' => 200]);

        $apk->refresh();
        $this->assertNotSame('apk/test.apk', $apk->file_path);
        Storage::disk('local')->assertMissing('apk/test.apk');
        Storage::disk('local')->assertExists($apk->file_path);
    }

    public function test_admin_can_toggle_publish_and_remove()
    {
        $apk = $this->createRecord();
        $id = encrypt($apk->id);

        $this->actingAs($this->admin())->post('/wongelek/file-storage/publish/' . $id, ['publish' => 0])
            ->assertJson(['code' => 200]);
        $this->assertFalse($apk->fresh()->publish);

        $this->actingAs($this->admin())->post('/wongelek/file-storage/remove/' . $id)
            ->assertJson(['code' => 200]);
        $this->assertSame(0, ApkFile::count());
        Storage::disk('local')->assertMissing('apk/test.apk');
    }

    public function test_state_changing_admin_actions_reject_get()
    {
        $apk = $this->createRecord();
        $id = encrypt($apk->id);

        $this->actingAs($this->admin())->get('/wongelek/file-storage/remove/' . $id)->assertStatus(405);
        $this->actingAs($this->admin())->get('/wongelek/file-storage/publish/' . $id)->assertStatus(405);
    }
}
