# Website Resmi Banu Lesmana Bagaskara, S.M.

### Anggota DPRD Kota Bogor Periode 2024–2029 (Dapil Kota Bogor 4 / Kecamatan Tanah Sareal)

---

## 1. Tentang Proyek

Proyek ini adalah pengembangan portal web resmi personal profile, transparansi hasil kinerja kedewanan, rilis berita resmi, galeri dokumentasi kegiatan, dan kanal aspirasi warga terpadu (_Rumah Aspirasi Rakyat Digital_) untuk **Banu Lesmana Bagaskara, S.M.**, Anggota DPRD Kota Bogor terpilih periode 2024–2029 dari Fraksi PDI Perjuangan (Komisi 1).

Aplikasi dirancang dengan standar kode enterprise yang berpegang teguh pada prinsip **SOLID**, **DRY**, **KISS**, **YAGNI**, serta **Separation of Concerns (SoC)**, memberikan jaminan kemudahan pemeliharaan (_maintainability_), performa tinggi, dan keamanan data tingkat lanjut.

---

## 2. Struktur Dokumentasi Proyek (`docs/`)

Dokumen spesifikasi teknis dan perancangan terinci telah disusun secara komprehensif pada direktori `docs/`:

| Dokumen                           | Deskripsi & Isi Utama                                                                                                                                                                                                  | Tautan Berkas                                                                                                                                              |
| :-------------------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Spesifikasi Produk (PRD)**      | Visi produk, profil terverifikasi Goodkind/KPU, pengguna sasaran, cakupan fitur 6 halaman publik & 6 modul dasbor admin, serta kebutuhan non-fungsional.                                                               | [docs/PRD.md](docs/PRD.md)                                                                                                 |
| **Arsitektur Perangkat Lunak**    | Pola arsitektur MVC + Action/Service, diagram alur Mermaid, implementasi prinsip SOLID, arsitektur _Modular Block Canvas Engine_ (Gutenberg-style), serta otentikasi _Single Admin_.                                   | [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md)                                                                               |
| **Skema Basis Data (ERD)**        | Diagram relasi entitas Mermaid, kamus data lengkap untuk 9 tabel, indeks optimasi kueri, kunci asing _cascading_, dan strategi data seeder faktual.                                                                    | [docs/DATABASE_SCHEMA.md](docs/DATABASE_SCHEMA.md)                                                                         |
| **Design System & UI Guidelines** | Filosofi visual Shadcn-inspired, palet warna resmi (`#BC0202`, `#830000`, `#fafafa`), tipografi _Plus Jakarta Sans_, hirarki sudut lengkung, dan **aturan mutlak larangan pill button**.                               | [docs/DESIGN_SYSTEM.md](docs/DESIGN_SYSTEM.md)                                                                             |
| **Keamanan & Optimasi SEO**       | Kebijakan proteksi akun tunggal, _brute-force rate limiting_, formulir anti-spam via teknik _Honeypot_ tanpa CAPTCHA, sanitasi XSS pada blok modular, formula metadata SEO, dan data terstruktur _Schema.org JSON-LD_. | [docs/SECURITY_AND_SEO.md](docs/SECURITY_AND_SEO.md)                                                                       |
| **Standar Koding & Alur Kerja**   | Standar PSR-12 & Laravel Pint, konvensi penamaan komponen, aturan _thin controller_, strategi pengujian otomatis (Pest/PHPUnit), format Conventional Commits, dan QA checklist.                                        | [docs/CODING_STANDARDS_AND_WORKFLOW.md](docs/CODING_STANDARDS_AND_WORKFLOW.md)                                             |
| **Studi Audit Perencanaan**       | Catatan audit purwarupa statis eksisting dan verifikasi silang data Goodkind KPU (ID: 176559).                                                                                                                         | [studi_perencanaan_proyek.md](file:///C:/Users/azrilzulfan/.gemini/antigravity-cli/brain/33dc70f0-7bd1-454e-83c7-f5ab31bc7f56/studi_perencanaan_proyek.md) |

---

## 3. Cakupan Modul & Halaman

### 3.1 Halaman Publik (Frontend)

1. **Beranda** (`/`): Hero Section, Banner Ambulance Siaga 24 Jam, Sorotan Laporan Kinerja & Berita Terkini, 6 Program Unggulan, Kolase Foto Bento UI, Testimoni, CTA Kotak Aspirasi.
2. **Kenali Saya / Profil** (`/kenali`): Metadata Kedewanan, Visi & Misi Resmi, Rekam Jejak Pendidikan & Organisasi, 12 Isu Penting Strategis, 6 Program Fokus, Kutipan Integritas.
3. **Hasil Kinerja** (`/kinerja`): Katalog laporan pertanggungjawaban dewan & halaman baca detail dinamis dengan layout kanvas modular.
4. **Berita & Rilis Pers** (`/berita`): Rilis berita kegiatan resmi, liputan media, dan halaman baca detail dengan sumber eksternal.
5. **Galeri Dokumentasi** (`/galeri`): Katalog album kegiatan warga dengan penampil _Photo Theater Lightbox_ interaktif layar penuh.
6. **Kontak & Kotak Aspirasi** (`/kontak`): Alamat Rumah Aspirasi Kedung Badak, hotline ambulance 24 jam, dan formulir aduan publik dengan penomoran tiket unik (`BLB-xxxxxx`).

### 3.2 Dasbor Administrator (Backend - Single Admin Portal)

1. **Ringkasan (Beranda Dasbor)** (`/admin`): Ringkasan metrik KPI, status operasional sistem, pintasan aksi cepat, tabel 5 aspirasi terbaru, serta tab pratinjau publikasi.
2. **Hasil Kinerja** (`/admin/kinerja`): Manajemen laporan + **Editor Kanvas Blok Modular (Gutenberg-style)**: Menambah, menghapus, dan mengatur urutan blok (Heading, Paragraf, Gambar & Caption, List, Grid 2-Kolom, Kutipan) + modal pratinjau publik langsung.
3. **Kelola Berita** (`/admin/berita`): Mengelola rilis berita dengan **5 input wajib** (Judul, Tanggal, Deskripsi, Cover Image, Sumber) + switch status Terbit/Draf dan fitur Berita Utama (_Featured_).
4. **Kelola Galeri & Album** (`/admin/galeri`): Manajemen album kegiatan beserta foto-foto di dalamnya, penentuan sampul (_cover_), keterangan foto (_caption_), dan _Photo Theater Lightbox_.
5. **Kotak Aspirasi Warga** (`/admin/aspirasi`): Menampung pengaduan publik, filter status (_Baru, Ditinjau, Selesai_), filter 8 kelurahan di Tanah Sareal, pencarian nomor tiket `BLB-xxxxxx`, modal inspeksi aduan, riwayat catatan disposisi tim dewan, integrasi WhatsApp _click-to-chat_ langsung ke warga, dan ekspor data CSV.
6. **Pengaturan Halaman Website** (`/admin/pengaturan`): Mengelola seluruh data statis dalam 4 kategori (Umum & Kontak, Halaman Beranda, Halaman Profil, serta Konfigurasi SEO & SERP Preview Google).
7. **Otentikasi Masuk Admin** (`/admin/login`): Portal masuk akun tunggal (_Single Admin Account_) terproteksi sandi kuat dan _brute-force rate limiting_.

---

## 4. Struktur Direktori Proyek

```
Banu Bagaskara/
├── docs/                                  # Dokumentasi Teknis Lengkap Proyek
│   ├── PRD.md                             # Product Requirements Document
│   ├── ARCHITECTURE.md                    # Software Architecture & SOLID Design
│   ├── DATABASE_SCHEMA.md                 # Entity Relationship Diagram & Data Dictionary
│   ├── DESIGN_SYSTEM.md                   # Design System & UI/UX Guidelines
│   ├── SECURITY_AND_SEO.md                # Security Posture & SEO Strategy
│   └── CODING_STANDARDS_AND_WORKFLOW.md   # Coding Standards & Testing Strategy
│
├── templates/                             # Purwarupa Antarmuka Statis Terverifikasi
│   ├── assets/banu/                       # Aset foto resolusi tinggi terverifikasi
│   ├── index.html                         # Purwarupa Beranda
│   ├── kenali.html                        # Purwarupa Kenali Saya
│   ├── kinerja.html                       # Purwarupa Hasil Kinerja
│   ├── berita.html                        # Purwarupa Berita
│   ├── galeri.html                        # Purwarupa Galeri
│   ├── kontak.html                        # Purwarupa Kontak & Kotak Aspirasi
│   └── admin/                             # Purwarupa Dasbor Admin
│       ├── dashboard.html                 # 1. Ringkasan Dasbor
│       ├── kinerja.html                   # 2. Hasil Kinerja (Kanvas Blok Modular)
│       ├── berita.html                    # 3. Kelola Berita (5 Input Wajib)
│       ├── galeri.html                    # 4. Kelola Galeri Album & Foto
│       ├── aspirasi.html                  # 5. Kotak Aspirasi & Disposisi WhatsApp
│       ├── pengaturan.html                # 6. Pengaturan Halaman Statis (4 Kategori)
│       └── login.html                     # 7. Otentikasi Masuk Admin Tunggal
│
└── README.md                              # Berkas Panduan Utama Repositori
```

---

## 5. Prasyarat Lingkungan Pengembangan Lokal

Pastikan perangkat lokal Anda telah terpasang:

- **PHP**: Versi `^8.2` atau lebih tinggi (teruji pada PHP `8.5.12`)
- **Composer**: Versi `^2.5` atau lebih tinggi (teruji pada Composer `2.10.1`)
- **Node.js**: Versi `^18.x` atau lebih tinggi (teruji pada Node.js `v26.12.1` & npm `11.20.0`)
- **MySQL**: Versi `^8.0` atau MariaDB `^10.4`

---

## 6. Hak Cipta & Integritas Informasi

Seluruh materi publikasi, riwayat pendidikan, visi-misi, serta foto kegiatan resmi merujuk pada profil sah **Banu Lesmana Bagaskara, S.M.** (KPU ID: 176559 / Goodkind). Pengembangan sistem ini dilarang keras memuat atau menyebarkan data fiktif (_no dummy data in production_).
