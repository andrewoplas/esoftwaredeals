<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index(){
          $products = Product::latest()->get();
          return view('layouts.product.products', compact('products'));
    }

    public function show(Product $product){
          $categories = Category::latest()->get();
          return view('layouts.product.form', compact('product', 'categories'));
    }

    public function store(Request $request){ 
          $this->validate(request(),[
               'product_name' => 'required',
               'slug' => 'required',
               'category' => 'required|integer',
               'description' => 'required',
               'price' => 'required|integer',
               'sale_price' => 'required|integer',
               'quantity' => 'required|integer',
               'availability' => 'required',
               'image' => 'required'
          ]);
          $modified_data = $request->all();
          $modified_data['image'] = '/images/product_thumbnails/' . $request->input('slug') . '.png';

          $data = $request->input('image');
          list($type, $data) = explode(';', $data);
          list(, $data)      = explode(',', $data);
          $data = base64_decode($data);
          file_put_contents(public_path('\images\product_thumbnails\\' .  $request->input('slug') . '.png'), $data);

          Product::create($modified_data);

          return redirect('/products');
     }

     public function update(Request $request){
          $product = Product::select('slug')->where('id', '=', $request->input('id'))->get();
          
          if(strlen($request->input('image'))>10){
               unlink(public_path('/images/product_thumbnails/'. $product[0]->slug .'.png'));
               $data = $request->input('image');
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);
               $data = base64_decode($data);
               file_put_contents(public_path('\images\product_thumbnails\\' .  $request->input('slug') . '.png'), $data);
          } else if($product[0]->slug != $request->input('slug')){
               Storage::disk('local_public')->move('/images/product_thumbnails/'. $product[0]->slug .'.png', 
                              '/images/product_thumbnails/'. $request->input('slug') .'.png');     
          } 

          Product::where('id',$request->input('id'))
               ->update([
                    'product_name'=> $request->input('product_name'),
                    'slug'=> $request->input('slug'),
                    'category'=> $request->input('category'),
                    'price'=> $request->input('price'),
                    'sale_price'=> $request->input('sale_price'),
                    'description'=> $request->input('description'),
                    'quantity'=> $request->input('quantity'),
                    'availability'=> $request->input('availability'),
                    'image'=> '/images/product_thumbnails/' . $request->input('slug') . '.png',
               ]);

          return redirect('/products');
     }
}
