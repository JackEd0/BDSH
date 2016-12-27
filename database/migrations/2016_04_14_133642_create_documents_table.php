<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->integer('card_id')->unsigned();
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('documents', function ($table) {
            if (Schema::hasColumn('documents', 'card_id')) {
                $table->dropForeign('documents_card_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('documents');
    }
}
