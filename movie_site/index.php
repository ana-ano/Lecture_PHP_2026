<?php
session_start();

$base = __DIR__ . "/";
$page = $_GET['page'] ?? 'home';

if ($page === 'login' || $page === 'register' || $page === 'logout') {
    $_GET['action'] = $page;
    require_once $base . "app/controllers/AuthController.php";

} elseif ($page === 'movie') {
    $_GET['action'] = 'show';
    require_once $base . "app/controllers/MovieController.php";

} elseif ($page === 'movies') {
    require_once $base . "app/controllers/MovieController.php";

} elseif ($page === 'favorites') {
    require_once $base . "app/controllers/FavoriteController.php";

} elseif ($page === 'admin') {
    require_once $base . "app/controllers/AdminController.php";

} else {
    require_once $base . "app/controllers/MovieController.php";
}
?>
