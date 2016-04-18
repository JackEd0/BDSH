<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\CardType;

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

        CardType::create([
            'name_fr' => 'Archives',
            'name_en' => 'Archives',
        ]);
        CardType::create([
            'name_fr' => 'Audiovisuels',
            'name_en' => 'Audiovisuals',
        ]);
        CardType::create([
            'name_fr' => 'Bibliothèque',
            'name_en' => 'Library',
        ]);
        CardType::create([
            'name_fr' => 'Cartes',
            'name_en' => 'Maps',
        ]);
        CardType::create([
            'name_fr' => 'Images',
            'name_en' => 'Pictures',
        ]);
        CardType::create([
            'name_fr' => 'Périodiques',
            'name_en' => 'Periodicals',
        ]);
        CardType::create([
            'name_fr' => 'Sonores',
            'name_en' => 'Sounds',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('card_types');
    }
}
