@extends('layouts.master')

@section('title')
Licenses
@endsection

@section('cssfiles')
<link href="/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet" type="text/css">
<link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Licenses</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7">
                <div class="white-box">
                    <h3 class="box-title m-b-0">List of Product Keys</h3>
                    <div class="table-responsive">
                        <table id="licenseTable" class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>License Key</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($licenses as $license)
                                    <tr>
                                        <td>
                                            {{ $license->product_name }}
                                        </td>
                                        <td>
                                            {{ $license->key }}
                                        </td>
                                        <td>
                                            @if ($license->is_assigned != 0)
                                                <span class="label label-success label-rounded">Assigned</span>
                                            @else
                                                <span class="label label-danger label-rounded">Unassigned</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($license->created_at)->format('m/d/Y') }}
                                        </td>
                                        <td>

                                            <form method="POST" action="/tango/licenses/delete" class="delete_license">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ @$license->id }}">
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn delete-warning" data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="ti-close" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-5">
                <div class="white-box">
                    <h3 class="box-title">All Licenses <span class="pull-right">{{ $licenses->count() }}</span></h3>
                    <hr>
                        <p>Assigned <span class="pull-right">{{ $licenses_is_assigned->count() }}</span></p>
                        <p>Unassigned <span class="pull-right">{{ $licenses_not_assigned->count() }}</span></p>
                    <br>
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#detailedViewModal" style="width: 100%;">Detailed View</button>
                </div>
                <div class="modal fade" id="detailedViewModal" tabindex="-1" role="dialog" aria-labelledby="detailedModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="detailedModalLabel">Detailed View</h4>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="detailedViewTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Licenses</th>
                                                <th>Assigned</th>
                                                <th>Unassigned</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($licenses_container as $product_name => $license_counts)
                                                <tr>
                                                    <td>{{ $product_name }}</td>
                                                    <td>{{ $license_counts['assigned'] + $license_counts['unassigned'] }}</td>
                                                    <td>{{ $license_counts['assigned'] }}</td>
                                                    <td>{{ $license_counts['unassigned'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-5">
                <div class="white-box">
                    <h3 class="box-title">New License</h3>
                    <hr>
                    <a href="/tango/licenses/add" class="btn btn-info waves-effect waves-light" style="width: 100%;">Add New License</a>
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
<script src="/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/js/ampleadmin/waves.js"></script>
<script>
    $(document).ready(function() {
        $('#licenseTable').DataTable( {
            "bLengthChange": false,
            "info": false
        });

        $('#detailedViewTable').DataTable( {
            "bLengthChange": false,
            "info": false,
            searching: false,
            paging: false
        });

        $('.delete-warning').click(function(e){
            e.preventDefault();
            var button = $(this);
            swal({   
                title: "Are you sure?",   
                text: "You will not be able to recover this license",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: true
            }, function(){
                $(button).parent().submit();
            });
        });
    });
</script>
@endsection