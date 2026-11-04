@extends('layouts.public')

@section('title', 'Galeri Dokumentasi Kegiatan Warga | Banu Bagaskara')
@section('meta_description', 'Arsip foto dokumentasi kegiatan reses, silaturahmi warga, layanan ambulance siaga 24 jam, dan pelatihan UMKM di Kecamatan Tanah Sareal.')

@section('content')
  @php
    $galleryJson = $albums->map(function ($album) {
      return [
        'id' => $album->id,
        'title' => $album->title,
        'date' => $album->event_date ? $album->event_date->translatedFormat('d F Y') : '',
        'desc' => $album->description ?? '',
        'cover' => asset($album->cover_image),
        'photos' => $album->photos->map(function ($p) {
          return [
            'url' => asset($p->image_path),
            'caption' => $p->caption ?? '',
          ];
        })->toArray(),
      ];
    })->values();
  @endphp

  <div x-data="{
    modalOpen: false,
    activeAlbumIndex: 0,
    activePhotoIndex: 0,
    albums: {{ json_encode($galleryJson) }},
    get activeAlbum() {
      return this.albums[this.activeAlbumIndex] || null;
    },
    openAlbum(idx) {
      this.activeAlbumIndex = idx;
      this.activePhotoIndex = 0;
      this.modalOpen = true;
      document.body.style.overflow = 'hidden';
    },
    closeModal() {
      this.modalOpen = false;
      document.body.style.overflow = '';
    },
    nextPhoto() {
      if (this.activeAlbum && this.activePhotoIndex < this.activeAlbum.photos.length - 1) {
        this.activePhotoIndex++;
      }
    },
    prevPhoto() {
      if (this.activePhotoIndex > 0) {
        this.activePhotoIndex--;
      }
    }
  }">

    <!-- Header Hero -->
    <header class="w-full bg-[#faf5f5] py-14 sm:py-18 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
        <div class="max-w-3xl">
          <span class="text-xs font-bold text-[#BC0202] uppercase tracking-wider block mb-2">Dokumentasi Lapangan</span>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-zinc-950 tracking-tight leading-tight">
            Galeri Foto &amp; <span class="text-[#BC0202]">Aksi Nyata</span> Warga
          </h1>
          <p class="text-xs sm:text-sm text-zinc-600 mt-4 leading-relaxed">
            Arsip dokumentasi kebersamaan bersama warga di 11 kelurahan se-Kecamatan Tanah Sareal dalam penyerapan aspirasi, pelayanan ambulance siaga, dan pendampingan ekonomi kerakyatan.
          </p>
        </div>
      </div>
    </header>

    <!-- Grid Album Foto -->
    <section class="w-full bg-[#f4f4f5] py-14 sm:py-18 border-b border-zinc-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7">
          @forelse ($albums as $index => $album)
            <article
              class="bg-white border border-zinc-200 rounded-2xl p-4 sm:p-5 shadow-xs hover:shadow-lg transition-all duration-300 group cursor-pointer flex flex-col justify-between"
              @click="openAlbum({{ $index }})"
            >
              <div>
                <div class="aspect-[4/3] w-full bg-zinc-100 rounded-xl overflow-hidden relative shadow-2xs">
                  <img src="{{ asset($album->cover_image) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                  <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-1 group-hover:translate-y-0 duration-200 bg-white/95 backdrop-blur-sm text-zinc-900 text-xs font-semibold px-3 py-1.5 rounded-lg shadow-sm flex items-center gap-1.5">
                      <svg class="w-3.5 h-3.5 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <span>Buka Album ({{ $album->photos->count() }} Foto)</span>
                    </div>
                  </div>
                </div>
                <div class="pt-4">
                  <time class="text-xs text-zinc-500 font-medium block mb-1.5">{{ $album->event_date ? $album->event_date->translatedFormat('d F Y') : '-' }}</time>
                  <h3 class="text-base sm:text-lg font-bold text-zinc-950 group-hover:text-[#BC0202] transition-colors leading-snug">{{ $album->title }}</h3>
                  @if ($album->description)
                    <p class="text-xs sm:text-sm text-zinc-600 mt-2 leading-relaxed line-clamp-2">{{ $album->description }}</p>
                  @endif
                </div>
              </div>
            </article>
          @empty
            <div class="col-span-full py-16 text-center text-zinc-500">
              <p>Belum ada album dokumentasi yang dipublikasikan.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <!-- Modal Preview Album (Photo Theater Lightbox) -->
    <div
      x-show="modalOpen"
      x-cloak
      class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-zinc-950/85 backdrop-blur-md"
      @keydown.escape.window="closeModal()"
      @keydown.arrow-left.window="if(modalOpen) prevPhoto()"
      @keydown.arrow-right.window="if(modalOpen) nextPhoto()"
    >
      <div @click.away="closeModal()" class="bg-zinc-900 border border-zinc-800 text-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[92vh] flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <div class="px-5 py-3.5 sm:px-6 sm:py-4 border-b border-zinc-800 flex items-center justify-between gap-4 bg-zinc-900">
          <div class="min-w-0 flex-1">
            <h3 class="text-sm sm:text-base font-bold text-white tracking-tight truncate" x-text="activeAlbum?.title"></h3>
            <p class="text-xs text-zinc-400 mt-0.5" x-text="activeAlbum?.photos[activePhotoIndex]?.caption || activeAlbum?.desc"></p>
          </div>
          <button @click="closeModal()" aria-label="Tutup Pratinjau" class="rounded-lg p-2 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Main Photo Preview -->
        <div class="relative bg-black flex-1 min-h-[260px] sm:min-h-[400px] max-h-[56vh] flex items-center justify-center overflow-hidden select-none">
          <template x-if="activeAlbum && activeAlbum.photos && activeAlbum.photos.length > 0">
            <img :src="activeAlbum.photos[activePhotoIndex]?.url" :alt="activeAlbum.title" class="w-full h-full max-h-[56vh] object-contain transition-all duration-200" />
          </template>

          <!-- Prev Button (Rounded-lg, No Pill) -->
          <button
            x-show="activePhotoIndex > 0"
            @click.stop="prevPhoto()"
            aria-label="Foto Sebelumnya"
            class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md hover:scale-105"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <!-- Next Button (Rounded-lg, No Pill) -->
          <button
            x-show="activeAlbum && activePhotoIndex < activeAlbum.photos.length - 1"
            @click.stop="nextPhoto()"
            aria-label="Foto Berikutnya"
            class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md hover:scale-105"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        <!-- Thumbnails Strip -->
        <div class="bg-zinc-950/95 border-t border-zinc-800 px-4 py-3 sm:px-6 sm:py-3.5">
          <div class="flex items-center gap-2.5 overflow-x-auto pb-1">
            <template x-for="(photo, idx) in (activeAlbum ? activeAlbum.photos : [])" :key="idx">
              <button
                type="button"
                @click="activePhotoIndex = idx"
                class="relative w-16 h-12 sm:w-20 sm:h-14 shrink-0 rounded-lg overflow-hidden border-2 transition-all duration-200 focus:outline-none"
                :class="activePhotoIndex === idx ? 'border-[#BC0202] scale-102 ring-1 ring-[#BC0202]' : 'border-zinc-800 opacity-60 hover:opacity-100 hover:border-zinc-600'"
              >
                <img :src="photo.url" :alt="activeAlbum?.title" class="w-full h-full object-cover" />
              </button>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
