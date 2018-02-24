@extends ('layouts.master')

@section ('title')
     Coupons
@endsection

@section ('cssfiles')
     <link href="{{ URL::asset('/bower_components/footable/css/footable.core.css') }}" rel="stylesheet">
     <link href="{{ URL::asset('/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
     <link href="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
     <link href="{{ URL::asset('/bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section ('content')
     @include ('layouts.header')
     @include ('layouts.sidebar')

     <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">Coupons</h4> 
                    </div>
               </div>
               
               <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-7">
                         <div class="panel panel-info">
                              <div class="panel-heading"> 
                                   List of Coupons ({{ count($coupons) }} items)
                              </div>
                              <div class="panel-wrapper collapse in">
                                   <div class="panel-body">
                                        <div class="table-responsive">
                                             <!-- CSFR token for ajax call -->
                                             <input type="hidden" name="_token" val="{{ csrf_token() }}"/>
                                             <table class="table product-overview">
                                                  <thead>
                                                       <tr>
                                                            <th>Code</th>
                                                            <th>Type</th>
                                                            <th>Amount</th>
                                                            <th>Quantity</th>
                                                            <th>Is Enabled</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>

                                                       @foreach ($coupons as $coupon)
                                                       <tr>
                                                            <td>{{ $coupon->code }}</td>
                                                            <td>{{ $coupon->type }}</td>
                                                            <td>{{ $coupon->amount }}</td>
                                                            <td>{{ $coupon->is_enabled }}</td>
                                                            <td>{{ date("F n, Y g:iA", strtotime($coupon->start_datetime)) }}</td>
                                                            <td>{{ date("F n, Y g:iA", strtotime($coupon->end_datetime)) }}</td>
                                                            <td>
                                                                 <a href="/tango/coupons/edit/{{ $coupon->id }}" class="btn btn-info btn-outline btn-circle">
                                                                      <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a href="javascript:void(0)" class="btn btn-danger btn-outline btn-circle" onclick="confirm_delete({{ $coupon->id }}, '{{ $coupon->code }}', this)">
                                                                      <i class="fa fa-trash"></i>
                                                                 </a>
                                                           </td>
                                                       </tr>
                                                       @endforeach

                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-3 col-lg-3 col-sm-5">
                         <div class="white-box">
                              <h3 class="box-title">Add Coupon</h3>
                              <hr>
                              <a href="/tango/coupons/add" class="btn btn-info btn-block">Add</a>
                         </div>
                    </div>

               </div>
          </div>
     </div> 

     @include ('layouts.footer');
@endsection

@section ('jsfiles')
     <script src="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/jquery.slimscroll.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/waves.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/footable/js/footable.all.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/footable-init.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/sweetalert/sweetalert.min.js') }}"></script>
     <script src="{{ URL::asset('/js/coupon.js') }}"></script>
@endsection