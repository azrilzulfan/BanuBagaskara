# Product Requirements Document (PRD)
## Website Personal Profile, Hasil Kinerja, Berita & Kanal Aspirasi
### Banu Lesmana Bagaskara, S.M. — Anggota DPRD Kota Bogor (2024–2029)

---

## 1. Ringkasan Eksekutif & Latar Belakang

### 1.1 Visi Produk
Website resmi **Banu Lesmana Bagaskara, S.M.** dirancang sebagai kanal digital terpadu untuk:
1. **Transparansi Kinerja Kedewanan**: Mempublikasikan pertanggungjawaban publik, pokok-pokok pikiran (Pokir), advokasi anggaran, dan fungsi pengawasan di DPRD Kota Bogor (Komisi 1).
2. **Kanal Berita & Rilis Pers Resmi**: Menyajikan rilis berita dan tautan siaran pers terverifikasi seputar kegiatan reses, rapat kerja, dan advokasi kebijakan publik tanpa distorsi informasi.
3. **Pusat Dokumentasi & Galeri Kegiatan**: Mengarsipkan bukti visual interaksi nyata bersama warga di Daerah Pemilihan (Dapil) Kota Bogor 4 (Kecamatan Tanah Sareal).
4. **Rumah Aspirasi Rakyat Digital (Kotak Aspirasi)**: Memfasilitasi penerimaan keluhan, usulan lingkungan, dan permohonan layanan publik (seperti Ambulance Siaga 24 Jam dan NIB UMKM) dengan sistem penomoran tiket yang dapat dilacak.

### 1.2 Data Profil Terverifikasi (KPU & Goodkind)
Sesuai kepatuhan data faktual (tanpa data palsu):
- **Nama Resmi**: BANU LESMANA BAGASKARA, S.M.
- **Jabatan**: Anggota DPRD Kota Bogor Terpilih Periode 2024–2029
- **Partai Politik**: PDI Perjuangan (Nomor Urut 5)
- **Komisi**: Komisi 1 DPRD Kota Bogor
- **Daerah Pemilihan**: Kota Bogor 4 (Kecamatan Tanah Sareal, mencakup 11 kelurahan: *Cibadak, Kayumanis, Kebonpedes, Kedungbadak, Kedungjaya, Kedungwaringin, Kencana, Mekarwangi, Sukadamai, Sukaresmi, Tanah Sareal*)
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
| **Insan Pers & Media Massa** | Jurnalis yang mencari siaran pers resmi, liputan media eksternal terpercaya, dan konfirmasi kebijakan. | **Publik** (Tanpa akun / registrasi) |
| **Administrator (Single Admin)** | Staf sekretariat / tim media kedewanan yang bertugas mengelola publikasi artikel, berita, album, mengolah aspirasi masuk, dan mengatur konten statis. | **Admin Dasbor** (Tepat 1 Akun Resmi Terenkripsi) |

---

## 3. Cakupan Fitur Halaman Publik (Frontend)

### 3.1 Halaman Beranda (`/` / `home.blade.php`)
- **Hero Section**: Headline utama dan deskripsi pengantar yang dikelola dinamis, foto portrait hero resolusi tinggi (hasil unggah berkas langsung), serta tombol navigasi CTA. Tanpa badge/label atas dan tombol sekunder tambahan agar tampilan bersih dan fokus.
- **Banner Program Prioritas**: Penekanan visual layanan Ambulance Siaga 24 Jam & Pendamping Pasien ke RSUD Kota Bogor dengan foto banner yang dapat diunggah langsung.
- **Sorotan Hasil Kinerja & Berita**: Tampilan artikel terkini dengan kartu terstruktur, di mana artikel berstatus *Featured* menempati posisi sorotan utama.
- **6 Program Unggulan**: Terhubung dan tersinkronisasi secara otomatis dengan 6 Program Fokus pada Halaman Profil:
  1. *Rumah Aspirasi Rakyat*
  2. *Ambulance Siaga & Relawan Pendamping 24 Jam*
  3. *Mendorong E-Government & Transparansi APBD*
  4. *Wajib Belajar Anak Kota Bogor*
  5. *Kota Bogor Tanpa Tawuran*
  6. *Digitalisasi UMKM Berbasis RT/RW*
- **Kolase Foto Bento Grid**: Dokumentasi interaksi warga, advokasi, dan bakti sosial yang gambarnya diunggah langsung via admin (tanpa opsi select preset).
- **Testimoni Warga**: Slider/grid testimoni dinamis dari tokoh dan warga masyarakat (nama, peran, pesan testimoni, dan foto profil/avatar) yang dikelola penuh melalui admin.
- **Footer**: Identitas resmi, logo dan favicon dinamis, kontak sekretariat di Kedung Badak, navigasi cepat, dan tautan media sosial.

### 3.2 Halaman Kenali Saya / Profil (`/kenali` / `kenali.html`)
- **Hero Profil**: Identitas lengkap, daerah pemilihan, dan amanah kedewanan dengan foto portrait hero dan kolase dokumentasi dinamis tanpa judul header tambahan yang redundan.
- **Visi & Misi**: Visi resmi dan poin misi pengabdian terstruktur.
- **Kutipan Resmi Komitmen**: Kutipan integritas resmi Banu Lesmana Bagaskara, S.M. lengkap dengan foto tanda tangan digital autentik yang dikelola via admin.
- **Rekam Jejak Pengalaman & Pendidikan**: Daftar linimasa pengalaman organisasi dan riwayat pendidikan yang dinamis (dapat ditambah, diedit, dan dikurangi via admin).
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
- **6 Program Fokus**: Deskripsi rencana kerja dan target dampak yang terhubung sinkron dengan Beranda.

### 3.3 Halaman Hasil Kinerja (`/kinerja` / `kinerja.html`)
- **Sorotan Laporan Kinerja Utama**: Banner tepat 1 laporan kinerja unggulan (*single featured report*) terpilih secara atomik.
- **Katalog Laporan (Grid)**: Daftar kartu laporan dengan paginasi, tanggal, cover image, dan ringkasan (*excerpt*).
- **Halaman Baca Detail Kinerja (`/kinerja/{slug}`)**: Merender layout kanvas blok modular secara dinamis dengan 10 jenis blok:
  1. *Heading (H2, H3)*
  2. *Paragraf (Rich Text formatting dengan sanitasi HTML)*
  3. *Gambar & Keterangan (Direct upload & caption)*
  4. *Daftar Poin (Bullet / Numbered List)*
  5. *Kutipan Pernyataan (Blockquote & Author)*
  6. *Metrik Statistik (Angka, Label, & Keterangan)*
  7. *Lampiran Dokumen (Nama Berkas, Ukuran, & Link Unduh)*
  8. *Tabel Data (Header & Baris Data Dinamis)*
  9. *Kotak Sorotan / Callout (Info, Warning, Success, Alert)*
  10. *Nested Grid Container (Kontainer blok berulang yang menampung blok anak di dalamnya)*

### 3.4 Halaman Berita & Rilis Pers (`/berita` / `berita.html`)
- **Sorotan Berita Utama**: Banner tepat 1 berita utama (*single featured news*) terverifikasi.
- **Katalog Berita**: Daftar berita dengan paginasi, tanggal rilis, cuplikan ringkasan isi, cover image hasil unggah, dan label sumber.
- **Aksi Langsung ke Sumber Berita (External Redirect)**: Tidak ada halaman detail artikel internal lokal. Seluruh kartu rilis berita langsung mengarahkan pengunjung ke tautan rujukan resmi eksternal (`source_url`) saat diklik. Jika rute internal `/berita/{slug}` diakses langsung, sistem secara otomatis melakukan redirect HTTP 302 ke `source_url`.

### 3.5 Halaman Galeri Dokumentasi (`/galeri` / `galeri.html`)
- **Katalog Album Kegiatan**: Grid album dengan penanda jumlah foto dan tanggal acara.
- **Manajemen Gambar Mandiri**: Seluruh cover album dan foto dokumentasi diunggah langsung (direct file upload) tanpa opsi select preset gambar.
- **Photo Theater Lightbox**: Penampil foto interaktif layar penuh dengan navigasi *Next/Prev*, thumbnail carousel, dan deskripsi foto.

### 3.6 Halaman Kontak & Kotak Aspirasi (`/kontak` / `kontak.html`)
- **Informasi Kontak Resmi**: Alamat Rumah Aspirasi di Kedung Badak, nomor hotline WhatsApp, email resmi, dan media sosial.
- **Formulir Pengaduan Warga**:
  - Input: Nama Lengkap, Nomor Telepon/WhatsApp, Alamat Lengkap, Subjek, dan Uraian Aspirasi.
  - Validasi ketat, perlindungan anti-spam (*Honeypot* & *Rate Limiting*).
  - Output: Penomoran tiket unik otomatis (`BLB-xxxxxx`) dan notifikasi konfirmasi sukses.

---

## 4. Cakupan Fitur Dasbor Admin (Backend)

### 4.1 Ringkasan Dasbor (`/admin` / `dashboard.html`)
- Kartu metrik KPI (Total Aspirasi, Laporan Kinerja Terbit, Berita Terbit, Album Galeri).
- Status sistem & pintasan cepat (*Quick Actions*).
- Tabel aspirasi terbaru dengan aksi langsung untuk melihat detail dan menghubungi warga via WhatsApp.
- Tab pengalihan pratinjau artikel kinerja dan rilis berita terkini.

### 4.2 Modul Hasil Kinerja (`/admin/kinerja` / `kinerja.html`)
- **Single Featured Logic**: Sorotan Utama (*Featured*) strictly hanya bisa tepat 1 artikel. Mengaktifkan featured pada suatu artikel akan otomatis mematikan status featured artikel lainnya secara atomik.
- **Direct File Upload**: Seluruh gambar (cover artikel dan blok gambar di kanvas editor) menggunakan unggah berkas langsung, seluruh opsi select preset dihapus.
- **Editor Kanvas Blok Modular (10 Blok Lengkap)**:
  1. *Heading*: Pilihan H2 / H3.
  2. *Paragraf*: Dilengkapi Rich Text Editor (formatting toolbar: bold, italic, underline, strikethrough, headings, unordered/ordered list, blockquote, link, horizontal rule) dengan sanitasi HTML.
  3. *Gambar*: Unggah berkas langsung, input teks keterangan (*caption*), dan rasio aspek.
  4. *Daftar Poin*: Tambah/kurang butir item daftar dinamis.
  5. *Kutipan*: Teks kutipan dan nama tokoh.
  6. *Metrik Statistik*: Angka nilai metrik (misal: "1.200+", "100%"), label nama capaian, dan deskripsi singkat.
  7. *Lampiran Dokumen*: Unggah berkas dokumen (PDF/DOCX), nama file, ukuran, dan deskripsi.
  8. *Tabel Data*: Tambah kolom dan baris dinamis untuk tabel perbandingan atau statistik.
  9. *Kotak Sorotan (Callout)*: Kotak sorotan berbingkai tebal dengan pilihan varian (*info, success, warning, alert*).
  10. *Nested Grid Container*: Blok kontainer multi-kolom yang dapat memuat blok anak di dalamnya.
- Fitur geser urutan (*Move Up / Move Down*) dan hapus blok.
- Pratinjau publik langsung (*Live Modal Preview*).

### 4.3 Modul Berita (`/admin/berita` / `berita.html`)
- **Single Featured Logic**: Sorotan Utama (*Featured*) strictly hanya bisa tepat 1 artikel.
- **Direct File Upload**: Unggah berkas langsung untuk cover image, opsi select preset dihapus.
- **Tautan / URL Sumber Wajib (`source_url`)**: Input form mewajibkan URL rujukan berita asli (`http://` atau `https://`). Input teks nama sumber berita dihapus dari form.
- **Tanpa Detail Lokal**: Berita berfungsi sebagai agregator rilis pers terverifikasi yang langsung menghubungkan pengunjung ke sumber liputan media luar.

### 4.4 Modul Galeri (`/admin/galeri` / `galeri.html`)
- **Direct File Upload Penuh**: Hapus seluruh opsi select gambar preset dan array pilihan bawaan.
- **Manajemen Sampul Album**: Unggah gambar sampul album langsung, atau pilih salah satu foto yang ada di album lalu klik "Jadikan Sampul".
- **Manajemen Foto Album**: Unggah foto tunggal maupun banyak foto sekaligus (*multi-upload* / *batch upload*), beri keterangan (*caption*), atur urutan, dan hapus foto.

### 4.5 Modul Kotak Aspirasi (`/admin/aspirasi` / `aspirasi.html`)
- **Antarmuka Admin Ramping & Fokus**: Elemen kelurahan, kategori topik, dan status penanganan dihapus dari antarmuka admin (tabel, kartu KPI, filter, dan modal detail).
- **Peniadaan Seksi Tindak Lanjut Staf**: Formulir catatan internal staf dan riwayat disposisi ditiadakan untuk efisiensi respon langsung.
- **Aksi Admin Terbatas & Efektif**:
  1. **Melihat**: Modal inspeksi read-only untuk membaca identitas warga, nomor kontak, alamat, dan pesan aspirasi secara lengkap.
  2. **Menghubungi via WhatsApp**: Tombol satu klik (*Click-to-Chat*) langsung membuka `https://wa.me/62...` dengan sapaan resmi dan konteks aduan warga.
  3. **Menghapus**: Menghapus aspirasi secara individual atau massal (*bulk delete*).
- **Ekspor CSV**: Mengunduh rekapitulasi data aduan warga (ID, Tiket, Nama, WhatsApp, Alamat, Subjek, Uraian, Tanggal) ke berkas `.csv`.

### 4.6 Modul Pengaturan Halaman Website (`/admin/pengaturan` / `pengaturan.html`)
1. **Informasi Umum & Kontak**:
   - Judul situs, slogan, identitas komisi & fraksi dewan, alamat sekretariat, nomor hotline, email, dan akun media sosial.
   - **Upload Logo & Icon (Favicon)**: Fitur unggah file langsung untuk logo header/footer dan ikon browser (favicon).
2. **Halaman Beranda**:
   - Headline hero dan teks deskripsi (tanpa badge atas & tombol utama).
   - Unggah file langsung untuk Foto Hero Portrait, Banner Ambulance Siaga, dan 4 slot Kolase Foto Bento.
   - **Kelola Testimoni Dinamis**: Tambah, edit, dan hapus testimoni warga lengkap dengan unggah foto avatar tanpa opsi select preset.
   - **Sinkronisasi 6 Program**: Program unggulan beranda terhubung otomatis dengan program pada halaman profil.
3. **Halaman Profil (Kenali Saya)**:
   - Unggah file langsung untuk Foto Hero Profil dan Kolase Foto Profil (tanpa opsi select preset).
   - Peniadaan judul header profil dan kutipan lama yang redundan.
   - **Kelola Kutipan Resmi Banu Lesmana Bagaskara, S.M.**: Pernyataan integritas dan unggah foto tanda tangan digital resmi.
   - **Kelola Rekam Jejak Dinamis**: Tambah, edit, dan hapus riwayat pendidikan dan pengalaman organisasi secara fleksibel.
4. **Pengaturan SEO**:
   - Meta title, meta description, keywords, canonical URL, Google Search Console verification tag, sakelar indexing bot, dan simulator pratinjau SERP Google.

### 4.7 Otentikasi Administrator (`/admin/login` / `login.html`)
- Halaman masuk khusus satu akun administrator (*Single Admin Account*).
- Validasi ketat, proteksi *brute-force rate limiting* (maksimal 5 percobaan/menit), enkripsi kata sandi kuat, dan switch tampilkan sandi.

---

## 5. Kebutuhan Non-Fungsional (Non-Functional Requirements)

1. **Performa & Kecepatan**:
   - Nilai Google Lighthouse Desktop & Mobile &ge; 90.
   - Waktu tanggap server (Time To First Byte - TTFB) &lt; 300ms pada koneksi normal.
   - Penanganan aset modern lokal via Vite, Tailwind CSS v4 `@theme`, dan optimasi penyimpanan gambar (*storage symlink*).
2. **Keamanan & Kepercayaan (Security & Trust)**:
   - Proteksi CSRF (*Cross-Site Request Forgery*) pada seluruh formulir.
   - Sanitasi input ketat terhadap serangan XSS (*Cross-Site Scripting*), terutama pada blok kanvas Rich Text (hanya tag HTML aman yang diperbolehkan).
   - Pembatasan laju (*Rate Limiting*) pada pengiriman aspirasi publik (maksimal 3 pengiriman / 10 menit per IP) dan percobaan login admin (maksimal 5 percobaan / menit).
   - Enkripsi kata sandi menggunakan standar Bcrypt / Argon2id.
3. **Kualitas Salinan & Konten (Copywriting Integrity)**:
   - Seluruh konten profil, nomor dapil, riwayat pendidikan, dan program wajib sinkron dengan data faktual KPU & Goodkind. Dilarang memuat informasi fiktif.
4. **Aksesibilitas (Accessibility / a11y)**:
   - Standar kontras warna teks terhadap latar belakang memenuhi pedoman WCAG 2.1 Level AA.
   - Setiap gambar memiliki atribut `alt` deskriptif.
   - Elemen interaktif dapat dioperasikan penuh melalui navigasi keyboard.
   - Disiplin Anti-Pill Button (`rounded-lg` / `rounded-xl`, tanpa `rounded-full` pada buttons dan inputs).
5. **Optimasi Mesin Pencari (SEO)**:
   - Struktur meta data lengkap (Meta Title, Description, Canonical URL, OpenGraph Facebook, Twitter Card, Favicon dinamis).
   - Penandaan data terstruktur Schema.org (JSON-LD) untuk entitas `Person`, `GovernmentOrganization`, `NewsArticle`, dan `BreadcrumbList`.
   - File `robots.txt` dan `sitemap.xml` otomatis yang disinkronkan dengan rute rujukan eksternal.
