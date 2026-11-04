# Design System & UI/UX Guidelines
## Website Personal Profile, Hasil Kinerja, Berita & Kanal Aspirasi
### Banu Lesmana Bagaskara, S.M. — Anggota DPRD Kota Bogor

---

## 1. Filosofi & Prinsip Visual

Desain visual website ini mengusung estetika **Modern Editorial & Modernist Clean Government**, terinspirasi dari arsitektur desain komponen **Shadcn UI** dengan penekanan pada:
1. **Disiplin Bentuk Geometris**: Garis tepi tegas (*subtle borders*), sudut lengkung terukur (*tactile rounded radii*), dan bayangan mikro (*micro-shadows*).
2. **Keterbacaan Informasi Maksimal**: Kontras tipografi tinggi yang memudahkan masyarakat dan jurnalis membaca laporan kinerja.
3. **Integritas & Kewibawaan**: Warna merah resmi partai & dewan yang dipadukan dengan palet netral zinc/slate berkualitas tinggi.
4. **Aturan Mutlak Anti-Pill Button**: **Dilarang keras menggunakan pill button (`rounded-full`) untuk tombol aksi dan input form**. Seluruh tombol wajib menggunakan `rounded-lg` sesuai standar purwarupa halaman publik.
5. **Independensi Aset Mandiri**: Seluruh aset font dan script dibundel secara lokal via Vite tanpa ketergantungan pada CDN eksternal (menjamin performa, privasi, dan stabilitas jangka panjang).

---

## 2. Palet Warna & Token Semantik

Sistem warna diintegrasikan melalui direktif modern **Tailwind CSS v4 `@theme`** pada berkas `resources/css/app.css`:

```css
@theme {
    --font-sans: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;

    --color-brand: #BC0202;
    --color-brand-bright: #FF0000;
    --color-brand-dark: #830000;
    --color-brand-black: #000000;

    --color-primary: #BC0202;
    --color-primary-foreground: #ffffff;
    --color-primary-hover: #830000;
    --color-primary-bright: #FF0000;
    --color-primary-subtle: #fee2e2;

    --color-canvas: #fafafa;
    --color-section: #f4f4f5;
    --color-surface: #ffffff;

    --radius-2xl: 1.25rem;
    --radius-xl: 1rem;
    --radius-lg: 0.625rem;
    --radius-md: 0.5rem;
    --radius-sm: 0.375rem;
}
```

### 2.1 Definisi Token Warna Semantik

| Token Semantik | Kode Warna Hex | Kelas Tailwind CSS | Fungsi & Penggunaan |
| :--- | :---: | :--- | :--- |
| `primary` | `#BC0202` | `bg-[#BC0202]`, `text-[#BC0202]` | Warna aksen utama identitas Banu Bagaskara, tombol primer, logo, dan badge sorotan. |
| `primary-hover` | `#830000` | `hover:bg-[#830000]` | Status interaksi *hover* pada tombol aksi utama. |
| `primary-focus` | `#FF0000` | `focus:border-[#FF0000] focus:ring-[#FF0000]` | Garis *focus ring* pada formulir isian input. |
| `primary-tint` | `#faf5f5` | `bg-[#faf5f5]` | Latar belakang lembut untuk menu navigasi yang sedang aktif dan kotak header sidebar. |
| `bg-canvas` | `#fafafa` | `bg-[#fafafa]` | Latar belakang dasar halaman dasbor admin dan kanvas situs. |
| `bg-section` | `#f4f4f5` | `bg-[#f4f4f5]` | Latar belakang pembeda untuk section formulir kontak & aspirasi. |
| `bg-surface` | `#ffffff` | `bg-white` | Latar belakang kartu (*card*), modal dialog, dan dropdown. |
| `border-subtle` | `#e4e4e7` | `border-zinc-200` | Garis pembatas kartu, tabel, dan pemisah kolom. |
| `border-input` | `#d4d4d8` | `border-zinc-300` | Garis tepi kotak input formulir dan selektor. |
| `text-headline` | `#09090b` | `text-zinc-950` | Judul artikel, headline hero, dan angka metrik KPI. |
| `text-title` | `#18181b` | `text-zinc-900` | Subjudul, nama pelapor, dan label formulir penting. |
| `text-body` | `#52525b` | `text-zinc-600` | Teks paragraf, deskripsi kartu, dan keterangan artikel. |
| `text-muted` | `#71717a` | `text-zinc-500` | Tanggal rilis, breadcrumb, dan catatan pendukung. |

### 2.2 Status Badges (Warna Indikator)
- **Baru / Urgent / Alert**: `bg-red-50 text-[#BC0202] border border-red-200`
- **Peringatan / Info Penting**: `bg-amber-50 text-amber-800 border border-amber-200`
- **Selesai / Terverifikasi / Sukses**: `bg-emerald-50 text-emerald-800 border border-emerald-200`
- **Netral / Draf / Info Teknis**: `bg-zinc-100 text-zinc-700 border border-zinc-200`

---

## 3. Sistem Tipografi (Typography)

Sistem menggunakan satu keluarga jenis huruf: **Plus Jakarta Sans**, yang dibundel secara lokal melalui pipeline kompilasi **Vite** tanpa ketergantungan pada Google Fonts CDN eksternal:

```html
<!-- Bundel Aset Lokal Terpadu via Vite -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

### 3.1 Skala Ukuran Huruf (Type Scale)

| Tingkatan | Ukuran Font / Leading | Font Weight | Contoh Penggunaan |
| :--- | :--- | :---: | :--- |
| **Display H1** | `text-2xl sm:text-4xl md:text-[42px]` / `leading-[1.16]` | `font-bold` (700) | Judul utama Hero Section Beranda & Profil |
| **Heading H2** | `text-xl sm:text-2xl` / `leading-snug` | `font-bold` (700) | Judul section, header modul admin |
| **Heading H3** | `text-base sm:text-lg` / `leading-snug` | `font-bold` (700) | Judul kartu laporan kinerja & berita |
| **Subheading** | `text-sm sm:text-base` / `leading-relaxed` | `font-semibold` (600) | Subjudul pengantar & teks kutipan |
| **Body Regular**| `text-xs sm:text-sm` / `leading-relaxed` | `font-normal` (400) | Paragraf artikel, rich text, & uraian aspirasi |
| **Form Label** | `text-xs font-bold text-zinc-900` | `font-bold` (700) | Label input formulir |
| **Caption / Meta**| `text-[11px] sm:text-xs` | `font-medium` (500) | Tanggal rilis, sumber media, takarir foto |
| **Monospace** | `font-mono text-xs font-bold` | `font-bold` (700) | Nomor tiket `BLB-xxxxxx` & nomor kontak |

---

## 4. Hirarki Sudut Lengkung (Border Radii Hierarchy)

Untuk menjaga konsistensi arsitektur Shadcn UI, sudut lengkung dikelompokkan secara ketat:

```
  rounded-md (6px)   --> Tag kategori, nomor urut blok, indikator status kecil
  rounded-lg (8px)   --> Tombol (Button), Kotak Input (Input/Textarea), Select Box
  rounded-xl (12px)  --> Kartu Konten (Card), Tabel Wrapper, Bento Grid Tiles
  rounded-2xl (16px) --> Modal Dialog, Popup Inspection Sheet, Hero Container
```

> [!CAUTION]
> **Larangan Bentuk Pill**: Hindari penggunaan kelas `rounded-full` pada elemen tombol (`<button>` atau `<a>`). Seluruh tombol wajib menggunakan kelas `rounded-lg` atau `rounded-xl`.

---

## 5. Sistem Bayangan Mikro (Shadow Elevation)

- `shadow-2xs`: Bayangan mikro untuk elemen input form dan tombol sekunder (`box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05)`).
- `shadow-xs`: Bayangan halus untuk kartu konten standar.
- `shadow-sm`: Bayangan status hover pada kartu interaktif.
- `shadow-lg` / `shadow-2xl`: Bayangan elevasi tinggi untuk dialog modal dan popup sheet.

---

## 6. Spesifikasi Komponen Inti

### 6.1 Tombol Aksi Utama (Primary Button)
```html
<button
  type="button"
  class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-sm transition-colors active:scale-98 gap-2"
>
  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <!-- Icon SVG -->
  </svg>
  <span>Simpan Data</span>
</button>
```

### 6.2 Kotak Input Formulir (Form Input)
```html
<div>
  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nama Lengkap *</label>
  <input
    type="text"
    required
    placeholder="Masukkan nama lengkap..."
    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs transition-colors"
  />
</div>
```

### 6.3 Kartu Konten Berita / Kinerja (Content Card)
```html
<article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
  <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
    <img src="..." alt="..." class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
  </div>
  <div class="p-5 sm:p-6">
    <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
      <span>20 Januari 2026</span>
    </div>
    <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Judul Laporan Kinerja</h3>
    <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">Deskripsi cuplikan...</p>
  </div>
</article>
```

---

## 7. Titik Henti Responsif (Responsive Breakpoints)

- **Mobile Small (`< 640px`)**: Single column layout, navigasi drawer hamburger, padding horizontal `px-4`.
- **Tablet (`640px – 1024px`)**: 2-column card grid, sidebar admin collapsable, padding horizontal `px-6`.
- **Desktop (`>= 1024px`)**: Multi-column bento grid, sidebar admin fixed terbentang, kanvas artikel terpusat (`max-w-7xl` atau `max-w-4xl`), padding horizontal `px-8`.
