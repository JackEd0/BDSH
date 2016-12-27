<?php

namespace app\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ExternalParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class ExternalParameterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editionParameter()
    {
        $parameter = ExternalParameter::all()->sortByDesc('id')->first();
        return view('externalParameter.editionParameter', compact('parameter'));
    }

    public function insertParameter(Request $insert)
    {

        $parameter = new ExternalParameter;
        $email = $insert->email;

        if ($email != NULL) {
            $parameter->insert([
                "email" => $email,
                'created_at' => Carbon::now('America/Toronto')->format('Y-m-d H:i'),
            ]);
        }
        return Redirect::to('searchHome');
    }
}
