<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicencesOwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Création de listes de données aléatoires
        $firstNameList = array('Rollan', 'Adam', 'Antony', 'Charles', 'Edouard', 'Félix', 'Isaac', 'Julien', 'Malic', 'Malik', 'Patrick', 'Michael', 'Alice', 'Alexia', 'Aurélie', 'Chloé', 'Clara', 'Camille', 'Cathérine', 'Amélia', 'Léa', 'Juliette', 'Justine', 'Sarah', 'John', 'Borris', 'Bertran', 'Paul', 'Rene', 'Bob', 'Roger', 'Joël', 'Olivier', 'Simon', 'Victor', 'Alex', 'Antoine');
        $enterpriseList = array('CGI', 'Nissan Canada', 'Ford USA', 'Excavation DD', "Ville de Val d'or", 'Cos Theta', 'QVP', 'Transport truc Inc.', "PasD'idée enr.", 'Machin lte');
        $lastNameList = array('Trump', 'Tremblay', 'Gagnon', 'Roy', 'Coté', 'Bouchard', 'Laberge', 'Chan', 'Ranger', 'Morin', 'Fortin', 'Gagné', 'Pellerin', 'Lagacé', 'Lafrance', 'Miler', 'Barbeau', 'Nolet', 'Sauvé', 'Rivest', 'Lépine', 'Gouin', 'Caron');
        $domainList = array('com', 'fr', 'co', 'info', 'jobs', 'net', 'org', 'pro', 'cat', 'asia', 'ca', 'tel', 'gov', 'edu', 'coop');
        $serverList = array('gmail', 'yahoo', 'hotmail', 'outlook', 'universite');
        $addressList = array('Cabana', 'Jacques Cartier', 'Blv Université', 'Blanchard', 'Victoria', 'Galvin', 'King Est', 'King Ouest', 'Queen');
        $townList = array('Berlin', 'Washington', 'Paris', 'Bruxelles', 'Brasilia', 'Le Caire', 'Dakar', 'Jakarta', 'Montréal', 'Sherbrooke');
        $countryList = array('Irak', 'Mali', 'Canada', 'France', 'Allemagne', 'Thaïlande', 'Serbie', 'Suisse', 'Liban', 'Brésil', 'Belgique');

        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');

        for ($i = 0; $i < 15; ++$i) {
            DB::table('licence_owners')->insert([
                'last_name' => $firstNameList[rand(0, 36)],
                'first_name' => $lastNameList[rand(0, 22)],
                'email' => $firstNameList[rand(0, 36)] . $lastNameList[rand(0, 22)] . $i . '@' . $serverList[rand(0, 4)] . '.' . $domainList[rand(0, 14)],
                'address' => rand(10, 200) . ', ' . $addressList[rand(0, 8)],
                'town' => $townList[rand(0, 9)],
                'postal_code' => chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9),
                'province' => chr(rand(65, 90)) . chr(rand(65, 90)),
                'country' => $countryList[rand(0, 10)],
                'phone' => '(' . rand(0, 9) . rand(0, 9) . rand(0, 9) . ')' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ]);
        }

        for ($i = 0; $i < 10; ++$i) {
            DB::table('licence_owners')->insert([
                'enterprise' => $enterpriseList[$i],
                'email' => $firstNameList[rand(0, 36)] . $lastNameList[rand(0, 22)] . $i . '@' . $serverList[rand(0, 4)] . '.' . $domainList[rand(0, 14)],
                'address' => rand(10, 200) . ', ' . $addressList[rand(0, 8)],
                'town' => $townList[rand(0, 9)],
                'postal_code' => chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9),
                'province' => chr(rand(65, 90)) . chr(rand(65, 90)),
                'country' => $countryList[rand(0, 10)],
                'phone' => '(' . rand(0, 9) . rand(0, 9) . rand(0, 9) . ')' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ]);
        }
    }
}
