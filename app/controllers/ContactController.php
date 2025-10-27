<?php
require_once 'app/models/Message.php';

class ContactController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $messageModel = new Message($this->db);
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            
            if($messageModel->create($user_id, $_POST['name'], $_POST['email'], 
                                   $_POST['subject'], $_POST['message'])) {
                $success = "Pesan berhasil dikirim!";
            } else {
                $error = "Gagal mengirim pesan!";
            }
        }
        require_once 'app/views/contact.php';
    }
}
?>
