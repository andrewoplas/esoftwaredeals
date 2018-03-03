<?php

namespace App\Http\Controllers\tango;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function __construct(){

          //$this->middleware('auth:admin');
     }

	public function index(){
		$categories = Category::get();

		return view('tango.pages.categories',compact('categories'));
	}

    public function store(Request $request){
		$this->validate(request(),[
			'category_name' => 'required|unique:categories'
		]);
		$slug = str_slug(request('category_name'),'-');
		$request->merge(['slug'=>$slug]);
		Category::create(request(['category_name','parent_category','slug']));
		return redirect('/tango/categories');
	}

	public function show(Category $category){
		$categories = Category::get();
		$form_type = $category->exists == 1? 'Edit' : 'Add';
		return view('tango.pages.category_form',compact('category','form_type','categories'));
	}

	public function update(Category $category){
		if($category->category_name == request('category_name')){
			$this->validate(request(),[
				'category_name' => 'required'
			]);
		} else {
			$this->validate(request(),[
				'category_name' => 'required|unique:categories'
			]);
		}
		$category->category_name = request('category_name');
		$category->parent_category = request('parent_category');

		//create Slug
		$slug = str_slug(request('category_name'),'-');
		$category->slug = $slug;
		$category->save();
		return redirect('/tango/categories');
	}

	public function destroy(Category $category){
		$category->delete();
	}
}
