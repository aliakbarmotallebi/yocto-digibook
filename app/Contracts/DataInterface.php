<?php
/**
 * Created by PhpStorm.
 * User: roocket
 * Date: 4/13/2017
 * Time: 2:17 PM
 */

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