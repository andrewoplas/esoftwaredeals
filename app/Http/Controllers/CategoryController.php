<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index(){
		$categories = Category::latest()->get();
		return view('layouts.addCategories.addCategory',compact('categories'));
	}

    public function store(){
		$this->validate(request(),[
			'category_name' => 'required|unique:categories',
			'slug' => 'required'
		]);
		Category::create(request(['category_name','parent_category','slug']));
		return redirect('/categories');
	}
}
