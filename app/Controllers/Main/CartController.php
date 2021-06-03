<?php namespace App\Controllers\Main;

use App\Facades\Cart;
use App\Helper\Session;
use App\Helper\CartItem;
use App\Models\Product;

class CartController {

    public function index()
    {
        $carts = Cart::all();
        return view('main/cart.html.php', compact('carts'));
    }

    public function add($param)
    {
        $product = Product::find($param->id);

        if(! $product){
            flash()->danger('لطفا مجددا تلاش کنید');
            return redirect(route('main.index'));
        }

        $cart = Cart::add(
            $product->id,
            $product->title,
            1,
            $product->getRawOriginal('price')
        );

        ($cart) ? 
            flash()->success('با موفقیت به سبد خرید اضافه شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
    
        return redirect(route('cart.index'));
        
    }

    public function delete($param)
    {
        $cart = Cart::remove($param->rowId);

        ($cart) ? 
            flash()->info('باموفقیت حذف شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
        
        return redirect(route('cart.index'));
    }

}