<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Kinerja &amp; Laporan Parlemen | Banu Lesmana Bagaskara, S.M.</title>
    <meta name="description" content="Laporan resmi hasil kinerja, advokasi kebijakan, dan realisasi 6 Program Pengabdian Banu Lesmana Bagaskara, S.M. (Anggota DPRD Kota Bogor 2024–2029, Dapil 4 Tanah Sareal, PDI Perjuangan)." />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind & Shadcn Configuration (100% Consistent) -->
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
      <!-- 1. HEADER & HERO SECTION (Kinerja)         -->
      <!-- ========================================== -->
      <header class="w-full bg-[#faf5f5] border-b border-zinc-200 pt-7 sm:pt-9 pb-12 sm:pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Top Nav Bar: Logo & Navigation Links -->
          <div class="flex items-center justify-between z-10 w-full mb-10 sm:mb-14 gap-2">
            <a href="/" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
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
            <!-- Desktop Navigation Bar (Pre-scroll) -->
            <div class="hidden lg:block shrink-0">
              <nav class="flex items-center gap-1.5 bg-white/95 border border-zinc-200 p-1.5 rounded-xl shadow-sm">
                <a href="/" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
                <a href="/kenali" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Profil</a>
                <a href="/kinerja" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Kinerja</a>
                <a href="/berita" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Berita</a>
                <a href="/galeri" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
                <a href="/kontak" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kontak</a>
              </nav>
            </div>

            <!-- Menu Button for Mobile & Tablet (< lg) - Shadcn Button (No Pill, Rounded-lg) -->
            <div class="lg:hidden shrink-0 ml-2">
              <button
                @click="mobileMenu = !mobileMenu"
                aria-label="Buka Menu"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200"
              >
                <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="hidden sm:inline ml-1.5">Menu</span>
              </button>
            </div>
          </div>

          <!-- Mobile Navigation Drawer Overlay (Alpine.js - Rounded-xl) -->
          <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
            <nav class="flex flex-col space-y-3 text-sm font-medium text-zinc-800">
              <a href="/" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
              <a href="/kenali" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Profil (Kenali Banu)</a>
              <a href="/kinerja" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Hasil Kinerja</a>
              <a href="/berita" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita &amp; Rilis Pers</a>
              <a href="/galeri" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Dokumentasi</a>
              <a href="/kontak" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Rumah Aspirasi &amp; Kontak</a>
              <div class="pt-2 border-t border-zinc-100">
                <a href="/kontak#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold"> Sampaikan Aspirasi </a>
              </div>
            </nav>
          </div>

          <!-- Hero Content (Editorial Header, No Badge) -->
          <div class="max-w-3xl">
            <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[42px] text-zinc-950 font-bold leading-[1.16] tracking-tight">Hasil <span class="text-[#BC0202]">Kinerja</span></h1>
          </div>
        </div>
      </header>

      <!-- ========================================== -->
      <!-- 2. SOROTAN KINERJA UTAMA                   -->
      <!-- ========================================== -->
      <section class="w-full bg-[#fafafa] py-14 sm:py-16 lg:py-20 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
            <!-- Left: Narrative (Tanggal, Judul, Deskripsi line-clamp-3, Button) -->
            <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
              <div>
                <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                  <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>{{ $featuredReport && $featuredReport->published_at ? $featuredReport->published_at->translatedFormat('d F Y') : '20 Januari 2026' }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">{{ $featuredReport->title ?? 'Ambulance Siaga 24 Jam & Pendampingan Administrasi Pasien BPJS Bebas Biaya' }}</h2>
                <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                  {{ $featuredReport->excerpt ?? 'Menyikapi keluhan mendesak warga saat mengalami sakit parah di jam-jam genting, Banu Lesmana Bagaskara menyiagakan unit ambulans darurat gratis yang siap beroperasi 24 jam penuh di wilayah Kecamatan Tanah Sareal. Armada ini didukung relawan medis yang turut mengadvokasi perolehan kamar dan jaminan BPJS PBI di RSUD Kota Bogor.' }}
                </p>
              </div>

              <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
                <a href="{{ $featuredReport ? route('kinerja.show', $featuredReport->slug) : '#daftar-laporan' }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Right: Cover Image -->
            <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
              <img src="{{ $featuredReport && $featuredReport->cover_image ? (str_starts_with($featuredReport->cover_image, '/') || str_starts_with($featuredReport->cover_image, 'http') ? $featuredReport->cover_image : '/' . $featuredReport->cover_image) : '/assets/banu/program_ambulance.jpg' }}" alt="{{ $featuredReport->title ?? 'Ambulance Siaga 24 Jam Banu Bagaskara' }}" class="w-full h-full object-cover" />
            </div>
          </div>
        </div>
      </section>

      <!-- ========================================== -->
      <!-- 3. DAFTAR LAPORAN KINERJA (PAGINATION 9)   -->
      <!-- ========================================== -->
      <section
        id="daftar-laporan"
        class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200"
        x-data="{ 
        currentPage: 1, 
        totalPages: 2,
        scrollToTop() {
          const el = document.getElementById('daftar-laporan');
          if (el) {
            const topOffset = el.getBoundingClientRect().top + window.pageYOffset - 80;
            window.scrollTo({ top: topOffset, behavior: 'smooth' });
          }
        }
      }"
      >
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Section Header -->
          <div class="max-w-2xl mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Hasil <span class="text-[#BC0202]">Kerja</span> Nyata di <span class="text-[#BC0202]">Lapangan</span></h2>
          </div>

          <!-- 9 Cards Grid (Responsive Mobile, Tablet, Desktop) -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-7 items-stretch">
            <!-- Card 1 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_ambulance.jpg"
                    alt="Layanan Ambulance Siaga 24 Jam & Pendampingan Medis Pasien Warga"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>20 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Layanan Ambulance Siaga 24 Jam & Pendampingan Medis Pasien Warga</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Pengoperasian armada ambulans darurat gratis 24 jam penuh di wilayah Kecamatan Tanah Sareal untuk membantu warga yang membutuhkan rujukan mendesak ke rumah sakit serta pendampingan administrasi kepesertaan jaminan
                    kesehatan.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 2 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_umkm.jpg"
                    alt="Pendampingan Penerbitan NIB & Sertifikasi Halal Gratis untuk UMKM RT/RW"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>16 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pendampingan Penerbitan NIB & Sertifikasi Halal Gratis untuk UMKM RT/RW</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Fasilitasi legalitas usaha mikro dan pedagang kecil di Tanah Sareal melalui pengurusan Nomor Induk Berusaha (NIB) gratis, sertifikasi produk halal, serta pelatihan pemasaran digital agar produk lokal mampu bersaing.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 3 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase & Pencegahan Banjir"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>12 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase & Pencegahan Banjir</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Mengawal langsung usulan warga dari forum reses agar masuk ke dalam rencana kerja anggaran daerah untuk perbaikan dan normalisasi drainase gang pemukiman yang kerap meluap saat intensitas hujan tinggi.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 4 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/banner_serbaguna.jpg"
                    alt="Mendorong Transparansi Alokasi Belanja Publik Raperda APBD Kota Bogor"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>08 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Mendorong Transparansi Alokasi Belanja Publik Raperda APBD Kota Bogor</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Memperjuangkan efisiensi dan transparansi anggaran daerah di Badan Anggaran DPRD agar pos belanja publik lebih diprioritaskan untuk pemenuhan hak dasar warga, layanan kesehatan, dan infrastruktur lingkungan.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 5 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/hero_banu.jpg"
                    alt="Advokasi Beasiswa Pendidikan & Fasilitasi Tebus Ijazah Siswa Prasejahtera"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>27 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Advokasi Beasiswa Pendidikan & Fasilitasi Tebus Ijazah Siswa Prasejahtera</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Memperjuangkan akses kuota beasiswa daerah bagi anak-anak keluarga kurang mampu di Tanah Sareal serta mediasi tebus ijazah bagi pelajar yang tertahan akibat kendala biaya sekolah.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 6 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/footer_community.jpg"
                    alt="Pembentukan Wadah Riset Kreatif & Ruang Kreasi Pemuda Anti-Tawuran"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>22 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pembentukan Wadah Riset Kreatif & Ruang Kreasi Pemuda Anti-Tawuran</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Menghadirkan ruang pembinaan vokasi dan kreativitas pemuda guna menekan angka tawuran remaja di Kota Bogor melalui pendekatan keilmuan, pelatihan keahlian kerja, dan kompetisi positif antar-kelurahan.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 7 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Realisasi Penerangan Jalan Umum (PJU) Lingkungan di Permukiman Warga"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>15 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Realisasi Penerangan Jalan Umum (PJU) Lingkungan di Permukiman Warga</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Pengawalan pengadaan dan pemasangan lampu penerangan jalan gang di titik-titik rawan se-Tanah Sareal guna meningkatkan keamanan lingkungan serta mencegah aksi kriminalitas pada malam hari.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 8 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_ambulance.jpg"
                    alt="Program Skrining Kesehatan Lansia & Pemeriksaan Medis Berkala di Kelurahan"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>08 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Program Skrining Kesehatan Lansia & Pemeriksaan Medis Berkala di Kelurahan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Kolaborasi bersama relawan medis dalam menyediakan pemeriksaan kesehatan gratis seperti tensi darah, gula darah, dan konsultasi kesehatan bagi para orang tua dan lansia di posko warga.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 9 (Halaman 1) -->
            <div x-show="currentPage === 1" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_umkm.jpg"
                    alt="Pelatihan Foto Produk Katalog & Pemasaran Marketplace untuk Pedagang Kecil"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>29 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pelatihan Foto Produk Katalog & Pemasaran Marketplace untuk Pedagang Kecil</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Bimbingan teknis pembuatan foto produk komersial dan pemanfaatan media digital bagi pelaku usaha rumahan di tingkat RW agar memperluas jangkauan pasar hingga luar Kota Bogor.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 10 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/banner_serbaguna.jpg"
                    alt="Pengawasan Pelayanan Terpadu E-Government untuk Memangkas Birokrasi"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>24 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pengawasan Pelayanan Terpadu E-Government untuk Memangkas Birokrasi</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Mendorong integrasi sistem perizinan dan layanan pengaduan daring di lingkungan Pemerintah Kota Bogor agar penanganan keluhan masyarakat dapat diselesaikan secara cepat dan bebas pungli.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 11 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Reses Partisipatif Masa Sidang: Penyerapan Aspirasi Warga di 11 Kelurahan"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>18 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Reses Partisipatif Masa Sidang: Penyerapan Aspirasi Warga di 11 Kelurahan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Turun langsung berdialog bersama tokoh masyarakat, pengurus RT/RW, dan warga di berbagai kelurahan guna memverifikasi kondisi riil lingkungan untuk diperjuangkan dalam rapat paripurna dewan.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 12 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_ambulance.jpg"
                    alt="Advokasi Penambahan Ruang Rawat Pasien Kelas 3 di RSUD Kota Bogor"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>10 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Advokasi Penambahan Ruang Rawat Pasien Kelas 3 di RSUD Kota Bogor</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Mengawal ketersediaan tempat tidur dan ruang rawat inap bagi pasien BPJS PBI di rumah sakit daerah agar tidak ada warga yang tertolak saat membutuhkan perawatan darurat.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 13 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/footer_community.jpg"
                    alt="Program Bank Sampah Terpadu & Edukasi Pilah Sampah dari Rumah Tangga"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>03 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Program Bank Sampah Terpadu & Edukasi Pilah Sampah dari Rumah Tangga</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Pemberdayaan kelompok sadar lingkungan dalam pengelolaan bank sampah mandiri di tingkat RT guna mengurangi volume sampah yang dibuang ke TPA serta menciptakan nilai ekonomi tambahan.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 14 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_umkm.jpg"
                    alt="Fasilitasi Bantuan Modal Usaha Bergulir Bagi Koperasi & Pengrajin Lokal"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>26 Oktober 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Fasilitasi Bantuan Modal Usaha Bergulir Bagi Koperasi & Pengrajin Lokal</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Menjembatani akses permodalan bagi koperasi pengrajin dan kelompok usaha mikro di Tanah Sareal melalui kemitraan lembaga keuangan daerah tanpa bunga yang memberatkan.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 15 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img src="/assets/banu/hero_banu.jpg" alt="Pembangunan Taman Tematik Ramah Anak & Ruang Terbuka Hijau Kelurahan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>19 Oktober 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pembangunan Taman Tematik Ramah Anak & Ruang Terbuka Hijau Kelurahan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Memperjuangkan alokasi revitalisasi lahan fasum/fasos menjadi taman interaksi warga dan sarana bermain anak yang hijau, asri, dan aman di tengah padatnya permukiman.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 16 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Perbaikan Jembatan Penyeberangan Gang & Akses Mobilitas Warga Antar-RW"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>12 Oktober 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Perbaikan Jembatan Penyeberangan Gang & Akses Mobilitas Warga Antar-RW</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Pengawalan rehabilitasi infrastruktur jembatan lingkungan yang menghubungkan akses permukiman antar-wilayah guna menunjang keselamatan mobilitas warga dan anak sekolah.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 17 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/program_ambulance.jpg"
                    alt="Bantuan Operasional Fogging & Pencegahan Demam Berdarah di Musim Hujan"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>04 Oktober 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Bantuan Operasional Fogging & Pencegahan Demam Berdarah di Musim Hujan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Respons cepat siaga pengasapan (fogging) serta pembagian abate di lingkungan warga yang teridentifikasi kasus demam berdarah guna memutus mata rantai penularan jentik nyamuk.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Card 18 (Halaman 2) -->
            <div x-show="currentPage === 2" class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
              <div>
                <!-- Cover Image (Penyesuaian Responsif Mobile & Tablet) -->
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                  <img
                    src="/assets/banu/footer_community.jpg"
                    alt="Pendirian Pos Advokasi Bantuan Hukum Warga di Rumah Aspirasi Rakyat"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Laporan -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>27 September 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pendirian Pos Advokasi Bantuan Hukum Warga di Rumah Aspirasi Rakyat</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Penyediaan ruang konsultasi dan pendampingan bantuan hukum cuma-cuma bagi warga kurang mampu yang menghadapi permasalahan sengketa hak, administrasi kependudukan, atau perlindungan konsumen.
                  </p>
                </div>
              </div>

              <!-- Button: Baca Selengkapnya -->
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
                <a
                  href="#aspirasi"
                  class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
                >
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          <!-- Pagination Controls (Shadcn Style) -->
          <div class="mt-12 sm:mt-16 pt-8 border-t border-zinc-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-xs text-zinc-500 font-medium order-2 sm:order-1 text-center sm:text-left">
              Menampilkan Halaman <strong class="text-zinc-900" x-text="currentPage">1</strong> dari <strong class="text-zinc-900" x-text="totalPages">2</strong> (9 Artikel per Halaman)
            </span>

            <div class="inline-flex items-center gap-1.5 order-1 sm:order-2">
              <!-- Tombol Sebelumnya -->
              <button
                @click="if (currentPage > 1) { currentPage--; scrollToTop(); }"
                :disabled="currentPage === 1"
                :class="currentPage === 1 ? 'opacity-40 cursor-not-allowed text-zinc-400 bg-zinc-100 border-zinc-200' : 'text-zinc-700 bg-white hover:bg-zinc-100 border-zinc-300 shadow-2xs active:scale-98'"
                class="inline-flex items-center justify-center rounded-lg border px-3 py-1.5 text-xs font-semibold transition-all"
              >
                &larr; Sebelumnya
              </button>

              <!-- Page 1 -->
              <button
                @click="currentPage = 1; scrollToTop();"
                :class="currentPage === 1 ? 'bg-[#BC0202] text-white border-[#BC0202] shadow-sm font-bold' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                class="inline-flex items-center justify-center w-8 h-8 rounded-lg border text-xs transition-all"
              >
                1
              </button>

              <!-- Page 2 -->
              <button
                @click="currentPage = 2; scrollToTop();"
                :class="currentPage === 2 ? 'bg-[#BC0202] text-white border-[#BC0202] shadow-sm font-bold' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                class="inline-flex items-center justify-center w-8 h-8 rounded-lg border text-xs transition-all"
              >
                2
              </button>

              <!-- Tombol Selanjutnya -->
              <button
                @click="if (currentPage < totalPages) { currentPage++; scrollToTop(); }"
                :disabled="currentPage === totalPages"
                :class="currentPage === totalPages ? 'opacity-40 cursor-not-allowed text-zinc-400 bg-zinc-100 border-zinc-200' : 'text-zinc-700 bg-white hover:bg-zinc-100 border-zinc-300 shadow-2xs active:scale-98'"
                class="inline-flex items-center justify-center rounded-lg border px-3 py-1.5 text-xs font-semibold transition-all"
              >
                Selanjutnya &rarr;
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- ========================================== -->
      <!-- 4. CALL TO ACTION ASPIRASI WARGA           -->
      <!-- ========================================== -->
      <section class="w-full bg-[#fafafa] py-16 sm:py-20 border-b border-zinc-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
          <div class="w-12 h-1 bg-[#BC0202] mx-auto mb-6 rounded-sm"></div>
          <h3 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">Punya Wilayah yang Perlu Diadvokasi?</h3>
          <p class="text-xs sm:text-sm text-zinc-600 mt-3 max-w-xl mx-auto leading-relaxed">
            Sampaikan keluhan terkait jalan rusak, drainase meluap, kesulitan akses BPJS, atau masalah sekolah di lingkungan Anda agar dapat ditinjau dan dikawal langsung oleh Banu Lesmana Bagaskara.
          </p>
          <div class="mt-7 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#aspirasi" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-6 py-3 shadow-sm transition-colors"> Isi Formulir Aspirasi Online </a>
            <a href="index.html#suara-warga" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-6 py-3 shadow-2xs transition-colors">
              Lihat Testimoni Warga
            </a>
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
      <!-- 5. FOOTER SECTION                          -->
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
