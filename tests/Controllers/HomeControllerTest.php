<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        Auth::loginUsingId(1);
        $homeLink = '';
        $this->visit($homeLink)
            ->seePageIs($homeLink)
            ->see('Connexion');
    }
}
