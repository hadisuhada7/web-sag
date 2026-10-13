<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApkFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apk_files', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('version', 50);
            $table->date('release_date');
            $table->string('file_name');            // nama file asli, dipakai saat download
            $table->string('file_path');            // path relatif di disk "local" (storage/app)
            $table->unsignedBigInteger('file_size')->default(0);
            $table->boolean('publish')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apk_files');
    }
}
