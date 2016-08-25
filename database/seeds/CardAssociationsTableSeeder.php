<?php

use Illuminate\Database\Seeder;

class CardAssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 1,
            'value' => 'Tarik Haimar',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 6,
            'value' => 'petit test',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 23,
            'value' => 'test',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 27,
            'value' => 'aujourd hui',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 28,
            'value' => 'A+',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 29,
            'value' => 'sherbrooke',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 30,
            'value' => 'pas de remarque',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 31,
            'value' => 'Tarik Haimar',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 32,
            'value' => 'Le titre inédit',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 33,
            'value' => 'udes',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 1,
            'value' => 'haimarHTarik',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 2,
            'value' => '354',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 3,
            'value' => 'type à part',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 4,
            'value' => 'aujourd hui',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 5,
            'value' => 'grand épaisseur',
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 6,
            'value' => 'aucune valeur',
        ]);
    }
}
