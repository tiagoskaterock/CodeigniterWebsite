<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function index(): string
    {
        return 
            view('includes/header').
            view('Post/index').
            view('includes/footer');
    }
}
