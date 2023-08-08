<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    public function index(): string
    {
        $model = new PostModel();
        $data = $model->findAll();
        $title = "Blog";
        return view('Post/index', compact('title', 'data'));
    }
}
