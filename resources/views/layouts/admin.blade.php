<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dasbor Administrator') | Banu Bagaskara</title>
    <meta name="robots" content="noindex, nofollow" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>

    @stack('styles')
  </head>
  <body class="min-h-screen bg-[#fafafa] text-zinc-900 antialiased font-sans font-normal selection:bg-[#BC0202] selection:text-white" x-data="{ mobileMenu: false }">

    <!-- Flash Messages (Toasts) -->
    @if (session('success'))
      <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-lg bg-emerald-600 text-white shadow-lg text-xs sm:text-sm font-semibold">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    @if (session('error'))
      <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-lg bg-red-600 text-white shadow-lg text-xs sm:text-sm font-semibold">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <span>{{ session('error') }}</span>
      </div>
    @endif

    <div class="flex min-h-screen">
      <!-- ======================================================== -->
      <!-- DESKTOP SIDEBAR NAVIGATION                               -->
      <!-- ======================================================== -->
      <aside class="hidden lg:flex flex-col w-64 bg-white border-r border-zinc-200 fixed inset-y-0 z-30">
        <!-- Brand Header -->
        <div class="p-5 border-b border-zinc-200">
          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-zinc-950 group">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
              B
            </div>
            <div class="flex flex-col leading-tight min-w-0">
              <span class="font-bold text-sm text-zinc-950 truncate">banubagaskara.</span>
              <span class="text-[10px] text-zinc-500 font-medium">Panel Administrasi</span>
            </div>
          </a>
        </div>

        <!-- Navigation Menu Links -->
        <nav class="flex-1 p-3.5 space-y-1 overflow-y-auto">
          <!-- 1. Ringkasan -->
          <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-950' }}"
          >
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Ringkasan</span>
          </a>

          <!-- 2. Hasil Kinerja -->
          <a
            href="{{ route('admin.kinerja.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-semibold transition-colors {{ request()->routeIs('admin.kinerja.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-950' }}"
          >
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>Hasil Kinerja</span>
          </a>

          <!-- 3. Berita -->
          <a
            href="{{ route('admin.berita.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-semibold transition-colors {{ request()->routeIs('admin.berita.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-950' }}"
          >
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span>Kelola Berita</span>
          </a>

          <!-- 4. Galeri -->
          <a
            href="{{ route('admin.galeri.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-semibold transition-colors {{ request()->routeIs('admin.galeri.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-950' }}"
          >
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Kelola Galeri</span>
          </a>

          <!-- 5. Kotak Aspirasi -->
          <a
            href="{{ route('admin.aspirasi.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-semibold transition-colors {{ request()->routeIs('admin.aspirasi.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-950' }}"
          >
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <span>Kotak Aspirasi</span>
          </a>

          <!-- 6. Pengaturan Halaman -->
          <a
            href="{{ route('admin.pengaturan.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-semibold transition-colors {{ request()->routeIs('admin.pengaturan.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-950' }}"
          >
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Pengaturan Halaman</span>
          </a>
        </nav>

        <!-- Admin Profile & Logout -->
        <div class="p-3.5 border-t border-zinc-200 space-y-2">
          <div class="flex items-center gap-2.5 px-3 py-2 rounded-lg bg-zinc-50 border border-zinc-200">
            <div class="w-7 h-7 rounded-md bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0">
              A
            </div>
            <div class="min-w-0 flex-1">
              <span class="block text-xs font-bold text-zinc-950 truncate">{{ auth()->user()->name ?? 'Administrator' }}</span>
              <span class="block text-[10px] text-zinc-500 truncate">{{ auth()->user()->email ?? 'admin@banubagaskara.id' }}</span>
            </div>
          </div>

          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button
              type="submit"
              class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-xs font-semibold text-zinc-600 hover:text-red-700 hover:bg-red-50 transition-colors"
            >
              <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span>Keluar dari Dasbor</span>
            </button>
          </form>
        </div>
      </aside>

      <!-- Main Layout Container -->
      <div class="flex-1 lg:pl-64 flex flex-col min-h-screen">
        <!-- Responsive Mobile Top Bar -->
        <header class="lg:hidden flex items-center justify-between bg-white border-b border-zinc-200 px-4 py-3 sticky top-0 z-20">
          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">B</div>
            <span class="font-bold text-sm text-zinc-950">Panel Admin</span>
          </a>

          <button
            @click="mobileMenu = !mobileMenu"
            class="p-2 rounded-lg border border-zinc-200 text-zinc-700 hover:bg-zinc-100"
            aria-label="Toggle Menu"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </header>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed inset-x-4 top-16 bg-white border border-zinc-200 rounded-xl p-4 shadow-xl z-50 space-y-2">
          <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg text-xs font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700' }}">Ringkasan</a>
          <a href="{{ route('admin.kinerja.index') }}" class="block px-3 py-2 rounded-lg text-xs font-semibold {{ request()->routeIs('admin.kinerja.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700' }}">Hasil Kinerja</a>
          <a href="{{ route('admin.berita.index') }}" class="block px-3 py-2 rounded-lg text-xs font-semibold {{ request()->routeIs('admin.berita.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700' }}">Kelola Berita</a>
          <a href="{{ route('admin.galeri.index') }}" class="block px-3 py-2 rounded-lg text-xs font-semibold {{ request()->routeIs('admin.galeri.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700' }}">Kelola Galeri</a>
          <a href="{{ route('admin.aspirasi.index') }}" class="block px-3 py-2 rounded-lg text-xs font-semibold {{ request()->routeIs('admin.aspirasi.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700' }}">Kotak Aspirasi</a>
          <a href="{{ route('admin.pengaturan.index') }}" class="block px-3 py-2 rounded-lg text-xs font-semibold {{ request()->routeIs('admin.pengaturan.*') ? 'bg-[#faf5f5] text-[#BC0202]' : 'text-zinc-700' }}">Pengaturan Halaman</a>

          <div class="pt-2 border-t border-zinc-100">
            <form method="POST" action="{{ route('admin.logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-3 py-2 text-xs font-bold text-red-600">Keluar</button>
            </form>
          </div>
        </div>

        <!-- Main Workspace Content -->
        <main class="flex-1">
          @yield('content')
        </main>
      </div>
    </div>

    @stack('scripts')
  </body>
</html>
