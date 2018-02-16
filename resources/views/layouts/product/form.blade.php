@extends('layouts.master')

<?php $form_type = $product->exists == 1? 'Edit' : 'Add'; ?>

@section('title')
Product - {{ $form_type }}
@endsection

@section('cssfiles')
<link href="{{URL::asset('/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{URL::asset('/bower_components/croppie/croppie.css')}}" rel="stylesheet" />
@endsection

@section('content')
@include('layouts.header')
@include('layouts.sidebar')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Product {{ $form_type }}</h4> </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">{{ $form_type }} Product</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    @include('layouts.errors')
                                    <input type="hidden" name="id" value="{{@$product->id}}"> 
                                    <h3 class="box-title">About Product</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="{{@$product->product_name}}" required> 
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Code</label>
                                                <input type="text" class="form-control" name="code" value="{{@$product->code}}" required>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select class="form-control" name="category" required>
                                                    @foreach($categories as $category)
                                                        <option value="{{@$category->id}}" 
                                                            {{ @$category->id == $product->category? 'selected' : '' }}>
                                                            {{@$category->category_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Slug</label>
                                                <input type="text" class="form-control" name="slug" value="{{@$product->slug}}" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="mdi mdi-currency-usd"></i></div>
                                                    <input type="text" class="form-control" name="price" value="{{@$product->price}}" required> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Sale Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="mdi mdi-currency-usd-off"></i></div>
                                                    <input type="text" class="form-control" name="sale_price" value="{{@$product->sale_price}}" required> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Quantity</label>
                                                <input type="text" class="form-control" name="quantity" value="{{@$product->quantity}}" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Availability</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="availability" id="yes" value="Yes" required 
                                                            {{ @$product->availability == 'Yes'? 'checked' : '' }} >
                                                            <label for="yes">Yes</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="availability" id="no" value="No" required
                                                            {{ @$product->availability == 'No'? 'checked' : '' }} >
                                                            <label for="no">No</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="box-title m-t-10">Product Description</h3>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <textarea class="form-control" name="description" required="">{{@$product->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <h3 class="box-title m-t-10">Product Description</h3>
                                            <img class="{{$form_type == 'Add'?'hide':''}}" id="product_thumbnail" src="{{$product->image}}" width="350" />
                                            <input type="hidden" id="imagebase64" name="image">
                                            <div id="upload-display" style="width:350px;display: none;"></div>
                                            <br><br>
                                            <div class="fileupload btn btn-info waves-effect waves-light">
                                                <span><i class="ion-upload m-r-5"></i>Upload</span>
                                                <input type="file" class="upload" id="upload" name="upload" 
                                                {{ $form_type == 'Add'? 'required' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    <hr> 
                                </div>
                                <div class="form-actions m-t-40">
                                    <button type="submit" id="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer');
@endsection
@section('jsfiles')
<script src="{{URL::asset('/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<script src="{{URL::asset('/js/ampleadmin/jquery.slimscroll.js')}}"></script>
<script src="{{URL::asset('/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{URL::asset('/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{URL::asset('/bower_components/croppie/croppie.min.js')}}"></script>
<script src="{{URL::asset('/bower_components/croppie/croppie-custom.js')}}"></script>

@endsection