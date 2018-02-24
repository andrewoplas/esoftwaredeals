@extends('layouts.master')

@section('title')
Categories
@endsection

@section('cssfiles')
<link href="/bower_components/footable/css/footable.core.css" rel="stylesheet">
<link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<link href="/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
@endsection



@section('content')
@include('layouts.header');
@include('layouts.sidebar');
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Contact listing</h3>
                    <div class="scrollable">
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Slug</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>
                                                {{$category->category_name}}
                                            </td>
                                            <td>
                                                @php $parCateg = isset($category->parentCategory)? $category->parentCategory->category_name: 'No Parent Category';
                                                @endphp
                                                {{$parCateg}}
                                            </td>
                                            <td>
                                                {{$category->slug}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#update-category{{$category->id}}">Update</button>
                                                <!-- update modal-->
                                                <div id="update-category{{$category->id}}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="updateCategory" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="updateCategory">Update New Category</h4> </div>
                                                    <form method = "POST" action="/tango/categories">
                                                    {{ csrf_field() }}
                                                    <input type='hidden' name='_method' value='PATCH'>
                                                        <div class="modal-body">
                                                            <from class="form-horizontal form-material">
                                                                <div class="form-group">
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="hidden" value={{$category->id}} name="categId">
                                                                        <input type="text" class="form-control" placeholder="Type Category Name" value="{{$category->category_name}}"
                                                                        name="category_name"></div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <select class="form-control" id="sel1" name="parent_category">
                                                                        <option value="">No Parent Category</option>
                                                                        @foreach($categories as $categoryChoices)
                                                                            @if($categoryChoices->category_name == $parCateg)
                                                                                <option value="{{$categoryChoices->id}}" selected>{{$categoryChoices->category_name}}</option>
                                                                            @elseif($categoryChoices->category_name <> $category->category_name)
                                                                                <option value="{{$categoryChoices->id}}">{{$categoryChoices->category_name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                      </select>
                                                                    </div>
                                                
                                                                </div>
                                                            </from>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info waves-effect">Add</button>
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </td>
                                            <td>
                                                <form method="POST" action="/tango/categories" onsubmit="return confirm('Do you really want to delete the category?')">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <input type="hidden" value={{$category->id}} name="categId">
                                                    <button class="btn btn-sm btn-icon btn-pure btn-outline" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
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
                                        <td colspan="2">
                                            <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-category">Add New Category</button>
                                        </td>
                                        <div id="add-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myModalLabel">Add New Category</h4> </div>
                                                    <form method="POST" action="/tango/categories">
                                                    {{ csrf_field() }}
	                                                    <div class="modal-body">
	                                                        <from class="form-horizontal form-material">
	                                                            <div class="form-group">
	                                                                <div class="col-md-12 m-b-20">
	                                                                    <input type="text" class="form-control" placeholder="Type Category Name" name="category_name"> </div>
	                                                                <div class="col-md-12 m-b-20">
	                                                                    <select class="form-control" id="sel1" name="parent_category">
	                                                                    <option value="">No Parent Category</option>
	                                                                    @foreach($categories as $category)
	                                                                    	<option value="{{$category->id}}">{{$category->category_name}}</option>
	                                                                    @endforeach
	                                                                  </select>
	                                                                </div>
	                                                           
	                                                            </div>
	                                                        </from>
	                                                    </div>
	                                                    <div class="modal-footer">
	                                                        <button type="submit" class="btn btn-info waves-effect">Add</button>
	                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
	                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            
                                        
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
@include('layouts.footer');
@endsection

@section('jsfiles')
<script src="/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="js/ampleadmin/jquery.slimscroll.js"></script>
<script src="js/ampleadmin/waves.js"></script>
<script src="js/ampleadmin/custom.min.js"></script>
<script src="/bower_components/footable/js/footable.all.min.js"></script>
<script src="/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="js/ampleadmin/footable-init.js"></script>
<script src="/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
@endsection
