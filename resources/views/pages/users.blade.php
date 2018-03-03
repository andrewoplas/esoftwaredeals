@extends('layouts.master')

@section('title')
Users
@endsection

@section('cssfiles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet" type="text/css">
<link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<link href="/css/user.css" rel="stylesheet">
@endsection

@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Users</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7">
                <div class="panel panel-info">
                    <div class="panel-heading"> 
                       Accounts / Users List
                    </div>
                    <div class="white-box">
                        <div class="table-responsive">
                            <!-- CSFR token for ajax call -->
                            <input type="hidden" name="_token" val="{{ csrf_token() }}"/>
                            <table id="userTable" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                <img class="img-circle" src="{{ $user->image }}" alt="{{ $user->full_name }}'s image" width="50" style="margin-right:5px">
                                                                <a href="/tango/users/{{$user->id}}">
                                                {{ $user->full_name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->telephone_number }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('m/d/Y') }}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-outline btn-circle" onclick="confirm_delete({{ $user->id }}, '{{ $user->full_name }}', this)">
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
                    <h3 class="box-title">All Users <span class="pull-right" id="allUsersCount">{{ $users->count() }}</span></h3>
                    <hr>
                        <p>Admin <span class="pull-right" id="premiumUsersCount">{{ $premium_users }}</span></p>
                        <p>Normal <span class="pull-right" id="normalUsersCount">{{ $normal_users }}</span></p>
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
<script src="/js/user.js"></script>
@endsection