<?php

use App\Helper\View;


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

		return getenv('DB_CONNECTION') . $DS . $path;
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
