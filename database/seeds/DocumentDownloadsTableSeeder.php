<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DocumentDownloadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto');

        for ($i = 1; $i < 100; $i += 1) {
            $dateTimeCopy = $dateTime->copy()->subDays(rand(1,600));
            //Ajout de telechargement de documents
            DB::table('document_downloads')->insert([
                'document_id' => rand(1, 25),
                'user_id' => rand(1, 10),
                'comment' => 'Exposition de ' . rand(1, 25),
                'created_at' => $dateTimeCopy,
                'updated_at' => $dateTimeCopy,
            ]);
        }
    }
}
