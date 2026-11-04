@extends('layouts.public')

@section('title', $seoSettings['metaTitle'] ?? 'Profil & Rekam Jejak | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', $seoSettings['metaDescription'] ?? 'Profil resmi, riwayat pendidikan S1 Manajemen, pengalaman organisasi, 12 isu strategis, dan 6 program fokus pengabdian warga Kota Bogor bersama Banu Lesmana Bagaskara, S.M.')

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
      </header>

      <!-- Mobile Navigation Drawer Overlay (Alpine.js - Rounded-xl) -->
      <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
        <nav class="flex flex-col space-y-3 text-sm font-medium text-zinc-800">
          <a href="{{ route('home') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
          <a href="{{ route('profile') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Profil (Kenali Banu)</a>
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
        <!-- Official Mandate Eyebrow Text (No Badge) -->
        <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-4">
          <span>Profil &amp; Biografi Resmi</span>
        </div>

        @php
          $profileTitle = $profileSettings['hero']['title'] ?? 'Banu Lesmana Bagaskara, S.M.';
          if (str_contains($profileTitle, '<span')) {
              $renderedProfileTitle = $profileTitle;
          } elseif ($profileTitle === 'Banu Lesmana Bagaskara, S.M.' || $profileTitle === 'Kenali Banu Lesmana Bagaskara, S.M.') {
              $renderedProfileTitle = '<span class="text-[#BC0202]">Banu</span> Lesmana <span class="text-[#BC0202]">Bagaskara</span>, S.M.';
          } else {
              $renderedProfileTitle = e($profileTitle);
          }
        @endphp
        <!-- Main Slogan & Headline (Disciplined Sans-Serif Typography) -->
        <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[40px] xl:text-[48px] text-zinc-950 font-bold leading-[1.15] tracking-tight">
          {!! $renderedProfileTitle !!}
        </h1>

        <!-- Subtitle / Executive Summary -->
        <p class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-zinc-600 font-normal leading-relaxed mt-4 sm:mt-5 max-w-[480px]">
          {{ $profileSettings['hero']['subtitle'] ?? 'Anggota DPRD Kota Bogor terpilih periode 2024–2029 dari Dapil 4 Kecamatan Tanah Sareal (PDI Perjuangan No. Urut 5). Berlatar belakang profesional manajemen bisnis di sektor riil dengan tekad memperjuangkan transparansi anggaran publik dan pelayanan dasar rakyat tanpa sekat.' }}
        </p>

        <!-- Key Metadata Grid (Clean 2x2, Rounded-xl Cards, No Pill) -->
        <div class="grid grid-cols-2 gap-3 mt-6 pt-5 border-t border-zinc-200/80">
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Daerah Pemilihan</span>
            <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">Kota Bogor 4 &bull; Tanah Sareal</span>
          </div>
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Partai Politik</span>
            <span class="font-bold text-xs sm:text-sm text-[#BC0202] mt-0.5">{{ $generalSettings['party'] ?? 'PDI Perjuangan (No. 5)' }}</span>
          </div>
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Domisili Warga</span>
            <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">{{ $generalSettings['address'] ?? 'Kedung Badak, Tanah Sareal' }}</span>
          </div>
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Komisi DPRD</span>
            <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">{{ $generalSettings['officeRole'] ?? 'Komisi 1 DPRD Kota Bogor' }}</span>
          </div>
        </div>

        <!-- CTA Buttons: Shadcn Button Style (No Pill, Rounded-lg) -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 mt-7 sm:mt-8">
          <a
            href="#visi-misi"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-sm transition-colors active:scale-98 text-center"
          >
            Lihat Visi &amp; 3 Misi Pokok
          </a>
          <a
            href="#pengalaman"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-2xs transition-colors active:scale-98 text-center"
          >
            Rekam Jejak &amp; 12 Isu Penting
          </a>
        </div>
      </div>

      <!-- Spacer for vertical alignment -->
      <div class="h-2"></div>
    </div>

    <!-- Hero Right: Edge-to-Edge Photo Side with Top-Right Menu Button on Desktop -->
    <div class="relative min-h-[360px] sm:min-h-[440px] lg:min-h-full w-full bg-zinc-100 overflow-hidden">
      <img src="{{ asset($profileSettings['hero']['heroImage'] ?? 'assets/banu/hero_banu.jpg') }}" alt="Banu Lesmana Bagaskara, S.M. - Profil Resmi" class="w-full h-full object-cover object-top filter grayscale contrast-105 hover:grayscale-0 transition-all duration-500" />

      <!-- Desktop Pre-Scroll Navigation Bar (Rounded-xl container, No Pill) -->
      <div class="hidden lg:block absolute top-8 right-8 xl:top-10 xl:right-14 2xl:right-20 z-20">
        <nav class="flex items-center gap-1.5 bg-white/95 border border-zinc-200 p-1.5 rounded-xl shadow-sm">
          <a href="{{ route('home') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
          <a href="{{ route('profile') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Profil</a>
          <a href="{{ route('kinerja.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
          <a href="{{ route('berita.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Berita</a>
          <a href="{{ route('galeri.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
          <a href="{{ route('kontak.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kontak</a>
        </nav>
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 2. VISI & 3 MISI POKOK PEMBANGUNAN         -->
  <!-- ========================================== -->
  <section id="visi-misi" class="w-full bg-[#fafafa] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="max-w-2xl mb-10 sm:mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight"><span class="text-[#BC0202]">Visi</span> &amp; Tiga <span class="text-[#BC0202]">Misi</span> Pokok</h2>
      </div>

      <!-- Official Vision Highlight Card (Rounded-xl, No Badge, No Gradient) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-7 sm:p-10 shadow-sm mb-8 relative overflow-hidden">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
          <div class="max-w-3xl">
            <h3 class="text-xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-950 tracking-tight leading-tight">&ldquo;{{ $profileSettings['vision'] ?? 'Kota Bogor yang Maju dan Nyaman untuk Semua' }}&rdquo;</h3>
            <p class="text-xs sm:text-sm text-zinc-600 mt-3.5 leading-relaxed">
              Kemajuan Kota Bogor tidak boleh meninggalkan satu pun kelompok masyarakat. Pembangunan fisik harus berjalan selaras dengan ketenangan hidup, kemudahan akses kesehatan darurat, perlindungan hak belajar anak, serta kepastian berusaha bagi pedagang kecil di tingkat rukun warga.
            </p>
          </div>
          <div class="shrink-0 flex flex-col justify-center items-start lg:items-end border-t lg:border-t-0 lg:border-l border-zinc-200 pt-4 lg:pt-0 lg:pl-8">
            <span class="text-lg sm:text-xl font-black text-[#BC0202] mt-1">{{ $generalSettings['slogan'] ?? 'Bogor Lebih Baik' }}</span>
          </div>
        </div>
      </div>

      <!-- 3 Misi Pokok Grid (3 Columns, Rounded-xl Cards) -->
      @php
        $missions = $profileSettings['mission'] ?? [
          'Advokasi & Analisis Masukan Rakyat' => 'Menjaga rencana pembangunan agar senantiasa berpihak pada rakyat melalui analisis dampak mendalam serta penyerapan masukan warga secara berkala dan terverifikasi.',
          'Peningkatan Taraf Pendidikan Warga' => 'Meningkatkan taraf pendidikan warga Kota Bogor dan memastikan penurunan angka putus sekolah melalui advokasi alokasi beasiswa daerah yang tepat sasaran.',
          'Kemandirian Ekonomi & Keilmuan' => 'Mendorong masyarakat terjun di bidang keilmuan dan penelitian terapan guna mengurangi angka pengangguran serta meningkatkan daya beli dan taraf hidup warga.',
        ];
        $misiSubtexts = [
          'Fungsi Pengawasan & Anggaran',
          'Program Wajib Belajar 12 Tahun',
          'Inovasi Riset & UMKM Lokal',
          'Harmoni Sosial & Perlindungan Warga',
        ];
      @endphp
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 items-stretch">
        @foreach ($missions as $mKey => $m)
          @php
            $mText = is_array($m) ? ($m['desc'] ?? '') : $m;
            if (!is_numeric($mKey)) {
                $mTitle = $mKey;
            } else {
                if ($loop->index === 0 && str_contains($mText, 'hak-hak dasar')) {
                    $mTitle = 'Pemenuhan Hak Dasar & Fasilitas Warga';
                } elseif ($loop->index === 1 && str_contains($mText, 'transparansi')) {
                    $mTitle = 'Transparansi Kebijakan & Alokasi APBD';
                } elseif ($loop->index === 2 && str_contains($mText, 'ekonomi rakyat')) {
                    $mTitle = 'Kemandirian Ekonomi & Digitalisasi UMKM';
                } elseif ($loop->index === 3 && str_contains($mText, 'harmoni sosial')) {
                    $mTitle = 'Harmoni Sosial & Perlindungan Warga';
                } else {
                    $mTitle = \Illuminate\Support\Str::words($mText, 4, '');
                }
            }
          @endphp
          <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-7 shadow-sm flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div>
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm">{{ sprintf('%02d', $loop->iteration) }}</div>
              <h4 class="font-bold text-base sm:text-lg text-zinc-950 mt-4 tracking-tight">{{ $mTitle }}</h4>
              <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                {{ $mText }}
              </p>
            </div>
            <div class="mt-6 pt-4 border-t border-zinc-100 flex items-center text-xs font-semibold text-[#BC0202]">
              <span>{{ $misiSubtexts[$loop->index % count($misiSubtexts)] }}</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- ========================================== -->
  <!-- 3. REKAM JEJAK PENGALAMAN & PENDIDIKAN     -->
  <!-- ========================================== -->
  <section id="pengalaman" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="max-w-2xl mb-10 sm:mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Rekam <span class="text-[#BC0202]">Jejak</span> Pengalaman &amp; <span class="text-[#BC0202]">Pendidikan</span></h2>
      </div>

      @php
        $experiences = $profileSettings['historyTrack']['experience'] ?? [
          ['title' => 'Anggota DPRD Kota Bogor', 'institution' => 'DPRD Kota Bogor (Dapil 4 Tanah Sareal)', 'period' => '2024 – Sekarang'],
          ['title' => 'Direktur Utama', 'institution' => 'PT. Kreasi Baraya Mandiri', 'period' => '2018 – 2023'],
          ['title' => 'Direktur', 'institution' => 'CV. Putra Baraya Mandiri', 'period' => '2020 – 2023'],
          ['title' => 'Pimpinan', 'institution' => 'KSU Karya Mandiri', 'period' => '2015 – 2023'],
        ];
        $educations = $profileSettings['historyTrack']['education'] ?? [
          ['title' => 'Sarjana Manajemen (S.M.)', 'institution' => 'IBI Kesatuan Bogor', 'period' => '2015 – 2019'],
          ['title' => 'Sekolah Menengah Atas (SMA)', 'institution' => 'SMA Negeri 4 Bogor', 'period' => '2011 – 2014'],
          ['title' => 'Sekolah Menengah Pertama (SMP)', 'institution' => 'SMP Mardi Yuana Bogor', 'period' => '2008 – 2011'],
          ['title' => 'Sekolah Dasar (SD)', 'institution' => 'SD Mardi Yuana Bogor', 'period' => '2002 – 2008'],
        ];
      @endphp

      <!-- 2 Separate Columns: Rekam Jejak Pengalaman & Riwayat Pendidikan -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">
        <!-- Column 1: Rekam Jejak Pengalaman -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
          <div class="flex items-center justify-between pb-5 mb-5 border-b border-zinc-100">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <h3 class="text-base sm:text-lg font-bold text-zinc-950 tracking-tight">Rekam Jejak Pengalaman</h3>
              </div>
            </div>
          </div>

          <!-- List: Pengalaman -->
          <div class="space-y-3">
            @foreach ($experiences as $exp)
              <div class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3">
                <div class="min-w-0 flex-1">
                  <div class="font-bold text-xs sm:text-sm text-zinc-950 tracking-tight">{{ $exp['title'] }}</div>
                  <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">{{ $exp['institution'] }}</div>
                </div>
                <div class="text-right shrink-0">
                  <span class="inline-block text-[11px] sm:text-xs font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs">
                    {{ $exp['period'] }}
                  </span>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Column 2: Riwayat Pendidikan -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
          <div class="flex items-center justify-between pb-5 mb-5 border-b border-zinc-100">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
              </div>
              <div>
                <h3 class="text-base sm:text-lg font-bold text-zinc-950 tracking-tight">Riwayat Pendidikan</h3>
              </div>
            </div>
          </div>

          <!-- List: Pendidikan -->
          <div class="space-y-3">
            @foreach ($educations as $edu)
              <div class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3">
                <div class="min-w-0 flex-1">
                  <div class="font-bold text-xs sm:text-sm text-zinc-950 tracking-tight">{{ $edu['title'] }}</div>
                  <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">{{ $edu['institution'] }}</div>
                </div>
                <div class="text-right shrink-0">
                  <span class="inline-block text-[11px] sm:text-xs font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs">
                    {{ $edu['period'] }}
                  </span>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 4. DUA BELAS ISU PENTING (GOODKIND.ID)     -->
  <!-- ========================================== -->
  <section id="isu-penting" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200" x-data="{ isuFilter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Section Header -->
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 sm:mb-12">
        <div class="max-w-2xl">
          <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">12 <span class="text-[#BC0202]">Isu</span> Penting</h2>
        </div>
      </div>

      @php
        $issues = $profileSettings['issues'] ?? [];
      @endphp
      <!-- 12 Isu Grid (3 Columns Responsive) -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
        @foreach ($issues as $issue)
          @php
            $no = $issue['no'] ?? $loop->iteration;
            $cat = $no <= 4 ? 'gov' : ($no <= 8 ? 'soc' : 'env');
          @endphp
          <div x-show="isuFilter === 'all' || isuFilter === '{{ $cat }}'" class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-zinc-300 p-6 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
            <div>
              <h3 class="font-bold text-base text-zinc-950 tracking-tight">{{ $issue['title'] }}</h3>
              <p class="text-xs text-zinc-600 mt-2.5 leading-relaxed">
                {{ $issue['desc'] }}
              </p>
            </div>
            <div class="mt-5 pt-3.5 border-t border-zinc-200/60 flex items-center text-[11px] text-zinc-500">
              <span class="text-[#BC0202]">Isu #{{ $no }} &bull; Dapil 4 Tanah Sareal</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 5. ENAM PILAR PROGRAM PENGABDIAN           -->
  <!-- ========================================== -->
  <section class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Enam <span class="text-[#BC0202]">Fokus</span> Program</h2>
      </div>

      @php
        $programs = $profileSettings['programs'] ?? [];
        $programBadges = [
          'Kedung Badak, Tanah Sareal',
          'Layanan Gratis 24 Jam',
          'Keterbukaan Informasi Publik',
          'Penurunan Angka Putus Sekolah',
          'Pemberdayaan Pemuda Kreatif',
          'Kemandirian Ekonomi Warga',
        ];
      @endphp
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
        @foreach ($programs as $progIdx => $prog)
          <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:border-zinc-300 transition-colors flex flex-col justify-between">
            <div>
              <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm">{{ sprintf('%02d', $prog['no'] ?? ($progIdx + 1)) }}</div>
              <h3 class="font-bold text-base text-zinc-950 mt-4 flex items-center tracking-tight"><span class="text-[#BC0202] font-black mr-2">|</span> {{ $prog['title'] }}</h3>
              <p class="text-xs text-zinc-600 mt-2.5 leading-relaxed">{{ $prog['desc'] }}</p>
            </div>
            <div class="mt-6 pt-4 border-t border-zinc-100 text-[11px] text-[#BC0202] font-medium">{{ $programBadges[$progIdx % count($programBadges)] }}</div>
          </div>
        @endforeach
      </div>

      <div class="text-center mt-12">
        <a href="{{ route('kinerja.index') }}" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-6 py-3 shadow-sm transition-colors">
          Lihat Laporan Pelaksanaan Program &rarr;
        </a>
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 6. KOLASE FOTO DOKUMENTASI & PROFIL LAPANGAN (BENTO UI)  -->
  <!-- ======================================================== -->
  <section id="dokumentasi-profil" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-5">
        <div class="lg:col-span-7 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[320px] sm:min-h-[380px] lg:min-h-[420px] flex flex-col justify-end">
          <img src="{{ asset('assets/banu/testi_dialog.jpg') }}" alt="Dialog Aspirasi Warga Kebon Pedes" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
        </div>

        <div class="lg:col-span-5 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[250px] sm:min-h-[300px] lg:min-h-[420px] flex flex-col justify-end">
          <img src="{{ asset('assets/banu/hero_banu.jpg') }}" alt="Sidang Paripurna & Pengawasan APBD di Parlemen" class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" loading="lazy" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
        </div>

        <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
          <img src="{{ asset('assets/banu/program_ambulance.jpg') }}" alt="Operasional Ambulance Siaga 24 Jam" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
        </div>

        <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
          <img src="{{ asset('assets/banu/program_umkm.jpg') }}" alt="Pelatihan Digitalisasi UMKM RT/RW" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
        </div>

        <div class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
          <img src="{{ asset('assets/banu/footer_community.jpg') }}" alt="Rembug Guyub Komunitas Warga" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 7. CALLOUT SUMPAH JANJI & INTEGRITAS       -->
  <!-- ========================================== -->
  <section class="w-full bg-[#fafafa] py-16 sm:py-20 border-b border-zinc-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
      <div class="w-12 h-1 bg-[#BC0202] mx-auto mb-6 rounded-sm"></div>
      <blockquote class="text-lg sm:text-2xl lg:text-[26px] font-bold text-zinc-950 leading-snug tracking-tight">
        &ldquo;{{ $profileSettings['quote'] ?? 'Kursi di parlemen bukan privilese kekuasaan, melainkan mandat pengabdian rakyat yang harus dipertanggungjawabkan secara terbuka setiap waktu.' }}&rdquo;
      </blockquote>
      <div class="mt-6 flex flex-col items-center justify-center">
        <span class="font-bold text-sm text-zinc-950">Banu Lesmana Bagaskara, S.M.</span>
      </div>
    </div>
  </section>

  <!-- ======================================================== -->
  <!-- 8. CTA KOTAK ASPIRASI (MINIMALIS)                        -->
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
