<?php
require_once 'app/models/Category.php';
require_once 'app/models/Book.php';
require_once 'app/models/User.php';
require_once 'app/models/Order.php';
require_once 'app/models/Message.php';

class AdminController {
    private $db;

    public function __construct() {
        if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            header('Location: index.php?page=home');
            exit();
        }
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        require_once 'app/views/admin/dashboard.php';
    }

    // Categories Management
    public function categories() {
        $categoryModel = new Category($this->db);
        $categories = $categoryModel->getAll();
        require_once 'app/views/admin/categories.php';
    }

    public function addCategory() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryModel = new Category($this->db);
            $categoryModel->create($_POST['name'], $_POST['description']);
            header('Location: index.php?page=admin&action=categories');
            exit();
        }
        require_once 'app/views/admin/add_category.php';
    }

    public function editCategory() {
        $categoryModel = new Category($this->db);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryModel->update($_POST['id'], $_POST['name'], $_POST['description']);
            header('Location: index.php?page=admin&action=categories');
            exit();
        }
        $category = $categoryModel->getById($_GET['id']);
        require_once 'app/views/admin/edit_category.php';
    }

    public function deleteCategory() {
        $categoryModel = new Category($this->db);
        $categoryModel->delete($_GET['id']);
        header('Location: index.php?page=admin&action=categories');
        exit();
    }

    // Books Management
    public function books() {
        $bookModel = new Book($this->db);
        $books = $bookModel->getAll();
        require_once 'app/views/admin/books.php';
    }

    public function addBook() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookModel = new Book($this->db);
            $image = $this->uploadImage();
            $bookModel->create($_POST['title'], $_POST['author'], $_POST['category_id'], 
                             $_POST['price'], $_POST['stock'], $_POST['description'], $image);
            header('Location: index.php?page=admin&action=books');
            exit();
        }
        $categoryModel = new Category($this->db);
        $categories = $categoryModel->getAll();
        require_once 'app/views/admin/add_book.php';
    }

    public function editBook() {
        $bookModel = new Book($this->db);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image = $this->uploadImage();
            $bookModel->update($_POST['id'], $_POST['title'], $_POST['author'], 
                             $_POST['category_id'], $_POST['price'], $_POST['stock'], 
                             $_POST['description'], $image);
            header('Location: index.php?page=admin&action=books');
            exit();
        }
        $book = $bookModel->getById($_GET['id']);
        $categoryModel = new Category($this->db);
        $categories = $categoryModel->getAll();
        require_once 'app/views/admin/edit_book.php';
    }

    public function deleteBook() {
        $bookModel = new Book($this->db);
        $bookModel->delete($_GET['id']);
        header('Location: index.php?page=admin&action=books');
        exit();
    }

    // Users Management
    public function users() {
        $userModel = new User($this->db);
        $users = $userModel->getAll();
        require_once 'app/views/admin/users.php';
    }

    // Orders Management
    public function orders() {
        $orderModel = new Order($this->db);
        $orders = $orderModel->getAll();
        require_once 'app/views/admin/orders.php';
    }

    public function orderDetail() {
        $orderModel = new Order($this->db);
        $order_items = $orderModel->getOrderItems($_GET['id']);
        require_once 'app/views/admin/order_detail.php';
    }

    public function messages() {
        $messageModel = new Message($this->db);
        $messages = $messageModel->getAll();
        require_once 'app/views/admin/messages.php';
    }

    private function uploadImage() {
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "assets/images/books/";
            if(!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $newFileName = uniqid() . '.' . $imageFileType;
            $target_file = $target_dir . $newFileName;
            
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                return $newFileName;
            }
        }
        return null;
    }
}
?>
