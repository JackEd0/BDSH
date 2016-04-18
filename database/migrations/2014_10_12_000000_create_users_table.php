<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('firstName');
            $table->string('email')->unique();
            $table->string('password', 300);
            $table->string('address');
            $table->string('town');
            $table->string('postalCode');
            $table->string('province');
            $table->string('country');
            $table->string('phone');
            $table->tinyInteger('active');
            $table->boolean('confirmed');
            $table->integer('user_type_id');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(['username' => 'John', 'name' => 'Clever', 'firstName' => 'Jonathan',
            'email' => 'jony@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'AB', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 2, 'confirmed' => 1,
        ]);
        User::create(['username' => 'Jony', 'name' => 'Boy', 'firstName' => 'Johny',
            'email' => 'jojo@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Montreal', 'postalCode' => 'B1L2M8', 'province' => 'QC', 'country' => 'Canada',
            'phone' => '(001)819159458', 'active' => 1, 'user_type_id' => 2, 'confirmed' => 1,
        ]);
        User::create(['username' => 'admin', 'name' => 'Admin', 'firstName' => 'Nistrateur',
            'email' => 'admin@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'PE', 'country' => 'France',
            'phone' => '(0033)819156458', 'active' => 1, 'user_type_id' => 1, 'confirmed' => 1,
        ]);
        User::create(['username' => 'Edgar', 'name' => 'Lupin', 'firstName' => 'Edy',
            'email' => 'edy@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'MB', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
        ]);
        User::create(['username' => 'Pedro', 'name' => 'Romoe', 'firstName' => 'Salomo',
            'email' => 'pepe@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'ON', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 4, 'confirmed' => 1,
        ]);
        User::create(['username' => 'JeanBon', 'name' => 'Baptiste', 'firstName' => 'Jean',
            'email' => 'jean@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Rue Galt',
            'town' => 'Paris', 'postalCode' => 'B1L2M8', 'province' => 'QC', 'country' => 'France',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
        ]);
        User::create(['username' => 'Abel', 'name' => 'Trump', 'firstName' => 'David',
            'email' => 'dodo@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 0, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'Jacky', 'name' => 'Jack', 'firstName' => 'David',
            'email' => 'jacky@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'adam', 'name' => 'Valery', 'firstName' => 'Plague',
            'email' => 'valey@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'luca', 'name' => 'Caron', 'firstName' => 'Lucien',
            'email' => 'matieu.car@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'marcel', 'name' => 'Malo', 'firstName' => 'Marcus',
            'email' => 'mbobby.berier@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'cokoa', 'name' => 'Cola', 'firstName' => 'Coka',
            'email' => 'coka@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'marceau', 'name' => 'Loup', 'firstName' => 'Marmert',
            'email' => 'loup@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3,
        ]);
        User::create(['username' => 'leonardo', 'name' => 'Leopold', 'firstName' => 'Leonardo',
            'email' => 'cokacola@gmail.com', 'password' => Hash::make('Admin@1234'), 'address' => '12 Milles Deep',
            'town' => 'Middle', 'postalCode' => 'B1L2M8', 'province' => 'SK', 'country' => 'Pacific',
            'phone' => '(001)819156458', 'active' => 1, 'user_type_id' => 3, 'confirmed' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
