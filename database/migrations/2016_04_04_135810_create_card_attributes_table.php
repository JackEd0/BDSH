<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\CardAttribute;

class CreateCardAttributesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('card_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fr');
            $table->string('name_en');
            $table->timestamps();
        });

        CardAttribute::create([
            'name_fr' => 'Donateur',
            'name_en' => 'Donor',
        ]);
        CardAttribute::create([
            'name_fr' => 'Numéro d\'article',
            'name_en' => 'Article Number',
        ]);
        CardAttribute::create([
            'name_fr' => 'Titre type',
            'name_en' => 'Title Type',
        ]);
        CardAttribute::create([
            'name_fr' => 'Date',
            'name_en' => 'Date',
        ]);
        CardAttribute::create([
            'name_fr' => 'Épaisseur',
            'name_en' => 'Thickness',
        ]);
        CardAttribute::create([
            'name_fr' => 'Description',
            'name_en' => 'Description',
        ]);
        CardAttribute::create([
            'name_fr' => 'Catégorie production',
            'name_en' => 'Production Category',
        ]);
        CardAttribute::create([
            'name_fr' => 'Cote du fonds',
            'name_en' => 'Collection cote',
        ]);
        CardAttribute::create([
            'name_fr' => 'Consultation',
            'name_en' => 'Consultation',
        ]);
        CardAttribute::create([
            'name_fr' => 'Chronométrage',
            'name_en' => 'Timing',
        ]);
        CardAttribute::create([
            'name_fr' => 'Couleur',
            'name_en' => 'Color',
        ]);
        CardAttribute::create([
            'name_fr' => 'Code support',
            'name_en' => 'Support Code',
        ]);
        CardAttribute::create([
            'name_fr' => 'Date production',
            'name_en' => 'Production Date',
        ]);
        CardAttribute::create([
            'name_fr' => 'Durée',
            'name_en' => 'Length',
        ]);
        CardAttribute::create([
            'name_fr' => 'État document',
            'name_en' => 'Document State',
        ]);
        CardAttribute::create([
            'name_fr' => 'Localisation',
            'name_en' => 'Location',
        ]);
        CardAttribute::create([
            'name_fr' => 'Numéro du document',
            'name_en' => 'Document Number',
        ]);
        CardAttribute::create([
            'name_fr' => 'Notes',
            'name_en' => 'Notes',
        ]);
        CardAttribute::create([
            'name_fr' => 'Responsabilité',
            'name_en' => 'Responsability',
        ]);
        CardAttribute::create([
            'name_fr' => 'Retranscription',
            'name_en' => 'Transcription',
        ]);
        CardAttribute::create([
            'name_fr' => 'Son integré',
            'name_en' => 'Integrated sound',
        ]);
        CardAttribute::create([
            'name_fr' => 'Sujet principal',
            'name_en' => 'Main subject',
        ]);
        CardAttribute::create([
            'name_fr' => 'Sujets',
            'name_en' => 'Subjects',
        ]);
        CardAttribute::create([
            'name_fr' => 'Titre du fonds',
            'name_en' => 'Collection title',
        ]);
        CardAttribute::create([
            'name_fr' => 'Lieux',
            'name_en' => 'Places',
        ]);
        CardAttribute::create([
            'name_fr' => 'Personnages',
            'name_en' => 'Figures',
        ]);
        CardAttribute::create([
            'name_fr' => 'Date d\'édition',
            'name_en' => 'Edition date',
        ]);
        CardAttribute::create([
            'name_fr' => 'Cote',
            'name_en' => 'Cote',
        ]);
        CardAttribute::create([
            'name_fr' => 'Lieu d\'édition',
            'name_en' => 'Edition Place',
        ]);
        CardAttribute::create([
            'name_fr' => 'Remarques',
            'name_en' => 'Remarks',
        ]);
        CardAttribute::create([
            'name_fr' => 'Auteur',
            'name_en' => 'Author',
        ]);
        CardAttribute::create([
            'name_fr' => 'Titre',
            'name_en' => 'Title',
        ]);
        CardAttribute::create([
            'name_fr' => 'Éditeur',
            'name_en' => 'Publisher',
        ]);
        CardAttribute::create([
            'name_fr' => 'Territoire',
            'name_en' => 'Territory',
        ]);
        CardAttribute::create([
            'name_fr' => 'Nombre d\'exemplaires',
            'name_en' => 'Number of Copies',
        ]);
        CardAttribute::create([
            'name_fr' => 'Échelle',
            'name_en' => 'Scale',
        ]);
        CardAttribute::create([
            'name_fr' => 'Dimension',
            'name_en' => 'Dimension',
        ]);
        CardAttribute::create([
            'name_fr' => 'Date de création',
            'name_en' => 'Creation date',
        ]);
        CardAttribute::create([
            'name_fr' => 'Numéro volume',
            'name_en' => 'Volume Number',
        ]);
        CardAttribute::create([
            'name_fr' => 'Table des matières',
            'name_en' => 'Table of Contents',
        ]);
        CardAttribute::create([
            'name_fr' => 'Édition',
            'name_en' => 'Edition',
        ]);
        CardAttribute::create([
            'name_fr' => 'ISSN',
            'name_en' => 'ISSN',
        ]);
        CardAttribute::create([
            'name_fr' => 'Compagnie production',
            'name_en' => 'Production Company',
        ]);
        CardAttribute::create([
            'name_fr' => 'Categorie',
            'name_en' => 'Category',
        ]);
        CardAttribute::create([
            'name_fr' => 'Interprète',
            'name_en' => 'interpreter',
        ]);
        CardAttribute::create([
            'name_fr' => 'Numéro de compagnie',
            'name_en' => 'Company Number',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('card_attibutes');
    }
}
