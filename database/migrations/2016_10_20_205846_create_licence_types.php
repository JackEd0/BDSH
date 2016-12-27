<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceTypes extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr');
            $table->string('name_en');
            $table->timestamps();
        });

        // FOREIGN KEY 
        Schema::table('transactions', function ($table) {
            $table->foreign('licence_type_id')->references('id')->on('licence_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('transactions', function ($table) {
            if (Schema::hasColumn('transactions', 'licence_type_id')) {
                $table->dropForeign('transactions_licence_type_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('licence_types');
    }
}
