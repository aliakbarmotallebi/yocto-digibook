<?php namespace App\Controllers\Dashboard;

use App\Models\Order;
use Exception;

class OrderController extends DashboardController{
    
    public function __construct()
	{
        parent::__construct();
    }

	public function index()
	{
        $orders = Order::latest('id')->paginate(5);
		return view('dashboard/orders/index.html.php', compact('orders'));
    }
    
    public function show($param)
	{
        $order = Order::find($param->id);
        if(! $order)
        { return false;}

        $details = $order->items;

        return view('dashboard/orders/details.html.php', compact('details'));
    }
    
    public function delete($param)
	{
        try{
            $order = Order::find($param->id);
            $order->delete(); 

            flash()->info('سفارش موردنظر حذف شد');
            return redirect(route('dashboard.orders.index'));

        }catch(\Exception $e){}
        
        
	}
}