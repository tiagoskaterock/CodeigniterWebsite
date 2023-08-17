<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use App\Models\UserModel;

class AddAdminAccount extends Seeder
{
    public function run()
    {
        $user = new User([
            'email' => 'administrator@email.com',
            'password' => '12345678',
            'firstname' => 'Administrator',
        ]);

        $model = new UserModel();

        $model->save($user);

        $user = $model->findById($model->getInsertID());

        $user->activate();

        $user->addGroup('user', 'admin');
    }
}
