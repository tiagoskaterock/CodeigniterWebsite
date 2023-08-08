<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function index(): string
    {
        $title = "Blog";
        return view('Post/index', compact('title'));
    }
}
