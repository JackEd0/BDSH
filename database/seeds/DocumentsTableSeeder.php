<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $documentList = array('IP13_PC_31E_1_6_489.jpg', 'IP13_PC_31E_1_8_489.jpg', 'IP13_PC_31E_1_9_489.jpg');
        $dateTime = Carbon::now('America/Toronto');

        for ($i = 1; $i < 101; $i = $i + 2) {
            $dateTimeCopy = $dateTime->copy()->subDays(rand(1,600));
            if ($i % 7 == 2 || $i % 7 == 3 || $i % 7 == 4 || $i % 7 == 5 || $i % 7 == 0) {
                //Ajout de documents pour les Audiovisuels, Bibliothèque, Cartes, Images et Sonores
                DB::table('documents')->insert([
                    'file_name' => $documentList[0],
                    'card_id' => $i,
                    'created_at' => $dateTimeCopy,
                    'updated_at' => $dateTimeCopy,
                ]);
                DB::table('documents')->insert([
                    'file_name' => $documentList[1],
                    'card_id' => $i,
                    'created_at' => $dateTimeCopy,
                    'updated_at' => $dateTimeCopy,
                ]);
                DB::table('documents')->insert([
                    'file_name' => $documentList[2],
                    'card_id' => $i,
                    'created_at' => $dateTimeCopy,
                    'updated_at' => $dateTimeCopy,
                ]);
            }
        }

        DB::table('documents')->insert([
            'file_name' => 'IP4_CPN_43L_1_17187.jpg',
            'card_id' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP5_AL_61_1_1_8840.jpg',
            'card_id' => 2,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP7_DN_34D_1_1_8767.jpg',
            'card_id' => 3,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP16_IMN_61_1_644.jpg',
            'card_id' => 4,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP31_CPN_55_1_19944.jpg',
            'card_id' => 5,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP92_CPC_13E_1_2356.jpg',
            'card_id' => 6,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP101_MO_43N_1_1873.jpg',
            'card_id' => 7,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IP125_PC_122_1_1_19245.jpg',
            'card_id' => 8,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS2_CPM_22A_1_4486.jpg',
            'card_id' => 9,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_DN_31D_5_4714.jpg',
            'card_id' => 10,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_31B_1_1_4806.jpg',
            'card_id' => 11,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_31B_1_2_4806.jpg',
            'card_id' => 11,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_31B_1_3_4806.jpg',
            'card_id' => 11,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_1_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_2_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_3_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_4_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_5_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_6_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_7_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        DB::table('documents')->insert([
            'file_name' => 'IS3_PLC_33B_1_8_9324.jpg',
            'card_id' => 12,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
