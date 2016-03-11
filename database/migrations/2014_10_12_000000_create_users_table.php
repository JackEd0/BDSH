<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('firstName');
            $table->integer('userType_id');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
        \App\User::create([
            'username'=>'Jony',
            'email'=>'jony@gmail.com',
            'password'=>Hash::make('admin'),
        ]);
        \App\User::create([
            'username'=>'Bob',
            'email'=>'bob@gmail.com',
            'password'=>Hash::make('admin'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
