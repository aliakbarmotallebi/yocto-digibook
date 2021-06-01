<?php namespace App\Contracts;


interface RequestInterface
{
    /**
     * @param $filed
     * @param bool $post
     * @return mixed
     */
    public function input($filed , $post = true);

    /**
     * @param bool $post
     * @return mixed
     */
    public function all($post = true);

    /**
     * @return mixed
     */
    public function isPost();
}