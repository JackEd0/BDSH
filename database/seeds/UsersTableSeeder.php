<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Création de listes de données aléatoires
        $firstNameList = array('Rollan', 'Adam', 'Antony', 'Charles', 'Edouard', 'Felix', 'Isaac', 'Julien', 'Malic', 'Malik', 'Patrick', 'Michael', 'Alice', 'Alexia', 'Aurelie', 'Chloe', 'Clara', 'Camille', 'Catherine', 'Amelia', 'Lea', 'Juliette', 'Justine', 'Sarah', 'John', 'Borris', 'Bertran', 'Paul', 'Rene', 'Bob', 'Roger', 'Joël', 'Olivier', 'Simon', 'Victor', 'Alex', 'Antoine');
        $lastNameList = array('Trump', 'Tremblay', 'Gagnon', 'Roy', 'Cote', 'Bouchard', 'Laberge', 'Chan', 'Ranger', 'Morin', 'Fortin', 'Gagne', 'Pellerin', 'Lagace', 'Lafrance', 'Miler', 'Barbeau', 'Nolet', 'Sauve', 'Rivest', 'Lepine', 'Gouin', 'Caron');
        $domainList = array('com', 'fr', 'co', 'info', 'jobs', 'net', 'org', 'pro', 'cat', 'asia', 'ca', 'tel', 'gov', 'edu', 'coop');
        $serverList = array('gmail', 'yahoo', 'hotmail', 'outlook', 'universite');
        $addressList = array('Cabana', 'Jacques Cartier', 'Blv Universite', 'Blanchard', 'Victoria', 'Galvin', 'King Est', 'King Ouest', 'Queen');
        $townList = array('Berlin', 'Washington', 'Paris', 'Bruxelles', 'Brasilia', 'Le Caire', 'Dakar', 'Jakarta', 'Montreal', 'Sherbrooke');
        $countryList = array('Irak', 'Mali', 'Canada', 'France', 'Allemagne', 'Thaïlande', 'Serbie', 'Suisse', 'Liban', 'Bresil', 'Belgique');

        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');

        //Ajout de l'utilisateur admin
        DB::table('users')->insert([
            'username' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'Nistrateur',
            'email' => 'matcaron22@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'address' => '12 Rue Galt',
            'town' => 'Paris',
            'postal_code' => 'B1L2M8',
            'province' => 'PE',
            'country' => 'France',
            'phone' => '(0033)819156458',
            'active' => 1,
            'user_type_id' => 1,
            'confirmed' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //Ajout de l'utilisateur employé +
        DB::table('users')->insert([
            'username' => 'Employep',
            'first_name' => 'Employe',
            'last_name' => 'Plus',
            'email' => 'employep@gmail.com',
            'password' => Hash::make('Employep@1234'),
            'address' => '12 Rue Galt',
            'town' => 'Paris',
            'postal_code' => 'B1L2M8',
            'province' => 'PE',
            'country' => 'France',
            'phone' => '(0033)819156458',
            'active' => 1,
            'user_type_id' => 2,
            'confirmed' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //Ajout de l'utilisateur employé
        DB::table('users')->insert([
            'username' => 'Employe',
            'first_name' => 'Employe',
            'last_name' => 'PasPlus',
            'email' => 'employe@gmail.com',
            'password' => Hash::make('Employe@1234'),
            'address' => '12 Rue Galt',
            'town' => 'Paris',
            'postal_code' => 'B1L2M8',
            'province' => 'PE',
            'country' => 'France',
            'phone' => '(0033)819156458',
            'active' => 1,
            'user_type_id' => 3,
            'confirmed' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        //Ajout de l'utilisateur client
        DB::table('users')->insert([
            'username' => 'Client',
            'first_name' => 'Mathieu',
            'last_name' => 'Caron',
            'email' => 'bdsh_udes@hotmail.com',
            'password' => Hash::make('Client@1234'),
            'address' => '12 Rue Galt',
            'town' => 'Sherbrooke',
            'postal_code' => 'B1L2M8',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '(0033)819156458',
            'active' => 1,
            'user_type_id' => 4,
            'confirmed' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        for ($i = 0; $i < 50; ++$i) {
            DB::table('users')->insert([
                'username' => $firstNameList[rand(0, 36)] . $i,
                'first_name' => $firstNameList[rand(0, 36)],
                'last_name' => $lastNameList[rand(0, 22)],
                'email' => $firstNameList[rand(0, 36)] . $lastNameList[rand(0, 22)] . $i . '@' . $serverList[rand(0, 4)] . '.' . $domainList[rand(0, 14)],
                'password' => Hash::make('Admin@1234'),
                'address' => rand(10, 200) . ', ' . $addressList[rand(0, 8)],
                'town' => $townList[rand(0, 9)],
                'postal_code' => chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9),
                'province' => chr(rand(65, 90)) . chr(rand(65, 90)), 'country' => $countryList[rand(0, 10)],
                'phone' => '(' . rand(0, 9) . rand(0, 9) . rand(0, 9) . ')' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
                'active' => rand(0, 1),
                'user_type_id' => rand(2, 4),
                'confirmed' => 1,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ]);
        }
    }
}
