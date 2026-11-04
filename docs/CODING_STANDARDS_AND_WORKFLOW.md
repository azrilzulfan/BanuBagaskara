# Standar Koding, Prinsip Rekayasa & Alur Kerja (Workflow)
## Website Personal Profile, Hasil Kinerja, Berita & Kanal Aspirasi
### Banu Lesmana Bagaskara, S.M. — Anggota DPRD Kota Bogor

---

## 1. Standar Penulisan Kode (Coding Standards)

Aplikasi mengikuti pedoman standar **PSR-12 (Extended Coding Style)** dan panduan resmi **Laravel Best Practices**.

### 1.1 Konvensi Penamaan (Naming Conventions)

| Komponen | Konvensi | Contoh |
| :--- | :--- | :--- |
| **Model** | Singular PascalCase | `PerformanceReport`, `News`, `Album`, `AlbumPhoto`, `Aspiration`, `SiteSetting` |
| **Tabel Basis Data** | Plural snake_case | `performance_reports`, `news`, `albums`, `album_photos`, `aspirations` |
| **Controller** | PascalCase + Suffix `Controller` | `PerformanceController`, `NewsController`, `GalleryController`, `AspirationController` |
| **Action Class** | PascalCase + Suffix `Action` | `CreatePerformanceReportAction`, `SubmitAspirationAction` |
| **Service Class** | PascalCase + Suffix `Service` | `BlockEngineService`, `SiteSettingsService` |
| **Interface / Contract** | PascalCase + Suffix `Interface` | `BlockRendererInterface`, `StorageServiceInterface` |
| **Form Request** | PascalCase + Suffix `Request` | `StoreAspirationRequest`, `UpdateSettingRequest` |
| **Blade Views** | kebab-case (Folder & File) | `resources/views/admin/kinerja.blade.php`, `resources/views/public/home.blade.php` |
| **Blade Components** | kebab-case | `<x-admin.sidebar>`, `<x-lightbox>` |
| **Route Names** | dot.notation (kebab-case) | `admin.kinerja.index`, `admin.aspirasi.destroy`, `berita.show` |
| **CSS Classes** | Utility Tailwind CSS v4 | `bg-[#BC0202] rounded-lg px-4 py-2.5` |

---

### 1.2 Aturan Ketat Arsitektur Kode (Code Hygiene Rules)

1. **Thin Controller, Fat Service/Action**:
   - Controller tidak boleh memuat logika bisnis berbelit atau kueri database panjang.
   - Controller bertugas: Menerima request &rarr; Menjalankan validasi Form Request &rarr; Memanggil Service / Eloquent Action &rarr; Mengembalikan View atau Redirect.

2. **Dilarang Menjalankan Kueri di Dalam Blade**:
   - Penggunaan `@php App\Models\News::all() @endphp` di dalam berkas Blade **dilarang keras**. Seluruh data wajib disiapkan dan dioper melalui Controller.

3. **Type-Hinting & Return Types Wajib**:
   - Setiap fungsi dan metode wajib menyertakan tipe parameter dan tipe kembalian (*return type declaration*):
   ```php
   public function execute(array $validatedData): Aspiration
   {
       // Logika bisnis
   }
   ```

4. **Validasi Formulir Menggunakan Dedicated Form Request**:
   - Seluruh validasi input wajib dipisahkan ke dalam kelas Form Request di `app/Http/Requests/`.

5. **Disiplin Gaya Kode Otomatis via Laravel Pint**:
   - Seluruh perubahan kode PHP wajib diformat menggunakan Laravel Pint sebelum finalisasi:
   ```bash
   vendor/bin/pint --format agent
   ```

---

## 2. Strategi Pengujian Otomatis (Testing Strategy)

Pengujian perangkat lunak dilakukan secara komprehensif menggunakan **Pest PHP** untuk menjamin stabilitas dan mencegah regresi pada seluruh alur fitur (saat ini mencakup **75 tes otomatis lulus 100%**).

```
tests/
├── Unit/
│   ├── BlockEngineTest.php          # Uji parsing, sanitasi rich text, dan validasi 10 blok
│   ├── TicketGeneratorTest.php      # Uji keunikan format tiket BLB-xxxxxx
│   └── SiteSettingsCacheTest.php    # Uji pembacaan dan pembersihan cache pengaturan
└── Feature/
    ├── PublicPagesTest.php          # Uji akses HTTP 200 halaman Beranda, Profil, Kinerja, Berita, Galeri, Kontak
    ├── AspirationFeatureTest.php    # Uji form aspirasi publik, rate limiter 3/10m, dan honeypot
    ├── AdminAspirationTest.php      # Uji inspeksi detail, bulk delete, dan tautan WhatsApp
    ├── AdminPerformanceTest.php     # Uji CRUD kanvas kinerja, atomicity single featured, dan direct upload
    ├── AdminNewsTest.php            # Uji berita single featured, required source_url, direct cover upload, & redirect
    ├── AdminGalleryTest.php         # Uji album, batch upload foto tanpa select preset, & aksi jadikan sampul
    ├── AdminSettingsTest.php        # Uji upload logo/favicon, hero/banner/kolase, testimoni & kutipan resmi
    └── AdminAuthenticationTest.php  # Uji login single admin & brute-force rate limit lockout
```

### 2.1 Rincian Kasus Uji Utama (Key Test Cases)
1. **`test_public_pages_render_successfully`**:
   - Memastikan rute `/`, `/kenali`, `/kinerja`, `/berita`, `/galeri`, dan `/kontak` mengembalikan status HTTP 200 dengan markup visual lengkap.
2. **`test_single_featured_performance_report_atomicity`**:
   - Memastikan saat sebuah artikel kinerja ditandai sebagai featured, artikel kinerja lain yang sebelumnya featured otomatis diubah menjadi `false`.
3. **`test_single_featured_news_atomicity`**:
   - Memastikan saat berita baru ditandai sebagai featured, berita lain yang sebelumnya featured otomatis diubah menjadi `false`.
4. **`test_news_redirects_to_external_source_url`**:
   - Memastikan pengaksesan rute `/berita/{slug}` mengalihkan (*302 redirect*) pengunjung langsung ke `source_url`.
5. **`test_gallery_direct_uploads_and_set_as_cover`**:
   - Memastikan unggah berkas cover album dan foto galeri tersimpan di storage dan dapat ditandai sebagai sampul album tanpa opsi preset.
6. **`test_citizen_can_submit_aspiration_and_receive_ticket`**:
   - Mengirim data valid ke `/kontak/aspirasi`. Memverifikasi format nomor tiket sesuai pola regex `/^BLB-[0-9]{6}$/`.
7. **`test_admin_aspiration_management_and_bulk_delete`**:
   - Memastikan admin dapat melihat detail pengaduan, membuka tautan WhatsApp resmi, dan menghapus aduan secara massal (*bulk delete*).
8. **`test_settings_direct_uploads_and_testimonial_sync`**:
   - Memastikan upload logo, favicon, foto hero/banner/kolase, serta pengelolaan testimoni dan kutipan resmi tersimpan dengan benar.

---

## 3. Alur Kerja Git & Standar Commit (Git Workflow)

### 3.1 Struktur Percabangan (Branching Model)
- `master` / `main`: Cabang produksi (*production-ready*).
- `develop`: Cabang integrasi pengembangan utama.
- `feat/nama-fitur`: Cabang pengembangan fitur baru.
- `fix/nama-bug`: Cabang perbaikan bug.

### 3.2 Format Pesan Commit (Conventional Commits)
Setiap pesan commit wajib mengikuti format terstandarisasi:
```
<tipe>(<lingkup>): <deskripsi singkat imperatif>

[penjelasan opsional]
```

**Tipe Commit yang Digunakan:**
- `feat`: Penambahan fitur baru (misal: `feat(kinerja): add metric, attachment, table, callout blocks`).
- `fix`: Perbaikan bug atau galat (misal: `fix(berita): enforce single featured atomicity`).
- `docs`: Pembaruan atau penambahan dokumentasi (misal: `docs: update technical specifications in docs`).
- `style`: Penyesuaian format, spasi, tanpa mengubah logika kode (misal: `style: format code using pint`).
- `refactor`: Restrukturisasi kode tanpa mengubah fungsionalitas (misal: `refactor(aspirasi): streamline admin view`).
- `test`: Menambah atau memperbaiki pengujian unit/fitur (misal: `test(gallery): add direct upload tests`).

---

## 4. Daftar Periksa Kualitas (Quality Assurance & Audit Checklist)

Sebelum kode dirilis atau digabungkan ke cabang utama, wajib melewati daftar periksa berikut:
- [ ] **Linter & Code Style**: Menjalankan `vendor/bin/pint --format agent` tanpa ada pelanggaran gaya kode.
- [ ] **Automated Tests**: Menjalankan `vendor/bin/pest` dengan hasil 100% *PASSED* (seluruh 75 tes lulus).
- [ ] **Vite Asset Build**: Menjalankan `npm run build` sukses tanpa manifest error.
- [ ] **Accessibility (a11y)**: Setiap gambar memiliki tag `alt`, modal dialog dapat diakses penuh via keyboard.
- [ ] **No Pill Buttons**: Memastikan tidak ada tombol yang menggunakan `rounded-full` (wajib `rounded-lg` atau `rounded-xl`).
- [ ] **Data Integrity**: Memastikan seluruh data statis dan profil dewan sinkron dengan data resmi Goodkind/KPU (11 kelurahan faktual Tanah Sareal, tanpa data fiktif).
- [ ] **Sanitasi HTML Rich Text**: Seluruh konten HTML editor disanitasi dari tag skrip berbahaya (`<script>`, `<iframe>`, `javascript:`).
- [ ] **Responsive Check**: Teruji sempurna di layar Mobile (375px), Tablet (768px), dan Desktop (1440px).
