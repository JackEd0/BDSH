<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\User;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test login
     *
     * @return void
     */
    public function testActiveAndConfirmedUserLogin()
    {
        User::create(['username' => 'BDSHMailTest',
            'name' => 'BDSH',
            'firstname' => 'Test',
            'email' => 'BDSH.Test@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'address' => '123 de la Patate',
            'town' => 'Patata',
            'postalCode' => 'P4T 4T3',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '',
            'user_type_id' => 1,
            'active' => 1,
            'confirmed' => 1
        ]);

        $this->visit('login')
            ->type('BDSHMailTest', 'username')
            ->type('Admin@1234', 'password')
            ->press('Continuer')
            ->see('Deconnecter');
    }

    public function testActiveNotConfirmedUserLogin()
    {
        User::create(['username' => 'BDSHMailTest',
            'name' => 'BDSH',
            'firstname' => 'Test',
            'email' => 'BDSH.Test@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'address' => '123 de la Patate',
            'town' => 'Patata',
            'postalCode' => 'P4T 4T3',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '',
            'user_type_id' => 1,
            'active' => 1,
            'confirmed' => 0
        ]);

        $this->visit('login')
            ->type('BDSHMailTest', 'username')
            ->type('Admin@1234', 'password')
            ->press('Continuer')
            ->seePageIs('login')
            ->see('Ce compte n\'a pas été confirmé');
    }

    public function testConfirmedNotActiveUserLogin()
    {
        User::create(['username' => 'BDSHMailTest',
            'name' => 'BDSH',
            'firstname' => 'Test',
            'email' => 'BDSH.Test@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'address' => '123 de la Patate',
            'town' => 'Patata',
            'postalCode' => 'P4T 4T3',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '',
            'user_type_id' => 1,
            'active' => 0,
            'confirmed' => 1
        ]);

        $this->visit('login')
            ->type('BDSHMailTest', 'username')
            ->type('Admin@1234', 'password')
            ->press('Continuer')
            ->seePageIs('login')
            ->see('Ces identifiants ne correspondent pas à nos enregistrements');
    }

    public function testNotActiveNotConfirmedUserLogin()
    {
        User::create(['username' => 'BDSHMailTest',
            'name' => 'BDSH',
            'firstname' => 'Test',
            'email' => 'BDSH.Test@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'address' => '123 de la Patate',
            'town' => 'Patata',
            'postalCode' => 'P4T 4T3',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '',
            'user_type_id' => 1,
            'active' => 0,
            'confirmed' => 0
        ]);

        $this->visit('login')
            ->type('BDSHMailTest', 'username')
            ->type('Admin@1234', 'password')
            ->press('Continuer')
            ->seePageIs('login')
            ->see('Ces identifiants ne correspondent pas à nos enregistrements');
    }

    public function testDoNotExistUserLogin()
    {
        $this->visit('login')
            ->type('BDSHMailNotTest', 'username')
            ->type('Test12334', 'password')
            ->press('Continuer')
            ->seePageIs('login')
            ->see('Ces identifiants ne correspondent pas à nos enregistrements');
    }
}
