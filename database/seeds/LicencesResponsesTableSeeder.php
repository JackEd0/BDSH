<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicencesResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 1,
            'transaction_id' => 1,
            'value' => $dateTime,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 2,
            'transaction_id' => 1,
            'value' => 'www.site.ca',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 3,
            'transaction_id' => 1,
            'value' => 'Titre',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 4,
            'transaction_id' => 2,
            'value' => 'Recherche mammifère marin',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 1,
            'transaction_id' => 2,
            'value' => $dateTime,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 5,
            'transaction_id' => 2,
            'value' => 'Pierre Laroche',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 6,
            'transaction_id' => 2,
            'value' => "Edition de l'homme",
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 7,
            'transaction_id' => 2,
            'value' => 'Les débrouillards',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 8,
            'transaction_id' => 2,
            'value' => 'Automne 2016',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 9,
            'transaction_id' => 2,
            'value' => '100000',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 10,
            'transaction_id' => 4,
            'value' => 'Producer',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 4,
            'transaction_id' => 4,
            'value' => 'Dérapages',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 11,
            'transaction_id' => 4,
            'value' => $dateTime,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 12,
            'transaction_id' => 4,
            'value' => $dateTime,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 13,
            'transaction_id' => 4,
            'value' => 'TVA',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 14,
            'transaction_id' => 5,
            'value' => "Histoire de la ville de Val d'or",
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 15,
            'transaction_id' => 5,
            'value' => "Musée de la ville de Val d'or",
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 16,
            'transaction_id' => 5,
            'value' => $dateTime,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 17,
            'transaction_id' => 5,
            'value' => '1 heure 23 minutes',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 18,
            'transaction_id' => 5,
            'value' => 'temporaire',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 19,
            'transaction_id' => 6,
            'value' => 'Oui',
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 20,
            'transaction_id' => 6,
            'value' => 'Non',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 21,
            'transaction_id' => 6,
            'value' => 'Oui',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 22,
            'transaction_id' => 7,
            'value' => 'Mathieu Caron',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 1,
            'transaction_id' => 7,
            'value' => $dateTime,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_responses')->insert([
            'licence_attribute_id' => 23,
            'transaction_id' => 7,
            'value' => 'Université de Sherbrooke',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
