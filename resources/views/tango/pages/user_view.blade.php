@extends('tango.layouts.master')

@section('title')
User Accounts - User Detail
@endsection

@section('cssfiles')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
	<link href="/css/tango/user.css" rel="stylesheet">
@endsection

@section('content')
    @include('tango.layouts.header')
    @include('tango.layouts.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">User Detail</h4>
                </div>
            </div>
            
            <div class="row">
            	<div class="col-md-4">
            		<div class="panel panel-default">
                    	<div class="panel-wrapper collapse in">
                    		<img src="{{ $user->image }}" alt="{{ $user->full_name }}'s image" width="100%" style="margin-right:5px">
	                    	<div class="panel-body" style="padding-right: 0px;padding-left: 0px;padding-top: 0px;">
								<div class="col-md-12 no_side_padding border-bottom">
									<div class="col-md-6 no_side_padding">
										<h3 class="user-info">Name</h3>
										<h3 class="user-info-value">{{$user->full_name}}</h3>
									</div>
									<div class="col-md-6 no_side_padding border-left b">
										<h3 class="user-info">User Type</h3>
										
										<h3 class="user-info-value">{{$user->admin?'Admin':'Normal'}}</h3>
										
									</div>
								</div>
								<div class="col-md-12 no_side_padding border-bottom">
									<div class="col-md-6 no_side_padding">
										<h3 class="user-info">Email</h3>
										<h3 class="user-info-value">{{$user->email}}</h3>
									</div>
									<div class="col-md-6 no_side_padding border-left">
										<h3 class="user-info">Phone</h3>
										<h3 class="user-info-value">{{$user->telephone_number}}</h3>
									</div>
								</div>
								<div class="col-md-12 no_side_padding">
									<h3 class="address">Address</h3>
									<h3 class="address-value">{{ $user->address }}</h3>
								</div>
	                        </div>
	                    </div>
	                </div>
            	</div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                    	<div class="panel-wrapper collapse in">
	                    	<div class="panel-body">
	                        	<ul class="nav customtab nav-tabs" role="tablist">
	                        		<li role="presentation" class="active"><a href="#orders" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Orders</span></a></li>
                                	<li role="presentation" class=""><a href="#keys" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Keys</span></a></li>
	                        	</ul>
	                        	<div class="tab-content">
	                                <div role="tabpanel" class="tab-pane fade active in" id="orders">
	                                	<div class="scrollable">
	                                    <div class="table-responsive">
		                                <table id="demo-foo-addrow" class="table" data-pages-size="10">
		                                    <thead>
		                                        <tr>
		                                            <th>Order ID</th>
		                                            <th>Photo</th>
		                                            <th>Product</th>
		                                            <th>Quantity</th>
		                                            <th>Date</th>
		                                            <th>Status</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="vertical-align-center">#981238</td>
		                                            <td class="vertical-align-center">
		                                            	<img src="\images\product_thumbnails\\123.png" width="50">
		                                            </td>
		                                            <td class="vertical-align-center">Windows 10 Ultimate</td>
		                                            <td class="vertical-align-center">1</td>
		                                            <td class="vertical-align-center">02-16-18</td>
		                                            <td class="vertical-align-center"><span class="label label-success">Paid</span> </td>
		                                        </tr>
		                                    </tbody>
		                                    <tfoot>
		                                    	<tr>
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
	                                <div role="tabpanel" class="tab-pane fade" id="keys">
	                                    <div class="col-md-6">
	                                        <h3>Lets check profile</h3>
	                                        <h4>you can use it with the small code</h4> </div>
	                                    <div class="col-md-5 pull-right">
	                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </div>
		                    </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('tango.layouts.footer')
@endsection

@section('jsfiles')
	<script src="/bower_components/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="/bower_components/sweetalert/sweetalert.min.js"></script>
	<script src="/js/tango/user.js"></script>
@endsection
