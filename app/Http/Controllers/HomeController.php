<?php

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Custom MVC Framework';

        $this->render('home', compact('title'));
    }
}