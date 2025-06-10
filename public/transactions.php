<?php

declare(strict_types = 1);

use App\App;
use App\Config;
use App\Controllers\HomeController;
use App\Router;
use App\View;

$root = dirname(__DIR__);

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', $root . DIRECTORY_SEPARATOR . 'storage');
define('VIEW_PATH', $root . DIRECTORY_SEPARATOR . 'views');

$router = new router();

$router
    ->post( '/learnphptherightway-project/public/transactions/upload/', [HomeController::class, 'upload']);

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();

print_r($_FILES);
print_r($receipt);