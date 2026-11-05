<!doctype html>
<html lang="id" class="h-full scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Terjadi Kesalahan') | Banu Lesmana Bagaskara, S.M.</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" />

    <!-- Plus Jakarta Sans & Tailwind v4 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>
  </head>
  <body class="min-h-full bg-[#f4f4f5] text-zinc-900 font-sans antialiased flex flex-col justify-between selection:bg-[#BC0202] selection:text-white">
    <!-- Top Minimal Header with Wordmark -->
    <header class="w-full py-6 px-4 sm:px-8 border-b border-zinc-200/80 bg-white/80 backdrop-blur-sm sticky top-0 z-30">
      <div class="max-w-5xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group focus:outline-none" title="Beranda Banu Bagaskara">
          <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shadow-2xs group-hover:bg-[#830000] transition-colors">
            BLB
          </div>
          <span class="font-bold text-zinc-950 text-base sm:text-lg tracking-tight">banubagaskara<span class="text-[#BC0202]">.</span></span>
        </a>

        <a href="{{ route('kontak.index') }}" class="text-xs font-semibold text-zinc-600 hover:text-[#BC0202] transition-colors">
          Bantuan &amp; Kontak &rarr;
        </a>
      </div>
    </header>

    <!-- Main Content Area: Centered Error Card -->
    <main class="flex-1 flex items-center justify-center px-4 py-12 sm:py-16">
      <div class="w-full max-w-lg rounded-2xl border border-zinc-200 bg-white p-7 sm:p-10 shadow-sm text-center space-y-6">
        <!-- Error Badge -->
        <div class="flex justify-center">
          @yield('badge')
        </div>

        <!-- Headline & Description -->
        <div class="space-y-2.5">
          <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">
            @yield('title')
          </h1>
          <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed max-w-md mx-auto">
            @yield('message')
          </p>
        </div>

        <!-- Optional Extra Details (Maintenance Info, Technical Tip, etc.) -->
        @yield('extra')

        <!-- Action Buttons (Strictly Anti-Pill rounded-lg) -->
        <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-3">
          @yield('actions')
        </div>
      </div>
    </main>

    <!-- Bottom Minimal Footer -->
    <footer class="w-full py-6 border-t border-zinc-200/80 bg-white text-center text-xs text-zinc-500">
      <div class="max-w-5xl mx-auto px-4">
        &copy; 2026 banubagaskara. Kanal Resmi Banu Lesmana Bagaskara, S.M. &bull; DPRD Kota Bogor
      </div>
    </footer>
  </body>
</html>
