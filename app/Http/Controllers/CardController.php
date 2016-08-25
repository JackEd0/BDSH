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
use App\Document;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseManager;

class CardController extends BaseController
{
    /**
     * UserController constructeur: redirige vers 'login' si l'on n'est pas connecté.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**Redirige vers la vue de création de fiche
     * @return View
     */
    public function addCard()
    {
        return view('cards.addCard');
    }

    /**Crée une fiche
     * @return View
     */
    protected function create()
    {
        $cardTypeId = Input::get('cardTypeSelect');

        $card = Card::create([
            'card_type_id' => $cardTypeId,
        ]);

        $cardAttributeTypes = CardAttributeType::where('card_type_id', '=', $cardTypeId)->get();
        foreach ($cardAttributeTypes as $cardAttributeType) {
            CardAssociation::create([
                'value' => Input::get($cardAttributeType->card_attribute_id),
                'card_id' => $card->id,
                'card_attribute_id' => $cardAttributeType->card_attribute_id,
            ]);
        }

        $cardFiles = Input::get('fileNames');
        $cardFiles = json_decode($cardFiles);

        foreach ($cardFiles->fileNames as $file){
            if($file != null){
                Document::create([
                    'file_name'=> $file->fileName,
                    'card_id'=> $card->id,
                ]);
            }
        }

        return Redirect::to('search');

        //       return json_encode($cardFiles->fileNames[0]->fileName);
    }

    /**
     * Retourne la liste des attributs d'un type de fiche
     * @param $cardTypeId
     * @return string
     */
    public function getCardTypeAttribute($cardTypeId)
    {
        return json_encode(CardAttributeType::where('card_type_id', '=', $cardTypeId)->leftjoin('card_attributes', 'card_attributes.id', '=', 'card_attribute_types.card_attribute_id')->get());
    }

    /**
     * Retourne la vue de modification de fiche
     * @param $id
     * @return View
     */
    protected function goToCardEditView($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();
        $cardAssociationList = CardAssociation::where('card_id', $card->id)->get();

        return view('cards.editCard', compact('card', 'cardAssociationList'));
    }

    /**Modifie une fiche
     * @param $id
     * @return mixed
     */
    protected function updateCard($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();

        $cardAssociations = \DB::table('card_associations')->where('card_id', '=', $card->id)->get();
        foreach ($cardAssociations as $cardAssociation) {
            $cardAssociationLine = CardAssociation::where('id', $cardAssociation->id)->firstOrFail();
            $cardAssociationLine->value = Input::get($cardAssociation->id);
            $cardAssociationLine->save();
        }

        return Redirect::to('search');
    }

    public function addDoc(){
        return view('blank');
    }
    protected function goToCardView($id)
    {
        $id = \Crypt::decrypt($id);
        $card = Card::where('id', $id)->firstOrFail();
        $cardAssociationList = CardAssociation::where('card_id', $card->id)->get();

        return view('cards.viewCard', compact('card', 'cardAssociationList'));
    }
    public function addCardAttribute ()
    {
        return view('cards.addAttribute');
    }

    public function createCardAttribute ()
    {
        CardAttribute::create([
            'name_fr' => Input::get("nameFr"),
            'name_en' => Input::get("nameEn"),
            'hideIfEmpty' => Input::get("hideIfEmpty"),
            'userPermitLevel' => Input::get("userPermitLevel")
        ]);

        return Redirect::to("search");
    }

}
