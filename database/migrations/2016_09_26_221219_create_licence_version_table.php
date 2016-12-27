<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceVersionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_versions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('licence_versions');
    }
}
