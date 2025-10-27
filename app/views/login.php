<?php $title = "Login - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="auth-form">
        <h2>Login</h2>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="index.php?page=auth&action=login" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        
        <p class="text-center">Belum punya akun? <a href="index.php?page=auth&action=register">Daftar disini</a></p>
    </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>
