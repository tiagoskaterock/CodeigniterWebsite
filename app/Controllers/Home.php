<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $title = "Home";
        return view('Home/index', compact('title'));
    }
}
