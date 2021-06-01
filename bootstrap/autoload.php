<?php ob_start();

// Start a Session
if (!session_id()) @session_start();

require __DIR__ . '/../vendor/autoload.php';


use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv(true);
$dotenv->overload(__DIR__.'/../.env');

use App\Helper\Database;
$database = (new Database);

//$flash = new \Plasticbrain\FlashMessages\FlashMessages();