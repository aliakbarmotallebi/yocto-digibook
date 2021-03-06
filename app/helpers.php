<?php

use App\Helper\View;
use App\Models\User;
use Illuminate\Support\Collection;

if (! function_exists('view')) {

    function view($template, array $data = [] ) {

        return (new View)->render(resource_path() . $template, $data);
    }
}


if (! function_exists('session')) {

    function session($key = null) {
        $session = new \App\Helper\Session();
        if(is_null($key))
            return $session;
    
        return $session->get($key);
    }
}

if (! function_exists('old')) {
    function old($field) {
        return request($field);
    }
}

if (! function_exists('request')) {

    function request($field = null) {

        $request = new \App\Helper\Request();

        if(is_null($field))
            return $request;
    
        return $request->input($field);
    }
}

if (! function_exists('flash')) {
    function flash() {
        return \App\Helper\FlashMessage::instance();
      }
}


if ( ! function_exists('asset'))
{
	function asset($path)
	{
        $DS  = DIRECTORY_SEPARATOR;

		return getenv('APP_URL') . $DS . "public" . $DS . $path;
	}
}

if (! function_exists('resource_path')) {
 
    function resource_path()
    {
        $DS  = DIRECTORY_SEPARATOR;

        return __DIR__ . $DS .'..'. $DS . "templates" . $DS;
    }
}


if (! function_exists('validation')) {

    function validation($data , $rules)
    {
       $validation = new \App\Helper\Validation();
    
       $valid = $validation->make($data , $rules);
    
       if(! $valid) {
           foreach ($validation->getErrors() as $error) {
                flash()->danger($error[0]);
           }
           return false;
       }
    
       return true;
    }
}

if (! function_exists('auth')) {
    
    function auth() {
        return new User;
    }
}

if (! function_exists('redirect')) {

    function redirect($param = null) {
        header('location:'. url( $param ) );
        exit();
    }
}


if (! function_exists('url')) {

    function url($path = null)
    {
        return getenv('APP_URL', 'http://localhost/') . $path ;
    }
}

if (! function_exists('collect')) {

    function collect($data = [])
    {
        return new Collection($data);
    }
}


if (! function_exists('old')) {

    function old($field) {
        return request($field);
    }
}