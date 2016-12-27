<?php

namespace app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'searchHome';
    // Redirige l'utilisateur vers la page de 'login' une fois déconnecté
    protected $redirectAfterLogout = 'login';
    // Utilise le 'username' au lieu de 'email' comme argument d'authentification
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:25|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9_\W]).+$/',
            'address' => 'required|max:50',
            'town' => 'required|max:25',
            'postal_code' => 'required|max:25',
            'province' => 'required|max:25',
            'country' => 'required|max:25',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'town' => $data['town'],
            'postal_code' => $data['postal_code'],
            'province' => $data['province'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            // Par défaut l'utilisateur est inactif
            'active' => 1,
            //user_type = client par défaut
            'user_type_id' => 4,
            //confirmation
            'confirmed' => 0,
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        \Mail::send('emails.registration',
            array('user' => $user),
            function ($message) use ($user) {
                $message->to($user->email)->subject('Confirmation d\'inscription');
            });

        return redirect('login')->with('warning', 'Un lien de confirmation vous a été envoyé. Veuillez vérifier votre boîte de réception ainsi que vos spams.');
    }

    protected function getCredentials(Request $request)
    {
        $credentials = $request->only($this->loginUsername(), 'password');
        $credentials = array_add($credentials, 'active', 1);
        $credentials = array_add($credentials, 'confirmed', 1);

        return $credentials;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('username', $request->input($this->loginUsername()))->first();
        $erreur = $this->getFailedLoginMessage();
        if ($user != null && $user->confirmed == 0 && $user->active == 1) {
            $erreur = 'Ce compte n\'a pas été confirmé. Un lien vous a été envoyé.';
        }

        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $erreur,
            ]);
    }

    public function activateUser($id)
    {
        $id = \Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();

        if ($user->confirmed == 0) {
            $user->confirmed = 1;

            $message = 'L\'activation de votre compte est complétée, vous pouvez maintenant vous connecter.';
            $user->save();
        } else {
            $message = 'Ce compte a déjà été activé, vous pouvez vous connecter.';
        }

        return redirect('login')->with('status', $message);
    }
}
