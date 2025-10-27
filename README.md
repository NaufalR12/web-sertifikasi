# Aplikasi BookStore

Aplikasi toko buku online dengan fitur lengkap untuk admin dan user.

## Fitur

### Admin

- Kelola Kategori Buku (CRUD)
- Kelola Data Buku (CRUD)
- Lihat Daftar User
- Monitor Pesanan User

### User

- Registrasi & Login
- Lihat Katalog Buku
- Pencarian Buku
- Tambah ke Keranjang
- Checkout & Payment on Delivery
- Lihat Riwayat Pesanan
- Kirim Pesan ke Admin
- Halaman About Us

## Teknologi

- PHP
- MySQL
- HTML5
- CSS3
- MVC Architecture

## Instalasi

1. Copy folder ke `c:\xampp\htdocs\web-sertifikasi`
2. Import file `database.sql` ke phpMyAdmin
3. Jalankan XAMPP (Apache & MySQL)
4. Akses: `http://localhost/web-sertifikasi`

## Login Default

**Admin:**

- Username: admin
- Password: admin123

## Struktur Folder

## Keamanan SQL Injection

Aplikasi ini sudah menggunakan prepared statement (`$stmt->prepare`, `$stmt->bind_param`) pada semua query yang menerima input dari user, sehingga aman dari serangan SQL Injection.

---

### Kenapa menggunakan prepared statement?

Prepared statement digunakan agar query SQL lebih aman dan efisien. Dengan prepared statement, data input user dipisahkan dari perintah SQL sehingga mencegah SQL Injection.

**Contoh penggunaan prepared statement di PHP:**

```php
$db = new mysqli("localhost", "root", "", "bookstore");
$stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = MD5(?)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
```

Pada contoh di atas, variabel `$username` dan `$password` tidak langsung digabungkan ke query SQL, sehingga input user tidak bisa digunakan untuk melakukan SQL Injection.

### Bagaimana membatasi akses admin dan user?

Akses dibatasi dengan memeriksa session dan role user. Jika session `role` adalah `admin`, maka user bisa mengakses fitur admin. Jika `role` adalah `user`, maka hanya fitur user yang bisa diakses.

### Apa itu session?

Session adalah mekanisme penyimpanan data sementara di server untuk setiap user yang login. Session digunakan untuk menyimpan status login, role, dan data lain selama user menggunakan aplikasi.

### Bagaimana cara mengatasi SQL Injection?

SQL Injection diatasi dengan menggunakan prepared statement, sehingga input user tidak langsung digabungkan ke query SQL. Semua input user di-bind sebagai parameter, sehingga query tetap aman.
