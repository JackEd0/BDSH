<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_associations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('card_attribute_id')->unsigned();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // FOREIGN KEY 
        Schema::table('card_associations', function ($table) {
            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('card_attribute_id')->references('id')->on('card_attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('card_associations', function ($table) {
            if (Schema::hasColumn('card_associations', 'card_id')) {
                $table->dropForeign('card_associations_card_id_foreign');
            }
            if (Schema::hasColumn('card_associations', 'card_attribute_id')) {
                $table->dropForeign('card_associations_card_attribute_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('card_associations');
    }
}
