<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
     public function index()
     {
          $coupons = Coupon::latest()->get();
          return view('pages.coupons', compact('coupons'));
     }

     public function show(Coupon $coupon)
    {
          $form_type = $coupon->exists == 1? 'Edit' : 'Add';
          return view('pages.coupons_form', compact('coupon', 'form_type'));
    }

    public function store(Request $request)
    { 
          $this->validate(request(), [
               'code' => 'required|unique:coupons',
               'type' => 'required',
               'amount' => 'required|between: 0,100000|numeric',
               'percent' => 'required|between: 0,100|numeric',
               'is_enabled' => 'required',
               'start_datetime' => 'required',
               'end_datetime' => 'required'
          ]);
          
          Coupon::create($request->all());
          return redirect('/tango/coupons');
     }
}
