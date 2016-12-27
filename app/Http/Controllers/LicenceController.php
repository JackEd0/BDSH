<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-26
 * Time: 22:51.
 */

namespace app\Http\Controllers;

use App\LicenceVersion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class LicenceController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function licencesList()
    {
        $licences = LicenceVersion::all()->sortByDesc('id');

        return view('licence.licenceList', compact('licences'));
    }

    public function editLicence($id)
    {
        $id = \Crypt::decrypt($id);
        $licence = LicenceVersion::where('id', $id)->firstOrFail();

        return view('licence.editLicence', compact('licence'));
    }

    public function addLicence(Request $request)
    {
        $licenceVersion = new LicenceVersion();
        $terms = $request->terms;
        $licenceVersion->insert([
            'terms' => $terms,
            'created_at' => Carbon::now('America/Toronto')->format('Y-m-d H:i'),
        ]);

        return redirect::to('licence');
    }
}
