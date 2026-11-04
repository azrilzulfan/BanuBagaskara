<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029')</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi Banu Lesmana Bagaskara, S.M., Anggota DPRD Kota Bogor Terpilih 2024–2029 (Dapil 4 Tanah Sareal, Fraksi PDI Perjuangan). Bogor Lebih Baik: Maju dan Nyaman untuk Semua.')" />

    <!-- OpenGraph / Social Meta Tags -->
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:title" content="@yield('title', 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029')" />
    <meta property="og:description" content="@yield('meta_description', 'Kanal resmi transparansi hasil kinerja, rilis berita resmi, galeri dokumentasi, dan Kotak Aspirasi warga Tanah Sareal.')" />
    <meta property="og:image" content="@yield('og_image', asset('assets/banu/hero_banu.jpg'))" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', 'Banu Lesmana Bagaskara, S.M.')" />
    <meta name="twitter:description" content="@yield('meta_description')" />
    <meta name="twitter:image" content="@yield('og_image', asset('assets/banu/hero_banu.jpg'))" />

    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Font: Plus Jakarta Sans via Vite & Bunny -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>

    @stack('schema')
  </head>
  <body class="min-h-screen w-full flex flex-col bg-white overflow-x-hidden font-sans text-zinc-900 antialiased selection:bg-[#BC0202] selection:text-white" x-data="{ isScrolled: false, mobileMenu: false }" @scroll.window="isScrolled = (window.pageYOffset > 100)">

    <!-- ======================================================== -->
    <!-- POST-SCROLL STICKY NAVBAR                                -->
    <!-- ======================================================== -->
    <div
      x-cloak
      x-show="isScrolled"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="-translate-y-full opacity-0"
      x-transition:enter-end="translate-y-0 opacity-100"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="translate-y-0 opacity-100"
      x-transition:leave-end="-translate-y-full opacity-0"
      class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-zinc-200 py-2.5 px-4 sm:px-6 shadow-2xs"
    >
      <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
          <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shadow-2xs">B</div>
          <span class="font-bold text-xs sm:text-sm text-zinc-950 tracking-tight">Banu Bagaskara</span>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden lg:flex items-center gap-1">
          <a href="{{ route('home') }}" class="text-xs font-semibold px-3.5 py-1.5 rounded-lg transition-colors {{ request()->routeIs('home') ? 'bg-zinc-100 text-zinc-950' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50' }}">Beranda</a>
          <a href="{{ route('profile') }}" class="text-xs font-semibold px-3.5 py-1.5 rounded-lg transition-colors {{ request()->routeIs('profile') ? 'bg-zinc-100 text-zinc-950' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50' }}">Kenali Saya</a>
          <a href="{{ route('kinerja.index') }}" class="text-xs font-semibold px-3.5 py-1.5 rounded-lg transition-colors {{ request()->routeIs('kinerja.*') ? 'bg-zinc-100 text-zinc-950' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50' }}">Hasil Kinerja</a>
          <a href="{{ route('berita.index') }}" class="text-xs font-semibold px-3.5 py-1.5 rounded-lg transition-colors {{ request()->routeIs('berita.*') ? 'bg-zinc-100 text-zinc-950' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50' }}">Berita</a>
          <a href="{{ route('galeri.index') }}" class="text-xs font-semibold px-3.5 py-1.5 rounded-lg transition-colors {{ request()->routeIs('galeri.*') ? 'bg-zinc-100 text-zinc-950' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50' }}">Galeri</a>
          <a href="{{ route('kontak.index') }}" class="text-xs font-semibold px-3.5 py-1.5 rounded-lg transition-colors {{ request()->routeIs('kontak.*') ? 'bg-zinc-100 text-zinc-950' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50' }}">Kontak</a>
        </nav>

        <a
          href="{{ route('kontak.index') }}#aspirasi"
          class="inline-flex items-center gap-1.5 text-xs font-semibold px-3.5 py-1.5 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white shadow-2xs transition-colors shrink-0"
        >
          <span>Kotak Aspirasi</span>
        </a>
      </div>
    </div>

    <!-- MAIN BODY CONTENT -->
    <main class="flex-1 w-full">
      @yield('content')
    </main>

    <!-- ======================================================== -->
    <!-- OFFICIAL FOOTER                                          -->
    <!-- ======================================================== -->
    <footer class="w-full border-t border-zinc-200 bg-[#fafafa] pt-12 pb-8 px-4 sm:px-6 lg:px-8 mt-16">
      <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 pb-10 border-b border-zinc-200">
          <!-- Col 1: Identity & Party -->
          <div class="md:col-span-2 space-y-4">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
                B
              </div>
              <div>
                <h3 class="font-bold text-sm sm:text-base text-zinc-950 tracking-tight">Banu Lesmana Bagaskara, S.M.</h3>
                <p class="text-xs text-zinc-500 font-medium">Anggota DPRD Kota Bogor Periode 2024–2029</p>
              </div>
            </div>
            <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed max-w-md">
              Fraksi PDI Perjuangan &bull; Komisi 1 DPRD Kota Bogor &bull; Daerah Pemilihan Kota Bogor 4 (Kecamatan Tanah Sareal). Mengabdi dengan integritas, hadir memberi solusi nyata untuk warga.
            </p>
            <div class="flex items-center gap-2 pt-1 text-xs text-zinc-600">
              <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-red-50 text-[#BC0202] border border-red-100 font-bold">
                PDI Perjuangan
              </span>
              <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-zinc-100 text-zinc-800 border border-zinc-200 font-semibold">
                Dapil Tanah Sareal
              </span>
            </div>
          </div>

          <!-- Col 2: Navigasi Menu -->
          <div class="space-y-3">
            <h4 class="text-xs font-bold text-zinc-950 uppercase tracking-wider">Navigasi Halaman</h4>
            <ul class="space-y-2 text-xs">
              <li><a href="{{ route('home') }}" class="text-zinc-600 hover:text-[#BC0202] transition-colors">Beranda</a></li>
              <li><a href="{{ route('profile') }}" class="text-zinc-600 hover:text-[#BC0202] transition-colors">Profil (Kenali Banu)</a></li>
              <li><a href="{{ route('kinerja.index') }}" class="text-zinc-600 hover:text-[#BC0202] transition-colors">Hasil Kinerja Dewan</a></li>
              <li><a href="{{ route('berita.index') }}" class="text-zinc-600 hover:text-[#BC0202] transition-colors">Berita & Rilis Pers</a></li>
              <li><a href="{{ route('galeri.index') }}" class="text-zinc-600 hover:text-[#BC0202] transition-colors">Galeri Dokumentasi</a></li>
              <li><a href="{{ route('kontak.index') }}" class="text-zinc-600 hover:text-[#BC0202] transition-colors">Kontak & Rumah Aspirasi</a></li>
            </ul>
          </div>

          <!-- Col 3: Posko Rumah Aspirasi -->
          <div class="space-y-3">
            <h4 class="text-xs font-bold text-zinc-950 uppercase tracking-wider">Rumah Aspirasi Rakyat</h4>
            <p class="text-xs text-zinc-600 leading-relaxed">
              Kelurahan Kedung Badak, Kecamatan Tanah Sareal, Kota Bogor, Jawa Barat.
            </p>
            <div class="space-y-1.5 text-xs text-zinc-600">
              <p class="font-medium text-zinc-900">Hotline Ambulance Siaga 24 Jam:</p>
              <a href="tel:+6281288880000" class="font-mono font-bold text-[#BC0202] hover:underline block">+62 812-8888-0000</a>
              <p class="text-[11px] text-zinc-500">Email: aspirasi@banubagaskara.id</p>
            </div>
          </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-zinc-500">
          <p>&copy; 2026 Banu Lesmana Bagaskara, S.M. Seluruh hak cipta dilindungi.</p>
          <div class="flex items-center gap-4">
            <a href="{{ route('admin.login') }}" class="text-zinc-400 hover:text-zinc-700 transition-colors">Akses Internal Dewan</a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
