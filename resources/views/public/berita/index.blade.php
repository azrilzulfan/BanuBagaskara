@extends('layouts.public')

@section('title', 'Berita, Publikasi & Rilis Pers | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', 'Kabar berita terkini, publikasi kegiatan parlemen, liputan reses aspirasi warga, dan rilis pers resmi Banu Lesmana Bagaskara, S.M. (Anggota DPRD Kota Bogor 2024–2029, Dapil 4 Tanah Sareal).')

@section('content')
  <!-- ========================================== -->
  <!-- 1. HEADER & HERO SECTION (Berita)          -->
  <!-- ========================================== -->
  <header class="w-full bg-[#faf5f5] border-b border-zinc-200 pt-7 sm:pt-9 pb-12 sm:pb-16 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Top Nav Bar: Logo & Navigation Links -->
      <div class="flex items-center justify-between z-10 w-full mb-10 sm:mb-14 gap-2">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
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
            <a href="{{ route('home') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
            <a href="{{ route('profile') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Profil</a>
            <a href="{{ route('kinerja.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
            <a href="{{ route('berita.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Berita</a>
            <a href="{{ route('galeri.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
            <a href="{{ route('kontak.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kontak</a>
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
          <a href="{{ route('home') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
          <a href="{{ route('profile') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Profil (Kenali Banu)</a>
          <a href="{{ route('kinerja.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja</a>
          <a href="{{ route('berita.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Berita &amp; Rilis Pers</a>
          <a href="{{ route('galeri.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Dokumentasi</a>
          <a href="{{ route('kontak.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Rumah Aspirasi &amp; Kontak</a>
          <div class="pt-2 border-t border-zinc-100">
            <a href="{{ route('kontak.index') }}#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold"> Sampaikan Aspirasi </a>
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
  @if ($featuredNews)
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
                <span>{{ $featuredNews->published_at ? $featuredNews->published_at->translatedFormat('d F Y') : '28 Februari 2026' }}</span>
              </div>
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">
                <a href="{{ $featuredNews->source_url ?: $featuredNews->source }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#BC0202] transition-colors">
                  {{ $featuredNews->title }}
                </a>
              </h2>
              <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                {{ $featuredNews->description }}
              </p>
            </div>

            <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
              <a href="{{ $featuredNews->source_url ?: $featuredNews->source }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                <span>Baca Selengkapnya di Sumber Asli</span>
                <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Right: Cover Image -->
          <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
            <img src="{{ asset($featuredNews->cover_image ?? 'assets/banu/testi_dialog.jpg') }}" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </section>
  @else
    <section class="w-full bg-[#fafafa] py-14 sm:py-16 lg:py-20 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
          <!-- Left: Narrative -->
          <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>28 Februari 2026</span>
              </div>
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">Serap Aspirasi di Kebon Pedes: Banu Lesmana Pastikan Usulan Drainase &amp; PJU Masuk Prioritas APBD Perubahan</h2>
              <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                Dalam agenda tatap muka bersama puluhan ketua RT, RW, dan tokoh masyarakat di Kebon Pedes, Anggota DPRD Kota Bogor Banu Lesmana Bagaskara menegaskan komitmennya untuk langsung mengawal kendala banjir genangan ke dinas terkait agar penanganannya masuk dokumen pokok pikiran dewan tahun 2026.
              </p>
            </div>

            <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
              <a href="{{ route('kontak.index') }}#aspirasi" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                <span>Baca Selengkapnya</span>
                <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Right: Cover Image -->
          <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
            <img src="{{ asset('assets/banu/testi_dialog.jpg') }}" alt="Dialog Aspirasi Warga bersama Banu Bagaskara" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- ========================================== -->
  <!-- 3. DAFTAR ARTIKEL BERITA (PAGINATION 9)    -->
  <!-- ========================================== -->
  <section id="daftar-berita" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="max-w-2xl mb-10 sm:mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Kabar &amp; <span class="text-[#BC0202]">Kegiatan</span> Terbaru</h2>
      </div>

      <!-- 9 Cards Grid (Responsive Mobile, Tablet, Desktop) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-7 items-stretch">
        @forelse ($newsList as $item)
          <div class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-md hover:border-zinc-300 transition-all flex flex-col justify-between group">
            <div>
              <!-- Cover Image -->
              <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-zinc-100 overflow-hidden relative">
                <img
                  src="{{ asset($item->cover_image ?? 'assets/banu/program_ambulance.jpg') }}"
                  alt="{{ $item->title }}"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  loading="lazy"
                />
              </div>

              <!-- Content: Tanggal, Judul, dan Deskripsi (line-clamp-3) -->
              <div class="p-5 sm:p-6">
                <!-- Tanggal Rilis Berita -->
                <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                  <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '24 Februari 2026' }}</span>
                </div>

                <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight">
                  <a href="{{ $item->source_url ?: $item->source }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#BC0202] transition-colors">
                    {{ $item->title }}
                  </a>
                </h3>
                <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                  {{ $item->description }}
                </p>
              </div>
            </div>

            <!-- Button: Baca di Sumber Asli -->
            <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1">
              <a
                href="{{ $item->source_url ?: $item->source }}"
                target="_blank"
                rel="noopener noreferrer"
                class="w-full inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 hover:border-zinc-300 text-zinc-900 text-xs font-semibold py-2.5 px-3.5 shadow-2xs transition-colors active:scale-98 gap-1.5 group/btn"
              >
                <span>Baca di Sumber Asli</span>
                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
              </a>
            </div>
          </div>
        @empty
          <div class="col-span-full py-12 text-center text-zinc-500 text-sm">
            Belum ada artikel berita lainnya yang dipublikasikan.
          </div>
        @endforelse
      </div>

      <!-- Pagination Controls (Shadcn Style) -->
      @if ($newsList->hasPages())
        <div class="mt-12 sm:mt-16 pt-8 border-t border-zinc-200 flex flex-col sm:flex-row items-center justify-between gap-4">
          <span class="text-xs text-zinc-500 font-medium order-2 sm:order-1 text-center sm:text-left">
            Menampilkan Halaman <strong class="text-zinc-900">{{ $newsList->currentPage() }}</strong> dari <strong class="text-zinc-900">{{ $newsList->lastPage() }}</strong> ({{ $newsList->perPage() }} Artikel per Halaman)
          </span>

          <div class="inline-flex items-center gap-1.5 order-1 sm:order-2">
            <!-- Tombol Sebelumnya -->
            @if ($newsList->onFirstPage())
              <span class="inline-flex items-center justify-center rounded-lg border px-3 py-1.5 text-xs font-semibold opacity-40 cursor-not-allowed text-zinc-400 bg-zinc-100 border-zinc-200">
                &larr; Sebelumnya
              </span>
            @else
              <a href="{{ $newsList->previousPageUrl() }}" class="inline-flex items-center justify-center rounded-lg border px-3 py-1.5 text-xs font-semibold text-zinc-700 bg-white hover:bg-zinc-100 border-zinc-300 shadow-2xs active:scale-98 transition-all">
                &larr; Sebelumnya
              </a>
            @endif

            <!-- Numbers -->
            @foreach ($newsList->getUrlRange(1, $newsList->lastPage()) as $page => $url)
              <a href="{{ $url }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg border text-xs transition-all {{ $page == $newsList->currentPage() ? 'bg-[#BC0202] text-white border-[#BC0202] shadow-sm font-bold' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold' }}">
                {{ $page }}
              </a>
            @endforeach

            <!-- Tombol Selanjutnya -->
            @if ($newsList->hasMorePages())
              <a href="{{ $newsList->nextPageUrl() }}" class="inline-flex items-center justify-center rounded-lg border px-3 py-1.5 text-xs font-semibold text-zinc-700 bg-white hover:bg-zinc-100 border-zinc-300 shadow-2xs active:scale-98 transition-all">
                Selanjutnya &rarr;
              </a>
            @else
              <span class="inline-flex items-center justify-center rounded-lg border px-3 py-1.5 text-xs font-semibold opacity-40 cursor-not-allowed text-zinc-400 bg-zinc-100 border-zinc-200">
                Selanjutnya &rarr;
              </span>
            @endif
          </div>
        </div>
      @endif
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

      <div class="mt-7 max-w-lg mx-auto">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
          <a href="{{ route('kontak.index') }}" class="w-full rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors text-center shrink-0 active:scale-98">Kirim Aspirasi</a>
        </div>
      </div>
    </div>
  </section>
@endsection
