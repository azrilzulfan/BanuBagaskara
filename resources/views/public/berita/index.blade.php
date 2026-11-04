<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita, Publikasi &amp; Rilis Pers | Banu Lesmana Bagaskara, S.M.</title>
    <meta name="description" content="Kabar berita terkini, publikasi kegiatan parlemen, liputan reses aspirasi warga, dan rilis pers resmi Banu Lesmana Bagaskara, S.M. (Anggota DPRD Kota Bogor 2024–2029, Dapil 4 Tanah Sareal)." />

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
      <!-- 1. HEADER & HERO SECTION (Berita)          -->
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
                <a href="/kinerja" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
                <a href="/berita" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Berita</a>
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
              <a href="/kinerja" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja</a>
              <a href="/berita" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Berita &amp; Rilis Pers</a>
              <a href="/galeri" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Dokumentasi</a>
              <a href="/kontak" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Rumah Aspirasi &amp; Kontak</a>
              <div class="pt-2 border-t border-zinc-100">
                <a href="/kontak#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold"> Sampaikan Aspirasi </a>
              </div>
            </nav>
          </div>

          <!-- Hero Content (Editorial Header, No Badge) -->
          <div class="max-w-3xl">
            <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[42px] text-zinc-950 font-bold leading-[1.16] tracking-tight"><span class="text-[#BC0202]">Berita</span> Resmi</h1>
          </div>
        </div>
      </header>

      <!-- ========================================== -->
      <!-- 2. SOROTAN BERITA UTAMA                    -->
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
                  <span>{{ $featuredNews && $featuredNews->published_at ? $featuredNews->published_at->translatedFormat('d F Y') : '28 Februari 2026' }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">{{ $featuredNews->title ?? 'Serap Aspirasi di Kebon Pedes: Banu Lesmana Pastikan Usulan Drainase & PJU Masuk Prioritas APBD Perubahan' }}</h2>
                <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                  {{ $featuredNews->description ?? 'Dalam agenda tatap muka bersama puluhan ketua RT, RW, dan tokoh masyarakat di Kebon Pedes, Anggota DPRD Kota Bogor Banu Lesmana Bagaskara menegaskan komitmennya untuk langsung mengawal kendala banjir genangan ke dinas terkait agar penanganannya masuk dokumen pokok pikiran dewan tahun 2026.' }}
                </p>
              </div>

              <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
                <a href="{{ $featuredNews ? route('berita.show', $featuredNews->slug) : '#daftar-berita' }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Right: Cover Image -->
            <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
              <img src="{{ $featuredNews && $featuredNews->cover_image ? (str_starts_with($featuredNews->cover_image, '/') || str_starts_with($featuredNews->cover_image, 'http') ? $featuredNews->cover_image : '/' . $featuredNews->cover_image) : '/assets/banu/testi_dialog.jpg' }}" alt="{{ $featuredNews->title ?? 'Dialog Aspirasi Warga bersama Banu Bagaskara' }}" class="w-full h-full object-cover" />
            </div>
          </div>
        </div>
      </section>

      <!-- ========================================== -->
      <!-- 3. DAFTAR ARTIKEL BERITA (PAGINATION 9)    -->
      <!-- ========================================== -->
      <section
        id="daftar-berita"
        class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200"
        x-data="{ 
        currentPage: 1, 
        totalPages: 2,
        scrollToTop() {
          const el = document.getElementById('daftar-berita');
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
            <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Kabar &amp; <span class="text-[#BC0202]">Kegiatan</span> Terbaru</h2>
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
                    alt="Ambulance Siaga Banu Bagaskara Respon Cepat Rujukan Pasien Darurat di Kedung Badak"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>24 Februari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Ambulance Siaga Banu Bagaskara Respon Cepat Rujukan Pasien Darurat di Kedung Badak</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Tim relawan siaga bergerak tengah malam mengantarkan warga yang membutuhkan tindakan medis rujukan ke RSUD Kota Bogor serta mendampingi kelengkapan dokumen kepesertaan jaminan kesehatan.
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
                    alt="Rumah Aspirasi Fasilitasi 120+ NIB Gratis dan Pelatihan Foto Produk Bagi Pelaku Usaha"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>19 Februari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Rumah Aspirasi Fasilitasi 120+ NIB Gratis dan Pelatihan Foto Produk Bagi Pelaku Usaha</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Mendorong pedagang kecil dan produsen olahan rumahan di Tanah Sareal memiliki izin usaha resmi guna mempermudah akses permodalan perbankan dan sertifikasi halal tanpa biaya.
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
                    alt="Rapat Badan Anggaran: Banu Soroti Alokasi Bantuan Pendidikan Agar Tepat Sasaran"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>14 Februari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Rapat Badan Anggaran: Banu Soroti Alokasi Bantuan Pendidikan Agar Tepat Sasaran</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Fraksi PDI Perjuangan secara tegas meminta eksekutif merasionalisasi belanja dinas seremonial untuk difokuskan pada penambahan kuota beasiswa bagi siswa kurang mampu di Kota Bogor.
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
                    src="/assets/banu/hero_banu.jpg"
                    alt="Pernyataan Sikap: Kebijakan Tata Ruang Harus Prioritaskan Keselamatan Lingkungan Warga"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>08 Februari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pernyataan Sikap: Kebijakan Tata Ruang Harus Prioritaskan Keselamatan Lingkungan Warga</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Banu Lesmana Bagaskara menekankan pentingnya analisis dampak lingkungan yang ketat sebelum menerbitkan izin pembangunan komersial di kawasan padat penduduk Tanah Sareal.
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
                    src="/assets/banu/footer_community.jpg"
                    alt="Tinjau Saluran Air Sukadamai, Banu Koordinasikan Penanganan Banjir Bersama Pengurus RW"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>02 Februari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Tinjau Saluran Air Sukadamai, Banu Koordinasikan Penanganan Banjir Bersama Pengurus RW</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Peninjauan langsung ke titik rawan luapan air guna mengawal pengerukan endapan lumpur dan perbaikan turap penahan tanah melalui alokasi pemeliharaan rutin dinas teknis.
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
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Cegah Tawuran Remaja: Rumah Aspirasi Rancang Ruang Riset Kreatif & Olahraga Pemuda"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>26 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Cegah Tawuran Remaja: Rumah Aspirasi Rancang Ruang Riset Kreatif & Olahraga Pemuda</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Menyalurkan energi generasi muda Tanah Sareal melalui pelatihan keahlian digital, turnamen olahraga antar-kelurahan, dan inkubasi usaha kreatif pemuda yang positif.
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
                    src="/assets/banu/banner_serbaguna.jpg"
                    alt="Paripurna DPRD Kota Bogor: Mengawal Evaluasi Perda Pelayanan Publik Ramah Disabilitas"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>20 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Paripurna DPRD Kota Bogor: Mengawal Evaluasi Perda Pelayanan Publik Ramah Disabilitas</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Menegaskan komitmen dewan dalam memperjuangkan fasilitas umum ramah disabilitas, trotoar aman, dan kemudahan akses ruang administrasi bagi penyandang disabilitas.
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
                    alt="Bantuan Sosial & Pendampingan Warga Terdampak Cuaca Ekstrem di Tanah Sareal"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>14 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Bantuan Sosial & Pendampingan Warga Terdampak Cuaca Ekstrem di Tanah Sareal</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Menyalurkan bantuan darurat berupa terpal, paket sembako, dan evakuasi sementara bagi keluarga yang atap rumahnya rusak akibat terpaan angin kencang di Kedung Waringin.
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
                    alt="Bazar Usaha Mikro Keluarga & Temu Kemitraan Koperasi se-Kecamatan Tanah Sareal"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>08 Januari 2026</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Bazar Usaha Mikro Keluarga & Temu Kemitraan Koperasi se-Kecamatan Tanah Sareal</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Membuka akses jaringan pemasaran langsung bagi puluhan pedagang rumahan binaan Rumah Aspirasi dengan para pembeli potensial dan asosiasi pengusaha kuliner Kota Bogor.
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
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Dialog Akhir Tahun Bersama Tokoh Lintas Agama: Menjaga Harmoni & Toleransi Warga"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>28 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Dialog Akhir Tahun Bersama Tokoh Lintas Agama: Menjaga Harmoni & Toleransi Warga</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Mempererat tali persaudaraan antarumat beragama di Kota Bogor guna menjamin hak beribadah dengan rasa damai, aman, dan tanpa diskriminasi di seluruh wilayah.
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
                    src="/assets/banu/hero_banu.jpg"
                    alt="Advokasi Tunggakan Ijazah Pelajar Selesai: Puluhan Siswa Kini Lanjut Pendidikan"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>21 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Advokasi Tunggakan Ijazah Pelajar Selesai: Puluhan Siswa Kini Lanjut Pendidikan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Tim advokasi Rumah Aspirasi menyelesaikan mediasi penyerahan ijazah siswa yang tertahan di sekolah swasta akibat kendala finansial keluarga kurang mampu.
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
                    src="/assets/banu/footer_community.jpg"
                    alt="Apresiasi Pengurus RT dan RW: Ujung Tombak Pelayanan yang Perlu Diperhatikan"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>15 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Apresiasi Pengurus RT dan RW: Ujung Tombak Pelayanan yang Perlu Diperhatikan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Memperjuangkan peningkatan sarana operasional dan insentif pengurus RT/RW dalam rapat komisi dewan sebagai garda terdepan penjaga kerukunan dan data warga.
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
                    src="/assets/banu/banner_serbaguna.jpg"
                    alt="Mendorong Penguatan Sistem Digital E-Government untuk Memangkas Antrean Layanan"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>08 Desember 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Mendorong Penguatan Sistem Digital E-Government untuk Memangkas Antrean Layanan</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Fraksi PDI Perjuangan mendorong dinas kependudukan dan perizinan mengoptimalkan aplikasi mobile agar warga tidak perlu antre panjang sejak subuh di kantor dinas.
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
                    src="/assets/banu/program_ambulance.jpg"
                    alt="Layanan Pemeriksaan Kesehatan Gratis Lansia Digelar di Posko Kebon Pedes"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>29 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Layanan Pemeriksaan Kesehatan Gratis Lansia Digelar di Posko Kebon Pedes</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Bekerja sama dengan relawan nakes menggelar skrining kesehatan berkala, cek tensi, dan gula darah yang diikuti ratusan orang tua dan warga pra-sejahtera.
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
                  <img
                    src="/assets/banu/testi_dialog.jpg"
                    alt="Tinjau Titik Rawan Longsor Sungai Cisadane, Banu Koordinasikan Pembangunan TPT"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>22 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Tinjau Titik Rawan Longsor Sungai Cisadane, Banu Koordinasikan Pembangunan TPT</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Mengunjungi bantaran sungai pemukiman warga di Cibadak guna mendorong percepatan pembangunan Tembok Penahan Tanah (TPT) permanen dari anggaran darurat bencana.
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
                    src="/assets/banu/program_umkm.jpg"
                    alt="Pelatihan Pembukuan Keuangan Digital bagi Pedagang Kaki Lima di Tanah Sareal"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>15 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Pelatihan Pembukuan Keuangan Digital bagi Pedagang Kaki Lima di Tanah Sareal</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Memberikan edukasi pencatatan arus kas berbasis ponsel pintar kepada pedagang kecil agar mampu mengelola modal dan memisahkan uang usaha dengan kebutuhan rumah tangga.
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
                    src="/assets/banu/footer_community.jpg"
                    alt="Gerakan Bersih Sungai & Saluran Air Libatkan Ratusan Pemuda Karang Taruna"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>07 November 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Gerakan Bersih Sungai & Saluran Air Libatkan Ratusan Pemuda Karang Taruna</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Menginisiasi aksi gotong royong membersihkan tumpukan sampah plastik di aliran sungai kecil guna mengantisipasi banjir limpasan saat musim hujan puncak.
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
                    src="/assets/banu/hero_banu.jpg"
                    alt="Reses Masa Sidang I: Banu Lesmana Serap 80 Aspirasi Terkait Kesehatan & Fasum"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />
                </div>

                <!-- Content: Tanggal, Judul, dan Deskripsi Dibatasi (line-clamp-3) -->
                <div class="p-5 sm:p-6">
                  <!-- Tanggal Rilis Berita -->
                  <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>30 Oktober 2025</span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">Reses Masa Sidang I: Banu Lesmana Serap 80 Aspirasi Terkait Kesehatan & Fasum</h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                    Rangkuman penyerapan aspirasi konstituen masa sidang dewan yang menggarisbawahi urgensi pembenahan fasilitas puskesmas pembantu dan perbaikan lampu jalan gang.
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
      <!-- 4. LANGGANAN KABAR PARLEMEN (Callout Card) -->
      <!-- ========================================== -->
      <section class="w-full bg-[#fafafa] py-16 sm:py-20 border-b border-zinc-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center" x-data="{ subscribed: false }">
          <div class="w-12 h-1 bg-[#BC0202] mx-auto mb-6 rounded-sm"></div>
          <h3 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">Tetap Terhubung dengan Aktivitas Dewan</h3>
          <p class="text-xs sm:text-sm text-zinc-600 mt-3 max-w-xl mx-auto leading-relaxed">Dapatkan pembaruan rilis pers, jadwal reses, serta info pelayanan ambulance siaga langsung ke nomor WhatsApp atau email Anda.</p>

          <form @submit.prevent="subscribed = true" class="flex flex-col sm:flex-row items-center justify-center gap-2 mt-6 max-w-md mx-auto">
            <input
              type="text"
              required
              placeholder="No. WhatsApp / Email Warga"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
            />
            <button type="submit" class="w-full sm:w-auto rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-5 py-2.5 transition-colors shrink-0 shadow-sm active:scale-98">Langganan Kabar</button>
          </form>

          <div x-show="subscribed" x-cloak class="mt-3 text-xs text-emerald-600 font-medium">&check; Terima kasih! Anda telah terdaftar untuk menerima kabar resmi dari Banu Lesmana Bagaskara.</div>
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
