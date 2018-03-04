<?php

namespace App\Http\Controllers\tango;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
     public function __construct()
     {
          $this->middleware('auth:admin');
     }

     public function index()
     {
          $products = Product::latest()->get();
          
          foreach ($products as $product) 
          {
              $quantity = DB::table('licenses')
                     ->select(DB::raw('count(*) as license_count'))
                     ->where('product_id', '=', $product->id)
                     ->get();
              $product['quantity'] = $quantity[0]->license_count;
          }
          
          return view('tango.pages.products', compact('products', 'quantity'));
     }

     public function show(Product $product)
     {
          $categories = Category::latest()->get();
          $form_type = $product->exists == 1? 'Edit' : 'Add';
          return view('tango.pages.products_form', compact('product', 'categories', 'form_type'));
     }

     public function store(Request $request)
     { 
          $this->validate(request(), [
               'product_name' => 'required|unique:products',
               'slug' => 'required',
               'category' => 'required|integer',
               'description' => 'required',
               'price' => 'required|between: 0,9999999999|numeric',
               'sale_price' => 'required|between: 0,9999999999|numeric',
               'image' => 'required'
          ]);
          
          $modified_data = $request->all();
          $modified_data['image'] = 'product_thumbnails' . DIRECTORY_SEPARATOR . $request->slug . '.png';
         

          $data = $request->input('image');
          list($type, $data) = explode(';', $data);
          list(, $data)      = explode(',', $data);
          $data = base64_decode($data);
          file_put_contents(storage_path('app' .DIRECTORY_SEPARATOR. 'public' .DIRECTORY_SEPARATOR. 'product_thumbnails' . DIRECTORY_SEPARATOR . $request->slug . '.png'), $data);

          Product::create($modified_data);
          return redirect('/tango/products');
     }

     public function update(Request $request)
     {
          $product = Product::select('slug')->where('id', $request->id)->get();
          if($request->edited == 1)
          {
               $this->validate(request(), [ 'product_name' => 'required|unique:products' ]);
          }
          $this->validate(request(), [
               'slug' => 'required',
               'category' => 'required|integer',
               'description' => 'required',
               'price' => 'required|between:0,999999999|numeric',
               'sale_price' => 'required|between:0,999999999|numeric',
               'image' => 'required'
          ]);

          if(strlen($request->image)>10)
          {
               unlink(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'product_thumbnails' . DIRECTORY_SEPARATOR . $product[0]->slug . '.png'));
               $data = $request->image;
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);
               $data = base64_decode($data);
               file_put_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'product_thumbnails' . DIRECTORY_SEPARATOR . $request->slug . '.png'), $data);
          } 
          else if($product[0]->slug != $request->slug)
          {
               Storage::disk('storage')->move('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'product_thumbnails' . DIRECTORY_SEPARATOR . $product[0]->slug .'.png', 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'product_thumbnails' . DIRECTORY_SEPARATOR . $request->slug .'.png');     
          } 

          Product::where('id', $request->input('id'))
               ->update([
                    'product_name'=> $request->input('product_name'),
                    'slug'=> $request->input('slug'),
                    'category'=> $request->input('category'),
                    'price'=> $request->input('price'),
                    'sale_price'=> $request->input('sale_price'),
                    'description'=> $request->input('description'),
                    'image'=> 'product_thumbnails' . DIRECTORY_SEPARATOR . $request->slug . '.png',
               ]);

          return redirect('/tango/products');
     }

     public function destroy(Product $product){
          unlink(storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'product_thumbnails' . DIRECTORY_SEPARATOR . $product->slug . '.png');
          $product->forceDelete();
     }
}
