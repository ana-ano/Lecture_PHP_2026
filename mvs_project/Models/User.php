<?php

class User {

    private $users = [
        ["id" => 1, "name" => "გიორგი"],
        ["id" => 2, "name" => "ნინო"],
        ["id" => 3, "name" => "დავით"],
    ];

    public function getAll() {
        return $this->users;
    }
}