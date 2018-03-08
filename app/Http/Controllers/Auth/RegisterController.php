<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['userEmail']) {
            return Validator::make($data, [
                'phone_number' => 'required',
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'zip_code' => 'required',
                'state' => 'required',
            ]);
        } else {
            return Validator::make($data, [
                'full_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|confirmed',
                'phone_number' => 'required',
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'zip_code' => 'required',
                'state' => 'required',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['userEmail']) {
            $user = User::where('email', $data['userEmail'])->first();
            $user->update([
                    'phone_number' => $data['phone_number'],
                    'address' => $data['address'],
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'zip_code' => $data['zip_code'],
                    'state' => $data['state'],
                    'is_online' => true,
                ]);
        } else {
            $user = User::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'country' => $data['country'],
                'city' => $data['city'],
                'zip_code' => $data['zip_code'],
                'state' => $data['state'],
                'is_online' => true,
            ]);
        }
        
        return $user;
    }

    public function emailExists(Request $request)
    {
        if ($request->isMethod('get')) {
            $licenseRecord = DB::table('users')
                            ->where('email', '=', $request['email'])
                            ->first();
            if (!$licenseRecord) {
                return response()->json(['result' => 'false']);
            } else {
                return response()->json(['result' => 'true']); 
            }
        }
    }
}
