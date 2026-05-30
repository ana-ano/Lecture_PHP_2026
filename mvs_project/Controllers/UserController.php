<?php

require_once __DIR__ . "/../Models/User.php";

class UserController {

    public function index() {
        $model = new User();
        $users = $model->getAll();

        require __DIR__ . "/../Views/users.php";
    }
}