<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\User;

class EmailTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     */
    public function testSendRegistrationMailIsCalled()
    {
        $this->expectsEvents(Illuminate\Mail\Events\MessageSending::class);

        $this->visit('/register')
            ->type('BDSHMailTest', 'username')
            ->type('BDSH', 'last_name')
            ->type('Test', 'first_name')
            ->type('BDSH.Test@gmail.com', 'email')
            ->type('Patate22', 'password')
            ->type('Patate22', 'password_confirmation')
            ->type('123 de la Patate', 'address')
            ->type('Patata', 'town')
            ->type('P4T 4T3', 'postal_code')
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
            'first_name' => 'BDSH',
            'last_name' => 'Test',
            'email' => 'BDSH.Test@gmail.com',
            'password' => 'Test',
            'address' => '123 de la Patate',
            'town' => 'Patata',
            'postal_code' => 'P4T 4T3',
            'province' => 'Quebec',
            'country' => 'Canada',
            'phone' => '',
            'user_type_id' => 1,
            'active' => 1,
            'confirmed' => 1,
        ]);

        $this->visit('/password/reset')
            ->type('BDSH.Test@gmail.com', 'email')
            ->press('Envoyer ma demande')
            ->see('Nous vous avons envoyé par courriel le lien de réinitialisation');
    }
}
