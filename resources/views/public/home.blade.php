<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Banu Lesmana Bagaskara | Beranda Resmi</title>
    <meta name="description" content="Website resmi Banu Lesmana Bagaskara, S.M., Anggota DPRD Kota Bogor Terpilih 2024–2029 (Dapil 4 Tanah Sareal, PDI Perjuangan). Bogor Lebih Baik: Maju dan Nyaman untuk Semua." />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI (Tab Switching & Mobile Navigation) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind & Shadcn Configuration -->
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
  <body class="min-h-screen w-full flex flex-col bg-white overflow-x-hidden" x-data="{ isScrolled: false, mobileMenu: false }" @scroll.window="isScrolled = (window.pageYOffset > 80)">
    <!-- Main Website Canvas Container: Full Screen Edge-to-Edge -->
    <main class="w-full flex flex-col flex-1 overflow-x-hidden">
      <!-- ======================================================== -->
      <!-- POST-SCROLL STICKY NAVBAR (ONLY NAVIGATION LINKS)        -->
      <!-- ======================================================== -->
      <div class="fixed top-3 sm:top-4 left-0 right-0 w-full z-50 flex justify-center pointer-events-none" x-cloak>
        <div
          x-show="isScrolled"
          x-transition:enter="transition-all duration-500 cubic-bezier(0.16, 1, 0.3, 1)"
          x-transition:enter-start="opacity-0 scale-x-50 scale-y-90 -translate-y-2"
          x-transition:enter-end="opacity-100 scale-x-100 scale-y-100 translate-y-0"
          x-transition:leave="transition-all duration-300 ease-in"
          x-transition:leave-start="opacity-100 scale-x-100 scale-y-100 translate-y-0"
          x-transition:leave-end="opacity-0 scale-x-50 scale-y-90 -translate-y-2"
          class="w-[calc(100%-2rem)] max-w-7xl pointer-events-auto origin-center flex justify-center"
        >
          <nav class="w-full sm:w-auto bg-white/95 backdrop-blur-md border border-zinc-200/90 py-2 sm:py-2.5 px-4 sm:px-8 rounded-xl sm:rounded-2xl shadow-md mx-auto">
            <!-- Desktop: ONLY Navigation Links Centered across full content width -->
            <div class="hidden lg:flex items-center justify-center gap-3 xl:gap-6 w-full">
              <a href="/" class="text-xs font-semibold px-4 py-2 text-zinc-950 bg-zinc-100 rounded-lg transition-colors shrink-0">Beranda</a>
              <a href="/kenali" class="text-xs font-semibold px-4 py-2 text-zinc-600 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors shrink-0">Profil</a>
              <a href="/kinerja" class="text-xs font-semibold px-4 py-2 text-zinc-600 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors shrink-0">Kinerja</a>
              <a href="/berita" class="text-xs font-semibold px-4 py-2 text-zinc-600 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors shrink-0">Berita</a>
              <a href="/galeri" class="text-xs font-semibold px-4 py-2 text-zinc-600 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors shrink-0">Galeri</a>
              <a href="/kontak" class="text-xs font-semibold px-4 py-2 text-zinc-600 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors shrink-0">Kontak</a>
            </div>

            <!-- Mobile / Tablet (< lg): Compact Nav Pill on Scroll -->
            <div class="lg:hidden flex items-center justify-between w-full px-1">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#BC0202]"></span>
                <span class="text-xs font-bold text-zinc-900 tracking-tight">Navigasi Banu Lesmana</span>
              </div>
              <button
                @click="mobileMenu = !mobileMenu"
                aria-label="Buka Menu"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 py-1 shadow-2xs transition-colors active:bg-zinc-200"
              >
                <svg class="w-3.5 h-3.5 text-zinc-700 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Menu
              </button>
            </div>
          </nav>
        </div>
      </div>

      <!-- ========================================== -->
      <!-- 1. HERO SECTION (Split 50/50 Layout)       -->
      <!-- ========================================== -->
      <section class="w-full grid grid-cols-1 lg:grid-cols-2 relative min-h-[580px] lg:min-h-[660px] xl:min-h-[720px] border-b border-zinc-200">
        <!-- Hero Left: Solid Light Background (Strictly No Gradient) -->
        <div class="bg-[#faf5f5] px-6 sm:px-10 md:px-14 lg:pl-12 lg:pr-10 xl:pl-20 xl:pr-16 2xl:pl-32 2xl:pr-24 pt-7 sm:pt-10 pb-12 sm:pb-16 flex flex-col justify-between relative overflow-hidden">
          <!-- Top Nav Header: Logo & Mobile Menu Toggle -->
          <header class="flex items-center justify-between z-10 w-full mb-8 sm:mb-10 gap-2">
            <a href="#" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
              <!-- Official Parliamentary / Democratic Red Mark (No Pill, Rounded-lg) -->
              <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm sm:text-base shadow-sm shrink-0">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                  <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
              </div>
              <div class="flex flex-col leading-tight min-w-0 flex-1">
                <span class="font-bold text-sm sm:text-base lg:text-lg tracking-tight text-zinc-950 truncate">banubagaskara.</span>
              </div>
            </a>

            <!-- Menu Button for Mobile & Tablet (< lg) - Shadcn Button (No Pill) -->
            <div class="lg:hidden shrink-0 ml-2">
              <button
                @click="mobileMenu = !mobileMenu"
                aria-label="Buka Menu"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200"
              >
                <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="hidden sm:inline ml-1.5">Menu</span>
              </button>
            </div>
          </header>

          <!-- Mobile Navigation Drawer Overlay (Alpine.js) -->
          <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
            <nav class="flex flex-col space-y-3 text-sm font-medium text-zinc-800">
              <a href="/" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Beranda</a>
              <a href="/kenali" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Profil (Kenali Banu)</a>
              <a href="/kinerja" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja</a>
              <a href="/berita" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita &amp; Rilis Pers</a>
              <a href="/galeri" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Dokumentasi</a>
              <a href="/kontak" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Rumah Aspirasi &amp; Kontak</a>
              <div class="pt-2 border-t border-zinc-100">
                <a href="/kontak#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold"> Sampaikan Aspirasi </a>
              </div>
            </nav>
          </div>

          <!-- Hero Content Block -->
          <div class="my-auto pt-2 sm:pt-6 pb-4 z-10 max-w-xl">
            <!-- Main Slogan & Headline (Disciplined Sans-Serif Typography) -->
            <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[40px] xl:text-[48px] text-zinc-950 font-bold leading-[1.15] tracking-tight">
              Bogor <span class="text-[#BC0202]">Lebih</span> Baik:<br />Maju &amp; <span class="text-[#BC0202]">Nyaman</span> untuk <span class="text-[#BC0202]">Semua</span>
            </h1>

            <!-- Subtitle / Manifesto -->
            <p class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-zinc-600 font-normal leading-relaxed mt-4 sm:mt-5 max-w-[460px]">
              Hadir dan bekerja nyata bareng warga Tanah Sareal—mulai dari siaga ambulance gratis 24 jam, ngawal usulan lingkungan di gedung dewan, sampai mastiin anggaran kota beneran balik buat kebutuhan kita bersama.
            </p>

            <!-- CTA Buttons: Shadcn Button Style (Strictly No Pill) -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 mt-7 sm:mt-9">
              <a
                href="/kontak"
                class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-sm transition-colors active:scale-98 text-center"
              >
                Sampaikan Aspirasi
              </a>
              <a
                href="#program"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-2xs transition-colors active:scale-98 text-center"
              >
                Kenali Banu Bagaskara
              </a>
            </div>
          </div>

          <!-- Spacer for vertical alignment -->
          <div class="h-2"></div>
        </div>

        <!-- Hero Right: Edge-to-Edge Photo Side with Top-Right Menu Button on Desktop -->
        <div class="relative min-h-[360px] sm:min-h-[440px] lg:min-h-full w-full bg-zinc-100 overflow-hidden">
          <img src="/assets/banu/hero_banu.jpg" alt="Banu Lesmana Bagaskara, S.M. - Anggota DPRD Kota Bogor" class="w-full h-full object-cover object-top filter grayscale contrast-105 hover:grayscale-0 transition-all duration-500" />

          <!-- Desktop Pre-Scroll Navigation Bar (Rounded-xl container, No Pill) -->
          <div class="hidden lg:block absolute top-8 right-8 xl:top-10 xl:right-14 2xl:right-20 z-20">
            <nav class="flex items-center gap-1.5 bg-white/95 border border-zinc-200 p-1.5 rounded-xl shadow-sm">
              <a href="/" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Beranda</a>
              <a href="/kenali" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Profil</a>
              <a href="/kinerja" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
              <a href="/berita" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Berita</a>
              <a href="/galeri" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
              <a href="/kontak" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kontak</a>
            </nav>
          </div>
        </div>
      </section>

      <!-- ======================================================== -->
      <!-- 2. BANNER SERBAGUNA (FULL GAMBAR RESPONSIF)              -->
      <!-- ======================================================== -->
      <section class="w-full bg-zinc-950 border-b border-zinc-200">
        <div class="w-full max-w-[1920px] mx-auto overflow-hidden">
          <img
            src="/assets/banu/banner_serbaguna.jpg"
            alt="Banner Resmi Banu Lesmana Bagaskara, S.M. - Bogor Lebih Baik: Maju dan Nyaman untuk Semua"
            class="w-full h-auto object-cover min-h-[160px] sm:min-h-[220px] md:min-h-[280px] lg:min-h-[340px] xl:min-h-[400px] transition-transform duration-500 group-hover:scale-[1.008]"
            loading="lazy"
          />
        </div>
      </section>

      <!-- ======================================================== -->
      <!-- 3. HASIL KINERJA & BERITA TERKINI (Desain Asli Terjaga)   -->
      <!-- ======================================================== -->
      <section id="kinerja" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16 flex flex-col items-center">
          <!-- Section Header -->
          <div class="text-center max-w-2xl mb-10">
            <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Hasil <span class="text-[#BC0202]">Kinerja</span> &amp;<br /><span class="text-[#BC0202]">Berita</span> Terkini</h2>
          </div>

          <!-- Featured Action Blocks (Two Rows 1:1 with Reference Design - Bentuk Desain Tidak Berubah) -->
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
            <!-- Left: Narrative (Tanggal, Judul, Deskripsi line-clamp-3, Button) -->
            <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
              <div>
                <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                  <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>{{ isset($featuredReports[0]) && $featuredReports[0]->published_at ? $featuredReports[0]->published_at->translatedFormat('d F Y') : '20 Januari 2026' }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">
                  {{ $featuredReports[0]->title ?? 'Ambulance Siaga 24 Jam & Pendampingan Administrasi Pasien BPJS Bebas Biaya' }}
                </h2>
                <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                  {{ $featuredReports[0]->excerpt ?? 'Menyikapi keluhan mendesak warga saat mengalami sakit parah di jam-jam genting, Banu Lesmana Bagaskara menyiagakan unit ambulans darurat gratis yang siap beroperasi 24 jam penuh di wilayah Kecamatan Tanah Sareal. Armada ini didukung relawan medis yang turut mengadvokasi perolehan kamar dan jaminan BPJS PBI di RSUD Kota Bogor.' }}
                </p>
              </div>

              <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
                <a href="{{ isset($featuredReports[0]) ? route('kinerja.show', $featuredReports[0]->slug) : route('kinerja.index') }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Right: Cover Image -->
            <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
              <img src="{{ isset($featuredReports[0]) && $featuredReports[0]->cover_image ? (str_starts_with($featuredReports[0]->cover_image, '/') || str_starts_with($featuredReports[0]->cover_image, 'http') ? $featuredReports[0]->cover_image : '/' . $featuredReports[0]->cover_image) : '/assets/banu/program_ambulance.jpg' }}" alt="{{ $featuredReports[0]->title ?? 'Ambulance Siaga 24 Jam Banu Bagaskara' }}" class="w-full h-full object-cover" />
            </div>

            <!-- Left: Narrative (Tanggal, Judul, Deskripsi line-clamp-3, Button) -->
            <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
              <div>
                <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                  <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>{{ isset($latestNews[0]) && $latestNews[0]->published_at ? $latestNews[0]->published_at->translatedFormat('d F Y') : '28 Februari 2026' }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">
                  {{ $latestNews[0]->title ?? 'Serap Aspirasi di Kebon Pedes: Banu Lesmana Pastikan Usulan Drainase & PJU Masuk Prioritas APBD Perubahan' }}
                </h2>
                <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                  {{ $latestNews[0]->description ?? 'Dalam agenda tatap muka bersama puluhan ketua RT, RW, dan tokoh masyarakat di Kebon Pedes, Anggota DPRD Kota Bogor Banu Lesmana Bagaskara menegaskan komitmennya untuk langsung mengawal kendala banjir genangan ke dinas terkait agar penanganannya masuk dokumen pokok pikiran dewan tahun 2026.' }}
                </p>
              </div>

              <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
                <a href="{{ isset($latestNews[0]) ? route('berita.show', $latestNews[0]->slug) : route('berita.index') }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Right: Cover Image -->
            <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
              <img src="{{ isset($latestNews[0]) && $latestNews[0]->cover_image ? (str_starts_with($latestNews[0]->cover_image, '/') || str_starts_with($latestNews[0]->cover_image, 'http') ? $latestNews[0]->cover_image : '/' . $latestNews[0]->cover_image) : '/assets/banu/testi_dialog.jpg' }}" alt="{{ $latestNews[0]->title ?? 'Dialog Aspirasi Warga bersama Banu Bagaskara' }}" class="w-full h-full object-cover" />
            </div>
          </div>
        </div>
      </section>

      <!-- ======================================================== -->
      <!-- 4. 6 PROGRAM PENGABDIAN UTAMA (Komitmen Dewan)          -->
      <!-- ======================================================== -->
      <section id="program" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Section Header -->
          <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 sm:mb-14 gap-6">
            <div class="max-w-2xl">
              <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">
                Enam <span class="text-[#BC0202]">Program</span> Nyata untuk<br /><span class="text-[#BC0202]">Warga</span> Kota <span class="text-[#BC0202]">Bogor</span>
              </h2>
            </div>
          </div>

          <!-- 6 Program Cards Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
            <!-- Program 1: Rumah Aspirasi Rakyat -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <div class="flex items-center justify-between mb-4">
                  <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                  </div>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> Rumah Aspirasi Rakyat</h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                  Pusat advokasi terbuka di Kedung Badak untuk menampung, memverifikasi, dan memperjuangkan seluruh keluhan serta usulan pembangunan warga Tanah Sareal ke instansi terkait.
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
                <span>Lokasi: Kelurahan Kedung Badak</span>
              </div>
            </div>

            <!-- Program 2: Ambulance Siaga & Relawan Pendamping 24 Jam -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <div class="flex items-center justify-between mb-4">
                  <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                  </div>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> Ambulance Siaga 24 Jam</h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                  Armada ambulans operasional dan relawan pendamping medis darurat siaga 24 jam bebas biaya untuk mengantar pasien darurat serta mengawal administrasi BPJS di RSUD Kota Bogor.
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
                <span>Siaga Darurat 24 Jam Gratis</span>
              </div>
            </div>

            <!-- Program 3: Mendorong E-Government & Transparansi APBD -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <div class="flex items-center justify-between mb-4">
                  <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                  </div>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> Mendorong E-Government</h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                  Mendorong integrasi layanan birokrasi digital dan transparansi anggaran APBD Kota Bogor agar akuntabel, efisien, serta terbebas dari pemborosan dan kebocoran dana rakyat.
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
                <span>Transparansi &amp; Efisiensi Anggaran</span>
              </div>
            </div>

            <!-- Program 4: Wajib Belajar Anak Kota Bogor -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <div class="flex items-center justify-between mb-4">
                  <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                  </div>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> Wajib Belajar Anak</h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                  Memastikan tidak ada anak Kota Bogor yang putus sekolah melalui advokasi alokasi beasiswa siswa prasejahtera, tebus ijazah tertahan, serta pemerataan mutu pendidikan.
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
                <span>Nol Anak Putus Sekolah</span>
              </div>
            </div>

            <!-- Program 5: Kota Bogor Tanpa Tawuran -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <div class="flex items-center justify-between mb-4">
                  <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                      />
                    </svg>
                  </div>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> Kota Bogor Tanpa Tawuran</h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                  Pembinaan karakter pemuda berbasis komunitas melalui wadah keilmuan, riset, fasilitas olahraga positif, dan pelatihan ketenagakerjaan untuk membasmi tawuran antar pelajar.
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
                <span>Ruang Kreatif &amp; Olahraga Pemuda</span>
              </div>
            </div>

            <!-- Program 6: Digitalisasi UMKM Berbasis RT/RW -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <div class="flex items-center justify-between mb-4">
                  <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                  </div>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> Digitalisasi UMKM RT/RW</h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                  Mendorong kemandirian ekonomi warga melalui fasilitasi Nomor Induk Berusaha (NIB) gratis, sertifikasi produk, pelatihan foto digital, serta akses kemitraan modal usaha rakyat.
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
                <span>Legalitas &amp; Pemasaran Usaha Rakyat</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ======================================================== -->
      <!-- 5. KOLASE FOTO DOKUMENTASI (BENTO UI STYLE)              -->
      <!-- ======================================================== -->
      <section id="dokumentasi" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Section Header -->
          <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 sm:mb-12 gap-6">
            <div class="max-w-2xl">
              <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Dokumentasi <span class="text-[#BC0202]">Aksi</span> Nyata di <span class="text-[#BC0202]">Lapangan</span></h2>
            </div>
            <div class="shrink-0">
              <a href="/galeri" class="inline-flex items-center justify-center rounded-lg bg-white border border-zinc-300 hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-2xs transition-colors">
                Lihat Seluruh Galeri Foto &rarr;
              </a>
            </div>
          </div>

          <!-- Bento UI Grid: Modular layout with varying card spans -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-5">
            <!-- Bento Card 1 (Large Feature Card: Spans 7 cols on lg, 2 rows) -->
            <div class="lg:col-span-7 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[320px] sm:min-h-[380px] lg:min-h-[420px] flex flex-col justify-end">
              <img src="/assets/banu/testi_dialog.jpg" alt="Dialog Aspirasi Warga Kebon Pedes" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
              <!-- Contrast Gradient Overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
            </div>

            <!-- Bento Card 2 (Spans 5 cols on lg, Medium Height) -->
            <div class="lg:col-span-5 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[250px] sm:min-h-[300px] lg:min-h-[420px] flex flex-col justify-end">
              <img src="/assets/banu/program_ambulance.jpg" alt="Operasional Ambulance Siaga 24 Jam" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
              <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
            </div>

            <!-- Bento Card 3 (Spans 4 cols on lg) -->
            <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
              <img src="/assets/banu/program_umkm.jpg" alt="Pelatihan Digitalisasi UMKM RT/RW" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
              <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
            </div>

            <!-- Bento Card 4 (Spans 4 cols on lg) -->
            <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
              <img src="/assets/banu/footer_community.jpg" alt="Rembug Guyub Komunitas Warga" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
              <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
            </div>

            <!-- Bento Card 5 (Spans 4 cols on lg) -->
            <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
              <img src="/assets/banu/hero_banu.jpg" alt="Sidang Paripurna & Pengawasan APBD di Parlemen" class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" />
              <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
            </div>
          </div>
        </div>
      </section>

      <!-- ======================================================== -->
      <!-- 6. TESTIMONI -> SUARA & ASPIRASI WARGA (Video Dihapus)   -->
      <!-- ======================================================== -->
      <section id="suara-warga" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Section Header -->
          <div class="max-w-2xl mb-10">
            <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Testimoni <span class="text-[#BC0202]">Banu</span> Lesmana <span class="text-[#BC0202]">Bagaskara</span></h2>
          </div>

          <!-- 3 Testimonial Cards Grid (Strictly No Video, All Authentic Quotes) -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 items-stretch">
            <!-- Card 1: Warga Kedung Badak -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between min-h-[240px]">
              <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed">
                &ldquo;Waktu keluarga kami membutuhkan rujukan darurat tengah malam, tim Ambulance Siaga Rumah Aspirasi langsung sigap datang menjemput dan mengawal proses administrasi di RSUD tanpa biaya sepeser pun. Nyata manfaatnya bagi
                warga kecil.&rdquo;
              </p>
              <div class="flex items-center gap-3 mt-6 pt-5 border-t border-zinc-200/60">
                <div class="flex flex-col">
                  <span class="font-bold text-xs sm:text-sm text-zinc-950">Ibu Suryati Ningsih</span>
                  <span class="text-[11px] text-zinc-500">Warga Kel. Kedung Badak, Tanah Sareal</span>
                </div>
              </div>
            </div>

            <!-- Card 2: Bpk. Rahmat Hidayat (Quote Card - Video Dihapus) -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between min-h-[240px]">
              <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed">
                &ldquo;Saat kami menyampaikan masalah drainase gang yang kerap meluap ketika hujan lebat di Kebon Pedes, beliau langsung turun meninjau bersama dinas terkait. Responnya cepat dan komunikasinya sangat terbuka tanpa birokrasi
                berbelit.&rdquo;
              </p>
              <div class="flex items-center gap-3 mt-6 pt-5 border-t border-zinc-200/60">
                <div class="flex flex-col">
                  <span class="font-bold text-xs sm:text-sm text-zinc-950">Bpk. Rahmat Hidayat</span>
                  <span class="text-[11px] text-zinc-500">Ketua RW 05, Kel. Kebon Pedes</span>
                </div>
              </div>
            </div>

            <!-- Card 3: Warga Sukadamai -->
            <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between min-h-[240px]">
              <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed">
                &ldquo;Usulan perbaikan drainase lingkungan dan penerangan jalan gang yang kami sampaikan di reses dewan benar-benar dikawal serius hingga masuk prioritas realisasi APBD Kota Bogor. Komunikatif dan tidak berjarak dengan
                warga.&rdquo;
              </p>
              <div class="flex items-center gap-3 mt-6 pt-5 border-t border-zinc-200/60">
                <div class="flex flex-col">
                  <span class="font-bold text-xs sm:text-sm text-zinc-950">Bpk. Hendra Gunawan</span>
                  <span class="text-[11px] text-zinc-500">Tokoh Masyarakat Kel. Sukadamai</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ======================================================== -->
      <!-- CTA KOTAK ASPIRASI (MINIMALIS)                           -->
      <!-- ======================================================== -->
      <section class="w-full bg-[#fafafa] py-14 sm:py-16 border-t border-b border-zinc-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 tracking-tight">Ada Masukan atau Keluhan di Lingkunganmu?</h2>
          <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 max-w-xl mx-auto leading-relaxed">Sampaikan usulan perbaikan jalan, lampu mati, saluran air, atau keluhan lainnya langsung ke Kotak Aspirasi Warga.</p>

          <div class="mt-7 max-w-lg mx-auto" x-data="{ sent: false }">
            <form @submit.prevent="sent = true" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
              <a href="/kontak" class="w-full rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors shrink-0 active:scale-98">Kirim Aspirasi</a>
            </form>
          </div>
        </div>
      </section>

      <!-- ========================================== -->
      <!-- 6. FOOTER SECTION                          -->
      <!-- ========================================== -->
      <footer id="kontak" class="w-full bg-[#000000] text-white pt-14 sm:pt-16 pb-12 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Top Columns Links Grid (Minimalis: Disederhanakan & Tanpa Elemen Berlebih) -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pb-10 border-b border-zinc-800">
            <!-- Column 1: Navigasi Portal -->
            <div class="min-w-0">
              <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 text-zinc-300">Navigasi Portal</h4>
              <ul class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-xs text-zinc-400">
                <li><a href="/" class="hover:text-white transition-colors">Beranda Utama</a></li>
                <li><a href="/kenali" class="hover:text-white transition-colors">Biografi &amp; Visi Misi</a></li>
                <li><a href="/kinerja" class="hover:text-white transition-colors">Laporan Kinerja</a></li>
                <li><a href="/berita" class="hover:text-white transition-colors">Berita &amp; Rilis</a></li>
                <li><a href="/galeri" class="hover:text-white transition-colors">Galeri Dokumentasi</a></li>
                <li><a href="/kontak" class="hover:text-white transition-colors">Rumah Aspirasi</a></li>
              </ul>
            </div>

            <!-- Column 2: Kontak & Media Sosial -->
            <div class="min-w-0">
              <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 text-zinc-300">Media Sosial &amp; Kontak</h4>
              <ul class="space-y-2 text-xs text-zinc-400">
                <li>
                  <a href="https://instagram.com/banubagaskara" target="_blank" rel="noopener" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span class="text-[#BC0202] font-bold">&bull;</span> Instagram: @banubagaskara
                  </a>
                </li>
                <li>
                  <a href="https://tiktok.com/@banubagaskara" target="_blank" rel="noopener" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span class="text-[#BC0202] font-bold">&bull;</span> TikTok: @banubagaskara
                  </a>
                </li>
                <li>
                  <a href="https://facebook.com/banubgsk" target="_blank" rel="noopener" class="hover:text-white transition-colors flex items-center gap-1.5"> <span class="text-[#BC0202] font-bold">&bull;</span> Facebook: banubgsk </a>
                </li>
                <li class="pt-1 text-[11px] text-zinc-400">Kelurahan Kedung Badak, Kec. Tanah Sareal, Kota Bogor, Jawa Barat.</li>
              </ul>
            </div>
          </div>

          <!-- Bottom Row: Brand Slogan + Banner Full Gambar (Menggantikan Kotak Aspirasi) -->
          <div id="aspirasi" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pt-10">
            <!-- Left: Slogan & Formal Entity -->
            <div class="lg:col-span-5 flex flex-col justify-between">
              <h3 class="text-2xl sm:text-3xl text-white font-bold leading-tight tracking-tight mb-4">Bogor Lebih Baik:<br />Maju &amp; Nyaman untuk Semua</h3>
              <div class="flex items-center gap-3 text-white">
                <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">BLB</div>
                <div class="flex flex-col leading-tight">
                  <span class="font-bold text-sm tracking-tight text-white">Banu Lesmana Bagaskara</span>
                </div>
              </div>
            </div>

            <!-- Right: Banner Full Gambar (Menggantikan Kotak Form Aspirasi Online) -->
            <div class="lg:col-span-7 rounded-xl border border-zinc-800 overflow-hidden shadow-sm aspect-[16/9] sm:aspect-[21/9] lg:aspect-auto lg:h-64 bg-zinc-900 group">
              <img src="/assets/banu/footer_community.jpg" alt="Banner Aspirasi Warga Tanah Sareal bersama Banu Lesmana Bagaskara" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
            </div>
          </div>

          <!-- Copyright Minimalis -->
          <div class="pt-8 mt-10 border-t border-zinc-800 text-center text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
        </div>
      </footer>
    </main>
  </body>
</html>
