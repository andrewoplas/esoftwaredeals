@extends ('tango.layouts.master')

@section ('title')
     Dashboard
@endsection

@section ('cssfiles')
     <link href="/css/tango/dashboard.css" rel="stylesheet">
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

               <!-- First Row -->
               <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                              <div class="row row-in">
                                   <div class="col-lg-3 col-sm-6 row-in-br">
                                        <ul class="col-in">
                                             <li>
                                                  <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                             </li>
                                             <li class="col-last">
                                                  <h3 class="counter text-right m-t-15">1234</h3>
                                             </li>
                                             <li class="col-middle">
                                                  <h4>Net<br> Earnings</h4>
                                                  <div class="progress">
                                                       <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 50%">
                                                       </div>
                                                  </div>
                                             </li>
                                        </ul>
                                   </div>
                                   <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                        <ul class="col-in">
                                             <li>
                                                  <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                             </li>
                                             <li class="col-last">
                                                  <h3 class="counter text-right m-t-15">1234</h3>
                                             </li>
                                             <li class="col-middle">
                                                  <h4>Total<br> Earnings</h4>
                                                  <div class="progress">
                                                       <div class="progress-bar progress-bar-info" role="progressbar" style="width: 50%">
                                                       </div>
                                                  </div>
                                             </li>
                                        </ul>
                                   </div>
                                   <div class="col-lg-3 col-sm-6 row-in-br">
                                        <ul class="col-in">
                                             <li>
                                                  <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                                             </li>
                                             <li class="col-last">
                                                  <h3 class="counter text-right m-t-15">1234</h3>
                                             </li>
                                             <li class="col-middle">
                                                  <h4>New<br> Users</h4>
                                                  <div class="progress">
                                                       <div class="progress-bar progress-bar-success" role="progressbar" style="width: 50%">
                                                       </div>
                                                  </div>
                                             </li>
                                        </ul>
                                   </div>
                                   <div class="col-lg-3 col-sm-6  b-0">
                                        <ul class="col-in">
                                             <li>
                                                  <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                                             </li>
                                             <li class="col-last">
                                                  <h3 class="counter text-right m-t-15">1234</h3>
                                             </li>
                                             <li class="col-middle">
                                                  <h4>Net<br> Invoices</h4>
                                                  <div class="progress">
                                                       <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 50%">
                                                       </div>
                                                  </div>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                    </div>
                </div>

                <!-- Second Row -->
               <div class="row">
                    <div class="col-md-6 col-sm-12 p-0">
                         <div class="col-lg-6 col-sm-6 col-xs-12">
                              <div class="white-box">
                                   <h3 class="box-title">Daily Sales</h3>
                                   <div class="text-right"> 
                                        <span class="text-muted">Todays Income</span>
                                        <h1>
                                             <sup>
                                                  <i class="ti-arrow-up text-success"></i>
                                             </sup> 
                                             $<span class="counter">9,000</span>
                                        </h1>
                                   </div> 
                                   <span class="text-success">20%</span>
                                   <div class="progress m-b-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:20%;"> 
                                             <span class="sr-only">20% Complete</span> 
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-6 col-sm-6 col-xs-12">
                              <div class="white-box">
                                    <h3 class="box-title">Weekly Sales</h3>
                                    <div class="text-right"> 
                                        <span class="text-muted">Weekly Income</span>
                                        <h1>
                                             <sup>
                                                  <i class="ti-arrow-down text-danger"></i>
                                             </sup> 
                                             $<span class="counter">9,000</span>
                                        </h1>
                                    </div> 
                                    <span class="text-danger">30%</span>
                                    <div class="progress m-b-0">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:30%;"> 
                                             <span class="sr-only">230% Complete</span> 
                                        </div>
                                    </div>
                              </div>
                         </div>
                         <div class="col-lg-6 col-sm-6 col-xs-12">
                              <div class="white-box">
                                   <h3 class="box-title">Monthly Sales</h3>
                                   <div class="text-right"> 
                                        <span class="text-muted">Monthly Income</span>
                                        <h1>
                                             <sup>
                                                  <i class="ti-arrow-up text-info"></i>
                                             </sup> 
                                             $<span class="counter">9,000</span>
                                        </h1>
                                   </div> 
                                   <span class="text-info">60%</span>
                                   <div class="progress m-b-0">
                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:60%;"> 
                                             <span class="sr-only">20% Complete</span> 
                                        </div>
                                   </div>
                              </div>
                          </div>
                         <div class="col-lg-6 col-sm-6 col-xs-12">
                              <div class="white-box">
                                   <h3 class="box-title">Yearly Sales</h3>
                                   <div class="text-right"> 
                                        <span class="text-muted">Yearly Income</span>
                                        <h1>
                                             <sup>
                                                  <i class="ti-arrow-up text-inverse"></i>
                                             </sup> 
                                             $<span class="counter">9,000</span>
                                        </h1>
                                   </div> 
                                   <span class="text-inverse">80%</span>
                                   <div class="progress m-b-0">
                                        <div class="progress-bar progress-bar-inverse" role="progressbar" style="width:80%;"> 
                                             <span class="sr-only">230% Complete</span> 
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="col-xs-12">
                              <div class="white-box">
                                   <h3 class="box-title">Recent Product Reviews</h3>
                                   <!-- Code here -->
                             </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <div class="white-box">
                              <h3 class="box-title">Feeds</h3>
                              <ul class="feeds">
                                   <li>
                                        <div class="bg-info">
                                             <i class="fa fa-bell-o text-white"></i>
                                        </div> 
                                        You have 4 pending tasks. 
                                        <span class="text-muted">Just Now</span>
                                   </li>
                                   <li>
                                        <div class="bg-success">
                                             <i class="ti-server text-white"></i>
                                        </div> 
                                        Server #1 overloaded.
                                        <span class="text-muted">2 Hours ago</span>
                                   </li>
                                   <li>
                                        <div class="bg-warning">
                                             <i class="ti-shopping-cart text-white"></i>
                                        </div> 
                                        New order received.<span class="text-muted">31 May</span>
                                   </li>
                                   <li>
                                        <div class="bg-danger">
                                             <i class="ti-user text-white"></i>
                                        </div> 
                                        New user registered.
                                        <span class="text-muted">30 May</span>
                                   </li>
                                   <li>
                                        <div class="bg-inverse">
                                             <i class="fa fa-bell-o text-white"></i>
                                        </div> 
                                        New Version just arrived. 
                                        <span class="text-muted">27 May</span>
                                   </li>
                                   <li>
                                        <div class="bg-info">
                                             <i class="fa fa-bell-o text-white"></i>
                                        </div> 
                                        You have 4 pending tasks. 
                                        <span class="text-muted">Just Now</span>
                                   </li>
                                   <li>
                                   <div class="bg-danger">
                                        <i class="ti-user text-white"></i>
                                   </div> 
                                        New user registered.
                                        <span class="text-muted">30 May</span></li>
                                   <li>
                                        <div class="bg-inverse">
                                             <i class="fa fa-bell-o text-white"></i>
                                        </div> 
                                        New Version just arrived. 
                                        <span class="text-muted">27 May</span>
                                   </li>
                                   <li>
                                        <div class="bg-purple">
                                             <i class="ti-settings text-white"></i>
                                        </div> 
                                        You have 4 pending tasks. 
                                        <span class="text-muted">27 May</span>
                                   </li>
                              </ul>
                         </div>
                    </div>

               </div>
               
          </div>
     </div> 

     @include ('tango.layouts.footer')
@endsection

@section ('jsfiles')
     <script src="/bower_components/waypoints/lib/jquery.waypoints.js"></script>
     <script src="/bower_components/counterup/jquery.counterup.min.js"></script>
     <script src="/js/tango/dashboard.js"></script>
@endsection