@extends ('tango.layouts.master')

@section ('title')
     Categories
@endsection

@section ('cssfiles')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <link href="/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
     <link href="/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
     <link href="/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
@endsection

@section ('content')
     @include ('tango.layouts.header')
     @include ('tango.layouts.sidebar')

     <div id="page-wrapper">
          <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">Categories</h4> 
                    </div>
               </div>
               
               <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-7">
                         <div class="panel panel-info">
                              <div class="panel-heading"> 
                                Category List
                              </div>
                              <div class="panel-wrapper collapse in">
                                   <div class="panel-body">
                                        <div class="table-responsive">
                                             <!-- CSFR token for ajax call -->
                                             <input type="hidden" name="_token" val="{{ csrf_token() }}"/>
                                             <table id="categoryTable" class="table">
                                                  <thead>
                                                       <tr>
                                                            <th>No</th>
                                                            <th>Category Name</th>
                                                            <th>Parent Category</th>
                                                            <th>Slug</th>
                                                            <th style="text-align:center">Action</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>
                                                       @php $count = 1; @endphp
                                                       @foreach ($categories as $category)
                                                       <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>
                                                               {{$category->category_name}}
                                                            </td>
                                                            <td >
                                                               @php $parCateg = isset($category->parentCategory)? $category->parentCategory->category_name: '-';
                                                               @endphp
                                                               {{$parCateg}}
                                                            </td>
                                                            <td>
                                                               {{$category->slug}}
                                                            </td>
                                                            <td align="center" width="10%">
                                                                 <a href="/tango/categories/edit/{{ $category->id }}" class="btn btn-info btn-outline btn-circle">
                                                                      <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a href="javascript:void(0)" class="btn btn-danger btn-outline btn-circle" onclick="confirm_delete({{ $category->id }}, '{{ $category->category_name }}', this)">
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
                    </div>

            <div class="col-md-3 col-lg-3 col-sm-5">
              <div class="white-box">
                  <h3 class="box-title" style="margin-bottom: 0px">All Categories <span class="pull-right" id="allCategoriesCount">{{ $categories->count() }}</span></h3>
              </div>   
            </div>
            <div class="col-md-3 col-lg-3 col-sm-5">
                <div class="white-box">
                    <h3 class="box-title">New Category</h3>
                    <hr>
                    <a href="/tango/categories/add" class="btn btn-info waves-effect waves-light" style="width: 100%;">Add New Category</a>
                </div>
            </div>
             </div>
          </div>
     </div> 

     @include ('tango.layouts.footer')
@endsection

@section ('jsfiles')
     <script src="/bower_components/datatables/jquery.dataTables.min.js"></script>    
     <script src="/bower_components/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/bower_components/sweetalert/sweetalert.min.js"></script>
     <script src="/js/tango/category.js"></script>
@endsection