<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\UserType;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('userTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr');
            $table->string('name_en');
            $table->timestamps();
        });

        UserType::create([
            'name_fr'=>'Administrateur',
            'name_en'=>'Administrator',
        ]);
        UserType::create([
            'name_fr'=>'Employé',
            'name_en'=>'Employee',
        ]);
        UserType::create([
            'name_fr'=>'Employé +',
            'name_en'=>'Employee +',
        ]);
        UserType::create([
            'name_fr'=>'Client',
            'name_en'=>'Client',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('userTypes');
    }
}
