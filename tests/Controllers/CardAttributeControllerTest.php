<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardAttributeControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test d'ajout de l'attribut d'une fiche.
     */
    public function testAddCardAttribute()
    {
        Auth::loginUsingId(1);
        $this->visit('addCardAttribute')
            ->type('Test de champ', 'nameFr')
            ->type('Test of champ', 'nameEn')
            ->select(1, 'cardTypeList[]')
            ->click('Ajouter');
    }

    /**
     * Test de modification de l'attribut d'une fiche.
     */
    public function testEditCard()
    {
        Auth::loginUsingId(1);
        //Paramètres: {id}/{nameFr}/{nameEn}/{hideIfEmpty}/{userPermitLevel}
        $this->get('editCardAttribute/1/Donateurs/Donators/1/2')
            ->seeInDatabase('card_attributes', ['name_fr' => 'Donateurs']);
    }

    /**
     * Test de suppression de l'attribut d'une fiche.
     */
    public function testDeleteCardAttribute()
    {
        Auth::loginUsingId(1);
        //Suppression du champ Donateur dans Archives
        //Paramètres: {attributeId}/{cardTypeId}
        $this->get('deleteCardAttribute/1/1')
            ->dontSeeInDatabase('card_attribute_types', ['card_type_id' => 1, 'card_attribute_id' => 1])
            ->seeInDatabase('card_attributes', ['name_fr' => 'Donateur']);
        //Suppression du champ numéro négatif dans Images (Le champ va aussi être supprimé dans la liste commune des champs)
        $this->get('deleteCardAttribute/45/5')
            ->dontSeeInDatabase('card_attribute_types', ['card_type_id' => 5, 'card_attribute_id' => 45])
            ->dontSeeInDatabase('card_attributes', ['name_fr' => 'Numéro du négatif'])
            ->dontSeeInDatabase('card_associations', ['card_attribute_id' => 45]);
    }

    /**
     * Test de changement d'ordre d'un attribut.
     */
    public function testOrderCardAttribute()
    {
        Auth::loginUsingId(1);
        //Paramètres: orderCardAttribute/{attributeId}/{requestType}/{cardTypeId}
        //-1 pour monter de position
        $this->get('orderCardAttribute/4/-1/1')
            ->seeInDatabase('card_attribute_types', ['card_type_id' => 1, 'card_attribute_id' => 4, 'position' => 3])
            //+1 pour descendre de position
            ->get('orderCardAttribute/5/1/1')
            ->seeInDatabase('card_attribute_types', ['card_type_id' => 1, 'card_attribute_id' => 5, 'position' => 6]);
    }
}
