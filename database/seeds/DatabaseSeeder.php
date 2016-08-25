<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(CardAssociationsTableSeeder::class);
        $this->call(CardAttributesTableSeeder::class);
        $this->call(CardAttributeTypeTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(CardTypesTableSeeder::class);
    }
}
