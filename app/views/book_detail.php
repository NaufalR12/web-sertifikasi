<?php $title = $book['title'] . " - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="book-detail">
        <div class="book-detail-image">
            <?php if($book['image']): ?>
                <img src="assets/images/books/<?php echo $book['image']; ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
            <?php else: ?>
                <div class="no-image-large">📖</div>
            <?php endif; ?>
        </div>
        
        <div class="book-detail-info">
            <h1><?php echo htmlspecialchars($book['title']); ?></h1>
            <p class="author">Penulis: <?php echo htmlspecialchars($book['author']); ?></p>
            <p class="category">Kategori: <?php echo htmlspecialchars($book['category_name']); ?></p>
            <p class="price">Rp <?php echo number_format($book['price'], 0, ',', '.'); ?></p>
            <p class="stock">Stok tersedia: <?php echo $book['stock']; ?> buku</p>
            
            <div class="description">
                <h3>Deskripsi</h3>
                <p><?php echo nl2br(htmlspecialchars($book['description'])); ?></p>
            </div>
            
            <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'user'): ?>
                <?php if($book['stock'] > 0): ?>
                    <form action="index.php?page=cart&action=add" method="POST">
                        <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                        <div class="form-group">
                            <label>Jumlah:</label>
                            <input type="number" name="quantity" value="1" min="1" max="<?php echo $book['stock']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Tambah ke Keranjang</button>
                    </form>
                <?php else: ?>
                    <p class="out-of-stock">Stok habis</p>
                <?php endif; ?>
            <?php else: ?>
                <p><a href="index.php?page=auth&action=login" class="btn btn-primary">Login untuk membeli</a></p>
            <?php endif; ?>
            
            <a href="index.php?page=home" class="btn btn-secondary">Kembali ke Katalog</a>
        </div>
    </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>
