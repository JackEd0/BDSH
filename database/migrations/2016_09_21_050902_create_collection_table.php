<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->boolean('state');
            $table->timestamps();
        });

        // FOREIGN KEY 
        Schema::table('cards', function ($table) {
            $table->foreign('collection_id')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('cards', function ($table) {
            if (Schema::hasColumn('cards', 'collection_id')) {
                $table->dropForeign('cards_collection_id_foreign');
            }
        });
        Schema::drop('collections');
    }
}
