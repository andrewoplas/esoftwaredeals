<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\License;

class LicenseController extends Controller
{
	public function __construct()
	{
	    //$this->middleware('auth');
	}

	public function index()
	{
		$licenses = DB::table('licenses')
							->join('products', 'licenses.product_id', '=', 'products.id')
							->select('products.*', 'licenses.id as id', 'licenses.key as key', 'licenses.is_assigned as is_assigned', 'licenses.created_at as created_at')
							->get();
		$licenses_is_assigned = DB::table('licenses')->where('is_assigned', '1')->get();			
		$licenses_not_assigned = DB::table('licenses')->where('is_assigned', '0')->get();			

		$licenses_container = array();
		foreach ($licenses as $license) {
			if (!isset($licenses_container[$license->product_name])) {
				$licenses_container[$license->product_name] = array(
					'assigned' => 0,
					'unassigned' => 0
				);
			}

			if ($license->is_assigned == 0) {
				$licenses_container[$license->product_name]['unassigned']++;
			} else {
				$licenses_container[$license->product_name]['assigned']++;
			}
		}
		return view('pages.licenses', compact('licenses', 'licenses_is_assigned', 'licenses_not_assigned', 'licenses_container'));
	}

	public function create()
	{
		$products = DB::table('products')
							->join('categories', 'products.category', '=', 'categories.id')
							->select('categories.*', 'products.id as prod_id', 'products.category', 'products.product_name')
							->get();

		$products_container = array();
		foreach ($products as $product) {
			if (!isset($products_container[$product->category_name])) {
				$products_container[$product->category_name] = array();
			}
			array_push($products_container[$product->category_name], $product);
		}
		return view('pages.add_license', compact('products_container'));
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
           	'key' => 'required',
           	'product_id' => 'required|integer'
      	]);

      	$license = new License();
      	$license->key = $request['key'];
      	$license->product_id = $request['product_id'];
      	$license->save();

      	return redirect('/tango/licenses');
	}

	public function destroy(License $license)
	{
		$isAssigned = $license->is_assigned;
		$license->forceDelete();

		print($isAssigned);
	}

	public function getDetailedView() 
	{
		$licenses = DB::table('licenses')
							->join('products', 'licenses.product_id', '=', 'products.id')
							->select('products.*', 'licenses.id as id', 'licenses.key as key', 'licenses.is_assigned as is_assigned', 'licenses.created_at as created_at')
							->get();

		$licenses_container = array();
		foreach ($licenses as $license) {
			if (!isset($licenses_container[$license->product_name])) {
				$licenses_container[$license->product_name] = array(
					'assigned' => 0,
					'unassigned' => 0
				);
			}

			if ($license->is_assigned == 0) {
				$licenses_container[$license->product_name]['unassigned']++;
			} else {
				$licenses_container[$license->product_name]['assigned']++;
			}
		}

		$output_container = array();
		foreach ($licenses_container as $product => $licenses) 
		{
			$temp = array($product, 
						  $licenses['assigned'] + $licenses['unassigned'],
						  $licenses['assigned'],
						  $licenses['unassigned']);
			array_push($output_container, $temp);
		}

		print(json_encode($output_container));
	}
}
