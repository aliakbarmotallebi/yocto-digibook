<?php namespace App\Controllers\Main;

use App\Models\Product;

class MainController {
	
	public function index()
	{
		$products = Product::paginate(10);
		return view('main/index.html.php', compact('products') );
	}
}