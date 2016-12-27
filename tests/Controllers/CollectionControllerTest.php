<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CollectionControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testAddCollection()
    {
        Auth::loginUsingId(1);
        $url = '/addCollection';
        $this->visit($url)
            ->see('Ajouter une collection')
            ->see('Cote de fond')
            ->see('Titre de fond')
            ->see('Enregistrer')
            ->see('Annuler')
            ->seePageIs($url);
    }
    public function testEditCollection()
    {
        Auth::loginUsingId(1);
        $url = '/collectionEdition/'.\Crypt::encrypt(1);
        $this->visit($url)
            ->see('Cote de fond')
            ->type('TestCollection', 'code')
            ->type('TestCollection', 'name')
            ->press('Enregistrer')
            ->seeInDatabase('collections', ['id' => 1, 'code' => 'TestCollection', 'name' => 'TestCollection'])
            ->seePageIs('Collection');
    }
    public function testDisable()
    {
        Auth::loginUsingId(1);
        $id = \Crypt::encrypt(1);
        $url = '/collectionEdition/'.$id;
        $collectionController = new \app\Http\Controllers\CollectionController();

        $collectionController->disable($id);

        $this->visit($url)
            ->seeInDatabase('collections', ['id' => 1, 'state' => 0]);
    }
    public function testActivate()
    {
        Auth::loginUsingId(1);
        $id = \Crypt::encrypt(1);
        $url = '/collectionEdition/'.$id;
        $collectionController = new \app\Http\Controllers\CollectionController();

        $collectionController->activate($id);

        $this->visit($url)
            ->seeInDatabase('collections', ['id' => 1, 'state' => 1]);
    }
}
