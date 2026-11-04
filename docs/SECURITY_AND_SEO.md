# Security Posture, Data Trust & Search Engine Optimization (SEO)
## Website Personal Profile, Hasil Kinerja, Berita & Kanal Aspirasi
### Banu Lesmana Bagaskara, S.M. — Anggota DPRD Kota Bogor

---

## 1. Postur Keamanan & Perlindungan Akun Tunggal (Single Admin)

### 1.1 Kebijakan Akun Tunggal (Single Admin Policy)
Sesuai rancangan arsitektur, website ini **hanya memiliki 1 (satu) akun Administrator** resmi untuk mengelola seluruh konten dan pengaduan warga.
1. **Peniadaan Jalur Registrasi**: Rute registrasi publik dinonaktifkan secara permanen pada level router:
   ```php
   // routes/auth.php
   Route::any('/register', function () {
       abort(404);
   });
   ```
2. **Enkripsi Kredensial Kuat**: Sandi disimpan menggunakan algoritma **Argon2id** (atau Bcrypt dengan cost factor minimal 12).
3. **Pembatasan Percobaan Login (Brute-Force Rate Limiting)**:
   - Rute `POST /admin/login` dilindungi pembatas laju ketat:
   ```php
   RateLimiter::for('admin-login', function (Request $request) {
       return Limit::perMinute(5)->by($request->ip())->response(function () {
           return response()->view('errors.429-login', [
               'message' => 'Terlalu banyak percobaan login gagal. Demi keamanan, silakan coba lagi dalam 15 menit.'
           ], 429);
       });
   });
   ```
4. **Regenerasi Session ID**: Setiap kali proses otentikasi berhasil, `session_id` wajib diregenerasi untuk mencegah serangan *Session Fixation*:
   ```php
   $request->session()->regenerate();
   ```
5. **Keamanan Cookie Session**:
   - `session.secure = true` (Hanya dikirim melalui HTTPS).
   - `session.http_only = true` (Tidak dapat diakses via JavaScript `document.cookie`).
   - `session.same_site = 'lax'` (Mencegah serangan CSRF lintas domain).

---

## 2. Perlindungan Formulir Publik & Keamanan Data Warga (Kotak Aspirasi)

### 2.1 Perlindungan Spam & Bot Tanpa CAPTCHA Rumit
Untuk menjamin kenyamanan warga lanjut usia atau non-teknis saat menyampaikan aspirasi tanpa harus memecahkan tantangan visual CAPTCHA:
1. **Teknik Honeypot Tersembunyi**:
   - Menambahkan input palsu tak kasat mata (`website_hp`) di form kontak:
   ```html
   <div class="hidden" aria-hidden="true" style="display:none !important;">
     <input type="text" name="website_hp" tabindex="-1" autocomplete="off" />
   </div>
   ```
   - Jika field `website_hp` terisi saat form disubmit, sistem mengenali bahwa request dikirim oleh bot/skrip otomatis dan langsung membatalkannya secara senyap (*silent rejection*).
2. **Pembatasan Laju Pengiriman Form (Throttle)**:
   - Pengiriman formulir aspirasi dibatasi maksimal **3 laporan per 10 menit per IP address**:
   ```php
   Route::post('/kontak/aspirasi', [AspirationController::class, 'store'])
       ->middleware(['throttle:3,10']);
   ```
3. **Validasi Nomor WhatsApp Indonesia**:
   - Memastikan nomor telepon yang dimasukkan adalah format sah seluler Indonesia:
   ```php
   'phone' => ['required', 'string', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
   ```
4. **Kerahasiaan Data Pengirim (Privacy Protection)**:
   - Data kontak (nomor WhatsApp dan alamat lengkap) tidak dipublikasikan ke halaman umum mana pun.
   - Pengunjung publik hanya menerima **Nomor Tiket Monospace (`BLB-xxxxxx`)** sebagai bukti laporan telah tercatat.

---

## 3. Pencegahan Serangan Cross-Site Scripting (XSS) pada Blok Kanvas

Modul Hasil Kinerja yang menggunakan susunan blok modular (WordPress Gutenberg-style) rentan terhadap injeksi skrip jika tidak disanitasi dengan benar:
1. **Aturan Default Sanitasi Blade**: Seluruh teks blok (Heading, Paragraf, List, Quote) wajib di-render menggunakan tag escaping standar Blade:
   ```html
   <!-- Aman dari XSS -->
   <h2 class="text-xl font-bold">{{ $block['data']['text'] }}</h2>
   <p class="leading-relaxed">{{ $block['data']['text'] }}</p>
   ```
2. **Validasi URL Gambar**: Blok bertipe `image` wajib memverifikasi bahwa URL path hanya merujuk ke direktori penyimpanan lokal terpercaya (`storage/` atau `assets/`) dan bukan skrip berbahaya (`javascript:...`).

---

## 4. Header Keamanan HTTP (HTTP Security Headers)

Middleware keamanan global (`SecurityHeadersMiddleware`) disematkan untuk menyuntikkan header pengaman pada setiap respons:
- `X-Frame-Options: SAMEORIGIN` (Mencegah serangan *Clickjacking*).
- `X-Content-Type-Options: nosniff` (Mencegah eksploitasi *MIME-sniffing*).
- `Referrer-Policy: strict-origin-when-cross-origin` (Menjaga privasi perujuk request).
- `Permissions-Policy: camera=(), microphone=(), geolocation=()` (Membatasi akses sensor peramban).

---

## 5. Strategi Optimasi Mesin Pencari (SEO)

### 5.1 Formula Meta Title & Description

| Halaman | Formula Meta Title | Formula Meta Description |
| :--- | :--- | :--- |
| **Beranda** | `Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029` | Kanal resmi transparansi kinerja, advokasi aspirasi warga Tanah Sareal, dan program kerja Banu Lesmana Bagaskara, S.M. di DPRD Kota Bogor. |
| **Kenali Saya** | `Profil Banu Lesmana Bagaskara, S.M. | Kenali Rekam Jejak, Visi & Program` | Profil resmi, riwayat pendidikan S1 Manajemen, pengalaman organisasi, 12 isu strategis, dan 6 program fokus pengabdian warga Kota Bogor. |
| **Kinerja** | `Laporan Hasil Kinerja Dewan | Banu Lesmana Bagaskara, S.M.` | Transparansi pertanggungjawaban publik, pokok-pokok pikiran (Pokir), pengawasan perda, dan advokasi anggaran APBD Kota Bogor. |
| **Detail Kinerja** | `{Judul Laporan} | Kinerja Banu Bagaskara` | `{Cuplikan Excerpt Laporan 150 Karakter}` |
| **Berita** | `Berita & Rilis Pers Resmi | Banu Lesmana Bagaskara, S.M.` | Siaran pers resmi, kabar reses, liputan media, dan pernyataan publik anggota DPRD Kota Bogor Fraksi PDI Perjuangan. |
| **Galeri** | `Galeri Dokumentasi Kegiatan Warga | Banu Bagaskara` | Arsip foto kegiatan penyerapan aspirasi, bakti sosial ambulance siaga, dan pendampingan UMKM di Kecamatan Tanah Sareal. |
| **Kontak** | `Kontak & Rumah Aspirasi Warga | Banu Lesmana Bagaskara, S.M.` | Saluran resmi pengaduan warga, alamat sekretariat Rumah Aspirasi di Kedung Badak, dan layanan ambulance siaga 24 jam gratis. |

---

### 5.2 Penandaan Data Terstruktur (Schema.org JSON-LD)

#### A. Schema `Person` (Untuk Halaman Beranda & Profil)
```json
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Banu Lesmana Bagaskara, S.M.",
  "jobTitle": "Anggota DPRD Kota Bogor",
  "worksFor": {
    "@type": "GovernmentOrganization",
    "name": "DPRD Kota Bogor"
  },
  "memberOf": {
    "@type": "PoliticalParty",
    "name": "PDI Perjuangan"
  },
  "url": "https://banubagaskara.id",
  "image": "https://banubagaskara.id/assets/banu/hero_banu.jpg",
  "sameAs": [
    "https://instagram.com/banubagaskara",
    "https://tiktok.com/@banubagaskara",
    "https://facebook.com/banubgsk",
    "https://goodkind.id/profil/banu-lesmana-bagaskara-sm"
  ],
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Bogor",
    "addressRegion": "Jawa Barat",
    "addressCountry": "ID"
  }
}
```

#### B. Schema `NewsArticle` (Untuk Halaman Baca Detail Berita & Kinerja)
```json
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "{Judul Berita}",
  "image": ["https://banubagaskara.id/storage/{cover_image}"],
  "datePublished": "{ISO_8601_Published_Date}",
  "dateModified": "{ISO_8601_Updated_Date}",
  "author": {
    "@type": "Person",
    "name": "Banu Lesmana Bagaskara, S.M.",
    "url": "https://banubagaskara.id"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Media Center Banu Bagaskara",
    "logo": {
      "@type": "ImageObject",
      "url": "https://banubagaskara.id/assets/logo.png"
    }
  },
  "description": "{Cuplikan Deskripsi Berita}"
}
```

---

### 5.3 Berkas `robots.txt` & `sitemap.xml` Otomatis

1. **`public/robots.txt`**:
   ```txt
   User-agent: *
   Disallow: /admin/
   Disallow: /login
   Allow: /

   Sitemap: https://banubagaskara.id/sitemap.xml
   ```

2. **`sitemap.xml`**:
   - Dihasilkan secara dinamis mencakup seluruh halaman statis (`/`, `/kenali`, `/kinerja`, `/berita`, `/galeri`, `/kontak`) serta tautan dinamis seluruh artikel kinerja dan berita yang berstatus `published`.
