@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
  @php
    $articlesJson = $articles->values();
  @endphp

  <div
    x-data="adminBerita({{ json_encode($articlesJson) }})"
    @keydown.escape.window="if (previewModal) closePreview();"
    class="flex-1 flex flex-col"
  >
    <!-- Notification Toast -->
    <div
      x-show="saveSuccessNotification"
      x-transition
      x-cloak
      class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
    >
      <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
      <div>
        <span class="font-bold block" x-text="notificationTitle">Artikel Berita Berhasil Disimpan!</span>
        <span class="text-emerald-800" x-text="notificationMessage">Pembaruan telah tersimpan dan siap ditampilkan.</span>
      </div>
    </div>

    <!-- Editorial Header Section -->
    <header class="w-full bg-[#faf5f5] border-b border-zinc-200 py-8 sm:py-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
          <div class="max-w-2xl">
            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-2.5">
              <span>Modul Artikel Berita &bull; Publikasi Media</span>
            </div>
            <h1 class="text-2xl sm:text-4xl lg:text-[38px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
              Kelola <span class="text-[#BC0202]">Artikel Berita</span>
            </h1>
            <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 leading-relaxed">
              Kelola rilis pers resmi, publikasi aktivitas reses parlemen, dan dokumentasi liputan media dengan kolom data lengkap (Judul, Tanggal, Deskripsi, Cover Image, dan Sumber).
            </p>
          </div>

          <!-- Action Button in Header -->
          <div class="shrink-0 flex items-center gap-3">
            <template x-if="currentView === 'list'">
              <button
                type="button"
                @click="openCreate()"
                class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors active:scale-98 gap-2"
              >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Berita Baru</span>
              </button>
            </template>

            <template x-if="currentView === 'editor'">
              <button
                type="button"
                @click="currentView = 'list'"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-2xs transition-colors gap-1.5"
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
    <!-- VIEW A: DAFTAR ARTIKEL BERITA (LIST VIEW)                -->
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
              placeholder="Cari judul, deskripsi, atau sumber..."
              class="w-full pl-9 pr-3.5 py-2 rounded-lg border border-zinc-300 bg-white text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
            />
          </div>

          <!-- Status Filter Buttons (Strictly No Pill) -->
          <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0">
            <button
              type="button"
              @click="statusFilter = 'all'"
              :class="statusFilter === 'all' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
              class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
            >
              Semua (<span x-text="articles.length"></span>)
            </button>
            <button
              type="button"
              @click="statusFilter = 'published'"
              :class="statusFilter === 'published' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
              class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
            >
              Terbit (<span x-text="articles.filter(a => a.status === 'Terbit').length"></span>)
            </button>
            <button
              type="button"
              @click="statusFilter = 'draft'"
              :class="statusFilter === 'draft' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
              class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
            >
              Draf (<span x-text="articles.filter(a => a.status === 'Draf').length"></span>)
            </button>
            <button
              type="button"
              @click="statusFilter = 'featured'"
              :class="statusFilter === 'featured' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
              class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
            >
              Sorotan Utama (<span x-text="articles.filter(a => a.isFeatured).length"></span>)
            </button>
          </div>
        </div>
      </section>

      <!-- Articles List Container -->
      <section class="w-full bg-[#f4f4f5] py-10 sm:py-12 flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 space-y-4">
          <template x-for="(item, idx) in filteredArticles" :key="item.id">
            <div class="rounded-xl border border-zinc-200 bg-white p-5 sm:p-6 shadow-sm hover:border-zinc-300 transition-all flex flex-col md:flex-row items-start md:items-center justify-between gap-6 group">
              <!-- Left: Thumbnail & Details -->
              <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 min-w-0 flex-1">
                <div class="w-full sm:w-44 md:w-48 aspect-[16/10] rounded-lg overflow-hidden bg-zinc-100 border border-zinc-200 shrink-0 relative">
                  <img :src="item.coverImage.startsWith('http') ? item.coverImage : '{{ asset('') }}' + item.coverImage.replace(/^\//, '')" :alt="item.title" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300" />
                  <span
                    x-show="item.isFeatured"
                    class="absolute top-2 left-2 bg-[#BC0202] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm"
                  >
                    Sorotan
                  </span>
                </div>

                <div class="min-w-0 flex-1">
                  <div class="flex flex-wrap items-center gap-2 mb-2">
                    <span class="text-xs text-zinc-500 font-medium" x-text="item.dateFormatted"></span>
                    <span class="text-zinc-300">&bull;</span>
                    <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-zinc-700 bg-zinc-100 px-2.5 py-0.5 rounded-md border border-zinc-200">
                      <span class="text-[#BC0202] font-black mr-0.5">Sumber:</span>
                      <span x-text="item.source"></span>
                    </span>
                    <span class="text-zinc-300">&bull;</span>
                    <span
                      class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md border"
                      :class="item.status === 'Terbit' ? 'bg-[#fafafa] text-zinc-800 border-zinc-200' : 'bg-amber-50 text-amber-800 border-amber-200'"
                      x-text="item.status"
                    ></span>
                  </div>

                  <h2 class="text-base sm:text-lg font-bold text-zinc-950 leading-snug tracking-tight group-hover:text-[#BC0202] transition-colors" x-text="item.title"></h2>
                  <p class="text-xs text-zinc-600 mt-2 line-clamp-2 leading-relaxed" x-text="item.description"></p>
                </div>
              </div>

              <!-- Right: Quick Actions -->
              <div class="flex items-center gap-2 w-full md:w-auto justify-end pt-4 md:pt-0 border-t md:border-t-0 border-zinc-100 shrink-0">
                <!-- Toggle Sorotan -->
                <button
                  type="button"
                  @click="toggleFeatured(item)"
                  :title="item.isFeatured ? 'Batalkan Sorotan Berita Utama' : 'Jadikan Sorotan Berita Utama'"
                  class="p-2 rounded-lg border text-xs font-semibold transition-colors"
                  :class="item.isFeatured ? 'bg-red-50 text-[#BC0202] border-red-200' : 'bg-white text-zinc-500 hover:text-zinc-900 border-zinc-200'"
                >
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </button>

                <!-- Tombol Sunting Berita -->
                <button
                  type="button"
                  @click="openEdit(item)"
                  class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm transition-colors active:scale-98"
                >
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                  <span>Sunting</span>
                </button>

                <!-- Tombol Hapus -->
                <button
                  type="button"
                  @click="deleteArticle(item.id)"
                  title="Hapus Berita"
                  class="p-2 rounded-lg border border-zinc-200 bg-white text-zinc-500 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors"
                >
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>
          </template>

          <!-- Empty State -->
          <div x-show="filteredArticles.length === 0" class="text-center py-16 bg-white rounded-xl border border-zinc-200 p-8">
            <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-400 mx-auto flex items-center justify-center mb-3">
              <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
            <h3 class="font-bold text-base text-zinc-950">Tidak ada artikel berita yang ditemukan</h3>
            <p class="text-xs text-zinc-500 mt-1">Coba kata kunci pencarian lain atau pilih filter status yang berbeda.</p>
          </div>
        </div>
      </section>
    </div>

    <!-- ======================================================== -->
    <!-- VIEW B: FORM EDITOR ARTIKEL BERITA                       -->
    <!-- ======================================================== -->
    <div x-show="currentView === 'editor'" x-cloak class="w-full flex-1 flex flex-col bg-[#f4f4f5]">
      <!-- Top Form Toolbar -->
      <div class="sticky top-0 z-30 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-3.5 flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <button
            type="button"
            @click="currentView = 'list'"
            class="rounded-lg p-1.5 text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors"
            title="Kembali ke Daftar"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
          </button>
          <div>
            <span class="text-[11px] font-bold uppercase tracking-wider text-[#BC0202]" x-text="formMode === 'create' ? 'Tambah Berita Baru' : 'Menyunting Berita'"></span>
            <h2 class="text-sm sm:text-base font-bold text-zinc-950 tracking-tight leading-none" x-text="form.title ? form.title : 'Judul Berita Belum Diisi'"></h2>
          </div>
        </div>

        <div class="flex items-center gap-2.5">
          <!-- Tombol Pratinjau Publik -->
          <button
            type="button"
            @click="openPreview()"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-3.5 py-2 shadow-2xs transition-colors gap-1.5"
          >
            <svg class="w-3.5 h-3.5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span>Pratinjau Publik</span>
          </button>

          <!-- Tombol Simpan -->
          <button
            type="button"
            @click="saveArticle()"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors active:scale-98 gap-1.5"
          >
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Simpan Berita</span>
          </button>
        </div>
      </div>

      <!-- Form Body: 2 Kolom Layout -->
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 py-8 sm:py-10 w-full flex-1">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          
          <!-- LEFT/CENTER: FORM INPUT BERITA UTAMA (8 COLS) -->
          <div class="lg:col-span-8 space-y-6">
            <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm space-y-5">
              <!-- Judul Berita -->
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Judul Artikel Berita *</label>
                <input
                  type="text"
                  x-model="form.title"
                  placeholder="Masukkan judul rilis berita yang lugas & informatif..."
                  class="w-full text-base sm:text-lg font-bold rounded-lg border border-zinc-300 bg-white px-4 py-3 text-zinc-950 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs leading-snug"
                />
              </div>

              <!-- Sumber Berita & Tanggal -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Sumber Berita *</label>
                  <input
                    type="text"
                    x-model="form.source"
                    placeholder="Contoh: Rilis Resmi Rumah Aspirasi / Radar Bogor"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                  />
                </div>
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Tanggal Publikasi *</label>
                  <input
                    type="date"
                    x-model="form.date"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                  />
                </div>
              </div>

              <!-- Deskripsi Berita -->
              <div class="pt-2">
                <div class="flex items-center justify-between mb-1.5">
                  <label class="block text-xs font-bold text-zinc-900 uppercase tracking-wider">Deskripsi / Isi Artikel Berita *</label>
                  <span class="text-[11px] text-zinc-400 font-medium">Mendukung paragraf lengkap</span>
                </div>
                <textarea
                  x-model="form.description"
                  rows="12"
                  placeholder="Tuliskan isi berita rilis lengkap, narasi agenda, keterangan narasumber, atau perkembangan advokasi di sini..."
                  class="w-full rounded-lg border border-zinc-300 bg-white p-4 text-xs sm:text-sm text-zinc-900 leading-relaxed focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                ></textarea>
              </div>
            </div>
          </div>

          <!-- RIGHT: PENGATURAN STATUS & COVER (4 COLS) -->
          <div class="lg:col-span-4 space-y-6">
            <!-- Panel Status -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-5">
              <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
                <span class="text-[#BC0202] font-black mr-2">|</span> Status Publikasi
              </h3>

              <!-- Pilihan Status: Terbit vs Draf -->
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Status:</label>
                <div class="grid grid-cols-2 gap-2">
                  <button
                    type="button"
                    @click="form.status = 'Terbit'"
                    :class="form.status === 'Terbit' ? 'bg-[#BC0202] text-white border-[#BC0202]' : 'bg-white text-zinc-700 border-zinc-200'"
                    class="rounded-lg border px-3 py-2 text-xs font-semibold cursor-pointer text-center transition-colors flex items-center justify-center gap-1.5"
                  >
                    <span>&bull; Terbit</span>
                  </button>

                  <button
                    type="button"
                    @click="form.status = 'Draf'"
                    :class="form.status === 'Draf' ? 'bg-zinc-900 text-white border-zinc-900' : 'bg-white text-zinc-700 border-zinc-200'"
                    class="rounded-lg border px-3 py-2 text-xs font-semibold cursor-pointer text-center transition-colors flex items-center justify-center gap-1.5"
                  >
                    <span>Draf</span>
                  </button>
                </div>
              </div>

              <!-- Sorotan Berita Utama Checkbox -->
              <div class="pt-3 border-t border-zinc-100">
                <label class="flex items-start gap-3 cursor-pointer">
                  <input
                    type="checkbox"
                    x-model="form.isFeatured"
                    class="w-4 h-4 mt-0.5 rounded text-[#BC0202] focus:ring-[#FF0000] border-zinc-300"
                  />
                  <div>
                    <span class="font-bold text-xs text-zinc-950 block">Sorotan Berita Utama</span>
                    <span class="text-[11px] text-zinc-500 leading-normal block mt-0.5">
                      Menjadikan berita ini sebagai headline besar di bagian atas halaman Berita publik.
                    </span>
                  </div>
                </label>
              </div>

              <!-- Tombol Simpan di Sidebar -->
              <div class="pt-3 border-t border-zinc-100">
                <button
                  type="button"
                  @click="saveArticle()"
                  class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold py-2.5 shadow-sm transition-colors active:scale-98"
                >
                  Simpan Artikel Berita
                </button>
              </div>
            </div>

            <!-- Panel Cover Image -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-4">
              <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
                <span class="text-[#BC0202] font-black mr-2">|</span> Cover Image (Gambar Berita)
              </h3>

              <!-- Pratinjau Cover Image -->
              <div class="aspect-[16/10] bg-zinc-100 rounded-lg overflow-hidden border border-zinc-200 shadow-2xs">
                <img :src="form.coverImage.startsWith('http') ? form.coverImage : '{{ asset('') }}' + form.coverImage.replace(/^\//, '')" alt="Cover Image Berita" class="w-full h-full object-cover" />
              </div>

              <!-- Pemilih Cover dari Aset Lokal -->
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Pilih Foto Dokumentasi Berita:</label>
                <select
                  x-model="form.coverImage"
                  class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                >
                  <template x-for="c in availableCovers" :key="c.url">
                    <option :value="c.url" x-text="c.label"></option>
                  </template>
                </select>
                <p class="text-[11px] text-zinc-500 mt-1.5">Rasio ideal 16:9 atau 16:10 untuk keseragaman kartu berita di tampilan publik.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL PRATINJAU PUBLIK BERITA -->
    <div
      x-show="previewModal"
      x-cloak
      role="dialog"
      aria-modal="true"
      class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-zinc-950/85 backdrop-blur-sm overflow-y-auto"
    >
      <div @click.away="closePreview()" class="bg-white border border-zinc-200 text-zinc-950 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[92vh] flex flex-col overflow-hidden my-auto">
        <!-- Modal Top Bar -->
        <div class="px-6 py-4 bg-[#faf5f5] border-b border-zinc-200 flex items-center justify-between gap-4 shrink-0">
          <div class="flex items-center gap-2.5">
            <span class="w-2.5 h-2.5 rounded-full bg-[#BC0202]"></span>
            <span class="font-bold text-xs sm:text-sm text-zinc-900 tracking-tight">Pratinjau Artikel Berita (Mode Tampilan Publik)</span>
          </div>
          <button
            type="button"
            @click="closePreview()"
            aria-label="Tutup Pratinjau"
            class="rounded-lg p-1.5 text-zinc-500 hover:text-zinc-950 hover:bg-zinc-200/60 transition-colors"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Content: Simulasi Tampilan Baca Berita Publik -->
        <div class="p-6 sm:p-10 overflow-y-auto space-y-6">
          <div class="flex flex-wrap items-center text-xs font-medium text-zinc-500 gap-2">
            <span x-text="form.date"></span>
            <span>&bull;</span>
            <span class="inline-flex items-center gap-1 text-zinc-800 bg-zinc-100 px-2.5 py-0.5 rounded-md border border-zinc-200">
              <span class="text-[#BC0202] font-black">Sumber:</span>
              <span x-text="form.source"></span>
            </span>
          </div>

          <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 leading-tight tracking-tight" x-text="form.title ? form.title : 'Judul Berita'"></h1>

          <div class="aspect-[16/9] w-full rounded-xl overflow-hidden border border-zinc-200 bg-zinc-100">
            <img :src="form.coverImage.startsWith('http') ? form.coverImage : '{{ asset('') }}' + form.coverImage.replace(/^\//, '')" :alt="form.title" class="w-full h-full object-cover" />
          </div>

          <div class="pt-2">
            <p class="text-xs sm:text-sm text-zinc-700 leading-relaxed whitespace-pre-line" x-text="form.description"></p>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-3.5 bg-[#fafafa] border-t border-zinc-200 flex items-center justify-between shrink-0">
          <span class="text-xs text-zinc-500">Tampilan disimulasikan sesuai struktur visual publik.</span>
          <button
            type="button"
            @click="closePreview()"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors"
          >
            Tutup Pratinjau
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function adminBerita(initialArticles) {
      return {
        currentView: 'list',
        searchQuery: '',
        statusFilter: 'all',
        previewModal: false,
        saveSuccessNotification: false,
        notificationTitle: 'Berhasil!',
        notificationMessage: 'Pembaruan artikel berita telah tersimpan.',
        csrfToken: '{{ csrf_token() }}',

        formMode: 'create',
        currentArticleId: null,
        form: {
          title: '',
          date: new Date().toISOString().split('T')[0],
          source: 'Rilis Resmi Rumah Aspirasi',
          coverImage: 'assets/banu/testi_dialog.jpg',
          description: '',
          isFeatured: false,
          status: 'Terbit'
        },

        availableCovers: [
          { label: 'Dialog Warga Kebon Pedes', url: 'assets/banu/testi_dialog.jpg' },
          { label: 'Ambulance Siaga 24 Jam', url: 'assets/banu/program_ambulance.jpg' },
          { label: 'Pelatihan UMKM RT/RW', url: 'assets/banu/program_umkm.jpg' },
          { label: 'Sidang Parlemen & Paripurna', url: 'assets/banu/hero_banu.jpg' },
          { label: 'Rembug Komunitas Warga', url: 'assets/banu/footer_community.jpg' },
          { label: 'Banner Serbaguna', url: 'assets/banu/banner_serbaguna.jpg' }
        ],

        articles: initialArticles || [],

        get filteredArticles() {
          return this.articles.filter(item => {
            const matchesSearch = item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                  item.description.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                  item.source.toLowerCase().includes(this.searchQuery.toLowerCase());
            if (this.statusFilter === 'all') return matchesSearch;
            if (this.statusFilter === 'published') return matchesSearch && item.status === 'Terbit';
            if (this.statusFilter === 'draft') return matchesSearch && item.status === 'Draf';
            if (this.statusFilter === 'featured') return matchesSearch && item.isFeatured;
            return matchesSearch;
          });
        },

        openCreate() {
          this.formMode = 'create';
          this.currentArticleId = null;
          this.form = {
            title: '',
            date: new Date().toISOString().split('T')[0],
            source: 'Rilis Resmi Rumah Aspirasi',
            coverImage: 'assets/banu/testi_dialog.jpg',
            description: '',
            isFeatured: false,
            status: 'Terbit'
          };
          this.currentView = 'editor';
          window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        openEdit(item) {
          this.formMode = 'edit';
          this.currentArticleId = item.id;
          this.form = {
            title: item.title,
            date: item.date,
            source: item.source,
            coverImage: item.coverImage,
            description: item.description,
            isFeatured: item.isFeatured,
            status: item.status
          };
          this.currentView = 'editor';
          window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        async saveArticle() {
          if (!this.form.title.trim()) {
            alert('Judul berita wajib diisi!');
            return;
          }
          if (!this.form.source.trim()) {
            alert('Sumber rilis berita wajib diisi!');
            return;
          }
          if (!this.form.description.trim()) {
            alert('Deskripsi berita wajib diisi!');
            return;
          }

          const url = this.formMode === 'create'
            ? '{{ route("admin.berita.store") }}'
            : '/admin/berita/' + this.currentArticleId;

          const method = this.formMode === 'create' ? 'POST' : 'PUT';

          try {
            const response = await fetch(url, {
              method: method,
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken
              },
              body: JSON.stringify(this.form)
            });

            const data = await response.json();

            if (data.success) {
              this.notificationTitle = 'Berhasil!';
              this.notificationMessage = data.message;
              this.saveSuccessNotification = true;
              setTimeout(() => { this.saveSuccessNotification = false; }, 3500);

              window.location.reload();
            } else {
              alert('Gagal menyimpan berita.');
            }
          } catch (e) {
            console.error(e);
            alert('Terjadi kesalahan jaringan.');
          }
        },

        async deleteArticle(id) {
          if (!confirm('Apakah Anda yakin ingin menghapus artikel berita ini?')) {
            return;
          }

          try {
            const response = await fetch('/admin/berita/' + id, {
              method: 'DELETE',
              headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken
              }
            });

            const data = await response.json();
            if (data.success) {
              this.articles = this.articles.filter(a => a.id !== id);
            }
          } catch (e) {
            console.error(e);
          }
        },

        async toggleFeatured(item) {
          try {
            const response = await fetch('/admin/berita/' + item.id + '/toggle-featured', {
              method: 'PATCH',
              headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken
              }
            });
            const data = await response.json();
            if (data.success) {
              item.isFeatured = data.is_featured;
            }
          } catch (e) {
            console.error(e);
          }
        },

        openPreview() {
          this.previewModal = true;
        },

        closePreview() {
          this.previewModal = false;
        }
      };
    }
  </script>
@endsection
