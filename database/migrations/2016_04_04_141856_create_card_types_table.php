<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr');
            $table->string('name_en');
            $table->timestamps();
        });

        // FOREIGN KEY 
        Schema::table('cards', function ($table) {
            $table->foreign('card_type_id')->references('id')->on('card_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('cards', function ($table) {
            if (Schema::hasColumn('cards', 'card_type_id')) {
                $table->dropForeign('cards_card_type_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('card_types');
    }
}
