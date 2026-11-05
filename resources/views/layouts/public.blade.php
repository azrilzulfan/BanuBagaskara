<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', !empty($seoSettings['metaTitle']) ? $seoSettings['metaTitle'] : (!empty($generalSettings['siteTitle']) ? $generalSettings['siteTitle'] : '[Judul Website]'))</title>
    <meta name="description" content="@yield('meta_description', !empty($seoSettings['metaDescription']) ? $seoSettings['metaDescription'] : '[Deskripsi Meta Website]')" />

    @if (!empty($seoSettings['keywords']))
      <meta name="keywords" content="{{ $seoSettings['keywords'] }}" />
    @endif
    <meta name="robots" content="{{ ($seoSettings['enableIndexing'] ?? true) ? 'index, follow' : 'noindex, nofollow' }}" />
    @if (!empty($seoSettings['googleSearchConsoleTag']))
      <meta name="google-site-verification" content="{{ str_replace('google-site-verification=', '', $seoSettings['googleSearchConsoleTag']) }}" />
    @endif

    <!-- OpenGraph / Social Meta Tags -->
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:title" content="@yield('title', !empty($seoSettings['metaTitle']) ? $seoSettings['metaTitle'] : (!empty($generalSettings['siteTitle']) ? $generalSettings['siteTitle'] : '[Judul Website]'))" />
    <meta property="og:description" content="@yield('meta_description', !empty($seoSettings['metaDescription']) ? $seoSettings['metaDescription'] : '[Deskripsi Meta Website]')" />
    <meta property="og:image" content="@yield('og_image', !empty($seoSettings['ogImage']) ? asset($seoSettings['ogImage']) : '')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara, S.M.' }}" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', !empty($seoSettings['metaTitle']) ? $seoSettings['metaTitle'] : (!empty($generalSettings['siteTitle']) ? $generalSettings['siteTitle'] : '[Judul Website]'))" />
    <meta name="twitter:description" content="@yield('meta_description', !empty($seoSettings['metaDescription']) ? $seoSettings['metaDescription'] : '[Deskripsi Meta Website]')" />
    <meta name="twitter:image" content="@yield('og_image', !empty($seoSettings['ogImage']) ? asset($seoSettings['ogImage']) : '')" />

    <link rel="canonical" href="@yield('canonical', request()->is('/') && !empty($seoSettings['canonicalUrl']) ? $seoSettings['canonicalUrl'] : url()->current())" />
    <link rel="icon" href="{{ !empty($generalSettings['favicon']) ? asset($generalSettings['favicon']) : asset('favicon.ico') }}" />

    <!-- Font: Plus Jakarta Sans & Tailwind v4 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>

    @stack('schema')
  </head>
  <body
    class="min-h-screen w-full flex flex-col bg-white overflow-x-hidden"
    x-data="{
      isScrolled: false,
      mobileMenu: false,
      drawerTouchStartY: 0,
      handleDrawerTouchStart(e) { this.drawerTouchStartY = e.changedTouches[0].screenY; },
      handleDrawerTouchEnd(e) {
        if (this.drawerTouchStartY - e.changedTouches[0].screenY > 40) {
          this.mobileMenu = false;
        }
      }
    }"
    @scroll.window="isScrolled = (window.pageYOffset > 80)"
    @keydown.escape.window="mobileMenu = false"
  >
    <!-- Skip to main content link for keyboard & screen reader accessibility -->
    <a
      href="#main-content"
      class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2.5 focus:bg-[#BC0202] focus:text-white focus:text-xs focus:font-bold focus:rounded-lg focus:shadow-lg focus:outline-none"
    >
      Lewati ke konten utama
    </a>

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
        <nav aria-label="Navigasi Cepat Sticky" class="w-full sm:w-auto bg-white/95 backdrop-blur-md border border-zinc-200/90 py-2 sm:py-2.5 px-4 sm:px-8 rounded-xl sm:rounded-2xl shadow-md mx-auto">
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
              :aria-expanded="mobileMenu ? 'true' : 'false'"
              aria-controls="mobile-nav-drawer"
              aria-label="Buka Menu Navigasi"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 py-1 shadow-2xs transition-colors active:bg-zinc-200 cursor-pointer"
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

    <!-- Mobile Navigation Drawer Overlay (Alpine.js + Touch Swipe Dismiss) -->
    <div
      id="mobile-nav-drawer"
      role="dialog"
      aria-modal="true"
      aria-label="Menu Navigasi Seluler"
      x-show="mobileMenu"
      x-cloak
      @click.away="mobileMenu = false"
      @touchstart="handleDrawerTouchStart($event)"
      @touchend="handleDrawerTouchEnd($event)"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 -translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-2"
      class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50 pointer-events-auto"
    >
      <div class="w-10 h-1 bg-zinc-200 rounded-sm mx-auto mb-3"></div>
      <nav aria-label="Menu Navigasi Mobile" class="flex flex-col space-y-3 text-sm font-medium text-zinc-800">
        <a href="{{ route('home') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg {{ request()->routeIs('home') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Beranda</a>
        <a href="{{ route('profile') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg {{ request()->routeIs('profile') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Profil (Kenali Banu)</a>
        <a href="{{ route('kinerja.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg {{ request()->routeIs('kinerja.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Hasil Kinerja</a>
        <a href="{{ route('berita.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg {{ request()->routeIs('berita.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Berita &amp; Rilis Pers</a>
        <a href="{{ route('galeri.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg {{ request()->routeIs('galeri.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Galeri Dokumentasi</a>
        <a href="{{ route('kontak.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg {{ request()->routeIs('kontak.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Rumah Aspirasi &amp; Kontak</a>
        <div class="pt-2 border-t border-zinc-100">
          <a href="{{ route('kontak.index') }}#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold">
            Sampaikan Aspirasi
          </a>
        </div>
      </nav>
    </div>

    <!-- Main Website Canvas Container: Primary Content Landmark -->
    <main id="main-content" class="w-full flex flex-col flex-1 overflow-x-hidden" tabindex="-1">
      <!-- Main Page Content -->
      @yield('content')
    </main>

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
                <li class="pt-1 text-[11px] text-zinc-400">{{ !empty($generalSettings['address']) ? $generalSettings['address'] : '[Alamat Kantor / Rumah Aspirasi]' }}</li>
              </ul>
            </div>
          </div>

          <!-- Bottom Row: Brand Slogan + Banner Full Gambar -->
          <div id="aspirasi" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pt-10">
            <!-- Left: Slogan & Formal Entity -->
            <div class="lg:col-span-5 flex flex-col justify-between">
              <h3 class="text-2xl sm:text-3xl text-white font-bold leading-tight tracking-tight mb-4">
                {{ !empty($generalSettings['slogan']) ? $generalSettings['slogan'] : '[Slogan]' }}:<br />
                {{ !empty($generalSettings['visionSlogan']) ? $generalSettings['visionSlogan'] : '[Visi Slogan]' }}
              </h3>
              <div class="flex items-center gap-3 text-white">
                @if (!empty($generalSettings['logo']))
                  <img src="{{ asset($generalSettings['logo']) }}" alt="{{ $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara' }}" class="h-8 w-auto object-contain bg-white/10 p-1 rounded-lg" />
                @else
                  <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">BLB</div>
                @endif
                <div class="flex flex-col leading-tight">
                  <span class="font-bold text-sm tracking-tight text-white">Banu Lesmana Bagaskara</span>
                </div>
              </div>
            </div>

            <!-- Right: Banner Full Gambar (Selalu Aktif) -->
            <div class="lg:col-span-7 rounded-xl border border-zinc-800 overflow-hidden shadow-sm aspect-[16/9] sm:aspect-[21/9] lg:aspect-auto lg:h-64 bg-zinc-900 group">
              @if (!empty($generalSettings['footerBanner']['image']))
                <img
                  src="{{ asset($generalSettings['footerBanner']['image']) }}"
                  alt="{{ $generalSettings['footerBanner']['alt'] ?? 'Banner Aspirasi Warga Tanah Sareal bersama Banu Lesmana Bagaskara' }}"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                />
              @else
                <div class="w-full h-full min-h-[160px] sm:min-h-[220px] bg-zinc-800 flex items-center justify-center text-zinc-500 text-xs sm:text-sm font-medium p-4 text-center">
                  <span>{{ !empty($generalSettings['footerBanner']['alt']) ? $generalSettings['footerBanner']['alt'] : '[Banner Footer]' }}</span>
                </div>
              @endif
            </div>
          </div>

          <!-- Copyright Minimalis -->
          <div class="pt-8 mt-10 border-t border-zinc-800 text-center text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
        </div>
      </footer>

    <!-- ======================================================== -->
    <!-- FLOATING SCROLL TO TOP BUTTON (Strictly No Pill)        -->
    <!-- ======================================================== -->
    <div class="fixed bottom-5 sm:bottom-6 right-5 sm:right-6 z-40 pointer-events-none" x-cloak>
      <button
        x-show="isScrolled"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-90"
        aria-label="Kembali ke bagian atas halaman"
        class="pointer-events-auto w-10 h-10 rounded-lg bg-zinc-900/90 hover:bg-[#BC0202] text-white flex items-center justify-center shadow-lg border border-zinc-700/50 backdrop-blur-sm transition-all duration-200 hover:scale-105 active:scale-95 cursor-pointer"
      >
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7" />
        </svg>
      </button>
    </div>

    <!-- ======================================================== -->
    <!-- GLOBAL LIGHTBOX PHOTO MODAL (Alpine.js + Touch Gestures) -->
    <!-- ======================================================== -->
    <div
      x-data="{
        isOpen: false,
        images: [],
        currentIndex: 0,
        touchStartX: 0,
        touchStartY: 0,
        open(payload) {
          if (!payload || !payload.images || payload.images.length === 0) return;
          this.images = payload.images;
          this.currentIndex = payload.index || 0;
          this.isOpen = true;
          document.body.style.overflow = 'hidden';
        },
        close() {
          this.isOpen = false;
          document.body.style.overflow = '';
        },
        next() {
          if (this.images.length > 1) {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
          }
        },
        prev() {
          if (this.images.length > 1) {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
          }
        },
        handleTouchStart(e) {
          this.touchStartX = e.changedTouches[0].screenX;
          this.touchStartY = e.changedTouches[0].screenY;
        },
        handleTouchEnd(e) {
          const diffX = e.changedTouches[0].screenX - this.touchStartX;
          const diffY = e.changedTouches[0].screenY - this.touchStartY;
          if (Math.abs(diffX) > Math.abs(diffY)) {
            if (diffX < -40) this.next();
            if (diffX > 40) this.prev();
          } else if (diffY > 70) {
            this.close();
          }
        }
      }"
      @open-lightbox.window="open($event.detail)"
      @keydown.escape.window="if (isOpen) close()"
      @keydown.arrow-left.window="if (isOpen) prev()"
      @keydown.arrow-right.window="if (isOpen) next()"
      x-show="isOpen"
      x-cloak
      class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-zinc-950/90 backdrop-blur-md select-none"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    >
      <div
        @click.away="close()"
        class="relative max-w-5xl w-full max-h-[92vh] flex flex-col items-center justify-center"
      >
        <!-- Top Bar: Image count & Close Button (No Pill, Rounded-lg) -->
        <div class="w-full flex items-center justify-between pb-3 text-white text-xs sm:text-sm font-medium">
          <span class="text-zinc-400" x-text="(currentIndex + 1) + ' / ' + images.length"></span>
          <button
            type="button"
            @click="close()"
            aria-label="Tutup Pratinjau"
            class="p-2 rounded-lg bg-zinc-900/80 hover:bg-zinc-800 text-zinc-300 hover:text-white border border-zinc-700/50 transition-colors cursor-pointer"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Main Image with Touch Gesture Listeners -->
        <div
          class="relative w-full flex items-center justify-center bg-black/60 rounded-xl overflow-hidden border border-zinc-800"
          @touchstart="handleTouchStart($event)"
          @touchend="handleTouchEnd($event)"
        >
          <template x-if="images.length > 0">
            <img
              :src="images[currentIndex]?.url"
              :alt="images[currentIndex]?.title || 'Pratinjau Foto'"
              class="w-auto h-auto max-h-[72vh] max-w-full object-contain transition-all duration-200"
            />
          </template>

          <!-- Prev Button (No Pill, Rounded-lg) -->
          <button
            type="button"
            x-show="images.length > 1"
            @click.stop="prev()"
            aria-label="Foto Sebelumnya"
            class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md active:scale-95 cursor-pointer"
          >
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <!-- Next Button (No Pill, Rounded-lg) -->
          <button
            type="button"
            x-show="images.length > 1"
            @click.stop="next()"
            aria-label="Foto Berikutnya"
            class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md active:scale-95 cursor-pointer"
          >
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        <!-- Caption / Title if available -->
        <div class="pt-3 text-center text-xs text-zinc-300 font-medium" x-show="images[currentIndex]?.title" x-text="images[currentIndex]?.title"></div>
      </div>
    </div>
  </body>
</html>
