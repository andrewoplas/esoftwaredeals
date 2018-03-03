<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
     public function __construct()
     {
          $this->middleware('auth');
     }
     
     public function index()
     {
          $coupons = Coupon::latest()->get();
          return view('pages.coupons', compact('coupons'));
     }

     public function show(Coupon $coupon)
    {
          if($coupon->exists == 1)
          {
               $form_type = 'Edit';

               $date = strtotime( $coupon->start_datetime); 
               $start_datetime = date( 'm/d/Y h:s A', $date );

               $date = strtotime( $coupon->end_datetime);
               $end_datetime = date( 'm/d/Y h:s A', $date );

               $date = $start_datetime . " - " . $end_datetime; 
          } 
          else 
          {
               $form_type = 'Add';

               $start_datetime = date('m/d/Y h:s A');
               $end_datetime = date('m/d/Y h:s A');
          }

          return view('pages.coupons_form', compact('coupon', 'form_type', 'date', 'start_datetime', 'end_datetime'));
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

     public function update(Request $request)
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

          Coupon::where('id', $request->input('id'))
               ->update([
                    'code' => $request->input('code'),
                    'type' => $request->input('type'),
                    'amount' => $request->input('amount'),
                    'percent' => $request->input('percent'),
                    'is_enabled' => $request->input('is_enabled'),
                    'start_datetime' => $request->input('start_datetime'),
                    'end_datetime' => $request->input('end_datetime'),
               ]);

          return redirect('/tango/coupons');
     }

     public function destroy(Coupon $coupon){
          $coupon->forceDelete();
     }
}
