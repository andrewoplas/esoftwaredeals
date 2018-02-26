@extends('layouts.master')

@section('title')
Licenses
@endsection

@section('cssfiles')
<link href="/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">License Add</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Add License</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    @include('layouts.errors')
                                    <h3 class="box-title">About License</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Product</label>
                                                <select class="selectpicker" name="product_id" data-style="form-control">
                                                    @foreach ( $products_container as $category_name => $products_array )
                                                        <optgroup label="{{ $category_name }}">
                                                            @foreach ( $products_array as $single_product )
                                                                <option value="{{ $single_product->prod_id }}">
                                                                    {{ $single_product->product_name }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">License Key</label>
                                                <input type="text" class="form-control single-key-input" name="key" required>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-info">
                                                    <input id="bulkUploadCheckbox" type="checkbox">
                                                    <label for="bulkUploadCheckbox">Bulk Upload (.csv)</label>
                                                </div>
                                            </div>
                                            <div class="form-group file-upload-group hidden">
                                                <label>File upload</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="form-control" data-trigger="fileinput">
                                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                        <span class="fileinput-filename"></span>
                                                    </div>
                                                    <span class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileinput-new">Select file</span> 
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="bulk_key" class="bulk-key-input" disabled>
                                                    </span>
                                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-actions m-t-40">
                                    <button type="submit" id="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Add</button>
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
<script src="/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/bower_components/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/js/ampleadmin/waves.js"></script>
<script src="/js/ampleadmin/jasny-bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('#licenseTable').DataTable( {
            "bLengthChange": false,
            "info":     false
        });

        $('#bulkUploadCheckbox').change(function () {
            if ($("#bulkUploadCheckbox").is(":checked")) {
                $(".file-upload-group").removeClass('hidden');
                $(".single-key-input").prop("disabled", true);
                $(".single-key-input").val("");
                $(".bulk-key-input").prop("disabled", false);
                $(".bulk-key-input").prop("required", true);
                
            } else {
                $(".file-upload-group").addClass('hidden');
                $(".single-key-input").prop("disabled", false);
                $(".bulk-key-input").prop("disabled", true);
                $(".bulk-key-input").prop("required", false);
            }
        });
    });
</script>
@endsection