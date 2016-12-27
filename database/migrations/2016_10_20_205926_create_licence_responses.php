<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceResponses extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('licence_attribute_id')->unsigned();
            $table->text('value');
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('licence_attribute_id')->references('id')->on('licence_attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('licence_responses', function ($table) {
            if (Schema::hasColumn('licence_responses', 'transaction_id')) {
                $table->dropForeign('licence_responses_transaction_id_foreign');
            }
            if (Schema::hasColumn('licence_responses', 'licence_attribute_id')) {
                $table->dropForeign('licence_responses_licence_attribute_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('licence_responses');
    }
}
