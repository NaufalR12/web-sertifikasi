<?php $title = "Checkout - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Checkout</h2>
    
    <div class="checkout-container">
        <div class="checkout-form">
            <h3>Informasi Pengiriman</h3>
            <form action="index.php?page=order&action=checkout" method="POST">
                <div class="form-group">
                    <label>Alamat Lengkap Pengiriman *</label>
                    <textarea name="shipping_address" rows="4" required placeholder="Masukkan alamat lengkap untuk pengiriman"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="payment_method" required>
                        <option value="COD">Cash on Delivery (Bayar saat terima)</option>
                        <option value="QRIS">QRIS (Scan QR, bayar online)</option>
                        <option value="TRANSFER">Transfer Bank</option>
                    </select>
                    <small>
                        Pilih metode pembayaran:<br>
                        - COD: Pembayaran dilakukan saat buku diterima.<br>
                        - QRIS: Scan QR untuk pembayaran online.<br>
                        - Transfer: Transfer ke rekening bank yang akan diinformasikan.
                    </small>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg">Konfirmasi Pesanan</button>
                <a href="index.php?page=cart" class="btn btn-secondary">Kembali ke Keranjang</a>
            </form>
        </div>
        
        <div class="order-summary">
            <h3>Ringkasan Pesanan</h3>
            <?php 
            $bookModel = new Book($this->db);
            $total = 0;
            foreach($_SESSION['cart'] as $book_id => $quantity):
                $book = $bookModel->getById($book_id);
                $subtotal = $book['price'] * $quantity;
                $total += $subtotal;
            ?>
                <div class="summary-item">
                    <div>
                        <strong><?php echo htmlspecialchars($book['title']); ?></strong><br>
                        <small><?php echo $quantity; ?> x Rp <?php echo number_format($book['price'], 0, ',', '.'); ?></small>
                    </div>
                    <div>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></div>
                </div>
            <?php endforeach; ?>
            
            <div class="summary-total">
                <strong>Total Pembayaran</strong>
                <strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>
