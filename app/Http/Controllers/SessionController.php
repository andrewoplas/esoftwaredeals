<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SessionController extends Controller
{
	public function __construct()
	{
	    $this->middleware('guest', ['except' => 'destroy']);
	}

    public function create()
    {
    	return view('login');
    }

	public function store()
    {
    	$remember = (Input::has('remember')) ? true : false;
        $auth = Auth::attempt(
            [
                'username'  => strtolower(Input::get('username')),
                'password'  => Input::get('password')    
            ], $remember
        );
    	

    	if ( $auth ) {
    		$id = Auth::id();
    		DB::table('users')->where('id', $id)->update(['is_online' => 1]);
    		DB::table('users')->where('id', $id)->update(['last_logged_in' => Carbon::now()]);
    		return redirect('/'); 
    	}

		return back()->withErrors([
			'message' => 'Please check your credentials and try again.'
		]);
    }

    public function destroy()
    {
    	$id = Auth::id();
    	DB::table('users')->where('id', $id)->update(['is_online' => 0]);
    	auth()->logout();
    	DB::table('users')->where('id', 1)->update(['is_online' => 0]);

    	return redirect('/tango');
    }
}
	