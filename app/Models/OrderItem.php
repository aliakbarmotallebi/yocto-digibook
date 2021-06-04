<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $fillable = [
        'order_id', 'product_id', 'qty', 'price'
    ];

    public function getPriceAttribute($value)
    {
        return number_format($value). " تومان";
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}