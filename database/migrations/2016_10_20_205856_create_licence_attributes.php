<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceAttributes extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr')->unique();
            $table->string('name_en')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('licence_attributes');
    }
}
