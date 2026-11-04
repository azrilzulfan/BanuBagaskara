@extends('layouts.admin')

@section('title', 'Kelola Hasil Kinerja')

@section('content')
  @php
    $articlesJson = $articles->values();
  @endphp

  <div
    x-data="adminKinerja({{ json_encode($articlesJson) }})"
    @keydown.escape.window="if (previewModal) closePreview(); else mobileMenu = false;"
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
        <span class="font-bold block" x-text="notificationTitle">Perubahan Berhasil Disimpan!</span>
        <span class="text-emerald-800" x-text="notificationMessage">Tulisan hasil kinerja telah diperbarui ke dalam sistem.</span>
      </div>
    </div>

    <!-- Editorial Header Section -->
    <header class="w-full bg-[#faf5f5] border-b border-zinc-200 py-8 sm:py-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
          <div class="max-w-2xl">
            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-2.5">
              <span>Modul Kanvas Artikel &bull; Hasil Kinerja</span>
            </div>
            <h1 class="text-2xl sm:text-4xl lg:text-[38px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
              Kelola <span class="text-[#BC0202]">Hasil Kinerja</span>
            </h1>
            <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 leading-relaxed">
              Tulis laporan advokasi parlemen dan aksi nyata warga dengan format kanvas blok modular bebas (Judul, Paragraf, Gambar, Daftar Poin, Grid, dan Kutipan).
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
                <span>Tulis Hasil Kinerja Baru</span>
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
    <!-- VIEW A: DAFTAR TULISAN HASIL KINERJA (LIST VIEW)         -->
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
              placeholder="Cari judul atau ringkasan kinerja..."
              class="w-full pl-9 pr-3.5 py-2 rounded-lg border border-zinc-300 bg-white text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Status Filter Buttons -->
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
                  <img :src="'/' + (item.coverImage ? item.coverImage.replace(/^(\.\.\/)+/, '') : 'assets/banu/program_ambulance.jpg')" :alt="item.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
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
                    <span
                      :class="item.status === 'Terbit' ? 'bg-emerald-50 text-emerald-800 border-emerald-200' : 'bg-zinc-100 text-zinc-700 border-zinc-200'"
                      class="text-[11px] font-bold px-2 py-0.5 rounded-md border"
                      x-text="item.status"
                    ></span>
                    <span class="text-zinc-300">&bull;</span>
                    <span class="text-xs text-zinc-500 font-mono" x-text="(item.blocks ? item.blocks.length : 0) + ' blok konten'"></span>
                  </div>

                  <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight group-hover:text-[#BC0202] transition-colors line-clamp-2" x-text="item.title"></h3>
                  <p class="text-xs sm:text-[13px] text-zinc-600 mt-2 leading-relaxed line-clamp-2" x-text="item.excerpt"></p>
                </div>
              </div>

              <!-- Right: Actions Buttons -->
              <div class="flex items-center gap-2 shrink-0 self-end md:self-center">
                <!-- Toggle Featured -->
                <button
                  type="button"
                  @click="toggleFeatured(item)"
                  class="p-2 rounded-lg border text-xs font-semibold transition-colors"
                  :class="item.isFeatured ? 'bg-amber-50 text-amber-800 border-amber-300' : 'bg-white text-zinc-600 border-zinc-200 hover:bg-zinc-50'"
                  :title="item.isFeatured ? 'Hapus dari Sorotan' : 'Jadikan Sorotan Utama'"
                >
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </button>

                <!-- Toggle Status -->
                <button
                  type="button"
                  @click="toggleStatus(item)"
                  class="px-2.5 py-1.5 rounded-lg border text-xs font-semibold transition-colors"
                  :class="item.status === 'Terbit' ? 'bg-zinc-100 text-zinc-700 border-zinc-300 hover:bg-zinc-200' : 'bg-emerald-50 text-emerald-800 border-emerald-300 hover:bg-emerald-100'"
                >
                  <span x-text="item.status === 'Terbit' ? 'Jadikan Draf' : 'Terbitkan'"></span>
                </button>

                <!-- Edit Button -->
                <button
                  type="button"
                  @click="openEdit(item)"
                  class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs font-semibold shadow-2xs transition-colors"
                >
                  <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                  <span>Edit</span>
                </button>

                <!-- Delete Button -->
                <button
                  type="button"
                  @click="deleteArticle(item.id)"
                  class="p-2 rounded-lg border border-zinc-200 hover:border-red-300 text-zinc-500 hover:text-red-700 hover:bg-red-50 transition-colors"
                  title="Hapus Laporan"
                >
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>
          </template>

          <div x-show="filteredArticles.length === 0" class="py-16 text-center text-zinc-500 bg-white rounded-xl border border-zinc-200">
            <p>Tidak ada laporan hasil kinerja yang cocok dengan pencarian / filter.</p>
          </div>
        </div>
      </section>
    </div>

    <!-- ======================================================== -->
    <!-- VIEW B: MODULAR BLOCK CANVAS EDITOR                      -->
    <!-- ======================================================== -->
    <div x-show="currentView === 'editor'" class="w-full flex-1 flex flex-col bg-[#f4f4f5]">
      <section class="max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        <!-- Top Metadata Form -->
        <div class="rounded-2xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div class="flex items-center justify-between pb-4 border-b border-zinc-100">
            <h2 class="text-base sm:text-lg font-bold text-zinc-950 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-sm bg-[#BC0202]"></span>
              <span x-text="formMode === 'create' ? 'Tulis Laporan Kinerja Baru' : 'Perbarui Laporan Kinerja'"></span>
            </h2>
            <div class="flex items-center gap-3">
              <button
                type="button"
                @click="openPreview()"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-xs font-semibold text-zinc-700 shadow-2xs"
              >
                <span>Pratinjau Publik</span>
              </button>
              <button
                type="button"
                @click="saveArticle()"
                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm"
              >
                <span>Simpan Perubahan</span>
              </button>
            </div>
          </div>

          <div class="space-y-4">
            <!-- Judul Artikel -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Laporan Hasil Kinerja *</label>
              <input
                type="text"
                x-model="form.title"
                required
                placeholder="Tuliskan judul laporan hasil kinerja..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-950 font-semibold placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <!-- Tanggal, Cover & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tanggal Publikasi *</label>
                <input
                  type="date"
                  x-model="form.date"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                />
              </div>

              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Foto Sampul Utama (Cover)</label>
                <select
                  x-model="form.coverImage"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                >
                  <template x-for="c in availableCovers" :key="c.url">
                    <option :value="c.url" x-text="c.label"></option>
                  </template>
                </select>
              </div>

              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Status Publikasi</label>
                <select
                  x-model="form.status"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                >
                  <option value="Terbit">Terbit (Published)</option>
                  <option value="Draf">Draf (Draft)</option>
                </select>
              </div>
            </div>

            <!-- Excerpt -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Ringkasan / Excerpt (Tampil di Kartu Katalog)</label>
              <textarea
                x-model="form.excerpt"
                rows="2"
                placeholder="Ringkasan singkat maksimal 2-3 kalimat mengenai hasil kinerja..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2 text-xs sm:text-sm text-zinc-700 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              ></textarea>
            </div>

            <!-- Checkbox Sorotan Utama -->
            <div class="flex items-center gap-2 pt-1">
              <input
                id="feat_check"
                type="checkbox"
                x-model="form.isFeatured"
                class="rounded border-zinc-300 text-[#BC0202] focus:ring-[#BC0202]"
              />
              <label for="feat_check" class="text-xs font-semibold text-zinc-800 cursor-pointer">
                Tampilkan sebagai Sorotan Utama (Featured) di Beranda dan Katalog
              </label>
            </div>
          </div>
        </div>

        <!-- ======================================================== -->
        <!-- CANVAS BLOK MODULAR (GUTENBERG-STYLE)                    -->
        <!-- ======================================================== -->
        <div class="rounded-2xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
          <div class="flex items-center justify-between pb-4 border-b border-zinc-100">
            <div>
              <h3 class="text-sm sm:text-base font-bold text-zinc-950">Kanvas Blok Konten Modular</h3>
              <p class="text-xs text-zinc-500">Susun konten artikel menggunakan blok terstruktur secara dinamis.</p>
            </div>

            <!-- Add Block Buttons -->
            <div class="flex flex-wrap items-center gap-1.5">
              <button type="button" @click="addBlock('heading')" class="px-2.5 py-1.5 rounded-lg border border-zinc-200 hover:bg-zinc-50 text-[11px] font-semibold text-zinc-700">+ Judul (H2/H3)</button>
              <button type="button" @click="addBlock('paragraph')" class="px-2.5 py-1.5 rounded-lg border border-zinc-200 hover:bg-zinc-50 text-[11px] font-semibold text-zinc-700">+ Paragraf</button>
              <button type="button" @click="addBlock('image')" class="px-2.5 py-1.5 rounded-lg border border-zinc-200 hover:bg-zinc-50 text-[11px] font-semibold text-zinc-700">+ Gambar</button>
              <button type="button" @click="addBlock('list')" class="px-2.5 py-1.5 rounded-lg border border-zinc-200 hover:bg-zinc-50 text-[11px] font-semibold text-zinc-700">+ Daftar Poin</button>
              <button type="button" @click="addBlock('grid')" class="px-2.5 py-1.5 rounded-lg border border-zinc-200 hover:bg-zinc-50 text-[11px] font-semibold text-zinc-700">+ Grid 2-Kolom</button>
              <button type="button" @click="addBlock('quote')" class="px-2.5 py-1.5 rounded-lg border border-zinc-200 hover:bg-zinc-50 text-[11px] font-semibold text-zinc-700">+ Kutipan</button>
            </div>
          </div>

          <!-- Blocks List Drag/Position -->
          <div class="space-y-4">
            <template x-for="(block, bIdx) in form.blocks" :key="block.id || bIdx">
              <div class="rounded-xl border border-zinc-200 bg-zinc-50/60 p-4 relative group hover:border-zinc-300 transition-colors">
                <!-- Block Header Tools -->
                <div class="flex items-center justify-between pb-2 mb-3 border-b border-zinc-200/70">
                  <div class="flex items-center gap-2">
                    <span class="w-5 h-5 rounded-md bg-zinc-200 text-zinc-700 flex items-center justify-center font-mono font-bold text-[10px]" x-text="bIdx + 1"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-zinc-600" x-text="block.type"></span>
                  </div>

                  <div class="flex items-center gap-1">
                    <!-- Move Up -->
                    <button
                      type="button"
                      @click="moveBlockUp(bIdx)"
                      :disabled="bIdx === 0"
                      class="p-1 rounded text-zinc-400 hover:text-zinc-800 disabled:opacity-30 disabled:hover:text-zinc-400"
                      title="Naikkan"
                    >
                      &uarr;
                    </button>
                    <!-- Move Down -->
                    <button
                      type="button"
                      @click="moveBlockDown(bIdx)"
                      :disabled="bIdx === form.blocks.length - 1"
                      class="p-1 rounded text-zinc-400 hover:text-zinc-800 disabled:opacity-30 disabled:hover:text-zinc-400"
                      title="Turunkan"
                    >
                      &darr;
                    </button>
                    <!-- Remove Block -->
                    <button
                      type="button"
                      @click="removeBlock(bIdx)"
                      class="p-1 rounded text-zinc-400 hover:text-red-700"
                      title="Hapus Blok"
                    >
                      <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- Block Type 1: Heading -->
                <template x-if="block.type === 'heading'">
                  <div class="space-y-2">
                    <div class="flex items-center gap-3">
                      <select x-model="block.level" class="rounded-lg border border-zinc-300 bg-white px-2 py-1.5 text-xs font-bold text-zinc-800">
                        <option value="h2">Heading 2 (H2)</option>
                        <option value="h3">Heading 3 (H3)</option>
                      </select>
                      <input
                        type="text"
                        x-model="block.text"
                        placeholder="Subjudul artikel..."
                        class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs sm:text-sm font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                      />
                    </div>
                  </div>
                </template>

                <!-- Block Type 2: Paragraph -->
                <template x-if="block.type === 'paragraph'">
                  <div>
                    <textarea
                      x-model="block.text"
                      rows="3"
                      placeholder="Tuliskan isi paragraf..."
                      class="w-full rounded-lg border border-zinc-300 bg-white p-3 text-xs sm:text-sm text-zinc-800 focus:outline-none focus:border-[#BC0202] leading-relaxed"
                    ></textarea>
                  </div>
                </template>

                <!-- Block Type 3: Image -->
                <template x-if="block.type === 'image'">
                  <div class="space-y-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                      <div>
                        <label class="block text-[11px] font-bold text-zinc-700 mb-1">Pilih Gambar</label>
                        <select x-model="block.url" class="w-full rounded-lg border border-zinc-300 bg-white p-2 text-xs">
                          <template x-for="c in availableCovers" :key="c.url">
                            <option :value="c.url" x-text="c.label"></option>
                          </template>
                        </select>
                      </div>
                      <div>
                        <label class="block text-[11px] font-bold text-zinc-700 mb-1">Takarir / Caption Gambar</label>
                        <input
                          type="text"
                          x-model="block.caption"
                          placeholder="Keterangan foto kegiatan lapangan..."
                          class="w-full rounded-lg border border-zinc-300 bg-white p-2 text-xs text-zinc-800"
                        />
                      </div>
                    </div>
                  </div>
                </template>

                <!-- Block Type 4: List -->
                <template x-if="block.type === 'list'">
                  <div class="space-y-2">
                    <template x-for="(li, lIdx) in block.items" :key="lIdx">
                      <div class="flex items-center gap-2">
                        <span class="text-xs text-zinc-400 font-bold">&bull;</span>
                        <input
                          type="text"
                          x-model="block.items[lIdx]"
                          placeholder="Poin rincian capaian..."
                          class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-800"
                        />
                        <button
                          type="button"
                          @click="removeListItem(block, lIdx)"
                          class="text-zinc-400 hover:text-red-700 px-1 text-xs"
                          x-show="block.items.length > 1"
                        >
                          &times;
                        </button>
                      </div>
                    </template>
                    <button type="button" @click="addListItem(block)" class="text-xs font-bold text-[#BC0202] hover:underline pt-1">+ Tambah Poin Baru</button>
                  </div>
                </template>

                <!-- Block Type 5: Grid 2-Kolom -->
                <template x-if="block.type === 'grid'">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2 bg-white p-3 rounded-lg border border-zinc-200">
                      <label class="block text-[11px] font-bold text-zinc-700">Kolom 1 (Kiri)</label>
                      <input type="text" x-model="block.col1Title" placeholder="Judul Kolom 1..." class="w-full rounded-lg border border-zinc-300 p-2 text-xs font-bold" />
                      <textarea x-model="block.col1Text" rows="2" placeholder="Uraian Kolom 1..." class="w-full rounded-lg border border-zinc-300 p-2 text-xs"></textarea>
                    </div>
                    <div class="space-y-2 bg-white p-3 rounded-lg border border-zinc-200">
                      <label class="block text-[11px] font-bold text-zinc-700">Kolom 2 (Kanan)</label>
                      <input type="text" x-model="block.col2Title" placeholder="Judul Kolom 2..." class="w-full rounded-lg border border-zinc-300 p-2 text-xs font-bold" />
                      <textarea x-model="block.col2Text" rows="2" placeholder="Uraian Kolom 2..." class="w-full rounded-lg border border-zinc-300 p-2 text-xs"></textarea>
                    </div>
                  </div>
                </template>

                <!-- Block Type 6: Quote -->
                <template x-if="block.type === 'quote'">
                  <div class="space-y-2">
                    <div>
                      <label class="block text-[11px] font-bold text-zinc-700 mb-1">Teks Kutipan Pernyataan</label>
                      <textarea x-model="block.quote" rows="2" placeholder="Kutipan komitmen dewan..." class="w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-xs sm:text-sm italic"></textarea>
                    </div>
                    <div>
                      <label class="block text-[11px] font-bold text-zinc-700 mb-1">Nama Tokoh / Pemberi Pernyataan</label>
                      <input type="text" x-model="block.author" placeholder="Banu Lesmana Bagaskara, S.M." class="w-full rounded-lg border border-zinc-300 bg-white p-2 text-xs font-semibold" />
                    </div>
                  </div>
                </template>
              </div>
            </template>
          </div>

          <!-- Bottom Save Actions -->
          <div class="pt-6 border-t border-zinc-100 flex items-center justify-between">
            <button
              type="button"
              @click="currentView = 'list'"
              class="px-4 py-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-xs font-semibold text-zinc-700"
            >
              Batalkan
            </button>
            <div class="flex items-center gap-2">
              <button
                type="button"
                @click="openPreview()"
                class="px-4 py-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-xs font-semibold text-zinc-700"
              >
                Pratinjau Publik
              </button>
              <button
                type="button"
                @click="saveArticle()"
                class="px-6 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm"
              >
                Simpan Laporan
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Live Preview Modal -->
    <div
      x-show="previewModal"
      x-cloak
      class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-zinc-950/80 backdrop-blur-sm"
    >
      <div @click.away="closePreview()" class="bg-white rounded-2xl border border-zinc-200 max-w-3xl w-full max-h-[90vh] flex flex-col overflow-hidden shadow-2xl">
        <div class="px-6 py-4 border-b border-zinc-200 flex items-center justify-between bg-zinc-50">
          <span class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Pratinjau Publik Artikel</span>
          <button @click="closePreview()" class="text-zinc-500 hover:text-zinc-950 p-1">&times;</button>
        </div>
        <div class="p-6 sm:p-8 overflow-y-auto space-y-6 flex-1">
          <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 leading-snug" x-text="form.title"></h1>
          <p class="text-xs text-zinc-500" x-text="form.date + ' • Laporan Kinerja'"></p>
          <p class="text-sm text-zinc-600 leading-relaxed italic" x-text="form.excerpt"></p>
          <img :src="'/' + form.coverImage.replace(/^(\.\.\/)+/, '')" alt="Cover" class="w-full aspect-[16/9] object-cover rounded-xl" />

          <!-- Render Blocks Preview -->
          <div class="space-y-4 pt-4 border-t border-zinc-100">
            <template x-for="b in form.blocks" :key="b.id">
              <div>
                <template x-if="b.type === 'heading'">
                  <h2 class="text-xl font-bold text-zinc-950 mt-4 mb-2" x-text="b.text"></h2>
                </template>
                <template x-if="b.type === 'paragraph'">
                  <p class="text-sm text-zinc-700 leading-relaxed" x-text="b.text"></p>
                </template>
                <template x-if="b.type === 'image'">
                  <figure class="my-4 rounded-xl overflow-hidden border border-zinc-200 bg-zinc-50">
                    <img :src="'/' + (b.url ? b.url.replace(/^(\.\.\/)+/, '') : '')" alt="Doc" class="w-full aspect-[16/9] object-cover" />
                    <figcaption class="text-xs text-zinc-500 text-center p-2 italic" x-text="b.caption"></figcaption>
                  </figure>
                </template>
                <template x-if="b.type === 'list'">
                  <ul class="space-y-2 my-3">
                    <template x-for="li in b.items" :key="li">
                      <li class="flex items-center gap-2 text-sm text-zinc-700">
                        <span class="text-[#BC0202] font-bold">&check;</span>
                        <span x-text="li"></span>
                      </li>
                    </template>
                  </ul>
                </template>
                <template x-if="b.type === 'grid'">
                  <div class="grid grid-cols-2 gap-4 my-4">
                    <div class="p-4 rounded-xl border border-zinc-200 bg-zinc-50">
                      <h4 class="font-bold text-sm text-zinc-950 mb-1" x-text="b.col1Title"></h4>
                      <p class="text-xs text-zinc-600" x-text="b.col1Text"></p>
                    </div>
                    <div class="p-4 rounded-xl border border-zinc-200 bg-zinc-50">
                      <h4 class="font-bold text-sm text-zinc-950 mb-1" x-text="b.col2Title"></h4>
                      <p class="text-xs text-zinc-600" x-text="b.col2Text"></p>
                    </div>
                  </div>
                </template>
                <template x-if="b.type === 'quote'">
                  <blockquote class="my-4 border-l-4 border-[#BC0202] bg-[#faf5f5] p-4 rounded-r-xl">
                    <p class="text-sm italic font-medium text-zinc-900" x-text="'“' + b.quote + '”'"></p>
                    <footer class="text-xs font-bold text-[#BC0202] mt-2" x-text="'— ' + b.author"></footer>
                  </blockquote>
                </template>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function adminKinerja(initialArticles) {
    return {
      mobileMenu: false,
      currentView: 'list',
      searchQuery: '',
      statusFilter: 'all',
      previewModal: false,
      saveSuccessNotification: false,
      notificationTitle: 'Berhasil Disimpan!',
      notificationMessage: 'Perubahan telah disimpan.',
      csrfToken: '{{ csrf_token() }}',

      formMode: 'create',
      currentArticleId: null,
      form: {
        title: '',
        date: '',
        coverImage: 'assets/banu/program_ambulance.jpg',
        excerpt: '',
        isFeatured: false,
        status: 'Terbit',
        blocks: []
      },

      availableCovers: [
        { label: 'Ambulance Siaga 24 Jam', url: 'assets/banu/program_ambulance.jpg' },
        { label: 'Pelatihan UMKM RT/RW', url: 'assets/banu/program_umkm.jpg' },
        { label: 'Dialog Warga Kebon Pedes', url: 'assets/banu/testi_dialog.jpg' },
        { label: 'Foto Parlemen / Sidang', url: 'assets/banu/hero_banu.jpg' },
        { label: 'Rembug Komunitas Warga', url: 'assets/banu/footer_community.jpg' },
        { label: 'Banner Serbaguna Pengabdian', url: 'assets/banu/banner_serbaguna.jpg' }
      ],

      articles: initialArticles || [],

      get filteredArticles() {
        return this.articles.filter(item => {
          const matchesSearch = item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                (item.excerpt || '').toLowerCase().includes(this.searchQuery.toLowerCase());
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
          coverImage: 'assets/banu/program_ambulance.jpg',
          excerpt: '',
          isFeatured: false,
          status: 'Terbit',
          blocks: [
            { id: 'b_' + Date.now() + '_1', type: 'heading', level: 'h2', text: 'Judul Pembuka Laporan Kinerja' },
            { id: 'b_' + Date.now() + '_2', type: 'paragraph', text: 'Tuliskan deskripsi narasi hasil kinerja atau kebijakan yang diperjuangkan di sini...' }
          ]
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
          coverImage: item.coverImage,
          excerpt: item.excerpt,
          isFeatured: item.isFeatured,
          status: item.status,
          blocks: JSON.parse(JSON.stringify(item.blocks || []))
        };
        this.currentView = 'editor';
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },

      async saveArticle() {
        if (!this.form.title.trim()) {
          alert('Judul laporan hasil kinerja wajib diisi!');
          return;
        }

        const url = this.formMode === 'create'
          ? '{{ route("admin.kinerja.store") }}'
          : '/admin/kinerja/' + this.currentArticleId;

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

            // Reload page to get fresh server state
            window.location.reload();
          } else {
            alert('Gagal menyimpan laporan.');
          }
        } catch (e) {
          console.error(e);
          alert('Terjadi kesalahan jaringan.');
        }
      },

      async deleteArticle(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus laporan hasil kinerja ini?')) {
          return;
        }

        try {
          const response = await fetch('/admin/kinerja/' + id, {
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
          const response = await fetch('/admin/kinerja/' + item.id + '/toggle-featured', {
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

      async toggleStatus(item) {
        try {
          const response = await fetch('/admin/kinerja/' + item.id + '/toggle-status', {
            method: 'PATCH',
            headers: {
              'Accept': 'application/json',
              'X-CSRF-TOKEN': this.csrfToken
            }
          });
          const data = await response.json();
          if (data.success) {
            item.status = data.status === 'published' ? 'Terbit' : 'Draf';
          }
        } catch (e) {
          console.error(e);
        }
      },

      addBlock(type) {
        const id = 'block_' + Date.now();
        if (type === 'heading') {
          this.form.blocks.push({ id, type, level: 'h2', text: 'Subjudul Baru' });
        } else if (type === 'paragraph') {
          this.form.blocks.push({ id, type, text: 'Tuliskan paragraf penjelasan rinci mengenai kegiatan atau advokasi yang dilakukan...' });
        } else if (type === 'image') {
          this.form.blocks.push({ id, type, url: 'assets/banu/testi_dialog.jpg', caption: 'Keterangan dokumentasi kegiatan lapangan.' });
        } else if (type === 'list') {
          this.form.blocks.push({ id, type, items: ['Poin rincian capaian pertama', 'Poin rincian capaian kedua'] });
        } else if (type === 'grid') {
          this.form.blocks.push({
            id,
            type,
            columns: '2',
            col1Title: 'Rincian Aspek A',
            col1Text: 'Keterangan ringkas aspek pertama.',
            col2Title: 'Rincian Aspek B',
            col2Text: 'Keterangan ringkas aspek kedua.'
          });
        } else if (type === 'quote') {
          this.form.blocks.push({
            id,
            type,
            quote: 'Tuliskan kutipan pernyataan penting atau janji advokasi rakyat di sini.',
            author: 'Banu Lesmana Bagaskara, S.M.'
          });
        }
      },

      removeBlock(idx) {
        this.form.blocks.splice(idx, 1);
      },

      moveBlockUp(idx) {
        if (idx > 0) {
          const item = this.form.blocks.splice(idx, 1)[0];
          this.form.blocks.splice(idx - 1, 0, item);
        }
      },

      moveBlockDown(idx) {
        if (idx < this.form.blocks.length - 1) {
          const item = this.form.blocks.splice(idx, 1)[0];
          this.form.blocks.splice(idx + 1, 0, item);
        }
      },

      addListItem(block) {
        if (!block.items) block.items = [];
        block.items.push('Poin capaian baru');
      },

      removeListItem(block, lIdx) {
        if (block.items && block.items.length > 1) {
          block.items.splice(lIdx, 1);
        }
      },

      openPreview() {
        this.previewModal = true;
        document.body.style.overflow = 'hidden';
      },

      closePreview() {
        this.previewModal = false;
        document.body.style.overflow = '';
      }
    };
  }
</script>
@endpush
