<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTransactions extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned();
            $table->integer('transaction_id')->unsigned();
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('transactions_documents', function ($table) {
            if (Schema::hasColumn('transactions_documents', 'document_id')) {
                $table->dropForeign('transactions_documents_document_id_foreign');
            }
            if (Schema::hasColumn('transactions_documents', 'transaction_id')) {
                $table->dropForeign('transactions_documents_transaction_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('transactions_documents');
    }
}
