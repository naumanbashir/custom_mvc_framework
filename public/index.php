<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\core\Application;

$rootDir = dirname(__DIR__);
$app = new Application($rootDir);

$app->router->get('/', 'welcome');

$app->run();


