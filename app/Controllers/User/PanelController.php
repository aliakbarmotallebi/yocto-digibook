<?php namespace App\Controllers\User;

class PanelController extends UserController {
    
    public function __construct()
    {
        parent::__construct();
    }

	public function orders()
	{
		return view('user/index.html.php');
    }
    
    public function profile()
	{
        $user = $this->user;

		return view('user/profile.html.php', compact('user'));
    }
    
    public function editProfile()
	{
        
        if(! request()->isPost()){
            return false;
        } 
        
        $rules = [
            'mobile'      => 'min:10',
            'postal_code' => 'min:10'
        ];
        
        if(! validation(request()->all() , $rules)) {
            return redirect(route('user.profile'));
        }
        
        $user = $this->user->update(request()->all());

        ($user) ? 
            flash()->success('با موفقیت ویرایش شد') : 
            flash()->danger('لطفا مجددا تلاش کنید');
        
        return redirect(route('user.profile'));

	}
}