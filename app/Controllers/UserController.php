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


    function show_groups($id) {
        $user = $this->getUserOr404($id);
        return view('User/groups', compact('user'));
    }


    function update_groups($id) {
        $user = $this->getUserOr404($id);

        $groups = $this->request->getPost('groups') ?? [];

        $user->syncGroups(...$groups);

        // if (!$user->hasChanged()) {
        //     return redirect()
        //     ->to(url_to('admin.users.show', $id))
        //     ->with('info', 'Nothing to update');
        // }

        return redirect()
            ->to(url_to('admin.users.show', $id))
            ->with('success', 'User groups updated successfully'); 

    }


}
