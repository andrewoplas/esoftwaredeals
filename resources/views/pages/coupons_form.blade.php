@extends ('layouts.master')

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
     @include ('layouts.header')
     @include ('layouts.sidebar')

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
                                                  @include ('layouts.errors')

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
                                                                 <label class="control-label">Is Enabled?</label>
                                                                 <div class="radio-list">
                                                                      <label class="radio-inline p-0">
                                                                           <div class="radio radio-info">
                                                                                <input type="radio" name="is_enabled" id="yes" value="Yes" required checked
                                                                                {{ @$coupon->is_enabled == 'Yes'? 'checked' : '' }} >
                                                                                <label for="yes">Yes</label>
                                                                           </div>
                                                                      </label>
                                                                      <label class="radio-inline">
                                                                           <div class="radio radio-info">
                                                                                <input type="radio" name="is_enabled" id="no" value="No" required
                                                                                {{ @$coupon->is_enabled == 'No'? 'checked' : '' }} >
                                                                                <label for="no">No</label>
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
                                                            <input type="hidden" class="form-control" name="start_datetime" value="{{ @$coupon->start_datetime }}" required> 
                                                            <input type="hidden" class="form-control" name="end_datetime" value="{{ @$coupon->end_datetime }}" required> 
                                                            <input type="text" class="form-control input-daterange-timepicker" name="daterange"/>

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

     @include ('layouts.footer');
@endsection

@section ('jsfiles')
     <script src="{{ URL::asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
     <script src="{{ URL::asset('/js/ampleadmin/jquery.slimscroll.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/moment/moment.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/timepicker/bootstrap-timepicker.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
     <script type="text/javascript">
     $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        },
        timePickerIncrement: 1,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });

     $('.input-daterange-timepicker').on('apply.daterangepicker', function(ev, picker) {
          $("[name='start_datetime']").val(picker.startDate.format('YYYY-MM-DD H:mm:ss'));
          $("[name='end_datetime']").val(picker.endDate.format('YYYY-MM-DD H:mm:ss'));
     });



     $("[name='type']").on('change',function(){
          var type = $(this).val();

          if(type == "Fixed Price"){
               $("[name='amount']").removeAttr("readonly", "");
               $("[name='percent']").attr("readonly", "").val("0");
          } else {
               $("[name='amount']").attr("readonly", "").val("0");
               $("[name='percent']").removeAttr("readonly");
          }
     });
     $("[name='type']").change();
     </script>
@endsection