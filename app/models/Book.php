<?php
class Book {
    private $conn;
    private $table = "books";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT b.*, c.name as category_name FROM " . $this->table . " b 
                  LEFT JOIN categories c ON b.category_id = c.id ORDER BY b.created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT b.*, c.name as category_name FROM " . $this->table . " b 
                  LEFT JOIN categories c ON b.category_id = c.id WHERE b.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function search($keyword) {
        $searchTerm = "%" . $keyword . "%";
        $query = "SELECT b.*, c.name as category_name FROM " . $this->table . " b 
                  LEFT JOIN categories c ON b.category_id = c.id 
                  WHERE b.title LIKE ? OR b.author LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function searchByCategory($categoryName) {
        $query = "SELECT b.*, c.name as category_name FROM " . $this->table . " b 
                  LEFT JOIN categories c ON b.category_id = c.id 
                  WHERE c.name = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function create($title, $author, $category_id, $price, $stock, $description, $image) {
        $query = "INSERT INTO " . $this->table . " (title, author, category_id, price, stock, description, image) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssidiss", $title, $author, $category_id, $price, $stock, $description, $image);
        return $stmt->execute();
    }

    public function update($id, $title, $author, $category_id, $price, $stock, $description, $image = null) {
        if($image) {
            $query = "UPDATE " . $this->table . " SET title = ?, author = ?, category_id = ?, 
                      price = ?, stock = ?, description = ?, image = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssidissi", $title, $author, $category_id, $price, $stock, $description, $image, $id);
        } else {
            $query = "UPDATE " . $this->table . " SET title = ?, author = ?, category_id = ?, 
                      price = ?, stock = ?, description = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssidisi", $title, $author, $category_id, $price, $stock, $description, $id);
        }
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function updateStock($id, $quantity) {
        $query = "UPDATE " . $this->table . " SET stock = stock - ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $quantity, $id);
        return $stmt->execute();
    }
}
?>
