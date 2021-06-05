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

    protected function hasFile($input)
    {
        if (request()->isPost()) {

            if( !empty( $input ) AND ( is_string( $input ) or is_numeric( $input ) ) )
            {
				return isset($_FILES[$input]);
            }
        }

        return false;
    }

    protected function file($input)
    {

		if ( ! $this->hasFile($input) ) { return false; }

		$result = [];
		$extensions = ['jpg', 'jpeg', 'png', 'gif'];
		$destination_directory = DIR_PATH . "/public/images/" ;

		$file_name = time();
		$file_tmp = $_FILES[$input]['tmp_name'];
		$file_type = $_FILES[$input]['type'];
		$file_size = $_FILES[$input]['size'];
		$tmp = explode('.', $_FILES[$input]['name']);
		$file_ext = strtolower(end($tmp));

		$label  = "{$file_name}.{$file_ext}";

		if(! is_dir( $destination_directory ) ){
			$result = [
				'status' =>  false,
				'result' => 'not is dir'
			]; 
		}

		if (!in_array($file_ext, $extensions)) {
			$result = [
				'status' =>  false,
				'result' => 'Extension not allowed'
			]; 
		}

		if ($file_size > 2097152) {
			$result = [
				'status' =>  false,
				'result' => 'File size exceeds limit'
			]; 
		}

		if (! empty($result) ) {  return $result; }

		$status =  call_user_func_array( "move_uploaded_file", array(
				$file_tmp,
				"{$destination_directory}{$label}"
		));

		return $result = [
			'status' =>  $status,
			'result' =>  "images/{$label}"
		]; 


	}
		
}