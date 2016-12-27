<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 17/02/2016
 * Time: 20:09.
 */

namespace app\Http\Controllers;

use App\User;
use App\UserType;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class UserController extends BaseController
{
    /**
     * UserController constructeur: redirige vers 'login' si l'on n'est pas connecté.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Donne la liste des utilisateurs.
     *
     * @param $inactiveButton
     *
     * @return View
     */
    public function userList($inactiveButton)
    {
        $users = \DB::table('users')->select('users.*', 'user_types.name_fr', 'user_types.name_en')
            ->where('active', $inactiveButton)->orderBy('username', 'asc')
            ->join('user_types', 'users.user_type_id', '=', 'user_types.id')->get();

        return view('admin.userList', compact('users', 'inactiveButton'));
    }

    /**
     * Permet de modifier les droits d'acces d'un utilisateur.
     *
     * @param $id
     *
     * @return View
     */
    public function editUserAccess($id)
    {
        $id = \Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();
        $userType = User::find($id)->userType;
        $userTypes = UserType::all();

        return view('admin.editUserAccess', compact('user', 'userType', 'userTypes'));
    }

    /**
     * Permet de modifier les attributs d'un utilisateur (son profile).
     *
     * @param $id
     *
     * @return View
     */
    public function userProfile($id)
    {
        $id = \Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();

        return view('users.profile', compact('user'));
    }

    /**
     * Modifier le profil d'un utilisateur.
     *
     * @param $id
     *
     * @return View
     */
    public function updateProfile($id)
    {
        $id = \Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();
        $user->fill(Input::all());
        $user->save();
        $message = 'Changements enregistrés';

        return view('users.profile', compact('user', 'message'));
    }

    /**
     * Modifie le type de compte d'un utilsateur, Droits :[Administrateur].
     *
     * @param $id
     *
     * @return View
     */
    public function editUserType($id)
    {
        $id = \Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();
        $user->user_type_id = Input::get('userTypeSelect');
        $user->save();

        return Redirect::route('users.list', array(1));
    }

    /**
     * Désactive un utilisateur, Droits: [Administrateur].
     *
     * @param $id
     *
     * @return View
     */
    public function deactivateUser($id)
    {
        $id = \Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();
        if ($user->active == 0) {
            $user->active = 1;
            $message = 'L\'utilisateur : ' . $user->first_name . ' ' . $user->last_name . ' a été activé';
        } else {
            $user->active = 0;
            $message = 'L\'utilisateur : ' . $user->first_name . ' ' . $user->last_name . ' a été désactivé';
        }
        $user->save();

        return Redirect::route('users.list', array(1));
    }

    /**
     * Modifie le mot de passe utilisateur, Droits: [Tout le monde].
     *
     * @param $id
     *
     * @return View
     */
    public function updatePassword($id)
    {
        $id = \Crypt::decrypt($id);
        $password = Input::get('password');
        $previousPassword = Input::get('previousPassword');
        $user = User::where('id', $id)->firstOrFail();
        $validator = \Validator::make(
            ['password' => $password, 'password_confirmation' => Input::get('password_confirmation')],
            ['password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9_\W]).+$/']
        );
        if (\Hash::check($previousPassword, $user->password)) {
            if (!$validator->fails()) {
                $user->password = \Hash::make($password);
                $user->save();
                $email = $user['email'];
                \Mail::send('emails.PwdReset',
                    ['testVar' => $user['username']],
                    function ($message) use ($user) {
                        $message->to($user['email'])->subject('Changement dans votre profil !');
                    });
                $message = 'Mot de passe changé: Reconnectez-vous pour vérifier votre nouveau mot de passe';
            } else {
                $message = $validator->messages();
            }
        } else {
            $message = 'Changements non enregistrés: Vérifier les champs à remplir';
        }

        return view('users.profile', compact('user', 'message'));
    }

    /**
     * @return View
     */
    public function error401()
    {
        return View('errors.401');
    }
}
