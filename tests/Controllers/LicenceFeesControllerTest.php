<?php

use App\LicenceFee;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LicenceFeeControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testEditionFees()
    {
        Auth::loginUsingId(1);
        $editFeesLink = 'fees';
        $this->visit($editFeesLink)
            ->seePageIs($editFeesLink)
            ->see('Modification des frais de licence')
            ->see('Taux TVQ')
            ->see('Taux TPS')
            ->see('Frais Administratifs')
            ->see('Frais Utilisation Privée')
            ->see('Frais Utilisation Publique');
    }

    public function testInsertFees()
    {
        Auth::loginUsingId(1);
        $tvq = 1.11;
        $tps = 1.12;
        $admin = 1.13;
        $public = 1.14;
        $private = 1.15;
        $editFeesLink = 'fees';
        $this->visit($editFeesLink)
            ->seePageIs($editFeesLink)
            ->see('Modification des frais de licence')
            ->type($tvq, 'tvq')
            ->type($tps, 'tps')
            ->type($admin, 'admin')
            ->type($public, 'public_use')
            ->type($private, 'private_use')
            ->press('Enregistrer')
            ->seePageIs('searchHome');

        $lastFees = LicenceFee::whereRaw('id = (select max(`id`) from licence_fees)')->first();
        $this->assertEquals($tvq, $lastFees->tvq);
        $this->assertEquals($tps, $lastFees->tps);
        $this->assertEquals($admin, $lastFees->admin);
        $this->assertEquals($public, $lastFees->public_use);
        $this->assertEquals($private, $lastFees->private_use);
    }
}
