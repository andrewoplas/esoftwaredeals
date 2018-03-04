<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin', [
            'except' => ['logout']
        ]);
	}

    public function show()
    {
    	return view('auth.admin-login');
    }

    public function login()
    {
		$remember = (Input::has('remember')) ? true : false;
        $auth = Auth::guard('admin')->attempt(
            [
                'username'  => Input::get('username'),
                'password'  => Input::get('password')    
            ], $remember
        );
    	
    	if ( $auth ) {
    		$id = Auth::id();
    		DB::table('admins')->where('id', $id)->update(['is_online' => 1]);
    		DB::table('admins')->where('id', $id)->update(['last_logged_in' => Carbon::now()]);
    		return redirect('/tango/dashboard'); 
    	}

		return back()->withErrors([
			'message' => 'Please check your credentials and try again.'
		]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/tango');
    }
}
