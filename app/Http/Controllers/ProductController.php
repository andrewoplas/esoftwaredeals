<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Product;
use App\Category;

class ProductController extends Controller
{
     public function __construct()
     {
          //$this->middleware('auth');
     }

     public function index()
     {
          $products = Product::latest()->get();
          return view('pages.products', compact('products'));
     }

     public function show(Product $product)
     {
          $categories = Category::latest()->get();
          $form_type = $product->exists == 1? 'Edit' : 'Add';
          return view('pages.products_form', compact('product', 'categories', 'form_type'));
     }

     public function store(Request $request)
     { 
          $this->validate(request(), [
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
          $modified_data['image'] = '/images/product_thumbnails/' . $request->slug . '.png';

          $data = $request->input('image');
          list($type, $data) = explode(';', $data);
          list(, $data)      = explode(',', $data);
          $data = base64_decode($data);
          file_put_contents(public_path('\images\product_thumbnails\\' .  $request->slug . '.png'), $data);

          Product::create($modified_data);
          return redirect('/tango/products');
     }

     public function update(Request $request)
     {
          $product = Product::select('slug')->where('id', $request->id)->get();
          
          if(strlen($request->image)>10)
          {
               unlink(public_path('/images/product_thumbnails/'. $product[0]->slug .'.png'));
               $data = $request->image;
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);
               $data = base64_decode($data);
               file_put_contents(public_path('\images\product_thumbnails\\' .  $request->slug . '.png'), $data);
          } 
          else if($product[0]->slug != $request->slug)
          {
               Storage::disk('local_public')->move('/images/product_thumbnails/'. $product[0]->slug .'.png', 
                              '/images/product_thumbnails/'. $request->slug .'.png');     
          } 

          Product::where('id', $request->input('id'))
               ->update([
                    'product_name'=> $request->input('product_name'),
                    'slug'=> $request->input('slug'),
                    'category'=> $request->input('category'),
                    'price'=> $request->input('price'),
                    'sale_price'=> $request->input('sale_price'),
                    'description'=> $request->input('description'),
                    'quantity'=> $request->input('quantity'),
                    'availability'=> $request->input('availability'),
                    'image'=> '/images/product_thumbnails/' . $request->slug . '.png',
               ]);

          return redirect('/tango/products');
     }

     public function destroy(Product $product){
          $product->forceDelete();
     }
}
