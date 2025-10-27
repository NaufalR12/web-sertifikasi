<?php $title = "Keranjang Belanja - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<main>
    <div class="container">
        <h2>Keranjang Belanja</h2>
        <?php if(count($cartItems) > 0): ?>
        <form action="index.php?page=cart&action=update" method="POST">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Buku</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cartItems as $item): ?>
                    <tr>
                        <td>
                            <strong><?php echo htmlspecialchars($item['title']); ?></strong><br>
                            <small>Oleh: <?php echo htmlspecialchars($item['author']); ?></small>
                        </td>
                        <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                        <td>
                            <input type="number" name="quantity[<?php echo $item['id']; ?>]"
                                value="<?php echo $item['quantity']; ?>" min="1" max="<?php echo $item['stock']; ?>"
                                class="qty-input">
                        </td>
                        <td>Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="index.php?page=cart&action=remove&id=<?php echo $item['id']; ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Hapus item ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td colspan="2"><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <div class="cart-actions">
                <button type="submit" class="btn btn-secondary">Update Keranjang</button>
                <a href="index.php?page=home" class="btn btn-secondary">Lanjut Belanja</a>
                <a href="index.php?page=order&action=checkout" class="btn btn-primary">Checkout</a>
            </div>
        </form>
        <?php else: ?>
        <div class="empty-cart">
            <p>Keranjang belanja Anda kosong.</p>
            <a href="index.php?page=home" class="btn btn-primary">Mulai Belanja</a>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'app/views/layout/footer.php'; ?>