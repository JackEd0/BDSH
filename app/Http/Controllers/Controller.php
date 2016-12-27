<?php

namespace app\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\CardAttribute;
use App\CardType;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if ((Auth::id() == null) || (Auth::id() == 0)) {
            return view('auth.login');
        } else {
            $cardAttributeList = CardAttribute::all();
            $cardTypeList = CardType::all();
            return view('search.searchHome', compact('cardAttributeList', 'cardTypeList'));
        }
    }

    public function shsHome()
    {
        return redirect()->away('http://histoiresherbrooke.ca');
    }
}