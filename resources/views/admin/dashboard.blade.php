<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ringkasan Dasbor Admin | Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine Component for Dashboard Ringkasan -->
    <script>
      function adminDashboard() {
        return {
          mobileMenu: false,
          activeTab: 'kinerja',
          previewModal: false,
          selectedAspiration: null,
          aspirations: [
            {
              ticket: 'BLB-842910',
              date: '04 November 2026',
              sender: 'Warga RT 03 / RW 05',
              phone: '0812-xxxx-xxxx',
              address: 'Kelurahan Kebon Pedes, Kec. Tanah Sareal',
              subject: 'Usulan Normalisasi Saluran Drainase Gang Saat Hujan Deras',
              description:
                'Mohon peninjauan saluran air di lingkungan RT 03/RW 05 Kelurahan Kebon Pedes yang mengalami pendangkalan sedimen sehingga meluap ke jalan gang saat hujan deras berlangsung lebih dari satu jam.',
              status: 'Baru',
            },
            {
              ticket: 'BLB-842765',
              date: '02 November 2026',
              sender: 'Pengurus Lingkungan RW 04',
              phone: '0813-xxxx-xxxx',
              address: 'Kelurahan Sukadamai, Kec. Tanah Sareal',
              subject: 'Perbaikan 3 Titik Lampu Penerangan Jalan Umum (PJU) Padam',
              description:
                'Terdapat tiga titik lampu penerangan jalan lingkungan di akses utama warga menuju jalan raya yang padam sejak pekan lalu. Mohon dapat dikawal ke dinas terkait demi keamanan warga malam hari.',
              status: 'Baru',
            },
            {
              ticket: 'BLB-842519',
              date: '29 Oktober 2026',
              sender: 'Pelaku Usaha Rumahan',
              phone: '0857-xxxx-xxxx',
              address: 'Kelurahan Kedung Badak, Kec. Tanah Sareal',
              subject: 'Pendaftaran Pendampingan NIB & Sertifikasi Halal UMKM',
              description:
                'Kami kelompok usaha kuliner rumahan di Kedung Badak ingin mendaftarkan 8 pelaku usaha warga untuk mengikuti jadwal pendampingan pembuatan NIB dan sertifikasi halal gratis di Rumah Aspirasi.',
              status: 'Ditinjau',
            },
            {
              ticket: 'BLB-841904',
              date: '25 Oktober 2026',
              sender: 'Warga Kel. Kayumanis',
              phone: '0878-xxxx-xxxx',
              address: 'Kelurahan Kayumanis, Kec. Tanah Sareal',
              subject: 'Konsultasi Persyaratan Pengajuan Beasiswa Siswa Prasejahtera',
              description:
                'Ingin menanyakan jadwal konsultasi di Rumah Aspirasi terkait kelengkapan dokumen advokasi bantuan pendidikan bagi anak kami yang sedang menempuh pendidikan tingkat SMA di Kota Bogor.',
              status: 'Selesai',
            },
          ],
          openAspiration(item) {
            this.selectedAspiration = item;
            this.previewModal = true;
            document.body.style.overflow = 'hidden';
          },
          closeAspiration() {
            this.previewModal = false;
            document.body.style.overflow = '';
          },
        };
      }
    </script>

    <!-- Tailwind & Shadcn Configuration (100% Consistent with Public Templates) -->
    <script>
      tailwind.config = {
        darkMode: ['class'],
        theme: {
          extend: {
            fontFamily: {
              sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
              border: 'hsl(240 5.9% 90%)',
              input: 'hsl(240 5.9% 90%)',
              ring: '#FF0000',
              background: '#ffffff',
              foreground: '#000000',
              brand: {
                bright: '#FF0000',
                DEFAULT: '#BC0202', // Warna Utama Merah
                dark: '#830000',
                black: '#000000',
              },
              primary: {
                DEFAULT: '#BC0202', // Warna Utama Merah
                foreground: '#ffffff',
                hover: '#830000',
                bright: '#FF0000',
                dark: '#830000',
                subtle: '#fee2e2',
              },
              secondary: {
                DEFAULT: 'hsl(240 4.8% 95.9%)',
                foreground: 'hsl(240 5.9% 10%)',
              },
              muted: {
                DEFAULT: 'hsl(240 4.8% 95.9%)',
                foreground: 'hsl(240 3.8% 46.1%)',
              },
              accent: {
                DEFAULT: 'hsl(240 4.8% 95.9%)',
                foreground: 'hsl(240 5.9% 10%)',
              },
              card: {
                DEFAULT: 'hsl(0 0% 100%)',
                foreground: '#000000',
              },
            },
            borderRadius: {
              '2xl': '1.25rem' /* 20px */,
              xl: '1rem' /* 16px */,
              lg: '0.625rem' /* 10px */,
              md: '0.5rem' /* 8px */,
              sm: '0.375rem' /* 6px */,
            },
          },
        },
      };
    </script>

    <style>
      *,
      *::before,
      *::after {
        box-sizing: border-box;
      }
      html,
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #ffffff;
        color: #000000;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        overflow-x: hidden;
        width: 100%;
        margin: 0;
        padding: 0;
      }

      /* Clean custom scrollbar */
      ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
      }
      ::-webkit-scrollbar-track {
        background: #f4f4f5;
      }
      ::-webkit-scrollbar-thumb {
        background: #d4d4d8;
        border-radius: 3px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: #a1a1aa;
      }
      [x-cloak] {
        display: none !important;
      }
    </style>
  </head>
  <body
    class="min-h-screen w-full bg-white text-zinc-950 overflow-x-hidden"
    x-data="adminDashboard()"
    @keydown.escape.window="if (previewModal) closeAspiration(); else mobileMenu = false;"
  >
    <div class="min-h-screen w-full flex flex-col lg:flex-row">
      <!-- ======================================================== -->
      <!-- DESKTOP SIDEBAR NAVIGATION (Shadcn Style, No Pill)       -->
      <!-- ======================================================== -->
      <aside class="hidden lg:flex lg:w-64 xl:w-72 lg:flex-col lg:fixed lg:inset-y-0 bg-white border-r border-zinc-200 z-40 select-none">
        <!-- Brand Logo Header (Identical Mark to Public Templates) -->
        <div class="px-6 pt-7 pb-6 border-b border-zinc-200 bg-[#faf5f5]">
          <a href="/admin" class="flex items-center gap-3 text-zinc-950 group min-w-0">
            <div class="w-9 h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
              </svg>
            </div>
            <div class="flex flex-col leading-tight min-w-0">
              <span class="font-bold text-base tracking-tight text-zinc-950 truncate">banubagaskara.</span>
              <span class="text-[11px] font-semibold uppercase tracking-wider text-[#830000] mt-0.5">Dasbor Admin</span>
            </div>
          </a>
        </div>

        <!-- Navigation Links (6 Core Admin Modules) -->
        <nav aria-label="Menu Utama Dasbor" class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
          <!-- Group 1: Pengelolaan Konten -->
          <div>
            <span class="px-3 text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-2.5">Menu Utama</span>
            <ul class="space-y-1">
              <!-- 1. Ringkasan (Active) -->
              <li>
                <a
                  href="/admin"
                  aria-current="page"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-zinc-100 text-zinc-950 text-xs font-bold transition-colors"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-[#BC0202] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                      />
                    </svg>
                    <span>Ringkasan</span>
                  </span>
                  <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                </a>
              </li>

              <!-- 2. Hasil Kinerja -->
              <li>
                <a
                  href="/kinerja"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                      />
                    </svg>
                    <span>Hasil Kinerja</span>
                  </span>
                </a>
              </li>

              <!-- 3. Berita -->
              <li>
                <a
                  href="/berita"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                      />
                    </svg>
                    <span>Berita</span>
                  </span>
                </a>
              </li>

              <!-- 4. Galeri -->
              <li>
                <a
                  href="/galeri"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                    <span>Galeri</span>
                  </span>
                </a>
              </li>

              <!-- 5. Kotak Aspirasi -->
              <li>
                <a
                  href="/admin/aspirasi"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                      />
                    </svg>
                    <span>Kotak Aspirasi</span>
                  </span>
                  <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">2</span>
                </a>
              </li>
            </ul>
          </div>

          <!-- Group 2: Pengaturan Halaman Website -->
          <div class="pt-4 border-t border-zinc-200/80">
            <span class="px-3 text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-2.5">Konfigurasi Portal</span>
            <ul class="space-y-1">
              <!-- 6. Pengaturan Halaman Website -->
              <li>
                <a
                  href="/admin/pengaturan"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                      />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Pengaturan Halaman</span>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Single Admin Profile & Quick Exit (No Multi-Account Clutter) -->
        <div class="p-4 border-t border-zinc-200 bg-[#fafafa] space-y-3">
          <div class="flex items-center gap-3 px-2 py-1.5">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0">BLB</div>
            <div class="min-w-0 flex-1">
              <span class="font-bold text-xs text-zinc-950 block truncate">Administrator Utama</span>
              <span class="text-[11px] text-zinc-500 block truncate">Akun Tunggal Resmi</span>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <a
              href="/"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1"
            >
              <span>Lihat Situs</span>
              <svg class="w-3 h-3 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg>
            </a>
            <a
              href="/admin/login"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-red-50 hover:text-[#BC0202] hover:border-red-200 text-zinc-700 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1"
            >
              <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span>Keluar</span>
            </a>
          </div>
        </div>
      </aside>

      <!-- ======================================================== -->
      <!-- MAIN CONTENT WRAPPER (Offset by Sidebar on Desktop)      -->
      <!-- ======================================================== -->
      <div class="flex-1 flex flex-col min-w-0 lg:pl-64 xl:pl-72">
        <!-- Mobile & Tablet Top Bar (< lg) - Identical to Public Header Nav -->
        <div class="lg:hidden sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 py-3.5 flex items-center justify-between gap-2">
          <a href="/admin" class="flex items-center gap-2.5 text-zinc-950 group min-w-0 flex-1">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
              </svg>
            </div>
            <div class="flex items-center gap-2 min-w-0">
              <span class="font-bold text-sm sm:text-base tracking-tight text-zinc-950 truncate">banubagaskara.</span>
              <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100 shrink-0">Admin</span>
            </div>
          </a>

          <button
            @click="mobileMenu = !mobileMenu"
            aria-label="Buka Menu Admin"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200 shrink-0"
          >
            <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:inline ml-1.5">Menu</span>
          </button>
        </div>

        <!-- Mobile Navigation Drawer Overlay (1:1 with Public Templates) -->
        <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
          <nav class="flex flex-col space-y-2.5 text-sm font-medium text-zinc-800">
            <a href="/admin" @click="mobileMenu = false" class="py-2 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors flex items-center justify-between">
              <span>Ringkasan (Beranda Dasbor)</span>
              <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
            </a>
            <a href="/kinerja" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja (Kanvas Blok)</a>
            <a href="/berita" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita Resmi</a>
            <a href="/galeri" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Album &amp; Foto</a>
            <a href="/admin/aspirasi" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors flex items-center justify-between">
              <span>Kotak Aspirasi</span>
              <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">2 Baru</span>
            </a>
            <a href="/admin/pengaturan" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Pengaturan Halaman Website</a>
            <div class="pt-3 mt-1 border-t border-zinc-100 grid grid-cols-2 gap-2.5">
              <a
                href="/"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-900 py-2 text-xs font-semibold"
              >
                Lihat Website
              </a>
              <a href="/admin/login" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold">Keluar</a>
            </div>
          </nav>
        </div>

        <main class="w-full flex-1 flex flex-col">
          <!-- ========================================== -->
          <!-- 1. EDITORIAL DASHBOARD HEADER (#faf5f5)    -->
          <!-- ========================================== -->
          <header class="w-full bg-[#faf5f5] border-b border-zinc-200 py-9 sm:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
              <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div class="max-w-2xl">
                  <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-3">
                    <span>Beranda Dasbor Administrasi</span>
                  </div>
                  <h1 class="text-2xl sm:text-4xl lg:text-[38px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
                    Ringkasan <span class="text-[#BC0202]">Pengelolaan</span> Portal
                  </h1>
                  <p class="text-xs sm:text-sm text-zinc-600 font-normal leading-relaxed mt-3">
                    Pantau kiriman kotak aspirasi warga Tanah Sareal, publikasikan laporan kinerja berbasis kanvas blok modular, serta kelola rilis berita, dokumentasi galeri, dan pengaturan halaman situs resmi.
                  </p>
                </div>

                <!-- Primary Quick Actions (Shadcn Buttons, Strictly No Pill) -->
                <div class="flex flex-wrap items-center gap-2.5 sm:gap-3 shrink-0">
                  <a
                    href="/kinerja"
                    class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2.5 shadow-sm transition-colors active:scale-98 gap-1.5"
                  >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tulis Hasil Kinerja</span>
                  </a>
                  <a
                    href="/berita"
                    class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-4 py-2.5 shadow-2xs transition-colors active:scale-98 gap-1.5"
                  >
                    <svg class="w-3.5 h-3.5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Berita</span>
                  </a>
                </div>
              </div>
            </div>
          </header>

          <!-- ========================================== -->
          <!-- 2. RINGKASAN METRIK UTAMA (4 KARTU MODUL)  -->
          <!-- ========================================== -->
          <section aria-label="Metrik Ringkasan Konten" class="w-full bg-[#fafafa] py-10 sm:py-12 border-b border-zinc-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
              <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                <!-- Metric Card 1: Hasil Kinerja -->
                <a
                  href="/kinerja"
                  class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:border-zinc-300 hover:shadow-md transition-all flex flex-col justify-between group"
                >
                  <div>
                    <div class="flex items-center justify-between mb-4">
                      <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                          />
                        </svg>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-[#fafafa] text-zinc-600 border border-zinc-200">Kanvas Blok</span>
                    </div>
                    <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">18</div>
                    <h2 class="font-bold text-sm text-zinc-950 mt-1.5 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Hasil Kinerja
                    </h2>
                    <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">18 laporan terbit di halaman publik &bull; 1 konsep tersimpan.</p>
                  </div>
                  <div class="mt-5 pt-3.5 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
                    <span>Kelola Artikel Kinerja</span>
                    <span>&rarr;</span>
                  </div>
                </a>

                <!-- Metric Card 2: Berita Resmi -->
                <a
                  href="/berita"
                  class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:border-zinc-300 hover:shadow-md transition-all flex flex-col justify-between group"
                >
                  <div>
                    <div class="flex items-center justify-between mb-4">
                      <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                          />
                        </svg>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-[#fafafa] text-zinc-600 border border-zinc-200">Rilis &amp; Media</span>
                    </div>
                    <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">18</div>
                    <h2 class="font-bold text-sm text-zinc-950 mt-1.5 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Artikel Berita
                    </h2>
                    <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">Dilengkapi atribusi sumber liputan &amp; tanggal rilis resmi.</p>
                  </div>
                  <div class="mt-5 pt-3.5 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
                    <span>Kelola Artikel Berita</span>
                    <span>&rarr;</span>
                  </div>
                </a>

                <!-- Metric Card 3: Galeri Dokumentasi -->
                <a
                  href="/galeri"
                  class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:border-zinc-300 hover:shadow-md transition-all flex flex-col justify-between group"
                >
                  <div>
                    <div class="flex items-center justify-between mb-4">
                      <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                          />
                        </svg>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-[#fafafa] text-zinc-600 border border-zinc-200">72 Foto</span>
                    </div>
                    <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">18</div>
                    <h2 class="font-bold text-sm text-zinc-950 mt-1.5 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Album Galeri
                    </h2>
                    <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">Dokumentasi kegiatan reses &amp; aksi lapangan terorganisir.</p>
                  </div>
                  <div class="mt-5 pt-3.5 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
                    <span>Kelola Album &amp; Foto</span>
                    <span>&rarr;</span>
                  </div>
                </a>

                <!-- Metric Card 4: Kotak Aspirasi Warga -->
                <a
                  href="/admin/aspirasi"
                  class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:border-zinc-300 hover:shadow-md transition-all flex flex-col justify-between group"
                >
                  <div>
                    <div class="flex items-center justify-between mb-4">
                      <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                          />
                        </svg>
                      </div>
                      <span class="inline-block text-[11px] font-bold px-2.5 py-1 rounded-md bg-red-50 text-[#BC0202] border border-red-100">2 Baru</span>
                    </div>
                    <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">24</div>
                    <h2 class="font-bold text-sm text-zinc-950 mt-1.5 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Kotak Aspirasi
                    </h2>
                    <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">2 aspirasi warga menunggu tinjauan tindak lanjut tim.</p>
                  </div>
                  <div class="mt-5 pt-3.5 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
                    <span>Buka Kotak Aspirasi</span>
                    <span>&rarr;</span>
                  </div>
                </a>
              </div>
            </div>
          </section>

          <!-- ======================================================== -->
          <!-- 3. ASPIRASI MASUK TERBARU & PINTASAN PENGATURAN HALAMAN  -->
          <!-- ======================================================== -->
          <section class="w-full bg-[#f4f4f5] py-12 sm:py-16 border-b border-zinc-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
              <div class="grid grid-cols-1 lg:grid-cols-12 gap-7 lg:gap-8 items-start">
                <!-- Left Column (7 Cols): Kotak Aspirasi Terbaru -->
                <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
                  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-5 mb-5 border-b border-zinc-100">
                    <div>
                      <h2 class="text-lg sm:text-xl font-bold text-zinc-950 tracking-tight">Kotak <span class="text-[#BC0202]">Aspirasi</span> Terbaru</h2>
                      <p class="text-xs text-zinc-500 mt-1">Klik salah satu kiriman untuk membaca rincian laporan warga secara cepat.</p>
                    </div>
                    <a
                      href="/admin/aspirasi"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-3.5 py-2 shadow-2xs transition-colors shrink-0 self-start sm:self-auto"
                    >
                      Semua Aspirasi &rarr;
                    </a>
                  </div>

                  <!-- List Aspirasi (Exact List Item Card Style from kenali.html) -->
                  <div class="space-y-3">
                    <template x-for="(item, index) in aspirations" :key="item.ticket">
                      <div
                        @click="openAspiration(item)"
                        class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors cursor-pointer group"
                      >
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-1.5">
                          <div class="flex items-center gap-2">
                            <span class="font-mono text-[11px] font-bold text-zinc-800 bg-white border border-zinc-200 px-2 py-0.5 rounded-md shadow-2xs" x-text="item.ticket"></span>
                            <span class="text-[11px] text-zinc-500 font-medium" x-text="item.date"></span>
                          </div>
                          <span
                            class="inline-block text-[11px] font-semibold px-2.5 py-0.5 rounded-md border"
                            :class="{
                              'bg-red-50 text-[#BC0202] border-red-100': item.status === 'Baru',
                              'bg-white text-zinc-800 border-zinc-200': item.status === 'Ditinjau',
                              'bg-zinc-100 text-zinc-600 border-zinc-200': item.status === 'Selesai'
                            }"
                            x-text="item.status"
                          ></span>
                        </div>

                        <h3 class="font-bold text-xs sm:text-sm text-zinc-950 group-hover:text-[#BC0202] transition-colors tracking-tight leading-snug" x-text="item.subject"></h3>

                        <div class="mt-2 flex flex-wrap items-center justify-between gap-2 text-[11px] text-zinc-500">
                          <span x-text="item.sender + ' • ' + item.address"></span>
                          <span class="font-semibold text-zinc-700 group-hover:text-[#BC0202] transition-colors">Baca Uraian &rarr;</span>
                        </div>
                      </div>
                    </template>
                  </div>
                </div>

                <!-- Right Column (5 Cols): Pengaturan Halaman Website (4 Kategori Sesuai Rencana) -->
                <div class="lg:col-span-5 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
                  <div class="pb-5 mb-5 border-b border-zinc-100">
                    <h2 class="text-lg sm:text-xl font-bold text-zinc-950 tracking-tight">Pengaturan <span class="text-[#BC0202]">Halaman</span></h2>
                    <p class="text-xs text-zinc-500 mt-1">Pintasan pengelolaan data statis halaman publik &amp; optimasi SEO.</p>
                  </div>

                  <div class="space-y-3">
                    <!-- Kategori 1: Umum -->
                    <a
                      href="pengaturan.html#umum"
                      class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3 group"
                    >
                      <div class="min-w-0 flex-1">
                        <div class="font-bold text-xs sm:text-sm text-zinc-950 group-hover:text-[#BC0202] transition-colors tracking-tight">1. Pengaturan Umum</div>
                        <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">Identitas situs, alamat Rumah Aspirasi, kontak &amp; media sosial</div>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs shrink-0">Kelola</span>
                    </a>

                    <!-- Kategori 2: Halaman Beranda -->
                    <a
                      href="pengaturan.html#beranda"
                      class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3 group"
                    >
                      <div class="min-w-0 flex-1">
                        <div class="font-bold text-xs sm:text-sm text-zinc-950 group-hover:text-[#BC0202] transition-colors tracking-tight">2. Halaman Beranda</div>
                        <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">Hero Section, Hero Image, Banner, &amp; Kolase Foto Bento</div>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs shrink-0">Kelola</span>
                    </a>

                    <!-- Kategori 3: Halaman Profil -->
                    <a
                      href="pengaturan.html#profil"
                      class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3 group"
                    >
                      <div class="min-w-0 flex-1">
                        <div class="font-bold text-xs sm:text-sm text-zinc-950 group-hover:text-[#BC0202] transition-colors tracking-tight">3. Halaman Profil (Kenali Saya)</div>
                        <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">Hero, Visi Misi, Rekam Jejak, 12 Isu, 6 Program, Kolase, Kutipan</div>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs shrink-0">Kelola</span>
                    </a>

                    <!-- Kategori 4: SEO -->
                    <a
                      href="pengaturan.html#seo"
                      class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3 group"
                    >
                      <div class="min-w-0 flex-1">
                        <div class="font-bold text-xs sm:text-sm text-zinc-950 group-hover:text-[#BC0202] transition-colors tracking-tight">4. Pengaturan SEO</div>
                        <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">Meta Title, Meta Description, Open Graph &amp; keterbacaan mesin pencari</div>
                      </div>
                      <span class="inline-block text-[11px] font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs shrink-0">Kelola</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ======================================================== -->
          <!-- 4. PUBLIKASI TERAKHIR (TAB KINERJA & BERITA RESMI)       -->
          <!-- ======================================================== -->
          <section class="w-full bg-white py-12 sm:py-16 border-b border-zinc-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
              <!-- Header + Shadcn Tab Switcher (Rounded-xl Container, Rounded-lg Buttons) -->
              <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
                <div>
                  <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight">Publikasi <span class="text-[#BC0202]">Terakhir</span></h2>
                  <p class="text-xs sm:text-sm text-zinc-600 mt-1">Daftar tulisan Hasil Kinerja dan rilis Berita yang baru diperbarui.</p>
                </div>

                <!-- Tab Pill-Free Switcher (Matches Public Pre-Scroll Nav Bar Styling) -->
                <div class="inline-flex items-center gap-1.5 bg-[#fafafa] border border-zinc-200 p-1.5 rounded-xl shadow-2xs self-start sm:self-auto">
                  <button
                    type="button"
                    @click="activeTab = 'kinerja'"
                    :class="activeTab === 'kinerja' ? 'bg-white text-zinc-950 border border-zinc-200/90 shadow-2xs font-bold' : 'text-zinc-600 hover:text-zinc-950 font-semibold'"
                    class="text-xs px-3.5 py-1.5 rounded-lg transition-all"
                  >
                    Hasil Kinerja
                  </button>
                  <button
                    type="button"
                    @click="activeTab = 'berita'"
                    :class="activeTab === 'berita' ? 'bg-white text-zinc-950 border border-zinc-200/90 shadow-2xs font-bold' : 'text-zinc-600 hover:text-zinc-950 font-semibold'"
                    class="text-xs px-3.5 py-1.5 rounded-lg transition-all"
                  >
                    Artikel Berita
                  </button>
                </div>
              </div>

              <!-- Tab Panel 1: 3 Hasil Kinerja Terakhir -->
              <div x-show="activeTab === 'kinerja'" class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6">
                <!-- Item 1 -->
                <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
                  <div>
                    <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
                      <img
                        src="/assets/banu/program_ambulance.jpg"
                        alt="Layanan Ambulance Siaga 24 Jam & Pendampingan Medis Pasien Warga"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                      />
                    </div>
                    <div class="p-5">
                      <div class="flex items-center justify-between gap-2 mb-2.5">
                        <span class="text-[11px] font-medium text-zinc-500">20 Januari 2026</span>
                        <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">Sorotan Utama</span>
                      </div>
                      <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug tracking-tight">Layanan Ambulance Siaga 24 Jam &amp; Pendampingan Medis Pasien Warga</h3>
                      <p class="text-xs text-zinc-500 mt-2">Susunan Kanvas: 6 Blok Modular (Judul, Gambar, Paragraf, List, Grid)</p>
                    </div>
                  </div>
                  <div class="px-5 pb-5 pt-2 flex items-center gap-2">
                    <a
                      href="/kinerja"
                      class="flex-1 inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2 px-3 shadow-2xs transition-colors"
                    >
                      Sunting Blok
                    </a>
                    <a
                      href="/kinerja"
                      target="_blank"
                      rel="noopener"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold py-2 px-3 transition-colors"
                      title="Pratinjau Publik"
                    >
                      Lihat
                    </a>
                  </div>
                </article>

                <!-- Item 2 -->
                <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
                  <div>
                    <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
                      <img
                        src="/assets/banu/program_umkm.jpg"
                        alt="Pendampingan Penerbitan NIB & Sertifikasi Halal Gratis untuk UMKM RT/RW"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                      />
                    </div>
                    <div class="p-5">
                      <div class="flex items-center justify-between gap-2 mb-2.5">
                        <span class="text-[11px] font-medium text-zinc-500">16 Januari 2026</span>
                        <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md bg-[#fafafa] text-zinc-700 border border-zinc-200">Terbit</span>
                      </div>
                      <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug tracking-tight">Pendampingan Penerbitan NIB &amp; Sertifikasi Halal Gratis untuk UMKM RT/RW</h3>
                      <p class="text-xs text-zinc-500 mt-2">Susunan Kanvas: 5 Blok Modular (Judul, Paragraf, Gambar, List)</p>
                    </div>
                  </div>
                  <div class="px-5 pb-5 pt-2 flex items-center gap-2">
                    <a
                      href="/kinerja"
                      class="flex-1 inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2 px-3 shadow-2xs transition-colors"
                    >
                      Sunting Blok
                    </a>
                    <a
                      href="/kinerja"
                      target="_blank"
                      rel="noopener"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold py-2 px-3 transition-colors"
                      title="Pratinjau Publik"
                    >
                      Lihat
                    </a>
                  </div>
                </article>

                <!-- Item 3 -->
                <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
                  <div>
                    <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
                      <img
                        src="/assets/banu/testi_dialog.jpg"
                        alt="Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase & Pencegahan Banjir"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                      />
                    </div>
                    <div class="p-5">
                      <div class="flex items-center justify-between gap-2 mb-2.5">
                        <span class="text-[11px] font-medium text-zinc-500">12 Januari 2026</span>
                        <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md bg-[#fafafa] text-zinc-700 border border-zinc-200">Terbit</span>
                      </div>
                      <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug tracking-tight">Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase &amp; Pencegahan Banjir</h3>
                      <p class="text-xs text-zinc-500 mt-2">Susunan Kanvas: 4 Blok Modular (Judul, Paragraf, Grid Foto)</p>
                    </div>
                  </div>
                  <div class="px-5 pb-5 pt-2 flex items-center gap-2">
                    <a
                      href="/kinerja"
                      class="flex-1 inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2 px-3 shadow-2xs transition-colors"
                    >
                      Sunting Blok
                    </a>
                    <a
                      href="/kinerja"
                      target="_blank"
                      rel="noopener"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold py-2 px-3 transition-colors"
                      title="Pratinjau Publik"
                    >
                      Lihat
                    </a>
                  </div>
                </article>
              </div>

              <!-- Tab Panel 2: 3 Artikel Berita Terakhir -->
              <div x-show="activeTab === 'berita'" x-cloak class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6">
                <!-- Berita 1 -->
                <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
                  <div>
                    <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
                      <img
                        src="/assets/banu/testi_dialog.jpg"
                        alt="Serap Aspirasi di Kebon Pedes"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                      />
                    </div>
                    <div class="p-5">
                      <div class="flex items-center justify-between gap-2 mb-2.5">
                        <span class="text-[11px] font-medium text-zinc-500">28 Februari 2026</span>
                        <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">Sorotan Berita</span>
                      </div>
                      <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug tracking-tight">Serap Aspirasi di Kebon Pedes: Pastikan Usulan Drainase &amp; PJU Masuk Prioritas</h3>
                      <p class="text-xs text-zinc-500 mt-2">Sumber: Rilis Resmi Rumah Aspirasi</p>
                    </div>
                  </div>
                  <div class="px-5 pb-5 pt-2 flex items-center gap-2">
                    <a
                      href="/berita"
                      class="flex-1 inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2 px-3 shadow-2xs transition-colors"
                    >
                      Ubah Berita
                    </a>
                    <a
                      href="/berita"
                      target="_blank"
                      rel="noopener"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold py-2 px-3 transition-colors"
                    >
                      Lihat
                    </a>
                  </div>
                </article>

                <!-- Berita 2 -->
                <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
                  <div>
                    <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
                      <img
                        src="/assets/banu/program_ambulance.jpg"
                        alt="Ambulance Siaga Banu Bagaskara Respon Cepat Rujukan Pasien Darurat"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                      />
                    </div>
                    <div class="p-5">
                      <div class="flex items-center justify-between gap-2 mb-2.5">
                        <span class="text-[11px] font-medium text-zinc-500">24 Februari 2026</span>
                        <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md bg-[#fafafa] text-zinc-700 border border-zinc-200">Terbit</span>
                      </div>
                      <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug tracking-tight">Ambulance Siaga Respon Cepat Rujukan Pasien Darurat di Kedung Badak</h3>
                      <p class="text-xs text-zinc-500 mt-2">Sumber: Tim Relawan Kesehatan 24 Jam</p>
                    </div>
                  </div>
                  <div class="px-5 pb-5 pt-2 flex items-center gap-2">
                    <a
                      href="/berita"
                      class="flex-1 inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2 px-3 shadow-2xs transition-colors"
                    >
                      Ubah Berita
                    </a>
                    <a
                      href="/berita"
                      target="_blank"
                      rel="noopener"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold py-2 px-3 transition-colors"
                    >
                      Lihat
                    </a>
                  </div>
                </article>

                <!-- Berita 3 -->
                <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
                  <div>
                    <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
                      <img
                        src="/assets/banu/program_umkm.jpg"
                        alt="Rumah Aspirasi Fasilitasi NIB Gratis"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                      />
                    </div>
                    <div class="p-5">
                      <div class="flex items-center justify-between gap-2 mb-2.5">
                        <span class="text-[11px] font-medium text-zinc-500">19 Februari 2026</span>
                        <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md bg-[#fafafa] text-zinc-700 border border-zinc-200">Terbit</span>
                      </div>
                      <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug tracking-tight">Rumah Aspirasi Fasilitasi 120+ NIB Gratis dan Pelatihan Foto Produk</h3>
                      <p class="text-xs text-zinc-500 mt-2">Sumber: Dokumentasi Sekretariat Dapil 4</p>
                    </div>
                  </div>
                  <div class="px-5 pb-5 pt-2 flex items-center gap-2">
                    <a
                      href="/berita"
                      class="flex-1 inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2 px-3 shadow-2xs transition-colors"
                    >
                      Ubah Berita
                    </a>
                    <a
                      href="/berita"
                      target="_blank"
                      rel="noopener"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold py-2 px-3 transition-colors"
                    >
                      Lihat
                    </a>
                  </div>
                </article>
              </div>
            </div>
          </section>
        </main>

        <!-- ========================================== -->
        <!-- 5. MINIMALIST ADMIN FOOTER (#000000)       -->
        <!-- ========================================== -->
        <footer class="w-full bg-[#000000] text-white py-8 border-t border-zinc-800">
          <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
              <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-[11px]">BLB</div>
              <span class="text-xs font-semibold text-zinc-300">Panel Administrasi Resmi &bull; Banu Lesmana Bagaskara, S.M.</span>
            </div>
            <div class="text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
          </div>
        </footer>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- MODAL PRATINJAU CEPAT ASPIRASI WARGA (Shadcn Dialog)     -->
    <!-- ======================================================== -->
    <div
      x-show="previewModal"
      x-cloak
      role="dialog"
      aria-modal="true"
      aria-labelledby="modal-aspirasi-title"
      class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-zinc-950/75 backdrop-blur-sm"
    >
      <div @click.away="closeAspiration()" class="bg-white border border-zinc-200 text-zinc-950 rounded-2xl shadow-2xl max-w-xl w-full overflow-hidden">
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-[#faf5f5] border-b border-zinc-200 flex items-center justify-between gap-4">
          <div class="flex items-center gap-2.5 min-w-0">
            <span class="font-mono text-xs font-bold text-[#BC0202] bg-white border border-red-200 px-2.5 py-1 rounded-md" x-text="selectedAspiration?.ticket"></span>
            <span class="text-xs text-zinc-500 font-medium truncate" x-text="selectedAspiration?.date"></span>
          </div>
          <button
            type="button"
            @click="closeAspiration()"
            aria-label="Tutup Rincian Aspirasi"
            class="rounded-lg p-1.5 text-zinc-500 hover:text-zinc-950 hover:bg-zinc-200/60 transition-colors"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 space-y-4 text-xs sm:text-sm">
          <div>
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-400 block">Subjek Aspirasi</span>
            <h3 id="modal-aspirasi-title" class="font-bold text-base text-zinc-950 mt-1 leading-snug" x-text="selectedAspiration?.subject"></h3>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 p-3.5 rounded-xl bg-[#fafafa] border border-zinc-200/90 text-xs">
            <div>
              <span class="text-[11px] font-semibold text-zinc-500 block">Pengirim</span>
              <span class="font-bold text-zinc-950 mt-0.5 block" x-text="selectedAspiration?.sender"></span>
            </div>
            <div>
              <span class="text-[11px] font-semibold text-zinc-500 block">Nomor Telepon / WA</span>
              <span class="font-bold text-zinc-950 mt-0.5 block" x-text="selectedAspiration?.phone"></span>
            </div>
            <div class="sm:col-span-2 pt-2 border-t border-zinc-200/70">
              <span class="text-[11px] font-semibold text-zinc-500 block">Alamat Domisili</span>
              <span class="font-medium text-zinc-800 mt-0.5 block" x-text="selectedAspiration?.address"></span>
            </div>
          </div>

          <div>
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-1.5">Uraian Lengkap</span>
            <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed bg-white p-4 rounded-xl border border-zinc-200" x-text="selectedAspiration?.description"></p>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 bg-[#fafafa] border-t border-zinc-200 flex items-center justify-between gap-3">
          <button
            type="button"
            @click="closeAspiration()"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-4 py-2 shadow-2xs transition-colors"
          >
            Tutup
          </button>
          <a
            href="/admin/aspirasi"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors"
          >
            Kelola di Kotak Aspirasi &rarr;
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
