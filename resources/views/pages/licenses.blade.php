@extends('layouts.master')

@section('title')
Licenses
@endsection

@section('cssfiles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                <div class="panel panel-info">
                    <div class="panel-heading"> 
                       License List
                    </div>
                    <div class="white-box">
                        <div class="table-responsive">
                            <!-- CSFR token for ajax call -->
                            <input type="hidden" name="_token" val="{{ csrf_token() }}"/>
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
                                                <a href="javascript:void(0)" class="btn btn-danger btn-outline btn-circle" onclick="confirm_delete({{ $license->id }}, this)">
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
            <div class="col-md-3 col-lg-3 col-sm-5">
                <div class="white-box">
                    <h3 class="box-title">All Licenses <span class="pull-right" id="allLicensesCount">{{ $licenses->count() }}</span></h3>
                    <hr>
                        <p>Assigned <span class="pull-right" id="assignedLicensesCount">{{ $licenses_is_assigned->count() }}</span></p>
                        <p>Unassigned <span class="pull-right" id="unassignedLicensesCount">{{ $licenses_not_assigned->count() }}</span></p>
                    <br>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="detailedViewButton" data-toggle="modal" data-target="#detailedViewModal" style="width: 100%;" onclick="getDetailedView()">Detailed View</button>
                </div>
                <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailedModalLabel" id="detailedViewModal">
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

@include('layouts.footer')
@endsection
@section('jsfiles')
<script src="/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/js/ampleadmin/waves.js"></script>
<script src="/js/license.js"></script>
@endsection