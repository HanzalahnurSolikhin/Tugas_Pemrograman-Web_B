# Pemrograman Web

Repository ini berisi kumpulan tugas dan latihan yang dikerjakan selama mengikuti mata kuliah **Pemrograman Web Kelas B**.

## Identitas Mahasiswa

* **Nama:** Hanzalahnur Solikhin
* **NIM:** D121241110
* **Kelas:** B
* **Mata Kuliah:** Pemrograman Web
* **Universitas:** Universitas Hasanuddin

## Struktur Repository

```text
Tugas_Pemrograman-Web_B/
├── README.md
└── Tugas Pemrograman Web/
    ├── Tugas 1/
    │   └── 01-tugas-arsitektur-dan-semantik.html
    │
    ├── Tugas 2/
    │   ├── 02-tugas-standardisasi-konten.html
    │   └── aset/
    │       ├── Logo.png
    │       └── Metodologi.png
    │
    ├── Tugas 3/
    │   ├── 03-tugas-media-dan-css.html
    │   ├── 03-tugas-style.css
    │   └── aset/
    │       ├── Audio.mp3
    │       ├── Audio.ogg
    │       ├── Cover-desktop.webp
    │       ├── Cover-mobile.webp
    │       ├── Poster.jpg
    │       ├── Video.mp4
    │       └── Video.webm
    │
    ├── Tugas 4/
    │   ├── 04-tugas-tata-letak.html
    │   └── 04-tugas-style.css
    |
    ├── Tugas 5/
    |   ├── Transaction.php
    |   └── finance.php
    |
    └── tugas-portofolio/
        └── tugas-portofolio.html
```

Struktur folder akan diperbarui seiring dengan bertambahnya tugas dan materi yang diberikan selama perkuliahan.

---

## Tugas 1 — Arsitektur Web dan HTML Semantik

Tugas ini berfokus pada penyusunan halaman utama portal publikasi artikel ilmiah mahasiswa menggunakan struktur **HTML5 dan elemen semantik**. Halaman dirancang agar struktur kontennya jelas, mudah dipahami, serta dapat mendukung aksesibilitas dan pemahaman mesin pencari.

### Spesifikasi Tugas

* Menggunakan struktur HTML5 yang valid dan tidak memiliki error pada validator W3C.
* Menggunakan minimal satu elemen `header`, satu elemen `nav`, satu elemen `main`, tiga elemen `section`.
* Setiap `section` memiliki minimal dua elemen `article`.
* Menggunakan satu elemen `aside` yang berisi daftar jurnal eksternal.
* Menggunakan satu elemen `footer` yang berisi informasi lisensi Creative Commons dan kontak.
* Menggunakan entitas HTML untuk karakter-karakter khusus.
* Menggunakan atribut `rel` yang aman pada tautan eksternal, terutama ketika menggunakan `target="_blank"`, seperti `rel="noopener noreferrer"`.

### Berkas Tugas

Berkas utama tugas disimpan di dalam folder `Tugas 1` dengan nama:

```text
Tugas 1/
└── 01-tugas-arsitektur-dan-semantik.html

```

### Portofolio

Sebagai bagian dari latihan Pemrograman Web, terdapat halaman portofolio pribadi yang disimpan secara terpisah:

```text
tugas-portofolio/
└── tugas-portofolio.html

```

Pesan commit yang ditentukan untuk penyelesaian tugas adalah:

```text
Selesaikan Tugas Mandiri modul 1
```

## Tugas 2 — Standardisasi Konten Web

Tugas ini berfokus pada pembuatan halaman **daftar publikasi penelitian dosen Departemen Teknik Informatika Universitas Hasanuddin** dengan menerapkan struktur konten HTML5 yang terorganisasi dan sesuai standar.

### Spesifikasi Tugas

* Menggunakan struktur HTML5 yang valid.
* Menampilkan daftar publikasi dalam tabel dengan struktur kompleks.
* Menggunakan `thead`, `tbody`, `tfoot`, `colspan`, `rowspan`, dan `scope` pada tabel.
* Menampilkan bidang keahlian dosen menggunakan ordered list dan unordered list bersarang.
* Menggunakan `figure` dan `figcaption` untuk menampilkan diagram metodologi penelitian.
* Menggunakan entitas karakter khusus dalam halaman.
* Menyertakan logo Universitas Hasanuddin.
* Menyertakan tautan menuju sumber publikasi dan daftar dosen resmi Teknik Informatika Universitas Hasanuddin.

## Berkas Tugas

Berkas utama dan aset pendukung `Tugas 2` disimpan dalam:

```text
Tugas 2/
├── 02-tugas-standardisasi-konten.html
└── aset/
    ├── Logo.png
    └── Metodologi.png
```

Pesan commit yang digunakan untuk penyelesaian tugas adalah:

```text
Selesaikan Tugas Mandiri modul 2
```

## Tugas 3 — Rekayasa Media Digital dan Dasar-Dasar CSS

Tugas ini berfokus pada pembuatan **pemutar media kuliah responsif** untuk kebutuhan pembelajaran berbasis web. Halaman dirancang dalam bentuk card multimedia yang memuat cover materi, video pembelajaran, ringkasan materi, serta alternatif pembelajaran dalam bentuk audio dengan menerapkan konsep **HTML5 multimedia, responsive images, CSS, dan metodologi BEM**.

### Spesifikasi Tugas

* Menggunakan reset global CSS dengan `box-sizing: border-box`.
* Menggunakan elemen `picture` untuk menyediakan gambar responsif.
* Menyediakan minimal dua sumber gambar berformat WebP yang dibedakan berdasarkan ukuran layar menggunakan media query.
* Menggunakan elemen `video` dengan poster sebagai tampilan awal pemutar video.
* Menyediakan minimal dua format video sebagai fallback, yaitu WebM dan MP4.
* Menggunakan elemen `audio` sebagai alternatif pembelajaran.
* Menyediakan minimal dua format audio sebagai fallback, yaitu OGG dan MP3.
* Menerapkan metodologi **BEM (Block, Element, Modifier)** dalam penamaan class CSS.
* Membuat card dengan posisi terpusat, sudut membulat, bayangan, dan efek hover menggunakan `transition`.
* Mendemonstrasikan konsep **CSS specificity** dengan memberikan style khusus pada card yang memiliki class tambahan.
* Menambahkan ringkasan materi untuk memberikan informasi singkat mengenai isi video pembelajaran.
* Menyertakan sumber media dan informasi penggunaan media pada bagian footer.

## Berkas Tugas

Berkas utama, stylesheet, dan aset pendukung `Tugas 3` disimpan dalam:

```text
Tugas 3/
├── 03-tugas-media-dan-css.html
├── 03-tugas-style.css
└── aset/
    ├── Audio.mp3
    ├── Audio.ogg
    ├── Cover-desktop.webp
    ├── Cover-mobile.webp
    ├── Poster.jpg
    ├── Video.mp4
    └── Video.webm
```

### Konsep yang Diterapkan

Tugas ini menerapkan beberapa konsep dasar dalam rekayasa media digital dan CSS, yaitu:

- HTML5 multimedia menggunakan `video` dan `audio`.
- Responsive images menggunakan `picture` dan media query.
- Fallback media untuk meningkatkan kompatibilitas browser.
- CSS reset dan konsep `box-sizing`.
- CSS cascading dan specificity.
- Box model.
- Metodologi BEM dalam penamaan class.
- Efek hover dan transition pada komponen card.

### Sumber Media

Video pembelajaran yang digunakan berasal dari sumber eksternal YouTube. Tautan sumber dicantumkan pada halaman sebagai referensi media yang digunakan dalam tugas untuk keperluan pembelajaran.

Pesan commit yang digunakan untuk penyelesaian tugas adalah:

```text
Selesaikan Tugas Mandiri modul 3
```

## Tugas 4 — Layout CSS dan Bootstrap

Tugas ini berfokus pada pembuatan **Portal Akademik** untuk kebutuhan
pembelajaran berbasis web. Halaman dirancang dalam bentuk dashboard
akademik yang memuat navigasi, informasi mahasiswa, informasi akademik,
serta beberapa kartu informasi akademik dengan menerapkan konsep
**Flexbox, CSS Grid, Responsive Design, dan Bootstrap 5**.

### Spesifikasi Tugas

* Menggunakan **Flexbox** untuk mengatur navigasi utama pada bagian header.
* Menggunakan **CSS Grid** untuk menyusun layout dashboard akademik.
* Menerapkan layout tiga kolom pada layar desktop yang terdiri dari
  informasi mahasiswa, konten akademik, dan informasi akademik.
* Menggunakan **Bootstrap 5** melalui CDN untuk menerapkan komponen
  dan utility pada kartu akademik.
* Membuat beberapa kartu informasi akademik seperti IPK, total SKS,
  dan status UKT.
* Menerapkan responsive design menggunakan media query agar tampilan
  dapat menyesuaikan ukuran layar.
* Mengubah susunan navigasi menjadi vertikal pada ukuran layar yang lebih kecil.
* Menambahkan efek **hover** dan **active state** pada menu navigasi.
* Membuat kartu akademik dengan sudut membulat, bayangan, dan efek
  transisi saat pengguna mengarahkan kursor.
* Menggunakan `box-sizing: border-box` sebagai bagian dari reset CSS global.

### Konsep yang Diterapkan

Tugas ini menerapkan beberapa konsep dasar dalam layout CSS dan
pengembangan antarmuka web, yaitu:

- CSS Flexbox untuk navigasi.
- CSS Grid untuk layout dashboard.
- Responsive Web Design.
- Media Query.
- CSS Box Model.
- CSS `box-sizing`.
- CSS Hover dan Active State.
- CSS Transition.
- Bootstrap 5.
- Bootstrap Card dan Button.
- Layout responsif pada perangkat desktop, tablet, dan mobile.

### Berkas Tugas

Berkas utama dan stylesheet `Tugas 4` disimpan dalam:

```text
Tugas 4/

├── 04-tugas-tata-letak.html
└── 04-tugas-style.css
```

### Tampilan Portal

Portal Akademik terdiri dari beberapa bagian utama:

- Header dan navigasi utama.
- Informasi mahasiswa.
- Informasi dan sambutan portal akademik.
- Kartu Indeks Prestasi Kumulatif.
- Kartu Total SKS yang Diambil.
- Kartu Status UKT.
- Informasi akademik tambahan.

Pesan commit yang digunakan untuk penyelesaian tugas adalah:

```text
Selesaikan Tugas Mandiri modul 4
```

## Tugas 5 — Sistem Manajemen Keuangan Sederhana

Tugas ini berfokus pada penerapan **PHP server-side** untuk membuat
prototype sistem manajemen keuangan sederhana. Sistem dapat
memproses transaksi deposit dan penarikan, menghitung saldo,
menampilkan riwayat transaksi, serta menerapkan validasi dan
keamanan pada form.

### Spesifikasi Tugas

* Menggunakan `declare(strict_types=1)` untuk menerapkan strict typing.
* Membuat class `Transaction` dengan atribut private:
  `id`, `type`, dan `amount`.
* Menggunakan constructor property promotion pada class `Transaction`.
* Membuat method `process()` untuk memproses transaksi.
* Menggunakan `match` untuk menentukan jenis transaksi.
* Menambahkan saldo ketika transaksi berupa deposit.
* Menolak penarikan apabila jumlah transaksi melebihi saldo.
* Menggunakan session untuk menyimpan saldo, token CSRF,
  dan riwayat transaksi.
* Melakukan validasi jenis transaksi dan jumlah transaksi.
* Memastikan jumlah transaksi bernilai positif.
* Menggunakan token CSRF pada form dan melakukan verifikasi
  menggunakan `hash_equals()`.
* Menggunakan `htmlspecialchars()` ketika menampilkan data
  transaksi ke halaman.
* Menampilkan saldo dan riwayat transaksi kepada pengguna.
* Menyediakan fitur reset untuk menghapus saldo dan riwayat transaksi.

### Konsep yang Diterapkan

- PHP Strict Types.
- Object-Oriented Programming.
- Encapsulation dengan property `private`.
- Constructor Property Promotion.
- `match expression`.
- PHP Session.
- Form Processing dengan `POST`.
- Validasi input.
- CSRF Protection.
- XSS Prevention.
- `htmlspecialchars()`.
- Riwayat transaksi berbasis session.

### Berkas Tugas

Berkas utama dan stylesheet `Tugas 5` disimpan dalam:

```text
Tugas 5/
├── Transaction.php
└── finance.php
```

### Alur Sistem

- Pengguna memilih jenis transaksi.
- Pengguna memasukkan jumlah transaksi dalam satuan ribuan rupiah.
- Sistem memvalidasi input.
- Sistem memeriksa token CSRF.
- Objek Transaction dibuat.
- Method process() memproses transaksi.
- Saldo diperbarui apabila transaksi berhasil.
- Transaksi berhasil disimpan ke riwayat.
- Saldo dan riwayat ditampilkan secara aman.
- Pengguna dapat mereset saldo dan riwayat transaksi.

Pesan commit yang digunakan untuk penyelesaian tugas adalah:
```text
Selesaikan Tugas Mandiri modul 5
```