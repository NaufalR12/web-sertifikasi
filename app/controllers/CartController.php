<?php
require_once 'app/models/Book.php';

class CartController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=auth&action=login');
            exit();
        }
        
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $bookModel = new Book($this->db);
        $cartItems = [];
        $total = 0;

        foreach($cart as $book_id => $quantity) {
            $book = $bookModel->getById($book_id);
            if($book) {
                $book['quantity'] = $quantity;
                $book['subtotal'] = $book['price'] * $quantity;
                $cartItems[] = $book;
                $total += $book['subtotal'];
            }
        }

        require_once 'app/views/cart.php';
    }

    public function add() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=auth&action=login');
            exit();
        }

        $book_id = $_POST['book_id'];
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if(isset($_SESSION['cart'][$book_id])) {
            $_SESSION['cart'][$book_id] += $quantity;
        } else {
            $_SESSION['cart'][$book_id] = $quantity;
        }

        header('Location: index.php?page=cart');
        exit();
    }

    public function remove() {
        $book_id = $_GET['id'];
        unset($_SESSION['cart'][$book_id]);
        header('Location: index.php?page=cart');
        exit();
    }

    public function update() {
        foreach($_POST['quantity'] as $book_id => $quantity) {
            if($quantity > 0) {
                $_SESSION['cart'][$book_id] = $quantity;
            } else {
                unset($_SESSION['cart'][$book_id]);
            }
        }
        header('Location: index.php?page=cart');
        exit();
    }
}
?>
