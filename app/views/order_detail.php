<?php $title = "Detail Pesanan - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<main>
    <div class="container">
        <h2>Detail Pesanan #<?php echo $_GET['id']; ?></h2>

        <table class="orders-table">
            <thead>
                <tr>
                    <th>Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $total = 0;
            foreach($order_items as $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                    <td><?php echo htmlspecialchars($item['author']); ?></td>
                    <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><strong>Total</strong></td>
                <td><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <a href="index.php?page=order&action=myorders" class="btn btn-secondary">Kembali ke Pesanan Saya</a>
</div>
</main>

<?php include 'app/views/layout/footer.php'; ?>