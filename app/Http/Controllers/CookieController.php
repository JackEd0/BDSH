<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function setCookie(Request $request, $id)
    { // on récup la requête et l'id de l'objet à ajouter

        $old = $request->cookie('basket'); // on récupère le contenu de l'ancien cookie
        $minutes = 10080; // minute de survie du cookie à revoir ??
        $add = '';
        if (preg_match('/delete:/', $id)) {
            preg_match('/(?P<methode>\w+):(?P<utile>\w+)/', $id, $matches);
            $matches[2] = $matches[2] . '.jpg';
            $var1 = explode('|', $old);
            foreach ($var1 as $case) {
                if ($case != $matches[2]) {
                    $add = $case . '|' . $add;
                }
            }
        } elseif (is_null($old)) {
            $add = $id;
        } else {
            $add = $old . '|' . $id; // on concatene avec le nouveau (| --> car. de concatenage)
        }

        if (strpos($add, '_')) {
            return redirect()->back()->withCookie(cookie('basket', $add, $minutes));
        } else {
            $cookie = \Cookie::forget('basket');

            return redirect()->back()->withCookie($cookie);
        }
    }
}
