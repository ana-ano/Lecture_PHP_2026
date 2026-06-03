<?php
$base = "D:/xampp/htdocs/Lecture_PHP_2026/movie_site/";

// საჭირო ფაილების ჩატვირთვა
require_once $base . "config/database.php";
require_once $base . "app/models/Movie.php";
require_once $base . "app/models/Comment.php";
require_once $base . "app/models/Rating.php";
require_once $base . "app/models/Favorite.php";

// მოდელების ინიციალიზაცია
$movieModel = new Movie($pdo);
$commentModel = new Comment($pdo);
$ratingModel = new Rating($pdo);
$favoriteModel = new Favorite($pdo);

// კატეგორიების მიღება (ყველა გვერდისთვის ხელმისაწვდომია)
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// არჩეული კატეგორიის ID
$category_id = isset($_GET['category']) ? (int)$_GET['category'] : 0;

// მოქმედების ტიპი (list, show, comment, rate, favorite, search)
$action = $_GET['action'] ?? 'list';

if ($action === 'show') {

    // კონკრეტული ფილმის სრული ინფორმაციის ჩატვირთვა
    $movie = $movieModel->getById($_GET['id']);
    $comments = $commentModel->getByMovie($_GET['id']);
    $avgRating = $ratingModel->getAverage($_GET['id']);

    // თუ მომხმარებელი შესულია → მისი რეიტინგი
    $userRating = isset($_SESSION['user_id'])
        ? $ratingModel->getUserRating($_SESSION['user_id'], $_GET['id'])
        : 0;

    // თუ ფილმი ფავორიტებშია
    $isFavorite = isset($_SESSION['user_id'])
        ? $favoriteModel->isFavorite($_SESSION['user_id'], $_GET['id'])
        : false;

    // show გვერდის ჩატვირთვა
    require_once $base . "app/views/movies/show.php";

} elseif ($action === 'comment') {

    // კომენტარის დამატება
    if (isset($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $commentModel->add(
            $_SESSION['user_id'],
            $_POST['movie_id'],
            $_POST['comment']
        );
    }

    // დაბრუნება ფილმის გვერდზე
    header("Location: index.php?page=movie&id=" . $_POST['movie_id']);
    exit;

} elseif ($action === 'rate') {

    // რეიტინგის დამატება/განახლება
    if (isset($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $ratingModel->addOrUpdate(
            $_SESSION['user_id'],
            $_POST['movie_id'],
            $_POST['rating']
        );
    }

    header("Location: index.php?page=movie&id=" . $_POST['movie_id']);
    exit;

} elseif ($action === 'favorite') {

    // ფავორიტებში დამატება/წაშლა (toggle)
    if (isset($_SESSION['user_id'])) {
        $movie_id = $_GET['movie_id'];

        if ($favoriteModel->isFavorite($_SESSION['user_id'], $movie_id)) {
            $favoriteModel->remove($_SESSION['user_id'], $movie_id);
        } else {
            $favoriteModel->add($_SESSION['user_id'], $movie_id);
        }
    }

    header("Location: index.php?page=movie&id=" . $_GET['movie_id']);
    exit;

} elseif ($action === 'search') {

    // ძიება ფილმებში
    $keyword = $_GET['keyword'] ?? '';

    // თუ keyword ცარიელია მაგრამ კატეგორია არჩეულია
    if (empty($keyword) && $category_id > 0) {
        $movies = $movieModel->getAll($category_id);
    } else {
        $movies = $movieModel->search($keyword);
    }

    require_once $base . "app/views/movies/index.php";

} else {

    // default: ყველა ფილმის ჩვენება
    $movies = $movieModel->getAll($category_id);
    require_once $base . "app/views/movies/index.php";
}
?>