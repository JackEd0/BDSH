<?php

use Illuminate\Database\Seeder;

class CardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_types')->insert([
            'name_fr' => 'Archives',
            'name_en' => 'Archives',
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Audiovisuels',
            'name_en' => 'Audiovisuals',
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Bibliothèque',
            'name_en' => 'Library',
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Cartes',
            'name_en' => 'Maps',
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Images',
            'name_en' => 'Pictures',
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Périodiques',
            'name_en' => 'Periodicals',
        ]);
        DB::table('card_types')->insert([
            'name_fr' => 'Sonores',
            'name_en' => 'Sounds',
        ]);
    }
}
