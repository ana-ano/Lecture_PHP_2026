<?php
require_once __DIR__ . "/../Models/User.php";

class UserController {
    public function index($pdo) {
        $model = new User($pdo);
        $users = $model->getAll();
        require __DIR__ . "/../Views/users.php";
    }
}