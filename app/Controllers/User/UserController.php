<?php namespace App\Controllers\User;

use App\Models\User;

class UserController {
    
    protected $user;

	public function __construct()
    {
        // User::create([
        //     'username' => 'ali',
        //     'password' => '123456'
        // ]);

        if( ! auth()->check() ){
            return redirect(route('auth.index'));
        }

        $this->user = auth()->user();
    }
}