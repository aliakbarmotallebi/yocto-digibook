<?php namespace App\Controllers\Auth;

use App\Models\User;

class LoginController {
  
    public function __construct()
    {
        if(auth()->check())
            return redirect($this->redirectTo());
    }

    protected function redirectTo()
    {
        return route('main.index');
    }

	public function index()
	{
		return view('auth/login.html.php');
    }
    
    public function login()
    {
      $rules = [
          'username' => 'required',
          'password' => 'required|min:4',
      ];

      if(! validation(request()->all() , $rules)) {
          return redirect(route('auth.index'));
      }

      $user = new User;
      $user->username = request('username');
      $user->password = request('password');

      
      if( $user->login() ) {
        flash()->success(':)');
        return redirect($this->redirectTo());
      }

      flash()->danger(':/');
      return redirect(route('auth.index'));

    }

}