<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceFees extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->float('tvq');
            $table->float('tps');
            $table->float('admin');
            $table->float('private_use');
            $table->float('public_use');
            $table->timestamps();
        });

        // FOREIGN KEY
        Schema::table('transactions', function ($table) {
            $table->foreign('licence_fee_id')->references('id')->on('licence_fees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('transactions', function ($table) {
            if (Schema::hasColumn('transactions', 'licence_fee_id')) {
                $table->dropForeign('transactions_licence_fee_id_foreign');
            }
        });
        Schema::drop('licence_fees');
    }
}
