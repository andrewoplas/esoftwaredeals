<?php

namespace App\Http\Controllers\tango;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{
	public function __construct()
     {
          //$this->middleware('auth');
     }

    public function index(){
		$users = User::get();
		$premium_users = DB::table('users')
                ->where('admin', '1')
                ->count();
		$normal_users = DB::table('users')
                ->where('admin', '0')
                ->count();

		return view('tango.pages.users',compact('users','premium_users','normal_users'));
	}

	public function delete(User $user){

		$user->forceDelete();
		if($user->admin == '1'){
			print(0);
		} else {
			print(1);
		}
	}

	public function show(User $user){
		$users = User::get();
		return view('tango.pages.user_view',compact('user'));
	}
}
