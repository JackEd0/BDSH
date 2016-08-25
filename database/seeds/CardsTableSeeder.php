<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cards')->insert(['card_type_id' => 1,
        ]);
        DB::table('cards')->insert(['card_type_id' => 2,
        ]);
        DB::table('cards')->insert(['card_type_id' => 3,
        ]);
        DB::table('cards')->insert(['card_type_id' => 4,
        ]);
    }
}
