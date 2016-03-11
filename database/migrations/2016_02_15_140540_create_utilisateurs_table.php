<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\Utilisateur;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('firstName');
            $table->integer('userType_id');
            $table->string('password',300);
            $table->string('email');
            $table->integer('userType_id');
            $table->rememberToken();
            $table->timestamps();
        });
        Utilisateur::create([
           'username'=>'Jony',
            'password'=>Hash::make('admin'),
            'email'=>'jony@gmail.com',
            'name'=>'Jony',
            'firstName'=>'Boy',
            'userType_id'=>1,
        ]);
        Utilisateur::create([
            'username'=>'Inas',
            'password'=>Hash::make('admin'),
            'email'=>'inas@gmail.com',
            'name'=>'Inas',
            'firstName'=>'BB',
            'userType_id'=>2,
        ]);
        Utilisateur::create([
            'username'=>'Pedro',
            'password'=>Hash::make('admin'),
            'email'=>'pedro@gmail.com',
            'name'=>'Jean',
            'firstName'=>'Bon',
            'userType_id'=>3,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('utilisateurs');
    }
}
