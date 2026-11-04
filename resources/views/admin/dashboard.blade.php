@extends('layouts.admin')

@section('title', 'Ringkasan Dasbor')

@section('content')
  <div class="p-6 sm:p-8 lg:p-10 space-y-8 max-w-7xl mx-auto">
    <!-- Header Hero -->
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-zinc-200">
      <div>
        <span class="text-xs font-bold text-[#BC0202] uppercase tracking-wider block mb-1">Beranda Dasbor Administrasi</span>
        <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">Ringkasan Pengelolaan Portal</h1>
        <p class="text-xs sm:text-sm text-zinc-600 mt-1">Pantau aspirasi warga, kelola artikel kinerja, siaran pers, dan dokumentasi kegiatan.</p>
      </div>

      <div class="flex items-center gap-2.5">
        <a href="{{ route('admin.kinerja.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm transition-colors">
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span>Tulis Hasil Kinerja</span>
        </a>
        <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs font-semibold shadow-2xs transition-colors">
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span>Tambah Berita</span>
        </a>
      </div>
    </header>

    <!-- 4 KPI Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <!-- Metric 1: Aspirasi Masuk -->
      <a href="{{ route('admin.aspirasi.index') }}" class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
        <div>
          <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Kotak Aspirasi</span>
            <span class="px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] text-[11px] font-bold">{{ $metrics['newAspirations'] }} Baru</span>
          </div>
          <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">{{ $metrics['totalAspirations'] }}</div>
          <p class="text-xs text-zinc-500 mt-1">Total pengaduan &amp; usulan warga</p>
        </div>
        <div class="mt-4 pt-3 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
          <span>Buka Kotak Aspirasi</span>
          <span>&rarr;</span>
        </div>
      </a>

      <!-- Metric 2: Hasil Kinerja -->
      <a href="{{ route('admin.kinerja.index') }}" class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
        <div>
          <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Hasil Kinerja</span>
            <span class="px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-700 text-[11px] font-semibold">Kanvas Blok</span>
          </div>
          <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">{{ $metrics['totalReports'] }}</div>
          <p class="text-xs text-zinc-500 mt-1">{{ $metrics['publishedReports'] }} laporan terbit di publik</p>
        </div>
        <div class="mt-4 pt-3 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
          <span>Kelola Artikel Kinerja</span>
          <span>&rarr;</span>
        </div>
      </a>

      <!-- Metric 3: Berita Resmi -->
      <a href="{{ route('admin.berita.index') }}" class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
        <div>
          <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Rilis Berita</span>
            <span class="px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-700 text-[11px] font-semibold">5 Input Wajib</span>
          </div>
          <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">{{ $metrics['totalNews'] }}</div>
          <p class="text-xs text-zinc-500 mt-1">Siaran pers dan kabar kegiatan</p>
        </div>
        <div class="mt-4 pt-3 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
          <span>Kelola Siaran Berita</span>
          <span>&rarr;</span>
        </div>
      </a>

      <!-- Metric 4: Album Galeri -->
      <a href="{{ route('admin.galeri.index') }}" class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
        <div>
          <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Galeri Album</span>
            <span class="px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-700 text-[11px] font-semibold">Photo Theater</span>
          </div>
          <div class="text-3xl font-extrabold text-zinc-950 tracking-tight">{{ $metrics['totalAlbums'] }}</div>
          <p class="text-xs text-zinc-500 mt-1">Album dokumentasi aksi warga</p>
        </div>
        <div class="mt-4 pt-3 border-t border-zinc-100 flex items-center justify-between text-xs font-semibold text-[#BC0202]">
          <span>Kelola Galeri Foto</span>
          <span>&rarr;</span>
        </div>
      </a>
    </div>

    <!-- Recent Aspirations Table -->
    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-4">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Aspirasi Warga Terbaru</h2>
          <p class="text-xs text-zinc-500">5 pengaduan dan usulan terkini yang masuk dari formulir publik</p>
        </div>
        <a href="{{ route('admin.aspirasi.index') }}" class="text-xs font-bold text-[#BC0202] hover:underline">
          Lihat Semua Aspirasi &rarr;
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead>
            <tr class="border-b border-zinc-200 text-zinc-500 uppercase tracking-wider">
              <th class="py-3 px-3">No. Tiket</th>
              <th class="py-3 px-3">Pelapor</th>
              <th class="py-3 px-3">Kelurahan</th>
              <th class="py-3 px-3">Perihal / Subjek</th>
              <th class="py-3 px-3">Status</th>
              <th class="py-3 px-3 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-zinc-100">
            @forelse ($recentAspirations as $asp)
              <tr class="hover:bg-zinc-50 transition-colors">
                <td class="py-3 px-3 font-mono font-bold text-[#BC0202]">{{ $asp->ticket_number }}</td>
                <td class="py-3 px-3 font-semibold text-zinc-950">{{ $asp->sender_name }}</td>
                <td class="py-3 px-3 text-zinc-600">{{ $asp->kelurahan ?? '-' }}</td>
                <td class="py-3 px-3 text-zinc-800 max-w-xs truncate">{{ $asp->subject }}</td>
                <td class="py-3 px-3">
                  <span class="inline-block px-2.5 py-0.5 rounded-md text-[11px] font-bold {{ $asp->status->badgeClasses() }}">
                    {{ $asp->status->value }}
                  </span>
                </td>
                <td class="py-3 px-3 text-right">
                  <a href="{{ route('admin.aspirasi.index') }}" class="text-xs font-semibold text-[#BC0202] hover:underline">
                    Periksa
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="py-8 text-center text-zinc-500">Belum ada aspirasi warga yang masuk.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Recent Audit Logs -->
    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-4">
      <h2 class="text-base sm:text-lg font-bold text-zinc-950">Catatan Aktivitas Sistem (Audit Trail)</h2>
      <div class="space-y-3">
        @forelse ($recentActivities as $log)
          <div class="flex items-start justify-between gap-4 text-xs py-2 border-b border-zinc-100 last:border-0">
            <div class="space-y-0.5">
              <span class="font-bold text-zinc-900">[{{ $log->action }}]</span>
              <span class="text-zinc-600">{{ $log->description }}</span>
            </div>
            <span class="text-[11px] text-zinc-400 font-mono shrink-0">{{ $log->created_at ? $log->created_at->diffForHumans() : '-' }}</span>
          </div>
        @empty
          <p class="text-xs text-zinc-500 py-4">Belum ada catatan aktivitas sistem.</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection
