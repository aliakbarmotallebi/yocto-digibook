<?php namespace App\Controllers\User;

use App\Models\Order;

class PanelController extends UserController {
    
    public function __construct()
    {
        parent::__construct();
    }

	public function orders()
	{
        $orders = $this->user->orders()->latest('id')->get();

		return view('user/index.html.php', compact('orders'));
    }
    
    public function profile()
	{
        $user = $this->user;

		return view('user/profile.html.php', compact('user'));
    }
    
    public function editProfile()
	{
        
        if(! request()->isPost()){
            return false;
        } 
        
        $rules = [
            'first_name'  => 'required',
            'last_name'  => 'required',
            'mobile'      => 'required|min:10',
            'postal_code' => 'required|min:10',
            'address'  => 'required'
        ];
        
        if(! validation(request()->all() , $rules)) {
            return redirect(route('user.profile'));
        }
        
        $user = $this->user->update(request()->all());

        ($user) ? 
            flash()->success('با موفقیت ویرایش شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
        
        return redirect(route('user.profile'));

    }
    
    public function showOrderDetails($param)
    {
        $order = $this->user->orders()->find($param->id);
        if(! $order)
        { return false;}

        $details = $order->items;

        return view('user/details.html.php', compact('details'));
    }
}