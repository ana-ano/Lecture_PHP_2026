<?php
$base = "D:/xampp/htdocs/Lecture_PHP_2026/movie_site/";
require_once $base . "config/database.php";
require_once $base . "app/models/Movie.php";
require_once $base . "app/models/Comment.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

$movieModel = new Movie($pdo);
$commentModel = new Comment($pdo);

$action = $_GET['action'] ?? 'dashboard';

// კატეგორიები
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ფილმის დამატება
if ($action === 'add_movie') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $movieModel->add(
            $_POST['title'],
            $_POST['description'],
            $_POST['image'],
            $_POST['year'],
            $_POST['category_id'],
            $_POST['watch_link']
        );
        header("Location: index.php?page=admin");
        exit;
    }
    require_once $base . "app/views/admin/add_movie.php";

// ფილმის რედაქტირება
} elseif ($action === 'edit_movie') {
    $movie = $movieModel->getById($_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $movieModel->update(
            $_GET['id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['image'],
            $_POST['year'],
            $_POST['category_id'],
            $_POST['watch_link']
        );
        header("Location: index.php?page=admin");
        exit;
    }
    require_once $base . "app/views/admin/edit_movie.php";

// ფილმის წაშლა
} elseif ($action === 'delete_movie') {
    $movieModel->delete($_GET['id']);
    header("Location: index.php?page=admin");
    exit;

// კომენტარის წაშლა
} elseif ($action === 'delete_comment') {
    $commentModel->delete($_GET['id']);
    header("Location: index.php?page=admin&action=comments");
    exit;

// კომენტარების სია
} elseif ($action === 'comments') {
    $stmt = $pdo->query("SELECT comments.*, users.username, movies.title as movie_title FROM comments JOIN users ON comments.user_id = users.id JOIN movies ON comments.movie_id = movies.id ORDER BY comments.created_at DESC");
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require_once $base . "app/views/admin/comments.php";

// მომხმარებლების სია
} elseif ($action === 'users') {
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require_once $base . "app/views/admin/users.php";

// მთავარი დაშბორდი
} else {
    $movies = $movieModel->getAll();
    require_once $base . "app/views/admin/dashboard.php";
}
?>