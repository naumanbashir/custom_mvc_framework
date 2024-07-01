<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\core\Application;
use App\Http\Controllers\HomeController;

$rootDir = dirname(__DIR__);
$app = new Application($rootDir);

$app->router->get('/', [HomeController::class, 'index']);

$app->run();


