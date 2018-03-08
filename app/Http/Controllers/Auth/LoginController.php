<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/my-account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', [
            'except' => ['logout', 'userLogout']
        ]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = User::where('provider_id', $user->id)->first();

        if (!$authUser) {
            User::create([
                'full_name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);
            return redirect('/register#')->with('data', $user->email);
        } else {
            $userStatus = DB::table('users')->where('email', $user->email)->first();
            if ($userStatus->country == '') {
                return redirect('/register#')->with('data', $userStatus->email);
            } else {
                Auth::login($authUser);
                return redirect('/my-account#');
            }
        }
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
