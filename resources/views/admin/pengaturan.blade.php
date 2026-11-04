@extends('layouts.admin')

@section('title', 'Pengaturan Halaman Website')

@section('content')
  <div
    x-data="adminPengaturan({
      general: {{ json_encode($general) }},
      home: {{ json_encode($home) }},
      profile: {{ json_encode($profile) }},
      seo: {{ json_encode($seo) }}
    })"
    class="flex-1 flex flex-col"
  >
    <!-- Save Toast Notification -->
    <div
      x-show="saveToast"
      x-transition
      x-cloak
      class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border border-emerald-200 bg-emerald-50 text-emerald-950 text-xs sm:text-sm font-semibold"
    >
      <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
      <span x-text="toastMessage"></span>
    </div>

    <!-- Page Header & Action Bar -->
    <header class="bg-white border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-7">
      <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-5">
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold text-zinc-500 mb-1.5">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-900 transition-colors">Dasbor Admin</a>
            <span>&rsaquo;</span>
            <span class="text-[#BC0202]">Pengaturan Website</span>
          </div>
          <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">
            Pengaturan Konten &amp; <span class="text-[#BC0202]">Halaman Website</span>
          </h1>
          <p class="text-xs sm:text-sm text-zinc-600 mt-1 max-w-2xl leading-relaxed">
            Kelola data statis, narasi hero section, foto kolase bento, visi misi, 12 isu strategis, 6 program kerja, dan konfigurasi optimasi mesin pencari (SEO).
          </p>
        </div>

        <!-- Sticky/Action Save Button -->
        <div class="flex items-center gap-3 shrink-0">
          <button
            type="button"
            @click="saveSettings()"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-2 active:scale-98"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Simpan Perubahan</span>
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
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Identitas Tokoh &amp; Lembaga</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Informasi dasar nama, fraksi, komisi kedewanan, dan slogan kampanye resmi.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Website Resmi</label>
              <input
                type="text"
                x-model="umum.siteTitle"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Slogan Gerakan</label>
              <input
                type="text"
                x-model="umum.slogan"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tagline Visi</label>
              <input
                type="text"
                x-model="umum.visionSlogan"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Jabatan / Amanah Kedewanan</label>
              <input
                type="text"
                x-model="umum.officeRole"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Fraksi Partai</label>
              <input
                type="text"
                x-model="umum.party"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
          </div>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Saluran Kontak &amp; Media Sosial</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Alamat sekretariat Rumah Aspirasi Rakyat, nomor hotline WhatsApp, email, dan akun medsos resmi.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Alamat Rumah Aspirasi Rakyat (Tanah Sareal)</label>
              <textarea
                rows="2"
                x-model="umum.address"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              ></textarea>
            </div>

            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nomor Telepon / Hotline WhatsApp Warga</label>
              <input
                type="text"
                x-model="umum.phone"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Email Resmi Aduan</label>
              <input
                type="email"
                x-model="umum.email"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>

            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Instagram URL</label>
              <input
                type="url"
                x-model="umum.socials.instagram"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">TikTok URL</label>
              <input
                type="url"
                x-model="umum.socials.tiktok"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Facebook Page URL</label>
              <input
                type="url"
                x-model="umum.socials.facebook"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- ======================================================== -->
      <!-- TAB 2: PENGATURAN HALAMAN BERANDA                        -->
      <!-- ======================================================== -->
      <div x-show="activeTab === 'beranda'" x-cloak class="space-y-6">
        <!-- Hero Section Beranda -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section Beranda</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Teks tajuk pembuka, deskripsi pengantar, tombol CTA, dan foto utama.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Badge / Label Atas</label>
              <input
                type="text"
                x-model="beranda.hero.badge"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Headline Utama (Judul Besar)</label>
              <input
                type="text"
                x-model="beranda.hero.headline"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Deskripsi Ringkas</label>
              <textarea
                rows="3"
                x-model="beranda.hero.description"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
              ></textarea>
            </div>

            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Tombol Utama (CTA 1)</label>
              <input
                type="text"
                x-model="beranda.hero.ctaPrimaryText"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tautan Tombol Utama (Link)</label>
              <input
                type="text"
                x-model="beranda.hero.ctaPrimaryLink"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>

            <!-- Hero Image Selection -->
            <div class="md:col-span-2 pt-2 border-t border-zinc-100">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Hero Image (Foto Profil Utama Beranda)</label>
              <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="w-32 h-36 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden shrink-0">
                  <img :src="beranda.hero.heroImage.startsWith('http') ? beranda.hero.heroImage : '{{ asset('') }}' + beranda.hero.heroImage.replace(/^\//, '')" alt="Hero Preview" class="w-full h-full object-cover" />
                </div>
                <div class="flex-1 space-y-2">
                  <select
                    x-model="beranda.hero.heroImage"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  >
                    <template x-for="asset in availableAssets" :key="asset.path">
                      <option :value="asset.path" x-text="asset.label"></option>
                    </template>
                  </select>
                  <p class="text-[11px] text-zinc-500">Pilih dari katalog foto beresolusi tinggi di folder aset lokal.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banner Program Beranda -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div class="flex items-center justify-between">
            <div>
              <h2 class="text-base sm:text-lg font-bold text-zinc-950">Banner Program Prioritas</h2>
              <p class="text-xs text-zinc-500 mt-0.5">Banner visual penekanan program ambulance siaga 24 jam &amp; hotline darurat warga.</p>
            </div>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" x-model="beranda.banner.enabled" class="rounded text-[#BC0202] focus:ring-[#BC0202]" />
              <span class="text-xs font-bold text-zinc-700" x-text="beranda.banner.enabled ? 'Aktif' : 'Nonaktif'"></span>
            </label>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5" x-show="beranda.banner.enabled">
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Banner</label>
              <input
                type="text"
                x-model="beranda.banner.title"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Sub-teks Keterangan</label>
              <input
                type="text"
                x-model="beranda.banner.subtitle"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <!-- Banner Image Selection -->
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">File Banner Visual (Panorama)</label>
              <div class="aspect-[21/9] max-h-48 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden mb-3">
                <img :src="beranda.banner.image.startsWith('http') ? beranda.banner.image : '{{ asset('') }}' + beranda.banner.image.replace(/^\//, '')" alt="Banner Preview" class="w-full h-full object-cover" />
              </div>
              <select
                x-model="beranda.banner.image"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              >
                <template x-for="asset in availableAssets" :key="asset.path">
                  <option :value="asset.path" x-text="asset.label"></option>
                </template>
              </select>
            </div>
          </div>
        </div>

        <!-- Kolase Foto Bento Grid Beranda -->
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
                  <img :src="card.image.startsWith('http') ? card.image : '{{ asset('') }}' + card.image.replace(/^\//, '')" :alt="card.label" class="w-full h-full object-cover" />
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Judul / Caption:</label>
                  <input
                    type="text"
                    x-model="card.label"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                  />
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Pilih Gambar:</label>
                  <select
                    x-model="card.image"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                  >
                    <template x-for="asset in availableAssets" :key="asset.path">
                      <option :value="asset.path" x-text="asset.label"></option>
                    </template>
                  </select>
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
        <!-- Hero & Kutipan Profil -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section &amp; Kutipan Integritas Profil</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Teks pembuka halaman kenali saya dan pernyataan kutipan komitmen dewan.</p>
          </div>

          <div class="space-y-4">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Header Profil</label>
              <input
                type="text"
                x-model="profil.hero.title"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Subjudul Pengantar</label>
              <input
                type="text"
                x-model="profil.hero.subtitle"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Kutipan Integritas (Quote Utama)</label>
              <textarea
                rows="2"
                x-model="profil.quote"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
              ></textarea>
            </div>
          </div>
        </div>

        <!-- Visi & Misi Resmi -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Visi &amp; Misi Resmi</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Rumusan visi pembangunan Kota Bogor dan poin-poin misi pengabdian.</p>
          </div>

          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Visi Pembangunan</label>
            <textarea
              rows="2"
              x-model="profil.vision"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            ></textarea>
          </div>

          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Daftar Poin Misi:</label>
            <div class="space-y-2.5">
              <template x-for="(m, mIdx) in profil.mission" :key="mIdx">
                <div class="flex items-start gap-2">
                  <span class="w-6 h-6 rounded-md bg-zinc-100 text-zinc-700 flex items-center justify-center font-bold text-xs shrink-0 mt-2" x-text="mIdx + 1"></span>
                  <textarea
                    rows="2"
                    x-model="profil.mission[mIdx]"
                    class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                  ></textarea>
                  <button
                    type="button"
                    @click="removeMission(mIdx)"
                    class="p-2 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors shrink-0 mt-1"
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
                x-model="newMissionItem"
                placeholder="Tulis poin misi baru..."
                class="flex-1 rounded-lg border border-zinc-300 bg-white px-3.5 py-2 text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
              />
              <button
                type="button"
                @click="addMission()"
                class="px-4 py-2 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold shadow-2xs transition-colors shrink-0"
              >
                + Tambah Misi
              </button>
            </div>
          </div>
        </div>

        <!-- Rekam Jejak (Pendidikan & Pengalaman) -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Rekam Jejak Pengalaman &amp; Riwayat Pendidikan</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Daftar riwayat akademis dan rekam jejak organisasi kemasyarakatan &amp; kedewanan.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Riwayat Pendidikan -->
            <div class="space-y-3">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block">Riwayat Pendidikan</span>
              <template x-for="(edu, eIdx) in profil.historyTrack.education" :key="eIdx">
                <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
                  <input
                    type="text"
                    x-model="edu.period"
                    class="w-32 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700"
                  />
                  <input
                    type="text"
                    x-model="edu.title"
                    class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950"
                  />
                  <input
                    type="text"
                    x-model="edu.institution"
                    class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600"
                  />
                </div>
              </template>
            </div>

            <!-- Pengalaman Organisasi & Kerja -->
            <div class="space-y-3">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block">Pengalaman Organisasi &amp; Amanah</span>
              <template x-for="(exp, expIdx) in profil.historyTrack.experience" :key="expIdx">
                <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
                  <input
                    type="text"
                    x-model="exp.period"
                    class="w-36 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700"
                  />
                  <input
                    type="text"
                    x-model="exp.title"
                    class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950"
                  />
                  <input
                    type="text"
                    x-model="exp.institution"
                    class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600"
                  />
                </div>
              </template>
            </div>
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
            <p class="text-xs text-zinc-500 mt-0.5">Atur judul meta, deskripsi pencarian Google, kata kunci target, dan konfigurasi robots/indexing.</p>
          </div>

          <div class="space-y-5">
            <div>
              <div class="flex items-center justify-between mb-1.5">
                <label class="block text-xs font-bold text-zinc-900">Meta Title Default</label>
                <span class="text-[11px] text-zinc-500" x-text="(seo.metaTitle || '').length + '/60 karakter disarankan'"></span>
              </div>
              <input
                type="text"
                x-model="seo.metaTitle"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div>
              <div class="flex items-center justify-between mb-1.5">
                <label class="block text-xs font-bold text-zinc-900">Meta Description</label>
                <span class="text-[11px] text-zinc-500" x-text="(seo.metaDescription || '').length + '/160 karakter disarankan'"></span>
              </div>
              <textarea
                rows="3"
                x-model="seo.metaDescription"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
              ></textarea>
            </div>

            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Target Kata Kunci (Dipisahkan Tanda Koma)</label>
              <input
                type="text"
                x-model="seo.keywords"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Canonical URL Domain</label>
                <input
                  type="url"
                  x-model="seo.canonicalUrl"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
                />
              </div>
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Google Search Console Verification Tag</label>
                <input
                  type="text"
                  x-model="seo.googleSearchConsoleTag"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
                />
              </div>
            </div>

            <div class="pt-4 border-t border-zinc-100 flex items-center justify-between">
              <div>
                <span class="text-xs font-bold text-zinc-900 block">Izinkan Mesin Pencari Mengindeks Website (Index / Noindex)</span>
                <span class="text-[11px] text-zinc-500 block mt-0.5">Aktifkan agar Googlebot dapat merayapi seluruh halaman publik.</span>
              </div>
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" x-model="seo.enableIndexing" class="rounded text-[#BC0202] focus:ring-[#BC0202]" />
                <span class="text-xs font-bold text-zinc-700" x-text="seo.enableIndexing ? 'Index Aktif' : 'Noindex'"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function adminPengaturan(initialData) {
      return {
        activeTab: 'umum',
        saveToast: false,
        toastMessage: 'Pengaturan berhasil disimpan!',
        csrfToken: '{{ csrf_token() }}',
        newMissionItem: '',

        umum: initialData.general || {},
        beranda: initialData.home || {},
        profil: initialData.profile || {},
        seo: initialData.seo || {},

        availableAssets: [
          { label: 'Foto Resmi Profil Banu (Portrait)', path: 'assets/banu/hero_banu.jpg' },
          { label: 'Banner Serbaguna Ambulance 24 Jam', path: 'assets/banu/banner_serbaguna.jpg' },
          { label: 'Dokumentasi Dialog Reses Warga', path: 'assets/banu/testi_dialog.jpg' },
          { label: 'Armada Ambulance Siaga & Relawan', path: 'assets/banu/program_ambulance.jpg' },
          { label: 'Pendampingan Usaha Mikro UMKM', path: 'assets/banu/program_umkm.jpg' },
          { label: 'Gotong Royong Guyub Komunitas', path: 'assets/banu/footer_community.jpg' }
        ],

        addMission() {
          if (this.newMissionItem.trim() !== '') {
            if (!this.profil.mission) this.profil.mission = [];
            this.profil.mission.push(this.newMissionItem.trim());
            this.newMissionItem = '';
          }
        },

        removeMission(index) {
          if (this.profil.mission && this.profil.mission.length > 1) {
            this.profil.mission.splice(index, 1);
          } else {
            alert('Minimal harus ada 1 poin misi pengabdian.');
          }
        },

        async saveSettings() {
          const group = this.activeTab === 'umum' ? 'general' : this.activeTab;
          const data = this[this.activeTab];

          try {
            const res = await fetch('{{ route("admin.pengaturan.update") }}', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken
              },
              body: JSON.stringify({ group: group, data: data })
            });

            const result = await res.json();
            if (result.success) {
              this.toastMessage = result.message;
              this.saveToast = true;
              setTimeout(() => { this.saveToast = false; }, 3500);
            } else {
              alert('Gagal menyimpan pengaturan.');
            }
          } catch (e) {
            console.error(e);
            alert('Terjadi kesalahan koneksi.');
          }
        }
      };
    }
  </script>
@endsection
