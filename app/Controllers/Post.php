<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function index(): string
    {
        return view('Post/index');
    }
}
