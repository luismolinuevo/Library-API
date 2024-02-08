<?php

class BooksController {
    private $bookModel;

    public function __construct() {
        require_once 'BookModel.php';
        $this->bookModel = new BookModel();
    }

    public function getAllBooks() {
        try {
            $books = $this->bookModel->getAllBooks();
            http_response_code(200);
            echo json_encode(["success" => true, "data" => $books]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["success" => false, "error" => "Failed to fetch books: " . $e->getMessage()]);
        }
    }
}