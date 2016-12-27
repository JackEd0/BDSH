<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentDownloads extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('document_downloads', function (Blueprint $table) {
            // Column
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->string('comment');
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('document_downloads', function ($table) {
            if (Schema::hasColumn('document_downloads', 'user_id')) {
                $table->dropForeign('document_downloads_user_id_foreign');
            }
            if (Schema::hasColumn('document_downloads', 'document_id')) {
                $table->dropForeign('document_downloads_document_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('document_downloads');
    }
}
