<?php $title = "Edit Kategori - Admin"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Edit Kategori</h2>
    
    <form action="index.php?page=admin&action=editCategory" method="POST" class="admin-form">
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
        
        <div class="form-group">
            <label>Nama Kategori *</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"><?php echo htmlspecialchars($category['description']); ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php?page=admin&action=categories" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include 'app/views/layout/footer.php'; ?>
