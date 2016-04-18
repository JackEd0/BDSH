<?php

namespace app\Http\Controllers;

use App\Card;
use App\CardAssociation;
use App\CardAttribute;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * UserController constructeur: redirige vers 'login' si l'on n'est pas connecté.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function searchCard()
    {
        $cardList = Card::all();
        $cardAssociationList = CardAssociation::all();
        $cardAttributeList = CardAttribute::all();

        return view('search.searchCard', compact('cardAssociationList', 'cardAttributeList', 'cardList'));
    }
}
