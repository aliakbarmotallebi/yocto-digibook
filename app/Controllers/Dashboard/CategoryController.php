<?php namespace App\Controllers\Dashboard;

use App\Models\Category;
use App\Models\User;

class CategoryController extends DashboardController{
    
    public function __construct()
	{
        parent::__construct();
    }

	public function index()
	{
        $categories = Category::latest()->get();
		return view('dashboard/categories.html.php', compact('categories'));
    }
    
    public function store()
    {
        if(! request()->isPost()){
            return false;
        } 
        
        $rules = [
            'label'  => 'required',
        ];
        
        if(! validation(request()->all() , $rules)) {
            return redirect(route('dashboard.categories.index'));
        }

        $category = Category::create([
            'label' => request('label')
        ]);


        ($category) ? 
            flash()->success('با موفقیت اضافه شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
        
        return redirect(route('dashboard.categories.index'));

    }

    public function delete($param)
	{
        try{
            $category = Category::find($param->id);
            $category->delete(); 

            flash()->info('دسته بندی موردنظر حذف شد');
            return redirect(route('dashboard.categories.index'));

        }catch(\Exception $e){}
    }
}