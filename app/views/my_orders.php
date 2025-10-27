<?php $title = "Pesanan Saya - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Pesanan Saya</h2>

    <?php if(count($orders) > 0): ?>
    <table class="orders-table">
        <thead>
            <tr>
                <th>No. Pesanan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Alamat Pengiriman</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
            <tr>
                <td>#<?php echo $order['id']; ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></td>
                <td>Rp <?php echo number_format($order['total_amount'], 0, ',', '.'); ?></td>
                <td>
                    <span class="badge badge-<?php echo $order['status']; ?>">
                        <?php echo ucfirst($order['status']); ?>
                    </span>
                </td>
                <td><?php echo htmlspecialchars(substr($order['shipping_address'], 0, 50)) . '...'; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="empty-orders">
        <p>Anda belum memiliki pesanan.</p>
        <a href="index.php?page=home" class="btn btn-primary">Mulai Belanja</a>
    </div>
    <?php endif; ?>
</div>

<?php include 'app/views/layout/footer.php'; ?>