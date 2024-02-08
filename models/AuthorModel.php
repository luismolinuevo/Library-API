<?php

class Book {
    private $conn;
    private $table = 'author';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllAuthors() {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            // Check if any rows were returned
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // No rows found
                return [];
            }
        } catch (PDOException $e) {
            return ["error" => "Database error: " . $e->getMessage()];
        }
        
    }
}