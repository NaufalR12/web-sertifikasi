<?php $title = "Edit Buku - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Edit Buku</h2>

    <form action="index.php?page=admin&action=editBook" method="POST" enctype="multipart/form-data" class="admin-form">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

        <div class="form-group">
            <label>Judul Buku *</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>
        </div>

        <div class="form-group">
            <label>Penulis *</label>
            <input type="text" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori *</label>
            <select name="category_id" required>
                <option value="">Pilih Kategori</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"
                    <?php echo ($category['id'] == $book['category_id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($category['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Harga *</label>
            <input type="number" name="price" value="<?php echo $book['price']; ?>" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Stok *</label>
            <input type="number" name="stock" value="<?php echo $book['stock']; ?>" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"><?php echo htmlspecialchars($book['description']); ?></textarea>
        </div>

        <div class="form-group">
            <label>Gambar Buku</label>
            <?php if($book['image']): ?>
            <div>
                <img src="assets/images/books/<?php echo $book['image']; ?>" width="100">
                <p><small>Upload gambar baru untuk mengganti</small></p>
            </div>
            <?php endif; ?>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php?page=admin&action=books" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include 'app/views/layout/footer.php'; ?>