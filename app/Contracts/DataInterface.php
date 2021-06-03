<?php

namespace App\Contracts;


interface DataInterface
{
    /**
     * @param $key
     * @return mixed
     */
    public function exists($key);

    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param $key
     * @return mixed
     */
    public function forget($key);
}