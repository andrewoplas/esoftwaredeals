<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
         // $coupons = Coupon::latest()->get();
         return view('pages.frontend.home');
    }
}
