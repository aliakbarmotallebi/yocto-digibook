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

      if(! request()->isPost()){
        return redirect(route('auth.index'));
      } 

      $rules = [
          'username' => 'required',
          'password' => 'required|min:4',
      ];

      if(! validation(request()->all() , $rules)) {
          return redirect(route('auth.index'));
      }

      $user = new User;
      $user->username = request('username');
      $user->passcode = request('password');
      
      
      if( $user->login() ) {
        flash()->success('با موفقیت وارد حساب کاربری شدید');
        return redirect($this->redirectTo());
      }

      flash()->danger('نام کاربری یا رمز عبور اشتباه می باشد');
      return redirect(route('auth.index'));

    }




    public function register()
    {
      return view('auth/register.html.php');
    }

    public function doRegister()
    {
        if(! request()->isPost()){
          return redirect(route('auth.register'));
        } 

        $rules = [
            'username'       => 'required',
            'password'       => 'required|confirm:reply-password|min:4',
            'reply-password' => 'required|min:4',
        ];

        if(! validation(request()->all() , $rules)) {
            return redirect(route('auth.register'));
        }

        if(User::whereUsername(request('username'))->exists()){
          flash()->danger('نام کاربری وارد شده وجود دارد');
          return redirect(route('auth.register'));
        }

        $user = new User;
        $user->username = request('username');
        $user->password = request('password');
        if($user->save()){
          $user->passcode = request('password');
          if( $user->login() ) {
            flash()->success('با موفقیت وارد حساب کاربری شدید');
            return redirect($this->redirectTo());
          }
        }

        flash()->danger('دوباره تلاش کنید');
        return redirect(route('auth.register'));
    }
}