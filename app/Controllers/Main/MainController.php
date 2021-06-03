<?php namespace App\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
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

	public function logout()
    {
       session_destroy();
       redirect('/');
    }

	
}