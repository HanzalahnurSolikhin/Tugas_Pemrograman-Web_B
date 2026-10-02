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

## 4. Simulasi Normalisasi Data
Normalisasi dilakukan secara bertahap mulai dari Unnormalized Form
(UNF), First Normal Form (1NF), Second Normal Form (2NF), hingga
Third Normal Form (3NF).

### 4.1 Unnormalized Form (UNF)
Pada bentuk UNF, data mahasiswa dan peminjaman masih dapat memiliki
kelompok data buku yang berulang dalam satu record.

Contoh struktur data awal:

| NIM | Nama Mahasiswa | Alamat | Data Buku yang Dipinjam |
|---|---|---|---|
| D121241110 | Hanzalahnur Solikhin | Gowa | B001 - Pemrograman Web - Penerbit A; B002 - Basis Data - Penerbit B |

Pada contoh tersebut, kolom `Data Buku yang Dipinjam` memiliki lebih
dari satu kelompok informasi buku dalam satu kolom. Kondisi tersebut
belum memenuhi prinsip atomic value pada 1NF.

Masalah pada bentuk UNF:
- Satu kolom dapat menyimpan beberapa data buku.
- Informasi buku masih bercampur dengan informasi mahasiswa.
- Data penerbit masih berada di dalam informasi buku.
- Struktur data sulit digunakan untuk proses pencarian dan pengolahan
  data secara terstruktur.

### 4.2 First Normal Form (1NF)

Untuk mencapai 1NF, setiap nilai harus dibuat atomic dan setiap
peminjaman buku ditempatkan pada baris yang berbeda.

Hasil perubahan dari UNF menjadi 1NF:

| NIM | Nama Mahasiswa | Alamat | ID Buku | Judul Buku | Tahun Terbit | ID Penerbit | Nama Penerbit | Tanggal Peminjaman | Tanggal Pengembalian | Status |
|---|---|---|---|---|---:|---|---|---|---|---|
| D121241110 | Hanzalahnur Solikhin | Gowa | B001 | Pemrograman Web | 2026 | P001 | Penerbit A | 2026-09-01 | 2026-09-08 | Dikembalikan |
| D121241110 | Hanzalahnur Solikhin | Gowa | B002 | Basis Data | 2025 | P002 | Penerbit B | 2026-09-02 | - | Dipinjam |

Pada bentuk 1NF, setiap kolom sudah berisi satu nilai dan tidak ada
lagi kelompok buku yang berulang dalam satu kolom.

Untuk latihan normalisasi, kunci utama sementara dapat menggunakan
gabungan:

`NIM + ID Buku + Tanggal Peminjaman`

Kunci gabungan tersebut membedakan setiap aktivitas peminjaman
mahasiswa terhadap sebuah buku pada waktu tertentu.

Namun, masih terdapat redundansi data. Contohnya, `Nama Mahasiswa`
dan `Alamat` akan berulang ketika mahasiswa yang sama melakukan
peminjaman buku lain. Informasi buku dan penerbit juga dapat berulang
pada transaksi yang berbeda.

Kondisi tersebut akan diperbaiki pada tahap 2NF dan 3NF.

