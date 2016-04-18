<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\CardAttributeType;

class CreateCardAttributeTypeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_attribute_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_type_id');
            $table->integer('card_attribute_id');
            $table->timestamps();
        });

        //Donateur
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 1,
        ]);

        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 1,
        ]);

        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 1,
        ]);
        //No article
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 2,
        ]);
        //Titre type
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 3,
        ]);
        //Date
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 4,
        ]);

        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 4,
        ]);
        //Epaisseur
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 5,
        ]);
        //Description
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 6,
        ]);

        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 6,
        ]);

        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 6,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 6,
        ]);
        //Categorie production
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 7,
        ]);
        //Cote du fond
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 8,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 8,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 8,
        ]);
        //Couleur
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 9,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 9,
        ]);
        //Chronometrage
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 10,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 10,
        ]);
        //Consultation
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 11,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 11,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 11,
        ]);
        //Code support
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 12,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 12,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 12,
        ]);
        //Date production
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 13,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 13,
        ]);
        //Duree
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 14,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 14,
        ]);
        //Etat document
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 15,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 15,
        ]);
        //Localisation
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 16,
        ]);

        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 16,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 16,
        ]);

        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 16,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 16,
        ]);
        //No document
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 17,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 17,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 17,
        ]);
        //Note
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 18,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 18,
        ]);
        //Responsabilite
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 19,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 19,
        ]);
        //Retranscription
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 20,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 20,
        ]);
        //Son integre
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 21,
        ]);
        //Sujet principal
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 22,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 22,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 22,
        ]);
        //Sujets
        CardAttributeType::create([
            'card_type_id' => 1,
            'card_attribute_id' => 23,
        ]);

        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 23,
        ]);

        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 23,
        ]);

        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 23,
        ]);
        //Titre du fond
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 24,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 24,
        ]);

        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 24,
        ]);
        //Lieux
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 25,
        ]);
        //Personnages
        CardAttributeType::create([
            'card_type_id' => 2,
            'card_attribute_id' => 26,
        ]);

        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 26,
        ]);
        //Date édition
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 27,
        ]);
        //Cote
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 28,
        ]);

        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 28,
        ]);
        //Lieu d'edition
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 29,
        ]);
        //Remarques
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 30,
        ]);

        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 30,
        ]);
        //Auteur
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 31,
        ]);

        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 31,
        ]);
        //Titre
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 32,
        ]);

        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 32,
        ]);

        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 32,
        ]);
        //Editeur
        CardAttributeType::create([
            'card_type_id' => 3,
            'card_attribute_id' => 33,
        ]);
        //Territoire
        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 34,
        ]);
        //Nombre d'exemplaire
        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 35,
        ]);
        //Echelle
        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 36,
        ]);
        //Dimension
        CardAttributeType::create([
            'card_type_id' => 4,
            'card_attribute_id' => 37,
        ]);
        //Date creation
        CardAttributeType::create([
            'card_type_id' => 5,
            'card_attribute_id' => 38,
        ]);
        //Numero volume
        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 39,
        ]);
        //Table des matieres
        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 40,
        ]);
        //Edition
        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 41,
        ]);
        //ISSN
        CardAttributeType::create([
            'card_type_id' => 6,
            'card_attribute_id' => 42,
        ]);
        //Compagnie production
        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 43,
        ]);
        // Categorie
        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 44,
        ]);
        //Interprete
        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 45,
        ]);
        //Numero compagnie
        CardAttributeType::create([
            'card_type_id' => 7,
            'card_attribute_id' => 46,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('card_attribute_types');
    }
}
