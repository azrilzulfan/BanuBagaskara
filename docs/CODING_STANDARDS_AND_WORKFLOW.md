# Standar Koding, Prinsip Rekayasa & Alur Kerja (Workflow)
## Website Personal Profile, Hasil Kinerja, Berita & Kanal Aspirasi
### Banu Lesmana Bagaskara, S.M. — Anggota DPRD Kota Bogor

---

## 1. Standar Penulisan Kode (Coding Standards)

Aplikasi mengikuti pedoman standar **PSR-12 (Extended Coding Style)** dan panduan resmi **Laravel Best Practices**.

### 1.1 Konvensi Penamaan (Naming Conventions)

| Komponen | Konvensi | Contoh |
| :--- | :--- | :--- |
| **Model** | Singular PascalCase | `PerformanceReport`, `News`, `Album`, `Aspiration` |
| **Tabel Basis Data** | Plural snake_case | `performance_reports`, `news`, `albums`, `aspirations` |
| **Controller** | PascalCase + Suffix `Controller` | `PerformanceReportController`, `AspirationController` |
| **Action Class** | PascalCase + Suffix `Action` | `CreatePerformanceReportAction`, `SubmitAspirationAction` |
| **Service Class** | PascalCase + Suffix `Service` | `BlockEngineService`, `SiteSettingsService` |
| **Interface / Contract** | PascalCase + Suffix `Interface` | `BlockRendererInterface`, `StorageServiceInterface` |
| **Form Request** | PascalCase + Suffix `Request` | `StoreAspirationRequest`, `UpdateSettingsRequest` |
| **Blade Views** | kebab-case (Folder & File) | `resources/views/admin/kinerja/index.blade.php` |
| **Blade Components** | kebab-case | `<x-admin.sidebar>`, `<x-card.performance>` |
| **Route Names** | dot.notation (kebab-case) | `admin.kinerja.index`, `admin.aspirasi.update` |
| **CSS Classes** | Utility Tailwind CSS | `bg-[#BC0202] rounded-lg px-4 py-2.5` |

---

### 1.2 Aturan Ketat Arsitektur Kode (Code Hygiene Rules)

1. **Thin Controller, Fat Service/Action**:
   - Controller tidak boleh memuat logika bisnis rumit atau kueri database panjang.
   - Controller hanya bertugas: Menerima request &rarr; Memanggil Form Request &rarr; Memanggil Action/Service &rarr; Mengembalikan View atau Redirect.
   ```php
   // Contoh Controller yang Benar (Thin Controller)
   public function store(StoreAspirationRequest $request, SubmitAspirationAction $action): RedirectResponse
   {
       $aspiration = $action->execute($request->validated());

       return redirect()->route('kontak.index')
           ->with('ticket_number', $aspiration->ticket_number);
   }
   ```

2. **Dilarang Menjalankan Kueri di Dalam Blade**:
   - Penggunaan `@php App\Models\News::all() @endphp` di dalam berkas Blade **dilarang keras**. Seluruh data wajib disiapkan dan dioper melalui Controller atau View Composer.

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

---

## 2. Strategi Pengujian Otomatis (Testing Strategy)

Pengujian perangkat lunak dilakukan menggunakan **Pest PHP** (atau PHPUnit) untuk menjamin stabilitas dan keandalan sistem.

```
tests/
├── Unit/
│   ├── BlockEngineTest.php          # Uji parsing, validasi, dan rendering blok modular
│   ├── TicketGeneratorTest.php      # Uji keunikan format tiket BLB-xxxxxx
│   └── SiteSettingsCacheTest.php    # Uji pembacaan dan invalidasi cache pengaturan
└── Feature/
    ├── PublicPagesTest.php          # Uji akses halaman publik (HTTP 200)
    ├── AspirationSubmissionTest.php # Uji form aduan, honeypot, & rate limiting
    ├── AdminAuthenticationTest.php  # Uji login single admin & brute-force lock
    └── PerformanceCrudTest.php      # Uji simpan, edit, dan render kanvas kinerja
```

### 2.1 Rincian Kasus Uji Utama (Key Test Cases)
1. **`test_public_pages_render_successfully`**:
   - Memastikan rute `/`, `/kenali`, `/kinerja`, `/berita`, `/galeri`, dan `/kontak` mengembalikan status HTTP 200 dan memuat elemen header & footer resmi.
2. **`test_citizen_can_submit_aspiration_and_receive_ticket`**:
   - Mengirim data valid ke `/kontak/aspirasi`.
   - Memastikan record tersimpan di tabel `aspirations` dengan status `Baru`.
   - Memverifikasi format nomor tiket sesuai pola regex `/^BLB-[0-9]{6}$/`.
3. **`test_aspiration_rate_limiter_blocks_spam`**:
   - Mengirimkan 4 request pengaduan berturut-turut dari IP yang sama. Request ke-4 wajib ditolak dengan status HTTP 429 (*Too Many Requests*).
4. **`test_honeypot_rejects_automated_bots`**:
   - Mengirim form dengan field `website_hp` yang diisi data. Sistem wajib menolak penyimpanan tanpa membocorkan error.
5. **`test_admin_login_rate_limiting_protects_brute_force`**:
   - Percobaan login gagal 5 kali berturut-turut wajib mengunci akses IP selama 15 menit.
6. **`test_block_engine_renders_valid_html_and_escapes_xss`**:
   - Menguji blok kanvas yang disusupi tag `<script>alert('xss')</script>`. Memastikan skrip lolos sanitasi dan tidak tereksekusi.

---

## 3. Alur Kerja Git & Standar Commit (Git Workflow)

### 3.1 Struktur Percabangan (Branching Model)
- `main`: Cabang produksi (*production-ready*). Hanya menerima *pull request* yang telah lulus pengujian otomatis.
- `develop`: Cabang integrasi pengembangan utama.
- `feat/nama-fitur`: Cabang pengembangan fitur baru (contoh: `feat/block-canvas-editor`, `feat/aspiration-whatsapp`).
- `fix/nama-bug`: Cabang perbaikan bug (contoh: `fix/photo-lightbox-indexing`).

### 3.2 Format Pesan Commit (Conventional Commits)
Setiap pesan commit wajib mengikuti format terstandarisasi:
```
<tipe>(<lingkup>): <deskripsi singkat imperatif>

[penjelasan opsional]
```

**Tipe Commit yang Digunakan:**
- `feat`: Penambahan fitur baru (misal: `feat(kinerja): implement modular block canvas editor`).
- `fix`: Perbaikan bug atau galat (misal: `fix(aspirasi): correct phone number regex validation`).
- `docs`: Pembaruan atau penambahan dokumentasi (misal: `docs(api): add database schema`).
- `style`: Penyesuaian format, spasi, tanpa mengubah logika kode (misal: `style: format blade templates with pint`).
- `refactor`: Restrukturisasi kode tanpa mengubah fungsionalitas (misal: `refactor(action): extract ticket generator service`).
- `test`: Menambah atau memperbaiki pengujian unit/fitur (misal: `test(auth): add brute-force lockout tests`).

---

## 4. Daftar Periksa Kualitas (Quality Assurance & Audit Checklist)

Sebelum kode di-merge ke cabang utama atau dirilis ke server produksi, wajib melewati daftar periksa berikut:
- [ ] **Linter & Code Style**: Menjalankan `vendor/bin/pint` tanpa error pemformatan.
- [ ] **Automated Tests**: Menjalankan `php artisan test` dengan hasil 100% *PASSED*.
- [ ] **Accessibility (a11y)**: Setiap gambar memiliki tag `alt`, navigasi keyboard berfungsi penuh di modal & lightbox.
- [ ] **No Pill Buttons**: Memastikan tidak ada tombol yang menggunakan `rounded-full`.
- [ ] **Data Integrity**: Memastikan seluruh data statis dan profil dewan sinkron dengan data resmi Goodkind/KPU (tanpa teks fiktif).
- [ ] **Responsive Check**: Teruji sempurna di layar Mobile (375px), Tablet (768px), dan Desktop (1440px).
