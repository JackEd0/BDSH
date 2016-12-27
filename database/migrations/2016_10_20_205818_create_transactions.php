<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            // Column
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('licence_type_id')->unsigned();
            $table->integer('licence_version_id')->unsigned();
            $table->integer('licence_fee_id')->unsigned();
            $table->integer('licence_owner_id')->unsigned()->nullable();
            $table->integer('price_type_id')->nullable();
            $table->dateTime('accepted_date')->nullable();
            $table->dateTime('refusal_date')->nullable();
            $table->dateTime('paid_date')->nullable();
            $table->text('comment_user');
            $table->text('comment_admin');
            $table->dateTime('cancelled_date')->nullable();
            $table->string('paypal_id', 250)->nullable();
            $table->string('payer_email', 250)->nullable();
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('licence_version_id')->references('id')->on('licence_versions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('transactions', function ($table) {
            if (Schema::hasColumn('transactions', 'user_id')) {
                $table->dropForeign('transactions_user_id_foreign');
            }
            if (Schema::hasColumn('transactions', 'licence_version_id')) {
                $table->dropForeign('transactions_licence_version_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('transactions');
    }
}
