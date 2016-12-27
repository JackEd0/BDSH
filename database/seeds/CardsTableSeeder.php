<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto');

        // Seed pour activite MegaGeniale
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 2,
            'card_number' => 29,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 3,
            'card_number' => 30,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 4,
            'card_number' => 31,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 6,
            'card_number' => 32,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 9,
            'card_number' => 33,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 25,
            'card_number' => 34,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 29,
            'card_number' => 35,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 35,
            'card_number' => 36,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 60,
            'card_number' => 37,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 61,
            'card_number' => 38,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 61,
            'card_number' => 39,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('cards')->insert([
            'card_type_id' => 5,
            'collection_id' => 61,
            'card_number' => 40,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        $j = 0;
        for ($i = 12; $i < 100; ++$i) {
            //Ajout de fiches de type compris entre 1 et 7
            $dateTimeCopy = $dateTime->copy()->subDays(rand(1,600));
            DB::table('cards')->insert([
                'card_type_id' => ($i % 7) + 1,
                'collection_id' => (((($i % 7) + 1) == 2) || ((($i % 7) + 1) == 3) || ((($i % 7) + 1) == 4) || ((($i % 7) + 1) == 5) || ((($i % 7) + 1) == 7) ? rand(1, 70) : null),
                'card_number' => floor($j / 7) + 1,
                'created_at' => $dateTimeCopy,
                'updated_at' => $dateTimeCopy,
            ]);
            ++$j;
        }
    }
}
