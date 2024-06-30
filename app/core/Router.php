<?php

namespace App\core;

class Router
{
    protected array $routes = [];

    public function __construct()
    {
    }

    public function get($path, $callback)
    {
        var_dump($path, $callback);
    }
}