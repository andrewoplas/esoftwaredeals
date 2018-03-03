@extends ('layouts.master')

@section ('title')
     Coupons
@endsection

@section ('cssfiles')
     <link href="{{ URL::asset('/bower_components/footable/css/footable.core.css') }}" rel="stylesheet">
     <link href="{{ URL::asset('/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
     <link href="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
@endsection

@section ('content')
     @include ('layouts.header')
     @include ('layouts.sidebar')

     <div id="page-wrapper">
          <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-12">
                         <h4 class="page-title" style="display: inline-block;">Coupons</h4> 
                         <a href="/tango/coupons/add" class="btn btn-success pull-right">Add Coupon</a>
                    </div>
               </div>
               
               <div class="row">
                    <div class="col-lg-12">
                         <div class="panel panel-info">
                              <div class="panel-heading"> 
                                   List of Coupons ({{ count($coupons) }} items)
                              </div>
                              <div class="panel-wrapper collapse in">
                                   <div class="panel-body">
                                        <div class="table-responsive">
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
                                                                 <a href="javascript:void(0)" class="btn btn-danger btn-outline btn-circle">
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
@endsection