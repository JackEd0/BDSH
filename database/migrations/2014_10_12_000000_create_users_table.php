<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('firstName');
            $table->string('email')->unique();
            $table->string('password', 300);
            $table->string('address');
            $table->string('town');
            $table->string('postalCode');
            $table->string('province');
            $table->string('country');
            $table->string('phone');
            $table->tinyInteger('active');
            $table->boolean('confirmed');
            $table->integer('user_type_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
