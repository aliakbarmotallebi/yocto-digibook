<?php namespace App\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Product;
use Exception;

class ProductController extends DashboardController{

    protected $categories;
    
    public function __construct()
	{
        parent::__construct();

        $this->categories = Category::latest()->get();
    }

	public function index()
	{
        $products = Product::latest('id')->paginate(5);
		return view('dashboard/products/index.html.php', compact('products'));
    }

    public function create()
	{
        $categories = $this->categories;
		return view('dashboard/products/create.html.php', compact('categories'));
    }

    public function store()
	{
        if(! request()->isPost()){
            return false;
        } 

        $rules = [
            'title'  => 'required',
            'price'  => 'required',
            'description'  => 'required',
            'category_id'  => 'required',
            'status' => 'required',
        ];
        
        if(! validation(request()->all() , $rules)) {
            return redirect(route('dashboard.products.create'));
        }

        if(! $this->hasFile('image')){ return false; }

        if(! $this->file('image')['status'] ){ return false; }

        $product = $this->user->products()->create( array_merge( 
                request()->all(),
                [ "image" => $this->file('image')['result'] ]
            )
        );

        $product->status = request('status');
        $product->save();

        ($product instanceof Product) ? 
            flash()->success('با موفقیت ایجاد شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
        
        return redirect(route('dashboard.products.index'));
    }

    public function edit($param)
	{
        $product = Product::find($param->id);
        
        if(! $product){ return false; }
        $categories = $this->categories;
		return view('dashboard/products/edit.html.php', compact('product', 'categories'));
    }

    public function update($param)
	{
        if(! request()->isPost()){
            return false;
        } 

        $rules = [
            'title'  => 'required',
            'price'  => 'required',
            'description'  => 'required',
            'category_id'  => 'required',
            'status' => 'required',
        ];
        
        if(! validation(request()->all() , $rules)) {
            return redirect(url("/dashboard/products/edit/$param->id"));
        }

        $data = request()->all();

        if($this->hasFile('image')){ 
            if($this->file('image')['status'] ){ 
                $data = array_merge( 
                    request()->all(),
                    [ "image" => $this->file('image')['result'] ]
                );
            }
         }

        $product = Product::find($param->id);
        
        if(! $product){ return false; }

        $product1 = $product->update($data);

        $product->status = (bool)request('status');
        $product->save();

        ($product1) ? 
            flash()->success('با موفقیت ویرایش شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
        
        return redirect(route('dashboard.products.index'));
    }
    
    public function delete($param)
	{
        try{
            $product = Product::find($param->id);
            $product->delete(); 

            flash()->info('کتاب موردنظر حذف شد');
            return redirect(route('dashboard.products.index'));

        }catch(\Exception $e){}
        
        
	}
}