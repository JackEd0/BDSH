<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAttributesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr')->unique();
            $table->string('name_en')->unique();
            $table->tinyInteger('hide_if_empty');
            $table->tinyInteger('user_permit_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('card_attributes');
    }
}
