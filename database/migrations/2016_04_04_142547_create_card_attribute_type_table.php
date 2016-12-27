<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAttributeTypeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_attribute_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_type_id')->unsigned();
            $table->integer('card_attribute_id')->unsigned();
            $table->integer('position');
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('card_type_id')->references('id')->on('card_types');
            $table->foreign('card_attribute_id')->references('id')->on('card_attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('card_attribute_types', function ($table) {
            if (Schema::hasColumn('card_attribute_types', 'card_type_id')) {
                $table->dropForeign('card_attribute_types_card_type_id_foreign');
            }
            if (Schema::hasColumn('card_attribute_types', 'card_attribute_id')) {
                $table->dropForeign('card_attribute_types_card_attribute_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('card_attribute_types');
    }
}
