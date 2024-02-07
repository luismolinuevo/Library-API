<?php

class Book {
    private $conn;
    private $table = 'books';

    public function __construct($db) {
        $this->conn = $db;
    }

    
}