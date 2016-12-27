<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CardAttributeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');

        //Donateur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 1,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 1,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 1,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //No article
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 2,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Titre type
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 3,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Date
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 4,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 4,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Epaisseur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 5,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Description
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 6,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 6,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 6,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 6,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Categorie production
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 7,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Consultation
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 8,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 8,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //Chronometrage
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 9,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 9,
            'position' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Couleur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 10,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 10,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 10,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //Code support
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 11,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 11,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //Date production
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 12,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 12,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Duree
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 13,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 13,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Etat document
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 14,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 14,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Localisation
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 15,
            'position' => 9,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 15,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 15,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 15,
            'position' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 15,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //No document
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 16,
            'position' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 16,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 16,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Note
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 17,
            'position' => 11,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 17,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Responsabilite
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 18,
            'position' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 18,
            'position' => 19,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Retranscription
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 19,
            'position' => 13,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 19,
            'position' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Son integre
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 20,
            'position' => 14,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Sujet principal
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 21,
            'position' => 15,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 21,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 21,
            'position' => 11,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Sujets
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 1,
            'card_attribute_id' => 22,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 22,
            'position' => 16,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 22,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 22,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Lieux
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 23,
            'position' => 17,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Personnages
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 2,
            'card_attribute_id' => 24,
            'position' => 18,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 24,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Date édition
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 25,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Cote
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 26,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 26,
            'position' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Lieu d'edition
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 27,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Remarques
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 28,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 28,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Auteur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 29,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 29,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Titre
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 30,
            'position' => 9,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 30,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 30,
            'position' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Editeur
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 3,
            'card_attribute_id' => 31,
            'position' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Territoire
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 32,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Nombre d'exemplaire
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 33,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Echelle
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 34,
            'position' => 9,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Dimension
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 4,
            'card_attribute_id' => 35,
            'position' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Date creation
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 36,
            'position' => 9,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Numero volume
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 37,
            'position' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Table des matieres
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 38,
            'position' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Edition
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 39,
            'position' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //ISSN
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 6,
            'card_attribute_id' => 40,
            'position' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Compagnie production
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 41,
            'position' => 14,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        // Categorie
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 42,
            'position' => 15,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Interprete
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 43,
            'position' => 16,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Numero compagnie
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 7,
            'card_attribute_id' => 44,
            'position' => 17,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        //Numero de négatif
        DB::table('card_attribute_types')->insert([
            'card_type_id' => 5,
            'card_attribute_id' => 45,
            'position' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
