# Aplikasi BookStore - Toko Buku Online

Aplikasi toko buku online dengan fitur lengkap untuk admin dan user, dibangun menggunakan PHP Native dengan arsitektur MVC (Model-View-Controller).

---

## Daftar Isi

- [Tentang Aplikasi](#tentang-aplikasi)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Folder](#struktur-folder)
- [Login Default](#login-default)
- [Penggunaan Aplikasi](#penggunaan-aplikasi)
- [Keamanan](#keamanan)
- [FAQ](#faq)
- [Kontak](#kontak)

---

## Tentang Aplikasi

BookStore adalah aplikasi web toko buku online yang memudahkan user untuk mencari dan membeli buku secara online. Admin dapat mengelola data buku, kategori, user, dan pesanan melalui dashboard yang intuitif.

## Fitur Utama

### Fitur untuk Admin

- **Kelola Kategori Buku (CRUD)**

  - Tambah, edit, hapus kategori buku
  - Lihat daftar semua kategori

- **Kelola Data Buku (CRUD)**

  - Tambah buku baru dengan upload gambar
  - Edit informasi buku
  - Hapus buku
  - Kelola stok buku

- **Manajemen User**

  - Lihat daftar semua user terdaftar

- **Monitor Pesanan**

  - Lihat semua pesanan dari user
  - Detail pesanan lengkap
  - Informasi pembayaran

- **Pesan dari User**
  - Menerima pesan dari user
  - Lihat semua pesan yang masuk

### Fitur untuk User

- **Autentikasi**

  - Registrasi akun baru dengan validasi password kuat
  - Login dengan username dan password
  - Logout

- **Katalog Buku**

  - Lihat semua buku yang tersedia
  - Lihat detail buku lengkap
  - Informasi stok real-time

- **Pencarian**

  - Cari buku berdasarkan judul atau penulis
  - Filter buku berdasarkan kategori

- **Shopping Cart**

  - Tambah buku ke keranjang
  - Update jumlah buku
  - Hapus buku dari keranjang
  - Lihat total harga

- **Checkout & Pembayaran**

  - Payment on Delivery (COD)
  - Payment via QRIS
  - Payment via Transfer Bank
  - Konfirmasi pesanan

- **Riwayat Pesanan**

  - Lihat semua pesanan yang pernah dibuat
  - Detail pesanan lengkap

- **Kontak Admin**

  - Kirim pesan ke admin
  - Form kontak yang mudah digunakan

- **About Us**
  - Informasi tentang toko
  - Visi dan misi

---

## Teknologi yang Digunakan

### Backend

- **PHP** - Server-side scripting
- **MySQL** - Database management
- **MySQLi** - PHP extension untuk koneksi database dengan prepared statement

### Frontend

- **HTML5** - Struktur halaman web
- **CSS3** - Styling dan layout
  - Flexbox & Grid untuk responsive layout
  - Media Queries untuk mobile responsiveness

### Arsitektur

- **MVC (Model-View-Controller)** - Pola arsitektur aplikasi
  - **Model**: Interaksi dengan database
  - **View**: Tampilan UI
  - **Controller**: Logic aplikasi

---

## Instalasi

### Langkah 1: Download dan Extract

1. Download atau clone repository ini
2. Extract folder ke `c:\xampp\htdocs\web-sertifikasi`

### Langkah 2: Setup Database

1. Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
2. Buat database baru bernama `bookstore`
3. Import file `database.sql` yang ada di folder root aplikasi
   - Klik database `bookstore`
   - Pilih tab **Import**
   - Choose file `bookstore.sql`
   - Klik **Go**
4. Sesuaikan konfigurasi database di database.php

