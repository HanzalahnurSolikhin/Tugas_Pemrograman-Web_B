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

### 4.3 Second Normal Form (2NF)
Bentuk 2NF diperoleh setelah memenuhi 1NF dan menghilangkan
ketergantungan parsial (partial dependency).

Pada tabel 1NF, kunci utama sementara terdiri dari:

`NIM + ID Buku + Tanggal Peminjaman`

Beberapa atribut tidak bergantung pada seluruh kunci gabungan.

Contohnya:

- `Nama Mahasiswa` dan `Alamat` hanya bergantung pada `NIM`.
- `Judul Buku`, `Tahun Terbit`, dan `ID Penerbit` hanya bergantung
  pada `ID Buku`.
- `Tanggal Pengembalian` dan `Status` bergantung pada aktivitas
  peminjaman.

Karena terdapat atribut yang hanya bergantung pada sebagian kunci
gabungan, data tersebut dipisahkan menjadi beberapa tabel.

#### Tabel Mahasiswa

| NIM (PK) | Nama Mahasiswa | Alamat |
|---|---|---|
| D121241071 | Gabriel Tan | Makassar |

#### Tabel Buku

| ID Buku (PK) | Judul Buku | Tahun Terbit | ID Penerbit |
|---|---|---:|---|
| B001 | Pemrograman Web | 2026 | P001 |
| B002 | Basis Data | 2025 | P002 |

#### Tabel Peminjaman

| NIM (FK) | ID Buku (FK) | Tanggal Peminjaman | Tanggal Pengembalian | Status |
|---|---|---|---|---|
| D121241071 | B001 | 2026-09-01 | 2026-09-08 | Dikembalikan |
| D121241071 | B002 | 2026-09-02 | - | Dipinjam |

Pada tahap 2NF, data mahasiswa dan data buku tidak lagi diulang
pada setiap baris transaksi. Namun, data penerbit masih dapat
menimbulkan ketergantungan transitif melalui data buku.

### 4.4 Third Normal Form (3NF)

Bentuk 3NF diperoleh setelah memenuhi 2NF dan menghilangkan
ketergantungan transitif.

Pada tabel Buku, terdapat hubungan:

`ID Buku → ID Penerbit → Nama Penerbit`

Artinya, informasi penerbit tidak bergantung secara langsung pada
`ID Buku`, tetapi bergantung pada `ID Penerbit`.

Oleh karena itu, data penerbit dipisahkan menjadi tabel tersendiri.

#### Tabel Penerbit

| ID Penerbit (PK) | Nama Penerbit | Alamat Penerbit |
|---|---|---|
| P001 | Penerbit A | Jakarta |
| P002 | Penerbit B | Bandung |

#### Tabel Buku setelah 3NF

| ID Buku (PK) | Judul Buku | Tahun Terbit | ID Penerbit (FK) |
|---|---|---:|---|
| B001 | Pemrograman Web | 2026 | P001 |
| B002 | Basis Data | 2025 | P002 |

Dengan pemisahan tersebut, informasi penerbit hanya disimpan pada
tabel Penerbit. Tabel Buku cukup menyimpan `ID Penerbit` sebagai
foreign key.

Hasil normalisasi sampai 3NF menghasilkan empat tabel utama:

1. `mahasiswa`
2. `penerbit`
3. `buku`
4. `peminjaman`

Struktur tersebut mengurangi redundansi data dan menjaga hubungan
antarentitas melalui primary key dan foreign key.