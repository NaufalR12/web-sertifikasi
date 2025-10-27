<?php
require_once 'app/models/Book.php';
require_once 'app/models/Category.php';

class BookController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function detail() {
        $bookModel = new Book($this->db);
        $book = $bookModel->getById($_GET['id']);
        require_once 'app/views/book_detail.php';
    }

    public function search() {
        $bookModel = new Book($this->db);
        $books = $bookModel->search($_GET['keyword']);
        $keyword = $_GET['keyword'];
        require_once 'app/views/search.php';
    }
}
?>
