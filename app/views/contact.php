<?php $title = "Contact Us - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Hubungi Kami</h2>
    <?php if(isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <!-- Untuk admin, info kontak tampil penuh -->
        <div class="contact-info contact-info-full">
            <h3>Informasi Kontak</h3>
            <div class="info-item">
                <strong>📍 Alamat:</strong>
                <p>Jl. Contoh No. 123, Jakarta, Indonesia</p>
            </div>
            <div class="info-item">
                <strong>📞 Telepon:</strong>
                <p>+62 21 1234 5678</p>
            </div>
            <div class="info-item">
                <strong>✉️ Email:</strong>
                <p>info@bookstore.com</p>
            </div>
            <div class="info-item">
                <strong>🕐 Jam Operasional:</strong>
                <p>Senin - Jumat: 08:00 - 17:00<br>Sabtu: 09:00 - 15:00<br>Minggu: Tutup</p>
            </div>
        </div>
    <?php else: ?>
        <div class="contact-container">
            <div class="contact-form">
                <h3>Kirim Pesan</h3>
                <form action="index.php?page=contact" method="POST">
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" name="name" required value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Subject *</label>
                        <input type="text" name="subject" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Pesan *</label>
                        <textarea name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
            <div class="contact-info">
                <h3>Informasi Kontak</h3>
                <div class="info-item">
                    <strong>📍 Alamat:</strong>
                    <p>Jl. Contoh No. 123, Jakarta, Indonesia</p>
                </div>
                <div class="info-item">
                    <strong>📞 Telepon:</strong>
                    <p>+62 21 1234 5678</p>
                </div>
                <div class="info-item">
                    <strong>✉️ Email:</strong>
                    <p>info@bookstore.com</p>
                </div>
                <div class="info-item">
                    <strong>🕐 Jam Operasional:</strong>
                    <p>Senin - Jumat: 08:00 - 17:00<br>Sabtu: 09:00 - 15:00<br>Minggu: Tutup</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/layout/footer.php'; ?>
