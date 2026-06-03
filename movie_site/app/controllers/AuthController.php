<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../app/models/User.php";

$userModel = new User($pdo); // User მოდელის ინიციალიზაცია

$action = $_GET['action'] ?? ''; // მოქმედების ტიპის მიღება (register/login/logout)

if ($action === 'register') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // რეგისტრაციის ფორმის დამუშავება

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // მომხმარებლის დამატება ბაზაში
        if ($userModel->register($username, $email, $password)) {
            header("Location: index.php?page=login"); // გადამისამართება login-ზე
            exit;
        }
    }

    // რეგისტრაციის გვერდის ჩატვირთვა
    require_once "app/views/auth/register.php";

} elseif ($action === 'login') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // login ფორმის დამუშავება

        $user = $userModel->login($_POST['email'], $_POST['password']);

        if ($user) {
            // წარმატებული ავტორიზაცია → სესიის შექმნა
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: index.php"); // მთავარ გვერდზე გადამისამართება
            exit;
        } else {
            $error = "არასწორი მეილი ან პაროლი"; // შეცდომის შეტყობინება
        }
    }

    // login გვერდის ჩატვირთვა
    require_once "app/views/auth/login.php";

} elseif ($action === 'logout') {

    // სესიის დასრულება (logout)
    session_destroy();

    header("Location: index.php"); // დაბრუნება მთავარ გვერდზე
    exit;
}
?>