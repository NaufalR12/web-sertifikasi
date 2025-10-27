<?php $title = "Register - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="auth-form">
        <h2>Registrasi</h2>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="index.php?page=auth&action=register" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="full_name" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required minlength="6">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
        
        <p class="text-center">Sudah punya akun? <a href="index.php?page=auth&action=login">Login disini</a></p>
    </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>
