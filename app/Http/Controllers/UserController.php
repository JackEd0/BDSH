<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 17/02/2016
 * Time: 20:09
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Utilisateur;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends BaseController
{
    //
    public function login () {
        return view('users.login');
    }
    public function check() {
        $inputs = Input::all();
        $inputs['username'] = e($inputs['username']);
        $inputs['password'] = e($inputs['password']);
        $validation = Validator::make($inputs,[
           'username'=>'required',
            'password'=>'required',
        ]);
        if($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }
        else {
            if(Auth::attempt(['username'=>$inputs['username'],'password'=>$inputs['password']])) {
                Auth::attempt(['username'=>$inputs['username'],'password'=>$inputs['password']]);
                return view('shs');
            }
            else{
                return Redirect::back()->with('error', "Mot de passe ou nom d'utilisateur incorrect");
            }
        }

    }
}
