@extends ('layouts.master')

@section ('title')
     Products
@endsection

@section ('cssfiles')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                         <h4 class="page-title">Products</h4> 
                    </div>
               </div>
               
               <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-7">
                         <div class="panel panel-info">
                              <div class="panel-heading"> 
                                   List of Products ({{ count($products) }} items)
                              </div>
                              <div class="panel-wrapper collapse in">
                                   <div class="panel-body">
                                        <div class="table-responsive">
                                             <!-- CSFR token for ajax call -->
                                             <input type="hidden" name="_token" val="{{ csrf_token() }}"/>
                                             <table class="table product-overview">
                                                  <thead>
                                                       <tr>
                                                            <th>Image</th>
                                                            <th>Product info</th>
                                                            <th style="text-align:center">Quantity</th>
                                                            <th style="text-align:center">Price</th>
                                                            <th style="text-align:center">Sale Price</th>
                                                            <th style="text-align:center">Category</th>
                                                            <th style="text-align:center">Action</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>

                                                       @foreach ($products as $product)
                                                       <tr>
                                                            <td width="13%">
                                                                 <img src="{{ $product->image }}" alt="{{ $product->product_name }}'s image" width="80">
                                                            </td>
                                                            <td width="35%">
                                                                 <h5>{{ $product->product_name }}</h5>
                                                                 <p>{{ str_limit($product->description, 125) }}</p>
                                                            </td>
                                                            <td align="center" width="10%">{{ $product->quantity }}</td>
                                                            <td align="center" width="8%">{{ $product->price }}</td>
                                                            <td align="center" width="10%">{{ $product->sale_price }}</td>
                                                            <td align="center" width="5%">{{ $product->category }}</td>
                                                            <td align="center" width="10%">
                                                                 <a href="/tango/products/edit/{{ $product->id }}" class="btn btn-info btn-outline btn-circle">
                                                                      <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a href="javascript:void(0)" class="btn btn-danger btn-outline btn-circle" onclick="confirm_delete({{ $product->id }}, '{{ $product->product_name }}', this)">
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
                              <h3 class="box-title">Add Product</h3>
                              <hr>
                              <a href="/tango/products/add" class="btn btn-success btn-block">Add</a>
                         </div>
                    </div>
             </div>
          </div>
     </div> 

     @include ('layouts.footer');
@endsection

@section ('jsfiles')
     <script src="{{ URL::asset('js/ampleadmin/jquery.slimscroll.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/waves.js') }}"></script>
     <script src="{{ URL::asset('js/ampleadmin/footable-init.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>     
     <script src="{{ URL::asset('/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/footable/js/footable.all.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
     <script src="{{ URL::asset('/bower_components/sweetalert/sweetalert.min.js') }}"></script>
     <script src="{{ URL::asset('/js/product.js') }}"></script>
@endsection