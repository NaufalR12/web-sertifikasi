<?php $title = "Tambah Kategori - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Tambah Kategori Baru</h2>
    
    <form action="index.php?page=admin&action=addCategory" method="POST" class="admin-form">
        <div class="form-group">
            <label>Nama Kategori *</label>
            <input type="text" name="name" required>
        </div>
        
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=admin&action=categories" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include 'app/views/layout/footer.php'; ?>
