<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public $dateTime = null;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->dateTime = new DateTime();
        DB::table('users')->insert(['username' => 'John', 'name' => 'Clever', 'firstName' => 'Jonathan',
            'email' => 'jony@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'AB', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 2, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'Jony', 'name' => 'Boy', 'firstName' => 'Johny',
            'email' => 'jojo@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Montreal', 'postalCode' => 'B1L2M8', 'province' => 'QC', 'country' => 'Canada',
            'phone' => '(001)819159458', 'active' => 1, 'user_type_id' => 2, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'admin', 'name' => 'Admin', 'firstName' => 'Nistrateur',
            'email' => 'admin@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'PE', 'country' => 'France',
            'phone' => '(0033)819156458', 'active' => 1, 'user_type_id' => 1, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'Edgar', 'name' => 'Lupin', 'firstName' => 'Edy',
            'email' => 'edy@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'MB', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'Pedro', 'name' => 'Romoe', 'firstName' => 'Salomo',
            'email' => 'pepe@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'ON', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 4, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'JeanBon', 'name' => 'Baptiste', 'firstName' => 'Jean',
            'email' => 'jean@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'QC', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'Abel', 'name' => 'Trump', 'firstName' => 'David',
            'email' => 'dodo@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 0, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'Jacky', 'name' => 'Jack', 'firstName' => 'David',
            'email' => 'jacky@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 1, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'adam', 'name' => 'Valery', 'firstName' => 'Plague',
            'email' => 'valey@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'luca', 'name' => 'Caron', 'firstName' => 'Lucien',
            'email' => 'matieu.car@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'marcel', 'name' => 'Malo', 'firstName' => 'Marcus',
            'email' => 'mbobby.berier@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'cokoa', 'name' => 'Cola', 'firstName' => 'Coka',
            'email' => 'coka@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'marceau', 'name' => 'Loup', 'firstName' => 'Marmert',
            'email' => 'loup@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
        DB::table('users')->insert(['username' => 'leonardo', 'name' => 'Leopold', 'firstName' => 'Leonardo',
            'email' => 'cokacola@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
            'created_at' => $this->dateTime->format("Y-m-d H:i"),
            'updated_at' => $this->dateTime->format("Y-m-d H:i"),
        ]);
    }
}
