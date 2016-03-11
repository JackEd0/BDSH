<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class UtilisateursController extends Controller
{
    //
    public function index () {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index',compact('utilisateurs'));
    }
    public function show ($email) {
        $utilisateurs = Utilisateur::where('email',$email)->firstOrFail();
        return view('utilisateurs.index',compact('utilisateurs'));
    }
}
