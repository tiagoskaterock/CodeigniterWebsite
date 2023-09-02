<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Entities\Post;
use CodeIgniter\Exceptions\PageNotFoundException;
use RunTimeException;
use finfo;

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

        $file = $this->request->getFile('image');

        // no file
        if( ! $file->isValid()) {
            $error_code = $file->getError();
            if ($error_code === UPLOAD_ERR_NO_FILE) {
                return redirect()->back()->with('errors', ['No file selected'])->withInput();
            }
            throw new RunTimeException($file->getErrorString());
        }

        // invalid format
        if ( ! in_array($file->getMimeType(), ['image/png', 'image/jpeg', 'image/gif'])) {
            return redirect()->back()->with('errors', ['Invalid Format'])->withInput();
        }

        // file size too big
        if($file->getSizeByUnit('mb') > 1) {
            return redirect()->back()->with('errors', ['File too large. Max 1 MB'])->withInput();
        }

        $path = $file->store('posts');

        $path = WRITEPATH . "uploads/" . $path;

        service('image')->withFile($path)->fit(200, 200, 'center')->save($path);

        $item->image = $file->getName();

        $id = $this->model->insert($item);

        if ($id == false) {
            return redirect()->back()->with('errors', $this->model->errors())->withInput();
        }

        return redirect()
            ->to('admin/posts/' . $id)
            ->with('success', 'Post saved successfully');
    }


    function getImage($post_id) {
        $post = $this->getArticleOr404($post_id);
        if ($post->image) {
            $path = WRITEPATH . "uploads/posts/" . $post->image;

            $fino = new finfo(FILEINFO_MIME);

            $type = $finfo->file($path);

            header("Content-Type: $type");
            header("Content-length: " . filesize($path));

            readfile($path);
            exit;
        }
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
