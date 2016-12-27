<?php

use App\CardAttributeType;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test de modification d'une fiche.
     */
    public function testEditCard()
    {
        Auth::loginUsingId(1);
        $editLink = 'cards/edit/'.\Crypt::encrypt(2);
        $this->visit($editLink)
            ->type('Test de description', '6')
            ->press('Enregistrer')
            ->seePageIs('searchHome')
            ->visit('cards/view/'.\Crypt::encrypt(2))
            ->see('Test de description');
    }

    public function testAddCard()
    {
        Auth::loginUsingId(1);
        $this->visit('addCard')
            ->press('Enregistrer')
            ->seePageIs('searchHome');
    }
    public function testGetCardNumberFromFileName()
    {
        $expected = '17600';
        $filename = 'IP33_DC_31D_2_17600.jpg';
        $cardController = new App\Http\Controllers\CardController();

        $actual = $cardController->getCardNumberFromFileName($filename);

        $this->assertEquals($expected, $actual);
    }
    public function testGetCollectionFromFileName()
    {
        $expected = 'IP33';
        $filename = 'IP33_DC_31D_2_17600.jpg';
        $cardController = new App\Http\Controllers\CardController();

        $actual = $cardController->getCollectionFromFileName($filename);

        $this->assertEquals($expected, $actual);
    }

    public function testGetCardTypeAttribute()
    {
        $cardTypeId = 4;
        $expected = json_encode(CardAttributeType::where('card_type_id', '=', $cardTypeId)
            ->leftjoin('card_attributes', 'card_attributes.id', '=', 'card_attribute_types.card_attribute_id')
            ->orderBy('position', 'asc')
            ->get());

        $cardController = new App\Http\Controllers\CardController();

        $actual = $cardController->getCardTypeAttribute($cardTypeId);

        $this->assertEquals($expected, $actual);
    }

    public function testGoToCardView()
    {
        Auth::loginUsingId(1);
        $url = '/cards/view/'.\Crypt::encrypt(1);
        $this->visit($url)
            ->see('Type de fiche')
            ->see('Retour')
            ->seePageIs($url);
    }

    public function testGoToCardViewReturnToSearch()
    {
        Auth::loginUsingId(1);
        $url = '/cards/view/'.\Crypt::encrypt(1);
        $this->visit($url)
            ->click('Retour')
            ->seePageIs($url);
    }
}
