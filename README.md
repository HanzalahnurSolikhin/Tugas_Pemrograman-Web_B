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
