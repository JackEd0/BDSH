<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => rand(1, 25),
            'licence_type_id' => 1,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => rand(1, 25),
            'licence_type_id' => 2,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => rand(1, 25),
            'licence_type_id' => 3,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => rand(1, 25),
            'licence_type_id' => 4,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => rand(1, 25),
            'licence_type_id' => 5,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => null,
            'licence_type_id' => 6,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('transactions')->insert([
            'accepted_date' => null,
            'refusal_date' => null,
            'comment_admin' => '',
            'comment_user' => '',
            'licence_fee_id' => 1,
            'licence_owner_id' => null,
            'licence_type_id' => 7,
            'licence_version_id' => 1,
            'paid_date' => null,
            'price_type_id' => null,
            'user_id' => rand(1, 50),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
