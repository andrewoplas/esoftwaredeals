<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
    	if ( request(['rememberme']) ) {
    		$remember = true;
    	} else {
    		$remember = false;
    	}

    	if ( ! auth()->attempt(request(['username', 'password'], $remember))) {
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	} else {
    		\DB::table('users')->where('id', 1)->update(['is_online' => 1]);
    		\DB::table('users')->where('id', 1)->update(['last_logged_in' => Carbon::now()]);
    		return redirect('/'); 
    	}
    }

    public function destroy()
    {
    	auth()->logout();
    	\DB::table('users')->where('id', 1)->update(['is_online' => 0]);

    	return redirect('/tango');
    }
}
