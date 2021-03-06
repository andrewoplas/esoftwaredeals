@extends ('tango.layouts.master')

@section ('title')
     Products
@endsection

@section ('cssfiles')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
     <link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
@endsection

@section ('content')
     @include ('tango.layouts.header')
     @include ('tango.layouts.sidebar')

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
                                   Product List
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
                                                            <th class="text-center">Quantity</th>
                                                            <th class="text-center">Price</th>
                                                            <th class="text-center">Sale Price</th>
                                                            <th class="text-center">Category</th>
                                                            <th class="text-center">Action</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>

                                                       @foreach ($products as $product)
                                                       <tr>
                                                            <td width="13%">
                                                                 <img src="{{ Storage::disk('storage')->url($product->image) }}" alt="{{ $product->product_name }}'s image" width="80">
                                                            </td>
                                                            <td width="35%">
                                                                 <h5>{{ $product->product_name }}</h5>
                                                                 <p>{{ str_limit($product->description, 125) }}</p>
                                                            </td>
                                                            <td align="center" width="10%"> {{ $product->quantity }} </td>
                                                            <td align="center" width="8%">{{ number_format($product->price, 2, '.', ',') }}</td>
                                                            <td align="center" width="10%">{{ number_format($product->sale_price, 2, '.', ',') }}</td>
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
                            <h3 class="box-title" style="margin-bottom: 0px">All Products
                                <span class="pull-right" id="count">
                                    {{ $products->count() }}
                                </span>
                            </h3>
                        </div>  
              
                         <div class="white-box">
                              <h3 class="box-title">New Product</h3>
                              <hr>
                              <a href="/tango/products/add" class="btn btn-info btn-block">Add New Product</a>
                         </div>
                    </div>
             </div>
          </div>
     </div> 

     @include ('tango.layouts.footer')
@endsection

@section ('jsfiles')  
     <script src="/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
     <script src="/bower_components/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/bower_components/sweetalert/sweetalert.min.js"></script>
     <script src="/js/tango/product.js"></script>
@endsection