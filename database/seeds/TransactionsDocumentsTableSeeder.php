<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto');
        for ($i = 0; $i < 100; ++$i) {
            $dateTimeCopy = $dateTime->copy()->subDays(rand(1,600));
            DB::table('transactions_documents')->insert([
                'document_id' => rand(1, 32),
                'transaction_id' => rand(1, 7),
                'created_at' => $dateTimeCopy,
                'updated_at' => $dateTimeCopy,
            ]);
        }
    }
}
