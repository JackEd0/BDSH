<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CardAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('card_attributes')->insert([
            'name_fr' => 'Donateur',
            'name_en' => 'Donor',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro d\'article',
            'name_en' => 'Article Number',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Titre type',
            'name_en' => 'Title Type',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date',
            'name_en' => 'Date',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Épaisseur',
            'name_en' => 'Thickness',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Description',
            'name_en' => 'Description',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Catégorie production',
            'name_en' => 'Production Category',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Consultation',
            'name_en' => 'Consultation',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Chronométrage',
            'name_en' => 'Timing',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Couleur',
            'name_en' => 'Color',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Code support',
            'name_en' => 'Support Code',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date production',
            'name_en' => 'Production Date',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Durée',
            'name_en' => 'Length',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'État document',
            'name_en' => 'Document State',
            'hide_if_empty' => 0,
            'user_permit_level' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Localisation',
            'name_en' => 'Location',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro du document',
            'name_en' => 'Document Number',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Notes',
            'name_en' => 'Notes',
            'hide_if_empty' => 1,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Responsabilité',
            'name_en' => 'Responsability',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Retranscription',
            'name_en' => 'Transcription',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Son integré',
            'name_en' => 'Integrated sound',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Sujet principal',
            'name_en' => 'Main subject',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Sujets',
            'name_en' => 'Subjects',
            'hide_if_empty' => 1,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Lieux',
            'name_en' => 'Places',
            'hide_if_empty' => 1,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Personnages',
            'name_en' => 'Figures',
            'hide_if_empty' => 1,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date d\'édition',
            'name_en' => 'Edition date',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Cote',
            'name_en' => 'Cote',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Lieu d\'édition',
            'name_en' => 'Edition Place',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Remarques',
            'name_en' => 'Remarks',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Auteur',
            'name_en' => 'Author',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Titre',
            'name_en' => 'Title',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Éditeur',
            'name_en' => 'Publisher',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Territoire',
            'name_en' => 'Territory',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Nombre d\'exemplaires',
            'name_en' => 'Number of Copies',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Échelle',
            'name_en' => 'Scale',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Dimension',
            'name_en' => 'Dimension',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date de création',
            'name_en' => 'Creation date',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro volume',
            'name_en' => 'Volume Number',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Table des matières',
            'name_en' => 'Table of Contents',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Édition',
            'name_en' => 'Edition',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'ISSN',
            'name_en' => 'ISSN',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Compagnie production',
            'name_en' => 'Production Company',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Categorie',
            'name_en' => 'Category',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Interprète',
            'name_en' => 'interpreter',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro de compagnie',
            'name_en' => 'Company Number',
            'hide_if_empty' => 0,
            'user_permit_level' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro du négatif',
            'name_en' => 'Negative Number',
            'hide_if_empty' => 0,
            'user_permit_level' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
