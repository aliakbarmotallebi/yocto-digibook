<?php namespace App\Facades;

use App\Helper\Cart as Instance;

class Cart {

    public static function __callStatic($method, $params)
    {
        $instance = Instance::class;
        $class    = new $instance;
        return $class->$method(...array_values($params));
    }
    
}