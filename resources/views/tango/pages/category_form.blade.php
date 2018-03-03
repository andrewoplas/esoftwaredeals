@extends('tango.layouts.master')

@section('title')
Categories - {{ $form_type }}
@endsection

@section('cssfiles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('content')
@include('tango.layouts.header')
@include('tango.layouts.sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Category {{ $form_type }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">{{ $form_type }} Category</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="categId" value="{{ @$category->id }}
                                <div class="form-body">
                                    @include('tango.layouts.errors')
                                    <h3 class="box-title">About Category</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category Name</label>
                                                <input type="text" class="form-control" name="category_name" value="{{ @$category->category_name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Parent Category</label>
                                                <select class="selectpicker" name="parent_category" data-style="form-control">
                                                    <option value="">-</option>
                                                    @foreach($categories as $categorychoice)
                                                        @if($categorychoice->category_name <> $category->category_name)
                                                        <option value="{{$categorychoice->id}}"
                                                         {{ @$categorychoice->id == $category->parent_category? 'selected' : '' }}>
                                                            {{$categorychoice->category_name}}
                                                        </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>           
                                    </div>
                                <hr>
                                <div class="form-actions m-t-40">
                                    <button type="submit" id="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> {{$form_type}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('tango.layouts.footer');
@endsection
@section('jsfiles')   
     <script src="/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
     <script src="/bower_components/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/bower_components/sweetalert/sweetalert.min.js"></script>
@endsection