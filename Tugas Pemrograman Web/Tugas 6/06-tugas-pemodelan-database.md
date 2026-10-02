# Perancangan ERD E-Library Kampus

## 1. Skenario Sistem
E-Library Kampus merupakan sistem basis data yang digunakan untuk
mengelola data mahasiswa, buku, penerbit, serta transaksi peminjaman
dan pengembalian buku.

Sistem mencatat informasi mahasiswa yang melakukan peminjaman,
informasi buku yang tersedia, penerbit buku, serta riwayat transaksi
peminjaman dan pengembalian.

## 2. Entitas Utama
Sistem terdiri dari empat entitas utama:
1. Mahasiswa
2. Buku
3. Penerbit
4. Transaksi Peminjaman

### 2.1 Mahasiswa
Entitas Mahasiswa menyimpan informasi identitas mahasiswa yang dapat
melakukan peminjaman buku.

### 2.2 Buku
Entitas Buku menyimpan informasi mengenai buku yang tersedia pada
perpustakaan.

### 2.3 Penerbit
Entitas Penerbit menyimpan informasi mengenai pihak yang menerbitkan
buku.

### 2.4 Transaksi Peminjaman
Entitas Transaksi Peminjaman menyimpan riwayat peminjaman dan
pengembalian buku yang dilakukan oleh mahasiswa.

## 3. Tujuan Perancangan
Perancangan basis data ini bertujuan untuk menghasilkan struktur
database yang terorganisasi, mengurangi redundansi data, menjaga
integritas relasi antar tabel, serta memenuhi bentuk normal ketiga
(3NF).