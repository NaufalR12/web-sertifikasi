<?php $title = "Hasil Pencarian - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<main>
    <div class="container">
        <h2>Hasil Pencarian: "<?php echo htmlspecialchars($keyword); ?>"</h2>
        <p>Ditemukan <?php echo count($books); ?> buku</p>

        <div class="book-grid">
            <?php if(count($books) > 0): ?>
            <?php foreach($books as $book): ?>
            <div class="book-card">
                <div class="book-image">
                    <?php if($book['image']): ?>
                    <img src="assets/images/books/<?php echo $book['image']; ?>"
                        alt="<?php echo htmlspecialchars($book['title']); ?>">
                    <?php else: ?>
                    <div class="no-image">📖</div>
                    <?php endif; ?>
                </div>
                <div class="book-info">
                    <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                    <p class="author">Oleh: <?php echo htmlspecialchars($book['author']); ?></p>
                    <p class="category"><?php echo htmlspecialchars($book['category_name']); ?></p>
                    <p class="price">Rp <?php echo number_format($book['price'], 0, ',', '.'); ?></p>
                    <p class="stock">Stok: <?php echo $book['stock']; ?></p>
                    <div class="book-actions">
                        <a href="index.php?page=book&action=detail&id=<?php echo $book['id']; ?>"
                            class="btn btn-info">Detail</a>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'user' && $book['stock'] > 0): ?>
                        <form action="index.php?page=cart&action=add" method="POST" style="display:inline;">
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="no-results">Tidak ada buku yang ditemukan.</p>
            <?php endif; ?>
        </div>

        <a href="index.php?page=home" class="btn btn-secondary">Kembali ke Home</a>
    </div>
</main>

<?php include 'app/views/layout/footer.php'; ?>