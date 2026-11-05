@extends('layouts.public')

@section('title', $news->title . ' | Berita Banu Bagaskara')
@section('meta_description', Str::limit(strip_tags($news->description), 155))
@section('og_image', asset($news->cover_image))
@section('og_type', 'article')

@push('schema')
<script type="application/ld+json">
{
  "{{ '@context' }}": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "{{ addslashes($news->title) }}",
  "image": ["{{ asset($news->cover_image) }}"],
  "datePublished": "{{ $news->published_at ? ($news->published_at instanceof \Illuminate\Support\Carbon ? $news->published_at->toIso8601String() : \Illuminate\Support\Carbon::parse($news->published_at)->toIso8601String()) : ($news->created_at ? ($news->created_at instanceof \Illuminate\Support\Carbon ? $news->created_at->toIso8601String() : \Illuminate\Support\Carbon::parse($news->created_at)->toIso8601String()) : now()->toIso8601String()) }}",
  "dateModified": "{{ $news->updated_at ? ($news->updated_at instanceof \Illuminate\Support\Carbon ? $news->updated_at->toIso8601String() : \Illuminate\Support\Carbon::parse($news->updated_at)->toIso8601String()) : now()->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "Banu Lesmana Bagaskara, S.M.",
    "url": "{{ url('/') }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Media Center Banu Bagaskara",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ !empty($generalSettings['logo']) ? asset($generalSettings['logo']) : url('/favicon.ico') }}"
    }
  },
  "description": "{{ addslashes(Str::limit(strip_tags($news->description), 200)) }}"
}
</script>
@endpush

@section('content')
  <!-- Scroll Reading Progress Bar -->
  <div class="fixed top-0 left-0 right-0 h-1 bg-transparent z-50 pointer-events-none" x-data="{ progress: 0 }" @scroll.window="progress = Math.min(100, Math.max(0, (window.pageYOffset / (document.documentElement.scrollHeight - window.innerHeight)) * 100))">
    <div class="h-full bg-[#BC0202] transition-all duration-75" :style="'width: ' + progress + '%'"></div>
  </div>

  <article class="w-full bg-white py-12 sm:py-16 border-b border-zinc-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Breadcrumb -->
      <nav class="flex items-center gap-2 text-xs text-zinc-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-zinc-950 transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('berita.index') }}" class="hover:text-zinc-950 transition-colors">Berita</a>
        <span>/</span>
        <span class="text-zinc-950 truncate max-w-[200px] sm:max-w-none">{{ $news->title }}</span>
      </nav>

      <!-- Article Header -->
      <header class="space-y-4 mb-8">
        <div class="flex items-center gap-2 text-xs font-semibold text-[#BC0202]">
          <span class="px-2.5 py-0.5 rounded-md bg-red-50 border border-red-200">{{ $news->source }}</span>
          <span>&bull;</span>
          <span class="text-zinc-500">{{ $news->published_at ? $news->published_at->translatedFormat('d F Y') : '-' }}</span>
          <span>&bull;</span>
          <span class="text-zinc-500">{{ $news->view_count }}x dibaca</span>
        </div>

        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 tracking-tight leading-tight">
          {{ $news->title }}
        </h1>
      </header>

      <!-- Main Cover Image (Click to View Full in Lightbox) -->
      @if ($news->cover_image)
        <div
          @click="$dispatch('open-lightbox', { images: [{ url: '{{ asset($news->cover_image) }}', title: '{{ addslashes($news->title) }}' }] })"
          class="my-8 rounded-2xl overflow-hidden border border-zinc-200 aspect-[16/9] bg-zinc-100 shadow-sm cursor-pointer group relative"
          title="Klik untuk memperbesar foto"
        >
          <img src="{{ asset($news->cover_image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-300" />
          <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-md bg-zinc-950/70 backdrop-blur-xs text-white text-[11px] font-medium flex items-center gap-1.5 opacity-80 group-hover:opacity-100 transition-opacity">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
            </svg>
            <span>Perbesar</span>
          </div>
        </div>
      @endif

      <!-- Article Body Content -->
      <div class="text-sm sm:text-base text-zinc-700 leading-relaxed space-y-4 pt-2">
        {!! nl2br(e($news->description)) !!}
      </div>

      <!-- Share Section (Alpine Copy to Clipboard + WhatsApp) -->
      <div
        class="mt-10 pt-6 border-t border-zinc-100 flex flex-wrap items-center justify-between gap-3 text-xs"
        x-data="{ copied: false }"
      >
        <span class="font-bold text-zinc-900">Bagikan Berita Ini:</span>
        <div class="flex items-center gap-2">
          <button
            type="button"
            @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 text-zinc-700 font-semibold shadow-2xs transition-colors cursor-pointer"
          >
            <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            <span x-text="copied ? 'Tautan Tersalin!' : 'Salin Tautan'"></span>
          </button>

          <a
            href="https://api.whatsapp.com/send?text={{ rawurlencode($news->title . ' - ' . url()->current()) }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-emerald-200 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 font-semibold shadow-2xs transition-colors"
          >
            <svg class="w-3.5 h-3.5 fill-current text-emerald-600" viewBox="0 0 24 24">
              <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
            </svg>
            <span>WhatsApp</span>
          </a>
        </div>
      </div>

      <!-- Action & Back to Catalog -->
      <div class="mt-12 pt-8 border-t border-zinc-200 flex flex-col sm:flex-row items-center justify-between gap-4">
        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-zinc-600 hover:text-zinc-950 px-4 py-2 rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 shadow-2xs transition-colors">
          &larr; Kembali ke Arsip Berita
        </a>
        <a href="{{ route('kontak.index') }}#aspirasi" class="inline-flex items-center gap-1.5 text-xs font-semibold text-white px-4 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] shadow-sm transition-colors">
          Sampaikan Aspirasi
        </a>
      </div>
    </div>
  </article>

  <!-- Related News -->
  @if ($relatedNews->isNotEmpty())
    <section class="w-full bg-[#fafafa] py-16 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight mb-8">Rilis Berita Lainnya</h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
          @foreach ($relatedNews as $rel)
            <article class="rounded-xl border border-zinc-200 bg-white overflow-hidden shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
              <div class="aspect-[16/10] bg-zinc-100 overflow-hidden">
                <img src="{{ asset($rel->cover_image) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover" />
              </div>
              <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                  <span class="text-[11px] text-zinc-500 font-medium block mb-1.5">{{ $rel->published_at ? $rel->published_at->translatedFormat('d F Y') : '-' }}</span>
                  <h3 class="font-bold text-sm sm:text-base text-zinc-950 leading-snug line-clamp-2">
                    <a href="{{ route('berita.show', $rel->slug) }}" class="hover:text-[#BC0202] transition-colors">{{ $rel->title }}</a>
                  </h3>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                  <a href="{{ route('berita.show', $rel->slug) }}" class="text-xs font-bold text-[#BC0202] hover:underline">Baca Selengkapnya &rarr;</a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif
@endsection
