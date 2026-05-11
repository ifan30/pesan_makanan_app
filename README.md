LAPORAN AKSES & SETUP PROYEK - APLIKASI PEMESANAN MAKANAN
---

HALAMAN 1: OVERVIEW & PERSYARATAN SISTEM

1.1 Deskripsi Proyek
**Aplikasi Pemesanan Makanan** adalah sistem web untuk memesan makanan cepat saji secara online.
- **Fungsi Utama:** Tambah pesanan → Checkout → Konfirmasi
- **Database:** MySQL (bawang_goreng)
- **Bahasa:** PHP, HTML, CSS
- **Status:** Fully Functional ✓

### 1.2 Menu Makanan Tersedia (7 Pilihan)
```
1. Ayam Geprek        5. Burger
2. Nasi Goreng        6. Pizza
3. Mie Ayam           7. Kentang Goreng
4. Bakso
```

### 1.3 Persyaratan Sistem (WAJIB DIPENUHI)

**Software yang Harus Diinstall:**
1.  **XAMPP** (Apache + PHP + MySQL)
   - Download: https://www.apachefriends.org/
   - Minimal versi: 7.4 ke atas
   
2.  **Web Browser** (Chrome/Firefox/Edge)
   
3.  **Text Editor** (VS Code/Notepad++)

**Spesifikasi Hardware Minimum:**
- RAM: 2 GB
- Storage: 500 MB
- Internet: Tidak perlu (local testing)

### 1.4 Struktur Folder Proyek
```
C:\xampp\htdocs\
└── pesan_makanan_app/
    ├── backend/
    │   ├── koneksi.php        → Database connection
    │   ├── pesanan.php        → Order logic
    │   ├── produk.php         → Menu data
    │   └── keranjang.php      → Cart management
    ├── frontend/
    │   ├── index.php          → Halaman utama
    │   ├── keranjang.php      → Lihat keranjang
    │   ├── chekout.php        → Checkout form
    │   ├── hapus.php          → Hapus pesanan
    │   ├── proses.php         → Process form
    │   ├── assets/style.css   → Styling
    │   └── view/              → Components
    └── README.md              → Dokumentasi ini
```

---

##  HALAMAN 2: PANDUAN INSTALASI LANGKAH DEMI LANGKAH

### 2.1 STEP 1: Download & Extract Proyek

**Option A - Jika sudah punya file proyek:**
```
1. Copy folder "pesan_makanan_app" 
2. Paste ke: C:\xampp\htdocs\
3. Verifikasi struktur folder sudah benar
```

**Option B - Jika clone dari repository:**
```bash
cd C:\xampp\htdocs\
git clone <url-repo> pesan_makanan_app
```

### 2.2 STEP 2: Install & Jalankan XAMPP

**Instalasi XAMPP:**
1. Download dari https://www.apachefriends.org/
2. Run installer (.exe)
3. Ikuti instalasi sampai selesai
4. Default path: `C:\xampp\`

**Jalankan XAMPP:**
1. Buka **XAMPP Control Panel**
2. Klik tombol **START** untuk:
   -  Apache
   -  MySQL
3. Status harus **GREEN** (running)

### 2.3 STEP 3: Setup Database

**Akses phpMyAdmin:**
1. Buka browser, ketik: `http://localhost/phpmyadmin`
2. Login (default: user=root, password=kosong)

**Buat Database Baru:**
1. Klik menu **"Databases"**
2. Isi nama: `bawang_goreng`
3. Klik **"Create"**

**Buat Tabel - COPY & PASTE Query di bawah:**

```sql
-- Tabel 1: Pesanan
CREATE TABLE pesanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    hp VARCHAR(15),
    produk VARCHAR(100),
    qty INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel 2: Produk
CREATE TABLE produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    harga DECIMAL(10,2),
    deskripsi TEXT
);

-- Tabel 3: Detail Pesanan
CREATE TABLE detail_pesanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_pesanan INT NOT NULL,
    id_produk INT NOT NULL,
    qty INT DEFAULT 1,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
    FOREIGN KEY (id_produk) REFERENCES produk(id)
);
```

**Cara eksekusi query:**
1. Klik database **"bawang_goreng"**
2. Klik tab **"SQL"**
3. Copy-paste kode di atas ke text area
4. Klik **"Go"** atau **"Execute"**
5. Verifikasi: Lihat 3 tabel sudah muncul ✓

### 2.4 STEP 4: Verifikasi Koneksi Database

**Edit file koneksi.php:**
1. Buka file: `C:\xampp\htdocs\pesan_makanan_app\backend\koneksi.php`
2. Pastikan isi seperti ini:
   ```php
   <?php
   $conn = new mysqli("localhost", "root", "", "bawang_goreng");
   if ($conn->connect_error) {
       die(" Koneksi gagal: " . $conn->connect_error);
   }
   echo "✓ Database terhubung!";
   ?>
   ```

### 2.5 STEP 5: Akses Aplikasi

**URL untuk mengakses:**
```
http://localhost/pesan_makanan_app/frontend/index.php
```

**Verifikasi akses berhasil:**
- Halaman load tanpa error
- Form "Tambah Order" muncul
- Menu dropdown menampilkan 7 pilihan makanan
- Tombol "Tambah Order" berfungsi

---

## HALAMAN 3: CARA PAKAI & TROUBLESHOOTING

### 3.1 Cara Menggunakan Aplikasi (5 Langkah Mudah)

**Langkah 1: Buka Aplikasi**
```
URL: http://localhost/pesan_makanan_app/frontend/index.php
```

**Langkah 2: Isi Form Pesanan**
- Nama Customer: Ketik nama (misal: "Budi")
- Menu Makanan: Pilih dari dropdown
- Jumlah (Qty): Ketik jumlah (misal: 2)

**Langkah 3: Klik "Tambah Order"**
- Pesanan otomatis tersimpan di database
- Halaman refresh, form kosong lagi

**Langkah 4: Lihat Daftar Pesanan**
- Tabel "Daftar Order" menampilkan semua pesanan
- Kolom: Nama | Menu | Qty | Tanggal | Aksi

**Langkah 5: Aksi Pesanan**
- **Checkout:** Isi data alamat & HP (jika ingin)
- **Hapus:** Klik tombol "Hapus" untuk menghapus pesanan

### 3.2 Troubleshooting - Solusi Masalah Umum

|  Masalah |  Solusi |
|-----------|---------|
| **XAMPP tidak bisa dijalankan** | Jalankan as Administrator |
| **MySQL tidak bisa start (Orange)** | Restart PC, atau buka Task Manager → kill "mysqld.exe" → restart XAMPP |
| **Apache error (Port 80)** | Port sudah terpakai, ubah di XAMPP config atau tutup aplikasi lain |
| **Database connection error** | Cek MySQL sudah running (GREEN), cek nama database "bawang_goreng" sudah buat |
| **404 Not Found (File not found)** | Cek path folder di htdocs, folder harus bernama "pesan_makanan_app" |
| **Halaman blank/error (500)** | Cek PHP syntax di file .php, lihat error di browser console (F12) |
| **Form tidak submit** | Cek method form POST/GET, verifikasi file "proses.php" ada |
| **Data tidak tersimpan** | Cek tabel pesanan sudah dibuat, lihat error di MySQL |

### 3.3 Testing Checklist

Sebelum memberikan akses ke orang lain, pastikan:

- [ ] Apache & MySQL running (GREEN di XAMPP)
- [ ] Database "bawang_goreng" sudah dibuat
- [ ] 3 tabel (pesanan, produk, detail_pesanan) sudah ada
- [ ] File koneksi.php sudah benar
- [ ] Aplikasi bisa diakses via `http://localhost/pesan_makanan_app/frontend/`
- [ ] Form bisa diisi dan submit
- [ ] Data tersimpan di database
- [ ] Menu dropdown menampilkan 7 pilihan
- [ ] Tombol "Hapus" bekerja
- [ ] Tidak ada error di console

### 3.4 Sharing Proyek ke Orang Lain

**Untuk orang lain bisa mengakses:**

1. **Jika 1 PC (Lokal):**
   - Mereka akses: `http://localhost/pesan_makanan_app/frontend/`
   - (Pastikan XAMPP running di PC tersebut)

2. **Jika Beda PC (Network):**
   - Cari IP address PC Anda: Buka CMD, ketik `ipconfig` → cari IPv4 Address (misal: 192.168.1.100)
   - Mereka akses: `http://192.168.1.100/pesan_makanan_app/frontend/`
   - Pastikan firewall mengizinkan akses port 80

3. **Jika Online (Internet):**
   - Upload ke hosting (cPanel, Hostinger, dll)
   - Share URL domain aplikasi
   - Setup SSL certificate untuk keamanan

### 3.5 File Penting untuk Orang Lain

**Berikan file-file ini:**
-  Folder lengkap "pesan_makanan_app"
-  File README.md (dokumentasi ini)
-  Script SQL untuk buat database
-  Panduan instalasi (instruksi langkah 2.1 - 2.5)

**Jangan lupa sampaikan:**
1. Install XAMPP dulu sebelum jalankan proyek
2. Buat database dengan nama "bawang_goreng"
3. Pastikan koneksi database benar
4. XAMPP harus running saat mengakses aplikasi

---

**RINGKASAN CHECKLIST AKSES:**
- ✓ XAMPP diinstall & running
- ✓ Database "bawang_goreng" + 3 tabel dibuat
- ✓ Folder proyek di C:\xampp\htdocs\
- ✓ Koneksi database OK
- ✓ Bisa akses: http://localhost/pesan_makanan_app/frontend/
- ✓ Form berfungsi, data tersimpan
- ✓ Siap dibagikan ke orang lain! 
