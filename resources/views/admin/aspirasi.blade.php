@extends('layouts.admin')

@section('title', 'Kotak Aspirasi Warga')

@section('content')
  @php
    $aspirationsJson = $aspirations->values();
  @endphp

  <div
    x-data="adminAspirasi({{ json_encode($aspirationsJson) }})"
    @keydown.escape.window="if (detailModal) detailModal = false; if (deleteModal) deleteModal = false;"
    class="flex-1 flex flex-col"
  >
    <!-- Toast Notification -->
    <div
      x-show="toast.show"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-[-12px]"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-[-12px]"
      x-cloak
      class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border text-xs sm:text-sm font-medium"
      :class="{
        'bg-white text-zinc-900 border-zinc-200 shadow-zinc-200/50': toast.type === 'success',
        'bg-red-50 text-red-900 border-red-200 shadow-red-200/50': toast.type === 'danger',
        'bg-zinc-900 text-white border-zinc-800 shadow-zinc-900/40': toast.type === 'info'
      }"
    >
      <div
        class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0"
        :class="toast.type === 'danger' ? 'bg-red-600 text-white' : 'bg-[#BC0202] text-white'"
      >
        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <span x-text="toast.message"></span>
    </div>

    <!-- Page Header & Hero Subtitle -->
    <header class="bg-white border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-7">
      <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-5">
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold text-zinc-500 mb-1.5">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-900 transition-colors">Dasbor Admin</a>
            <span>&rsaquo;</span>
            <span class="text-[#BC0202]">Kotak Aspirasi</span>
          </div>
          <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">
            Kotak <span class="text-[#BC0202]">Aspirasi</span> &amp; Aduan Warga
          </h1>
          <p class="text-xs sm:text-sm text-zinc-600 mt-1 max-w-2xl leading-relaxed">
            Kelola formulir pengaduan, permohonan layanan publik, dan aspirasi masyarakat dari Dapil Kota Bogor 4 (11 Kelurahan se-Kecamatan Tanah Sareal) yang masuk secara daring.
          </p>
        </div>

        <!-- Header Quick Action: Export CSV -->
        <div class="flex items-center gap-3 shrink-0">
          <a
            href="{{ route('admin.aspirasi.export') }}"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs font-semibold px-4 py-2.5 shadow-2xs transition-colors gap-2"
          >
            <svg class="w-4 h-4 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>Unduh Rekap CSV</span>
          </a>
        </div>
      </div>
    </header>

    <!-- Main Body Workspace -->
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-8 lg:px-10 py-8 space-y-8 flex-1">
      <!-- KPI & STATUS METRICS CARDS -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        <!-- Metric 1: Total Aspirasi -->
        <div
          @click="statusFilter = 'all'"
          class="cursor-pointer rounded-xl border border-zinc-200 bg-white p-5 sm:p-6 shadow-xs hover:border-zinc-300 hover:shadow-sm transition-all"
          :class="statusFilter === 'all' ? 'ring-2 ring-[#BC0202] border-transparent' : ''"
        >
          <div class="flex items-center justify-between">
            <span class="text-xs font-semibold text-zinc-500">Total Masuk</span>
            <span class="w-7 h-7 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
              <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
              </svg>
            </span>
          </div>
          <div class="mt-3 flex items-baseline gap-2">
            <span class="text-2xl sm:text-3xl font-extrabold text-zinc-950 tracking-tight" x-text="countTotal"></span>
            <span class="text-xs text-zinc-600">tiket terdata</span>
          </div>
          <div class="mt-2 text-[11px] text-zinc-600">
            Semua laporan warga tersimpan
          </div>
        </div>

        <!-- Metric 2: Aspirasi Baru -->
        <div
          @click="statusFilter = 'Baru'"
          class="cursor-pointer rounded-xl border border-red-200/90 bg-white p-5 sm:p-6 shadow-xs hover:border-red-300 hover:shadow-sm transition-all"
          :class="statusFilter === 'Baru' ? 'ring-2 ring-[#BC0202] border-transparent bg-red-50/20' : ''"
        >
          <div class="flex items-center justify-between">
            <span class="text-xs font-semibold text-red-800">Perlu Tindakan (Baru)</span>
            <span class="w-7 h-7 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center">
              <span class="w-2 h-2 rounded-full bg-[#BC0202] animate-pulse"></span>
            </span>
          </div>
          <div class="mt-3 flex items-baseline gap-2">
            <span class="text-2xl sm:text-3xl font-extrabold text-[#BC0202] tracking-tight" x-text="countBaru"></span>
            <span class="text-xs text-red-600 font-semibold">belum diproses</span>
          </div>
          <div class="mt-2 text-[11px] text-zinc-600">
            Memerlukan verifikasi &amp; respons cepat
          </div>
        </div>

        <!-- Metric 3: Sedang Ditinjau -->
        <div
          @click="statusFilter = 'Ditinjau'"
          class="cursor-pointer rounded-xl border border-amber-200/90 bg-white p-5 sm:p-6 shadow-xs hover:border-amber-300 hover:shadow-sm transition-all"
          :class="statusFilter === 'Ditinjau' ? 'ring-2 ring-amber-500 border-transparent bg-amber-50/20' : ''"
        >
          <div class="flex items-center justify-between">
            <span class="text-xs font-semibold text-amber-900">Sedang Ditinjau</span>
            <span class="w-7 h-7 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center">
              <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </div>
          <div class="mt-3 flex items-baseline gap-2">
            <span class="text-2xl sm:text-3xl font-extrabold text-amber-950 tracking-tight" x-text="countDitinjau"></span>
            <span class="text-xs text-amber-700 font-medium">proses advokasi</span>
          </div>
          <div class="mt-2 text-[11px] text-zinc-600">
            Koordinasi dinas &amp; survei lapangan
          </div>
        </div>

        <!-- Metric 4: Selesai -->
        <div
          @click="statusFilter = 'Selesai'"
          class="cursor-pointer rounded-xl border border-emerald-200/90 bg-white p-5 sm:p-6 shadow-xs hover:border-emerald-300 hover:shadow-sm transition-all"
          :class="statusFilter === 'Selesai' ? 'ring-2 ring-emerald-600 border-transparent bg-emerald-50/20' : ''"
        >
          <div class="flex items-center justify-between">
            <span class="text-xs font-semibold text-emerald-900">Selesai / Teradvokasi</span>
            <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center">
              <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </span>
          </div>
          <div class="mt-3 flex items-baseline gap-2">
            <span class="text-2xl sm:text-3xl font-extrabold text-emerald-950 tracking-tight" x-text="countSelesai"></span>
            <span class="text-xs text-emerald-700 font-medium">tuntas</span>
          </div>
          <div class="mt-2 text-[11px] text-zinc-600">
            Solusi terealisasi ke masyarakat
          </div>
        </div>
      </div>

      <!-- SEARCH, FILTERS & BATCH ACTIONS TOOLBAR -->
      <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs space-y-4">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
          <!-- Search Bar -->
          <div class="relative flex-1 min-w-0">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-400">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input
              type="text"
              x-model="searchQuery"
              placeholder="Cari nomor tiket (BLB-xxxx), nama warga, telepon, kelurahan, atau isi aspirasi..."
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-zinc-300 bg-white text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] transition-colors shadow-2xs"
            />
          </div>

          <!-- Filter Dropdowns: Kategori & 11 Kelurahan -->
          <div class="flex flex-wrap sm:flex-nowrap items-center gap-3">
            <!-- Dropdown 11 Kelurahan Tanah Sareal -->
            <div class="w-full sm:w-auto">
              <select
                x-model="kelurahanFilter"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              >
                <option value="all">Semua Kelurahan (11 Kelurahan)</option>
                @foreach ($kelurahans as $kel)
                  <option value="{{ $kel }}">{{ $kel }}</option>
                @endforeach
              </select>
            </div>

            <!-- Dropdown Kategori Isu -->
            <div class="w-full sm:w-auto">
              <select
                x-model="categoryFilter"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              >
                <option value="all">Semua Kategori Usulan</option>
                <option value="Infrastruktur & Drainase">Infrastruktur & Drainase</option>
                <option value="Penerangan Jalan (PJU)">Penerangan Jalan (PJU)</option>
                <option value="UMKM & Usaha Warga">UMKM & Usaha Warga</option>
                <option value="Layanan Ambulance Siaga">Layanan Ambulance Siaga</option>
                <option value="Lingkungan Hidup & Kebencanaan">Lingkungan & Bencana</option>
                <option value="Pendidikan & Beasiswa">Pendidikan & Beasiswa</option>
                <option value="Pemuda & Olahraga">Pemuda & Olahraga</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Status Tabs & Batch Actions Row -->
        <div class="pt-3 border-t border-zinc-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
          <!-- Status Buttons (Strictly No Pill) -->
          <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0 text-xs font-semibold">
            <button
              type="button"
              @click="statusFilter = 'all'"
              class="px-3 py-1.5 rounded-lg transition-colors shrink-0"
              :class="statusFilter === 'all' ? 'bg-zinc-900 text-white' : 'bg-zinc-100 text-zinc-600 hover:text-zinc-900 hover:bg-zinc-200'"
            >
              Semua (<span x-text="countTotal"></span>)
            </button>
            <button
              type="button"
              @click="statusFilter = 'Baru'"
              class="px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5 shrink-0"
              :class="statusFilter === 'Baru' ? 'bg-[#BC0202] text-white' : 'bg-red-50 text-red-700 hover:bg-red-100'"
            >
              <span class="w-1.5 h-1.5 rounded-full" :class="statusFilter === 'Baru' ? 'bg-white' : 'bg-[#BC0202]'"></span>
              <span>Baru (<span x-text="countBaru"></span>)</span>
            </button>
            <button
              type="button"
              @click="statusFilter = 'Ditinjau'"
              class="px-3 py-1.5 rounded-lg transition-colors shrink-0"
              :class="statusFilter === 'Ditinjau' ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-800 hover:bg-amber-100'"
            >
              Ditinjau (<span x-text="countDitinjau"></span>)
            </button>
            <button
              type="button"
              @click="statusFilter = 'Selesai'"
              class="px-3 py-1.5 rounded-lg transition-colors shrink-0"
              :class="statusFilter === 'Selesai' ? 'bg-emerald-700 text-white' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100'"
            >
              Selesai (<span x-text="countSelesai"></span>)
            </button>
          </div>

          <!-- Batch Action Buttons -->
          <div x-show="selectedIds.length > 0" x-cloak class="flex items-center gap-2">
            <span class="text-xs text-zinc-500 font-medium">
              <span class="font-bold text-zinc-900" x-text="selectedIds.length"></span> dipilih:
            </span>
            <button
              type="button"
              @click="batchDelete()"
              class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-semibold shadow-2xs transition-colors"
            >
              <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              <span>Hapus Massal</span>
            </button>
          </div>
        </div>
      </div>

      <!-- ASPIRATION DATA TABLE (DESKTOP) -->
      <div class="rounded-xl border border-zinc-200 bg-white shadow-xs overflow-hidden">
        <div class="hidden md:block overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="border-b border-zinc-200 bg-[#fafafa] text-[11px] font-bold uppercase tracking-wider text-zinc-500">
                <th class="py-3.5 pl-5 pr-2 w-10">
                  <input
                    type="checkbox"
                    x-model="selectAll"
                    @change="toggleSelectAll()"
                    class="rounded border-zinc-300 text-[#BC0202] focus:ring-[#BC0202] focus:ring-offset-0"
                  />
                </th>
                <th class="py-3.5 px-4 font-semibold">Tiket &amp; Waktu</th>
                <th class="py-3.5 px-4 font-semibold">Pelapor &amp; Wilayah</th>
                <th class="py-3.5 px-4 font-semibold">Perihal &amp; Kategori</th>
                <th class="py-3.5 px-4 font-semibold">Status</th>
                <th class="py-3.5 pl-4 pr-5 font-semibold text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 text-xs">
              <template x-for="item in filteredAspirations" :key="item.id">
                <tr class="hover:bg-zinc-50/80 transition-colors group">
                  <td class="py-4 pl-5 pr-2">
                    <input
                      type="checkbox"
                      :value="item.id"
                      x-model="selectedIds"
                      class="rounded border-zinc-300 text-[#BC0202] focus:ring-[#BC0202] focus:ring-offset-0"
                    />
                  </td>

                  <td class="py-4 px-4 whitespace-nowrap">
                    <div class="flex flex-col">
                      <span class="font-mono font-bold text-xs text-zinc-950" x-text="item.ticket"></span>
                      <span class="text-[11px] text-zinc-600 mt-1" x-text="item.date"></span>
                    </div>
                  </td>

                  <td class="py-4 px-4 min-w-[200px]">
                    <div class="flex flex-col">
                      <div class="flex items-center gap-2">
                        <span class="font-bold text-zinc-900" x-text="item.sender"></span>
                        <a
                          :href="item.waUrl"
                          target="_blank"
                          rel="noopener"
                          title="Buka Chat WhatsApp Warga"
                          class="text-emerald-600 hover:text-emerald-700 p-0.5 rounded transition-colors"
                        >
                          <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.586 1.838.878 2.796.878 3.18 0 5.766-2.586 5.766-5.766 0-3.18-2.586-5.765-5.766-5.765zm0 10.334c-.886 0-1.748-.256-2.493-.739l-.178-.115-1.579.414.421-1.538-.117-.187c-.52-.829-.795-1.789-.795-2.775 0-2.827 2.301-5.127 5.13-5.127 2.828 0 5.129 2.3 5.129 5.127 0 2.828-2.301 5.128-5.129 5.128z" />
                          </svg>
                        </a>
                      </div>
                      <span class="text-[11px] text-zinc-600 mt-0.5">
                        <span class="font-medium text-zinc-700" x-text="item.kelurahan"></span> &bull; <span x-text="item.phone"></span>
                      </span>
                    </div>
                  </td>

                  <td class="py-4 px-4 max-w-sm">
                    <div class="flex flex-col">
                      <span class="font-bold text-zinc-950 truncate" x-text="item.subject"></span>
                      <span class="text-[11px] text-zinc-600 truncate mt-0.5" x-text="item.description"></span>
                      <div class="mt-1.5 flex items-center gap-2">
                        <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-600" x-text="item.category"></span>
                      </div>
                    </div>
                  </td>

                  <td class="py-4 px-4 whitespace-nowrap">
                    <span
                      class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold border"
                      :class="{
                        'bg-red-50 text-[#BC0202] border-red-200': item.status === 'Baru',
                        'bg-amber-50 text-amber-800 border-amber-200': item.status === 'Ditinjau',
                        'bg-emerald-50 text-emerald-800 border-emerald-200': item.status === 'Selesai'
                      }"
                    >
                      <span
                        class="w-1.5 h-1.5 rounded-full"
                        :class="{
                          'bg-[#BC0202]': item.status === 'Baru',
                          'bg-amber-500': item.status === 'Ditinjau',
                          'bg-emerald-600': item.status === 'Selesai'
                        }"
                      ></span>
                      <span x-text="item.status"></span>
                    </span>
                  </td>

                  <td class="py-4 pl-4 pr-5 text-right whitespace-nowrap">
                    <div class="flex items-center justify-end gap-1.5">
                      <button
                        type="button"
                        @click="openDetail(item)"
                        class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-700 text-xs font-semibold shadow-2xs transition-colors"
                        title="Buka Inspeksi & Disposisi Aspirasi"
                      >
                        <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Detail</span>
                      </button>

                      <a
                        :href="item.waUrl"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center p-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 text-zinc-600 text-xs font-medium shadow-2xs transition-colors"
                        title="Chat WhatsApp Warga"
                      >
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                          <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                        </svg>
                      </a>

                      <button
                        type="button"
                        @click="promptDelete(item.id)"
                        class="p-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-red-50 hover:text-red-700 hover:border-red-200 text-zinc-400 text-xs transition-colors"
                        title="Hapus Aspirasi"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>

        <!-- Mobile Card View -->
        <div class="md:hidden divide-y divide-zinc-200">
          <template x-for="item in filteredAspirations" :key="item.id">
            <div class="p-5 space-y-3 hover:bg-zinc-50 transition-colors">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <span class="font-mono font-bold text-xs text-zinc-950" x-text="item.ticket"></span>
                  <span class="text-[11px] text-zinc-600 block mt-0.5" x-text="item.date"></span>
                </div>
                <span
                  class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[10px] font-bold border"
                  :class="{
                    'bg-red-50 text-[#BC0202] border-red-200': item.status === 'Baru',
                    'bg-amber-50 text-amber-800 border-amber-200': item.status === 'Ditinjau',
                    'bg-emerald-50 text-emerald-800 border-emerald-200': item.status === 'Selesai'
                  }"
                  x-text="item.status"
                ></span>
              </div>

              <div class="text-xs">
                <div class="font-bold text-zinc-900" x-text="item.sender"></div>
                <div class="text-[11px] text-zinc-600 mt-0.5">
                  <span class="font-medium text-zinc-800" x-text="item.kelurahan"></span> &bull; <span x-text="item.phone"></span>
                </div>
              </div>

              <div>
                <h3 class="text-xs font-bold text-zinc-950" x-text="item.subject"></h3>
                <p class="text-xs text-zinc-600 mt-1 line-clamp-2 leading-relaxed" x-text="item.description"></p>
                <div class="mt-2 flex items-center gap-2">
                  <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-600" x-text="item.category"></span>
                </div>
              </div>

              <div class="pt-3 border-t border-zinc-100 flex items-center justify-between gap-2">
                <a
                  :href="item.waUrl"
                  target="_blank"
                  rel="noopener"
                  class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-800 hover:bg-emerald-100 text-xs font-semibold transition-colors"
                >
                  <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.586 1.838.878 2.796.878 3.18 0 5.766-2.586 5.766-5.766 0-3.18-2.586-5.765-5.766-5.765zm0 10.334c-.886 0-1.748-.256-2.493-.739l-.178-.115-1.579.414.421-1.538-.117-.187c-.52-.829-.795-1.789-.795-2.775 0-2.827 2.301-5.127 5.13-5.127 2.828 0 5.129 2.3 5.129 5.127 0 2.828-2.301 5.128-5.129 5.128z" />
                  </svg>
                  <span>WhatsApp</span>
                </a>

                <div class="flex items-center gap-2">
                  <button
                    type="button"
                    @click="openDetail(item)"
                    class="px-3 py-1.5 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold transition-colors"
                  >
                    Detail &amp; Disposisi
                  </button>
                  <button
                    type="button"
                    @click="promptDelete(item.id)"
                    class="p-1.5 rounded-lg border border-zinc-200 text-zinc-400 hover:text-red-700 hover:bg-red-50 transition-colors"
                  >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </template>
        </div>

        <!-- Empty State -->
        <div x-show="filteredAspirations.length === 0" class="text-center py-16 px-6">
          <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-400 flex items-center justify-center mx-auto mb-3">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
          </div>
          <h3 class="text-sm font-bold text-zinc-900">Tidak ada aspirasi yang cocok</h3>
          <p class="text-xs text-zinc-500 mt-1 max-w-sm mx-auto">
            Coba sesuaikan kata kunci pencarian atau ubah filter kelurahan dan kategori untuk menampilkan data lainnya.
          </p>
        </div>
      </div>
    </div>

    <!-- DETAIL INSPECTION & DISPOSITION MODAL -->
    <div
      x-show="detailModal"
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto bg-zinc-950/60 backdrop-blur-sm flex items-center justify-center p-4 sm:p-6"
    >
      <div
        @click.away="detailModal = false"
        class="w-full max-w-3xl rounded-2xl bg-white border border-zinc-200 shadow-2xl overflow-hidden flex flex-col max-h-[90vh]"
      >
        <!-- Modal Header -->
        <div class="px-6 py-5 border-b border-zinc-200 bg-[#fafafa] flex items-center justify-between gap-4 shrink-0">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center shrink-0">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-mono font-bold text-sm text-zinc-950" x-text="selectedAspiration?.ticket"></span>
                <span class="text-xs text-zinc-400">&bull;</span>
                <span class="text-xs text-zinc-500" x-text="selectedAspiration?.date"></span>
              </div>
              <h2 class="text-base font-bold text-zinc-950 tracking-tight mt-0.5" x-text="selectedAspiration?.subject"></h2>
            </div>
          </div>

          <button
            type="button"
            @click="detailModal = false"
            class="p-2 rounded-lg text-zinc-400 hover:text-zinc-700 hover:bg-zinc-100 transition-colors"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto space-y-6 text-xs sm:text-sm">
          <!-- Section 1: Profil Pelapor & Kontak -->
          <div class="rounded-xl border border-zinc-200 bg-[#fafafa] p-4 sm:p-5">
            <div class="flex items-center justify-between mb-3 border-b border-zinc-200/80 pb-2.5">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Informasi Pelapor</span>
              <a
                :href="selectedAspiration?.waUrl"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-2xs transition-colors"
              >
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                  <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.586 1.838.878 2.796.878 3.18 0 5.766-2.586 5.766-5.766 0-3.18-2.586-5.765-5.766-5.765zm0 10.334c-.886 0-1.748-.256-2.493-.739l-.178-.115-1.579.414.421-1.538-.117-.187c-.52-.829-.795-1.789-.795-2.775 0-2.827 2.301-5.127 5.13-5.127 2.828 0 5.129 2.3 5.129 5.127 0 2.828-2.301 5.128-5.129 5.128z" />
                </svg>
                <span>Buka WhatsApp Warga</span>
              </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <span class="text-[11px] text-zinc-600 block">Nama Lengkap:</span>
                <span class="font-bold text-zinc-950 text-xs sm:text-sm mt-0.5 block" x-text="selectedAspiration?.sender"></span>
              </div>
              <div>
                <span class="text-[11px] text-zinc-600 block">Nomor Telepon / WhatsApp:</span>
                <span class="font-semibold text-zinc-950 text-xs sm:text-sm mt-0.5 block font-mono" x-text="selectedAspiration?.phone"></span>
              </div>
              <div class="sm:col-span-2">
                <span class="text-[11px] text-zinc-600 block">Alamat Tinggal / Lokasi:</span>
                <span class="font-medium text-zinc-900 text-xs sm:text-sm mt-0.5 block leading-relaxed" x-text="selectedAspiration?.address"></span>
                <span class="inline-block mt-1.5 text-[10px] font-bold px-2 py-0.5 rounded bg-zinc-200 text-zinc-800" x-text="'Kelurahan ' + selectedAspiration?.kelurahan"></span>
              </div>
            </div>
          </div>

          <!-- Section 2: Isi Pengaduan -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Isi Pengaduan / Aspirasi Warga</span>
              <span class="text-xs font-semibold px-2 py-0.5 rounded bg-zinc-100 text-zinc-700" x-text="selectedAspiration?.category"></span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl border border-zinc-200 bg-white leading-relaxed text-zinc-800 text-xs sm:text-sm whitespace-pre-line shadow-2xs" x-text="selectedAspiration?.description"></div>
          </div>

          <!-- Section 3: Disposisi Status & Catatan -->
          <div class="rounded-xl border border-zinc-200 bg-white p-4 sm:p-5 shadow-2xs space-y-4">
            <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block">Tindak Lanjut &amp; Catatan Internal Staf</span>

            <!-- Status Selector -->
            <div>
              <label class="block text-xs font-bold text-zinc-800 mb-1.5">Ubah Status Tiket:</label>
              <div class="grid grid-cols-3 gap-3">
                <button
                  type="button"
                  @click="statusDraft = 'Baru'"
                  class="border rounded-lg p-2.5 flex items-center justify-center gap-2 text-xs font-bold transition-all text-center"
                  :class="statusDraft === 'Baru' ? 'border-[#BC0202] bg-red-50 text-[#BC0202] ring-1 ring-[#BC0202]' : 'border-zinc-200 hover:bg-zinc-50 text-zinc-700'"
                >
                  <span class="w-2 h-2 rounded-full bg-[#BC0202]"></span>
                  <span>Baru</span>
                </button>

                <button
                  type="button"
                  @click="statusDraft = 'Ditinjau'"
                  class="border rounded-lg p-2.5 flex items-center justify-center gap-2 text-xs font-bold transition-all text-center"
                  :class="statusDraft === 'Ditinjau' ? 'border-amber-500 bg-amber-50 text-amber-900 ring-1 ring-amber-500' : 'border-zinc-200 hover:bg-zinc-50 text-zinc-700'"
                >
                  <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                  <span>Ditinjau</span>
                </button>

                <button
                  type="button"
                  @click="statusDraft = 'Selesai'"
                  class="border rounded-lg p-2.5 flex items-center justify-center gap-2 text-xs font-bold transition-all text-center"
                  :class="statusDraft === 'Selesai' ? 'border-emerald-600 bg-emerald-50 text-emerald-900 ring-1 ring-emerald-600' : 'border-zinc-200 hover:bg-zinc-50 text-zinc-700'"
                >
                  <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                  <span>Selesai</span>
                </button>
              </div>
            </div>

            <!-- New Internal Note Input -->
            <div>
              <label class="block text-xs font-bold text-zinc-800 mb-1.5">Tambah Catatan Disposisi / Hasil Lapangan:</label>
              <textarea
                x-model="newNote"
                rows="3"
                placeholder="Tuliskan catatan tindak lanjut..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
              ></textarea>
            </div>

            <!-- Riwayat Catatan -->
            <div x-show="selectedAspiration?.notes && selectedAspiration?.notes.length > 0" class="pt-3 border-t border-zinc-100">
              <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-2">Riwayat Catatan Sebelumnya</span>
              <div class="space-y-2.5 max-h-48 overflow-y-auto pr-1">
                <template x-for="(note, nIdx) in selectedAspiration?.notes" :key="nIdx">
                  <div class="p-3 rounded-lg bg-zinc-50 border border-zinc-200 text-xs">
                    <div class="flex items-center justify-between text-[11px] text-zinc-500 mb-1">
                      <span class="font-bold text-zinc-800" x-text="note.author"></span>
                      <span x-text="note.date"></span>
                    </div>
                    <p class="text-zinc-700 leading-relaxed" x-text="note.text"></p>
                  </div>
                </template>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Footer Actions -->
        <div class="px-6 py-4 border-t border-zinc-200 bg-[#fafafa] flex items-center justify-between gap-3 shrink-0">
          <button
            type="button"
            @click="detailModal = false"
            class="px-4 py-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-100 text-xs font-semibold text-zinc-700 transition-colors"
          >
            Tutup
          </button>

          <button
            type="button"
            @click="saveModalChanges()"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-5 py-2 shadow-sm transition-colors gap-1.5"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Simpan Pembaruan</span>
          </button>
        </div>
      </div>
    </div>

    <!-- DELETE CONFIRMATION MODAL -->
    <div
      x-show="deleteModal"
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto bg-zinc-950/60 backdrop-blur-sm flex items-center justify-center p-4"
    >
      <div
        @click.away="deleteModal = false"
        class="w-full max-w-md rounded-2xl bg-white border border-zinc-200 shadow-2xl p-6 text-center"
      >
        <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4">
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-zinc-950">Hapus Aspirasi Ini?</h3>
        <p class="text-xs text-zinc-600 mt-2 leading-relaxed">
          Apakah Anda yakin ingin menghapus tiket aduan warga ini? Data yang telah dihapus tidak dapat dipulihkan kembali dari sistem.
        </p>
        <div class="mt-6 flex items-center justify-center gap-3">
          <button
            type="button"
            @click="deleteModal = false; targetDeleteId = null;"
            class="px-4 py-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-100 text-xs font-semibold text-zinc-700 transition-colors"
          >
            Batal
          </button>
          <button
            type="button"
            @click="confirmDelete()"
            class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-semibold shadow-sm transition-colors"
          >
            Ya, Hapus Data
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function adminAspirasi(initialAspirations) {
      return {
        searchQuery: '',
        statusFilter: 'all',
        categoryFilter: 'all',
        kelurahanFilter: 'all',
        selectedIds: [],
        selectAll: false,
        csrfToken: '{{ csrf_token() }}',

        detailModal: false,
        deleteModal: false,
        targetDeleteId: null,
        selectedAspiration: null,

        newNote: '',
        statusDraft: 'Baru',

        toast: {
          show: false,
          message: '',
          type: 'success'
        },

        triggerToast(msg, type = 'success') {
          this.toast.message = msg;
          this.toast.type = type;
          this.toast.show = true;
          setTimeout(() => {
            this.toast.show = false;
          }, 3500);
        },

        aspirations: initialAspirations || [],

        get filteredAspirations() {
          return this.aspirations.filter((item) => {
            const matchStatus = this.statusFilter === 'all' || item.status === this.statusFilter;
            const matchCategory = this.categoryFilter === 'all' || item.category === this.categoryFilter;
            const matchKelurahan = this.kelurahanFilter === 'all' || item.kelurahan === this.kelurahanFilter;

            const query = this.searchQuery.trim().toLowerCase();
            const matchQuery =
              query === '' ||
              item.ticket.toLowerCase().includes(query) ||
              item.sender.toLowerCase().includes(query) ||
              item.phone.toLowerCase().includes(query) ||
              item.address.toLowerCase().includes(query) ||
              item.subject.toLowerCase().includes(query) ||
              item.description.toLowerCase().includes(query);

            return matchStatus && matchCategory && matchKelurahan && matchQuery;
          });
        },

        get countTotal() {
          return this.aspirations.length;
        },
        get countBaru() {
          return this.aspirations.filter((a) => a.status === 'Baru').length;
        },
        get countDitinjau() {
          return this.aspirations.filter((a) => a.status === 'Ditinjau').length;
        },
        get countSelesai() {
          return this.aspirations.filter((a) => a.status === 'Selesai').length;
        },

        openDetail(item) {
          this.selectedAspiration = JSON.parse(JSON.stringify(item));
          this.statusDraft = item.status;
          this.newNote = '';
          this.detailModal = true;
        },

        async saveModalChanges() {
          if (!this.selectedAspiration) return;

          const aspId = this.selectedAspiration.id;

          // 1. If status changed, call API
          if (this.selectedAspiration.status !== this.statusDraft) {
            try {
              const res = await fetch('/admin/aspirasi/' + aspId + '/status', {
                method: 'PATCH',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({ status: this.statusDraft })
              });
              const data = await res.json();
              if (data.success) {
                const idx = this.aspirations.findIndex(a => a.id === aspId);
                if (idx !== -1) {
                  this.aspirations[idx].status = this.statusDraft;
                }
              }
            } catch (e) {
              console.error(e);
            }
          }

          // 2. If new note added, call API
          if (this.newNote.trim() !== '') {
            try {
              const res = await fetch('/admin/aspirasi/' + aspId + '/notes', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({ note: this.newNote.trim() })
              });
              const data = await res.json();
              if (data.success) {
                const idx = this.aspirations.findIndex(a => a.id === aspId);
                if (idx !== -1) {
                  this.aspirations[idx].notes.unshift(data.note);
                }
              }
            } catch (e) {
              console.error(e);
            }
          }

          this.triggerToast(`Pembaruan tiket ${this.selectedAspiration.ticket} berhasil disimpan.`);
          this.detailModal = false;
        },

        toggleSelectAll() {
          if (this.selectAll) {
            this.selectedIds = this.filteredAspirations.map((a) => a.id);
          } else {
            this.selectedIds = [];
          }
        },

        promptDelete(id) {
          this.targetDeleteId = id;
          this.deleteModal = true;
        },

        async confirmDelete() {
          if (this.targetDeleteId !== null) {
            try {
              const res = await fetch('/admin/aspirasi/' + this.targetDeleteId, {
                method: 'DELETE',
                headers: {
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': this.csrfToken
                }
              });
              const data = await res.json();
              if (data.success) {
                this.aspirations = this.aspirations.filter(a => a.id !== this.targetDeleteId);
                this.triggerToast(data.message, 'danger');
              }
            } catch (e) {
              console.error(e);
            }
            this.targetDeleteId = null;
          }
          this.deleteModal = false;
        },

        async batchDelete() {
          if (this.selectedIds.length === 0) return;
          if (!confirm(`Hapus ${this.selectedIds.length} data aspirasi terpilih?`)) return;

          try {
            const res = await fetch('{{ route("admin.aspirasi.bulk-delete") }}', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken
              },
              body: JSON.stringify({ ids: this.selectedIds })
            });
            const data = await res.json();
            if (data.success) {
              this.aspirations = this.aspirations.filter(a => !this.selectedIds.includes(a.id));
              this.triggerToast(data.message, 'danger');
              this.selectedIds = [];
              this.selectAll = false;
            }
          } catch (e) {
            console.error(e);
          }
        }
      };
    }
  </script>
@endsection
