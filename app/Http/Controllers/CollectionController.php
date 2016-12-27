<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-20
 * Time: 22:52.
 */

namespace app\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class CollectionController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCollection()
    {
        return view('collection.addCollection');
    }

    public function collectionList()
    {
        $collections = Collection::all();

        return view('collection.collectionList', compact('collections'));
    }

    public function collectionEdition($id)
    {
        $id = \Crypt::decrypt($id);
        $collection = Collection::where('id', $id)->firstOrFail();

        return view('collection.collectionEdition', compact('collection'));
    }

    protected function create(Request $request)
    {
        $collection = new Collection();
        $codes = $request->code;
        $name = $request->name;
        $collection->insert([
            'code' => $codes,
            'name' => $name,
            'state' => '1',
            'created_at' => Carbon::now('America/Toronto')->format('Y-m-d H:i'),
        ]);

        return redirect::to('Collection');
    }

    protected function edit($id, Request $request)
    {
        $id = \Crypt::decrypt($id);
        $collection = Collection::where('id', $id)->firstOrFail();
        $collection->code = $request->code;
        $collection->name = $request->name;
        $collection->save();
        $message = 'Collection modifiée';

        return redirect::to('Collection');
    }

    public function disable($id)
    {
        $id = \Crypt::decrypt($id);
        $collection = Collection::where('id', $id)->firstOrFail();
        $collection->update(['state' => '0']);

        return redirect::to('Collection');
    }

    public function activate($id)
    {
        $id = \Crypt::decrypt($id);
        $collection = Collection::where('id', $id)->firstOrFail();
        $collection->update(['state' => '1']);

        return redirect::to('Collection');
    }
}
