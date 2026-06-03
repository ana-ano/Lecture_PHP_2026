<?php
class User {
    private $pdo; // PDO კავშირი მონაცემთა ბაზასთან

    public function __construct($pdo) {
        // PDO ობიექტის შენახვა კლასში
        $this->pdo = $pdo;
    }

    public function register($username, $email, $password) {
        // ახალი მომხმარებლის რეგისტრაცია

        $hash = password_hash($password, PASSWORD_DEFAULT); 
        // პაროლის უსაფრთხოდ დაშიფვრა

        $stmt = $this->pdo->prepare("
            INSERT INTO users (username, email, password) 
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([$username, $email, $hash]); // შესრულება
    }

    public function login($email, $password) {
        // მომხმარებლის ავტორიზაცია (login)

        $stmt = $this->pdo->prepare("
            SELECT * FROM users WHERE email = ?
        ");
        $stmt->execute([$email]); // email-ის გადაცემა
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // თუ მომხმარებელი არსებობს და პაროლი სწორია
        if ($user && password_verify($password, $user['password'])) {
            return $user; // წარმატებული login
        }

        return false; // შეცდომა
    }
}
?>