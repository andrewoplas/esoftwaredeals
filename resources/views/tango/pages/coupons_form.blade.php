@extends ('tango.layouts.master')

@section ('title')
     Coupon - {{ $form_type }}
@endsection

@section ('cssfiles')
     <link href="{{ URL::asset('/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
     <link href="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
     <link href="{{ URL::asset('/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
     <link href="{{ URL::asset('/bower_components/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
     <link href="{{ URL::asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section ('content')
     @include ('tango.layouts.header')
     @include ('tango.layouts.sidebar')

     <div id="page-wrapper">
         <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                          <h4 class="page-title">Coupon {{ $form_type }}</h4> 
                    </div>
               </div>
             
               <div class="row">
                    <div class="col-md-12">
                         <div class="panel panel-info">
                              <div class="panel-heading">{{ $form_type }} Coupon</div>
                              <div class="panel-wrapper collapse in">
                                   <div class="panel-body">

                                        <form method="POST">
                                             {{ csrf_field() }}
                                             <div class="form-body">
                                                  @include ('tango.layouts.errors')

                                                  <h3 class="box-title">About Coupon</h3>
                                                  <hr>
                                                  <input type="hidden" name="id" value="{{ @$coupon->id }}">

                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                                 <label class="control-label">Code</label>
                                                                 <input type="text" class="form-control" name="code" value="{{ @$coupon->code }}" required> 
                                                            </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                                 <label class="control-label">Status</label>
                                                                 <div class="radio-list">
                                                                      <label class="radio-inline p-0">
                                                                           <div class="radio radio-info">
                                                                                <input type="radio" name="status" id="yes" value="Enabled" required checked
                                                                                {{ @$coupon->status == 'Enabled'? 'checked' : '' }} >
                                                                                <label for="yes">Enable</label>
                                                                           </div>
                                                                      </label>
                                                                      <label class="radio-inline">
                                                                           <div class="radio radio-info">
                                                                                <input type="radio" name="status" id="no" value="Disabled" required
                                                                                {{ @$coupon->status == 'Disabled'? 'checked' : '' }} >
                                                                                <label for="no">Disable</label>
                                                                           </div>
                                                                      </label>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                                 <label class="control-label">Type</label>
                                                                 <select class="form-control" name="type" required>
                                                                      <option value="Fixed Price"
                                                                      {{ @$coupon->type == 'Fixed Price'? 'selected' : '' }} > Fixed Price</option>
                                                                      <option value="Rate"
                                                                           {{ @$coupon->type == 'Rate'? 'selected' : '' }} > Rate
                                                                      </option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                 <label class="control-label">Amount</label>
                                                                 <input type="text" class="form-control" name="amount" value="{{ @$coupon->amount }}" required> 
                                                            </div>
                                                       </div>
                                                       <div class="col-md-3">
                                                            <div class="form-group">
                                                                 <label class="control-label">Percent</label>
                                                                 <input type="text" class="form-control" name="percent" value="{{ @$coupon->percent }}" required> 
                                                            </div>
                                                       </div>
                                                  </div>   

                                                  <div class="row">
                                                       <div class="col-md-12">
                                                            <label class="control-label">Date Range</label>
                                                            <input type="hidden" class="form-control" name="start_datetime" value="{{ @$start_datetime }}" required> 
                                                            <input type="hidden" class="form-control" name="end_datetime" value="{{ @$end_datetime }}" required> 
                                                            <input type="text" class="form-control input-daterange-timepicker" name="daterange" value=" {{ @$date }}" />
                                                       </div>
                                                  </div>

                                                  <hr> 
                                             </div>

                                             <div class="form-actions m-t-40">
                                                  <button type="submit" id="submit" class="btn btn-success"> 
                                                       <i class="fa fa-check"></i> Save
                                                  </button>
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     @include ('tango.layouts.footer');
@endsection

@section ('jsfiles')
     <script src="{{ URL::asset('js/ampleadmin/jquery.slimscroll.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/waves.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/footable-init.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>     
     <script src="{{ URL::asset('/bower_components/footable/js/footable.all.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/moment/moment.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/timepicker/bootstrap-timepicker.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
     <script src="{{ URL::asset('/js/tango/coupon.js') }}"></script>
@endsection