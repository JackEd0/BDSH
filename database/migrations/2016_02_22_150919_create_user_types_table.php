<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr');
            $table->string('name_en');
            $table->timestamps();
        });

        // FOREIGN KEY 
        Schema::table('users', function ($table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('users', function ($table) {

            if (Schema::hasColumn('users', 'user_type_id')) {
                $table->dropForeign('users_user_type_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('user_types');
    }
}
