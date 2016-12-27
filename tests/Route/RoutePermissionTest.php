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
        $user = new App\User(['first_name' => 'somethingNotUsed', 'user_type_id' => $userTypeID, 'confirmed' => 1, 'active' => 1]);
        $this->be($user);
        $this->call('GET', '/users/1');

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

    public function testRoutePermissionHome()
    {
        $wrongUrl = $this->call('GET', 'wrong/url');
        $this->assertEquals(404, $wrongUrl->status());
        $this->visit('/')
            ->see('Connexion')
            ->see('Mot de passe oublié');

        Auth::loginUsingId(1);
        $this->visit('/')
            ->see('Recherche')
            ->see('Rechercher');

    }

    public function testRoutePermissionUser()
    {
        $this->visit('users/activation/' . \Crypt::encrypt(5))
            ->see('Connexion')
            ->seePageIs('login')
            ->visit('profile/' . \Crypt::encrypt(5))
            ->see('Connexion')
            ->seePageIs('login')
            ->visit('usersEditAccess/' . \Crypt::encrypt(5))
            ->see('Connexion')
            ->seePageIs('login')
            ->visit('users/1')
            ->see('Connexion')
            ->seePageIs('login');

        Auth::loginUsingId(4);
        $url401 = $this->call('GET', 'users/activation/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        $this->visit('profile/' . \Crypt::encrypt(5))
            ->see('Profil');
        $url401 = $this->call('GET', 'usersEditAccess/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'users/1');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(3);
        $url401 = $this->call('GET', 'users/activation/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        $this->visit('profile/' . \Crypt::encrypt(5))
            ->see('Profil');
        $url401 = $this->call('GET', 'usersEditAccess/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'users/1');
        $this->assertEquals(401, $url401->status());
        Auth::logout();


        Auth::loginUsingId(2);
        $url401 = $this->call('GET', 'users/activation/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        $this->visit('profile/' . \Crypt::encrypt(5))
            ->see('Profil');
        $url401 = $this->call('GET', 'usersEditAccess/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'users/1');
        $this->assertEquals(401, $url401->status());
        Auth::logout();


        Auth::loginUsingId(1);
        $this->visit('users/activation/' . \Crypt::encrypt(5))
            ->see('Rechercher')
            ->visit('profile/' . \Crypt::encrypt(5))
            ->see('Profil')
            ->visit('usersEditAccess/' . \Crypt::encrypt(4))
            ->see('Client')
            ->see('Enregistrer')
            ->visit('users/1')
            ->see('Liste des utilisateurs');
    }

    public function testRoutePermissionSearch()
    {
        $this->visit('searchHome')
            ->see('Rechercher');

        Auth::loginUsingId(4);
        $this->visit('searchHome')
            ->see('Rechercher')
            ->seePageIs("searchHome");
        Auth::logout();

        Auth::loginUsingId(3);
        $this->visit('searchHome')
            ->see('Rechercher')
            ->seePageIs("searchHome");
        Auth::logout();

        Auth::loginUsingId(2);
        $this->visit('searchHome')
            ->see('Rechercher')
            ->seePageIs("searchHome");
        Auth::logout();

        Auth::loginUsingId(1);
        $this->visit('searchHome')
            ->see('Rechercher')
            ->seePageIs("searchHome");
        Auth::logout();
    }

    public function testRoutePermissionSearchHistory()
    {
        $url302 = $this->call('GET', 'searchHistory');
        $this->assertEquals(302, $url302->status());
        $this->visit('searchHistory')
            ->see('Connexion')
            ->seePageIs('login');

        Auth::loginUsingId(4);
        $url401 = $this->call('GET', 'searchHistory');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(3);
        $url401 = $this->call('GET', 'searchHistory');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(2);
        $url401 = $this->call('GET', 'searchHistory');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(1);
        $this->visit('searchHistory')
            ->see('Historique de recherche')
            ->seePageIs('searchHistory');
        Auth::logout();
    }

    public function testRoutePermissionTransaction()
    {
        $url302 = $this->call('GET', 'transactionList');
        $this->assertEquals(302, $url302->status());
        $url302 = $this->call('GET', 'transactionView/' . \Crypt::encrypt(5));
        $this->assertEquals(302, $url302->status());

        Auth::loginUsingId(4);
        $url401 = $this->call('GET', 'transactionList');
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'transactionView/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(3);
        $url401 = $this->call('GET', 'transactionList');
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'transactionView/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(2);
        $url401 = $this->call('GET', 'transactionList');
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'transactionView/' . \Crypt::encrypt(5));
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(1);
        $this->visit('transactionList')
            ->see('Liste des commandes')
            ->seePageIs("transactionList");
        $this->visit('transactionView/' . \Crypt::encrypt(5))
            ->see('Commande numéro')
            ->see('Document');
    }

    public function testRoutePermissionCollection()
    {
        $url302 = $this->call('GET', 'Collection');
        $this->assertEquals(302, $url302->status());

        Auth::loginUsingId(4);
        $url401 = $this->call('GET', 'Collection');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(3);
        $url401 = $this->call('GET', 'Collection');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(2);
        $url401 = $this->call('GET', 'Collection');
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(1);
        $this->visit('Collection')
            ->see('Collections')
            ->see('Ajouter une collection')
            ->seePageIs('Collection');
        Auth::logout();
    }

    public function testRoutePermissionCollectionEdit()
    {
        $url302 = $this->call('GET', 'addCollection');
        $this->assertEquals(302, $url302->status());
        $url302 = $this->call('GET', 'collectionEdition/' . \Crypt::encrypt(1));
        $this->assertEquals(302, $url302->status());

        Auth::loginUsingId(4);
        $url401 = $this->call('GET', 'addCollection');
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'collectionEdition/' . \Crypt::encrypt(1));
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(3);
        $url401 = $this->call('GET', 'addCollection');
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'collectionEdition/' . \Crypt::encrypt(1));
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(2);
        $url401 = $this->call('GET', 'addCollection');
        $this->assertEquals(401, $url401->status());
        $url401 = $this->call('GET', 'collectionEdition/' . \Crypt::encrypt(1));
        $this->assertEquals(401, $url401->status());
        Auth::logout();

        Auth::loginUsingId(1);
        $this->visit('addCollection')
            ->see('Ajouter une collection')
            ->see('Enregistrer')
            ->seePageIs('addCollection')
            ->visit('collectionEdition/' . \Crypt::encrypt(1))
            ->see('Éditer une collection')
            ->see('Enregistrer');
        Auth::logout();
    }
}
