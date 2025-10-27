<?php
class Message {
    private $conn;
    private $table = "messages";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($user_id, $name, $email, $subject, $message) {
        $query = "INSERT INTO " . $this->table . " (user_id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("issss", $user_id, $name, $email, $subject, $message);
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
