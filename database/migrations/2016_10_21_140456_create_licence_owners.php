<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceOwners extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('enterprise');
            $table->string('email');
            $table->string('address');
            $table->string('town');
            $table->string('postal_code');
            $table->string('province');
            $table->string('country');
            $table->string('phone');
            $table->timestamps();
        });

        // FOREIGN KEY
        Schema::table('transactions', function ($table) {
            $table->foreign('licence_owner_id')->references('id')->on('licence_owners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('transactions', function ($table) {
            if (Schema::hasColumn('transactions', 'licence_owner_id')) {
                $table->dropForeign('transactions_licence_owner_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('licence_owners');
    }
}
