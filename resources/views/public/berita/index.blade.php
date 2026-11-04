@extends('layouts.public')

@section('title', 'Berita & Rilis Pers Resmi | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', 'Siaran pers resmi, kabar reses, liputan media, dan pernyataan publik anggota DPRD Kota Bogor Fraksi PDI Perjuangan Banu Lesmana Bagaskara, S.M.')

@section('content')
  <!-- Header Hero -->
  <section class="w-full bg-[#faf5f5] py-14 sm:py-18 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="max-w-3xl">
        <span class="text-xs font-bold text-[#BC0202] uppercase tracking-wider block mb-2">Media &amp; Publikasi</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-zinc-950 tracking-tight leading-tight">
          Berita &amp; <span class="text-[#BC0202]">Rilis Pers</span> Resmi
        </h1>
        <p class="text-xs sm:text-sm text-zinc-600 mt-4 leading-relaxed">
          Kumpulan siaran pers resmi, kabar kegiatan penyerapan aspirasi, bakti sosial kemasyarakatan, serta liputan media kedewanan Banu Lesmana Bagaskara di Kota Bogor.
        </p>
      </div>
    </div>
  </section>

  <!-- Featured News Banner (if exists) -->
  @if ($featuredNews)
    <section class="w-full bg-white py-12 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-2xl border border-zinc-200 bg-[#fafafa] p-6 sm:p-8 shadow-xs">
          <div class="lg:col-span-7 space-y-4">
            <div class="flex items-center gap-2 text-xs font-semibold text-[#BC0202]">
              <span class="px-2.5 py-0.5 rounded-md bg-red-100 font-bold">Berita Utama</span>
              <span>&bull;</span>
              <span class="text-zinc-500">{{ $featuredNews->published_at ? $featuredNews->published_at->translatedFormat('d F Y') : '-' }}</span>
              <span>&bull;</span>
              <span class="text-zinc-700 font-medium">{{ $featuredNews->source }}</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold text-zinc-950 leading-snug tracking-tight">
              {{ $featuredNews->title }}
            </h2>
            <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed line-clamp-3">
              {{ Str::limit(strip_tags($featuredNews->description), 200) }}
            </p>
            <div class="pt-2">
              <a href="{{ route('berita.show', $featuredNews->slug) }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold shadow-sm transition-colors">
                <span>Baca Selengkapnya</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>
          <div class="lg:col-span-5 rounded-xl overflow-hidden aspect-[16/10] bg-zinc-200">
            <img src="{{ asset($featuredNews->cover_image) }}" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- News Grid Catalog (5 Mandatory Inputs) -->
  <section class="w-full bg-[#f4f4f5] py-16 sm:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="mb-10">
        <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight">Arsip Rilis &amp; Kabar Terkini</h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($newsList as $item)
          <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
            <div class="aspect-[16/10] w-full bg-zinc-100 overflow-hidden relative">
              <img src="{{ asset($item->cover_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
            </div>
            <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
              <div>
                <div class="flex items-center text-[11px] font-medium text-zinc-500 mb-2 gap-2">
                  <span>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}</span>
                  <span>&bull;</span>
                  <span class="text-[#BC0202] font-semibold truncate">{{ $item->source }}</span>
                </div>
                <h3 class="font-bold text-base sm:text-lg text-zinc-950 leading-snug tracking-tight group-hover:text-[#BC0202] transition-colors line-clamp-2">
                  <a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a>
                </h3>
                <p class="text-xs text-zinc-600 mt-2.5 leading-relaxed line-clamp-3">
                  {{ Str::limit(strip_tags($item->description), 160) }}
                </p>
              </div>

              <div class="mt-5 pt-4 border-t border-zinc-100 flex items-center justify-between">
                <span class="text-[11px] text-zinc-400 font-medium">{{ $item->view_count }}x dibaca</span>
                <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#BC0202] hover:underline">
                  <span>Baca Selengkapnya</span>
                  <span>&rarr;</span>
                </a>
              </div>
            </div>
          </article>
        @empty
          <div class="col-span-full py-16 text-center text-zinc-500">
            <p>Belum ada rilis berita yang dipublikasikan.</p>
          </div>
        @endforelse
      </div>

      <div class="mt-10">
        {{ $newsList->links() }}
      </div>
    </div>
  </section>
@endsection
