<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RegisteredUser;


class UserController extends Controller
{
    public function index(){
		$users = RegisteredUser::get();
		$premium_users = DB::table('registered_users')
                ->where('user_type', 'premium')
                ->where('deleted_at','=',NULL)
                ->count();
		$normal_users = DB::table('registered_users')
                ->where('user_type', 'normal')
                ->where('deleted_at','=',NULL)
                ->count();

		return view('pages.users',compact('users','premium_users','normal_users'));
	}

	public function delete(RegisteredUser $user){

		$user->delete();
		if($user->user_type == 'Premium'){
			print(0);
		} else {
			print(1);
		}
	}

	public function show(RegisteredUser $user){
		$users = RegisteredUser::get();
		return view('pages.user_view',compact('user'));
	}
}
