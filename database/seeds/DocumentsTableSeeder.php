<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('documents')->insert([
            'file_name'=>'test',
            'card_id'=>1,
        ]);
    }
}
