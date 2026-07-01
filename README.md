# Penugasan-Pertemuan-14-Laravel-Perpustakaan

* Nama : Muhammad Humam Sukma
* NIM : 60324087

## Screenshot Hasil

## 1. Fitur Pengembalian Buku

Implementasi fitur pengembalian buku pada halaman detail transaksi. Pada halaman ini terdapat tombol **Kembalikan Buku** yang digunakan untuk mengubah status transaksi dari `Dipinjam` menjadi `Dikembalikan`.

Fitur yang diterapkan:

* Menampilkan detail transaksi
* Menampilkan tombol **Kembalikan Buku**
<img width="959" height="433" alt="image" src="https://github.com/user-attachments/assets/eeb21912-ce34-46ca-aeb0-0e9e02148e25" />

* Menghitung denda keterlambatan sebesar Rp 5.000 per hari
* Menampilkan total denda pada halaman detail transaksi
* Menambahkan stok buku sebanyak 1 saat buku dikembalikan

<img width="1011" height="791" alt="Fitur Pengembalian Buku" src="LINK_GAMBAR_KAMU" />

---

## 2. Laporan Transaksi

Implementasi halaman laporan transaksi dengan filter. Halaman ini digunakan untuk menampilkan data transaksi peminjaman dan pengembalian buku berdasarkan kriteria tertentu.

Fitur yang diterapkan:

* Route laporan transaksi: `/transaksi/laporan`
* Filter berdasarkan range tanggal
* Filter berdasarkan status transaksi
* Filter berdasarkan anggota
* Menampilkan tabel transaksi
* Menampilkan total transaksi
* Menampilkan total denda
* Export laporan transaksi ke PDF

<img width="1011" height="791" alt="Laporan Transaksi" src="LINK_GAMBAR_KAMU" />

---

## 3. Notifikasi Terlambat

Implementasi fitur notifikasi untuk transaksi peminjaman buku yang terlambat dikembalikan. Fitur ini membantu menampilkan informasi keterlambatan pada dashboard, daftar transaksi, dan detail transaksi.

Fitur yang diterapkan:

* Dashboard widget **Buku Terlambat**
* Menampilkan jumlah transaksi yang terlambat
* Menampilkan list anggota yang terlambat mengembalikan buku
* Menambahkan badge **Terlambat** berwarna merah pada index transaksi
* Menampilkan jumlah hari keterlambatan
* Menampilkan warning pada detail transaksi jika sudah melewati tanggal kembali

<img width="1011" height="791" alt="Notifikasi Buku Terlambat" src="LINK_GAMBAR_KAMU" />

---

## File yang Diubah / Ditambahkan

* `routes/web.php`
* `app/Http/Controllers/TransaksiController.php`
* `app/Models/Transaksi.php`
* `resources/views/dashboard.blade.php`
* `resources/views/transaksi/index.blade.php`
* `resources/views/transaksi/show.blade.php`
* `resources/views/transaksi/laporan.blade.php`
* `resources/views/transaksi/laporan_pdf.blade.php`

---

## Package yang Digunakan

* `barryvdh/laravel-dompdf`

---

## Kesimpulan

Pada penugasan Pertemuan 14, sistem perpustakaan berhasil ditambahkan fitur pengembalian buku, laporan transaksi, dan notifikasi keterlambatan. Fitur pengembalian buku dapat menghitung denda keterlambatan dan menambahkan stok buku secara otomatis. Fitur laporan transaksi dapat menampilkan data transaksi berdasarkan filter tertentu dan dapat diexport ke PDF. Selain itu, sistem juga dapat menampilkan notifikasi buku terlambat pada dashboard, index transaksi, dan detail transaksi.
