<?php namespace App\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
class MainController {
	
	public function index()
	{
		$products = Product::paginate(10);
		$catgories = Category::get();
		return view('main/index.html.php', compact('products', 'catgories') );
	}
}