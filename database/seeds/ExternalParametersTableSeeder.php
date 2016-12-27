<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExternalParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('external_parameters')->insert([
            'email' => 'theophile.lafage-facilitator-1@isep.fr',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
