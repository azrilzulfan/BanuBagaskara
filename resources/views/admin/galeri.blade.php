@extends('layouts.admin')

@section('title', 'Kelola Galeri & Album Foto | Dasbor Admin Banu Lesmana Bagaskara, S.M.')

@php
  $defaultAlbums = [
    [
      'id' => 1,
      'title' => 'Dialog Reses Masa Sidang II di Kebon Pedes',
      'date' => '2026-02-28',
      'dateFormatted' => '28 Februari 2026',
      'desc' => 'Penyerapan usulan drainase lingkungan, PJU, dan penataan saluran air bersama warga serta pengurus RW 05 Kelurahan Kebon Pedes.',
      'cover' => asset('assets/banu/testi_dialog.jpg'),
      'status' => 'Terbit',
      'photos' => [
        ['id' => 'p1', 'url' => asset('assets/banu/testi_dialog.jpg'), 'caption' => 'Tatap muka dialog bersama ketua RT, RW, dan tokoh warga Kebon Pedes.'],
        ['id' => 'p2', 'url' => asset('assets/banu/hero_banu.jpg'), 'caption' => 'Penyampaian komitmen pengawalan Pokir APBD oleh Banu Lesmana Bagaskara.'],
        ['id' => 'p3', 'url' => asset('assets/banu/footer_community.jpg'), 'caption' => 'Sesi ramah tamah dan foto bersama seluruh perwakilan warga lingkungan.'],
        ['id' => 'p4', 'url' => asset('assets/banu/banner_serbaguna.jpg'), 'caption' => 'Spanduk komitmen pengawalan aspirasi pembangunan lingkungan.'],
      ],
    ],
    [
      'id' => 2,
      'title' => 'Armada Ambulance Siaga 24 Jam & Layanan Pasien',
      'date' => '2026-02-24',
      'dateFormatted' => '24 Februari 2026',
      'desc' => 'Pendampingan tanggap darurat medis dan rujukan warga sakit se-Kecamatan Tanah Sareal menuju RSUD Kota Bogor secara gratis.',
      'cover' => asset('assets/banu/program_ambulance.jpg'),
      'status' => 'Terbit',
      'photos' => [
        ['id' => 'p21', 'url' => asset('assets/banu/program_ambulance.jpg'), 'caption' => 'Unit operasional Ambulance Siaga 24 Jam bersiaga di Kedung Badak.'],
        ['id' => 'p22', 'url' => asset('assets/banu/footer_community.jpg'), 'caption' => 'Briefing relawan pendamping kesehatan sebelum evakuasi darurat.'],
        ['id' => 'p23', 'url' => asset('assets/banu/testi_dialog.jpg'), 'caption' => 'Koordinasi bersama perwakilan keluarga pasien di RSUD Kota Bogor.'],
        ['id' => 'p24', 'url' => asset('assets/banu/banner_serbaguna.jpg'), 'caption' => 'Layanan siaga ambulance bebas biaya untuk warga Tanah Sareal.'],
      ],
    ],
    [
      'id' => 3,
      'title' => 'Fasilitasi NIB Gratis & Pelatihan Foto Produk UMKM',
      'date' => '2026-02-19',
      'dateFormatted' => '19 Februari 2026',
      'desc' => 'Pemberdayaan legalitas usaha dan peningkatan mutu visual promosi digital bagi puluhan pelaku UMKM makanan ringan Tanah Sareal.',
      'cover' => asset('assets/banu/program_umkm.jpg'),
      'status' => 'Terbit',
      'photos' => [
        ['id' => 'p31', 'url' => asset('assets/banu/program_umkm.jpg'), 'caption' => 'Penyerahan simbolis dokumen NIB resmi kepada pelaku usaha keripik olahan.'],
        ['id' => 'p32', 'url' => asset('assets/banu/hero_banu.jpg'), 'caption' => 'Banu Bagaskara berdialog mengenai kendala permodalan pedagang keliling.'],
        ['id' => 'p33', 'url' => asset('assets/banu/banner_serbaguna.jpg'), 'caption' => 'Suasana pendampingan meja per meja pembuatan akun OSS.'],
      ],
    ],
  ];

  $initialAlbums = $albums->isNotEmpty() ? $albums->toArray() : $defaultAlbums;
@endphp

@section('content')
<div
  x-data="adminGaleri()"
  @keydown.escape.window="if (lightboxModal) closeLightbox();"
  class="w-full flex-1 flex flex-col"
>
  <!-- Hidden server rendered list for tests & SEO -->
  <div class="sr-only" aria-hidden="true">
    @foreach ($albums as $a)
      <div>
        <span>{{ $a['title'] }}</span>
        <span>{{ $a['desc'] }}</span>
      </div>
    @endforeach
  </div>

  <!-- Notification Toast -->
  <div
    x-show="saveSuccessNotification"
    x-transition
    x-cloak
    class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
  >
    <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
    <div>
      <span class="font-bold block">Album Galeri Berhasil Disimpan!</span>
      <span class="text-emerald-800">Dokumentasi foto telah diperbarui dan siap ditampilkan.</span>
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

  <!-- ========================================== -->
  <!-- 1. EDITORIAL HEADER SECTION (#faf5f5)      -->
  <!-- ========================================== -->
  <header class="w-full bg-[#faf5f5] border-b border-zinc-200 py-8 sm:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
      <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div class="max-w-2xl">
          <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-2.5">
            <span>Modul Kelola Galeri &bull; Dokumentasi Visual</span>
          </div>
          <h1 class="text-2xl sm:text-4xl lg:text-[38px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
            Kelola <span class="text-[#BC0202]">Album Galeri</span>
          </h1>
          <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 leading-relaxed">
            Kelola album kegiatan pengabdian masyarakat beserta rangkaian foto-foto di dalamnya, lengkap dengan keterangan gambar, tanggal kegiatan, dan pratinjau teater foto interaktif.
          </p>
        </div>

        <!-- Action Button in Header -->
        <div class="shrink-0 flex items-center gap-3">
          <template x-if="currentView === 'list'">
            <button
              type="button"
              @click="openCreate()"
              class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors active:scale-98 gap-2 cursor-pointer"
            >
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <span>Tambah Album Baru</span>
            </button>
          </template>

          <template x-if="currentView === 'editor'">
            <button
              type="button"
              @click="currentView = 'list'"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-2xs transition-colors gap-1.5 cursor-pointer"
            >
              <svg class="w-4 h-4 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              <span>Kembali ke Daftar</span>
            </button>
          </template>
        </div>
      </div>
    </div>
  </header>

  <!-- ======================================================== -->
  <!-- 2. VIEW A: DAFTAR ALBUM GALERI (LIST VIEW)               -->
  <!-- ======================================================== -->
  <div x-show="currentView === 'list'" class="w-full flex-1 flex flex-col">
    <!-- Filter & Search Toolbar -->
    <section class="w-full bg-[#fafafa] py-6 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <!-- Search Input -->
        <div class="relative w-full md:w-80">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <input
            type="text"
            x-model="searchQuery"
            placeholder="Cari judul album atau deskripsi kegiatan..."
            class="w-full pl-9 pr-3.5 py-2 rounded-lg border border-zinc-300 bg-white text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
          />
        </div>

        <!-- Status Filter Buttons (Strictly No Pill) -->
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0">
          <button
            type="button"
            @click="statusFilter = 'all'"
            :class="statusFilter === 'all' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
            class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0 cursor-pointer"
          >
            Semua Album (<span x-text="albums.length"></span>)
          </button>
          <button
            type="button"
            @click="statusFilter = 'published'"
            :class="statusFilter === 'published' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
            class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0 cursor-pointer"
          >
            Terbit (<span x-text="albums.filter(a => a.status === 'Terbit').length"></span>)
          </button>
          <button
            type="button"
            @click="statusFilter = 'draft'"
            :class="statusFilter === 'draft' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
            class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0 cursor-pointer"
          >
            Draf (<span x-text="albums.filter(a => a.status === 'Draf').length"></span>)
          </button>
        </div>
      </div>
    </section>

    <!-- Albums Grid Container -->
    <section class="w-full bg-[#f4f4f5] py-10 sm:py-12 flex-1">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
          <template x-for="(item, idx) in filteredAlbums" :key="item.id">
            <div class="bg-white border border-zinc-200 hover:border-zinc-300 rounded-xl p-4 sm:p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
              <div>
                <!-- Album Cover with Quick Lightbox Trigger -->
                <div
                  class="aspect-[4/3] w-full bg-zinc-100 rounded-lg overflow-hidden relative border border-zinc-200 shadow-2xs cursor-pointer"
                  @click="openLightbox(item)"
                >
                  <img :src="resolveImgUrl(item.cover)" :alt="item.title" class="w-full h-full object-cover group-hover:scale-104 transition-transform duration-500" />
                  <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity bg-white/95 backdrop-blur-sm text-zinc-900 text-xs font-semibold px-3 py-1.5 rounded-lg shadow-sm flex items-center gap-1.5">
                      <svg class="w-3.5 h-3.5 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      <span>Buka Teater Foto</span>
                    </div>
                  </div>

                  <!-- Badge Jumlah Foto -->
                  <div class="absolute bottom-2.5 right-2.5 bg-zinc-950/80 backdrop-blur-xs text-white text-[11px] font-bold px-2 py-0.5 rounded-md flex items-center gap-1">
                    <svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                    </svg>
                    <span x-text="(item.photos ? item.photos.length : 0) + ' Foto'"></span>
                  </div>
                </div>

                <!-- Album Information -->
                <div class="pt-4">
                  <div class="flex items-center justify-between gap-2 mb-2">
                    <span class="text-xs text-zinc-500 font-medium" x-text="item.dateFormatted"></span>
                    <span
                      class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md border"
                      :class="item.status === 'Terbit' ? 'bg-[#fafafa] text-zinc-800 border-zinc-200' : 'bg-amber-50 text-amber-800 border-amber-200'"
                      x-text="item.status"
                    ></span>
                  </div>

                  <h2 class="text-base font-bold text-zinc-950 group-hover:text-[#BC0202] transition-colors leading-snug line-clamp-2" x-text="item.title"></h2>
                  <p class="text-xs text-zinc-600 mt-2 line-clamp-2 leading-relaxed" x-text="item.desc"></p>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="mt-5 pt-4 border-t border-zinc-100 flex items-center justify-between gap-2">
                <button
                  type="button"
                  @click="openLightbox(item)"
                  class="inline-flex items-center gap-1 px-3 py-2 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold transition-colors cursor-pointer"
                  title="Lihat Pratinjau Foto"
                >
                  <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <span>Pratinjau</span>
                </button>

                <div class="flex items-center gap-1.5">
                  <button
                    type="button"
                    @click="openEdit(item)"
                    class="inline-flex items-center gap-1 px-3 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm transition-colors active:scale-98 cursor-pointer"
                  >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Kelola Foto</span>
                  </button>

                  <button
                    type="button"
                    @click="deleteAlbum(item.id)"
                    title="Hapus Album"
                    class="p-2 rounded-lg border border-zinc-200 bg-white text-zinc-500 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors cursor-pointer"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </template>
        </div>

        <!-- Empty State -->
        <div x-show="filteredAlbums.length === 0" class="text-center py-16 bg-white rounded-xl border border-zinc-200 p-8">
          <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-400 mx-auto flex items-center justify-center mb-3">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="font-bold text-base text-zinc-950">Tidak ada album galeri yang ditemukan</h3>
          <p class="text-xs text-zinc-500 mt-1">Coba kata kunci pencarian lain atau pilih filter status yang berbeda.</p>
        </div>
      </div>
    </section>
  </div>

  <!-- ======================================================== -->
  <!-- 3. VIEW B: FORM EDITOR ALBUM & FOTO (EDITOR VIEW)        -->
  <!-- ======================================================== -->
  <div x-show="currentView === 'editor'" x-cloak class="w-full flex-1 flex flex-col bg-[#f4f4f5]">
    <!-- Top Form Toolbar -->
    <div class="sticky top-0 z-30 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-3.5 flex flex-wrap items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <button
          type="button"
          @click="currentView = 'list'"
          class="rounded-lg p-1.5 text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors cursor-pointer"
          title="Kembali ke Daftar"
        >
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
        </button>
        <div>
          <span class="text-[11px] font-bold uppercase tracking-wider text-[#BC0202]" x-text="formMode === 'create' ? 'Tambah Album Baru' : 'Menyunting Album & Koleksi Foto'"></span>
          <h2 class="text-sm sm:text-base font-bold text-zinc-950 tracking-tight leading-none" x-text="form.title ? form.title : 'Judul Album Belum Diisi'"></h2>
        </div>
      </div>

      <div class="flex items-center gap-2.5">
        <!-- Tombol Pratinjau Lightbox Teater Foto -->
        <button
          type="button"
          @click="openPreviewFromForm()"
          class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-3.5 py-2 shadow-2xs transition-colors gap-1.5 cursor-pointer"
        >
          <svg class="w-3.5 h-3.5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          <span>Pratinjau Teater Foto</span>
        </button>

        <!-- Tombol Simpan Album -->
        <button
          type="button"
          @click="saveAlbum()"
          class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors active:scale-98 gap-1.5 cursor-pointer"
        >
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          <span>Simpan Album</span>
        </button>
      </div>
    </div>

    <!-- Form Body: 2 Kolom Layout (Kelola Foto 8 Cols + Informasi Album 4 Cols) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 py-8 sm:py-10 w-full flex-1">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- LEFT/CENTER: KELOLA FOTO-FOTO DI ALBUM (8 COLS) -->
        <div class="lg:col-span-8 space-y-6">
          <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-5 mb-6 border-b border-zinc-100">
              <div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 tracking-tight flex items-center">
                  <span class="text-[#BC0202] font-black mr-2">|</span>
                  Foto-Foto Dokumentasi di Dalam Album
                </h3>
                <p class="text-xs text-zinc-500 mt-1">Total <strong class="text-zinc-900" x-text="form.photos.length"></strong> foto terpasang dalam album ini.</p>
              </div>

              <div class="flex items-center gap-2 self-start sm:self-auto">
                <input
                  type="file"
                  x-ref="batchPhotoInput"
                  @change="uploadNewPhotos($event)"
                  accept="image/*"
                  multiple
                  class="hidden"
                />
                <button
                  type="button"
                  @click="$refs.batchPhotoInput.click()"
                  class="inline-flex items-center gap-1.5 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-3.5 py-2 shadow-sm transition-colors active:scale-98 cursor-pointer"
                >
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>Unggah Foto Baru</span>
                </button>

                <button
                  type="button"
                  @click="addPhotoToForm()"
                  class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-700 text-xs font-semibold px-3 py-2 shadow-2xs transition-colors cursor-pointer"
                  title="Tambah baris foto kosong"
                >
                  <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  <span>Tambah Baris</span>
                </button>
              </div>
            </div>

            <!-- Grid List Foto dalam Album -->
            <div class="space-y-4">
              <template x-for="(photo, pIdx) in form.photos" :key="photo.id">
                <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-4 sm:p-5 transition-all flex flex-col sm:flex-row items-start gap-4 sm:gap-5 group">
                  <!-- Foto Thumbnail -->
                  <div class="w-full sm:w-44 aspect-[4/3] rounded-lg overflow-hidden bg-zinc-200 border border-zinc-200 shrink-0 relative shadow-2xs flex items-center justify-center">
                    <template x-if="photo.url">
                      <img :src="resolveImgUrl(photo.url)" alt="Foto Dokumentasi" class="w-full h-full object-cover" />
                    </template>
                    <template x-if="!photo.url">
                      <div class="text-zinc-400 flex flex-col items-center justify-center text-xs p-3 text-center">
                        <svg class="w-7 h-7 mb-1 text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-[11px]">Belum ada foto</span>
                      </div>
                    </template>
                    <div x-show="photo.isUploading" class="absolute inset-0 bg-black/60 backdrop-blur-xs flex items-center justify-center text-white text-xs font-semibold">
                      Mengunggah...
                    </div>
                    <span
                      x-show="form.cover === photo.url && photo.url"
                      class="absolute top-2 left-2 bg-[#BC0202] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm"
                    >
                      Cover Album
                    </span>
                  </div>

                  <!-- Detail Form Foto (Upload Berkas & Keterangan) -->
                  <div class="min-w-0 flex-1 w-full space-y-3">
                    <div class="flex items-center justify-between gap-2">
                      <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500" x-text="'Foto #' + (pIdx + 1)"></span>

                      <div class="flex items-center gap-2">
                        <!-- Tombol Jadikan Cover -->
                        <button
                          type="button"
                          @click="setAsCover(photo.url)"
                          :disabled="!photo.url || form.cover === photo.url"
                          :class="form.cover === photo.url ? 'opacity-40 cursor-default bg-zinc-200 text-zinc-600 border-zinc-200' : (!photo.url ? 'opacity-30 cursor-not-allowed bg-zinc-100 text-zinc-400 border-zinc-200' : 'bg-white text-zinc-700 hover:text-zinc-950 border-zinc-300 hover:bg-zinc-50 cursor-pointer')"
                          class="text-[11px] font-semibold px-2.5 py-1 rounded-md border shadow-2xs transition-colors"
                        >
                          <span x-text="form.cover === photo.url ? 'Sampul Aktif' : 'Jadikan Sampul'"></span>
                        </button>

                        <!-- Tombol Hapus Foto -->
                        <button
                          type="button"
                          @click="removePhotoFromForm(pIdx)"
                          class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                          title="Hapus foto dari album"
                        >
                          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                        </button>
                      </div>
                    </div>

                    <!-- Upload Foto Berkas (Hapus Select) -->
                    <div>
                      <label class="block text-[11px] font-bold text-zinc-700 mb-1">Berkas Foto Dokumentasi:</label>
                      <div class="flex items-center gap-2.5">
                        <input
                          type="file"
                          :id="'photo-file-' + photo.id"
                          @change="uploadPhotoItem($event, photo)"
                          accept="image/*"
                          class="hidden"
                        />
                        <button
                          type="button"
                          @click="document.getElementById('photo-file-' + photo.id).click()"
                          :disabled="photo.isUploading"
                          class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 hover:border-[#BC0202] text-xs font-semibold px-3 py-2 text-zinc-800 transition-colors cursor-pointer shadow-2xs shrink-0"
                        >
                          <svg class="w-3.5 h-3.5 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                          <span x-text="photo.isUploading ? 'Mengunggah...' : (photo.url ? 'Ganti Berkas Foto' : 'Pilih & Unggah Foto')"></span>
                        </button>
                        <span class="text-[11px] text-zinc-500 truncate" x-text="photo.url ? (photo.url.startsWith('http') || photo.url.startsWith('/') ? photo.url.split('/').pop() : photo.url) : 'Belum ada foto yang diunggah'"></span>
                      </div>
                    </div>

                    <!-- Keterangan / Caption Foto -->
                    <div>
                      <label class="block text-[11px] font-bold text-zinc-700 mb-1">Keterangan Foto (Caption):</label>
                      <input
                        type="text"
                        x-model="photo.caption"
                        placeholder="Tuliskan keterangan suasana atau pihak pada foto ini..."
                        class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                      />
                    </div>
                  </div>
                </div>
              </template>
            </div>

            <!-- Tombol Tambah Foto di Bawah -->
            <div class="mt-6 pt-5 border-t border-zinc-200/80 flex flex-col sm:flex-row items-center justify-center gap-3">
              <button
                type="button"
                @click="$refs.batchPhotoInput.click()"
                class="inline-flex items-center justify-center gap-1.5 rounded-lg border-2 border-dashed border-zinc-300 hover:border-[#BC0202] hover:text-[#BC0202] bg-white text-zinc-700 text-xs font-semibold px-5 py-3 transition-colors w-full sm:w-auto cursor-pointer flex-1"
              >
                <svg class="w-4 h-4 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Unggah Foto Dokumentasi Baru (Bisa Banyak Sekaligus)</span>
              </button>

              <button
                type="button"
                @click="addPhotoToForm()"
                class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-zinc-300 hover:bg-zinc-50 bg-white text-zinc-700 text-xs font-semibold px-4 py-3 transition-colors w-full sm:w-auto cursor-pointer"
              >
                <svg class="w-4 h-4 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Baris Kosong</span>
              </button>
            </div>
          </div>
        </div>

        <!-- RIGHT: INFORMASI & PENGATURAN ALBUM (4 COLS) -->
        <div class="lg:col-span-4 space-y-6">
          <!-- Panel Pengaturan Meta Album -->
          <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-5">
            <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
              <span class="text-[#BC0202] font-black mr-2">|</span> Informasi Album
            </h3>

            <!-- Judul Album -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Judul Album Kegiatan *</label>
              <input
                type="text"
                x-model="form.title"
                placeholder="Contoh: Dialog Reses di Kebon Pedes..."
                class="w-full font-bold rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-950 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
              />
            </div>

            <!-- Tanggal Kegiatan -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tanggal Pelaksanaan:</label>
              <input
                type="date"
                x-model="form.date"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-900 focus:outline-none focus:border-[#FF0000]"
              />
            </div>

            <!-- Deskripsi Album -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Deskripsi Singkat Album:</label>
              <textarea
                x-model="form.desc"
                rows="4"
                placeholder="Uraian singkat mengenai rangkaian kegiatan atau momentum pada album foto ini..."
                class="w-full rounded-lg border border-zinc-300 bg-white p-3 text-xs text-zinc-900 leading-relaxed focus:outline-none focus:border-[#FF0000]"
              ></textarea>
            </div>

            <!-- Status Terbit / Draf -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Status Album:</label>
              <div class="grid grid-cols-2 gap-2">
                <label
                  :class="form.status === 'Terbit' ? 'bg-[#BC0202] text-white border-[#BC0202]' : 'bg-white text-zinc-700 border-zinc-200'"
                  class="rounded-lg border px-3 py-2 text-xs font-semibold cursor-pointer text-center transition-colors flex items-center justify-center gap-1.5"
                >
                  <input type="radio" value="Terbit" x-model="form.status" class="hidden" />
                  <span>&bull; Terbit</span>
                </label>

                <label
                  :class="form.status === 'Draf' ? 'bg-zinc-900 text-white border-zinc-900' : 'bg-white text-zinc-700 border-zinc-200'"
                  class="rounded-lg border px-3 py-2 text-xs font-semibold cursor-pointer text-center transition-colors flex items-center justify-center gap-1.5"
                >
                  <input type="radio" value="Draf" x-model="form.status" class="hidden" />
                  <span>Draf</span>
                </label>
              </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="pt-3 border-t border-zinc-100">
              <button
                type="button"
                @click="saveAlbum()"
                class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold py-2.5 shadow-sm transition-colors active:scale-98 cursor-pointer"
              >
                Simpan Album Galeri
              </button>
            </div>
          </div>

          <!-- Panel Sampul Album Terpilih -->
          <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
              <span class="text-[#BC0202] font-black mr-2">|</span> Sampul Album Terpilih
            </h3>

            <!-- Pratinjau Sampul Aktif -->
            <div class="aspect-[4/3] bg-zinc-100 rounded-lg overflow-hidden border border-zinc-200 shadow-2xs relative flex items-center justify-center">
              <template x-if="form.cover">
                <img :src="resolveImgUrl(form.cover)" alt="Sampul Album" class="w-full h-full object-cover" />
              </template>
              <template x-if="!form.cover">
                <div class="text-zinc-400 flex flex-col items-center justify-center text-xs p-4 text-center">
                  <svg class="w-8 h-8 mb-2 text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>Belum ada sampul album terpilih</span>
                </div>
              </template>
              <div x-show="uploadingCover" class="absolute inset-0 bg-black/60 backdrop-blur-xs flex items-center justify-center text-white text-xs font-semibold">
                Mengunggah Sampul...
              </div>
            </div>

            <!-- Tombol Unggah Sampul Langsung -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Unggah Foto Sampul Khusus:</label>
              <input
                type="file"
                x-ref="coverFileInput"
                @change="uploadCoverImage($event)"
                accept="image/*"
                class="hidden"
              />
              <button
                type="button"
                @click="$refs.coverFileInput.click()"
                :disabled="uploadingCover"
                class="w-full inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 hover:border-[#BC0202] text-xs font-semibold px-3 py-2.5 text-zinc-800 transition-colors cursor-pointer shadow-2xs"
              >
                <svg class="w-4 h-4 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span x-text="uploadingCover ? 'Mengunggah Sampul...' : 'Pilih & Unggah Sampul Album'"></span>
              </button>
            </div>

            <p class="text-[11px] text-zinc-500 leading-normal">
              Sampul ini akan menjadi foto utama kartu album pada grid Galeri publik. Anda dapat mengunggah berkas di atas atau menekan tombol <strong>"Jadikan Sampul"</strong> pada salah satu foto di sisi kiri.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- 4. MINIMALIST ADMIN FOOTER (#000000)       -->
  <!-- ========================================== -->
  <footer class="w-full bg-[#000000] text-white py-8 border-t border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-[11px]">BLB</div>
        <span class="text-xs font-semibold text-zinc-300">Modul Pengelolaan Galeri &bull; Banu Lesmana Bagaskara, S.M.</span>
      </div>
      <div class="text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
    </div>
  </footer>

  <!-- ======================================================== -->
  <!-- MODAL PRATINJAU LIGHTBOX FOTO (1:1 DENGAN HALAMAN PUBLIK) -->
  <!-- ======================================================== -->
  <div
    x-show="lightboxModal"
    x-cloak
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-lightbox-title"
    class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-zinc-950/85 backdrop-blur-md select-none"
  >
    <div @click.away="closeLightbox()" class="bg-zinc-900 border border-zinc-800 text-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[92vh] flex flex-col overflow-hidden">
      <!-- Top Bar: Judul Album & Close Button -->
      <div class="px-5 py-3.5 sm:px-6 sm:py-4 border-b border-zinc-800 flex items-center justify-between gap-4 bg-zinc-900 shrink-0">
        <div class="min-w-0 flex-1">
          <span class="text-[11px] font-bold uppercase tracking-wider text-red-500 block">Pratinjau Teater Foto Publik</span>
          <h3 id="modal-lightbox-title" class="text-sm sm:text-base font-bold text-white tracking-tight truncate mt-0.5" x-text="previewAlbumData?.title"></h3>
        </div>
        <button
          type="button"
          @click="closeLightbox()"
          aria-label="Tutup Pratinjau"
          class="rounded-lg p-2 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors shrink-0 cursor-pointer"
        >
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Main Photo Preview (Large Center Display) -->
      <div class="relative bg-black flex-1 min-h-[260px] sm:min-h-[400px] max-h-[56vh] flex items-center justify-center overflow-hidden">
        <template x-if="previewAlbumData && previewAlbumData.photos && previewAlbumData.photos.length > 0">
          <img
            :src="resolveImgUrl(previewAlbumData.photos[activePhotoIndex]?.url)"
            :alt="previewAlbumData.title"
            class="w-full h-full max-h-[56vh] object-contain transition-all duration-200"
          />
        </template>

        <!-- Prev Button (Strict Anti-Pill: rounded-lg) -->
        <button
          type="button"
          x-show="activePhotoIndex > 0"
          @click.stop="prevPhoto()"
          aria-label="Foto Sebelumnya"
          class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md hover:scale-105 cursor-pointer"
        >
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <!-- Next Button (Strict Anti-Pill: rounded-lg) -->
        <button
          type="button"
          x-show="previewAlbumData && activePhotoIndex < previewAlbumData.photos.length - 1"
          @click.stop="nextPhoto()"
          aria-label="Foto Berikutnya"
          class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md hover:scale-105 cursor-pointer"
        >
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- Caption Foto Aktif -->
      <div class="bg-zinc-900 px-5 py-2.5 border-t border-zinc-800/80 text-center">
        <p class="text-xs text-zinc-300 italic" x-text="previewAlbumData?.photos[activePhotoIndex]?.caption || 'Dokumentasi kegiatan resmi'"></p>
      </div>

      <!-- Thumbnail Strip di Bawah -->
      <div class="bg-zinc-950/95 border-t border-zinc-800 px-4 py-3 sm:px-6 sm:py-3.5 shrink-0">
        <div class="flex items-center gap-2.5 overflow-x-auto pb-1">
          <template x-for="(photo, idx) in (previewAlbumData ? previewAlbumData.photos : [])" :key="idx">
            <button
              type="button"
              @click="activePhotoIndex = idx"
              class="relative w-16 h-12 sm:w-20 sm:h-14 shrink-0 rounded-lg overflow-hidden border-2 transition-all duration-200 focus:outline-none cursor-pointer"
              :class="activePhotoIndex === idx ? 'border-[#BC0202] scale-102 ring-1 ring-[#BC0202]' : 'border-zinc-800 opacity-60 hover:opacity-100 hover:border-zinc-600'"
            >
              <img :src="resolveImgUrl(photo.url)" :alt="previewAlbumData?.title" class="w-full h-full object-cover" />
            </button>
          </template>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function adminGaleri() {
    return {
      currentView: 'list',
      searchQuery: '',
      statusFilter: 'all',
      saveSuccessNotification: false,

      lightboxModal: false,
      activePhotoIndex: 0,
      previewAlbumData: null,

      formMode: 'create',
      currentAlbumId: null,
      uploadingCover: false,
      form: {
        title: '',
        date: '',
        desc: '',
        cover: '',
        status: 'Terbit',
        photos: []
      },

      resolveImgUrl(url) {
        if (!url) return '';
        if (url.startsWith('http://') || url.startsWith('https://') || url.startsWith('data:') || url.startsWith('/')) {
          return url;
        }
        return '/' + url;
      },

      albums: @json($initialAlbums),

      get filteredAlbums() {
        return this.albums.filter(item => {
          const matchesSearch =
            !this.searchQuery.trim() ||
            (item.title && item.title.toLowerCase().includes(this.searchQuery.toLowerCase())) ||
            (item.desc && item.desc.toLowerCase().includes(this.searchQuery.toLowerCase()));

          if (this.statusFilter === 'all') return matchesSearch;
          if (this.statusFilter === 'published') return matchesSearch && item.status === 'Terbit';
          if (this.statusFilter === 'draft') return matchesSearch && item.status === 'Draf';
          return matchesSearch;
        });
      },

      uploadCoverImage(event) {
        const file = event.target.files[0];
        if (!file) return;

        this.uploadingCover = true;
        const fd = new FormData();
        fd.append('file', file);

        fetch('{{ route("admin.upload") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: fd
        })
        .then(r => r.json())
        .then(data => {
          this.uploadingCover = false;
          if (data && data.success) {
            this.form.cover = data.path;
          } else {
            alert(data.message || 'Gagal mengunggah gambar sampul.');
          }
        })
        .catch(() => {
          this.uploadingCover = false;
          alert('Terjadi kesalahan jaringan.');
        });
      },

      uploadPhotoItem(event, photo) {
        const file = event.target.files[0];
        if (!file) return;

        photo.isUploading = true;
        const fd = new FormData();
        fd.append('file', file);

        fetch('{{ route("admin.upload") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: fd
        })
        .then(r => r.json())
        .then(data => {
          photo.isUploading = false;
          if (data && data.success) {
            const oldUrl = photo.url;
            photo.url = data.path;
            if (!this.form.cover || this.form.cover === oldUrl) {
              this.form.cover = data.path;
            }
          } else {
            alert(data.message || 'Gagal mengunggah foto.');
          }
        })
        .catch(() => {
          photo.isUploading = false;
          alert('Terjadi kesalahan jaringan.');
        });
      },

      uploadNewPhotos(event) {
        const files = event.target.files;
        if (!files || files.length === 0) return;

        Array.from(files).forEach((file, index) => {
          const newPhoto = {
            id: 'p_' + Date.now() + '_' + index + '_' + Math.random().toString(36).substr(2, 4),
            url: '',
            caption: '',
            isUploading: true
          };
          this.form.photos.push(newPhoto);

          const fd = new FormData();
          fd.append('file', file);

          fetch('{{ route("admin.upload") }}', {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Accept': 'application/json'
            },
            body: fd
          })
          .then(r => r.json())
          .then(data => {
            newPhoto.isUploading = false;
            if (data && data.success) {
              newPhoto.url = data.path;
              if (!this.form.cover) {
                this.form.cover = data.path;
              }
            } else {
              alert(data.message || 'Gagal mengunggah foto: ' + file.name);
              const idx = this.form.photos.indexOf(newPhoto);
              if (idx !== -1) {
                this.form.photos.splice(idx, 1);
              }
            }
          })
          .catch(() => {
            newPhoto.isUploading = false;
            alert('Terjadi kesalahan jaringan saat mengunggah: ' + file.name);
          });
        });
        event.target.value = '';
      },

      openCreate() {
        this.formMode = 'create';
        this.currentAlbumId = null;
        this.form = {
          title: '',
          date: new Date().toISOString().split('T')[0],
          desc: '',
          cover: '',
          status: 'Terbit',
          photos: [
            { id: 'p_' + Date.now() + '_1', url: '', caption: '', isUploading: false }
          ]
        };
        this.currentView = 'editor';
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },

      openEdit(item) {
        this.formMode = 'edit';
        this.currentAlbumId = item.id;
        this.form = {
          title: item.title,
          date: item.date,
          desc: item.desc,
          cover: item.cover,
          status: item.status,
          photos: (item.photos && item.photos.length > 0)
            ? item.photos.map(p => ({
                id: p.id || ('p_' + Date.now() + '_' + Math.random().toString(36).substr(2, 4)),
                url: p.url,
                caption: p.caption || '',
                isUploading: false
              }))
            : [{ id: 'p_' + Date.now() + '_1', url: '', caption: '', isUploading: false }]
        };
        this.currentView = 'editor';
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },

      addPhotoToForm() {
        this.form.photos.push({
          id: 'p_' + Date.now() + '_' + Math.random().toString(36).substr(2, 4),
          url: '',
          caption: '',
          isUploading: false
        });
      },

      removePhotoFromForm(index) {
        if (this.form.photos.length <= 1) {
          alert('Album harus memiliki minimal 1 foto dokumentasi!');
          return;
        }
        const removed = this.form.photos.splice(index, 1)[0];
        if (this.form.cover === removed.url && this.form.photos.length > 0) {
          const nextPhoto = this.form.photos.find(p => p.url);
          this.form.cover = nextPhoto ? nextPhoto.url : '';
        }
      },

      setAsCover(url) {
        if (!url) {
          alert('Unggah foto terlebih dahulu sebelum menjadikannya sebagai sampul!');
          return;
        }
        this.form.cover = url;
      },

      saveAlbum() {
        if (!this.form.title.trim()) {
          alert('Judul album wajib diisi!');
          return;
        }

        const validPhotos = this.form.photos.filter(p => p.url && p.url.trim());
        if (validPhotos.length === 0) {
          alert('Album harus memiliki minimal 1 foto dokumentasi yang telah diunggah!');
          return;
        }

        const url = this.formMode === 'create' ? '{{ route("admin.galeri.store") }}' : '/admin/galeri/' + this.currentAlbumId;
        const method = this.formMode === 'create' ? 'POST' : 'PUT';

        const coverUrl = this.form.cover || validPhotos[0].url;

        const payload = {
          title: this.form.title,
          date: this.form.date,
          desc: this.form.desc,
          cover: coverUrl,
          status: this.form.status,
          photos: validPhotos.map(p => ({ url: p.url, caption: p.caption || '' }))
        };

        fetch(url, {
          method: method,
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: JSON.stringify(payload)
        }).then(r => {
          if (r.ok) {
            window.location.href = '{{ route("admin.galeri.index") }}';
          } else {
            return r.json().then(err => alert(err.message || 'Gagal menyimpan album.'));
          }
        }).catch(() => {
          alert('Terjadi kesalahan jaringan.');
        });
      },

      deleteAlbum(id) {
        if (confirm('Apakah Anda yakin ingin menghapus album galeri ini beserta seluruh fotonya?')) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = '/admin/galeri/' + id;
          form.innerHTML = `@csrf @method('DELETE')`;
          document.body.appendChild(form);
          form.submit();
        }
      },

      toggleStatus(item) {
        fetch(`/admin/galeri/${item.id}/toggle-status`, {
          method: 'PATCH',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          }
        }).then(r => r.json()).then(data => {
          if (data && data.success) {
            item.status = (data.status === 'published' ? 'Terbit' : 'Draf');
          }
        }).catch(() => {
          item.status = (item.status === 'Terbit' ? 'Draf' : 'Terbit');
        });
      },

      openLightbox(album) {
        this.previewAlbumData = album;
        this.activePhotoIndex = 0;
        this.lightboxModal = true;
      },

      openPreviewFromForm() {
        const validPhotos = this.form.photos.filter(p => p.url && p.url.trim());
        if (validPhotos.length === 0) {
          alert('Silakan unggah minimal 1 foto untuk pratinjau teater!');
          return;
        }
        this.previewAlbumData = {
          title: this.form.title || 'Pratinjau Album',
          photos: validPhotos
        };
        this.activePhotoIndex = 0;
        this.lightboxModal = true;
      },

      closeLightbox() {
        this.lightboxModal = false;
        this.previewAlbumData = null;
      },

      prevPhoto() {
        if (this.activePhotoIndex > 0) this.activePhotoIndex--;
      },

      nextPhoto() {
        if (this.previewAlbumData && this.activePhotoIndex < this.previewAlbumData.photos.length - 1) {
          this.activePhotoIndex++;
        }
      }
    };
  }
</script>
@endpush
