<?php

require __DIR__ . '/bootstrap/autoload.php';

define( 'DIR_PATH' , dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

use BulveyzRouter\Router;
// Defained routes
require_once __DIR__ . '/app/routes.php';

// Run router
Router::routeVoid();
