<?php namespace App\Controllers\Dashboard;

use App\Models\User;

class DashboardController {

	protected $user;

	public function __construct()
	{
		if(! auth()->check() ){
            return redirect(route('auth.index'));
		}
		
		$this->user = auth()->user();

		if(! $this->user->isAdmin()){
			return redirect(route('main.index'));
		}
	}
	
	public function index()
	{
		return view('dashboard/index.html.php');
	}
}