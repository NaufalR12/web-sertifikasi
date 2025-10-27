<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'BookStore'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="index.php?page=home">📚 BookStore</a>
            </div>
            <div class="nav-menu">
                <a href="index.php?page=home">Home</a>
                <a href="index.php?page=home&action=about">About Us</a>
                <a href="index.php?page=contact">Contact</a>

                <?php if(isset($_SESSION['user_id'])): ?>
                <?php if($_SESSION['role'] == 'admin'): ?>
                <a href="index.php?page=admin">Dashboard Admin</a>
                <?php else: ?>
                <a href="index.php?page=cart">🛒 Cart
                    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                    <span class="badge"><?php echo count($_SESSION['cart']); ?></span>
                    <?php endif; ?>
                </a>
                <a href="index.php?page=order&action=myorders">My Orders</a>
                <?php endif; ?>
                <a href="index.php?page=auth&action=logout">Logout (<?php echo $_SESSION['username']; ?>)</a>
                <?php else: ?>
                <a href="index.php?page=auth&action=login">Login</a>
                <a href="index.php?page=auth&action=register">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>