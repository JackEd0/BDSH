<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('card_types')->insert([
            'name_fr' => 'Archives',
            'name_en' => 'Archives',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Audiovisuels',
            'name_en' => 'Audiovisuals',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Bibliothèque',
            'name_en' => 'Library',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Cartes',
            'name_en' => 'Maps',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Images',
            'name_en' => 'Pictures',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Périodiques',
            'name_en' => 'Periodicals',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Sonores',
            'name_en' => 'Sounds',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
