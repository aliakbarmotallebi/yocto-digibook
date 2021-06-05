<?php namespace App\Controllers\Main;

use App\Facades\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class CheckoutController 
{

    protected $user;

    public function __construct()
    {
        if( Cart::count() == 0 ){

            flash()->danger('سبد خرید شما خالی می باشد');
            return redirect(route('cart.index'));
        }

        if( ! auth()->check() ){
            return redirect(route('auth.index'));
        }

        $this->user = auth()->user();
    }

    public function getCheckout()
    {
        $user = $this->user;

        return view('main/checkout.html.php', compact('user'));
    }

    public function storeOrderDetails()
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
            return redirect(route('checkout.index'));
        }
        
        $user = $this->user->update(request()->all());

        $order = Order::create([
            'user_id' => $this->user->id,
            'total_price' => Cart::Total()
        ]);
    
        if ($order) {
    
            $items = Cart::getContent();
    
            foreach ($items as $item)
            {
                $product = Product::find($item->id);
    
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'qty'      =>  $item->qty,
                    'price'         =>  $item->price
                ]);
    
                $order->items()->save($orderItem);
            }
        }
        
        Cart::destroy();
        flash()->success('سفارش شما باموفقیت ثبت شد');
        return redirect(route('user.orders'));
        
    }
}