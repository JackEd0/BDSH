<?php

//use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @dataProvider providerTestUsers
     */
    public function testPageUsersAdmin($userTypeID, $responseStatus)
    {
        $user = new App\User(['name' => 'somethingNotUsed', 'user_type_id' => $userTypeID, 'confirmed' => 1, 'active' => 1]);
        $this->be($user);
        $this->call('GET', '/users');

        $this->assertResponseStatus($responseStatus);
    }

    public function providerTestUsers()
    {
        return array(
            array(1, 200),
            array(2, 401),
            array(3, 401),
        );
    }
}
