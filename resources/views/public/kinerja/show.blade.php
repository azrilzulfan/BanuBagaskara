@extends('layouts.public')

@section('title', $report->title . ' | Hasil Kinerja Banu Bagaskara')
@section('meta_description', Str::limit($report->excerpt, 155))
@section('og_image', asset($report->cover_image ?? 'assets/banu/program_ambulance.jpg'))
@section('og_type', 'article')

@push('schema')
<script type="application/ld+json">
{
  "{{ '@context' }}": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "{{ addslashes($report->title) }}",
  "image": ["{{ asset($report->cover_image ?? 'assets/banu/program_ambulance.jpg') }}"],
  "datePublished": "{{ $report->published_at ? $report->published_at->toIso8601String() : $report->created_at->toIso8601String() }}",
  "dateModified": "{{ $report->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "Banu Lesmana Bagaskara, S.M.",
    "url": "{{ url('/') }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Fraksi PDI Perjuangan DPRD Kota Bogor",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('assets/banu/hero_banu.jpg') }}"
    }
  },
  "description": "{{ addslashes($report->excerpt) }}"
}
</script>
@endpush

@section('content')
  <article class="w-full bg-white py-12 sm:py-16 border-b border-zinc-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Breadcrumb -->
      <nav class="flex items-center gap-2 text-xs text-zinc-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-zinc-950 transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('kinerja.index') }}" class="hover:text-zinc-950 transition-colors">Hasil Kinerja</a>
        <span>/</span>
        <span class="text-zinc-950 truncate max-w-[200px] sm:max-w-none">{{ $report->title }}</span>
      </nav>

      <!-- Article Header -->
      <header class="space-y-4 mb-8">
        <div class="flex items-center gap-2 text-xs font-semibold text-[#BC0202]">
          <span class="px-2.5 py-0.5 rounded-md bg-red-50 border border-red-200">Laporan Hasil Kinerja</span>
          <span>&bull;</span>
          <span class="text-zinc-500">{{ $report->published_at ? $report->published_at->translatedFormat('d F Y') : '-' }}</span>
          <span>&bull;</span>
          <span class="text-zinc-500">{{ $report->view_count }}x dibaca</span>
        </div>

        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 tracking-tight leading-tight">
          {{ $report->title }}
        </h1>

        <p class="text-sm sm:text-base text-zinc-600 leading-relaxed font-normal">
          {{ $report->excerpt }}
        </p>

        <div class="flex items-center gap-3 pt-3 border-t border-zinc-100">
          <div class="w-10 h-10 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shrink-0">
            B
          </div>
          <div>
            <span class="block text-xs font-bold text-zinc-950">Banu Lesmana Bagaskara, S.M.</span>
            <span class="block text-[11px] text-zinc-500">Anggota DPRD Kota Bogor &bull; Komisi 1</span>
          </div>
        </div>
      </header>

      <!-- Main Cover Image -->
      @if ($report->cover_image)
        <div class="my-8 rounded-2xl overflow-hidden border border-zinc-200 aspect-[16/9] bg-zinc-100 shadow-sm">
          <img src="{{ asset($report->cover_image) }}" alt="{{ $report->title }}" class="w-full h-full object-cover" />
        </div>
      @endif

      <!-- Rendered Modular Block Canvas Content -->
      <div class="prose prose-zinc max-w-none">
        {!! $renderedContent !!}
      </div>

      <!-- Action & Back to Catalog -->
      <div class="mt-12 pt-8 border-t border-zinc-200 flex flex-col sm:flex-row items-center justify-between gap-4">
        <a href="{{ route('kinerja.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-zinc-600 hover:text-zinc-950 px-4 py-2 rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 shadow-2xs transition-colors">
          &larr; Kembali ke Katalog Kinerja
        </a>
        <a href="{{ route('kontak.index') }}#aspirasi" class="inline-flex items-center gap-1.5 text-xs font-semibold text-white px-4 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] shadow-sm transition-colors">
          Sampaikan Aspirasi Terkait Isu Ini
        </a>
      </div>
    </div>
  </article>

  <!-- Related Reports -->
  @if ($relatedReports->isNotEmpty())
    <section class="w-full bg-[#fafafa] py-16 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight mb-8">Laporan Kinerja Lainnya</h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
          @foreach ($relatedReports as $rel)
            <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
              <div class="aspect-[16/10] bg-zinc-100 overflow-hidden">
                <img src="{{ asset($rel->cover_image ?? 'assets/banu/testi_dialog.jpg') }}" alt="{{ $rel->title }}" class="w-full h-full object-cover" />
              </div>
              <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                  <span class="text-[11px] text-zinc-500 font-medium block mb-1.5">{{ $rel->published_at ? $rel->published_at->translatedFormat('d F Y') : '-' }}</span>
                  <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug line-clamp-2">
                    <a href="{{ route('kinerja.show', $rel->slug) }}" class="hover:text-[#BC0202] transition-colors">{{ $rel->title }}</a>
                  </h3>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                  <a href="{{ route('kinerja.show', $rel->slug) }}" class="text-xs font-bold text-[#BC0202] hover:underline">Baca Selengkapnya &rarr;</a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif
@endsection
