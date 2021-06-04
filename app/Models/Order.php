<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public $timestamps = false;

    const STATUS_PAID  = "Paid";

    protected $fillable = [
        'user_id', 'order_date', 'total_price'
    ];

    protected $guarded = [
        'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalPriceAttribute($value)
    {
        return number_format($value). " تومان";
    }


    public function isPaid(): bool
    {
        return (bool) ($this->status == self::STATUS_PAID);
    }

    public function isUnpiad(): bool
    {
        return (bool) ! $this->isPaid();
    }
}