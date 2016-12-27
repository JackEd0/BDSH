<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternalParametersTable extends Migration
{
    public function up()
    {
        Schema::create('external_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 250);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('external_parameters');
    }
}