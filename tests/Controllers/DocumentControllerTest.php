<?php

use App\Card;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testImportDocuments()
    {
        Auth::loginUsingId(1);
        $importLink = 'importDocument';
        $this->visit($importLink)
           ->seePageIs($importLink)
           ->see('Rapport d\'importation');
    }

    public function testGetCardNumberFromFileName()
    {
        $expected = '17600';
        $filename = 'IP33_DC_31D_2_17600.jpg';
        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->getCardNumberFromFileName($filename);

        $this->assertEquals($expected, $actual);
    }
    public function testGetCollectionFromFileName()
    {
        $expected = 'IP33';
        $filename = 'IP33_DC_31D_2_17600.jpg';
        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->getCollectionFromFileName($filename);

        $this->assertEquals($expected, $actual);
    }

    public function testCardDocumentAssociationCardNotExist()
    {
        $fileName = 'IP987_ZX_12A_1_1_ABC';
        $expected = array(
            'fileName' => $fileName,
            'cardNumber' => '',
            'collection' => 'IP987',
            'comment' => "La fiche n'existe pas",
            'status' => 0,
        );
        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->cardDocumentAssociation($fileName);

        $this->assertEquals($expected, $actual);
    }

    public function testIsCardExistTrue()
    {
        $cardNumber = 2;
        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->isCardExist($cardNumber);

        $this->assertTrue($actual);
    }

    public function testIsCardExistFalse()
    {
        $cardNumber = 'ABC';
        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->isCardExist($cardNumber);

        $this->assertFalse($actual);
    }

    public function testIsCardCollectionMatchTrue()
    {
        $card = Card::create([
            'card_type_id' => 5,
            'card_number' => 9999999,
            'collection_id' => 8,
        ]);

        $cardNumber = $card['card_number'];
        $fileCollection = 'IP22';

        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->isCardCollectionMatch($cardNumber, $fileCollection);

        $this->assertTrue($actual);
    }

    public function testIsCardCollectionMatchFalse()
    {
        $card = Card::create([
            'card_type_id' => 5,
            'card_number' => 9999999,
            'collection_id' => 8,
        ]);

        $cardNumber = $card['card_number'];
        $fileCollection = 'IP2';

        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->isCardCollectionMatch($cardNumber, $fileCollection);

        $this->assertFalse($actual);
    }

    public function testDownloadImage()
    {
        $collection = 'IP33';
        $filename = 'IP33_DC_31D_2_17600';
        $expected = '';

        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->downloadImage($collection, $filename);

        $this->assertEquals($expected, $actual);
    }

    public function testGetImage()
    {
        Auth::loginUsingId(1);
        $collection = 'IP33';
        $filename = 'IP33_DC_31D_2_17600';
        $expected = '';

        $documentController = new App\Http\Controllers\DocumentController();

        $actual = $documentController->getImage($collection, $filename);

        $this->assertEquals($expected, $actual);
    }
}
