<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\CardAssociation;

class CreateCardAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_associations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id');
            $table->integer('card_attribute_id');
            $table->text('value');
            $table->timestamps();
        });

        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 1,
            'value' => 'Tarik Haimar',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 6,
            'value' => 'petit test',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 23,
            'value' => 'test',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 27,
            'value' => 'aujourd hui',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 28,
            'value' => 'A+',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 29,
            'value' => 'sherbrooke',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 30,
            'value' => 'pas de remarque',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 31,
            'value' => 'Tarik Haimar',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 32,
            'value' => 'Le titre inédit',
        ]);
        CardAssociation::create([
            'card_id' => 1,
            'card_attribute_id' => 33,
            'value' => 'udes',
        ]);
        CardAssociation::create([
            'card_id' => 2,
            'card_attribute_id' => 1,
            'value' => 'haimarHTarik',
        ]);
        CardAssociation::create([
            'card_id' => 2,
            'card_attribute_id' => 2,
            'value' => '354',
        ]);
        CardAssociation::create([
            'card_id' => 2,
            'card_attribute_id' => 3,
            'value' => 'type à part',
        ]);
        CardAssociation::create([
            'card_id' => 2,
            'card_attribute_id' => 4,
            'value' => 'aujourd hui',
        ]);
        CardAssociation::create([
            'card_id' => 2,
            'card_attribute_id' => 5,
            'value' => 'grand épaisseur',
        ]);
        CardAssociation::create([
            'card_id' => 2,
            'card_attribute_id' => 6,
            'value' => 'aucune valeur',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('card_associations');
    }
}
