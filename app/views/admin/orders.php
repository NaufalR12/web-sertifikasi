<?php $title = "Pesanan - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<main>
    <div class="container">
        <div class="admin-header">
            <h2>Daftar Pesanan User</h2>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>No. Pesanan</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo htmlspecialchars($order['username']); ?></td>
                    <td><?php echo htmlspecialchars($order['email']); ?></td>
                    <td>Rp <?php echo number_format($order['total_amount'], 0, ',', '.'); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></td>
                    <td>
                        <a href="index.php?page=admin&action=orderDetail&id=<?php echo $order['id']; ?>"
                            class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="index.php?page=admin" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</main>

<?php include 'app/views/layout/footer.php'; ?>