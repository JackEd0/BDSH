<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('user_types')->insert([
            'name_fr' => 'Administrateur',
            'name_en' => 'Administrator',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('user_types')->insert([
            'name_fr' => 'Employé +',
            'name_en' => 'Employee +',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('user_types')->insert([
            'name_fr' => 'Employé',
            'name_en' => 'Employee',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('user_types')->insert([
            'name_fr' => 'Client',
            'name_en' => 'Client',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
