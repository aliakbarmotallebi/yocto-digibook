<?php namespace App\Helper;


use App\Contracts\DataInterface;

class Cookie implements DataInterface
{

    /**
     * @param $key
     * @return mixed
     */
    public function exists($key)
    {
        return array_key_exists($key , $_COOKIE);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->exists($key) ? $_COOKIE[$key] : false ;
    }

    /**
     * @param $key
     * @param $value
     * @param string $time
     * @return mixed
     */
    public function set($key, $value , $time = '+30 day')
    {
        setcookie($key , $value , strtotime($time));
    }

    /**
     * @param $key
     * @return mixed
     */
    public function forget($key)
    {
        setcookie($key , '' , strtotime('-5 day'), '/');
    }
}