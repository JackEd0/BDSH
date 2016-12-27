<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicenceVersionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $termsText = File::get('.\database\terms.txt');

        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('licence_versions')->insert([
            'terms' => $termsText,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
