<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        DB::table('collections')->insert([
            'code' => 'IP1',
            'name' => 'Albert Gravel ',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP4',
            'name' => 'Famille Labbé',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP5',
            'name' => 'Rosario Cousineau',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP7',
            'name' => 'Gérard Coté',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP13',
            'name' => 'Lucille Daigneau',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP16',
            'name' => 'Walter Alexander',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP21',
            'name' => 'Mgr Maurice O\'Bready',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP22',
            'name' => 'Léonidas Bachand',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP31',
            'name' => 'Dorothy Wiggett-Powers',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP33',
            'name' => 'André Tessier',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP45',
            'name' => 'Jean-Guy Dubois',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP46',
            'name' => 'Armand Desrochers ET Carmen Deziel',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP49',
            'name' => 'Paul Gagné',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP50',
            'name' => 'A.Gauthier',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP51',
            'name' => 'Florence Hunt',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP52',
            'name' => 'Louis-Philippe Demers',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP55',
            'name' => 'Hervé Bernard',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP57',
            'name' => 'Paul-Emile Fortier ET Alberta Vincent',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP63',
            'name' => 'Gérard Auray',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP66',
            'name' => 'Yvette et Alice Campbell',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP72',
            'name' => 'Valmore Olivier',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP80',
            'name' => 'Mgr Joseph-Emile Vincent',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP87',
            'name' => 'Famille Léonilde-Charles Bachand',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP90',
            'name' => 'Ville de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP92',
            'name' => 'Marie-Jeane Daigneau',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP93',
            'name' => 'Demoiselles Couture',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP98',
            'name' => 'Famille John Léonard',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP99',
            'name' => 'Mme Lee Watson',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP101',
            'name' => 'Juliette O\'Bready-Graham',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP102',
            'name' => 'Mme E.G.Pullen',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP104',
            'name' => 'Famille Murray',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP105',
            'name' => 'L\'Abbé Charles-Joseph Roy',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP108',
            'name' => 'J.E.Simard (Abbé)',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP110',
            'name' => 'Florence Byrd',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP113',
            'name' => 'Lewis Rosenbloom',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP121',
            'name' => 'Maria Robert',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP122',
            'name' => 'La Tribune',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP124',
            'name' => 'Carrier Fortin',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP125',
            'name' => 'Louise Poire',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP127',
            'name' => 'Famille Boluc',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP130',
            'name' => 'Armand Nadeau',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP139',
            'name' => 'Stanstead and Sherbrooke Mutual Fire Insurance Company',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP156',
            'name' => 'Regroupement du bois Beckett',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP184',
            'name' => 'Cercle Marguerite Bourgeoys',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP195',
            'name' => 'George Armitage',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP196',
            'name' => 'Jeanne-Mance Rodrigue',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP239',
            'name' => 'Municipalité Régionale de Peel',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP252',
            'name' => 'Centre Culturel et Artistique de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP306',
            'name' => 'Clovis Roy',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP391',
            'name' => 'Estrie-France',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP415',
            'name' => 'Rev. Frère Daniel',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP440',
            'name' => 'John S. Bourque',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP454',
            'name' => 'Thomson & Alix Ltee',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP459',
            'name' => 'Ingersoll-Rand',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP460',
            'name' => 'Doug Gerrish',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP465',
            'name' => 'Frederick James Sangster',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP475',
            'name' => 'John J. Penhale',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IP501',
            'name' => 'Famille Sevigny',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS1',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS2',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS3',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS4',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS5',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS6',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS7',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS8',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS9',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS10',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS11',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('collections')->insert([
            'code' => 'IS12',
            'name' => 'Société d\'Histoire de Sherbrooke',
            'state' => '1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
