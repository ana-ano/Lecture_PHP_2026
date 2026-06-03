<?php
class Favorite {
    private $pdo; // PDO კავშირი მონაცემთა ბაზასთან

    public function __construct($pdo) {
        // კლასში PDO ობიექტის შენახვა
        $this->pdo = $pdo;
    }

    public function isFavorite($user_id, $movie_id) {
        // ამოწმებს არის თუ არა ფილმი მომხმარებლის ფავორიტებში
        $stmt = $this->pdo->prepare("
            SELECT id 
            FROM favorites 
            WHERE user_id = ? AND movie_id = ?
        ");
        $stmt->execute([$user_id, $movie_id]); // პარამეტრების გადაცემა
        return $stmt->fetch() ? true : false; // თუ მოიძებნა ჩანაწერი → true
    }

    public function add($user_id, $movie_id) {
        // ფილმის დამატება ფავორიტებში
        $stmt = $this->pdo->prepare("
            INSERT INTO favorites (user_id, movie_id) 
            VALUES (?, ?)
        ");
        return $stmt->execute([$user_id, $movie_id]); // შესრულება
    }

    public function remove($user_id, $movie_id) {
        // ფილმის ამოღება ფავორიტებიდან
        $stmt = $this->pdo->prepare("
            DELETE FROM favorites 
            WHERE user_id = ? AND movie_id = ?
        ");
        return $stmt->execute([$user_id, $movie_id]); // შესრულება
    }

    public function getByUser($user_id) {
        // მომხმარებლის ყველა ფავორიტი ფილმის მიღება
        $stmt = $this->pdo->prepare("
            SELECT movies.* 
            FROM favorites 
            JOIN movies ON favorites.movie_id = movies.id 
            WHERE favorites.user_id = ?
        ");
        $stmt->execute([$user_id]); // user_id გადაცემა
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // შედეგის დაბრუნება მასივად
    }
}
?>