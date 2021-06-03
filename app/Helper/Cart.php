<?php namespace App\Helper;


use App\Helper\Session;
use App\Helper\CartItem;

class Cart  {

    const DEFAULT_INSTANCE = 'books';


    private $session;


    private $instance;


    public function __construct()
    {
        $this->session = session();
        
        $this->instance(self::DEFAULT_INSTANCE);
    
    }


    public function instance($instance = null)
    {
        $instance = $instance ?: self::DEFAULT_INSTANCE;

        $this->instance = sprintf('%s.%s', 'cart', $instance);

        return $this;
    }

    public function all()
    {
        return collect($this->getContent());
        
    }

    public function add($id, $name, $qty = 1 , $price)
    {
        return $this->createCartItem($id, $name, $qty, $price);
    }

    public function remove($rowId)
    {
        $content = $this->getContent();
        if (isset($content[$rowId])) {
            unset($content[$rowId]);
            $this->session->set($this->instance, $content);
            return true;
        }
        
        return false;
    }

    public function count()
    {
        $content = $this->getContent();
        return count($content);
        
    }

    public function get($rowId)
    {
        $content = $this->getContent();
        
        if (isset($content[$rowId])) {
            return $content[$rowId];
        }
        return false;
        
    }



    public function total()
    {
        $content = $this->getContent();
        
        $sum =  array_map(function ($cartItem) {
            return $cartItem->price * $cartItem->qty;
        }, $content );

        return array_sum($sum);
    }



    private function createCartItem($id, $name, $qty, $price)
    {
        
        $cartItem = new CartItem($id, $name, $qty, $price);
        
        $content = $this->getContent();

        if (isset($content[$cartItem->getRowId()])) {

            $content[$cartItem->getRowId()]->qty += 1;

        }else{
            $content[$cartItem->getRowId()] = (object)$cartItem->toArray();
        }

        $this->session->set($this->instance, $content);

        return true;
    }

    public function destroy()
    {
        $this->session->forget($this->instance);

    }

    public function getContent()
    {

        $content = $this->session->exists($this->instance)
            ? $this->session->get($this->instance)
            : [];

        return $content;
    }


}