<?php

use Illuminate\Database\Seeder;

class CardAttributesTableSeeder extends Seeder
{
    public $dateTime = null;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->dateTime = new DateTime();
        DB::table('card_attributes')->insert([
            'name_fr' => 'Donateur',
            'name_en' => 'Donor',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro d\'article',
            'name_en' => 'Article Number',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Titre type',
            'name_en' => 'Title Type',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date',
            'name_en' => 'Date',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Épaisseur',
            'name_en' => 'Thickness',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Description',
            'name_en' => 'Description',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Catégorie production',
            'name_en' => 'Production Category',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Cote du fonds',
            'name_en' => 'Collection cote',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Consultation',
            'name_en' => 'Consultation',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Chronométrage',
            'name_en' => 'Timing',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Couleur',
            'name_en' => 'Color',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Code support',
            'name_en' => 'Support Code',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date production',
            'name_en' => 'Production Date',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Durée',
            'name_en' => 'Length',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'État document',
            'name_en' => 'Document State',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Localisation',
            'name_en' => 'Location',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro du document',
            'name_en' => 'Document Number',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Notes',
            'name_en' => 'Notes',
            'hideIfEmpty' => 1,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Responsabilité',
            'name_en' => 'Responsability',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Retranscription',
            'name_en' => 'Transcription',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Son integré',
            'name_en' => 'Integrated sound',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Sujet principal',
            'name_en' => 'Main subject',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Sujets',
            'name_en' => 'Subjects',
            'hideIfEmpty' => 1,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Titre du fonds',
            'name_en' => 'Collection title',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Lieux',
            'name_en' => 'Places',
            'hideIfEmpty' => 1,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Personnages',
            'name_en' => 'Figures',
            'hideIfEmpty' => 1,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date d\'édition',
            'name_en' => 'Edition date',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Cote',
            'name_en' => 'Cote',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Lieu d\'édition',
            'name_en' => 'Edition Place',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Remarques',
            'name_en' => 'Remarks',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Auteur',
            'name_en' => 'Author',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Titre',
            'name_en' => 'Title',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Éditeur',
            'name_en' => 'Publisher',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Territoire',
            'name_en' => 'Territory',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Nombre d\'exemplaires',
            'name_en' => 'Number of Copies',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Échelle',
            'name_en' => 'Scale',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Dimension',
            'name_en' => 'Dimension',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Date de création',
            'name_en' => 'Creation date',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro volume',
            'name_en' => 'Volume Number',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Table des matières',
            'name_en' => 'Table of Contents',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Édition',
            'name_en' => 'Edition',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'ISSN',
            'name_en' => 'ISSN',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Compagnie production',
            'name_en' => 'Production Company',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Categorie',
            'name_en' => 'Category',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Interprète',
            'name_en' => 'interpreter',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro de compagnie',
            'name_en' => 'Company Number',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 4,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('card_attributes')->insert([
            'name_fr' => 'Numéro du négatif',
            'name_en' => 'Negative Number',
            'hideIfEmpty' => 0,
            'userPermitLevel' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
    }
}
