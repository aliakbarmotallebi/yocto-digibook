<?php namespace App\Helper;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

    function __construct() {
		$capsule = new Capsule;

		$capsule->addConnection([
			'driver'    => getenv('DB_CONNECTION'),
			'host'      => getenv('DB_HOST'),
			'database'  => getenv('DB_DATABASE'),
			'username'  => getenv('DB_USERNAME'),
			'password'  => getenv('DB_PASSWORD'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		]);
		// Setup the Eloquent ORM… 
		$capsule->bootEloquent();
	}

}

