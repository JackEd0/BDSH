<?php

use Illuminate\Database\Seeder;

class CardAttributeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Donateur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 1,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 1,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 1,
        ]);
        //No article
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 2,
        ]);
        //Titre type
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 3,
        ]);
        //Date
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 4,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 4,
        ]);
        //Epaisseur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 5,
        ]);
        //Description
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 6,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 6,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 6,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 6,
        ]);
        //Categorie production
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 7,
        ]);
        //Cote du fond
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 8,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 8,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 8,
        ]);
        //Couleur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 9,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 9,
        ]);
        //Chronometrage
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 10,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 10,
        ]);
        //Consultation
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 11,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 11,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 11,
        ]);
        //Code support
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 12,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 12,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 12,
        ]);
        //Date production
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 13,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 13,
        ]);
        //Duree
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 14,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 14,
        ]);
        //Etat document
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 15,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 15,
        ]);
        //Localisation
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 16,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 16,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 16,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 16,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 16,
        ]);
        //No document
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 17,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 17,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 17,
        ]);
        //Note
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 18,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 18,
        ]);
        //Responsabilite
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 19,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 19,
        ]);
        //Retranscription
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 20,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 20,
        ]);
        //Son integre
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 21,
        ]);
        //Sujet principal
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 22,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 22,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 22,
        ]);
        //Sujets
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 23,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 23,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 23,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 23,
        ]);
        //Titre du fond
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 24,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 24,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 24,
        ]);
        //Lieux
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 25,
        ]);
        //Personnages
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 26,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 26,
        ]);
        //Date édition
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 27,
        ]);
        //Cote
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 28,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 28,
        ]);
        //Lieu d'edition
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 29,
        ]);
        //Remarques
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 30,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 30,
        ]);
        //Auteur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 31,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 31,
        ]);
        //Titre
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 32,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 32,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 32,
        ]);
        //Editeur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 33,
        ]);
        //Territoire
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 34,
        ]);
        //Nombre d'exemplaire
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 35,
        ]);
        //Echelle
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 36,
        ]);
        //Dimension
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 37,
        ]);
        //Date creation
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 38,
        ]);
        //Numero volume
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 39,
        ]);
        //Table des matieres
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 40,
        ]);
        //Edition
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 41,
        ]);
        //ISSN
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 42,
        ]);
        //Compagnie production
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 43,
        ]);
        // Categorie
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 44,
        ]);
        //Interprete
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 45,
        ]);
        //Numero compagnie
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 46,
        ]);
    }
}
