@extends ('tango.layouts.master')

@section ('title')
     Dashboard
@endsection

@section ('cssfiles')
     
@endsection

@section ('content')
     @include ('tango.layouts.header')
     @include ('tango.layouts.sidebar')

     <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">Dashboard</h4> 
                    </div>
               </div>
               
               
          </div>
     </div> 

     @include ('tango.layouts.footer')
@endsection

@section ('jsfiles')
     
@endsection