<?php $title = "Home - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<div class="container">
    <div class="hero">
        <h1>Selamat Datang di BookStore</h1>
        <p>Temukan koleksi buku terbaik untuk Anda</p>
    </div>

    <div class="search-box">
        <form action="index.php" method="GET">
            <input type="hidden" name="page" value="book">
            <input type="hidden" name="action" value="search">
            <input type="text" name="keyword" placeholder="Cari buku berdasarkan judul, penulis, atau kategori..." required>
            <button type="submit">🔍 Cari</button>
        </form>
    </div>

    <div class="categories">
        <h2>Kategori Buku</h2>
        <div class="category-list">
            <?php foreach($categories as $category): ?>
                <div class="category-card">
                    <h3><?php echo htmlspecialchars($category['name']); ?></h3>
                    <p><?php echo htmlspecialchars($category['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="books">
        <h2>Koleksi Buku</h2>
        <div class="book-grid">
            <?php foreach($books as $book): ?>
                <div class="book-card">
                    <div class="book-image">
                        <?php if($book['image']): ?>
                            <img src="assets/images/books/<?php echo $book['image']; ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
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
                            <a href="index.php?page=book&action=detail&id=<?php echo $book['id']; ?>" class="btn btn-info">Detail</a>
                            <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'user' && $book['stock'] > 0): ?>
                                <form action="index.php?page=cart&action=add" method="POST" style="display:inline;">
                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <button type="submit" class="btn btn-primary">Tambah ke Cart</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>
