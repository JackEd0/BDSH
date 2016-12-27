<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchHistoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('search_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('search_history', function ($table) {
            if (Schema::hasColumn('search_history', 'user_id')) {
                $table->dropForeign('search_history_user_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('search_history');
    }
}
