<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicencesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('licence_types')->insert([
            'name_fr' => 'Site internet/Réseaux sociaux(Facebook, Twitter ou autres)',
            'name_en' => 'Website/Social Networks(Facebook, Twitter or others)',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Publication livre/revue/journal',
            'name_en' => 'Publication book/magazine/newspaper',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Personnelle, aucune reproduction imprimée ou internet',
            'name_en' => 'Personal, no printed reproduction or internet',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Production audiovisuelle (documentaire, film, capsule ou autre)',
            'name_en' => 'Audiovisual production (documentary, movie, capsule or other)',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Exposition',
            'name_en' => 'Exhibition',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Articles promotionnels',
            'name_en' => 'Promotionnal items',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Conférence/scéance d\'information',
            'name_en' => 'Conference/Briefing session',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_types')->insert([
            'name_fr' => 'Autre (Veuillez préciser)',
            'name_en' => 'Other (Please specify)',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
