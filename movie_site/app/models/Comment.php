<?php
class Comment {
    private $pdo; // PDO კავშირის ობიექტი მონაცემთა ბაზასთან

    public function __construct($pdo) {
        // კონსტრუქტორი ინახავს PDO-ს კლასში
        $this->pdo = $pdo;
    }

    public function getByMovie($movie_id) {
        // კონკრეტული ფილმის კომენტარების წამოღება მომხმარებლის სახელთან ერთად
        $stmt = $this->pdo->prepare("
            SELECT comments.*, users.username 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.movie_id = ? 
            ORDER BY comments.created_at DESC
        ");
        $stmt->execute([$movie_id]); // movie_id-ის გადაცემა მოთხოვნაში
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // შედეგის დაბრუნება მასივად
    }

    public function add($user_id, $movie_id, $comment) {
        // ახალი კომენტარის დამატება ბაზაში
        $stmt = $this->pdo->prepare("
            INSERT INTO comments (user_id, movie_id, comment) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$user_id, $movie_id, $comment]); // შესრულება და შედეგის დაბრუნება
    }

    public function delete($id) {
        // კომენტარის წაშლა ID-ის მიხედვით
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id=?");
        return $stmt->execute([$id]); // წაშლის ოპერაცია
    }
}
?>