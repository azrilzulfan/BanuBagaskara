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
    x-data="{
      mobileMenu: false,
      passwordModal: false,
      drawerTouchStartY: 0,
      handleDrawerTouchStart(e) { this.drawerTouchStartY = e.changedTouches[0].screenY; },
      handleDrawerTouchEnd(e) {
        if (this.drawerTouchStartY - e.changedTouches[0].screenY > 40) {
          this.mobileMenu = false;
        }
      }
    }"
    @keydown.escape.window="mobileMenu = false; passwordModal = false;"
    x-init="@if ($errors->has('current_password') || $errors->has('password')) passwordModal = true @endif"
  >
    @if (session('success'))
      <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
      >
        <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
        <div>
          <span class="font-bold block">{{ session('success') }}</span>
          <span class="text-emerald-800">Perubahan berhasil diperbarui pada sistem.</span>
        </div>
      </div>
    @endif

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

          <button
            type="button"
            @click="passwordModal = true"
            class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 text-zinc-700 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1.5 cursor-pointer"
          >
            <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
            <span>Ganti Password</span>
          </button>

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

        <!-- Mobile Navigation Drawer Overlay (Alpine.js + Touch Swipe Dismiss) -->
        <div
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
            <div class="pt-3 mt-1 border-t border-zinc-100 flex flex-col gap-2">
              <button
                type="button"
                @click="mobileMenu = false; passwordModal = true;"
                class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white text-zinc-800 py-2 text-xs font-semibold gap-1.5 cursor-pointer hover:bg-zinc-50"
              >
                <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span>Ganti Password Admin</span>
              </button>
              <div class="grid grid-cols-2 gap-2.5">
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
            </div>
          </nav>
        </div>

        <main class="w-full flex-1 flex flex-col">
          @yield('content')
        </main>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- MODAL GANTI PASSWORD ADMINISTRATOR                       -->
    <!-- ======================================================== -->
    <div
      x-show="passwordModal"
      x-cloak
      class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-zinc-950/70 backdrop-blur-xs select-none"
      @keydown.escape.window="passwordModal = false"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    >
      <div
        @click.away="passwordModal = false"
        class="bg-white border border-zinc-200 text-zinc-950 rounded-2xl shadow-2xl max-w-md w-full overflow-hidden"
      >
        <!-- Modal Header -->
        <div class="px-6 py-5 border-b border-zinc-200 bg-[#fafafa] flex items-center justify-between gap-4">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shrink-0">
              <svg class="w-4 h-4 fill-none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
              </svg>
            </div>
            <div>
              <h2 class="text-base font-bold text-zinc-950 tracking-tight">Ganti Password Admin</h2>
              <p class="text-[11px] text-zinc-500 mt-0.5">Perbarui kata sandi akun administrator untuk menjaga keamanan.</p>
            </div>
          </div>
          <button
            type="button"
            @click="passwordModal = false"
            aria-label="Tutup"
            class="p-1.5 rounded-lg text-zinc-400 hover:text-zinc-700 hover:bg-zinc-100 transition-colors cursor-pointer"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Form Body -->
        <form
          method="POST"
          action="{{ route('admin.password.update') }}"
          class="p-6 space-y-4"
          x-data="{ showCurrent: false, showNew: false, showConfirm: false }"
        >
          @csrf
          @method('PUT')

          @if ($errors->has('current_password') || $errors->has('password'))
            <div class="p-3 rounded-lg bg-red-50 border border-red-200 text-xs text-red-900">
              <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <!-- 1. Password Saat Ini -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Password Saat Ini *</label>
            <div class="relative">
              <input
                :type="showCurrent ? 'text' : 'password'"
                name="current_password"
                required
                placeholder="Masukkan kata sandi saat ini"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] pr-10 shadow-2xs"
              />
              <button
                type="button"
                @click="showCurrent = !showCurrent"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-700 cursor-pointer"
              >
                <svg x-show="!showCurrent" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                <svg x-show="showCurrent" x-cloak class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" /></svg>
              </button>
            </div>
          </div>

          <!-- 2. Password Baru -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Password Baru *</label>
            <div class="relative">
              <input
                :type="showNew ? 'text' : 'password'"
                name="password"
                required
                minlength="8"
                placeholder="Minimal 8 karakter baru"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] pr-10 shadow-2xs"
              />
              <button
                type="button"
                @click="showNew = !showNew"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-700 cursor-pointer"
              >
                <svg x-show="!showNew" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                <svg x-show="showNew" x-cloak class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" /></svg>
              </button>
            </div>
            <p class="text-[11px] text-zinc-500 mt-1">Gunakan kombinasi huruf, angka, atau simbol minimal 8 karakter.</p>
          </div>

          <!-- 3. Konfirmasi Password Baru -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Konfirmasi Password Baru *</label>
            <div class="relative">
              <input
                :type="showConfirm ? 'text' : 'password'"
                name="password_confirmation"
                required
                minlength="8"
                placeholder="Ulangi kata sandi baru"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] pr-10 shadow-2xs"
              />
              <button
                type="button"
                @click="showConfirm = !showConfirm"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-700 cursor-pointer"
              >
                <svg x-show="!showConfirm" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                <svg x-show="showConfirm" x-cloak class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" /></svg>
              </button>
            </div>
          </div>

          <!-- Buttons -->
          <div class="pt-3 border-t border-zinc-100 flex items-center justify-end gap-2.5">
            <button
              type="button"
              @click="passwordModal = false"
              class="px-4 py-2.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-700 text-xs font-semibold transition-colors cursor-pointer"
            >
              Batal
            </button>
            <button
              type="submit"
              class="px-5 py-2.5 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm transition-colors cursor-pointer"
            >
              Simpan Password Baru
            </button>
          </div>
        </form>
      </div>
    </div>

    @stack('scripts')
  </body>
</html>
