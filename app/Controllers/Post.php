<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function index(): string
    {
        $title = "Blog";
        return 
            view('includes/header', compact('title')).
            view('Post/index').
            view('includes/footer');
    }
}
