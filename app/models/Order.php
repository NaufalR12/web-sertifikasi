<?php
class Order {
    private $conn;
    private $table = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($user_id, $total_amount, $shipping_address, $payment_method = 'COD') {
        $query = "INSERT INTO " . $this->table . " (user_id, total_amount, shipping_address, payment_method) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("idss", $user_id, $total_amount, $shipping_address, $payment_method);
        if($stmt->execute()) {
            return $this->conn->insert_id;
        }
        return false;
    }

    public function addItem($order_id, $book_id, $quantity, $price) {
        $query = "INSERT INTO order_items (order_id, book_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiid", $order_id, $book_id, $quantity, $price);
        return $stmt->execute();
    }

    public function getByUserId($user_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAll() {
        $query = "SELECT o.*, u.username, u.email FROM " . $this->table . " o 
                  JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderItems($order_id) {
        $query = "SELECT oi.*, b.title, b.author FROM order_items oi 
                  JOIN books b ON oi.book_id = b.id WHERE oi.order_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStatus($order_id, $status) {
        $query = "UPDATE " . $this->table . " SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status, $order_id);
        return $stmt->execute();
    }
}
?>
