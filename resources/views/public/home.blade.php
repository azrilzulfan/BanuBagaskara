@extends('layouts.public')

@section('title', 'Banu Lesmana Bagaskara | Beranda Resmi')
@section('meta_description', 'Website resmi Banu Lesmana Bagaskara, S.M., Anggota DPRD Kota Bogor Terpilih 2024–2029 (Dapil 4 Tanah Sareal, PDI Perjuangan). Bogor Lebih Baik: Maju dan Nyaman untuk Semua.')

@push('schema')
<script type="application/ld+json">
{
  "{{ '@context' }}": "https://schema.org",
  "@type": "Person",
  "name": "Banu Lesmana Bagaskara, S.M.",
  "jobTitle": "Anggota DPRD Kota Bogor",
  "worksFor": {
    "@type": "GovernmentOrganization",
    "name": "DPRD Kota Bogor"
  },
  "memberOf": {
    "@type": "PoliticalParty",
    "name": "PDI Perjuangan"
  },
  "url": "{{ url('/') }}",
  "image": "{{ asset('assets/banu/hero_banu.jpg') }}",
  "sameAs": [
    "{{ $generalSettings['socials']['instagram'] ?? 'https://instagram.com/banubagaskara' }}",
    "{{ $generalSettings['socials']['tiktok'] ?? 'https://tiktok.com/@banubagaskara' }}",
    "{{ $generalSettings['socials']['facebook'] ?? 'https://facebook.com/banubgsk' }}",
    "https://goodkind.id/profil/banu-lesmana-bagaskara-sm"
  ],
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Bogor",
    "addressRegion": "Jawa Barat",
    "addressCountry": "ID"
  }
}
</script>
@endpush

@section('content')
  <!-- ========================================== -->
  <!-- 1. HERO SECTION (Split 50/50 Layout)       -->
  <!-- ========================================== -->
  <section class="w-full grid grid-cols-1 lg:grid-cols-2 relative min-h-[580px] lg:min-h-[660px] xl:min-h-[720px] border-b border-zinc-200">
    <!-- Hero Left: Solid Light Background (Strictly No Gradient) -->
    <div class="bg-[#faf5f5] px-6 sm:px-10 md:px-14 lg:pl-12 lg:pr-10 xl:pl-20 xl:pr-16 2xl:pl-32 2xl:pr-24 pt-7 sm:pt-10 pb-12 sm:pb-16 flex flex-col justify-between relative overflow-hidden">
      <!-- Top Nav Header: Logo & Mobile Menu Toggle -->
      <header class="flex items-center justify-between z-10 w-full mb-8 sm:mb-10 gap-2">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
          @if (!empty($generalSettings['logo']))
            <img src="{{ asset($generalSettings['logo']) }}" alt="{{ $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara' }}" class="h-8 sm:h-9 w-auto object-contain" />
          @else
            <!-- Official Parliamentary / Democratic Red Mark (No Pill, Rounded-lg) -->
            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm sm:text-base shadow-sm shrink-0">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
              </svg>
            </div>
            <div class="flex flex-col leading-tight min-w-0 flex-1">
              <span class="font-bold text-sm sm:text-base lg:text-lg tracking-tight text-zinc-950 truncate">banubagaskara.</span>
            </div>
          @endif
        </a>

        <!-- Menu Button for Mobile & Tablet (< lg) - Shadcn Button (No Pill) -->
        <div class="lg:hidden shrink-0 ml-2">
          <button
            @click="mobileMenu = !mobileMenu"
            aria-label="Buka Menu"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200"
          >
            <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:inline ml-1.5">Menu</span>
          </button>
        </div>
      </header>

      <!-- Mobile Navigation Drawer Overlay (Alpine.js) -->
      <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
        <nav class="flex flex-col space-y-3 text-sm font-medium text-zinc-800">
          <a href="{{ route('home') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Beranda</a>
          <a href="{{ route('profile') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Profil (Kenali Banu)</a>
          <a href="{{ route('kinerja.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja</a>
          <a href="{{ route('berita.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita &amp; Rilis Pers</a>
          <a href="{{ route('galeri.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Dokumentasi</a>
          <a href="{{ route('kontak.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Rumah Aspirasi &amp; Kontak</a>
          <div class="pt-2 border-t border-zinc-100">
            <a href="{{ route('kontak.index') }}#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold"> Sampaikan Aspirasi </a>
          </div>
        </nav>
      </div>

      <!-- Hero Content Block -->
      <div class="my-auto pt-2 sm:pt-6 pb-4 z-10 max-w-xl">
        @php
          $rawHeadline = $homeSettings['hero']['headline'] ?? 'Bogor Lebih Baik: Maju & Nyaman untuk Semua';
          if (str_contains($rawHeadline, '<span')) {
              $renderedHeadline = $rawHeadline;
          } elseif ($rawHeadline === 'Bogor Lebih Baik: Maju & Nyaman untuk Semua' || $rawHeadline === 'Bogor Lebih Baik:<br />Maju & Nyaman untuk Semua') {
              $renderedHeadline = 'Bogor <span class="text-[#BC0202]">Lebih</span> Baik:<br />Maju &amp; <span class="text-[#BC0202]">Nyaman</span> untuk <span class="text-[#BC0202]">Semua</span>';
          } else {
              $renderedHeadline = nl2br(e($rawHeadline));
          }
        @endphp
        <!-- Main Slogan & Headline (Disciplined Sans-Serif Typography) -->
        <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[40px] xl:text-[48px] text-zinc-950 font-bold leading-[1.15] tracking-tight">
          {!! $renderedHeadline !!}
        </h1>

        <!-- Subtitle / Manifesto -->
        <p class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-zinc-600 font-normal leading-relaxed mt-4 sm:mt-5 max-w-[460px]">
          {{ $homeSettings['hero']['description'] ?? 'Hadir dan bekerja nyata bareng warga Tanah Sareal—mulai dari siaga ambulance gratis 24 jam, ngawal usulan lingkungan di gedung dewan, sampai mastiin anggaran kota beneran balik buat kebutuhan kita bersama.' }}
        </p>

        <!-- CTA Buttons: Shadcn Button Style (Strictly No Pill) -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 mt-7 sm:mt-9">
          <a
            href="{{ !empty($homeSettings['hero']['ctaPrimaryLink']) ? url($homeSettings['hero']['ctaPrimaryLink']) : route('kontak.index') }}"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-sm transition-colors active:scale-98 text-center"
          >
            {{ $homeSettings['hero']['ctaPrimaryText'] ?? 'Sampaikan Aspirasi' }}
          </a>
          <a
            href="{{ !empty($homeSettings['hero']['ctaSecondaryLink']) ? url($homeSettings['hero']['ctaSecondaryLink']) : route('profile') }}"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-2xs transition-colors active:scale-98 text-center"
          >
            {{ $homeSettings['hero']['ctaSecondaryText'] ?? 'Kenali Banu Bagaskara' }}
          </a>
        </div>
      </div>

      <!-- Spacer for vertical alignment -->
      <div class="h-2"></div>
    </div>

    <!-- Hero Right: Edge-to-Edge Photo Side with Top-Right Menu Button on Desktop -->
    <div class="relative min-h-[360px] sm:min-h-[440px] lg:min-h-full w-full bg-zinc-100 overflow-hidden">
      <img src="{{ asset($homeSettings['hero']['heroImage'] ?? 'assets/banu/hero_banu.jpg') }}" alt="Banu Lesmana Bagaskara, S.M. - Anggota DPRD Kota Bogor" class="w-full h-full object-cover object-top filter grayscale contrast-105 hover:grayscale-0 transition-all duration-500" />

      <!-- Desktop Pre-Scroll Navigation Bar (Rounded-xl container, No Pill) -->
      <div class="hidden lg:block absolute top-8 right-8 xl:top-10 xl:right-14 2xl:right-20 z-20">
        <nav class="flex items-center gap-1.5 bg-white/95 border border-zinc-200 p-1.5 rounded-xl shadow-sm">
          <a href="{{ route('home') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Beranda</a>
          <a href="{{ route('profile') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Profil</a>
          <a href="{{ route('kinerja.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
          <a href="{{ route('berita.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Berita</a>
          <a href="{{ route('galeri.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
          <a href="{{ route('kontak.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kontak</a>
        </nav>
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 2. BANNER SERBAGUNA (FULL GAMBAR RESPONSIF)              -->
  <!-- ======================================================== -->
  @if ($homeSettings['banner']['enabled'] ?? true)
    <section class="w-full bg-zinc-950 border-b border-zinc-200">
      <div class="w-full max-w-[1920px] mx-auto overflow-hidden">
        <a href="{{ !empty($homeSettings['banner']['linkUrl']) ? url($homeSettings['banner']['linkUrl']) : route('kontak.index') . '#aspirasi' }}" class="block group">
          <img
            src="{{ asset($homeSettings['banner']['image'] ?? 'assets/banu/banner_serbaguna.jpg') }}"
            alt="{{ $homeSettings['banner']['title'] ?? 'Banner Resmi Banu Lesmana Bagaskara, S.M. - Bogor Lebih Baik: Maju dan Nyaman untuk Semua' }}"
            class="w-full h-auto object-cover min-h-[160px] sm:min-h-[220px] md:min-h-[280px] lg:min-h-[340px] xl:min-h-[400px] transition-transform duration-500 group-hover:scale-[1.008]"
            loading="lazy"
          />
        </a>
      </div>
    </section>
  @endif

  <!-- ======================================================== -->
  <!-- 3. HASIL KINERJA & BERITA TERKINI (Desain Asli Terjaga)   -->
  <!-- ======================================================== -->
  <section id="kinerja" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16 flex flex-col items-center">
      <!-- Section Header -->
      <div class="text-center max-w-2xl mb-10">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Hasil <span class="text-[#BC0202]">Kinerja</span> &amp;<br /><span class="text-[#BC0202]">Berita</span> Terkini</h2>
      </div>

      <!-- Featured Action Blocks (Two Rows 1:1 with Reference Design) -->
      @php
        $featuredReport = $featuredReports->first();
      @endphp
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
        @if ($featuredReport)
          <!-- Row 1: Featured Report from Database -->
          <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ $featuredReport->published_at ? $featuredReport->published_at->translatedFormat('d F Y') : '20 Januari 2026' }}</span>
              </div>
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">{{ $featuredReport->title }}</h2>
              <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                {{ $featuredReport->excerpt }}
              </p>
            </div>

            <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
              <a href="{{ route('kinerja.show', $featuredReport->slug) }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                <span>Baca Selengkapnya</span>
                <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>

          <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
            <img src="{{ asset($featuredReport->cover_image ?? 'assets/banu/program_ambulance.jpg') }}" alt="{{ $featuredReport->title }}" class="w-full h-full object-cover" />
          </div>
        @else
          <!-- Default Row 1 (Template Fallback) -->
          <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>20 Januari 2026</span>
              </div>
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">Ambulance Siaga 24 Jam &amp; Pendampingan Administrasi Pasien BPJS Bebas Biaya</h2>
              <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                Menyikapi keluhan mendesak warga saat mengalami sakit parah di jam-jam genting, Banu Lesmana Bagaskara menyiagakan unit ambulans darurat gratis yang siap beroperasi 24 jam penuh di wilayah Kecamatan Tanah Sareal. Armada ini didukung relawan medis yang turut mengadvokasi perolehan kamar dan jaminan BPJS PBI di RSUD Kota Bogor.
              </p>
            </div>

            <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
              <a href="{{ route('kinerja.index') }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                <span>Baca Selengkapnya</span>
                <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>

          <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
            <img src="{{ asset('assets/banu/program_ambulance.jpg') }}" alt="Ambulance Siaga 24 Jam Banu Bagaskara" class="w-full h-full object-cover" />
          </div>
        @endif

        @php
          $secondItem = $latestNews->first() ?? $featuredReports->skip(1)->first();
        @endphp

        @if ($secondItem)
          <!-- Row 2: Second Item from Database -->
          <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2.5">
                <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ $secondItem->published_at ? $secondItem->published_at->translatedFormat('d F Y') : '28 Februari 2026' }}</span>
              </div>
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">{{ $secondItem->title }}</h2>
              <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                {{ $secondItem->excerpt ?? $secondItem->description }}
              </p>
            </div>

            <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
              @if ($secondItem instanceof \App\Models\PerformanceReport)
                <a href="{{ route('kinerja.show', $secondItem->slug) }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              @else
                <a href="{{ route('berita.show', $secondItem->slug) }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                  <span>Baca Selengkapnya</span>
                  <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              @endif
            </div>
          </div>

          <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
            <img src="{{ asset($secondItem->cover_image ?? 'assets/banu/testi_dialog.jpg') }}" alt="{{ $secondItem->title }}" class="w-full h-full object-cover" />
          </div>
        @else
          <!-- Default Row 2 (Template Fallback) -->
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
              <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                <span>Baca Selengkapnya</span>
                <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>

          <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
            <img src="{{ asset('assets/banu/testi_dialog.jpg') }}" alt="Dialog Aspirasi Warga bersama Banu Bagaskara" class="w-full h-full object-cover" />
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 4. 6 PROGRAM PENGABDIAN UTAMA (Komitmen Dewan)          -->
  <!-- ======================================================== -->
  <section id="program" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 sm:mb-14 gap-6">
        <div class="max-w-2xl">
          <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">
            Enam <span class="text-[#BC0202]">Program</span> Nyata untuk<br /><span class="text-[#BC0202]">Warga</span> Kota <span class="text-[#BC0202]">Bogor</span>
          </h2>
        </div>
      </div>

      <!-- 6 Program Cards Grid (1:1 with Template) -->
      @php
        $homePrograms = $homeSettings['programs'] ?? $profileSettings['programs'] ?? [];
      @endphp
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
        <!-- Program 1: Rumah Aspirasi Rakyat -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
              </div>
            </div>
            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $homePrograms[0]['title'] ?? 'Rumah Aspirasi Rakyat' }}</h3>
            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
              {{ $homePrograms[0]['desc'] ?? 'Pusat advokasi terbuka di Kedung Badak untuk menampung, memverifikasi, dan memperjuangkan seluruh keluhan serta usulan pembangunan warga Tanah Sareal ke instansi terkait.' }}
            </p>
          </div>
          <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
            <span>Lokasi: Kelurahan Kedung Badak</span>
          </div>
        </div>

        <!-- Program 2: Ambulance Siaga & Relawan Pendamping 24 Jam -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </div>
            </div>
            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $homePrograms[1]['title'] ?? 'Ambulance Siaga 24 Jam' }}</h3>
            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
              {{ $homePrograms[1]['desc'] ?? 'Armada ambulans operasional dan relawan pendamping medis darurat siaga 24 jam bebas biaya untuk mengantar pasien darurat serta mengawal administrasi BPJS di RSUD Kota Bogor.' }}
            </p>
          </div>
          <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
            <span>Siaga Darurat 24 Jam Gratis</span>
          </div>
        </div>

        <!-- Program 3: Mendorong E-Government & Transparansi APBD -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
            </div>
            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $homePrograms[2]['title'] ?? 'Mendorong E-Government' }}</h3>
            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
              {{ $homePrograms[2]['desc'] ?? 'Mendorong integrasi layanan birokrasi digital dan transparansi anggaran APBD Kota Bogor agar akuntabel, efisien, serta terbebas dari pemborosan dan kebocoran dana rakyat.' }}
            </p>
          </div>
          <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
            <span>Transparansi &amp; Efisiensi Anggaran</span>
          </div>
        </div>

        <!-- Program 4: Wajib Belajar Anak Kota Bogor -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
              </div>
            </div>
            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $homePrograms[3]['title'] ?? 'Wajib Belajar Anak' }}</h3>
            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
              {{ $homePrograms[3]['desc'] ?? 'Memastikan tidak ada anak Kota Bogor yang putus sekolah melalui advokasi alokasi beasiswa siswa prasejahtera, tebus ijazah tertahan, serta pemerataan mutu pendidikan.' }}
            </p>
          </div>
          <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
            <span>Nol Anak Putus Sekolah</span>
          </div>
        </div>

        <!-- Program 5: Kota Bogor Tanpa Tawuran -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                  />
                </svg>
              </div>
            </div>
            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $homePrograms[4]['title'] ?? 'Kota Bogor Tanpa Tawuran' }}</h3>
            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
              {{ $homePrograms[4]['desc'] ?? 'Pembinaan karakter pemuda berbasis komunitas melalui wadah keilmuan, riset, fasilitas olahraga positif, dan pelatihan ketenagakerjaan untuk membasmi tawuran antar pelajar.' }}
            </p>
          </div>
          <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
            <span>Ruang Kreatif &amp; Olahraga Pemuda</span>
          </div>
        </div>

        <!-- Program 6: Digitalisasi UMKM Berbasis RT/RW -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
              </div>
            </div>
            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $homePrograms[5]['title'] ?? 'Digitalisasi UMKM RT/RW' }}</h3>
            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
              {{ $homePrograms[5]['desc'] ?? 'Mendorong kemandirian ekonomi warga melalui fasilitasi Nomor Induk Berusaha (NIB) gratis, sertifikasi produk, pelatihan foto digital, serta akses kemitraan modal usaha rakyat.' }}
            </p>
          </div>
          <div class="mt-5 pt-4 border-t border-zinc-200/60 flex items-center text-[11px] font-semibold text-zinc-500">
            <span>Legalitas &amp; Pemasaran Usaha Rakyat</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 5. KOLASE FOTO DOKUMENTASI (BENTO UI STYLE)              -->
  <!-- ======================================================== -->
  <section id="dokumentasi" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 sm:mb-12 gap-6">
        <div class="max-w-2xl">
          <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Dokumentasi <span class="text-[#BC0202]">Aksi</span> Nyata di <span class="text-[#BC0202]">Lapangan</span></h2>
        </div>
        <div class="shrink-0">
          <a href="{{ route('galeri.index') }}" class="inline-flex items-center justify-center rounded-lg bg-white border border-zinc-300 hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-2xs transition-colors">
            Lihat Seluruh Galeri Foto &rarr;
          </a>
        </div>
      </div>

      <!-- Bento UI Grid: Modular layout with varying card spans -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-5">
        <!-- Bento Card 1 (Large Feature Card: Spans 7 cols on lg, 2 rows) -->
        <div class="lg:col-span-7 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[320px] sm:min-h-[380px] lg:min-h-[420px] flex flex-col justify-end">
          <img src="{{ asset($homeSettings['collage'][0]['image'] ?? 'assets/banu/testi_dialog.jpg') }}" alt="{{ $homeSettings['collage'][0]['label'] ?? 'Dialog Aspirasi Warga Kebon Pedes' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
        </div>

        <!-- Bento Card 2 (Spans 5 cols on lg, Medium Height) -->
        <div class="lg:col-span-5 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[250px] sm:min-h-[300px] lg:min-h-[420px] flex flex-col justify-end">
          <img src="{{ asset($homeSettings['collage'][1]['image'] ?? 'assets/banu/program_ambulance.jpg') }}" alt="{{ $homeSettings['collage'][1]['label'] ?? 'Operasional Ambulance Siaga 24 Jam' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
        </div>

        <!-- Bento Card 3 (Spans 4 cols on lg) -->
        <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
          <img src="{{ asset($homeSettings['collage'][2]['image'] ?? 'assets/banu/program_umkm.jpg') }}" alt="{{ $homeSettings['collage'][2]['label'] ?? 'Pelatihan Digitalisasi UMKM RT/RW' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
        </div>

        <!-- Bento Card 4 (Spans 4 cols on lg) -->
        <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
          <img src="{{ asset($homeSettings['collage'][3]['image'] ?? 'assets/banu/footer_community.jpg') }}" alt="{{ $homeSettings['collage'][3]['label'] ?? 'Rembug Guyub Komunitas Warga' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
        </div>

        <!-- Bento Card 5 (Spans 4 cols on lg) -->
        <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
          <img src="{{ asset($homeSettings['hero']['heroImage'] ?? 'assets/banu/hero_banu.jpg') }}" alt="Sidang Paripurna & Pengawasan APBD di Parlemen" class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 6. TESTIMONI -> SUARA & ASPIRASI WARGA                   -->
  <!-- ======================================================== -->
  @php
    $testimonials = $homeSettings['testimonials'] ?? [
      [
        'name' => 'Ibu Suryati Ningsih',
        'role' => 'Warga Kel. Kedung Badak, Tanah Sareal',
        'quote' => 'Waktu keluarga kami membutuhkan rujukan darurat tengah malam, tim Ambulance Siaga Rumah Aspirasi langsung sigap datang menjemput dan mengawal proses administrasi di RSUD tanpa biaya sepeser pun. Nyata manfaatnya bagi warga kecil.',
      ],
      [
        'name' => 'Bpk. Rahmat Hidayat',
        'role' => 'Ketua RW 05, Kel. Kebon Pedes',
        'quote' => 'Saat kami menyampaikan masalah drainase gang yang kerap meluap ketika hujan lebat di Kebon Pedes, beliau langsung turun meninjau bersama dinas terkait. Responnya cepat dan komunikasinya sangat terbuka tanpa birokrasi berbelit.',
      ],
      [
        'name' => 'Bpk. Hendra Gunawan',
        'role' => 'Tokoh Masyarakat Kel. Sukadamai',
        'quote' => 'Usulan perbaikan drainase lingkungan dan penerangan jalan gang yang kami sampaikan di reses dewan benar-benar dikawal serius hingga masuk prioritas realisasi APBD Kota Bogor. Komunikatif dan tidak berjarak dengan warga.',
      ],
    ];
  @endphp
  <section id="suara-warga" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="max-w-2xl mb-10">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Testimoni <span class="text-[#BC0202]">Banu</span> Lesmana <span class="text-[#BC0202]">Bagaskara</span></h2>
      </div>

      <!-- Testimonial Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 items-stretch">
        @foreach ($testimonials as $testi)
          <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between min-h-[240px]">
            <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed">
              &ldquo;{{ $testi['quote'] }}&rdquo;
            </p>
            <div class="flex items-center gap-3 mt-6 pt-5 border-t border-zinc-200/60">
              <div class="flex flex-col">
                <span class="font-bold text-xs sm:text-sm text-zinc-950">{{ $testi['name'] }}</span>
                <span class="text-[11px] text-zinc-500">{{ $testi['role'] }}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 7. CTA KOTAK ASPIRASI (MINIMALIS)                        -->
  <!-- ======================================================== -->
  <section class="w-full bg-[#fafafa] py-14 sm:py-16 border-t border-b border-zinc-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 tracking-tight">Ada Masukan atau Keluhan di Lingkunganmu?</h2>
      <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 max-w-xl mx-auto leading-relaxed">Sampaikan usulan perbaikan jalan, lampu mati, saluran air, atau keluhan lainnya langsung ke Kotak Aspirasi Warga.</p>

      <div class="mt-7 max-w-lg mx-auto">
        <a href="{{ route('kontak.index') }}" class="w-full inline-block rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors shrink-0 active:scale-98">Kirim Aspirasi</a>
      </div>
    </div>
  </section>
@endsection
