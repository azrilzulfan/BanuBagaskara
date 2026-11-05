@extends('layouts.admin')

@section('title', 'Pengaturan Halaman Website | Dasbor Admin Banu Lesmana Bagaskara, S.M.')

@php
  $emptyUmum = [
    'siteTitle' => '',
    'slogan' => '',
    'visionSlogan' => '',
    'officeRole' => '',
    'party' => '',
    'dapil' => '',
    'address' => '',
    'phone' => '',
    'email' => '',
    'socials' => [
      'instagram' => '',
      'tiktok' => '',
      'facebook' => '',
    ],
    'footerQuote' => '',
    'logo' => null,
    'favicon' => null,
    'site_status' => 'online',
    'maintenance_message' => '',
    'footerBanner' => [
      'image' => null,
      'alt' => '',
    ],
    'contactBanner' => [
      'image' => null,
      'alt' => '',
    ],
  ];

  $emptyBeranda = [
    'hero' => [
      'headline' => '',
      'description' => '',
      'ctaSecondaryText' => '',
      'ctaSecondaryLink' => '',
      'heroImage' => null,
    ],
    'banner' => [
      'image' => null,
      'alt' => '',
    ],
    'collage' => [
      ['label' => '', 'image' => null, 'tag' => 'Slot 1'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 2'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 3'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 4'],
    ],
    'programs' => [
      ['no' => 1, 'title' => '', 'desc' => ''],
      ['no' => 2, 'title' => '', 'desc' => ''],
      ['no' => 3, 'title' => '', 'desc' => ''],
      ['no' => 4, 'title' => '', 'desc' => ''],
      ['no' => 5, 'title' => '', 'desc' => ''],
      ['no' => 6, 'title' => '', 'desc' => ''],
    ],
    'testimonials' => [],
  ];

  $emptyProfil = [
    'hero' => [
      'subtitle' => '',
      'heroImage' => null,
    ],
    'quote' => [
      'text' => '',
      'author' => '',
      'role' => '',
    ],
    'vision' => '',
    'mission' => [],
    'newMissionItem' => '',
    'historyTrack' => [
      'education' => [],
      'experience' => [],
    ],
    'issues' => [
      ['no' => 1, 'title' => '', 'desc' => ''],
      ['no' => 2, 'title' => '', 'desc' => ''],
      ['no' => 3, 'title' => '', 'desc' => ''],
      ['no' => 4, 'title' => '', 'desc' => ''],
      ['no' => 5, 'title' => '', 'desc' => ''],
      ['no' => 6, 'title' => '', 'desc' => ''],
      ['no' => 7, 'title' => '', 'desc' => ''],
      ['no' => 8, 'title' => '', 'desc' => ''],
      ['no' => 9, 'title' => '', 'desc' => ''],
      ['no' => 10, 'title' => '', 'desc' => ''],
      ['no' => 11, 'title' => '', 'desc' => ''],
      ['no' => 12, 'title' => '', 'desc' => ''],
    ],
    'programs' => [
      ['no' => 1, 'title' => '', 'desc' => ''],
      ['no' => 2, 'title' => '', 'desc' => ''],
      ['no' => 3, 'title' => '', 'desc' => ''],
      ['no' => 4, 'title' => '', 'desc' => ''],
      ['no' => 5, 'title' => '', 'desc' => ''],
      ['no' => 6, 'title' => '', 'desc' => ''],
    ],
    'collage' => [
      ['label' => '', 'image' => null, 'tag' => 'Slot 1'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 2'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 3'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 4'],
      ['label' => '', 'image' => null, 'tag' => 'Slot 5'],
    ],
  ];

  $emptySeo = [
    'metaTitle' => '',
    'metaDescription' => '',
    'keywords' => '',
    'ogImage' => null,
    'canonicalUrl' => '',
    'enableIndexing' => true,
    'googleSearchConsoleTag' => '',
  ];

  $initialUmum = array_replace_recursive($emptyUmum, is_array($general) ? $general : []);
  $initialBeranda = array_replace_recursive($emptyBeranda, is_array($home) ? $home : []);
  $initialProfil = array_replace_recursive($emptyProfil, is_array($profile) ? $profile : []);
  $initialSeo = array_replace_recursive($emptySeo, is_array($seo) ? $seo : []);

  if (isset($initialProfil['quote']) && is_string($initialProfil['quote'])) {
      $initialProfil['quote'] = [
          'text' => $initialProfil['quote'],
          'author' => '',
          'role' => '',
      ];
  }
@endphp

@section('content')
<div
  x-data="adminPengaturan()"
  class="w-full flex-1 flex flex-col bg-[#fafafa]"
>
  <!-- Uploading Overlay Modal -->
  <div
    x-show="isUploading"
    x-cloak
    class="fixed inset-0 z-50 bg-black/40 backdrop-blur-xs flex items-center justify-center"
  >
    <div class="rounded-xl bg-white px-6 py-5 shadow-2xl flex items-center gap-4 text-xs font-semibold text-zinc-900 border border-zinc-200">
      <svg class="animate-spin h-5 w-5 text-[#BC0202]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
      </svg>
      <span x-text="uploadProgressText || 'Sedang mengunggah file gambar...'"></span>
    </div>
  </div>

  <!-- Notification Toast -->
  <div
    x-show="saveToast"
    x-transition
    x-cloak
    class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
  >
    <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
    <div>
      <span class="font-bold block" x-text="toastMessage"></span>
      <span class="text-emerald-800">Pembaruan telah tersimpan pada konfigurasi website.</span>
    </div>
  </div>

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

  <!-- Page Header & Action Bar (Sticky Header) -->
  <header class="bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-4 sticky top-0 z-30 shadow-xs transition-all">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div>
        <div class="flex items-center gap-2 text-xs font-semibold text-zinc-500 mb-1">
          <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-900 transition-colors">Dasbor Admin</a>
          <span>&rsaquo;</span>
          <span class="text-[#BC0202]">Pengaturan Website</span>
        </div>
        <h1 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight">
          Pengaturan Halaman Website &bull; <span class="text-[#BC0202]">Konfigurasi Konten</span>
        </h1>
        <p class="text-xs text-zinc-600 mt-0.5 max-w-2xl leading-relaxed">
          Kelola data informasi umum, logo, favicon, narasi hero, upload foto, rekam jejak pendidikan/pengalaman, testimoni warga, kutipan dewan, dan optimasi SEO.
        </p>
      </div>

      <!-- Action Save Button -->
      <div class="flex items-center gap-3 shrink-0">
        <button
          type="button"
          @click="saveSettings()"
          :disabled="saving"
          class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-2 cursor-pointer disabled:opacity-50"
        >
          <svg x-show="!saving" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          <svg x-show="saving" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
          </svg>
          <span x-text="saving ? 'Menyimpan...' : 'Simpan Perubahan'"></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Main Workspace Area with Category Tabs -->
  <div class="max-w-7xl mx-auto w-full px-4 sm:px-8 lg:px-10 py-8 space-y-6 flex-1">
    <!-- 4 Category Tabs Navigation -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-zinc-200 text-xs sm:text-sm font-semibold">
      <!-- Tab 1: Umum -->
      <button
        type="button"
        @click="activeTab = 'umum'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'umum' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <span>1. Informasi Umum &amp; Kontak</span>
      </button>

      <!-- Tab 2: Beranda -->
      <button
        type="button"
        @click="activeTab = 'beranda'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'beranda' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span>2. Halaman Beranda</span>
      </button>

      <!-- Tab 3: Profil -->
      <button
        type="button"
        @click="activeTab = 'profil'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'profil' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span>3. Halaman Profil (Kenali Saya)</span>
      </button>

      <!-- Tab 4: SEO -->
      <button
        type="button"
        @click="activeTab = 'seo'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'seo' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span>4. SEO &amp; Mesin Pencari</span>
      </button>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 1: PENGATURAN UMUM & KONTAK RESMI                    -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'umum'" x-cloak class="space-y-6">
      <!-- 0. Status Operasional Website (Online / Maintenance) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Status Operasional Website</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Atur apakah website dapat diakses publik atau sedang dalam pemeliharaan teknis (maintenance).</p>
          </div>
          <div class="inline-flex p-1 bg-zinc-100 rounded-lg border border-zinc-200 gap-1 shrink-0">
            <button
              type="button"
              @click="umum.site_status = 'online'"
              :class="umum.site_status !== 'maintenance' ? 'bg-white text-emerald-700 shadow-2xs font-bold border border-zinc-200/60' : 'text-zinc-600 hover:text-zinc-900 font-medium'"
              class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-xs transition-all cursor-pointer"
            >
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
              <span>Online (Aktif)</span>
            </button>
            <button
              type="button"
              @click="umum.site_status = 'maintenance'"
              :class="umum.site_status === 'maintenance' ? 'bg-amber-500 text-white shadow-2xs font-bold' : 'text-zinc-600 hover:text-zinc-900 font-medium'"
              class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-xs transition-all cursor-pointer"
            >
              <span class="w-2 h-2 rounded-full bg-amber-200"></span>
              <span>Dalam Maintenance</span>
            </button>
          </div>
        </div>

        <!-- Info Box & Custom Maintenance Message -->
        <div x-show="umum.site_status === 'maintenance'" class="p-4 rounded-xl border border-amber-200 bg-amber-50/60 space-y-3">
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <div class="space-y-1">
              <p class="text-xs font-bold text-amber-900">Mode Pemeliharaan Aktif</p>
              <p class="text-xs text-amber-800 leading-relaxed">
                Pengunjung publik akan dialihkan ke halaman pemeliharaan (Error 503). Halaman login dan dasbor admin tetap dapat diakses oleh administrator.
              </p>
            </div>
          </div>
          <div>
            <label class="block text-xs font-bold text-amber-950 mb-1.5">Pesan Pemeliharaan untuk Pengunjung (Opsional)</label>
            <textarea
              rows="2"
              x-model="umum.maintenance_message"
              placeholder="Website sedang dalam peningkatan sistem dan pemeliharaan berkala. Kami akan segera kembali melayani Anda."
              class="w-full rounded-lg border border-amber-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-amber-600 focus:ring-1 focus:ring-amber-600 shadow-2xs"
            ></textarea>
          </div>
        </div>
      </div>

      <!-- 1. Logo & Favicon Situs -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Logo &amp; Ikon Website (Favicon)</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Unggah identitas visual logo resmi untuk navigasi publik dan favicon peramban.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Logo Website -->
          <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
            <div class="flex items-center justify-between">
              <label class="text-xs font-bold text-zinc-900">Logo Website Utama</label>
              <span class="text-[11px] text-zinc-500">PNG / SVG Transparan (Maks. 2MB)</span>
            </div>

            <div class="h-28 rounded-lg border border-zinc-200 bg-white flex items-center justify-center p-3 overflow-hidden">
              <template x-if="umum.logo">
                <div class="flex items-center gap-2.5">
                  <img :src="assetUrl(umum.logo)" alt="Logo Website" class="h-8 max-h-8 w-auto object-contain" />
                  <span class="font-bold text-zinc-950 text-sm tracking-tight">banubagaskara.</span>
                </div>
              </template>
              <template x-if="!umum.logo">
                <div class="flex items-center gap-2.5 text-zinc-400 text-xs">
                  <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">BLB</div>
                  <span class="font-bold text-zinc-700">banubagaskara. (Default)</span>
                </div>
              </template>
            </div>

            <div class="flex items-center gap-2">
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Pilih &amp; Unggah Logo</span>
                <input
                  type="file"
                  accept="image/png,image/jpeg,image/svg+xml,image/webp"
                  @change="uploadFile($event, (path) => umum.logo = path)"
                  class="hidden"
                />
              </label>

              <button
                type="button"
                x-show="umum.logo"
                @click="umum.logo = null"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-red-50 hover:border-red-300 hover:text-red-700 text-zinc-700 text-xs font-semibold px-3 py-2 cursor-pointer transition-colors"
              >
                Reset Default
              </button>
            </div>
            <p class="text-[11px] text-zinc-500">Direkomendasikan rasio mendatar (horizontal) dengan latar belakang transparan.</p>
          </div>

          <!-- Favicon / Ikon Tab Browser -->
          <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
            <div class="flex items-center justify-between">
              <label class="text-xs font-bold text-zinc-900">Favicon (Ikon Tab Browser)</label>
              <span class="text-[11px] text-zinc-500">ICO / PNG / SVG (Maks. 2MB)</span>
            </div>

            <div class="h-28 rounded-lg border border-zinc-200 bg-white flex items-center justify-center p-3 overflow-hidden">
              <template x-if="umum.favicon">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 rounded-lg border border-zinc-200 p-1 flex items-center justify-center bg-zinc-50">
                    <img :src="assetUrl(umum.favicon)" alt="Favicon" class="w-8 h-8 object-contain" />
                  </div>
                  <span class="text-xs text-zinc-600 font-mono text-[11px] truncate max-w-[180px]" x-text="umum.favicon"></span>
                </div>
              </template>
              <template x-if="!umum.favicon">
                <div class="flex items-center gap-2 text-zinc-400 text-xs">
                  <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">B</div>
                  <span class="text-zinc-600 font-medium">Favicon Default</span>
                </div>
              </template>
            </div>

            <div class="flex items-center gap-2">
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Pilih &amp; Unggah Favicon</span>
                <input
                  type="file"
                  accept="image/x-icon,image/png,image/svg+xml,image/jpeg,image/webp"
                  @change="uploadFile($event, (path) => umum.favicon = path)"
                  class="hidden"
                />
              </label>

              <button
                type="button"
                x-show="umum.favicon"
                @click="umum.favicon = null"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-red-50 hover:border-red-300 hover:text-red-700 text-zinc-700 text-xs font-semibold px-3 py-2 cursor-pointer transition-colors"
              >
                Reset Default
              </button>
            </div>
            <p class="text-[11px] text-zinc-500">Ikon kecil yang muncul di sebelah kiri judul tab peramban dan bookmark (32x32 atau 64x64 px).</p>
          </div>
        </div>
      </div>

      <!-- 2. Identitas Tokoh & Lembaga -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Identitas Tokoh &amp; Lembaga</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Informasi dasar nama, fraksi, komisi kedewanan, dan slogan kampanye resmi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <!-- Site Title -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Website Resmi</label>
            <input
              type="text"
              x-model="umum.siteTitle"
              placeholder="Contoh: Website Resmi Anggota DPRD Kota Bogor"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Slogan & Vision Tagline -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Slogan Gerakan</label>
            <input
              type="text"
              x-model="umum.slogan"
              placeholder="Contoh: Peduli, Tanggap, dan Bekerja Bersama Warga"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tagline Visi</label>
            <input
              type="text"
              x-model="umum.visionSlogan"
              placeholder="Contoh: Tagline visi pengabdian untuk masyarakat"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Jabatan Kedewanan, Partai, & Daerah Pemilihan (Dapil) -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Jabatan / Amanah Kedewanan</label>
            <input
              type="text"
              x-model="umum.officeRole"
              placeholder="Anggota Komisi I DPRD Kota Bogor (2024–2029)"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Fraksi Partai</label>
            <input
              type="text"
              x-model="umum.party"
              placeholder="Fraksi PDI Perjuangan"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Daerah Pemilihan (Dapil)</label>
            <input
              type="text"
              x-model="umum.dapil"
              placeholder="Kota Bogor 4 • Tanah Sareal"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
        </div>
      </div>

      <!-- 3. Kontak Rumah Aspirasi & Media Sosial -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Saluran Kontak &amp; Media Sosial</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Alamat sekretariat Rumah Aspirasi Rakyat, nomor hotline WhatsApp, email, dan akun medsos resmi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <!-- Alamat Sekretariat -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Alamat Rumah Aspirasi Rakyat (Tanah Sareal)</label>
            <textarea
              rows="2"
              x-model="umum.address"
              placeholder="Jl. Perdana Raya No. 12, Kedung Badak, Kec. Tanah Sareal, Kota Bogor, Jawa Barat 16164"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            ></textarea>
          </div>

          <!-- Telepon & Email -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nomor Telepon / Hotline WhatsApp Warga</label>
            <input
              type="text"
              x-model="umum.phone"
              placeholder="+62 812-3456-7890"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Email Resmi Aduan</label>
            <input
              type="email"
              x-model="umum.email"
              placeholder="kontak@banubagaskara.id"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>

          <!-- Media Sosial -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Instagram URL</label>
            <input
              type="url"
              x-model="umum.socials.instagram"
              placeholder="https://instagram.com/banubagaskara"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">TikTok URL</label>
            <input
              type="url"
              x-model="umum.socials.tiktok"
              placeholder="https://tiktok.com/@banubagaskara"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Facebook Page URL</label>
            <input
              type="url"
              x-model="umum.socials.facebook"
              placeholder="https://facebook.com/banubagaskara"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
        </div>
      </div>

      <!-- 4. Banner Footer Website -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Banner Footer Website</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Kelola banner gambar panorama pada bagian bawah footer seluruh halaman website.</p>
        </div>

        <div class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Alternatif (Alt Text) Banner</label>
              <input
                type="text"
                x-model="umum.footerBanner.alt"
                placeholder="Banner Aspirasi Warga Tanah Sareal bersama Banu Lesmana Bagaskara"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <!-- Banner Image Upload -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">File Banner Footer <span class="text-zinc-400 font-normal">(Maks. 2MB)</span></label>
              <div class="h-28 rounded-lg border border-zinc-200 overflow-hidden bg-zinc-100 mb-2 relative">
                <template x-if="umum.footerBanner && umum.footerBanner.image">
                  <img :src="assetUrl(umum.footerBanner.image)" alt="Footer Banner Preview" class="w-full h-full object-cover" />
                </template>
                <template x-if="!umum.footerBanner || !umum.footerBanner.image">
                  <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs font-medium">
                    <span>Placeholder Polos (Tanpa Gambar)</span>
                  </div>
                </template>
              </div>
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Unggah Foto Banner Footer</span>
                <input
                  type="file"
                  accept="image/png,image/jpeg,image/webp,image/jpg"
                  @change="uploadFile($event, (path) => umum.footerBanner.image = path)"
                  class="hidden"
                />
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- 5. Banner Halaman Kontak -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Banner Halaman Kontak</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Kelola banner gambar layanan darurat &amp; aspirasi pada bagian atas halaman kontak.</p>
        </div>

        <div class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Alternatif (Alt Text) Banner</label>
              <input
                type="text"
                x-model="umum.contactBanner.alt"
                placeholder="Contoh: Banner Layanan Darurat & Aspirasi Warga"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <!-- Banner Image Upload -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">File Banner Kontak <span class="text-zinc-400 font-normal">(Maks. 2MB)</span></label>
              <div class="h-28 rounded-lg border border-zinc-200 overflow-hidden bg-zinc-100 mb-2 relative">
                <template x-if="umum.contactBanner && umum.contactBanner.image">
                  <img :src="assetUrl(umum.contactBanner.image)" alt="Contact Banner Preview" class="w-full h-full object-cover" />
                </template>
                <template x-if="!umum.contactBanner || !umum.contactBanner.image">
                  <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs font-medium">
                    <span>Placeholder Polos (Tanpa Gambar)</span>
                  </div>
                </template>
              </div>
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Unggah Foto Banner Kontak</span>
                <input
                  type="file"
                  accept="image/png,image/jpeg,image/webp,image/jpg"
                  @change="uploadFile($event, (path) => umum.contactBanner.image = path)"
                  class="hidden"
                />
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 2: PENGATURAN HALAMAN BERANDA                        -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'beranda'" x-cloak class="space-y-6">
      <!-- 1. Hero Section Beranda -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section Beranda</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Teks tajuk pembuka, deskripsi pengantar, dan foto utama halaman beranda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Headline Utama (Judul Besar)</label>
            <input
              type="text"
              x-model="beranda.hero.headline"
              placeholder="Banu Lesmana Bagaskara, S.M."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Deskripsi Ringkas</label>
            <textarea
              rows="3"
              x-model="beranda.hero.description"
              placeholder="Anggota Komisi I DPRD Kota Bogor Fraksi PDI Perjuangan Dapil 4 Tanah Sareal. Bekerja nyata mengawal aspirasi warga, transparansi APBD, dan kesiapsiagaan layanan darurat."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <!-- Hero Image Upload (Tanpa Select) -->
          <div class="md:col-span-2 pt-2 border-t border-zinc-100">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Hero Image (Foto Profil Utama Beranda) <span class="text-zinc-400 font-normal">(Maks. 2MB)</span></label>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
              <div class="w-32 h-36 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden shrink-0">
                <template x-if="beranda.hero && beranda.hero.heroImage">
                  <img :src="assetUrl(beranda.hero.heroImage)" alt="Hero Preview" class="w-full h-full object-cover object-top" />
                </template>
                <template x-if="!beranda.hero || !beranda.hero.heroImage">
                  <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs text-center p-2">
                    <span>Placeholder Polos</span>
                  </div>
                </template>
              </div>
              <div class="flex-1 space-y-2">
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Hero Beranda</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => beranda.hero.heroImage = path)"
                    class="hidden"
                  />
                </label>
                <p class="text-[11px] text-zinc-500">Unggah file foto potret resolusi tinggi (format JPG, PNG, atau WebP, maks. 2MB).</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Banner Program Beranda (Ambulance Siaga 24 Jam) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Banner Program Prioritas</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Banner visual penekanan program ambulance siaga 24 jam &amp; hotline darurat warga.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Alternatif (Alt Text) Banner</label>
            <input
              type="text"
              x-model="beranda.banner.alt"
              placeholder="Contoh: Banner Program Prioritas Ambulance Siaga 24 Jam"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Banner Image Upload (Tanpa Select) -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">File Banner Visual (Panorama) <span class="text-zinc-400 font-normal">(Maks. 2MB)</span></label>
            <div class="aspect-[21/9] max-h-48 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden mb-3">
              <template x-if="beranda.banner && beranda.banner.image">
                <img :src="assetUrl(beranda.banner.image)" alt="Banner Preview" class="w-full h-full object-cover" />
              </template>
              <template x-if="!beranda.banner || !beranda.banner.image">
                <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs font-medium">
                  <span>Placeholder Polos (Tanpa Gambar)</span>
                </div>
              </template>
            </div>
            <div>
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Unggah Foto Banner</span>
                <input
                  type="file"
                  accept="image/*"
                  @change="uploadFile($event, (path) => beranda.banner.image = path)"
                  class="hidden"
                />
              </label>
            </div>
            <p class="text-[11px] text-zinc-500 mt-1.5">Unggah foto berdimensi panorama (lebar) untuk banner sorotan (maks. 2MB).</p>
          </div>
        </div>
      </div>

      <!-- 3. Kolase Foto Bento Grid Beranda (Tanpa Select) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Kolase Foto Bento Grid Beranda</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Empat kartu visual yang menampilkan dokumentasi kegiatan nyata di halaman utama.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <template x-for="(card, cIdx) in beranda.collage" :key="cIdx">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
              <div class="flex items-center justify-between text-xs font-bold text-zinc-700">
                <span x-text="'Slot ' + (cIdx + 1) + ' (' + card.tag + ')'"></span>
              </div>
              <div class="aspect-[16/10] rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                <template x-if="card.image">
                  <img :src="assetUrl(card.image)" :alt="card.label" class="w-full h-full object-cover" />
                </template>
                <template x-if="!card.image">
                  <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs font-medium">
                    <span>Placeholder Polos</span>
                  </div>
                </template>
              </div>
              <div>
                <label class="block text-[11px] font-bold text-zinc-700 mb-1">Judul / Caption:</label>
                <input
                  type="text"
                  x-model="card.label"
                  placeholder="Contoh: Dialog Reses di Kebon Pedes"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                />
              </div>
              <div>
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-[11px] font-semibold px-2.5 py-1.5 cursor-pointer shadow-2xs transition-colors gap-1.5 w-full">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Slot Ini</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => card.image = path)"
                    class="hidden"
                  />
                </label>
              </div>
            </div>
          </template>
        </div>
      </div>

      <!-- 4. 6 Program Fokus Pengabdian (Tersinkronisasi dengan Profil) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <div class="flex items-center gap-2">
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">6 Program Fokus Pengabdian</h2>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-red-100 text-[#BC0202]">Sinkron dengan Profil</span>
          </div>
          <p class="text-xs text-zinc-500 mt-0.5">Enam program pengabdian utama warga Tanah Sareal yang tampil di Beranda dan Halaman Profil (otomatis tersinkron).</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <template x-for="(prog, pIdx) in beranda.programs" :key="prog.no">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-2.5">
              <div class="flex items-center gap-2">
                <span class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0" x-text="prog.no"></span>
                <input
                  type="text"
                  x-model="prog.title"
                  placeholder="Nama Program Kerja"
                  class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
              <textarea
                rows="3"
                x-model="prog.desc"
                placeholder="Uraian manfaat dan target program pengabdian..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202] leading-relaxed"
              ></textarea>
            </div>
          </template>
        </div>
      </div>

      <!-- 5. Kelola Testimoni Warga (Suara & Aspirasi) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div class="flex items-center justify-between pb-1">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Testimoni Warga (Suara &amp; Aspirasi)</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Kelola kartu testimoni apresiasi masyarakat Tanah Sareal yang tampil pada Bagian 6 Halaman Beranda.</p>
          </div>
          <button
            type="button"
            @click="addTestimonial()"
            class="inline-flex items-center gap-1.5 text-xs font-bold text-white bg-[#BC0202] hover:bg-[#830000] px-3.5 py-2 rounded-lg shadow-xs transition-colors cursor-pointer"
          >
            + Tambah Testimoni
          </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <template x-for="(testi, tIdx) in (beranda.testimonials || [])" :key="tIdx">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3 relative group flex flex-col justify-between">
              <div class="space-y-2.5">
                <div class="flex items-center justify-between">
                  <span class="text-xs font-bold text-zinc-700" x-text="'Testimoni #' + (tIdx + 1)"></span>
                  <button
                    type="button"
                    @click="removeTestimonial(tIdx)"
                    class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                    title="Hapus Testimoni Ini"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Nama Warga / Tokoh:</label>
                  <input
                    type="text"
                    x-model="testi.name"
                    placeholder="Contoh: Ibu Suryati Ningsih"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 font-bold focus:outline-none focus:border-[#BC0202]"
                  />
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Keterangan / Kelurahan:</label>
                  <input
                    type="text"
                    x-model="testi.role"
                    placeholder="Contoh: Warga Kel. Kedung Badak, Tanah Sareal"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202]"
                  />
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Isi Kutipan Testimoni:</label>
                  <textarea
                    rows="4"
                    x-model="testi.quote"
                    placeholder="Tulis kutipan testimoni warga..."
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-700 focus:outline-none focus:border-[#BC0202] leading-relaxed"
                  ></textarea>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 3: PENGATURAN HALAMAN PROFIL (KENALI SAYA)           -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'profil'" x-cloak class="space-y-6">
      <!-- 1. Hero Profil & Foto Profil Utama (Tanpa Select) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section Profil</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Subjudul narasi pengantar dan foto hero profil resmi Banu Lesmana Bagaskara, S.M.</p>
        </div>

        <div class="space-y-5">
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Subjudul Pengantar Profil</label>
            <textarea
              rows="3"
              x-model="profil.hero.subtitle"
              placeholder="Rekam jejak integritas, kiprah kedewanan, dan dedikasi mengawal aspirasi warga Kecamatan Tanah Sareal Kota Bogor."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <!-- Hero Image Profil Upload (Tanpa Select) -->
          <div class="pt-4 border-t border-zinc-100">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Foto Hero Profil Resmi <span class="text-zinc-400 font-normal">(Maks. 2MB)</span></label>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
              <div class="w-32 h-36 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden shrink-0">
                <template x-if="profil.hero && profil.hero.heroImage">
                  <img :src="assetUrl(profil.hero.heroImage)" alt="Hero Profil Preview" class="w-full h-full object-cover object-top" />
                </template>
                <template x-if="!profil.hero || !profil.hero.heroImage">
                  <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs text-center p-2">
                    <span>Placeholder Polos</span>
                  </div>
                </template>
              </div>
              <div class="flex-1 space-y-2">
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Profil</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => profil.hero.heroImage = path)"
                    class="hidden"
                  />
                </label>
                <p class="text-[11px] text-zinc-500">Unggah foto potret resmi dewan beresolusi tinggi (format JPG, PNG, atau WebP, maks. 2MB).</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Kelola Kutipan Banu Lesmana Bagaskara, S.M. -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Kutipan Banu Lesmana Bagaskara, S.M.</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Kelola pernyataan kutipan integritas dan komitmen moral pengabdian dewan yang tampil pada Bagian 7 Halaman Profil.</p>
        </div>

        <div class="space-y-4">
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Kutipan Integritas</label>
            <textarea
              rows="3"
              x-model="profil.quote.text"
              placeholder="Tulis kalimat kutipan komitmen dewan..."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nama Tokoh</label>
              <input
                type="text"
                x-model="profil.quote.author"
                placeholder="Banu Lesmana Bagaskara, S.M."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Keterangan / Jabatan</label>
              <input
                type="text"
                x-model="profil.quote.role"
                placeholder="Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- 3. Visi & Misi Resmi -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Visi &amp; Misi Resmi</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Rumusan visi pembangunan Kota Bogor dan poin-poin misi pengabdian dari database.</p>
        </div>

        <div>
          <label class="block text-xs font-bold text-zinc-900 mb-1.5">Visi Pembangunan</label>
          <textarea
            rows="2"
            x-model="profil.vision"
            placeholder="Terwujudnya Kota Bogor yang Maju, Berkeadilan Sosial, Mandiri, dan Menyejahterakan Seluruh Warga."
            class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
          ></textarea>
        </div>

        <div>
          <label class="block text-xs font-bold text-zinc-900 mb-1.5">Daftar Poin Misi (Dari Database):</label>
          <div class="space-y-2.5">
            <template x-for="(m, mIdx) in profil.mission" :key="mIdx">
              <div class="flex items-start gap-2">
                <span class="w-6 h-6 rounded-md bg-zinc-100 text-zinc-700 flex items-center justify-center font-bold text-xs shrink-0 mt-2" x-text="mIdx + 1"></span>
                <textarea
                  rows="2"
                  x-model="profil.mission[mIdx]"
                  placeholder="Tuliskan butir misi pengabdian..."
                  class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                ></textarea>
                <button
                  type="button"
                  @click="removeMission(mIdx)"
                  class="p-2 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors shrink-0 mt-1 cursor-pointer"
                  title="Hapus Misi"
                >
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </template>
          </div>

          <!-- Input Tambah Misi Baru -->
          <div class="mt-3 flex items-center gap-2">
            <input
              type="text"
              x-model="profil.newMissionItem"
              placeholder="Tulis poin misi baru..."
              class="flex-1 rounded-lg border border-zinc-300 bg-white px-3.5 py-2 text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
            />
            <button
              type="button"
              @click="addMission()"
              class="px-4 py-2 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold shadow-2xs transition-colors shrink-0 cursor-pointer"
            >
              + Tambah Misi
            </button>
          </div>
        </div>
      </div>

      <!-- 4. Rekam Jejak (Pendidikan & Pengalaman - Dapat Ditambah & Dikurang) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Rekam Jejak Pengalaman &amp; Riwayat Pendidikan</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Daftar riwayat akademis dan rekam jejak organisasi kemasyarakatan &amp; kedewanan. Anda dapat menambah dan menghapus entri.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Riwayat Pendidikan (Dapat Ditambah & Dikurang) -->
          <div class="space-y-3">
            <div class="flex items-center justify-between pb-1">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Riwayat Pendidikan</span>
              <button
                type="button"
                @click="addEducation()"
                class="inline-flex items-center gap-1 text-xs font-bold text-[#BC0202] hover:text-[#830000] cursor-pointer"
              >
                + Tambah Pendidikan
              </button>
            </div>

            <template x-for="(edu, eIdx) in profil.historyTrack.education" :key="eIdx">
              <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2 relative group">
                <div class="flex items-center justify-between">
                  <input
                    type="text"
                    x-model="edu.period"
                    placeholder="2015 – 2019"
                    class="w-36 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700 focus:outline-none focus:border-[#BC0202]"
                  />
                  <button
                    type="button"
                    @click="removeEducation(eIdx)"
                    class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                    title="Hapus Pendidikan Ini"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                <input
                  type="text"
                  x-model="edu.title"
                  placeholder="Gelar / Jenjang Pendidikan"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
                <input
                  type="text"
                  x-model="edu.institution"
                  placeholder="Nama Lembaga / Universitas"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
            </template>
          </div>

          <!-- Pengalaman Organisasi & Kerja (Dapat Ditambah & Dikurang) -->
          <div class="space-y-3">
            <div class="flex items-center justify-between pb-1">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Pengalaman Organisasi &amp; Amanah</span>
              <button
                type="button"
                @click="addExperience()"
                class="inline-flex items-center gap-1 text-xs font-bold text-[#BC0202] hover:text-[#830000] cursor-pointer"
              >
                + Tambah Pengalaman
              </button>
            </div>

            <template x-for="(exp, expIdx) in profil.historyTrack.experience" :key="expIdx">
              <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2 relative group">
                <div class="flex items-center justify-between">
                  <input
                    type="text"
                    x-model="exp.period"
                    placeholder="2024 – Sekarang"
                    class="w-36 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700 focus:outline-none focus:border-[#BC0202]"
                  />
                  <button
                    type="button"
                    @click="removeExperience(expIdx)"
                    class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                    title="Hapus Pengalaman Ini"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                <input
                  type="text"
                  x-model="exp.title"
                  placeholder="Posisi / Amanah Jabatan"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
                <input
                  type="text"
                  x-model="exp.institution"
                  placeholder="Instansi / Organisasi / Perusahaan"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
            </template>
          </div>
        </div>
      </div>

      <!-- 5. Kolase Foto Bento Grid Profil (5 Slot - Tanpa Select) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Kolase Foto Dokumentasi Lapangan (Bento UI Profil)</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Lima slot kartu visual dokumentasi aksi nyata dan tinjauan lapangan di Halaman Profil.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <template x-for="(card, cIdx) in (profil.collage || [])" :key="cIdx">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
              <div class="flex items-center justify-between text-xs font-bold text-zinc-700">
                <span x-text="'Slot ' + (cIdx + 1) + (card.tag ? ' (' + card.tag + ')' : '')"></span>
              </div>
              <div class="aspect-[16/10] rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                <template x-if="card.image">
                  <img :src="assetUrl(card.image)" :alt="card.label" class="w-full h-full object-cover" />
                </template>
                <template x-if="!card.image">
                  <div class="w-full h-full bg-zinc-200 flex items-center justify-center text-zinc-500 text-xs font-medium">
                    <span>Placeholder Polos</span>
                  </div>
                </template>
              </div>
              <div>
                <label class="block text-[11px] font-bold text-zinc-700 mb-1">Judul / Caption:</label>
                <input
                  type="text"
                  x-model="card.label"
                  placeholder="Contoh: Sidang Paripurna & Pengawasan APBD"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                />
              </div>
              <div>
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-[11px] font-semibold px-2.5 py-1.5 cursor-pointer shadow-2xs transition-colors gap-1.5 w-full">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Slot Ini</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => card.image = path)"
                    class="hidden"
                  />
                </label>
              </div>
            </div>
          </template>
        </div>
      </div>

      <!-- 6. 12 Isu Penting Strategis -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">12 Isu Penting Strategis</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Daftar 12 agenda prioritas advokasi warga Kota Bogor (berdasarkan data Goodkind KPU).</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <template x-for="(issue, iIdx) in profil.issues" :key="issue.no">
            <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
              <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-md bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0" x-text="issue.no"></span>
                <input
                  type="text"
                  x-model="issue.title"
                  placeholder="Nama Isu Strategis"
                  class="flex-1 rounded border border-zinc-300 bg-white px-2.5 py-1 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
              <textarea
                rows="2"
                x-model="issue.desc"
                placeholder="Penjelasan ringkas fokus kebijakan atau advokasi isu..."
                class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202] leading-relaxed"
              ></textarea>
            </div>
          </template>
        </div>
      </div>

      <!-- 7. 6 Program Fokus -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <div class="flex items-center gap-2">
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">6 Program Fokus Pengabdian</h2>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-red-100 text-[#BC0202]">Sinkron dengan Beranda</span>
          </div>
          <p class="text-xs text-zinc-500 mt-0.5">Enam program andalan yang dijalankan secara konsisten untuk masyarakat Tanah Sareal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <template x-for="(prog, pIdx) in profil.programs" :key="prog.no">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-2.5">
              <div class="flex items-center gap-2">
                <span class="w-7 h-7 rounded-lg bg-zinc-900 text-white flex items-center justify-center font-bold text-xs shrink-0" x-text="prog.no"></span>
                <input
                  type="text"
                  x-model="prog.title"
                  placeholder="Nama Program Fokus"
                  class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
              <textarea
                rows="3"
                x-model="prog.desc"
                placeholder="Uraian manfaat dan target program pengabdian..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202] leading-relaxed"
              ></textarea>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 4: PENGATURAN SEO & METADATA MESIN PENCARI           -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'seo'" x-cloak class="space-y-6">
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Optimasi Mesin Pencari (Search Engine Optimization)</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Atur judul meta, deskripsi pencarian Google, kata kunci target, dan gambar pratinjau media sosial (OpenGraph).</p>
        </div>

        <div class="space-y-5">
          <!-- Meta Title -->
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block text-xs font-bold text-zinc-900">Meta Title Default</label>
              <span class="text-[11px] text-zinc-500" x-text="seo.metaTitle.length + '/60 karakter disarankan'"></span>
            </div>
            <input
              type="text"
              x-model="seo.metaTitle"
              placeholder="Contoh: Website Resmi Banu Lesmana Bagaskara, S.M."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Meta Description -->
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block text-xs font-bold text-zinc-900">Meta Description</label>
              <span class="text-[11px] text-zinc-500" x-text="seo.metaDescription.length + '/160 karakter disarankan'"></span>
            </div>
            <textarea
              rows="3"
              x-model="seo.metaDescription"
              placeholder="Website resmi Banu Lesmana Bagaskara, S.M., Anggota DPRD Kota Bogor Fraksi PDI Perjuangan Dapil 4 Tanah Sareal. Pelayanan aspirasi, rekam jejak, hasil kinerja, dan berita."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <!-- Keywords -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Target Kata Kunci (Dipisahkan Tanda Koma)</label>
            <input
              type="text"
              x-model="seo.keywords"
              placeholder="Banu Bagaskara, DPRD Kota Bogor, PDI Perjuangan, Tanah Sareal, Aspirasi Warga, Ambulance Siaga"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Canonical URL & Search Console Code -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Canonical URL Domain</label>
              <input
                type="url"
                x-model="seo.canonicalUrl"
                placeholder="https://banubagaskara.id"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Google Search Console Verification Tag</label>
              <input
                type="text"
                x-model="seo.googleSearchConsoleTag"
                placeholder="google-site-verification=xxxxxxxxxxxxxxxxxxxxxxxxx"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
          </div>

          <!-- Google Search Result Simulation Preview -->
          <div class="pt-4 border-t border-zinc-100">
            <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block mb-2.5">Pratinjau Hasil Pencarian Google (SERP Preview)</span>
            <div class="p-4 rounded-xl border border-zinc-200 bg-white shadow-2xs max-w-2xl font-sans">
              <div class="flex items-center gap-2 text-xs text-zinc-600 mb-1">
                <span class="w-4 h-4 rounded-full bg-[#BC0202] text-white flex items-center justify-center font-bold text-[9px]">B</span>
                <span class="truncate" x-text="seo.canonicalUrl || 'https://banubagaskara.id'">https://banubagaskara.id</span>
                <span>&rsaquo; profil</span>
              </div>
              <div class="text-base sm:text-lg font-semibold text-[#1a0dab] hover:underline cursor-pointer truncate" x-text="seo.metaTitle || 'Judul Halaman Belum Diatur'"></div>
              <div class="text-xs text-zinc-600 mt-1 line-clamp-2 leading-relaxed" x-text="seo.metaDescription || 'Deskripsi meta belum diatur.'"></div>
            </div>
          </div>

          <!-- Indexing Toggle -->
          <div class="pt-4 border-t border-zinc-100 flex items-center justify-between">
            <div>
              <span class="text-xs font-bold text-zinc-900 block">Izinkan Mesin Pencari Mengindeks Website (Index / Noindex)</span>
              <span class="text-[11px] text-zinc-500 block mt-0.5">Aktifkan agar Googlebot dapat merayapi seluruh halaman publik.</span>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" x-model="seo.enableIndexing" class="sr-only peer" />
              <div class="w-11 h-6 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#BC0202]"></div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Floating Save Button Dock (Always visible when scrolling) -->
  <div class="fixed bottom-6 right-6 z-40">
    <button
      type="button"
      @click="saveSettings()"
      :disabled="saving"
      class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-3 shadow-2xl transition-all duration-200 gap-2 cursor-pointer disabled:opacity-50 border border-red-800/40 hover:scale-[1.02] active:scale-[0.98]"
      title="Simpan Perubahan Pengaturan"
    >
      <svg x-show="!saving" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
      <svg x-show="saving" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
      </svg>
      <span x-text="saving ? 'Menyimpan...' : 'Simpan Perubahan'"></span>
    </button>
  </div>

  <!-- Minimalist Admin Footer (#000000) -->
  <footer class="w-full bg-[#000000] text-white py-8 border-t border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-[11px]">BLB</div>
        <span class="text-xs font-semibold text-zinc-300">Modul Pengaturan Halaman Website &bull; Banu Lesmana Bagaskara, S.M.</span>
      </div>
      <div class="text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
    </div>
  </footer>
</div>
@endsection

@push('scripts')
<script>
  function adminPengaturan() {
    return {
      activeTab: 'umum',
      saveToast: false,
      toastMessage: 'Pengaturan berhasil disimpan!',
      saving: false,
      isUploading: false,
      uploadProgressText: '',

      umum: @json($initialUmum),
      beranda: @json($initialBeranda),
      profil: @json($initialProfil),
      seo: @json($initialSeo),

      assetUrl(path) {
        if (!path) return '';
        if (path.startsWith('http://') || path.startsWith('https://')) return path;
        const clean = path.replace(/^\/+/, '');
        return '{{ url('/') }}/' + clean;
      },

      uploadFile(event, callback) {
        const file = event.target.files && event.target.files[0];
        if (!file) return;

        const isImage = file.type.startsWith('image/') || /\.(jpe?g|png|webp|svg|ico)$/i.test(file.name);
        const maxSize = isImage ? 2 * 1024 * 1024 : 10 * 1024 * 1024;
        if (file.size > maxSize) {
          alert(isImage ? 'Ukuran file gambar maksimal 2 MB.' : 'Ukuran berkas dokumen maksimal 10 MB.');
          event.target.value = '';
          return;
        }

        const formData = new FormData();
        formData.append('file', file);

        this.isUploading = true;
        this.uploadProgressText = 'Mengunggah ' + file.name + '...';

        fetch('{{ route("admin.upload") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          this.isUploading = false;
          if (data && data.success) {
            callback(data.path);
            this.toastMessage = 'File berhasil diunggah!';
            this.saveToast = true;
            setTimeout(() => { this.saveToast = false; }, 3000);
          } else {
            alert((data && data.message) ? data.message : 'Gagal mengunggah file.');
          }
        })
        .catch(err => {
          this.isUploading = false;
          alert('Terjadi kesalahan koneksi saat mengunggah file.');
        })
        .finally(() => {
          event.target.value = '';
        });
      },

      addMission() {
        if (this.profil.newMissionItem && this.profil.newMissionItem.trim() !== '') {
          this.profil.mission.push(this.profil.newMissionItem.trim());
          this.profil.newMissionItem = '';
        }
      },

      removeMission(index) {
        this.profil.mission.splice(index, 1);
      },

      addEducation() {
        if (!this.profil.historyTrack) {
          this.profil.historyTrack = { education: [], experience: [] };
        }
        if (!Array.isArray(this.profil.historyTrack.education)) {
          this.profil.historyTrack.education = [];
        }
        this.profil.historyTrack.education.push({
          period: '2024 – Sekarang',
          title: 'Gelar / Jenjang Pendidikan Baru',
          institution: 'Nama Sekolah / Perguruan Tinggi'
        });
      },

      removeEducation(index) {
        if (confirm('Apakah Anda yakin ingin menghapus riwayat pendidikan ini?')) {
          this.profil.historyTrack.education.splice(index, 1);
        }
      },

      addExperience() {
        if (!this.profil.historyTrack) {
          this.profil.historyTrack = { education: [], experience: [] };
        }
        if (!Array.isArray(this.profil.historyTrack.experience)) {
          this.profil.historyTrack.experience = [];
        }
        this.profil.historyTrack.experience.push({
          period: '2024 – Sekarang',
          title: 'Posisi / Amanah Jabatan Baru',
          institution: 'Instansi / Organisasi / Komunitas'
        });
      },

      removeExperience(index) {
        if (confirm('Apakah Anda yakin ingin menghapus rekam jejak pengalaman ini?')) {
          this.profil.historyTrack.experience.splice(index, 1);
        }
      },

      addTestimonial() {
        if (!Array.isArray(this.beranda.testimonials)) {
          this.beranda.testimonials = [];
        }
        this.beranda.testimonials.push({
          name: 'Nama Warga Baru',
          role: 'Warga Kelurahan / Komunitas',
          quote: 'Tuliskan pengalaman atau manfaat nyata yang dirasakan oleh warga di sini...'
        });
      },

      removeTestimonial(index) {
        if (confirm('Apakah Anda yakin ingin menghapus testimoni ini?')) {
          this.beranda.testimonials.splice(index, 1);
        }
      },

      saveSettings() {
        if (this.saving) return;
        this.saving = true;

        // Sinkronkan 6 program antara Beranda dan Profil secara client-side
        if (this.activeTab === 'beranda' && Array.isArray(this.beranda.programs)) {
          this.profil.programs = JSON.parse(JSON.stringify(this.beranda.programs));
        } else if (this.activeTab === 'profil' && Array.isArray(this.profil.programs)) {
          this.beranda.programs = JSON.parse(JSON.stringify(this.profil.programs));
        }

        const groupMap = {
          'umum': 'general',
          'beranda': 'home',
          'profil': 'profile',
          'seo': 'seo'
        };
        const currentGroup = groupMap[this.activeTab] || this.activeTab;
        const currentData = this[this.activeTab];

        fetch('{{ route("admin.pengaturan.update") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            group: currentGroup,
            data: currentData
          })
        }).then(r => r.json()).then(data => {
          this.saving = false;
          if (data && data.success) {
            this.toastMessage = data.message || 'Pengaturan berhasil disimpan!';
            this.saveToast = true;
            setTimeout(() => { this.saveToast = false; }, 3500);
          } else {
            alert((data && data.message) ? data.message : 'Gagal menyimpan pengaturan.');
          }
        }).catch(() => {
          this.saving = false;
          alert('Terjadi kesalahan jaringan.');
        });
      }
    };
  }
</script>
@endpush
