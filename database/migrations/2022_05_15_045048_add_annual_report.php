<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnnualReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annualreport', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('yearperiode')->nullable();
            $table->string('dated')->nullable();
            $table->string('thumbnailId')->nullable();
            $table->string('fileId')->nullable();
            $table->boolean('publish')->default(0);
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
        Schema::dropIfExists('annualreport');
    }
}
