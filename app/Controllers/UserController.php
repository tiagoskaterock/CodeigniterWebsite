<?php

namespace App\Controllers;

use Codeigniter\Shield\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController {

    private UserModel $model;

    function __construct() {
        $this->model = new UserModel();
    }

    function index(): string {        
        $data = $this->model->findAll();
        $title = "Users";
        return view('User/index', compact('title', 'data'));
    }

    function show($id) {
        $item = $this->getUserOr404($id);
        $title = $item->title;
        return view('User/show', compact('item', 'title'));
    }

    private function getUserOr404($id) : User {
        $user = $this->model->find($id);

        if ($user === null) {
            throw new PageNotFoundException("User with id $id not found");
        }

        return $user;
    }

}
