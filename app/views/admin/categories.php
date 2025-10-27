<?php $title = "Kelola Kategori - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="admin-header">
        <h2>Kelola Kategori Buku</h2>
        <a href="index.php?page=admin&action=addCategory" class="btn btn-primary">+ Tambah Kategori</a>
    </div>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category): ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                    <td><?php echo htmlspecialchars($category['description']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($category['created_at'])); ?></td>
                    <td>
                        <a href="index.php?page=admin&action=editCategory&id=<?php echo $category['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="index.php?page=admin&action=deleteCategory&id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="index.php?page=admin" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>

<?php include 'app/views/layout/footer.php'; ?>
