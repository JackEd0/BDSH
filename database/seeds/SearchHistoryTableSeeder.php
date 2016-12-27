<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SearchHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Création de listes de données aléatoires
        $termList = array('Rollan', 'Adam', 'Antony', 'Charles', 'Edouard', 'Félix', 'Isaac', 'Julien', 'Malic', 'Malik', 'Patrick', 'Michael', 'Alice', 'Alexia', 'Aurélie', 'Chloé', 'Clara', 'Camille', 'Cathérine', 'Amélia', 'Léa', 'Juliette', 'Justine', 'Sarah', 'John', 'Borris', 'Bertran', 'Paul', 'Rene', 'Bob', 'Roger', 'Joël', 'Olivier', 'Simon', 'Victor', 'Alex', 'Antoine',
            'Trump', 'Tremblay', 'Gagnon', 'Roy', 'Coté', 'Bouchard', 'Laberge', 'Chan', 'Ranger', 'Morin', 'Fortin', 'Gagné', 'Pellerin', 'Lagacé', 'Lafrance', 'Miler', 'Barbeau', 'Nolet', 'Sauvé', 'Rivest', 'Lépine', 'Gouin', 'Caron',
            'com', 'fr', 'co', 'info', 'jobs', 'net', 'org', 'pro', 'cat', 'asia', 'ca', 'tel', 'gov', 'edu', 'coop',
            'gmail', 'yahoo', 'hotmail', 'outlook', 'universite', 'Cabana', 'Jacques Cartier', 'Blv Université', 'Blanchard', 'Victoria',
            'Galvin', 'King Est', 'King Ouest', 'Queen', 'Berlin', 'Washington', 'Paris', 'Bruxelles', 'Brasilia', 'Le Caire', 'Dakar', 'Jakarta',
            'Montréal', 'Sherbrooke', 'Irak', 'Mali', 'Canada', 'France', 'Allemagne', 'Thaïlande', 'Serbie', 'Suisse', 'Liban', 'Brésil', 'Belgique',);

        $dateTime = Carbon::now('America/Toronto');

        for ($i = 0; $i < 100; ++$i) {
            $dateTimeCopy = $dateTime->copy()->subDays(rand(1,600));
            DB::table('search_history')->insert(['term' => $termList[rand(0, 100)],
                'user_id' => rand(1, 50),
                'created_at' => $dateTimeCopy,
                'updated_at' => $dateTimeCopy,
            ]);
        }
    }
}
