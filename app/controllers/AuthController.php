<?php
require_once 'app/models/User.php';

class AuthController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = new User($this->db);
            $user = $userModel->login($_POST['username'], $_POST['password']);
            
            if($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                if($user['role'] == 'admin') {
                    header('Location: index.php?page=admin');
                } else {
                    header('Location: index.php?page=home');
                }
                exit();
            } else {
                $error = "Username atau password salah!";
            }
        }
        require_once 'app/views/login.php';
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = new User($this->db);
            if($userModel->register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['full_name'])) {
                header('Location: index.php?page=auth&action=login');
                exit();
            } else {
                $error = "Registrasi gagal! Username atau email sudah digunakan.";
            }
        }
        require_once 'app/views/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=home');
        exit();
    }
}
?>