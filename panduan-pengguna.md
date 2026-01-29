# Panduan Pengguna

Panduan singkat penggunaan Aplikasi Penjualan Sawit (versi CI4)

## 1. Persyaratan
- PHP 8.1+ dengan ekstensi `pdo_sqlite` dan `sqlite3` terpasang.
- Composer terpasang untuk dependency.

## 2. Menjalankan aplikasi (lokal)
1. Pastikan file konfigurasi `.env` sudah mengarah ke SQLite: `database.default.DBDriver = SQLite3` dan `database.default.database` berisi path ke `writable/database.sqlite`.
2. Pastikan file database ada dan dapat ditulis:

```bash
touch writable/database.sqlite
chmod 664 writable/database.sqlite
```

3. Jalankan migrasi dan seed (sudah disediakan):

```bash
php spark migrate
php spark db:seed Users
php spark db:seed Petani
php spark db:seed Sawit
php spark db:seed Transaksi
```

4. Jalankan server built-in (opsional):

```bash
php spark serve
```

Lalu buka: `http://localhost:8080` atau `app.baseURL` di `.env`.

## 3. Kredensial awal
- Username: `admin`
- Password: `admin`

(Setelah login, ganti password jika perlu di implementasi yang sesuai.)

## 4. Navigasi utama
- Dashboard: ringkasan dan akses cepat.
- Data Petani: tambah / edit / hapus data petani.
- Data Sawit: tambah / edit / hapus jenis sawit dan harga.
- Transaksi: input transaksi penjualan (pilih petani + jenis sawit).
- Laporan: lihat rekap penjualan, filter tanggal, cetak.

## 5. Catatan teknis singkat
- Layout menggunakan Bootstrap 5 minimal.
- Database default dikonversi ke SQLite untuk pengembangan lokal.
- Jika perlu migrasi data dari MySQL, ekspor dan konversi dump MySQL ke SQLite atau gunakan script ETL.

## 6. Troubleshooting singkat
- `Unable to open database file`: periksa path di `.env` (gunakan path absolute) dan permission file `writable/database.sqlite`.
- Ekstensi SQLite tidak tersedia: install/aktifkan `pdo_sqlite` dan `sqlite3` pada PHP.

---
Terima kasih — hubungi tim pengembang untuk bantuan lebih lanjut.