<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', $seoSettings['metaTitle'] ?? $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara | Beranda Resmi')</title>
    <meta name="description" content="@yield('meta_description', $seoSettings['metaDescription'] ?? 'Website resmi Banu Lesmana Bagaskara, S.M., Anggota DPRD Kota Bogor Terpilih 2024–2029 (Dapil 4 Tanah Sareal, PDI Perjuangan). Bogor Lebih Baik: Maju dan Nyaman untuk Semua.')" />

    @if (!empty($seoSettings['keywords']))
      <meta name="keywords" content="{{ $seoSettings['keywords'] }}" />
    @endif
    <meta name="robots" content="{{ ($seoSettings['enableIndexing'] ?? true) ? 'index, follow' : 'noindex, nofollow' }}" />
    @if (!empty($seoSettings['googleSearchConsoleTag']))
      <meta name="google-site-verification" content="{{ str_replace('google-site-verification=', '', $seoSettings['googleSearchConsoleTag']) }}" />
    @endif

    <!-- OpenGraph / Social Meta Tags -->
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:title" content="@yield('title', $seoSettings['metaTitle'] ?? $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029')" />
    <meta property="og:description" content="@yield('meta_description', $seoSettings['metaDescription'] ?? 'Website resmi Banu Lesmana Bagaskara, S.M.')" />
    <meta property="og:image" content="@yield('og_image', asset($seoSettings['ogImage'] ?? 'assets/banu/hero_banu.jpg'))" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', $seoSettings['metaTitle'] ?? 'Banu Lesmana Bagaskara, S.M.')" />
    <meta name="twitter:description" content="@yield('meta_description', $seoSettings['metaDescription'] ?? 'Website resmi Banu Lesmana Bagaskara, S.M.')" />
    <meta name="twitter:image" content="@yield('og_image', asset($seoSettings['ogImage'] ?? 'assets/banu/hero_banu.jpg'))" />

    <link rel="canonical" href="@yield('canonical', $seoSettings['canonicalUrl'] ?? url()->current())" />

    <!-- Font: Plus Jakarta Sans & Tailwind v4 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>

    @stack('schema')
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
              <a href="{{ route('home') }}" class="text-xs font-semibold px-4 py-2 {{ request()->routeIs('home') ? 'text-zinc-950 bg-zinc-100' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100' }} rounded-lg transition-colors shrink-0">Beranda</a>
              <a href="{{ route('profile') }}" class="text-xs font-semibold px-4 py-2 {{ request()->routeIs('profile') ? 'text-zinc-950 bg-zinc-100' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100' }} rounded-lg transition-colors shrink-0">Profil</a>
              <a href="{{ route('kinerja.index') }}" class="text-xs font-semibold px-4 py-2 {{ request()->routeIs('kinerja.*') ? 'text-zinc-950 bg-zinc-100' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100' }} rounded-lg transition-colors shrink-0">Kinerja</a>
              <a href="{{ route('berita.index') }}" class="text-xs font-semibold px-4 py-2 {{ request()->routeIs('berita.*') ? 'text-zinc-950 bg-zinc-100' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100' }} rounded-lg transition-colors shrink-0">Berita</a>
              <a href="{{ route('galeri.index') }}" class="text-xs font-semibold px-4 py-2 {{ request()->routeIs('galeri.*') ? 'text-zinc-950 bg-zinc-100' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100' }} rounded-lg transition-colors shrink-0">Galeri</a>
              <a href="{{ route('kontak.index') }}" class="text-xs font-semibold px-4 py-2 {{ request()->routeIs('kontak.*') ? 'text-zinc-950 bg-zinc-100' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100' }} rounded-lg transition-colors shrink-0">Kontak</a>
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

      <!-- Main Page Content -->
      @yield('content')

      <!-- ========================================== -->
      <!-- FOOTER SECTION                             -->
      <!-- ========================================== -->
      <footer id="kontak" class="w-full bg-[#000000] text-white pt-14 sm:pt-16 pb-12 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
          <!-- Top Columns Links Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pb-10 border-b border-zinc-800">
            <!-- Column 1: Navigasi Portal -->
            <div class="min-w-0">
              <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 text-zinc-300">Navigasi Portal</h4>
              <ul class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-xs text-zinc-400">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda Utama</a></li>
                <li><a href="{{ route('profile') }}" class="hover:text-white transition-colors">Biografi &amp; Visi Misi</a></li>
                <li><a href="{{ route('kinerja.index') }}" class="hover:text-white transition-colors">Laporan Kinerja</a></li>
                <li><a href="{{ route('berita.index') }}" class="hover:text-white transition-colors">Berita &amp; Rilis</a></li>
                <li><a href="{{ route('galeri.index') }}" class="hover:text-white transition-colors">Galeri Dokumentasi</a></li>
                <li><a href="{{ route('kontak.index') }}" class="hover:text-white transition-colors">Rumah Aspirasi</a></li>
              </ul>
            </div>

            <!-- Column 2: Kontak & Media Sosial -->
            <div class="min-w-0">
              <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 text-zinc-300">Media Sosial &amp; Kontak</h4>
              <ul class="space-y-2 text-xs text-zinc-400">
                <li>
                  <a href="{{ $generalSettings['socials']['instagram'] ?? 'https://instagram.com/banubagaskara' }}" target="_blank" rel="noopener" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span class="text-[#BC0202] font-bold">&bull;</span> Instagram: @banubagaskara
                  </a>
                </li>
                <li>
                  <a href="{{ $generalSettings['socials']['tiktok'] ?? 'https://tiktok.com/@banubagaskara' }}" target="_blank" rel="noopener" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span class="text-[#BC0202] font-bold">&bull;</span> TikTok: @banubagaskara
                  </a>
                </li>
                <li>
                  <a href="{{ $generalSettings['socials']['facebook'] ?? 'https://facebook.com/banubgsk' }}" target="_blank" rel="noopener" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span class="text-[#BC0202] font-bold">&bull;</span> Facebook: banubgsk
                  </a>
                </li>
                <li class="pt-1 text-[11px] text-zinc-400">{{ $generalSettings['address'] ?? 'Kelurahan Kedung Badak, Kec. Tanah Sareal, Kota Bogor, Jawa Barat.' }}</li>
              </ul>
            </div>
          </div>

          <!-- Bottom Row: Brand Slogan + Banner Full Gambar -->
          <div id="aspirasi" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pt-10">
            <!-- Left: Slogan & Formal Entity -->
            <div class="lg:col-span-5 flex flex-col justify-between">
              <h3 class="text-2xl sm:text-3xl text-white font-bold leading-tight tracking-tight mb-4">
                {{ $generalSettings['slogan'] ?? 'Bogor Lebih Baik' }}:<br />
                {{ $generalSettings['visionSlogan'] ?? 'Maju & Nyaman untuk Semua' }}
              </h3>
              <div class="flex items-center gap-3 text-white">
                <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">BLB</div>
                <div class="flex flex-col leading-tight">
                  <span class="font-bold text-sm tracking-tight text-white">Banu Lesmana Bagaskara</span>
                </div>
              </div>
            </div>

            <!-- Right: Banner Full Gambar -->
            <div class="lg:col-span-7 rounded-xl border border-zinc-800 overflow-hidden shadow-sm aspect-[16/9] sm:aspect-[21/9] lg:aspect-auto lg:h-64 bg-zinc-900 group">
              <img src="{{ asset('assets/banu/footer_community.jpg') }}" alt="Banner Aspirasi Warga Tanah Sareal bersama Banu Lesmana Bagaskara" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
            </div>
          </div>

          <!-- Copyright Minimalis -->
          <div class="pt-8 mt-10 border-t border-zinc-800 text-center text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
        </div>
      </footer>
    </main>
  </body>
</html>
