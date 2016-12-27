<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicencesFeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('licence_fees')->insert([
            'admin' => 3.00,
            'private_use' => 5.00,
            'public_use' => 20.00,
            'tps' => 5,
            'tvq' => 9.975,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}