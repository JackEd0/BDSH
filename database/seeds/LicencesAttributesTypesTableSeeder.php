<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicencesAttributesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 1,
            'licence_attribute_id' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 1,
            'licence_attribute_id' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 1,
            'licence_attribute_id' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 2,
            'licence_attribute_id' => 9,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 4,
            'licence_attribute_id' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 4,
            'licence_attribute_id' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 4,
            'licence_attribute_id' => 11,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 4,
            'licence_attribute_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 4,
            'licence_attribute_id' => 13,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 5,
            'licence_attribute_id' => 14,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 5,
            'licence_attribute_id' => 15,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 5,
            'licence_attribute_id' => 16,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 5,
            'licence_attribute_id' => 17,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 5,
            'licence_attribute_id' => 18,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 6,
            'licence_attribute_id' => 19,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 6,
            'licence_attribute_id' => 20,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 6,
            'licence_attribute_id' => 21,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 7,
            'licence_attribute_id' => 22,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 7,
            'licence_attribute_id' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('licence_attributes_types')->insert([
            'licence_type_id' => 7,
            'licence_attribute_id' => 23,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
