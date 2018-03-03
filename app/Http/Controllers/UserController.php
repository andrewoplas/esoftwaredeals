<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{
	public function __construct()
     {
          $this->middleware('auth');
     }

    public function index(){
		$users = User::get();
		$premium_users = DB::table('users')
                ->where('admin', '1')
                ->count();
		$normal_users = DB::table('users')
                ->where('admin', '0')
                ->count();

		return view('pages.users',compact('users','premium_users','normal_users'));
	}

	public function delete(User $user){

		$user->forceDelete();
		if($user->user_type == 'Premium'){
			print(0);
		} else {
			print(1);
		}
	}

	public function show(User $user){
		$users = User::get();
		return view('pages.user_view',compact('user'));
	}
}
