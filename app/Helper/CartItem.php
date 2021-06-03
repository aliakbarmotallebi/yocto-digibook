<?php namespace App\Helper;

class CartItem
{

    protected $rowId;
    protected $id;
    protected $name;
    protected $price;

    public function __construct($id, $name, $qty = 1 , $price)
    {
        if(empty($id)) {
            throw new \InvalidArgumentException('Please supply a valid identifier.');
        }
        if(empty($name)) {
            throw new \InvalidArgumentException('Please supply a valid name.');
        }
        if(strlen($price) < 0 || ! is_numeric($price)) {
            throw new \InvalidArgumentException('Please supply a valid price.');
        }

        $this->id       = $id;
        $this->name     = $name;
        $this->qty      = $qty;
        $this->price    = (int)($price);
        $this->rowId = $this->generateRowId($id);
    }

    protected function generateRowId($id)
    {
        return md5($id . serialize($this->name));
    }
    
    public function getid()
    {
       return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getRowId()
    {
        return $this->rowId;
    }

    public function toArray()
    {
        return [
            '__rowID'    => $this->getRowId(),
            'id'         => $this->getid(),
            'name'       => $this->getName(),
            'qty'        => $this->getQty(),
            'price'      => $this->getPrice(),
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

}