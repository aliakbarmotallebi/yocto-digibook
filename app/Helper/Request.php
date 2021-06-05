<?php namespace App\Helper;


use App\Contracts\RequestInterface;

class Request implements RequestInterface
{

    /**
     * @param $filed
     * @param bool $post
     * @return mixed
     */
    public function input($filed, $post = true)
    {
        if ($this->isPost() && $post)
            return isset($_POST[$filed]) ? $_POST[$filed] : "";

        return isset($_GET[$filed]) ? htmlspecialchars($_GET[$filed]) : "";
    }

    /**
     * @param bool $post
     * @return mixed
     */
    public function all($post = true)
    {
        if ($this->isPost() && $post)
            return isset($_POST) ? $_POST : null;

        return isset($_GET) ?array_map('htmlspecialchars' , $_GET) : null;
    }

    /**
     * @return mixed
     */
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

}