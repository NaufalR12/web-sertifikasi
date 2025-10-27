<?php
require_once 'app/models/Book.php';
require_once 'app/models/Category.php';

class HomeController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        $bookModel = new Book($this->db);
        $categoryModel = new Category($this->db);
        
        $books = $bookModel->getAll();
        $categories = $categoryModel->getAll();
        
        require_once 'app/views/home.php';
    }

    public function about() {
        require_once 'app/views/about.php';
    }
}
?>
