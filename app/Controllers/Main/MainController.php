<?php namespace App\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
use App\Facades\Cart;

class MainController {

	protected $catgories;

	public function __construct()
	{
	
		$this->catgories = Category::get();
	}

	public function index()
	{
		if(! request()->input('search')){
			$products = Product::paginate(10);
		}else{
			$products = Product::search(request()->input('search'))->paginate(10);
		}

		$catgories = $this->catgories;

		return view('main/index.html.php', compact('products', 'catgories') );
	}

	public function catgeory($param)
	{
		$catgory = Category::find($param->id);
		if(! $catgory){
			redirect('/');
		}

		$products = $catgory->products()->paginate(10);
		$catgories = $this->catgories;

		return view('main/index.html.php', compact('products', 'catgories'));
	}

	public function single($param)
	{
		$product = Product::find($param->id);
		
		if(! $product){
			redirect('/');
		}

		return view('main/single.html.php', compact('product'));
	}

	public function logout()
    {
       session_destroy();
       redirect('/');
    }

	
}