<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $result = mysqli_query($this->conn, "SELECT * FROM users");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}