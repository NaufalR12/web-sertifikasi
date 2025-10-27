<?php $title = "Admin Dashboard - BookStore"; ?>
<?php include 'app/views/layout/header.php'; ?>

<main>
    <div class="container">
        <div class="admin-header">
            <h2>Dashboard Admin</h2>
        </div>

        <div class="admin-menu">
            <a href="index.php?page=admin&action=categories" class="admin-card">
                <div class="card-icon">📁</div>
                <div class="card-title">Kelola Kategori</div>
                <div class="card-desc">Tambah, edit, hapus kategori buku</div>
            </a>

            <a href="index.php?page=admin&action=books" class="admin-card">
                <div class="card-icon">📚</div>
                <div class="card-title">Kelola Buku</div>
                <div class="card-desc">Tambah, edit, hapus data buku</div>
            </a>

            <a href="index.php?page=admin&action=users" class="admin-card">
                <div class="card-icon">👥</div>
                <div class="card-title">Daftar User</div>
                <div class="card-desc">Lihat semua user terdaftar</div>
            </a>

            <a href="index.php?page=admin&action=orders" class="admin-card">
                <div class="card-icon">📦</div>
                <div class="card-title">Pesanan</div>
                <div class="card-desc">Monitor pesanan dari user</div>
            </a>

            <a href="index.php?page=admin&action=messages" class="admin-card">
                <div class="card-icon">✉️</div>
                <div class="card-title">Pesan User</div>
                <div class="card-desc">Lihat pesan yang dikirimkan user</div>
            </a>
        </div>
    </div>
</main>

<?php include 'app/views/layout/footer.php'; ?>