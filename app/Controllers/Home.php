<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return 
            view('includes/header').
            view('Home/index').
            view('includes/footer');
    }
}
