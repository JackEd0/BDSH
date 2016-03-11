<?php

namespace App\Http\Controllers;

use App\User;
use App\Utilisateur;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index () {
        return view ('welcome');
    }
    public function shs () {
        return view ('shs.shs');
    }
    public function shsSearch () {
        return view ('shs.search');
    }
    public function auth () {
        return view ('myAut.index');
    }
    public function signup () {
        return view ('myAut.signup');
    }
    public function usersList () {
        $utilisateurs = Utilisateur::paginate(5);
        return view ('shs.usersList',compact('utilisateurs'));
    }
    public function usersEdit ($email) {
        $utilisateur = Utilisateur::where('email',$email)->firstOrFail();
        $userType = $utilisateur->userType_id;
        return view('shs.usersEdit',compact('utilisateur','userType'));
    }
}
