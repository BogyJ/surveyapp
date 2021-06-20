<?php
    namespace App\Controllers;

    class UserController extends \App\Core\Role\UserRoleController {
        public function index() {
            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());
            $user = $userModel->getUserById($_SESSION["userId"]);

            $this->set('user', $user);
        }
    }
