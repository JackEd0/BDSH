<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CardAssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Création de listes de données aléatoires
        $donateurList = array('Rollan', 'Adam', 'Antony', 'Charles', 'Edouard', 'Félix', 'Isaac', 'Julien', 'Malic', 'Malik', 'Patrick', 'Michael', 'Alice', 'Alexia', 'Aurélie', 'Chloé', 'Clara', 'Camille', 'Cathérine', 'Amélia', 'Léa', 'Juliette', 'Justine', 'Sarah', 'John', 'Borris', 'Bertran', 'Paul', 'Rene', 'Bob', 'Roger', 'Joël', 'Olivier', 'Simon', 'Victor', 'Alex', 'Antoine');
        //création de titres aléatoires
        $titreTypeList = array('Journal', 'Magazine', 'Reportage', 'Composition musicale', 'Conférence');
        $categorieProductionList = array('Documentaire', 'Publicité', 'Actualité', 'Education', 'Production personnelle', 'Culture');
        $chronometrageList = array('00 : 00 MINUTE MODULE INTITULE ENTOMO', ' 00 : 23 MINUTES - MODULE INTITULE ORNITHO', ' 00 : 33 MINUTES - MODULE INTITULE SPELEO');
        $ouiNon = array('OUI', 'NON');
        $moisList = array('Janvier', 'Février', 'Mars', 'Avril', 'Mais', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $etatList = array('Neuf', 'Bon', 'Endommagé', 'L\'image saute', 'la video n\'a pas d\'audio');
        $responsabiliteList = array('Conseil du developpement du loisir scientifique', 'Théatre du thé des bois', $donateurList[rand(0, 30)] . $donateurList[rand(0, 30)],
            'Collectionneurs passionnés de l\'estrie', 'Théatre du sang neuf',);
        $townList = array('Berlin', 'Washington', 'Paris', 'Bruxelles', 'Brasilia', 'Le Caire', 'Dakar', 'Jakarta', 'Montréal', 'Sherbrooke');
        $titreList = array('Un art de vivre', 'Nos petites joies', 'Nos idoles', 'Les joies de la télévision');

        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');

        for ($i = 1; $i < 101; ++$i) {
            //Ajout de donateurs   , 3-Biblio et 4-Cartes
            if ($i % 7 == 1 || $i % 7 == 3 || $i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 1,
                    'value' => $donateurList[rand(0, 36)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de N° d'articles   
            if ($i % 7 == 1) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 2,
                    'value' => 'N° ' . rand(0, 36),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de titre type   
            if ($i % 7 == 1) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 3,
                    'value' => $titreTypeList[rand(0, 4)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de date   YYYY, YYYY
            if ($i % 7 == 1 || $i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 4,
                    'value' => rand(1930, 1940) . ', ' . rand(1951, 1999),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de épaisseur   en mm
            if ($i % 7 == 1) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 5,
                    'value' => rand(1, 300) . ' MM',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de description   
            if ($i % 7 == 1 || $i % 7 == 2 || $i % 7 == 3 || $i % 7 == 5) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 6,
                    'value' => 'Aucune description',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de catégorie produiction   
            if ($i % 7 == 2) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 7,
                    'value' => $categorieProductionList[rand(0, 5)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de consultation 
            if ($i % 7 == 2 || $i % 7 == 5) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 8,
                    'value' => 'L, Aucune reproduction',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de chronométrage 
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 9,
                    'value' => $chronometrageList[rand(0, 2)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de couleur 
            if ($i % 7 == 2 || $i % 7 == 5 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 10,
                    'value' => $ouiNon[rand(0, 1)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de code support 
            if ($i % 7 == 1 || $i % 7 == 5) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 11,
                    'value' => '',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de date production YYYY, DD, mmmm
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 12,
                    'value' => '2016, ' . rand(10, 28) . ', ' . $moisList[rand(0, 11)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de durée   
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 13,
                    'value' => rand(1, 58) . ' minutes',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de etat document   
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 14,
                    'value' => $etatList[rand(0, 4)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de localisation   
            if ($i % 7 == 2 || $i % 7 == 4 || $i % 7 == 5 || $i % 7 == 6 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 15,
                    'value' => 'TV',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de n° document   
            if ($i % 7 == 2 || $i % 7 == 5 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 16,
                    'value' => rand(1, 100),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de notes   
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 17,
                    'value' => 'Aucune note',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de responsabilité   
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 18,
                    'value' => $responsabiliteList[rand(0, 4)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de retranscription   
            if ($i % 7 == 2 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 19,
                    'value' => $ouiNon[rand(0, 1)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de son intégré   
            if ($i % 7 == 2) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 20,
                    'value' => $ouiNon[rand(0, 1)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de sujet principal   
            if ($i % 7 == 2 || $i % 7 == 5 || $i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 21,
                    'value' => $categorieProductionList[rand(0, 5)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de sujets   
            if ($i % 7 == 1 || $i % 7 == 2 || $i % 7 == 3 || $i % 7 == 6) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 22,
                    'value' => $categorieProductionList[rand(0, 5)] . ', ' . $categorieProductionList[rand(0, 5)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de lieux   
            if ($i % 7 == 2) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 23,
                    'value' => $townList[rand(0, 9)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de personnages   
            if ($i % 7 == 2 || $i % 7 == 5) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 24,
                    'value' => $donateurList[rand(0, 36)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de date d'édition   YYYY
            if ($i % 7 == 3) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 25,
                    'value' => rand(1930, 1999),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de cote   
            if ($i % 7 == 3 || $i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 26,
                    'value' => 'IP13', //rand(0,9) . rand(0,9) . rand(0,9) . '.' . rand(0,9) . ' ' . chr(rand(65,90)) . rand(0,9) . rand(0,9) . chr(rand(65,90)),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de lieu d'édition   
            if ($i % 7 == 3) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 27,
                    'value' => $townList[rand(0, 9)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de remarques   
            if ($i % 7 == 3 || $i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 28,
                    'value' => '',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de auteur   
            if ($i % 7 == 3 || $i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 29,
                    'value' => $donateurList[rand(0, 15)] . ', ' . $donateurList[rand(16, 36)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de titre   
            if ($i % 7 == 4 || $i % 7 == 4 || $i % 7 == 6) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 30,
                    'value' => $titreList[rand(0, 3)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de éditeur   
            if ($i % 7 == 3) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 31,
                    'value' => $responsabiliteList[rand(0, 4)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de térritoire   
            if ($i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 32,
                    'value' => $townList[rand(0, 9)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de nombre d'exemplaire   
            if ($i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 33,
                    'value' => rand(0, 10),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de échelle   
            if ($i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 34,
                    'value' => rand(1, 30) . ' CM = ' . rand(10, 600) . ' M',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de dimension   
            if ($i % 7 == 4) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 35,
                    'value' => rand(5, 60) . ' CM * ' . rand(5, 60) . ' CM',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de date de création   YYYY
            if ($i % 7 == 5) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 36,
                    'value' => rand(1930, 1999),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de n° volume   
            if ($i % 7 == 6) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 37,
                    'value' => 'Vol. ' . rand(1, 10) . 'N° ' . rand(1, 20),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de table de matière   
            if ($i % 7 == 6) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 38,
                    'value' => 'Titre: ' . $titreList[rand(0, 3)] . 'P1: ' . $titreList[rand(0, 3)] . 'P2: ' . $titreList[rand(0, 3)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de édition   
            if ($i % 7 == 6) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 39,
                    'value' => $responsabiliteList[rand(0, 4)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de issn   
            if ($i % 7 == 6) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 40,
                    'value' => rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . ' - ' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de compagnie production   
            if ($i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 41,
                    'value' => $responsabiliteList[rand(0, 4)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de catégorie   
            if ($i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 42,
                    'value' => 'Variétés',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de interprète   
            if ($i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 43,
                    'value' => $donateurList[rand(0, 36)] . $donateurList[rand(0, 36)],
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de n° de compagnie   
            if ($i % 7 == 0) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 44,
                    'value' => rand(0, 9) . rand(0, 9) . ' - ' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
            //Ajout de n° de négatif   
            if ($i % 7 == 5) {
                DB::table('card_associations')->insert([
                    'card_id' => $i,
                    'card_attribute_id' => 45,
                    'value' => rand(1, 300),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime,
                ]);
            }
        }

        // Seed pour activite Audit
        // Fiches réelle #17187
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 6,
            'value' => '14 MUSICIENS ACCOMPAGNENT LA CHANTEUSE GINETTE LABBE. SUR LA 1ERE RANGEE : 5 SAXOPHONISTES DONT 3 ONT UNE CLARINETTE PRÔS DE LEUR LUTRIN ET A DROITE, LE SAXOPHONISTE SERGE GARANT PRES DE LA CHANTEUSE GINETTE LABBE QUI PORTE UNE ROBE LONGUE A MANCHES COURTES. SUR LA 2E RANGEE : 3 TROMBONISTES, UN CONTREBASSISTE ET UN PIANISTE. SUR LA 3E RANGEE : 3 TROMPETTISTES ET UN PERCUSSIONNISTE. EN HAUT, A L\'ARRIERE-SCENE, EST SUSPENDUE L\'AFFICHE DON ELLIS AND HIS ORCHESTRA.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 11,
            'value' => 'CPN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 16,
            'value' => '43L 1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 21,
            'value' => 'DON ELLIS AND HIS ORCHESTRA',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 24,
            'value' => 'GROUPES; MUSICIENS, CHANTEURS, ACTEURS, GENS DE SPECTACLE, DE CIRQUE',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 36,
            'value' => '1949',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 1,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #8840
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 6,
            'value' => 'PONT ENJAMBANT UN COURS D\'EAU DANS LE PARC SILVER LAKE À ROCHESTER, MINN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 10,
            'value' => 'OUI, ET, NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 11,
            'value' => 'AL',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 16,
            'value' => '61 1.1 A 1.120',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 21,
            'value' => 'COLLECTION DE CARTES POSTALES EN ALBUM',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 24,
            'value' => 'Divers',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 36,
            'value' => '1940, A, 1950',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 2,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #8767
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 6,
            'value' => '1.1 EGLISE DE PIERRE AVEC VOUTE ABRITANT UNE STATUE. FENETRE EN ARC. A L\'AVANT-PLAN, DEBRIS DE BOIS ENCOMBRENT L\'ENTREE DE L\'EGLISE. UNE MERE ET SON ENFANT SE TIENNENT PRES DES DEBRIS.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 11,
            'value' => 'DN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 15,
            'value' => 'ALD',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 16,
            'value' => '34D 1.1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 21,
            'value' => 'DESASTRE DANS UNE REGION INCONNUE',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 36,
            'value' => '1925',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 3,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #644
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 6,
            'value' => 'PORTRAIT DE VICTOR HUGO',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 11,
            'value' => 'IMN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 16,
            'value' => '61 1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 21,
            'value' => 'VICTOR HUGO',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 24,
            'value' => 'Inconnu',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 36,
            'value' => '1885',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 4,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        // Fiches réelle #19944
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 6,
            'value' => 'UN PONT EN FER AVEC 2 ARCHES SUR DES PILIERS DE CIMENT AU CENTRE ET AUX EXTREMITES TRAVERSENT LA RIVIERE ST-RANCOIS. NOUS APPERCEVONS 3 PERSONNES ADOSSEES AU GARDE FOU DE LA RIVIERE.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 11,
            'value' => 'CPN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 16,
            'value' => '55 1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 21,
            'value' => 'ST-FRANCIS RIVER BRIDGE, SHERBROOKE, QUE',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 36,
            'value' => '1899-1929',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 5,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        // Fiches réelle #2356
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 6,
            'value' => 'VUE DE L\'INTERIEUR DE L\'EGLISE A BEAUVOIR, VOILA CE COEUR QUI A TORD AIME LES HOMMES',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 10,
            'value' => 'OUI',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 11,
            'value' => 'CPC',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 16,
            'value' => '13E 1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 21,
            'value' => 'INTERIEUR DE L\'EGLISE A BEAUVOIR',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 36,
            'value' => '1960',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 6,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #1873
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 6,
            'value' => 'MOSAIQUE COMPRENANT, AU CENTRE, UNE PHOTO DE L\'HOPITAL ST-VINCENT DE PAUL ET, TOUT AUTOUR, LES PORTRAITS DE DIX DAMES CHARITABLES ORGANISATRICES DU TAG DAY: MME T.C.CABANA, MME J.H.LANAY, MME C.E.BRADFORD, MME E.SYLVESTRE, MME M.O\'BREADY, MME W.M. MCMANAMY, MLLE A.DUSSAULT, MME W.TALBOT, MLLE E.HUDON ET MME J.E.NOEL.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 11,
            'value' => 'MO',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 16,
            'value' => '43N 1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 21,
            'value' => 'LES ORGANISATEURS DU TAG DAY A L\'HOPITAL ST-VINCENT DE PAUL',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 24,
            'value' => 'GROUPES; ASSOCIATIONS DIVERSES',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 36,
            'value' => '1910',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 7,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #19245
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 6,
            'value' => 'INSCRIPTION SUR L\'AFFICHES: "CHANTEUR, GUITARISTE, LE JOKER". EN BAS, "COUNTRY, RETRO, DANSE SOCIALE". - PANNEAU PUBLICITAIRE OU L\'ON Y VOIT UN HOMME DE DOS PORTANT UN CHAPEAU DE COWBOY. IL PORTE SA GUITAIRE SUR SON DOS. EN ARRIERE-PLAN, DES ARBRES.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 10,
            'value' => 'OUI',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 11,
            'value' => 'PC',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 16,
            'value' => '122 1.1 A 1.2',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 21,
            'value' => 'LE JOKER, CHANTEUR ET GUITARISTE',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 24,
            'value' => 'LE JOKER, CHANTEUR ET GUITARISTE',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 36,
            'value' => '2000',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 8,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #4486
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 6,
            'value' => 'COURSE DE CANOTS ET VOILIERS SUR LE LAC MASSAWIPPI A NORTH HATLEY.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 10,
            'value' => 'OUI',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 11,
            'value' => 'CPM',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 16,
            'value' => '22A 1',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 21,
            'value' => 'VIEW ON MASSAWIPPI LAKE, REGATA DAY, NORTH HATLEY',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 36,
            'value' => '1900',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 9,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #4714
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 6,
            'value' => 'VUE SUR LA RUE DUFFERIN DANS LES ANNEES 1920. ON APERCOIT PLUSIEURS BATIMENTS: EASTERN TOWNSHIPS BANK, LE BUREAU DE POSTE ET L\'HOTEL MAGOG ENTRE AUTRES.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 11,
            'value' => 'DN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 15,
            'value' => 'ALD',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 16,
            'value' => '31D 5',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 21,
            'value' => 'RUE DUFFERIN',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 36,
            'value' => '1920',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 10,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #4806
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 6,
            'value' => 'VUE SUR LE PAVILLON ARMAND NADEAU SITUE AU PARC JACQUES CARTIER A SHERBROOKE. UNE PARTIE DE LA RUE ESPLANADE QUI LONGE LE LAC DES NATIONS EST VUE SOUS DIFFERENTS ANGLES.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 11,
            'value' => 'PLC',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 16,
            'value' => '31B 1 1.1 A 1.3',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 21,
            'value' => 'LE PARC JACQUES-CARTIER ET LA RUE ESPLANADE A SHERBROOKE.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 36,
            'value' => '1978',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 11,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);

        // Fiches réelle #9324
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 6,
            'value' => '1.1 GARAGE MCHOLL FRONTENAC, RED INDIAN STATION, 172 WELLINGTON SUD, MAINTENANT LE 398. 1.2 BRIERE ET BRISSON, SOUDURE, 156 WELL. SUD (MAINTENANT 356). 1.3 4 PERSONNES (3 HOMMES & 1 FEMME) SUR LA GALERIE. MAISON D\'EDDY RAWLINGS, 147 WELLINGTON SUD. 1.4 JEUNE HOMME EN MAILLOT DE BAIN, LES PIEDS DANS L\'EAU. 1.5 DES PERSONNES DANS UN CAMION ENTOURE D\'EAU. 1.6 UNE AUTO DANS L\'EAU JUSQU\'A LA MOITIE DES ROUES. 1.7 CHARRETTE TIREE PAR DES CHEVAUX. 1.8 UNE DAME SUR UNE GALERIE TIENT UN CHIEN DANS SES BRAS.',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 8,
            'value' => 'L',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 10,
            'value' => 'NON',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 11,
            'value' => 'PLC',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 15,
            'value' => 'R',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 16,
            'value' => '33B 1.1 A 1.8',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 21,
            'value' => 'INONDATION A SHERBROOKE EN 1943',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 24,
            'value' => 'N/A',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 36,
            'value' => '1995, REPRODUCTION, DE, 1943',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
        DB::table('card_associations')->insert([
            'card_id' => 12,
            'card_attribute_id' => 45,
            'value' => '',
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
