@extends ('tango.layouts.master')

@section ('title')
     Coupons
@endsection

@section ('cssfiles')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <link href="/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
     <link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
@endsection

@section ('content')
     @include ('tango.layouts.header')
     @include ('tango.layouts.sidebar')

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
                                   Coupon List
                              </div>
                              <div class="panel-wrapper collapse in">
                                   <div class="panel-body">
                                        <div class="table-responsive">
                                             <!-- CSFR token for ajax call -->
                                             <input type="hidden" name="_token" val="{{ csrf_token() }}"/>
                                             <table class="table" id="couponTable">
                                                  <thead>
                                                       <tr>
                                                            <th>Code</th>
                                                            <th>Type</th>
                                                            <th>Amount</th>
                                                            <th>Rate</th>
                                                            <th class="text-center">Status</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>

                                                       @foreach ($coupons as $coupon)
                                                       <tr>
                                                            <td width="15%">{{ $coupon->code }}</td>
                                                            <td>{{ $coupon->type }}</td>
                                                            <td>{{ number_format($coupon->amount, 2, '.', ',') }}</td>
                                                            <td>{{ $coupon->percent }}</td>
                                                            <td>
                                                                 <span class="label label-rouded label-{{ $coupon->status == 'Enabled' ? 'success' : 'danger' }} text-uppercase">
                                                                      {{ $coupon->status }}
                                                                 </span>
                                                            </td>
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
                            <h3 class="box-title" style="margin-bottom: 0px">All Coupons
                                <span class="pull-right" id="count">
                                    {{ $coupons->count() }}
                                </span>
                            </h3>
                        </div>  
                        
                         <div class="white-box">
                              <h3 class="box-title">New Coupon</h3>
                              <hr>
                              <a href="/tango/coupons/add" class="btn btn-info btn-block">Add New Coupon</a>
                         </div>
                    </div>

               </div>
          </div>
     </div> 

     @include ('tango.layouts.footer')
@endsection

@section ('jsfiles')
     <script src="/bower_components/datatables/jquery.dataTables.min.js"></script>
     <script src="/bower_components/sweetalert/sweetalert.min.js"></script>
     <script src="/js/tango/coupon.js"></script>
     <script> coupon_init(); </script>
@endsection