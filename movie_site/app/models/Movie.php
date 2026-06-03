<?php
class Movie {
    private $pdo; // PDO კავშირი მონაცემთა ბაზასთან

    public function __construct($pdo) {
        // კონსტრუქტორი ინახავს PDO ობიექტს
        $this->pdo = $pdo;
    }

    public function getAll($category_id = 0) {
        // ყველა ფილმის წამოღება (ან კატეგორიით ფილტრაცია)

        if ($category_id > 0) {
            // კონკრეტული კატეგორიის ფილმები
            $stmt = $this->pdo->prepare("
                SELECT movies.*, categories.name as category_name 
                FROM movies 
                LEFT JOIN categories ON movies.category_id = categories.id
                WHERE movies.category_id = ?
            ");
            $stmt->execute([$category_id]);
        } else {
            // ყველა ფილმი კატეგორიასთან ერთად
            $stmt = $this->pdo->query("
                SELECT movies.*, categories.name as category_name 
                FROM movies 
                LEFT JOIN categories ON movies.category_id = categories.id
            ");
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // შედეგების დაბრუნება
    }

    public function getById($id) {
        // კონკრეტული ფილმის მიღება ID-ით
        $stmt = $this->pdo->prepare("
            SELECT movies.*, categories.name as category_name 
            FROM movies 
            LEFT JOIN categories ON movies.category_id = categories.id 
            WHERE movies.id = ?
        ");
        $stmt->execute([$id]); // id-ის გადაცემა
        return $stmt->fetch(PDO::FETCH_ASSOC); // ერთი ჩანაწერი
    }

    public function search($keyword) {
        // ფილმების ძიება სათაურით ან კატეგორიით
        $stmt = $this->pdo->prepare("
            SELECT movies.*, categories.name as category_name 
            FROM movies 
            LEFT JOIN categories ON movies.category_id = categories.id 
            WHERE movies.title LIKE ? 
               OR categories.name LIKE ?
        ");
        $stmt->execute(["%$keyword%", "%$keyword%"]); // LIKE ძიება
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // შედეგები
    }

    public function add($title, $description, $image, $year, $category_id, $watch_link) {
        // ახალი ფილმის დამატება
        $stmt = $this->pdo->prepare("
            INSERT INTO movies (title, description, image, year, category_id, watch_link) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$title, $description, $image, $year, $category_id, $watch_link]);
    }

    public function update($id, $title, $description, $image, $year, $category_id, $watch_link) {
        // ფილმის განახლება ID-ის მიხედვით
        $stmt = $this->pdo->prepare("
            UPDATE movies 
            SET title=?, description=?, image=?, year=?, category_id=?, watch_link=? 
            WHERE id=?
        ");
        return $stmt->execute([$title, $description, $image, $year, $category_id, $watch_link, $id]);
    }

    public function delete($id) {
        // ფილმის წაშლა ID-ის მიხედვით
        $stmt = $this->pdo->prepare("DELETE FROM movies WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>