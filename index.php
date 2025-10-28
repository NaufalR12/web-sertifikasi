<?php
session_start();
require_once 'config/database.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/BookController.php';
require_once 'app/controllers/CartController.php';
require_once 'app/controllers/OrderController.php';
require_once 'app/controllers/AdminController.php';
require_once 'app/controllers/ContactController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($page) {
    case 'home':
        $controller = new HomeController();
        break;
    case 'auth':
        $controller = new AuthController();
        break;
    case 'book':
        $controller = new BookController();
        break;
    case 'cart':
        $controller = new CartController();
        break;
    case 'order':
        $controller = new OrderController();
        break;
    case 'admin':
        $controller = new AdminController();
        break;
    case 'contact':
        $controller = new ContactController();
        break;
    default:
        $controller = new HomeController();
        break;
}

if(method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}
?>