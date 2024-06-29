<?php

namespace App\core;

class Application
{
    public function __construct(
        public Router $router
    )
    {
    }
}