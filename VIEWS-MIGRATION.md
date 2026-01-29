# Views Migration

Pemetaan file view dari folder `legacy_before_ci4` ke struktur `app/Views`:

- `legacy_before_ci4/app/Views/home/index.php` -> `app/Views/dashboard/index.php` (jumbotron modern)
- `legacy_before_ci4/app/Views/petani/*` -> `app/Views/petani/*` (list, create, edit)
- `legacy_before_ci4/app/Views/sawit/*` -> `app/Views/sawit/*` (list, create, edit)
- `legacy_before_ci4/app/Views/transaksi/*` -> `app/Views/transaksi/*` (create)
- `legacy_before_ci4/app/Views/laporan/index.php` -> `app/Views/laporan/index.php`
- `legacy_before_ci4/app/Views/layouts/header.php` & `footer.php` -> `app/Views/layouts/main.php`
- `legacy_before_ci4/app/Views/auth/*` -> `app/Views/auth/*`

Catatan:
- Semua view telah disederhanakan menggunakan Bootstrap 5.
- Komponen bersama (navbar, footer) berada di `app/Views/layouts/main.php`.
- Pastikan controller mengirim data yang diperlukan (mis. objek entitas vs array).
