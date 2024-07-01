<?php

namespace App\core\Controller;

use App\core\Application;

abstract class BaseController
{
    protected function render(string $view, array $data = []) {
        Application::$app->router->renderView($view, $data);
    }
}