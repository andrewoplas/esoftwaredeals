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

	public function delete(){
		$categ = RegisteredUser::find(request('userId'));
		$categ->delete();
		return redirect('/tango/users');
	}

	public function show(RegisteredUser $user){
		$users = RegisteredUser::get();
		return view('pages.user_view',compact('user'));
	}
}
