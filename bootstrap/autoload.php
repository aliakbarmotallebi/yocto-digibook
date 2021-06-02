<?php ob_start();

// Start a Session
if (!session_id()) @session_start();

require __DIR__ . '/../vendor/autoload.php';


use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv(true);
$dotenv->overload(__DIR__.'/../.env');

use App\Helper\Database;
$database = (new Database);


\Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
    $page =  request()->input($pageName);
    
    if (filter_var($page, FILTER_VALIDATE_INT) !== false && (int) $page >= 1) {
        return (int) $page;
    }

    return 1;
});

\Illuminate\Pagination\Paginator::$defaultView = "main/commons/pagination.html.php";

\Illuminate\Pagination\Paginator::viewFactoryResolver(function () {
    return new App\Helper\PaginatorView();
});

//$flash = new \Plasticbrain\FlashMessages\FlashMessages();