<?php
require_once "config/database.php";
require_once "Controllers/UserController.php";

$controller = new UserController();
$controller->index($pdo);