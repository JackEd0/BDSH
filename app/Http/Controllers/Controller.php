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

    public function index ()
    {
        return view ('welcome');
    }
    public function shsHome ()
    {
        return view ('shs.home');
    }
    public function shsSearch ()
    {
        return view ('shs.search');
    }

}
