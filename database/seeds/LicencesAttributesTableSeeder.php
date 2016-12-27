<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicencesAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Date',
            'name_en' => 'Date',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Adresse',
            'name_en' => 'Address',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Titre du site web',
            'name_en' => 'Website title',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Titre',
            'name_en' => 'Title',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Auteur',
            'name_en' => 'Author',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Édition',
            'name_en' => 'Edition',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Nom de la revue/journal (Si applicable)',
            'name_en' => 'Magasine/newspaper name (If applicable)',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Collection (Si applicable)',
            'name_en' => 'Collection (If applicable)',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Tirage prévu',
            'name_en' => 'Expected draw',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Producteur',
            'name_en' => 'Producer',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Date de réalisation',
            'name_en' => 'Realization date',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Date de diffusion',
            'name_en' => 'Diffusion date',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Réseau de diffusion',
            'name_en' => 'Diffusion network',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Titre de l\'exposition',
            'name_en' => 'Exhibition title',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Nom du musée',
            'name_en' => 'Museum name',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Date d\'inauguration',
            'name_en' => 'Opening date',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Durée',
            'name_en' => 'Duration',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Type d\'exposition (permanente, temporaire, itinérante)',
            'name_en' => 'Exhibition type (permanent, temporary, traveling)',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Affiche publicitaire',
            'name_en' => 'Advertising poster',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Publicité télévisuelle/internet/papier ou autre',
            'name_en' => 'TV/internet/paper advertising or other',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Décor d\'un espace public',
            'name_en' => 'Decor of a public space',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Nom du conférencier',
            'name_en' => 'Name of speaker',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes')->insert([
            'name_fr' => 'Lieu',
            'name_en' => 'Place',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
