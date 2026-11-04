<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dasbor Admin') | Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Font: Plus Jakarta Sans & Tailwind v4 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>

    @stack('styles')
  </head>
  <body
    class="min-h-screen w-full bg-white text-zinc-950 overflow-x-hidden font-sans antialiased"
    x-data="{ mobileMenu: false }"
    @keydown.escape.window="mobileMenu = false;"
  >
    @php
      $newAspirationsCount = \App\Models\Aspiration::where('status', \App\Enums\AspirationStatus::Baru->value)->count();
    @endphp

    <div class="min-h-screen w-full flex flex-col lg:flex-row">
      <!-- ======================================================== -->
      <!-- DESKTOP SIDEBAR NAVIGATION (Shadcn Style, No Pill)       -->
      <!-- ======================================================== -->
      <aside class="hidden lg:flex lg:w-64 xl:w-72 lg:flex-col lg:fixed lg:inset-y-0 bg-white border-r border-zinc-200 z-40 select-none">
        <!-- Brand Logo Header (Identical Mark to Public Templates) -->
        <div class="px-6 pt-7 pb-6 border-b border-zinc-200 bg-[#faf5f5]">
          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-zinc-950 group min-w-0">
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
              <!-- 1. Ringkasan -->
              <li>
                <a
                  href="{{ route('admin.dashboard') }}"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-100 text-zinc-950 font-bold' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 font-semibold' }} text-xs transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-[#BC0202]' : 'text-zinc-400 group-hover:text-zinc-900' }} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                      />
                    </svg>
                    <span>Ringkasan</span>
                  </span>
                  @if (request()->routeIs('admin.dashboard'))
                    <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                  @endif
                </a>
              </li>

              <!-- 2. Hasil Kinerja -->
              <li>
                <a
                  href="{{ route('admin.kinerja.index') }}"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.kinerja.*') ? 'bg-zinc-100 text-zinc-950 font-bold' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 font-semibold' }} text-xs transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.kinerja.*') ? 'text-[#BC0202]' : 'text-zinc-400 group-hover:text-zinc-900' }} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                      />
                    </svg>
                    <span>Hasil Kinerja</span>
                  </span>
                  @if (request()->routeIs('admin.kinerja.*'))
                    <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                  @endif
                </a>
              </li>

              <!-- 3. Berita -->
              <li>
                <a
                  href="{{ route('admin.berita.index') }}"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.berita.*') ? 'bg-zinc-100 text-zinc-950 font-bold' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 font-semibold' }} text-xs transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.berita.*') ? 'text-[#BC0202]' : 'text-zinc-400 group-hover:text-zinc-900' }} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                      />
                    </svg>
                    <span>Berita</span>
                  </span>
                  @if (request()->routeIs('admin.berita.*'))
                    <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                  @endif
                </a>
              </li>

              <!-- 4. Galeri -->
              <li>
                <a
                  href="{{ route('admin.galeri.index') }}"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.galeri.*') ? 'bg-zinc-100 text-zinc-950 font-bold' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 font-semibold' }} text-xs transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.galeri.*') ? 'text-[#BC0202]' : 'text-zinc-400 group-hover:text-zinc-900' }} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                    <span>Galeri</span>
                  </span>
                  @if (request()->routeIs('admin.galeri.*'))
                    <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                  @endif
                </a>
              </li>

              <!-- 5. Kotak Aspirasi -->
              <li>
                <a
                  href="{{ route('admin.aspirasi.index') }}"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.aspirasi.*') ? 'bg-zinc-100 text-zinc-950 font-bold' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 font-semibold' }} text-xs transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.aspirasi.*') ? 'text-[#BC0202]' : 'text-zinc-400 group-hover:text-zinc-900' }} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                      />
                    </svg>
                    <span>Kotak Aspirasi</span>
                  </span>
                  <div class="flex items-center gap-1.5">
                    @if ($newAspirationsCount > 0)
                      <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">{{ $newAspirationsCount }}</span>
                    @endif
                    @if (request()->routeIs('admin.aspirasi.*'))
                      <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                    @endif
                  </div>
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
                  href="{{ route('admin.pengaturan.index') }}"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.pengaturan.*') ? 'bg-zinc-100 text-zinc-950 font-bold' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 font-semibold' }} text-xs transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.pengaturan.*') ? 'text-[#BC0202]' : 'text-zinc-400 group-hover:text-zinc-900' }} shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                  @if (request()->routeIs('admin.pengaturan.*'))
                    <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                  @endif
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Single Admin Profile & Quick Exit -->
        <div class="p-4 border-t border-zinc-200 bg-[#fafafa] space-y-3">
          <div class="flex items-center gap-3 px-2 py-1.5">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0">BLB</div>
            <div class="min-w-0 flex-1">
              <span class="font-bold text-xs text-zinc-950 block truncate">{{ auth()->user()?->name ?? 'Administrator Utama' }}</span>
              <span class="text-[11px] text-zinc-500 block truncate">{{ auth()->user()?->email ?? 'admin@banubagaskara.id' }}</span>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <a
              href="{{ route('home') }}"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1"
            >
              <span>Lihat Situs</span>
              <svg class="w-3 h-3 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg>
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
              @csrf
              <button
                type="submit"
                class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-red-50 hover:text-[#BC0202] hover:border-red-200 text-zinc-700 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1 cursor-pointer"
              >
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Keluar</span>
              </button>
            </form>
          </div>
        </div>
      </aside>

      <!-- ======================================================== -->
      <!-- MAIN CONTENT WRAPPER (Offset by Sidebar on Desktop)      -->
      <!-- ======================================================== -->
      <div class="flex-1 flex flex-col min-w-0 lg:pl-64 xl:pl-72">
        <!-- Mobile & Tablet Top Bar (< lg) -->
        <div class="lg:hidden sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 py-3.5 flex items-center justify-between gap-2">
          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 text-zinc-950 group min-w-0 flex-1">
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

        <!-- Mobile Navigation Drawer Overlay -->
        <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
          <nav class="flex flex-col space-y-2.5 text-sm font-medium text-zinc-800">
            <a href="{{ route('admin.dashboard') }}" @click="mobileMenu = false" class="py-2 px-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors flex items-center justify-between">
              <span>Ringkasan (Beranda Dasbor)</span>
              @if (request()->routeIs('admin.dashboard'))
                <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
              @endif
            </a>
            <a href="{{ route('admin.kinerja.index') }}" @click="mobileMenu = false" class="py-2 px-3 rounded-lg {{ request()->routeIs('admin.kinerja.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Hasil Kinerja (Kanvas Blok)</a>
            <a href="{{ route('admin.berita.index') }}" @click="mobileMenu = false" class="py-2 px-3 rounded-lg {{ request()->routeIs('admin.berita.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Berita Resmi</a>
            <a href="{{ route('admin.galeri.index') }}" @click="mobileMenu = false" class="py-2 px-3 rounded-lg {{ request()->routeIs('admin.galeri.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Galeri Album &amp; Foto</a>
            <a href="{{ route('admin.aspirasi.index') }}" @click="mobileMenu = false" class="py-2 px-3 rounded-lg {{ request()->routeIs('admin.aspirasi.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors flex items-center justify-between">
              <span>Kotak Aspirasi</span>
              @if ($newAspirationsCount > 0)
                <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">{{ $newAspirationsCount }} Baru</span>
              @endif
            </a>
            <a href="{{ route('admin.pengaturan.index') }}" @click="mobileMenu = false" class="py-2 px-3 rounded-lg {{ request()->routeIs('admin.pengaturan.*') ? 'bg-zinc-100 font-bold text-zinc-950' : 'hover:bg-zinc-100' }} transition-colors">Pengaturan Halaman Website</a>
            <div class="pt-3 mt-1 border-t border-zinc-100 grid grid-cols-2 gap-2.5">
              <a
                href="{{ route('home') }}"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-900 py-2 text-xs font-semibold"
              >
                Lihat Website
              </a>
              <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold cursor-pointer">Keluar</button>
              </form>
            </div>
          </nav>
        </div>

        <main class="w-full flex-1 flex flex-col">
          @yield('content')
        </main>
      </div>
    </div>

    @stack('scripts')
  </body>
</html>
