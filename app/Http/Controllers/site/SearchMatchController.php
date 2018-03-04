<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;

class SearchMatchController extends Controller
{

    public function autocomplete(Request $request)
    {
        $products = Product::latest()->get()->pluck('product_name');

        return $products;
    }

    public function show(Request $request)
    {
        $products = Product::where('product_name', 'like', '%'.Input::get('s').'%')->get();

        return view('site.pages.search', compact('products'));
    }

}
