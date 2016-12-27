<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

/**
 * Created by PhpStorm.
 * User: matcaron
 * Date: 2016-03-26
 * Time: 15:07.
 */
class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test de désactivation d'un utilisateur.
     */
    public function testDeactivateUser()
    {
        $this->visit('login')
            ->type('Admin', 'username')
            ->type('Admin@1234', 'password')
            ->press('Continuer');

        $this->visit('/users/1')
            ->visit('deactivateUser/' . \Crypt::encrypt(1))
            ->seeInDatabase('users', [
                'id' => '1',
                'active' => '0',
            ]);
    }

    public function testModifyUserValid()
    {
        Auth::loginUsingId(10);

        $this->visit('profile/' . \Crypt::encrypt(10))
            ->type('BDSHFirst', 'first_name')
            ->type('BDSHLast', 'last_name')
            ->type('BDSH@email.cc', 'email')
            ->type('514-819-1234', 'phone')
            ->type('1234 BDSH', 'address')
            ->type('BDSHTown', 'town')
            ->type('B3S 4B3', 'postal_code')
            ->type('BDSHProvince', 'province')
            ->type('BDSHCountry', 'country')
            ->press('Enregistrer')
            ->see('Changements enregistrés');

        $this->visit('profile/' . \Crypt::encrypt(10))
            ->see('BDSHFirst')
            ->see('BDSHLast')
            ->see('BDSH@email.cc')
            ->see('514-819-1234')
            ->see('BDSHTown')
            ->see('B3S 4B3')
            ->see('BDSHProvince')
            ->see('BDSHCountry');
    }

    public function testModifyUserInvalid()
    {
        Auth::loginUsingId(10);

        $this->visit('profile/' . \Crypt::encrypt(10));
        /*
         * Actuellement la page n'affiche qu'une erreur à la fois, dans un popup qui disparait...
         * je vais faire le test lorsque ce sera modifié
         */
    }
}
