<?php
require_once 'app/models/Order.php';
require_once 'app/models/Book.php';

class OrderController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function checkout() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=auth&action=login');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orderModel = new Order($this->db);
            $bookModel = new Book($this->db);
            
            $user_id = $_SESSION['user_id'];
            $shipping_address = $_POST['shipping_address'];
            $cart = $_SESSION['cart'];
            $total = 0;

            foreach($cart as $book_id => $quantity) {
                $book = $bookModel->getById($book_id);
                $total += $book['price'] * $quantity;
            }

            $order_id = $orderModel->create($user_id, $total, $shipping_address);

            if($order_id) {
                foreach($cart as $book_id => $quantity) {
                    $book = $bookModel->getById($book_id);
                    $orderModel->addItem($order_id, $book_id, $quantity, $book['price']);
                    $bookModel->updateStock($book_id, $quantity);
                }
                unset($_SESSION['cart']);
                header('Location: index.php?page=order&action=success&id=' . $order_id);
                exit();
            }
        }

        require_once 'app/views/checkout.php';
    }

    public function success() {
        $order_id = $_GET['id'];
        require_once 'app/views/order_success.php';
    }

    public function myorders() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=auth&action=login');
            exit();
        }

        $orderModel = new Order($this->db);
        $orders = $orderModel->getByUserId($_SESSION['user_id']);
        require_once 'app/views/my_orders.php';
    }
}
?>
