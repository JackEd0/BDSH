<?php

namespace app\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        //return view('welcome');
        return view('auth.login');
    }

    //Appel des vues de shs (société d'histoire de sherbrooke)
    public function shsHome()
    {
        //return view('shs.home');
        return view('auth.login');
    }
    public function shsSearch()
    {
        return view('shs.search');
    }
}
