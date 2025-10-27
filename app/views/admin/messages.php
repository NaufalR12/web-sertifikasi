<?php $title = "Pesan User - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<main>
<div class="container">
    <h2>Pesan dari User</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($messages as $msg): ?>
            <tr>
                <td><?php echo $msg['id']; ?></td>
                <td><?php echo htmlspecialchars($msg['name']); ?></td>
                <td><?php echo htmlspecialchars($msg['email']); ?></td>
                <td><?php echo htmlspecialchars($msg['subject']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($msg['message'])); ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($msg['created_at'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?page=admin" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>
</main>

<?php include 'app/views/layout/footer.php'; ?>
