<?php

namespace App\Http\Controllers\tango;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;

class CouponController extends Controller
{
     public function __construct()
     {
          //$this->middleware('auth');
     }
     
     public function index()
     {
          $coupons = Coupon::latest()->get();
          return view('tango.pages.coupons', compact('coupons'));
     }

     public function show(Coupon $coupon)
    {
          if($coupon->exists == 1)
          {
               $form_type = 'Edit';

               $date = date('m/d/Y h:i A', strtotime($coupon->start_datetime));
               $date .= " - ";
               $date .= date('m/d/Y h:i A', strtotime($coupon->end_datetime));

               $start_datetime = $coupon->start_datetime;
               $end_datetime = $coupon->end_datetime;
          } 
          else 
          {
               $form_type = 'Add';

               $start_datetime = date('Y-m-d H:i:s');
               $end_datetime = date('Y-m-d H:i:s');
          }

          return view('tango.pages.coupons_form', compact('coupon', 'form_type', 'date', 'start_datetime', 'end_datetime'));
    }

    public function store(Request $request)
    { 
          $this->validate(request(), [
               'code' => 'required|unique:coupons',
               'type' => 'required',
               'amount' => 'required|between: 0,100000|numeric',
               'percent' => 'required|between: 0,100|numeric',
               'status' => 'required',
               'start_datetime' => 'required',
               'end_datetime' => 'required'
          ]);
          
          Coupon::create($request->all());
          return redirect('/tango/coupons');
     }

     public function update(Request $request)
     {    
          $coupon = Coupon::select('code')->where('id', $request->id)->get();
          if($coupon[0]->code != $request->code)
          {
               $this->validate(request(), [ 'code' => 'required|unique:coupons' ]);
          }

          $this->validate(request(), [
               'type' => 'required',
               'amount' => 'required|between: 0,100000|numeric',
               'percent' => 'required|between: 0,100|numeric',
               'status' => 'required',
               'start_datetime' => 'required',
               'end_datetime' => 'required'
          ]);

          Coupon::where('id', $request->input('id'))
               ->update([
                    'code' => $request->input('code'),
                    'type' => $request->input('type'),
                    'amount' => $request->input('amount'),
                    'percent' => $request->input('percent'),
                    'status' => $request->input('status'),
                    'start_datetime' => $request->input('start_datetime'),
                    'end_datetime' => $request->input('end_datetime'),
               ]);

          return redirect('/tango/coupons');
     }

     public function destroy(Coupon $coupon){
          $coupon->forceDelete();
     }
}
