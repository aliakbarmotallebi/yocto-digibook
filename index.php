<?php

require __DIR__ . '/bootstrap/autoload.php';


use BulveyzRouter\Router;
// Defained routes
require_once __DIR__ . '/app/routes.php';

// Run router
Router::routeVoid();
