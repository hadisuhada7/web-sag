<?php

namespace Tests\Feature;

use App\Models\CSR;
use App\Models\News;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CsrDetailViewCountTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
        DB::purge();

        foreach (['csr', 'news'] as $tableName) {
            Schema::create($tableName, function (Blueprint $table) use ($tableName) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('thumbnail')->nullable();
                $table->string('releasedate')->nullable();
                $table->text('content')->nullable();
                $table->integer('viewer')->default(0);
                $table->string('mode')->nullable();
                if ($tableName === 'news') {
                    $table->string('author')->nullable();
                }
                $table->boolean('publish')->default(0);
                $table->timestamps();
            });
        }
    }

    public function test_opening_news_detail_increments_its_view_count()
    {
        $news = News::create([
            'title' => 'News Title',
            'thumbnail' => 'news-thumbnail',
            'mode' => 'news',
            'releasedate' => '2024-01-01',
        ]);

        $this->get('/csr/getDetail?mode=news&slug=news-title')
            ->assertOk()
            ->assertSee('>1</a>', false);

        $this->assertSame(1, $news->fresh()->viewer);
    }

    public function test_opening_csr_detail_increments_its_view_count()
    {
        $csr = CSR::create([
            'title' => 'CSR Title',
            'thumbnail' => 'csr-thumbnail',
            'mode' => 'sosial',
            'releasedate' => '2024-01-01',
        ]);

        $this->get('/csr/getDetail?mode=sosial&slug=csr-title')
            ->assertOk()
            ->assertSee('>1</a>', false);

        $this->assertSame(1, $csr->fresh()->viewer);
    }
}
