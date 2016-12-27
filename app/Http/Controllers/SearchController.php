<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Card;
use App\CardAssociation;
use App\CardAttributeType;
use App\CardAttribute;
use App\CardType;
use App\Collection;
use App\Document;
use App\SearchHistory;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;

class SearchController extends Controller
{
    public function searchJSON(Request $request)
    {
        //$queryAssociation : Va chercher les cartes pour la vue courante du datatable (avec limit et offset)
        //$queryCount : Compte le nombre total d'éléments pour la pagination
        $checkWithPictures = addslashes($request->input('checkWithPictures'));
        if ($checkWithPictures == "checked") {
            $queryAssociation = 'SELECT DISTINCT cards.id, cards.card_number, card_types.name_fr, cards.created_at FROM cards RIGHT JOIN card_associations ON cards.id = card_id JOIN card_attributes ON card_associations.card_attribute_id = card_attributes.id JOIN card_types ON card_types.id = cards.card_type_id WHERE card_id IN (SELECT card_id FROM documents WHERE card_id IN (SELECT card_id FROM card_associations WHERE ';
            $queryCount = 'SELECT count(DISTINCT cards.id) as cardCount FROM cards RIGHT JOIN card_associations ON cards.id = card_id JOIN card_attributes ON card_associations.card_attribute_id = card_attributes.id JOIN card_types ON card_types.id = cards.card_type_id WHERE card_id IN (SELECT card_id FROM documents WHERE card_id IN (SELECT card_id FROM card_associations WHERE ';
        }
        else {
            $queryAssociation = 'SELECT DISTINCT cards.id, cards.card_number, card_types.name_fr, cards.created_at FROM cards RIGHT JOIN card_associations ON cards.id = card_id JOIN card_attributes ON card_associations.card_attribute_id = card_attributes.id JOIN card_types ON card_types.id = cards.card_type_id WHERE card_id IN (SELECT card_id FROM card_associations WHERE ';
            $queryCount = 'SELECT count(DISTINCT cards.id) as cardCount FROM cards RIGHT JOIN card_associations ON cards.id = card_id JOIN card_attributes ON card_associations.card_attribute_id = card_attributes.id JOIN card_types ON card_types.id = cards.card_type_id WHERE card_id IN (SELECT card_id FROM card_associations WHERE ';
        }

        //Premier textbox
        $searchType = addslashes($request->input('searchType'));
        if($searchType == "advanced") {
            $valeur = addslashes($request->input('searchBox1'));
            $field = addslashes($request->input('searchField1'));
        }
        else {
            $valeur = addslashes($request->input('quickSearchBox'));
            $field = 'all';
        }

        //$queryA : query temporaire d'association
        $queryA = 'value LIKE "%'.$valeur.'%")';
        //$queryC : query temporaire de "count"
        $queryC = 'value LIKE "%'.$valeur.'%")';

        if ($field != "all" && $field != "" && $valeur != "") {
            $queryA = '('.$queryA.' AND card_attribute_id = '.$field.'))';
            $queryC = '('.$queryC.' AND card_attribute_id = '.$field.'))';
        }

        $queryAssociation = $queryAssociation.$queryA;
        $queryCount = $queryCount.$queryC;

        $queryA = "";
        $queryC = "";

        if($searchType == "advanced") {
            for($i = 2; $i <= 4; $i++) {
                //Pour les autres textbox (A partir du 2e)
                $valeur = addslashes($request->input('searchBox'.$i));
                $field = addslashes($request->input('searchField'.$i));
                $condition = addslashes($request->input('searchCond'.$i));

                if($condition == "" || $condition == "Et" && $valeur != "") {
                    if($field != "all" && $field != "") {
                        $queryA = ' AND card_id IN (SELECT card_id FROM card_associations WHERE (value LIKE "%'.$valeur.'%" AND card_attribute_id = '.$field.'))';
                        $queryC = ' AND card_id IN (SELECT card_id FROM card_associations WHERE (value LIKE "%'.$valeur.'%" AND card_attribute_id = '.$field.'))';
                    }
                    else {
                        $queryA = ' AND card_id IN (SELECT card_id FROM card_associations WHERE value LIKE "%'.$valeur.'%")';
                        $queryC = ' AND card_id IN (SELECT card_id FROM card_associations WHERE value LIKE "%'.$valeur.'%")';
                    }
                }

                elseif($condition == "Ou" && $valeur != "") {
                    if($field != "all" && $field != "") {
                        $queryA = ' OR card_id IN (SELECT card_id FROM card_associations WHERE (value LIKE "%'.$valeur.'%" AND card_attribute_id = '.$field.'))';
                        $queryC = ' OR card_id IN (SELECT card_id FROM card_associations WHERE (value LIKE "%'.$valeur.'%" AND card_attribute_id = '.$field.'))';
                    }
                    else {
                        $queryA = ' OR card_id IN (SELECT card_id FROM card_associations WHERE value LIKE "%'.$valeur.'%")';
                        $queryC = ' OR card_id IN (SELECT card_id FROM card_associations WHERE value LIKE "%'.$valeur.'%")';
                    }
                }

                elseif($condition == "Exclure" && $valeur != "") {
                    if($field != "all" && $field != "") {
                        $queryA = ' AND card_id NOT IN (SELECT card_id FROM card_associations WHERE (value LIKE "%'.$valeur.'%" AND card_attribute_id = '.$field.'))';
                        $queryC = ' AND card_id NOT IN (SELECT card_id FROM card_associations WHERE (value LIKE "%'.$valeur.'%" AND card_attribute_id = '.$field.'))';
                    }
                    else {
                        $queryA = ' AND card_id NOT IN (SELECT card_id FROM card_associations WHERE value LIKE "%'.$valeur.'%")';
                        $queryC = ' AND card_id NOT IN (SELECT card_id FROM card_associations WHERE value LIKE "%'.$valeur.'%")';
                    }
                }

                $queryAssociation = $queryAssociation.$queryA;
                $queryCount = $queryCount.$queryC;
            }
        }

        //Termine la query avec les paramètres datatable
        $queryLimit = addslashes($request->input('length'));
        $queryOffset = addslashes($request->input('start'));
        $tableDraw = addslashes($request->input('draw'));

        $searchCategories = $request->input('categories');

        $first = true;
        for($i = 0; $i < count($searchCategories); $i++) {
            if ($searchCategories[$i] == "checked") {
                $categoryID = addslashes($request->input('category'.$i));
                if ($first) {
                    $queryAssociation = $queryAssociation.' AND (card_type_id = '.($i+1);
                    $queryCount = $queryCount.' AND (card_type_id = '.($i+1);
                    $first = false;
                }
                else {
                    $queryAssociation = $queryAssociation.' OR card_type_id = '.($i+1);
                    $queryCount = $queryCount.' OR card_type_id = '.($i+1);
                }
            }
        }

        if ($first == false) {
            $queryAssociation = $queryAssociation.')';
            $queryCount = $queryCount.')';
        }

        if ($checkWithPictures == "checked") {
            $queryAssociation = $queryAssociation.') LIMIT '.$queryLimit.' OFFSET '.$queryOffset;
            $queryCount = $queryCount.')';
        }
        else {
            $queryAssociation = $queryAssociation.' LIMIT '.$queryLimit.' OFFSET '.$queryOffset;
        }

        //Va chercher les attributs de chaque carte
        $cardList = DB::select($queryAssociation);
        $cardCount = DB::select($queryCount);

        $queryC = 'SELECT DISTINCT card_associations.card_id, collection_id, card_number, card_attributes.name_fr as \'attribute_name_fr\', card_associations.value, cards.created_at, card_types.name_fr FROM cards RIGHT JOIN card_associations ON cards.id = card_id JOIN card_attributes ON card_associations.card_attribute_id = card_attributes.id JOIN card_types ON card_types.id = cards.card_type_id WHERE card_id IN (';
        foreach($cardList as $card) {
            $queryC = $queryC.$card->id.',';
        }
        $queryC = $queryC.'0)';
        $cardAssociationList = DB::select($queryC);

        //Liste les attributs d'une carte à l'intérieur d'une seule cellule du datatable
        $queryResults = array();

        if(Auth::check()) {
            $currentUserType = Auth::user()->user_type_id;
        } else {
            $currentUserType = 5;
        }

        if($currentUserType < 4) {
            foreach($cardList as $card) {
                $cardAssociations = array();
                foreach($cardAssociationList as $temp) {
                    if ($temp->card_id == $card->id) {
                        $cardAssociations[] = $temp;
                    }
                }
                //$cardA : Variable temporaire d'association
                $cardA = '';
                $cardA = $cardA.'N° de fiche : '.$card->card_number.'<br/>';
                foreach($cardAssociations as $association) {
                    $cardA = $cardA.$association->attribute_name_fr.' : ';
                    //TODO : Faire le surlignement des résultats
                    //$request->input('searchBox1')
                    /*$valeur = addslashes($request->input('searchBox1'));
                    if(strpos($association->value, $valeur) != false) {

                        $cardA = $cardA . '<span style="background-color:yellow;">' . $association->value.'</span><br/>';
                    }
                    else {
                        $cardA = $cardA . $association->value.'<br/>';
                    }*/
                    $cardA = $cardA . $association->value.'<br/>';
                }

                //Actions - Buttons
                $btnTable = '<a href="cards/view/'.\Crypt::encrypt($card->id).'" class="btn btn-default">Visualiser</a>';

                if ($currentUserType == 1) {
                    $btnTable = $btnTable . '<a href="cards/edit/' . \Crypt::encrypt($card->id) . '" class="btn btn-default">Modifier</a>';
                    $btnTable = $btnTable . '<a href="cards/delete/' . \Crypt::encrypt($card->id) . '" class="btn btn-default" onclick="if (!confirm(\'Vous êtes sûr de vouloir continuer ?\')) return false ;">Supprimer</a>';
                }

                try {
                    $cardPreview = DB::select('select file_name from documents where card_id = "' . $card->id . '" limit 1');
                    $cardPreview = $cardPreview[0]->file_name;
                    $collection =  explode('_', $cardPreview)[0];
                    $documentPath = url("/images/".$collection."/".$cardPreview);
                    $queryResults[] = array(
                        "card_type" => $card->name_fr . ' <br /><a href="cards/view/' . \Crypt::encrypt($card->id) . '"><img src="' . $documentPath . '" style="width:100%"></a>',
                        "value" => $cardA,
                        "created_at" => substr($card->created_at,0,10),
                        "buttons" => $btnTable
                    );
                } catch (\Exception $e) {
                    $queryResults[] = array(
                        "card_type" => $card->name_fr . ' <br /><a href="cards/view/' . \Crypt::encrypt($card->id) . '"><img src="/img/search-page/' . $card->name_fr . '.jpg" style="width:100%"></a>',
                        "value" => $cardA,
                        "created_at" => substr($card->created_at,0,10),
                        "buttons" => $btnTable
                    );
                }

            }
        } else {
            foreach($cardList as $card) {
                $cardAssociations = array();
                foreach($cardAssociationList as $temp) {
                    if ($temp->card_id == $card->id) {
                        $cardAssociations[] = $temp;
                    }
                }
                //$cardA : Variable temporaire d'association
                $cardA = '';
                $cardA = $cardA.'N° de fiche : '.$card->card_number.'<br/>';
                foreach($cardAssociations as $association) {
                    $cardA = $cardA.$association->attribute_name_fr.' : ';
                    //TODO : Faire le surlignement des résultats
                    //$request->input('searchBox1')
                    /*$valeur = addslashes($request->input('searchBox1'));
                    if(strpos($association->value, $valeur) != false) {

                        $cardA = $cardA . '<span style="background-color:yellow;">' . $association->value.'</span><br/>';
                    }
                    else {
                        $cardA = $cardA . $association->value.'<br/>';
                    }*/
                    $cardA = $cardA . $association->value.'<br/>';
                }

                //Actions - Buttons
                $btnTable = '<a href="cards/view/'.\Crypt::encrypt($card->id).'" class="btn btn-default">Visualiser</a>';

                try {
                    $cardPreview = DB::select('select file_name from documents where card_id = "' . $card->id . '" limit 1');
                    $cardPreview = $cardPreview[0]->file_name;
                    $collection =  explode('_', $cardPreview)[0];
                    $documentPath = url("/images/".$collection."/".$cardPreview);
                    $queryResults[] = array(
                        "card_type" => $card->name_fr . ' <br /><a href="cards/view/' . \Crypt::encrypt($card->id) . '"><img src="' . $documentPath . '" style="width:100%"></a>',
                        "value" => $cardA,
                        "buttons" => $btnTable
                    );
                } catch (\Exception $e) {
                    $queryResults[] = array(
                        "card_type" => $card->name_fr . ' <br /><a href="cards/view/' . \Crypt::encrypt($card->id) . '"><img src="/img/search-page/' . $card->name_fr . '.jpg" style="width:100%"></a>',
                        "value" => $cardA,
                        "buttons" => $btnTable
                    );
                }

            }
        }

        return json_encode(array("draw" => $tableDraw, "recordsTotal" => $cardCount[0]->cardCount, "recordsFiltered" => $cardCount[0]->cardCount, "data" => $queryResults));
     }

    public function search(Request $request)
    {
        $cardAttributeList = CardAttribute::orderBy('name_fr', 'asc')->get();
        $cardTypeList = CardType::orderBy('name_fr', 'asc')->get();;

        //Ces champs doivent être présent sur la page des résultats de recherche pour que
        //l'appel Ajax du datatable fonctionne.
        $quickSearchBox = $request->input('quickSearchBox');
        $searchBox1 = $request->input('searchBox1');
        $searchBox2 = $request->input('searchBox2');
        $searchBox3 = $request->input('searchBox3');
        $searchBox4 = $request->input('searchBox4');

        $searchFieldName1 = $request->input('searchFieldName1');
        $searchFieldName2 = $request->input('searchFieldName2');
        $searchFieldName3 = $request->input('searchFieldName3');
        $searchFieldName4 = $request->input('searchFieldName4');

        $searchField1 = $request->input('search_field1');
        $searchField2 = $request->input('search_field2');
        $searchField3 = $request->input('search_field3');
        $searchField4 = $request->input('search_field4');

        $searchCond2 = $request->input('search_cond2');
        $searchCond3 = $request->input('search_cond3');
        $searchCond4 = $request->input('search_cond4');

        $searchType = $request->input('searchType');

        $categories = array();
        for ($i = 0; $i < count($cardTypeList); $i++) {
            if (Input::has('category'.$i)) {
                $categories[$i] = 'checked';
            }
            else {
                $categories[$i] = ' ';
            }
        }

        $checkWithPictures = '';
        if (Input::has('checkWithPictures')) {
            $checkWithPictures = 'checked';
        }

        if($searchType == "advanced" && $searchBox1 != null && $searchBox1 != "") {
            $termSearched = $searchBox1;
        } elseif ($searchType == "quick" && $quickSearchBox != null && $quickSearchBox != "") {
            $termSearched = $quickSearchBox;
        } else {
            $termSearched = null;
        }
        if(Auth::user() && $termSearched != "" && $termSearched != null) {
            SearchHistory::create([
                'term' => $termSearched,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now('America/Toronto')->format('Y-m-d H:i:s'),
            ]);
        }

        return view('search.searchCard', compact('categories', 'cardTypeList','searchType', 'quickSearchBox', 'searchFieldName1','searchFieldName2', 'searchFieldName3', 'searchFieldName4', 'checkWithPictures','cardAttributeList', 'cardAttributeTypeList', 'cardTypeList', 'searchBox1', 'searchBox2', 'searchBox3', 'searchBox4', 'searchField1', 'searchField2', 'searchField3', 'searchField4', 'searchCond2', 'searchCond3', 'searchCond4'));

    }

    public function searchHome()
    {
        $cardAttributeList = CardAttribute::all();
        $cardAttributeTypeList = CardAttributeType::all();
        $cardTypeList = CardType::all();

        return view('search.searchHome', compact('cardAttributeList', 'cardAttributeTypeList', 'cardTypeList'));
    }

    /**
     * Affiche tout l'historique de recherche.
     *
     * @return View
     */
    public function searchHistory()
    {
        $history = SearchHistory::all();
        $historyNumber = $history->count();
        $historyUserName = array();
        $historyUserType = array();
        foreach ($history as $term) {
            $historyUser = User::where('id', $term->user_id)->firstOrFail();
            $historyUserName[] = $historyUser->username;
            $historyUserType[] = UserType::where('id', $historyUser->user_type_id)->firstOrFail()->name_fr;
        }

        return view('search.searchHistory', compact('history', 'historyNumber', 'historyUserName', 'historyUserType'));
    }

    /**
     * Supprime tout l'historique de recherche.
     *
     * @return mixed
     */
    public function deleteAllHistory()
    {
        \DB::table('search_history')->delete();

        return Redirect::to('searchHistory');
    }

    /**
     * Supprime l'historique de recherche entre les dates de débuts et de fin.
     *
     * @param $startDate
     * @param $endDate
     *
     * @return mixed
     */
    public function deleteHistory($startDate, $endDate)
    {
        SearchHistory::where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->delete();

        return Redirect::to('searchHistory');
    }

    /**
     * Affiche l'historique de recherche entre la date de début
     * et de fin.
     *
     * @param $startDate
     * @param $endDate
     *
     * @return View
     */
    public function viewHistory($startDate, $endDate)
    {
        $history = SearchHistory::where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->get();
        $historyNumber = SearchHistory::all()->count();
        $historyUserName = array();
        $historyUserType = array();
        foreach ($history as $term) {
            $historyUser = User::where('id', $term->user_id)->firstOrFail();
            $historyUserName[] = $historyUser->username;
            $historyUserType[] = UserType::where('id', $historyUser->user_type_id)->firstOrFail()->name_fr;
        }

        return view('search.searchHistory', compact('history', 'historyNumber', 'historyUserName', 'historyUserType'));
    }

    public function historyResult ($searchedTerm)
    {
        $cardAttributeList = CardAttribute::orderBy('name_fr', 'asc')->get();
        $cardTypeList = CardType::orderBy('name_fr', 'asc')->get();;

        //Ces champs doivent être présent sur la page des résultats de recherche pour que
        //l'appel Ajax du datatable fonctionne.
        $quickSearchBox = $searchedTerm;
        $searchBox1 = $searchedTerm;
        $searchBox2 = "";
        $searchBox3 = "";
        $searchBox4 = "";

        $searchFieldName1 = "";
        $searchFieldName2 = "";
        $searchFieldName3 = "";
        $searchFieldName4 = "";

        $searchField1 = "all";
        $searchField2 = "all";
        $searchField3 = "all";
        $searchField4 = "all";

        $searchCond2 = "Et";
        $searchCond3 = "Et";
        $searchCond4 = "Et";

        $searchType = "quick";

        $categories = array();
        for ($i = 0; $i < count($cardTypeList); $i++) {
            if (Input::has('category'.$i)) {
                $categories[$i] = 'checked';
            }
            else {
                $categories[$i] = ' ';
            }
        }

        $checkWithPictures = '';
        if (Input::has('checkWithPictures')) {
            $checkWithPictures = 'checked';
        }


        return view('search.searchCard', compact('categories', 'cardTypeList','searchType', 'quickSearchBox', 'searchFieldName1','searchFieldName2', 'searchFieldName3', 'searchFieldName4', 'checkWithPictures','cardAttributeList', 'cardAttributeTypeList', 'cardTypeList', 'searchBox1', 'searchBox2', 'searchBox3', 'searchBox4', 'searchField1', 'searchField2', 'searchField3', 'searchField4', 'searchCond2', 'searchCond3', 'searchCond4'));

    }
}