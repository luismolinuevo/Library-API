<?php

class AuthorController {
    private $authorModel;

    public function __construct() {
        require_once 'AuthorModel.php';
        $this->authorModel = new AuthorModel();
    }

    public function getAllBooks() {
        try {
            $authors = $this->authorModel->getAllAuthors();
            http_response_code(200);
            echo json_encode(["success" => true, "data" => $authors]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["success" => false, "error" => "Failed to fetch authors: " . $e->getMessage()]);
        }
    }
}