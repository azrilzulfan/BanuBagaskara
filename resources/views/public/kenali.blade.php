@extends('layouts.public')

@section('title', 'Profil & Rekam Jejak | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', 'Profil resmi, riwayat pendidikan S1 Manajemen, pengalaman organisasi, 12 isu strategis, dan 6 program fokus pengabdian warga Kota Bogor bersama Banu Lesmana Bagaskara, S.M.')

@section('content')
  <!-- ========================================== -->
  <!-- 1. HERO SECTION (Split 50/50 Layout)       -->
  <!-- ========================================== -->
  <section class="w-full grid grid-cols-1 lg:grid-cols-2 relative min-h-[580px] lg:min-h-[660px] xl:min-h-[720px] border-b border-zinc-200">
    <div class="bg-[#faf5f5] px-6 sm:px-10 md:px-14 lg:pl-12 lg:pr-10 xl:pl-20 xl:pr-16 2xl:pl-32 2xl:pr-24 pt-7 sm:pt-10 pb-12 sm:pb-16 flex flex-col justify-between relative overflow-hidden">
      <!-- Top Nav Header -->
      <header class="flex items-center justify-between z-10 w-full mb-8 sm:mb-10 gap-2">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
          <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm sm:text-base shadow-sm shrink-0">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
          </div>
          <div class="flex flex-col leading-tight min-w-0 flex-1">
            <span class="font-bold text-sm sm:text-base lg:text-lg tracking-tight text-zinc-950 truncate">banubagaskara.</span>
          </div>
        </a>

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

      <!-- Mobile Navigation Drawer Overlay -->
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
        <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-4">
          <span>Profil &amp; Biografi Resmi</span>
        </div>

        <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[40px] xl:text-[48px] text-zinc-950 font-bold leading-[1.15] tracking-tight">
          <span class="text-[#BC0202]">Banu</span> Lesmana <span class="text-[#BC0202]">Bagaskara</span>, S.M.
        </h1>

        <p class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-zinc-600 font-normal leading-relaxed mt-4 sm:mt-5 max-w-[480px]">
          Anggota DPRD Kota Bogor terpilih periode 2024–2029 dari Dapil 4 Kecamatan Tanah Sareal (Fraksi PDI Perjuangan Komisi 1). Berlatar belakang sarjana manajemen dengan tekad memperjuangkan transparansi anggaran publik dan pemenuhan hak dasar warga tanpa kompromi.
        </p>

        <!-- Metadata Grid -->
        <div class="grid grid-cols-2 gap-3 mt-6 pt-5 border-t border-zinc-200/80">
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Daerah Pemilihan</span>
            <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">Kota Bogor 4 &bull; Tanah Sareal</span>
          </div>
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Partai Politik</span>
            <span class="font-bold text-xs sm:text-sm text-[#BC0202] mt-0.5">PDI Perjuangan</span>
          </div>
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Komisi DPRD</span>
            <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">Komisi 1 DPRD Kota Bogor</span>
          </div>
          <div class="flex flex-col">
            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Sekretariat Aspirasi</span>
            <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">Kedung Badak, Tanah Sareal</span>
          </div>
        </div>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 mt-7 sm:mt-8">
          <a
            href="#visi-misi"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-sm transition-colors active:scale-98 text-center"
          >
            Lihat Visi &amp; Misi
          </a>
          <a
            href="#pengalaman"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-2xs transition-colors active:scale-98 text-center"
          >
            Rekam Jejak &amp; 12 Isu Penting
          </a>
        </div>
      </div>

      <div class="h-2"></div>
    </div>

    <!-- Hero Right Photo -->
    <div class="relative min-h-[360px] sm:min-h-[440px] lg:min-h-full w-full bg-zinc-100 overflow-hidden">
      <img src="{{ asset('assets/banu/hero_banu.jpg') }}" alt="Banu Lesmana Bagaskara, S.M. - Profil Resmi" class="w-full h-full object-cover object-top filter grayscale contrast-105 hover:grayscale-0 transition-all duration-500" />

      <!-- Desktop Pre-Scroll Navigation Bar -->
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
  <!-- 2. VISI & MISI RESMI PEMBANGUNAN           -->
  <!-- ========================================== -->
  <section id="visi-misi" class="w-full bg-[#fafafa] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="max-w-2xl mb-10 sm:mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight"><span class="text-[#BC0202]">Visi</span> &amp; Komitmen <span class="text-[#BC0202]">Misi</span> Pokok</h2>
      </div>

      <!-- Vision Card -->
      <div class="rounded-xl border border-zinc-200 bg-white p-7 sm:p-10 shadow-sm mb-8 relative overflow-hidden">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
          <div class="max-w-3xl">
            <span class="text-xs font-bold text-[#BC0202] uppercase tracking-wider block mb-2">Visi Pengabdian Kedewanan</span>
            <p class="text-lg sm:text-2xl font-bold text-zinc-950 leading-snug tracking-tight">
              &ldquo;{{ $profileSettings['vision'] ?? 'Mewujudkan Kota Bogor yang maju, berkeadilan sosial, dan nyaman untuk semua warga melalui tata kelola kebijakan publik yang transparan dan akuntabel.' }}&rdquo;
            </p>
          </div>
        </div>
      </div>

      <!-- Mission List -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @php
          $missions = $profileSettings['mission'] ?? [
            'Memperjuangkan pemenuhan hak-hak dasar warga di bidang pendidikan gratis, fasilitas kesehatan cepat, dan infrastruktur lingkungan yang tertata.',
            'Mendorong transparansi kebijakan publik dan keterbukaan alokasi anggaran APBD Kota Bogor yang berpihak penuh pada kepentingan rakyat.',
            'Menggerakkan potensi ekonomi rakyat melalui fasilitasi legalitas gratis, permodalan, dan digitalisasi UMKM berbasis RT/RW.',
            'Menjaga harmoni sosial, perlindungan perempuan dan anak, serta mewujudkan lingkungan Kota Bogor yang aman dan bebas tawuran.'
          ];
        @endphp

        @foreach ($missions as $index => $item)
          <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs flex items-start gap-4">
            <div class="w-8 h-8 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm shrink-0">
              0{{ $index + 1 }}
            </div>
            <p class="text-xs sm:text-sm text-zinc-700 leading-relaxed pt-1">
              {{ $item }}
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 3. REKAM JEJAK PENDIDIKAN & PENGALAMAN    -->
  <!-- ========================================== -->
  <section id="pengalaman" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="max-w-2xl mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Rekam <span class="text-[#BC0202]">Jejak</span> &amp; <span class="text-[#BC0202]">Pengalaman</span></h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Pendidikan -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] p-6 sm:p-8">
          <h3 class="text-lg font-bold text-zinc-950 mb-6 flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-sm bg-[#BC0202]"></span>
            Riwayat Pendidikan
          </h3>
          <div class="space-y-6">
            <div class="relative pl-6 border-l-2 border-zinc-200">
              <span class="text-xs font-semibold text-[#BC0202]">2018 – 2022</span>
              <h4 class="font-bold text-sm text-zinc-950 mt-0.5">Sarjana Manajemen (S.M.)</h4>
              <p class="text-xs text-zinc-600 mt-1">Fakultas Ekonomi dan Bisnis &bull; Fokus Tata Kelola &amp; Manajemen Strategis</p>
            </div>
            <div class="relative pl-6 border-l-2 border-zinc-200">
              <span class="text-xs font-semibold text-zinc-500">2015 – 2018</span>
              <h4 class="font-bold text-sm text-zinc-950 mt-0.5">Sekolah Menengah Atas (SMA)</h4>
              <p class="text-xs text-zinc-600 mt-1">SMA Negeri di Kota Bogor</p>
            </div>
            <div class="relative pl-6 border-l-2 border-zinc-200">
              <span class="text-xs font-semibold text-zinc-500">2012 – 2015</span>
              <h4 class="font-bold text-sm text-zinc-950 mt-0.5">Sekolah Menengah Pertama (SMP)</h4>
              <p class="text-xs text-zinc-600 mt-1">SMP Negeri di Kota Bogor</p>
            </div>
          </div>
        </div>

        <!-- Pengalaman & Organisasi -->
        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] p-6 sm:p-8">
          <h3 class="text-lg font-bold text-zinc-950 mb-6 flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-sm bg-[#BC0202]"></span>
            Pengabdian &amp; Pengalaman
          </h3>
          <div class="space-y-6">
            <div class="relative pl-6 border-l-2 border-zinc-200">
              <span class="text-xs font-semibold text-[#BC0202]">2024 – Sekarang</span>
              <h4 class="font-bold text-sm text-zinc-950 mt-0.5">Anggota Komisi 1 DPRD Kota Bogor</h4>
              <p class="text-xs text-zinc-600 mt-1">Fraksi PDI Perjuangan &bull; Bidang Hukum, Pemerintahan, Kepegawaian, dan Ketertiban Umum</p>
            </div>
            <div class="relative pl-6 border-l-2 border-zinc-200">
              <span class="text-xs font-semibold text-[#BC0202]">2023 – Sekarang</span>
              <h4 class="font-bold text-sm text-zinc-950 mt-0.5">Inisiator Rumah Aspirasi Rakyat &amp; Ambulance Siaga 24 Jam</h4>
              <p class="text-xs text-zinc-600 mt-1">Posko terpadu advokasi warga prasejahtera dan layanan darurat medis se-Tanah Sareal</p>
            </div>
            <div class="relative pl-6 border-l-2 border-zinc-200">
              <span class="text-xs font-semibold text-zinc-500">2021 – Sekarang</span>
              <h4 class="font-bold text-sm text-zinc-950 mt-0.5">Penggerak Pemberdayaan UMKM &amp; Pemuda Kreatif</h4>
              <p class="text-xs text-zinc-600 mt-1">Komunitas Bogor Lebih Baik &bull; Edukasi legalitas NIB dan kewirausahaan pemuda</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 4. 12 ISU PENTING STRATEGIS                -->
  <!-- ========================================== -->
  <section class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="max-w-2xl mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">12 <span class="text-[#BC0202]">Isu Penting</span> yang Terus Dikawal</h2>
        <p class="text-xs sm:text-sm text-zinc-600 mt-2.5">Fokus advokasi kebijakan publik di DPRD Kota Bogor untuk kemaslahatan warga Tanah Sareal.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
        @php
          $issues = [
            'Infrastruktur & Drainase Bebas Genangan',
            'Penerangan Jalan Umum (PJU) Merata',
            'Layanan Kesehatan Cepat & Ambulance Gratis',
            'Wajib Belajar 12 Tahun & Bebas Ijazah Tertahan',
            'Penguatan Legalitas & Modal Usaha UMKM',
            'Kota Bogor Aman Tanpa Tawuran Remaja',
            'Transparansi APBD & Pokir Terbuka',
            'Pengelolaan Sampah Berbasis Lingkungan',
            'Ruang Terbuka Hijau & Sarana Publik Guyub',
            'Pelayanan Publik Digital & E-Government',
            'Perlindungan Sosial Lansia & Disabilitas',
            'Perubahan Iklim, Kelestarian SDA & SDG',
          ];
        @endphp

        @foreach ($issues as $idx => $issue)
          <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-[#BC0202] transition-colors flex items-start gap-3.5">
            <div class="w-7 h-7 rounded-md bg-red-50 text-[#BC0202] flex items-center justify-center font-mono font-bold text-xs shrink-0 mt-0.5">
              {{ sprintf('%02d', $idx + 1) }}
            </div>
            <p class="text-xs sm:text-sm font-bold text-zinc-900 leading-snug pt-0.5">
              {{ $issue }}
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 5. KUTIPAN INTEGRITAS                      -->
  <!-- ========================================== -->
  <section class="w-full bg-white py-16 sm:py-20 border-b border-zinc-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
      <blockquote class="text-lg sm:text-2xl font-bold text-zinc-950 leading-relaxed italic">
        &ldquo;Amanah di parlemen bukan tentang jabatan atau kekuasaan, melainkan seberapa besar manfaat konkret yang bisa kita hadirkan langsung di depan pintu rumah warga.&rdquo;
      </blockquote>
      <div class="mt-6 flex flex-col items-center">
        <span class="font-bold text-sm text-[#BC0202]">Banu Lesmana Bagaskara, S.M.</span>
        <span class="text-xs text-zinc-500">Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal</span>
      </div>
    </div>
  </section>
@endsection
