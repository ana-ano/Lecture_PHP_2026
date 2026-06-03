<?php
class Rating {
    private $pdo; // PDO კავშირი მონაცემთა ბაზასთან

    public function __construct($pdo) {
        // კონსტრუქტორი ინახავს PDO ობიექტს
        $this->pdo = $pdo;
    }

    public function getAverage($movie_id) {
        // ფილმის საშუალო რეიტინგის გამოთვლა
        $stmt = $this->pdo->prepare("
            SELECT ROUND(AVG(rating), 1) as avg_rating 
            FROM ratings 
            WHERE movie_id = ?
        ");
        $stmt->execute([$movie_id]); // movie_id-ის გადაცემა
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['avg_rating'] ?? 0; // თუ არ არსებობს → 0
    }

    public function getUserRating($user_id, $movie_id) {
        // კონკრეტული მომხმარებლის რეიტინგის მიღება ფილმისთვის
        $stmt = $this->pdo->prepare("
            SELECT rating 
            FROM ratings 
            WHERE user_id = ? AND movie_id = ?
        ");
        $stmt->execute([$user_id, $movie_id]); // პარამეტრები
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['rating'] ?? 0; // თუ არ აქვს შეფასება → 0
    }

    public function addOrUpdate($user_id, $movie_id, $rating) {
        // რეიტინგის დამატება ან განახლება

        $existing = $this->getUserRating($user_id, $movie_id);

        if ($existing) {
            // თუ უკვე არსებობს → განახლება
            $stmt = $this->pdo->prepare("
                UPDATE ratings 
                SET rating = ? 
                WHERE user_id = ? AND movie_id = ?
            ");
            return $stmt->execute([$rating, $user_id, $movie_id]);
        } else {
            // თუ არ არსებობს → ახალი ჩანაწერი
            $stmt = $this->pdo->prepare("
                INSERT INTO ratings (user_id, movie_id, rating) 
                VALUES (?, ?, ?)
            ");
            return $stmt->execute([$user_id, $movie_id, $rating]);
        }
    }
}
?>