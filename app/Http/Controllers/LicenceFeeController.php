<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LicenceFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class LicenceFeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editionFees()
    {
        $taxes = LicenceFee::all()->sortByDesc('id')->first();

        return view('fees.editionFees', compact('taxes'));
    }

    public function insertFees(Request $request)
    {
        $fees = new LicenceFee();
        $tvq = $request->tvq;
        $tps = $request->tps;
        $admin = $request->admin;
        $private_use = $request->private_use;
        $public_use = $request->public_use;
        $fees->insert([
            'tvq' => $tvq,
            'tps' => $tps,
            'admin' => $admin,
            'private_use' => $private_use,
            'public_use' => $public_use,
            'created_at' => Carbon::now('America/Toronto')->format('Y-m-d H:i'),
        ]);

        return Redirect::to('searchHome');
    }
}
