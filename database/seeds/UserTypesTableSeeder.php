<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name_fr' => 'Administrateur',
            'name_en' => 'Administrator',
        ]);
        DB::table('user_types')->insert([
            'name_fr' => 'Employé +',
            'name_en' => 'Employee +',
        ]);
        DB::table('user_types')->insert([
            'name_fr' => 'Employé',
            'name_en' => 'Employee',
        ]);
        DB::table('user_types')->insert([
            'name_fr' => 'Client',
            'name_en' => 'Client',
        ]);
    }
}
