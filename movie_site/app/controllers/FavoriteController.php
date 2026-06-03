<?php
$base = "D:/xampp/htdocs/Lecture_PHP_2026/movie_site/";

// მონაცემთა ბაზის და მოდელის ჩატვირთვა
require_once $base . "config/database.php";
require_once $base . "app/models/Favorite.php";

// თუ მომხმარებელი არ არის შესული → login გვერდზე გადამისამართება
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}

// Favorite მოდელის ინიციალიზაცია
$favoriteModel = new Favorite($pdo);

// მიმდინარე მომხმარებლის ფავორიტი ფილმების მიღება
$movies = $favoriteModel->getByUser($_SESSION['user_id']);

// favorites view-ის ჩატვირთვა
require_once $base . "app/views/favorites.php";
?>