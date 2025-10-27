<?php $title = "Pesanan Berhasil - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="success-message">
        <div class="success-icon">✓</div>
        <h2>Pesanan Berhasil Dibuat!</h2>
        <p>Terima kasih telah berbelanja di BookStore.</p>
        <p>Nomor Pesanan Anda: <strong>#<?php echo $order_id; ?></strong></p>
        <p>Buku akan segera kami kirim ke alamat yang Anda berikan.</p>
        <p>Pembayaran dilakukan saat buku diterima (Cash on Delivery).</p>
        
        <div class="success-actions">
            <a href="index.php?page=order&action=myorders" class="btn btn-primary">Lihat Pesanan Saya</a>
            <a href="index.php?page=home" class="btn btn-secondary">Kembali ke Home</a>
        </div>
    </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>
