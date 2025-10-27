<?php $title = "Kelola Buku - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="admin-header">
        <h2>Kelola Data Buku</h2>
        <a href="index.php?page=admin&action=addBook" class="btn btn-primary">+ Tambah Buku</a>
    </div>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td>
                        <?php if($book['image']): ?>
                            <img src="assets/images/books/<?php echo $book['image']; ?>" width="50" height="70" style="object-fit:cover;">
                        <?php else: ?>
                            📖
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['category_name']); ?></td>
                    <td>Rp <?php echo number_format($book['price'], 0, ',', '.'); ?></td>
                    <td><?php echo $book['stock']; ?></td>
                    <td>
                        <a href="index.php?page=admin&action=editBook&id=<?php echo $book['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="index.php?page=admin&action=deleteBook&id=<?php echo $book['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus buku ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="index.php?page=admin" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>

<?php include 'app/views/layout/footer.php'; ?>
