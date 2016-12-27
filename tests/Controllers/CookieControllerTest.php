<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CookieControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSetCookie()
    {
        Auth::loginUsingId(1);
        $filename = 'IP13_PC_31E_1_6_489.jpg';
        $url = '/cookie/set/'.$filename;
        $this->visit($url)
            ->seePageIs('basket');
    }
}
