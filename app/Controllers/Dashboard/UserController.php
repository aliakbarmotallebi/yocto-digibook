<?php namespace App\Controllers\Dashboard;

use App\Models\User;

class UserController extends DashboardController{
    
    public function __construct()
	{
        parent::__construct();
    }

	public function index()
	{
        $users = User::latest()->paginate(5);
		return view('dashboard/users.html.php', compact('users'));
	}
}