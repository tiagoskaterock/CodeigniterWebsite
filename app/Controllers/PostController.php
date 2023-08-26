<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Entities\Post;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostController extends BaseController {

    private PostModel $model;

    function __construct() {
        $this->model = new PostModel();
    }


    function index(): string {           
        $data = $this->model
            ->select('posts.*, users.firstname')
            ->join('users', 'users.id = posts.users_id')
            ->where('users_id', auth()->user()->id)
            ->findAll();        

        $title = "Blog";
        return view('Post/index', compact('title', 'data'));
    }


    function show($id) {
        $item = $this->getArticleOr404($id);
        if (!$item->isOwner()) {
            return redirect()
                ->to('admin/posts')
                ->with('danger', "Unauthorized");            
        }
        $title = $item->title;
        return view('Post/show', compact('item', 'title'));
    }


    function create() {
        $item = new Post();          
        $title = 'Add New Post';
        return view('Post/create', compact('title', 'item'));
    }


    function store() {        
        $item = new Post($this->request->getPost());
        $id = $this->model->insert($item);

        if ($id == false) {
            return 
                redirect()
                ->back()
                ->with('errors', $this->model->errors())
                ->withInput();
        }

        return redirect()
            ->to('admin/posts/' . $id)
            ->with('success', 'Post saved successfully');
    }


    function edit($id) {
        $item = $this->getArticleOr404($id);

        if (!$item->isOwner()) {
            return redirect()
                ->to('admin/posts')
                ->with('danger', "Unauthorized");            
        }

        $title = $item->title;
        return view('Post/edit', compact('item', 'title'));
    }


    function update($id) {
        $post = $this->getArticleOr404($id);
        $post = $this->model->find($id);
        $post->fill($this->request->getPost());
        $post->__unset('_method');

        if (!$post->hasChanged()) {
            return redirect()
            ->to('admin/posts/' . $id)
            ->with('info', 'Nothing to update');
        }

        if ($this->model->save($post)) {
            return redirect()
                ->to('admin/posts/' . $id)
                ->with('success', 'Post updated successfully');            
        };

        return 
            redirect()
            ->back()
            ->with('errors', $this->model->errors())
            ->withInput();
    }


    function delete($id) {
        $item = $this->getArticleOr404($id);

        if (!$this->request->is('delete')) {
            return redirect()
                ->to('admin/posts/' . $id)
                ->with('danger', 'Forbidden'); 
        }

        if ($this->model->delete($id)) {
            return redirect()
                ->to('admin/posts')
                ->with('warning', "Post $id delete successfully");            
        };        
    }


    private function getArticleOr404($id) : Post {
        $item = $this->model->find($id);

        if ($item === null) {
            throw new PageNotFoundException("Post with id $id not found");
        }

        return $item;
    }

}
