@extends('layouts.master')

@section('title')
User Accounts
@endsection

@section('cssfiles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="/bower_components/footable/css/footable.core.css" rel="stylesheet">
<link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<link href="/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
<link href="/css/user.css" rel="stylesheet">
@endsection

@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">User Accounts</h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                    	<div class="panel-wrapper collapse in">
	                    	<div class="panel-body" style="padding-right: 0px;padding-left: 0px;">
	                    		<div class="col-md-2" >
	                    			<h4 class="all-account">All Accounts</h3>
	                    			<h4 class="all-account-value">{{$users->count()}}</h3>
	                    			<hr style="clear:both">
	                    			<div class="col-md-12 col-sm-12 col-xs-12 no_side_padding">
		                    			<h4 class="user-type">Premium Users</h4>
		                    			<h4 class="user-type-value">{{$premium_users}}</h4>
	                    			</div>
	                    			<div class="col-md-12 col-sm-12 col-xs-12 no_side_padding" style="margin-bottom: 20px">
		                    			<h4 class="user-type">Normal Users</h4>
		                    			<h4 class="user-type-value">{{$normal_users}}</h4>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-10 col-xs-12 border-left">
	                        		<h3 class="panel-title">Accounts / Users List</h3>
		                        	<div class="scrollable">
			                            <div class="table-responsive">
			                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
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
			                                        @php $count = 1; @endphp
			                                        @foreach($users as $user)
			                                            <tr>
			                                                <td>{{$count++}}</td>
			                                                <td>
			                                                	<img class="img-circle" src="{{ $user->user_image }}" alt="{{ $user->user_name }}'s image" width="80" style="margin-right:5px">
			                                                    <a href="/tango/users/{{$user->id}}">
			                                                    	{{$user->user_name}}
			                                                    </a>
			                                                </td>
			                                                <td>
			                                                    {{$user->user_email}}
			                                                </td>
			                                                <td>
			                                                    {{$user->user_phone_number}}
			                                                </td>
			                                                <td>
			                                                     {{$user->created_at->toFormattedDateString()}}
			                                                <td>
			                                                    <form id="userForm{{$user->id}}" method="POST" action="/tango/users" >
			                                                        {{csrf_field()}}
			                                                        {{method_field('DELETE')}}
			                                                        <input type="hidden" value={{$user->id}} name="userId">
			                                                        <button type="button" onclick="confirm_delete({{ $user->id }}, '{{ $user->user_name }}', this)" class="btn btn-sm btn-icon btn-pure btn-outline"><i class="ti-close" aria-hidden="true"></i></button>
			                                                    </form>
			                                                </td>
			                                            </tr>
			                                        @endforeach
			                                        @if (count($errors) > 0)
			    										<ul>
			    										        @foreach ($errors->all() as $error)
			    										            <li>{{ $error }}</li>
			    										        @endforeach
			    										</ul>
			    										@endif
			                                    </tbody>
			                                    <tfoot>
			                                        <tr>
			                                            
			                                            </div>
			                                            <td colspan="7">
			                                                <div class="text-right">
			                                                    <ul class="pagination"> </ul>
			                                                </div>
			                                            </td>
			                                        </tr>
			                                    </tfoot>
			                                </table>
			                            </div>
			                        </div>
			                    </div>
		                    </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
@endsection

@section('jsfiles')
<script src="/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/js/ampleadmin/jquery.slimscroll.js"></script>
<script src="/js/ampleadmin/waves.js"></script>
<script src="/js/ampleadmin/custom.min.js"></script>
<script src="/bower_components/footable/js/footable.all.min.js"></script>
<script src="/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="/js/ampleadmin/footable-init.js"></script>
<script src="/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/js/user.js"></script>
@endsection
