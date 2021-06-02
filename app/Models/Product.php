<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'title', 'description', 'image', 'price', 'category_id', 'user_id', 'author', 'translator', 'page_count'
    ];

    protected $guarded = [
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];


    public function getPriceAttribute($value)
    {
        return number_format($value). " تومان";
    }



}