<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\User;

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
            $table->increments('id'); //la migration n'a pas pu inserer certaines données pr username, firtName
            $table->string('username'); // devrait être unique ->unique();
            $table->string('name');
            $table->string('firstName');
            $table->integer('user_type_id');
            $table->string('password',300);
            $table->string('email');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'username'=>'John',
            'password'=>Hash::make('admin'),
            'email'=>'jony@gmail.com',
            'name'=>'Jony',
            'firstName'=>'Boy',
            'user_type_id'=>1,
        ]);
        User::create([
            'username'=>'Edgar',
            'password'=>Hash::make('admin'),
            'email'=>'inas@gmail.com',
            'name'=>'Inas',
            'firstName'=>'BB',
            'user_type_id'=>2,
        ]);
        User::create([
            'username'=>'Pedro',
            'password'=>Hash::make('admin'),
            'email'=>'pedro@gmail.com',
            'name'=>'Jean',
            'firstName'=>'Bon',
            'user_type_id'=>3,
        ]);
        User::create([
            'username'=>'Romeo',
            'password'=>Hash::make('admin'),
            'email'=>'romi@gmail.com',
            'name'=>'Romy',
            'firstName'=>'Don',
            'user_type_id'=>3,
        ]);
        User::create([
            'username'=>'Donald',
            'password'=>Hash::make('admin'),
            'email'=>'dodo@gmail.com',
            'name'=>'Don',
            'firstName'=>'Trum',
            'user_type_id'=>3,
        ]);
        User::create([
            'username'=>'Bara',
            'password'=>Hash::make('admin'),
            'email'=>'baba@gmail.com',
            'name'=>'Bar',
            'firstName'=>'Ack',
            'user_type_id'=>3,
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
