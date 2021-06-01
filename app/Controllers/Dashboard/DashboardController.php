<?php namespace App\Controllers\Dashboard;

use App\Models\User;

class DashboardController {
	
	public function index()
	{
		$users = User::first();
		return view('dashboard/index.html.php', [
			'users' => $users
		]);
	}

	public function store($param){
		var_dump( $param);
	}
}