<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Custom MVC Framework';

        $this->render('welcome', compact('title'));
    }
}