# Product Requirements Document (PRD)
## Website Personal Profile, Hasil Kinerja, Berita & Kanal Aspirasi
### Banu Lesmana Bagaskara, S.M. — Anggota DPRD Kota Bogor (2024–2029)

---

## 1. Ringkasan Eksekutif & Latar Belakang

### 1.1 Visi Produk
Website resmi **Banu Lesmana Bagaskara, S.M.** dirancang sebagai kanal digital terpadu untuk:
1. **Transparansi Kinerja Kedewanan**: Mempublikasikan pertanggungjawaban publik, pokok-pokok pikiran (Pokir), advokasi anggaran, dan fungsi pengawasan di DPRD Kota Bogor (Komisi 1).
2. **Kanal Berita & Rilis Pers Resmi**: Menyajikan informasi terverifikasi seputar kegiatan reses, rapat kerja, dan advokasi kebijakan publik tanpa distorsi informasi.
3. **Pusat Dokumentasi & Galeri Kegiatan**: Mengarsipkan bukti visual interaksi nyata bersama warga di Daerah Pemilihan (Dapil) Kota Bogor 4 (Kecamatan Tanah Sareal).
4. **Rumah Aspirasi Rakyat Digital (Kotak Aspirasi)**: Memfasilitasi penerimaan keluhan, usulan lingkungan, dan permohonan layanan publik (seperti Ambulance Siaga 24 Jam dan NIB UMKM) dengan sistem penomoran tiket yang dapat dilacak.

### 1.2 Data Profil Terverifikasi (KPU & Goodkind)
Sesuai kepatuhan data faktual (tanpa data palsu):
- **Nama Resmi**: BANU LESMANA BAGASKARA, S.M.
- **Jabatan**: Anggota DPRD Kota Bogor Terpilih Periode 2024–2029
- **Partai Politik**: PDI Perjuangan (Nomor Urut 5)
- **Komisi**: Komisi 1 DPRD Kota Bogor
- **Daerah Pemilihan**: Kota Bogor 4 (Kecamatan Tanah Sareal)
- **Alamat Sekretariat**: Kelurahan Kedung Badak, Kecamatan Tanah Sareal, Kota Bogor, Jawa Barat
- **Slogan Gerakan**: *"Bogor Lebih Baik"*
- **Visi Utama**: *"Kota Bogor yang maju dan nyaman untuk semua"*
- **Sumber Utama**: `https://goodkind.id/profil/banu-lesmana-bagaskara-sm` (ID KPU: 176559)

---

## 2. Pengguna Sasaran & Persona

| Persona Pengguna | Profil & Kebutuhan Utama | Akses Sistem |
| :--- | :--- | :--- |
| **Warga Dapil 4 (Tanah Sareal)** | Warga yang membutuhkan bantuan layanan ambulance, advokasi drainase/PJU, bantuan legalitas UMKM, serta ingin memantau hasil kerja wakil rakyatnya. | **Publik** (Tanpa akun / registrasi) |
| **Masyarakat Umum & Pemilih** | Pemilih yang ingin mengenal rekam jejak, riwayat pendidikan, visi, 12 isu strategis, dan 6 program kerja Banu Bagaskara. | **Publik** (Tanpa akun / registrasi) |
| **Insan Pers & Media Massa** | Jurnalis yang mencari siaran pers resmi, foto resolusi tinggi berlisensi resmi, dan konfirmasi kebijakan. | **Publik** (Tanpa akun / registrasi) |
| **Administrator (Single Admin)** | Staf sekretariat / tim media kedewanan yang bertugas mengelola publikasi artikel, berita, album, mengolah aspirasi masuk, dan mengatur konten statis. | **Admin Dasbor** (Tepat 1 Akun Resmi Terenkripsi) |

---

## 3. Cakupan Fitur Halaman Publik (Frontend)

### 3.1 Halaman Beranda (`/` / `index.html`)
- **Hero Section**: Headline utama, deskripsi pengantar, foto portrait resolusi tinggi, tombol CTA Aspirasi & CTA Kinerja.
- **Banner Program Prioritas**: Penekanan visual layanan Ambulance Siaga 24 Jam & Pendamping Pasien ke RSUD Kota Bogor.
- **Sorotan Hasil Kinerja & Berita**: Tampilan artikel terkini dengan kartu terstruktur.
- **6 Program Unggulan**:
  1. *Rumah Aspirasi Rakyat*
  2. *Ambulance Siaga & Relawan Pendamping 24 Jam*
  3. *Mendorong E-Government & Transparansi APBD*
  4. *Wajib Belajar Anak Kota Bogor*
  5. *Kota Bogor Tanpa Tawuran*
  6. *Digitalisasi UMKM Berbasis RT/RW*
- **Kolase Foto Bento Grid**: Dokumentasi interaksi warga, advokasi, dan bakti sosial.
- **Pojok Kutipan & Aspirasi**: Pengantar pengaduan langsung ke Rumah Aspirasi.
- **Footer**: Kontak resmi, tautan navigasi, hak cipta, dan kanal medsos.

### 3.2 Halaman Kenali Saya / Profil (`/kenali` / `kenali.html`)
- **Hero Profil**: Identitas lengkap, daerah pemilihan, dan amanah kedewanan.
- **Visi & Misi**: Visi resmi dan poin misi pengabdian terstruktur.
- **Rekam Jejak**: Riwayat akademis (S1 Manajemen FEB) dan pengalaman organisasi.
- **12 Isu Penting Strategis**:
  1. *Infrastruktur & Drainase Bebas Genangan*
  2. *Penerangan Jalan Umum (PJU) Merata*
  3. *Layanan Kesehatan Cepat & Ambulance Gratis*
  4. *Wajib Belajar 12 Tahun & Bebas Ijazah Tertahan*
  5. *Penguatan Legalitas & Modal Usaha UMKM*
  6. *Kota Bogor Aman Tanpa Tawuran Remaja*
  7. *Transparansi APBD & Pokir Terbuka*
  8. *Pengelolaan Sampah Berbasis Lingkungan*
  9. *Ruang Terbuka Hijau & Sarana Publik Guyub*
  10. *Pelayanan Publik Digital & E-Government*
  11. *Perlindungan Sosial Lansia & Disabilitas*
  12. *Perubahan Iklim, Kelestarian SDA & SDG*
- **6 Program Fokus**: Deskripsi komprehensif rencana kerja dan target dampak.
- **Kolase Dokumentasi & Kutipan Integritas**: Statemen komitmen pengabdian.

### 3.3 Halaman Hasil Kinerja (`/kinerja` / `kinerja.html`)
- **Sorotan Laporan Kinerja Utama**: Banner laporan kinerja terpenting.
- **Katalog Laporan (Grid)**: Daftar kartu laporan dengan paginasi, tanggal, cover, dan ringkasan.
- **Halaman Baca Detail Kinerja (`/kinerja/{slug}`)**: Merender layout kanvas blok modular secara dinamis (Heading, Paragraf, Gambar & Caption, List, Grid 2-Kolom, Kutipan).

### 3.4 Halaman Berita & Rilis Pers (`/berita` / `berita.html`)
- **Sorotan Berita Utama (Featured News)**.
- **Katalog Berita**: Daftar berita dengan paginasi, tanggal rilis, cuplikan isi, dan label sumber.
- **Halaman Detail Berita (`/berita/{slug}`)**: Menampilkan artikel lengkap beserta tautan rujukan sumber eksternal / media massa.

### 3.5 Halaman Galeri Dokumentasi (`/galeri` / `galeri.html`)
- **Katalog Album Kegiatan**: Grid album dengan penanda jumlah foto dan tanggal acara.
- **Photo Theater Lightbox**: Penampil foto interaktif layar penuh dengan navigasi *Next/Prev*, thumbnail carousel, dan deskripsi foto.

### 3.6 Halaman Kontak & Kotak Aspirasi (`/kontak` / `kontak.html`)
- **Informasi Kontak Resmi**: Alamat Rumah Aspirasi di Kedung Badak, nomor telepon hotline, email resmi, dan tautan media sosial.
- **Formulir Pengaduan Warga**:
  - Input: Nama Lengkap, Nomor Telepon/WhatsApp, Alamat (RT/RW/Kelurahan), Subjek, dan Uraian Aspirasi.
  - Validasi ketat, perlindungan anti-spam (*Honeypot* & *Rate Limiting*).
  - Output: Penomoran tiket unik otomatis (`BLB-xxxxxx`) dan notifikasi konfirmasi.

---

## 4. Cakupan Fitur Dasbor Admin (Backend)

### 4.1 Ringkasan Dasbor (`/admin` / `dashboard.html`)
- Kartu metrik KPI (Total Aspirasi, Aspirasi Baru, Laporan Kinerja Terbit, Berita Terbit, Album Galeri).
- Status sistem & pintasan cepat (*Quick Actions*).
- Tabel 5 aspirasi terbaru dengan indikator status (*Baru, Ditinjau, Selesai*).
- Tab pengalihan pratinjau artikel kinerja dan rilis berita terkini.

### 4.2 Modul Hasil Kinerja (`/admin/kinerja` / `kinerja.html`)
- Daftar seluruh laporan kinerja dengan pencarian dan filter status (Terbit / Draf).
- **Editor Kanvas Blok Modular (WordPress/Gutenberg Style)**:
  - Blok Judul / Heading (H2, H3).
  - Blok Paragraf Teks.
  - Blok Gambar Tunggal beserta Keterangan (*Caption*).
  - Blok Daftar Poin (*Unordered / Ordered List*).
  - Blok Grid 2-Kolom (Kombinasi teks & perbandingan).
  - Blok Kutipan Pernyataan (*Blockquote*).
  - Fitur geser urutan (*Move Up / Move Down*) dan hapus blok.
- Pengaturan cover image, tanggal publikasi, dan ringkasan (*excerpt*).
- Pratinjau publik langsung (*Live Modal Preview*).

### 4.3 Modul Berita (`/admin/berita` / `berita.html`)
- Daftar artikel berita dengan pencarian, filter status, dan penanda *Featured*.
- Formulir input berita dengan 5 atribut wajib:
  1. **Judul Berita**
  2. **Tanggal Rilis**
  3. **Deskripsi / Isi Lengkap Berita**
  4. **Cover Image (Foto Utama)**
  5. **Sumber Berita (Nama Media / Portal Rilis)**
- Sakelar status Terbit/Draf dan sakelar Berita Utama (*Featured*).

### 4.4 Modul Galeri (`/admin/galeri` / `galeri.html`)
- Manajemen album: Tambah album baru, edit judul, tanggal, deskripsi, dan tentukan cover album.
- Manajemen foto di dalam album: Unggah foto, beri takarir (*caption*), hapus foto, dan pratinjau modal *photo theater*.

### 4.5 Modul Kotak Aspirasi (`/admin/aspirasi` / `aspirasi.html`)
- Tabel data aspirasi masuk dengan pencarian kata kunci dan nomor tiket `BLB-xxxxxx`.
- Filter status (*Semua, Baru, Ditinjau, Selesai*).
- Filter wilayah berdasarkan 11 kelurahan di Dapil Tanah Sareal (*Cibadak, Kayumanis, Kebonpedes, Kedungbadak, Kedungjaya, Kedungwaringin, Kencana, Mekarwangi, Sukadamai, Sukaresmi, Tanah Sareal*).
- Modal inspeksi detail pengaduan.
- Riwayat catatan tindak lanjut & disposisi internal staf dewan.
- Tombol integrasi percakapan WhatsApp langsung (*Click-to-Chat*) ke nomor pengirim dengan format pesan resmi otomatis.
- Fitur ekspor laporan aduan ke format CSV.

### 4.6 Modul Pengaturan Halaman Website (`/admin/pengaturan` / `pengaturan.html`)
- **Umum**: Judul website, slogan, identitas komisi & fraksi, alamat sekretariat, nomor hotline, email, dan akun medsos.
- **Halaman Beranda**: Hero section (teks, tombol, hero image), banner program ambulance, dan 4 slot kolase foto bento.
- **Halaman Profil**: Hero profil, Visi & Misi dinamis, riwayat pendidikan & organisasi, 12 Isu Penting, 6 Program Fokus, dan kutipan komitmen.
- **SEO**: Meta title, meta description, target keywords, canonical URL, tag Google Search Console, sakelar indexing, dan simulator tampilan Google SERP.

### 4.7 Otentikasi Administrator (`/admin/login` / `login.html`)
- Halaman masuk khusus satu akun administrator (*Single Admin Account*).
- Validasi ketat, proteksi *brute-force rate limiting*, enkripsi kata sandi kuat, dan switch tampilkan sandi.

---

## 5. Kebutuhan Non-Fungsional (Non-Functional Requirements)

1. **Performa & Kecepatan**:
   - Nilai Google Lighthouse Desktop & Mobile &ge; 90.
   - Waktu tanggap server (Time To First Byte - TTFB) &lt; 300ms pada koneksi normal.
   - Optimalisasi aset gambar (*lazy loading*, WebP modern format).
2. **Keamanan & Kepercayaan (Security & Trust)**:
   - Proteksi CSRF (*Cross-Site Request Forgery*) pada seluruh formulir.
   - Sanitasi input ketat terhadap serangan XSS (*Cross-Site Scripting*), terutama pada blok kanvas dinamis.
   - Pembatasan laju (*Rate Limiting*) pada pengiriman aspirasi publik (maksimal 3 pengiriman / 10 menit per IP) dan percobaan login admin (maksimal 5 percobaan / menit).
   - Enkripsi kata sandi menggunakan standar Bcrypt / Argon2id.
3. **Kualitas Salinan & Konten (Copywriting Integrity)**:
   - Seluruh konten profil, nomor dapil, riwayat pendidikan, dan program wajib sinkron dengan data faktual KPU & Goodkind. Dilarang memuat informasi fiktif.
4. **Aksesibilitas (Accessibility / a11y)**:
   - Standar kontras warna teks terhadap latar belakang memenuhi pedoman WCAG 2.1 Level AA.
   - Setiap gambar memiliki atribut `alt` deskriptif.
   - Elemen interaktif dapat dioperasikan penuh melalui navigasi keyboard.
5. **Optimasi Mesin Pencari (SEO)**:
   - Struktur meta data lengkap (Meta Title, Description, Canonical URL, OpenGraph Facebook, Twitter Card).
   - Penandaan data terstruktur Schema.org (JSON-LD) untuk entitas `Person`, `GovernmentOrganization`, `NewsArticle`, dan `BreadcrumbList`.
   - File `robots.txt` dan `sitemap.xml` otomatis.
