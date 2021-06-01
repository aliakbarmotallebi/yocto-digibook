<?php namespace App\Helper;


use App\Contracts\DataInterface;

class Session implements DataInterface
{

    /**
     * @param $key
     * @return mixed
     */
    public function exists($key)
    {
        return array_key_exists($key , $_SESSION);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->exists($key) ? $_SESSION[$key] : false;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function forget($key)
    {
        unset($_SESSION[$key]);
    }
}