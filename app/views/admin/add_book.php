<?php $title = "Tambah Buku - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Tambah Buku Baru</h2>
    
    <form action="index.php?page=admin&action=addBook" method="POST" enctype="multipart/form-data" class="admin-form">
        <div class="form-group">
            <label>Judul Buku *</label>
            <input type="text" name="title" required>
        </div>
        
        <div class="form-group">
            <label>Penulis *</label>
            <input type="text" name="author" required>
        </div>
        
        <div class="form-group">
            <label>Kategori *</label>
            <select name="category_id" required>
                <option value="">Pilih Kategori</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Harga *</label>
            <input type="number" name="price" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label>Stok *</label>
            <input type="number" name="stock" required>
        </div>
        
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label>Gambar Buku</label>
            <input type="file" name="image" accept="image/*">
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=admin&action=books" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include 'app/views/layout/footer.php'; ?>
