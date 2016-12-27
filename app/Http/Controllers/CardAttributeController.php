<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Card;
use App\CardAssociation;
use App\CardAttribute;
use App\CardAttributeType;
use App\CardType;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CardAttributeController extends Controller
{
    /**
     * UserController constructeur: redirige vers 'login' si l'on n'est pas connecté.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dirige vers la vue de créatino des attributs.
     *
     * @return View
     */
    public function addCardAttribute()
    {
        $cardTypes = CardType::all();
        $userTypes = UserType::all();

        return view('cards.addAttribute', compact('cardTypes', 'userTypes'));
    }

    /**
     * Ajoute un attribut à une fiche.
     *
     * @return mixed
     */
    public function createCardAttribute()
    {
        try {
            //Vérification: Est-ce que l'enregistrement soumis existe déja dans la table attributes ?
            $attribute = CardAttribute::where('name_fr', Input::get('nameFr'))
                ->orWhere('name_en', Input::get('nameEn'))
                ->firstOrFail();
            $attributeId = $attribute->id;

            //Vérification: Est-ce que l'enregistrement soumis existe déja dans la table attributes ?
            $oldAttributes = CardAttributeType::where('card_attribute_id', $attributeId)->get();
            $oldAttributeCardIds = array();
            foreach ($oldAttributes as $oldAttribute) {
                $oldAttributeCardIds[] = $oldAttribute->card_type_id;
            }
            $cardType = Input::get('cardTypeList');
            for ($i = 0; $i < count($cardType); $i++) {
                if (!in_array($cardType[$i], $oldAttributeCardIds)) {
                    CardAttributeType::create([
                        'card_type_id' => $cardType[$i],
                        'card_attribute_id' => $attributeId,
                        'position' => CardAttributeType::where('card_type_id', $cardType[$i])->max('position') + 1,
                    ]);
                }
            }
        } catch (\Exception $e) {
            //Ajout dans la table card_attributes
            $newAttribute = CardAttribute::create([
                'name_fr' => Input::get('nameFr'),
                'name_en' => Input::get('nameEn'),
                'hide_if_empty' => (Input::has('hideIfEmpty')) ? 1 : 0,
                'user_permit_level' => Input::get('userPermitLevel'),
            ]);
            //Ajout dans la table card_attribute_types
            $cardType = Input::get('cardTypeList');
            $newAttributeId = $newAttribute->id;
            for ($i = 0; $i < count($cardType); $i++) {
                CardAttributeType::create([
                    'card_type_id' => $cardType[$i],
                    'card_attribute_id' => $newAttributeId,
                    'position' => CardAttributeType::where('card_type_id', $cardType[$i])->max('position') + 1,
                ]);
            }
        }

        return Redirect::to('addCardAttribute');
    }

    /**
     * Modifier un attribut.
     *
     * @param $id
     * @param $nameFr
     * @param $nameEn
     * @param $hideIfEmpty
     * @param $userPermitLevel
     *
     * @return mixed
     */
    public function editCardAttribute($id, $nameFr, $nameEn, $hideIfEmpty, $userPermitLevel)
    {
        $attribute = CardAttribute::where('id', $id)->firstOrFail();

        $attribute->name_fr = $nameFr;
        $attribute->name_en = $nameEn;
        $attribute->hide_if_empty = $hideIfEmpty;
        $attribute->user_permit_level = $userPermitLevel;

        $attribute->save();

        return Redirect::to('addCardAttribute');
    }

    /**
     * Supprimer un attribut.
     *
     * @param $attributeId
     * @param $cardTypeId
     *
     * @return mixed
     */
    public function deleteCardAttribute($attributeId, $cardTypeId)
    {
        //Suppression dans la table de type card_attribute_types
        $attributeType = CardAttributeType::where('card_attribute_id', $attributeId)
            ->where('card_type_id', $cardTypeId)
            ->firstOrFail();
        $attributePosition = $attributeType->position;
        $attributeType->delete();

        //Mis a jour de la position
        try {
            $attributeList = CardAttributeType::where('card_type_id', $cardTypeId)
                ->where('position', '>', $attributePosition)
                ->get();
            foreach ($attributeList as $attribute) {
                --$attribute->position;
                $attribute->save();
            }
        } catch (\Exception $e) {
        }

        //Suppression dans la table d'association card_associations
        $cardToDeleteList = Card::where('card_type_id', $cardTypeId)->get();
        $cardToDeleteListId = array();
        foreach ($cardToDeleteList as $cardToDelete) {
            $cardToDeleteListId[] = $cardToDelete->id;
        }
        CardAssociation::where('card_attribute_id', $attributeId)
        ->whereIn('card_id', $cardToDeleteListId)
        ->delete();

        //Suppression dans la table card_attributes
        try {
            CardAttributeType::where('card_attribute_id', $attributeId)->firstOrFail();
        } catch (\Exception $e) {
            $attribute = CardAttribute::where('id', $attributeId)->firstOrFail();
            $attribute->delete();
        }

        return Redirect::to('addCardAttribute');
    }

    /**
     * Modifier l'ordre d'un attribut.
     *
     * @param $attributeId
     * @param $requestType : -1 pour monter , +1 pour descendre
     * @param $cardTypeId
     *
     * @return mixed
     */
    public function orderCardAttribute($attributeId, $requestType, $cardTypeId)
    {
        $currentAttribute = CardAttributeType::where('card_attribute_id', $attributeId)
            ->where('card_type_id', $cardTypeId)
            ->firstOrFail();
        $oldPosition = $currentAttribute->position;
        $newPosition = $oldPosition + $requestType;

        if ($newPosition > 0 && $newPosition <= CardAttributeType::where('card_type_id', $cardTypeId)->max('position')) {
            $currentAttribute->position = $newPosition;

            $nextAttribute = CardAttributeType::where('position', $newPosition)
                ->where('card_type_id', $cardTypeId)
                ->firstOrFail();
            $nextAttribute->position = $oldPosition;

            $currentAttribute->save();
            $nextAttribute->save();
        }

        return Redirect::to('addCardAttribute');
    }
}
