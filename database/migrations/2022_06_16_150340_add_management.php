<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('photo')->nullable();
            $table->integer('order')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('management');
    }
}
