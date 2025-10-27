<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $password, $full_name) {
        $query = "INSERT INTO " . $this->table . " (username, email, password, full_name) VALUES (?, ?, MD5(?), ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $username, $email, $password, $full_name);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = ? AND password = MD5(?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAll() {
        $query = "SELECT id, username, email, full_name, phone, role, created_at FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>