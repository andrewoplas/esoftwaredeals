<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index(){
		$categories = Category::get();

		return view('pages.categories',compact('categories'));
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

	public function update(){
		$categ = Category::find(request('categId'));
		if($categ->category_name == request('category_name')){
			$this->validate(request(),[
				'category_name' => 'required'
			]);
		} else {
			$this->validate(request(),[
				'category_name' => 'required|unique:categories'
			]);
		}
		$categ->category_name = request('category_name');
		$categ->parent_category = request('parent_category');

		//create Slug
		$slug = str_slug(request('category_name'),'-');
		$categ->slug = $slug;
		$categ->save();
		return redirect('/categories');
	}

	public function delete(){
		$categ = Category::find(request('categId'));
		$categ->delete();
		return redirect('/categories');
	}
}
