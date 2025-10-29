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
        $keyword = $_GET['keyword'];
        
        // Cek apakah keyword adalah nama kategori
        $categoryModel = new Category($this->db);
        $categories = $categoryModel->getAll();
        $isCategorySearch = false;
        
        foreach($categories as $cat) {
            if(strtolower($cat['name']) == strtolower($keyword)) {
                $isCategorySearch = true;
                break;
            }
        }
        
        if($isCategorySearch) {
            $books = $bookModel->searchByCategory($keyword);
        } else {
            $books = $bookModel->search($keyword);
        }
        
        require_once 'app/views/search.php';
    }
}
?>
