<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SessionController extends Controller
{
    public function show()
    {
    	return view('login');
    }

	public function store()
    {
    	if ( ! auth()->attempt(request(['username', 'password']))) {
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}

    	return redirect('/'); 
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect('/tango');
    }
}
