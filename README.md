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

Tentu, ini adalah rangkuman materi-materi inti tersebut.

---

## Perbedaan GET dan POST

**GET** dan **POST** adalah dua _method_ HTTP yang paling umum digunakan untuk mengirim data dari client (browser) ke server.

- **GET**

  - Mengirim data melalui **URL** (contoh: `cari.php?keyword=buku`).
  - Datanya **terlihat** di address bar.
  - Memiliki **batas ukuran** data (sekitar 2000 karakter).
  - Bisa di-bookmark.
  - Ideal untuk: Mengambil data, seperti halaman pencarian atau filter produk.

- **POST**
  - Mengirim data melalui **body** request HTTP (tersembunyi).
  - Datanya **tidak terlihat** di address bar.
  - Batas ukuran data **jauh lebih besar**.
  - Tidak bisa di-bookmark.
  - Ideal untuk: Mengirim data sensitif (login, register) atau data besar (tambah artikel baru).

---

## Konsep CRUD

CRUD adalah singkatan dari empat operasi dasar yang bisa dilakukan pada data di database. Ini adalah fondasi dari hampir semua aplikasi.

- **Create (Buat):** Menambahkan data baru. Perintah SQL-nya adalah `INSERT`.
- **Read (Baca):** Mengambil atau menampilkan data. Perintah SQL-nya adalah `SELECT`.
- **Update (Ubah):** Mengedit atau memperbarui data yang sudah ada. Perintah SQL-nya adalah `UPDATE`.
- **Delete (Hapus):** Menghapus data. Perintah SQL-nya adalah `DELETE`.

---

## Fungsi mysqli_prepare dan bind_param

Ini adalah dua fungsi inti untuk membuat **Prepared Statements** di PHP, yang merupakan cara paling aman untuk menjalankan query SQL dan mencegah **SQL Injection**.

1.  `mysqli_prepare($koneksi, $sql)`:

    - Fungsi ini "mempersiapkan" atau membuat "template" query SQL di server database.
    - Template ini menggunakan tanda tanya (`?`) sebagai placeholder untuk data yang akan dimasukkan nanti.
    - Contoh: `SELECT * FROM users WHERE username = ?`

2.  `mysqli_stmt_bind_param($stmt, $tipe, $var1, $var2, ...)`:
    - Fungsi ini "mengikat" variabel PHP ke placeholder (`?`) yang tadi sudah disiapkan.
    - `$tipe`: Mendefinisikan tipe data dari variabel (misal: `s` untuk string, `i` untuk integer, `d` untuk double).
    - Dengan memisahkan query dan data, database tidak akan salah mengartikan data (misal: `admin'--`) sebagai perintah SQL.

---

## Penggunaan Session & Cookie

Keduanya digunakan untuk menyimpan informasi tentang user, tapi lokasinya berbeda.

- **Cookie:**

  - **Disimpan di:** Browser client (komputer user).
  - **Data:** Potongan kecil teks (string).
  - **Contoh Penggunaan:** "Ingat Saya" (Remember Me) saat login, menyimpan preferensi bahasa, melacak iklan.
  - **Kelemahan:** Tidak aman untuk data sensitif karena bisa dibaca dan diubah oleh user.

- **Session (Sesi):**
  - **Disimpan di:** Server.
  - **Data:** Bisa menyimpan data kompleks (array, object).
  - **Cara Kerja:** Server membuat ID sesi yang unik (Session ID) dan menyimpannya di **cookie** user. Saat user kembali, browser mengirim Session ID itu, lalu server mencocokkannya untuk mengambil data sesi user.
  - **Contoh Penggunaan:** Menyimpan status "sudah login" (misal: `$_SESSION['user_id'] = 1`), menyimpan data keranjang belanja (cart).
  - **Kelebihan:** Jauh lebih aman untuk data sensitif.

---

## Validasi Input User

Validasi adalah proses memeriksa dan membersihkan data yang dikirim oleh user untuk memastikan data tersebut **aman**, **sesuai format**, dan **lengkap** sebelum diproses atau disimpan ke database.

- **Kenapa Penting?**

  1.  **Keamanan:** Mencegah serangan seperti SQL Injection dan XSS (Cross-Site Scripting).
  2.  **Integritas Data:** Memastikan data yang masuk akal (misal: `email` harus ada `@`, `umur` harus angka, `password` minimal 8 karakter).
  3.  **User Experience (UX):** Memberi tahu user jika ada kolom yang salah isi.

- **Jenis Validasi:**
  - **Client-Side:** Validasi di browser (pakai HTML `required` atau JavaScript). Cepat, tapi **tidak aman** karena bisa dilewati.
  - **Server-Side:** Validasi di backend (pakai PHP/Python/dll). Ini **wajib dilakukan** sebagai benteng pertahanan utama.

---

## Struktur MVC Sederhana

MVC (Model - View - Controller) adalah pola arsitektur untuk memisahkan logika aplikasi menjadi tiga bagian agar kode lebih rapi, terstruktur, dan mudah dikelola.

- **Model:**

  - "Otaknya" data.
  - Bertanggung jawab untuk semua interaksi dengan **database** (logika `INSERT`, `SELECT`, `UPDATE`, `DELETE`).
  - Dia tidak tahu menahu soal tampilan.

- **View:**

  - "Wajahnya" aplikasi.
  - Bertanggung jawab untuk **tampilan** (UI) yang dilihat user (HTML, CSS).
  - Tugasnya hanya menampilkan data yang diberikan oleh Controller.

- **Controller:**
  - "Jembatannya".
  - Menerima input/request dari user.
  - Memerintahkan **Model** untuk mengambil atau menyimpan data.
  - Mengirim data dari Model ke **View** untuk ditampilkan.

---

## Server-side dan Client-side

Ini adalah istilah yang menjelaskan **di mana** sebuah kode dieksekusi.

- **Client-Side (Sisi Klien):**

  - **Di mana:** Kode dieksekusi di **browser** milik user (misal: Chrome, Firefox).
  - **Teknologi:** HTML, CSS, JavaScript.
  - **Tugas:** Mengatur tampilan (UI), membuat animasi, validasi form secara instan, interaksi pengguna.

- **Server-Side (Sisi Server):**
  - **Di mana:** Kode dieksekusi di **server** (komputer di internet).
  - **Teknologi:** PHP, Python (Django/Flask), Node.js, Java, Ruby, dan Database (MySQL, PostgreSQL).
  - **Tugas:** Memproses logika bisnis, mengelola database, autentikasi (login/register), dan hal-hal yang berkaitan dengan keamanan.

---

## Pengertian require_once dan include

Keduanya adalah perintah di PHP untuk memasukkan isi dari satu file PHP ke dalam file PHP lainnya (misal: memasukkan `header.php` ke `index.php`).

- `include`: Jika file yang dipanggil **tidak ditemukan**, PHP akan memberi **Warning** (peringatan), tapi skrip akan **tetap berjalan**.
- `require`: Jika file yang dipanggil **tidak ditemukan**, PHP akan memberi **Fatal Error**, dan skrip akan **langsung berhenti**.

Akhiran `_once` (baik `include_once` maupun `require_once`) memastikan bahwa file tersebut hanya akan dimasukkan **satu kali** saja. Ini sangat penting untuk mencegah error akibat duplikasi fungsi atau variabel jika file dipanggil berkali-kali.

**Kapan pakainya?**

- Gunakan **require_once** untuk file-file krusial (koneksi database, fungsi inti).
- Gunakan **include_once** untuk file-file opsional (template, widget).

---

## Apa itu CSRF & SQL Injection

Ini adalah dua jenis serangan siber yang umum terjadi pada aplikasi web.

- **SQL Injection (SQLi):**

  - **Apa:** Serangan di mana hacker **menyisipkan perintah SQL** berbahaya ke dalam input (seperti form login atau search).
  - **Target:** **Database**.
  - **Tujuan:** Membaca data sensitif (password, data user), memodifikasi data, atau bahkan menghapus database.
  - **Pencegahan:** **Prepared Statements** (menggunakan `mysqli_prepare` dan `bind_param`).

- **CSRF (Cross-Site Request Forgery):**
  - **Apa:** Serangan yang "menumpang" sesi login seorang user. Hacker menipu browser user (yang sedang login di situs A) untuk mengirim request ke situs A **tanpa disadari** user tersebut.
  - **Target:** **Sesi login user**.
  - **Tujuan:** Melakukan aksi atas nama user (misal: transfer uang, hapus akun, ganti password).
  - **Pencegahan:** Menggunakan **Anti-CSRF Token** (token rahasia yang unik di setiap form, yang divalidasi oleh server).
