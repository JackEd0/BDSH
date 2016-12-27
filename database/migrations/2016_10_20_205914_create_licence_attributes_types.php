<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceAttributesTypes extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licence_attributes_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('licence_type_id')->unsigned();
            $table->integer('licence_attribute_id')->unsigned();
            $table->timestamps();

            // FOREIGN KEY 
            $table->foreign('licence_type_id')->references('id')->on('licence_types');
            $table->foreign('licence_attribute_id')->references('id')->on('licence_attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // DELETE FOREIGN KEY
        Schema::table('licence_attributes_types', function ($table) {
            if (Schema::hasColumn('licence_attributes_types', 'licence_type_id')) {
                $table->dropForeign('licence_attributes_types_licence_type_id_foreign');
            }
            if (Schema::hasColumn('licence_attributes_types', 'licence_attribute_id')) {
                $table->dropForeign('licence_attributes_types_licence_attribute_id_foreign');
            }
        });
        // DROP TABLE
        Schema::drop('licence_attributes_types');
    }
}
