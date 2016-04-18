<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\User;

class EmailTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSendRegistrationMailIsCalled()
    {
        $this->expectsEvents(Illuminate\Mail\Events\MessageSending::class);

        $this->visit('/register')
            ->type('BDSHMailTest', 'username')
            ->type('BDSH', 'firstName')
            ->type('Test', 'name')
            ->type('BDSH.Test@gmail.com', 'email')
            ->type('Patate22', 'password')
            ->type('Patate22', 'password_confirmation')
            ->type('123 de la Patate', 'address')
            ->type('Patata', 'town')
            ->type('P4T 4T3', 'postalCode')
            ->type('Quebec', 'province')
            ->type('Canada', 'country')
            ->press('Enregistrer')
            ->seePageIs('login')
            ->see('Un lien de confirmation vous a été envoyé');
    }

    public function testSendResetPasswordMailIsCalled()
    {
        $this->expectsEvents(Illuminate\Mail\Events\MessageSending::class);


        User::create(['username' => 'BDSHMailTest',
            'name' => 'BDSH',
            'firstname' => 'Test',
            'email' => 'BDSH.Test@gmail.com',
            'password' => 'Test',
            'address' => '123 de la Patate',
            'town' => 'Patata',
            'postalCode' => 'P4T 4T3',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '',
        ]);

        $this->visit('/password/reset')
            ->type('BDSH.Test@gmail.com', 'email')
            ->press('Envoyer ma demande')
            ->see('Nous vous avons envoyé par courriel le lien de réinitialisation');
    }

}
