<?php require __DIR__ . '/bootstrap/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', getenv('APP_DEBUG'));

define( 'DIR_PATH' , dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

use BulveyzRouter\Router;
// Defained routes
require_once __DIR__ . '/app/routes.php';

// Run router
Router::routeVoid();
