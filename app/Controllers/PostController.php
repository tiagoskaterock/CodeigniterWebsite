<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController {

    function index(): string {        
        $model = new PostModel();
        $data = $model->findAll();
        $title = "Blog";
        return view('Post/index', compact('title', 'data'));
    }

    function show($id) {
        $model = new PostModel();
        $item = $model->find($id);
        $title = $item['title'];
        return view('Post/show', compact('item', 'title'));
    }

    function create() {
        $item = new PostModel();        
        $title = 'Add New Post';
        return view('Post/create', compact('item', 'title'));
    }

    function store() {
        $model = new PostModel();
        $model->insert($this->request->getPost());
    }

    function edit($id) {
        $model = new PostModel();
        $item = $model->find($id);
        $title = $item['title'];
        return view('Post/edit', compact('item', 'title'));
    }
}
