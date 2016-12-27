<?php
/**
 * Created by PhpStorm.
 * User: matcaron
 * Date: 2016-04-04
 * Time: 4:06 PM.
 */

namespace app\Http\Controllers;

use App\Card;
use App\CardAssociation;
use App\CardAttribute;
use App\CardAttributeType;
use App\CardType;
use App\Collection;
use App\Document;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CardController extends BaseController
{
    /**Redirige vers la vue de création de fiche
     * @return View
     */
    public function addCard()
    {
        $cardTypes = CardType::all();
        $cardNumber = array();
        foreach ($cardTypes as $cardType) {
            $cardNumber[] = Card::where('card_type_id', $cardType->id)
                    ->max('card_number') + 1;
        }
        $collections = Collection::where('state', 1)->get();

        return view('cards.addCard', compact('cardTypes', 'cardNumber', 'collections'));
    }

    /**Créer une fiche
     * @return View
     */
    protected function create()
    {
        $cardTypeId = Input::get('cardTypeSelect');
        $cardNumber = Card::where('card_type_id', $cardTypeId)->max('card_number') + 1;
        $collectionId = null;
        if (Input::get('collectionSelect') != 0) {
            $collectionId = Input::get('collectionSelect');
        }

        $card = Card::create([
            'card_type_id' => $cardTypeId,
            'card_number' => $cardNumber,
            'collection_id' => $collectionId,
        ]);

        $cardAttributeTypes = CardAttributeType::where('card_type_id', '=', $cardTypeId)->get();
        foreach ($cardAttributeTypes as $cardAttributeType) {
            CardAssociation::create([
                'value' => Input::get($cardAttributeType->card_attribute_id),
                'card_id' => $card->id,
                'card_attribute_id' => $cardAttributeType->card_attribute_id,
            ]);
        }

        try {
            $cardFiles = Input::get('fileNames');
            $cardFiles = json_decode($cardFiles);
            $collection = Collection::where('id', $card->collection_id)->firstOrFail();
            foreach ($cardFiles->fileNames as $file) {
                if ($file != null) {
                    $cardNumber = $this->getCardNumberFromFileName($file->fileName);
                    $fileCollection = $this->getCollectionFromFileName($file->fileName);
                    if ($cardNumber == $card->card_number && $collection->code == $fileCollection) {
                        Document::create([
                            'file_name' => $file->fileName,
                            'card_id' => $card->id,
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
        }

        return Redirect::to('searchHome');
    }

    public function getCardNumberFromFileName($fileName)
    {
        while (substr_count($fileName, '_') != 0) {
            $fileName = substr($fileName, 1);
        }

        return substr($fileName, 0, strpos($fileName, '.'));
    }

    public function getCollectionFromFileName($fileName)
    {
        $collection = explode('_', $fileName);

        return $collection[0];
    }

    /**
     * Retourne la liste des attributs d'un type de fiche.
     *
     * @param $cardTypeId
     *
     * @return string
     */
    public function getCardTypeAttribute($cardTypeId)
    {
        return json_encode(CardAttributeType::where('card_type_id', '=', $cardTypeId)
            ->leftjoin('card_attributes', 'card_attributes.id', '=', 'card_attribute_types.card_attribute_id')
            ->orderBy('position', 'asc')
            ->get());
    }

    /**
     * Retourne la vue de modification de fiche.
     *
     * @param $id
     *
     * @return View
     */
    protected function goToCardEditView($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();
        $cardTypes = CardType::all();
        $collections = Collection::where('state', 1)->get();
        $cardCollection = Collection::where('id', $card->collection_id)->first();
        $cardInfos = CardAttributeType::where('card_type_id', $card->card_type_id)->get();

        foreach ($cardInfos as $cardInfo) {
            $attributeInfo = CardAttribute::where('id', $cardInfo->card_attribute_id)->firstOrFail();
            $cardInfo['card_attribute_id'] = $attributeInfo['id'];
            $cardInfo['name_fr'] = $attributeInfo['name_fr'];
            $cardInfo['name_en'] = $attributeInfo['name_en'];
            $attributeInfo = CardAssociation::where([['card_attribute_id', $cardInfo->card_attribute_id], ['card_id', $id]])->first();
            $cardInfo['card_association_id'] = $attributeInfo['id'];
            $cardInfo['value'] = $attributeInfo['value'];
        }

        $fileList = Document::where('card_id', '=', $card->id)->get();

        return view('cards.editCard', compact('card', 'cardTypes', 'fileList', 'cardInfos', 'collections', 'cardCollection'));
    }

    /**Modifie une fiche
     * @param $id
     * @return mixed
     */
    protected function updateCard($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();

        $collectionId = null;
        if (Input::get('collectionSelect') != 0) {
            $collectionId = Input::get('collectionSelect');
        }

        $card->collection_id = $collectionId;

        $cardAssociations = \DB::table('card_associations')->where('card_id', '=', $card->id)->get();
        foreach ($cardAssociations as $cardAssociation) {
            $cardAssociationLine = CardAssociation::where('id', $cardAssociation->id)->firstOrFail();
            $cardAssociationLine->value = Input::get($cardAssociation->card_attribute_id);
            $cardAssociationLine->save();
        }
        try {
            //ADD NEW FILES
            $cardFiles = \DB::table('documents')->where('card_id', '=', $card->id)->get();
            $newCardFiles = json_decode(Input::get('fileNames'));

            foreach ($newCardFiles->fileNames as $newFile) {
                $new = true;
                foreach ($cardFiles as $cardFile) {
                    if ($cardFile->file_name == $newFile->fileName) {
                        $new = false;
                    }
                }
                if ($newFile != null && $new == true) {
                    Document::create([
                        'file_name' => $newFile->fileName,
                        'card_id' => $card->id,
                    ]);
                }
            }
            // DELETE FILES
            foreach ($cardFiles as $cardFile => $element) {
                $delete = true;
                foreach ($newCardFiles->fileNames as $newFile) {
                    if ($element->file_name == $newFile->fileName) {
                        $delete = false;
                    }
                }
                if ($newFile != null && $delete == true) {
                    $document = Document::where('id', $element->id)->firstOrFail();
                    $document->delete();
                }
            }
        } catch (\Exception $e) {
        }
        $card->save();

        return Redirect::to('searchHome');
    }

    // Nécessaire pour l'ajout au panier
    public function addDoc()
    {
        return view('blank');
    }

    protected function goToCardView($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();
        $cardType = CardType::where('id', $card->card_type_id)->firstOrFail();
        $collection = Collection::where('id', $card->collection_id)->first();
        $attributeInfos = CardAssociation::where('card_id', $card->id)->get();
        $fileList = Document::where('card_id', '=', $card->id)->get();

        foreach ($attributeInfos as $attribute) {
            $attributeInfo = CardAttribute::where('id', $attribute->card_attribute_id)->firstOrFail();
            $attribute['name_fr'] = $attributeInfo['name_fr'];
            $attribute['name_en'] = $attributeInfo['name_en'];
        }

        return view('cards.viewCard', compact('card', 'fileList', 'collection'))
            ->with(array(
                'cardType' => $cardType,
                'attributeInfos' => $attributeInfos,
            ));
    }

    public function deleteCard($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();
        CardAssociation::where('card_id', $id)->delete();
        Document::where('card_id', $id)->delete();
        $card->delete();

        return Redirect::to('searchHome');
    }
}
