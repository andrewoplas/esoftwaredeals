@extends('layouts.master')

@section('title')
Products
@endsection

@section('cssfiles')
<link href="../bower_components/footable/css/footable.core.css" rel="stylesheet">
<link href="../bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<link href="../bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
@endsection

@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Products</h4> </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-7">
                <div class="panel panel-info">
                    <div class="panel-heading"> List of Products ({{count($products)}} items)</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <div class="table-responsive">
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
                                        @foreach($products as $product)
                                        <tr>
                                            <td width="13%"><img src="{{$product->image}}" alt="{{$product->product_name}}'s image" width="80"></td>
                                            <td width="40%">
                                                <h5 class="font-500">{{$product->product_name}}</h5>
                                                <p>{{$product->description}}</p>
                                            </td>
                                            <td align="center" width="10%">{{$product->quantity}}</td>
                                            <td align="center" width="8%">{{$product->price}}</td>
                                            <td align="center" width="10%">{{$product->sale_price}}</td>
                                            <td align="center" width="5%">{{$product->category}}</td>
                                            <td align="center" width="5%">
                                                <a href="/products/edit/{{$product->id}}" class="text-inverse" title="" 
                                                  data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil text-dark"></i>
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
                    <a href="/products/add" class="btn btn-success btn-block">Add</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer');
@endsection
@section('jsfiles')
<script src="../bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="js/ampleadmin/jquery.slimscroll.js"></script>
<script src="js/ampleadmin/waves.js"></script>
<script src="../bower_components/footable/js/footable.all.min.js"></script>
<script src="../bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="js/ampleadmin/footable-init.js"></script>
<script src="../bower_components/styleswitcher/jQuery.style.switcher.js"></script>
@endsection