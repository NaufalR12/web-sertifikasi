<?php $title = "Daftar User - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="admin-header">
        <h2>Daftar User Terdaftar</h2>
    </div>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>Telepon</th>
                <th>Role</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone'] ?? '-'); ?></td>
                    <td>
                        <span class="badge badge-<?php echo $user['role']; ?>">
                            <?php echo ucfirst($user['role']); ?>
                        </span>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($user['created_at'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="index.php?page=admin" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>

<?php include 'app/views/layout/footer.php'; ?>
