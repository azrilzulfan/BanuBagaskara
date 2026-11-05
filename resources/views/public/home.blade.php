@extends('layouts.public')

@section('title', !empty($seoSettings['metaTitle']) ? $seoSettings['metaTitle'] : 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029')
@section('meta_description', !empty($seoSettings['metaDescription']) ? $seoSettings['metaDescription'] : 'Kanal resmi transparansi kinerja, advokasi aspirasi warga Tanah Sareal, dan program kerja Banu Lesmana Bagaskara, S.M. di DPRD Kota Bogor.')

    @push('schema')
        <script type="application/ld+json">
{
  "{{ '@context' }}": "https://schema.org",
  "@type": "Person",
  "name": "Banu Lesmana Bagaskara, S.M.",
  "jobTitle": "Anggota DPRD Kota Bogor",
  "worksFor": {
    "@type": "GovernmentOrganization",
    "name": "DPRD Kota Bogor"
  },
  "memberOf": {
    "@type": "PoliticalParty",
    "name": "PDI Perjuangan"
  },
  "url": "{{ url('/') }}",
  "image": "{{ !empty($generalSettings['logo']) ? asset($generalSettings['logo']) : url('/favicon.ico') }}",
  "sameAs": [
    "{{ $generalSettings['socials']['instagram'] ?? 'https://instagram.com/banubagaskara' }}",
    "{{ $generalSettings['socials']['tiktok'] ?? 'https://tiktok.com/@banubagaskara' }}",
    "{{ $generalSettings['socials']['facebook'] ?? 'https://facebook.com/banubgsk' }}",
    "https://goodkind.id/profil/banu-lesmana-bagaskara-sm"
  ],
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Bogor",
    "addressRegion": "Jawa Barat",
    "addressCountry": "ID"
  }
}
</script>
    @endpush

@section('content')
    <!-- ========================================== -->
    <!-- 1. HERO SECTION (Split 50/50 Layout)       -->
    <!-- ========================================== -->
    <section
        class="w-full grid grid-cols-1 lg:grid-cols-2 relative min-h-[580px] lg:min-h-[660px] xl:min-h-[720px] border-b border-zinc-200">
        <!-- Hero Left: Solid Light Background (Strictly No Gradient) -->
        <div
            class="bg-[#faf5f5] px-6 sm:px-10 md:px-14 lg:pl-12 lg:pr-10 xl:pl-20 xl:pr-16 2xl:pl-32 2xl:pr-24 pt-7 sm:pt-10 pb-12 sm:pb-16 flex flex-col justify-between relative overflow-hidden">
            <!-- Top Nav Header: Logo & Mobile Menu Toggle -->
            <header class="flex items-center justify-between z-10 w-full mb-8 sm:mb-10 gap-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
                    @if (!empty($generalSettings['logo']))
                        <img src="{{ asset($generalSettings['logo']) }}"
                            alt="{{ $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara' }}"
                            class="h-8 sm:h-9 w-auto object-contain" />
                    @else
                        <!-- Official Parliamentary / Democratic Red Mark (No Pill, Rounded-lg) -->
                        <div
                            class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm sm:text-base shadow-sm shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                    @endif
                    <div class="flex flex-col leading-tight min-w-0 flex-1">
                        <span
                            class="font-bold text-sm sm:text-base lg:text-lg tracking-tight text-zinc-950 truncate">banubagaskara.</span>
                    </div>
                </a>

                <!-- Menu Button for Mobile & Tablet (< lg) - Shadcn Button (No Pill) -->
                <div class="lg:hidden shrink-0 ml-2">
                    <button
                        @click="mobileMenu = !mobileMenu"
                        :aria-expanded="mobileMenu ? 'true' : 'false'"
                        aria-controls="mobile-nav-drawer"
                        aria-label="Buka Menu Navigasi"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200 cursor-pointer">
                        <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="hidden sm:inline ml-1.5">Menu</span>
                    </button>
                </div>
            </header>

            <!-- Hero Content Block -->
            <div class="my-auto pt-2 sm:pt-6 pb-4 z-10 max-w-xl">
                @php
                    $rawHeadline = !empty($homeSettings['hero']['headline'])
                        ? $homeSettings['hero']['headline']
                        : '[Headline Utama Beranda]';
                    if (
                        $rawHeadline === 'Bogor Lebih Baik: Maju & Nyaman untuk Semua' ||
                        $rawHeadline === 'Bogor Lebih Baik:<br />Maju & Nyaman untuk Semua'
                    ) {
                        $renderedHeadline =
                            'Bogor <span class="text-[#BC0202]">Lebih</span> Baik:<br />Maju &amp; <span class="text-[#BC0202]">Nyaman</span> untuk <span class="text-[#BC0202]">Semua</span>';
                    } else {
                        $escapedHeadline = e($rawHeadline);
                        $escapedHeadline = preg_replace('/&lt;br\s*\/?&gt;/i', '<br />', $escapedHeadline) ?? $escapedHeadline;
                        $escapedHeadline = preg_replace(
                            '/&lt;span\s+class=(?:&quot;|&#039;)text-\[#BC0202\](?:&quot;|&#039;)&gt;(.*?)&lt;\/span&gt;/is',
                            '<span class="text-[#BC0202]">$1</span>',
                            $escapedHeadline
                        ) ?? $escapedHeadline;
                        $renderedHeadline = nl2br($escapedHeadline);
                    }
                @endphp
                <!-- Main Slogan & Headline (Disciplined Sans-Serif Typography) -->
                <h1
                    class="text-2xl sm:text-4xl md:text-[44px] lg:text-[40px] xl:text-[48px] text-zinc-950 font-bold leading-[1.15] tracking-tight">
                    {!! $renderedHeadline !!}
                </h1>

                <!-- Subtitle / Manifesto -->
                <p
                    class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-zinc-600 font-normal leading-relaxed mt-4 sm:mt-5 max-w-[460px]">
                    {{ !empty($homeSettings['hero']['description']) ? $homeSettings['hero']['description'] : '[Deskripsi Pengantar Beranda]' }}
                </p>

                <!-- CTA Buttons: Shadcn Button Style (Strictly No Pill) -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 mt-7 sm:mt-9">
                    <a href="{{ !empty($homeSettings['hero']['ctaPrimaryLink']) ? url($homeSettings['hero']['ctaPrimaryLink']) : route('kontak.index') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-sm transition-colors active:scale-98 text-center">
                        {{ !empty($homeSettings['hero']['ctaPrimaryText']) ? $homeSettings['hero']['ctaPrimaryText'] : 'Hubungi Kami' }}
                    </a>
                    <a href="{{ !empty($homeSettings['hero']['ctaSecondaryLink']) ? url($homeSettings['hero']['ctaSecondaryLink']) : route('profile') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-2xs transition-colors active:scale-98 text-center">
                        {{ !empty($homeSettings['hero']['ctaSecondaryText']) ? $homeSettings['hero']['ctaSecondaryText'] : 'Kenali Banu Bagaskara' }}
                    </a>
                </div>
            </div>

            <!-- Spacer for vertical alignment -->
            <div class="h-2"></div>
        </div>

        <!-- Hero Right: Edge-to-Edge Photo Side with Top-Right Menu Button on Desktop -->
        <div class="relative min-h-[360px] sm:min-h-[440px] lg:min-h-full w-full bg-zinc-800 overflow-hidden">
            @if (!empty($homeSettings['hero']['heroImage']))
                <img src="{{ asset($homeSettings['hero']['heroImage']) }}"
                    alt="Banu Lesmana Bagaskara, S.M. - Anggota DPRD Kota Bogor"
                    class="w-full h-full object-cover object-top filter grayscale contrast-105 hover:grayscale-0 transition-all duration-500" />
            @else
                <div class="w-full h-full min-h-[360px] sm:min-h-[440px] bg-zinc-800 flex items-center justify-center text-zinc-600">
                    <div class="w-20 h-20 rounded-xl bg-zinc-700/50 flex items-center justify-center text-zinc-500">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            @endif

            <!-- Desktop Pre-Scroll Navigation Bar (Rounded-xl container, No Pill) -->
            <div class="hidden lg:block absolute top-8 right-8 xl:top-10 xl:right-14 2xl:right-20 z-20">
                <nav class="flex items-center gap-1.5 bg-white/95 border border-zinc-200 p-1.5 rounded-xl shadow-sm">
                    <a href="{{ route('home') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('profile') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Profil</a>
                    <a href="{{ route('kinerja.index') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
                    <a href="{{ route('berita.index') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Berita</a>
                    <a href="{{ route('galeri.index') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
                    <a href="{{ route('kontak.index') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kontak</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 2. BANNER SERBAGUNA (FULL GAMBAR RESPONSIF - SELALU AKTIF) -->
    <!-- ======================================================== -->
    <section class="w-full bg-zinc-950 border-b border-zinc-200">
        <div class="w-full max-w-[1920px] mx-auto overflow-hidden">
            @if (!empty($homeSettings['banner']['image']))
                <img src="{{ asset($homeSettings['banner']['image']) }}"
                    alt="{{ !empty($homeSettings['banner']['alt']) ? $homeSettings['banner']['alt'] : '[Banner Beranda]' }}"
                    class="w-full h-auto object-cover min-h-[160px] sm:min-h-[220px] md:min-h-[280px] lg:min-h-[340px] xl:min-h-[400px]"
                    loading="lazy" />
            @else
                <div class="w-full h-44 sm:h-56 md:h-64 lg:h-72 bg-zinc-900 flex items-center justify-center text-zinc-500 text-sm font-medium p-4 text-center">
                    <span>{{ !empty($homeSettings['banner']['alt']) ? $homeSettings['banner']['alt'] : '[Banner Beranda]' }}</span>
                </div>
            @endif
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 3. HASIL KINERJA & BERITA TERKINI (Gabungan 4 Artikel)    -->
    <!-- ======================================================== -->
    <!-- 3. HASIL KINERJA & BERITA TERKINI (FEATURED CARD STYLE)  -->
    <!-- ======================================================== -->
    <section id="kinerja" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16 flex flex-col items-center">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Hasil
                    <span class="text-[#BC0202]">Kinerja</span> &amp;<br /><span class="text-[#BC0202]">Berita</span>
                    Terkini</h2>
            </div>

            @if ($latestArticles->isEmpty())
                <div class="w-full py-16 text-center text-zinc-500 text-sm">
                    Belum ada publikasi hasil kinerja dan berita terkini.
                </div>
            @else
                <div class="space-y-6 sm:space-y-8 w-full">
                    @foreach ($latestArticles as $item)
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch w-full">
                            <!-- Left: Narrative (Tanggal, Badge, Judul, Deskripsi, Tombol Aksi) -->
                            <div class="lg:col-span-7 rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 lg:p-10 shadow-sm flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-2.5">
                                        <div class="flex items-center text-[11px] font-medium text-zinc-500">
                                            <svg class="w-3.5 h-3.5 mr-1.5 text-zinc-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>{{ $item->date ?: '-' }}</span>
                                        </div>
                                        <span class="inline-block text-[10px] font-bold px-2.5 py-0.5 rounded-md {{ $item->type === 'kinerja' ? 'bg-red-50 text-[#BC0202] border border-red-100' : 'bg-zinc-100 text-zinc-700 border border-zinc-200' }}">
                                            {{ $item->badge }}
                                        </span>
                                    </div>

                                    <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-zinc-950 tracking-tight leading-snug">
                                        <a href="{{ $item->url }}" @if ($item->isExternal) target="_blank" rel="noopener noreferrer" @endif class="hover:text-[#BC0202] transition-colors">
                                            {{ $item->title }}
                                        </a>
                                    </h3>

                                    <p class="text-xs sm:text-[14px] text-zinc-600 mt-3.5 leading-relaxed line-clamp-3">
                                        {{ $item->excerpt }}
                                    </p>
                                </div>

                                <div class="mt-7 pt-5 border-t border-zinc-100 flex items-center justify-start">
                                    <a href="{{ $item->url }}" @if ($item->isExternal) target="_blank" rel="noopener noreferrer" @endif
                                        class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-1.5 active:scale-98">
                                        <span>{{ $item->btnText }}</span>
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            @if ($item->isExternal)
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            @endif
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Right: Cover Image (Sama Persis Format Featured Card) -->
                            <div class="lg:col-span-5 rounded-xl border border-zinc-200 overflow-hidden shadow-sm aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto min-h-[240px] sm:min-h-[280px] bg-zinc-100">
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover" loading="lazy" />
                                @else
                                    <div class="w-full h-full bg-zinc-900 flex flex-col items-center justify-center text-zinc-500 text-xs p-4 text-center font-medium">
                                        <span class="text-white font-bold mb-1">banubagaskara.</span>
                                        <span class="text-[11px] text-zinc-400">{{ $item->badge }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('kinerja.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs font-semibold px-4 py-2.5 shadow-2xs transition-colors">
                        Lihat Semua Kinerja &rarr;
                    </a>
                    <a href="{{ route('berita.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs font-semibold px-4 py-2.5 shadow-2xs transition-colors">
                        Lihat Semua Berita &rarr;
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 4. 6 PROGRAM PENGABDIAN UTAMA (Komitmen Dewan)          -->
    <!-- ======================================================== -->
    <section id="program" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 sm:mb-14 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">
                        Enam <span class="text-[#BC0202]">Program</span> Nyata untuk<br /><span
                            class="text-[#BC0202]">Warga</span> Kota <span class="text-[#BC0202]">Bogor</span>
                    </h2>
                </div>
            </div>

            <!-- 6 Program Cards Grid (1:1 with Template) -->
            @php
                $defaultPrograms = [
                    [
                        'title' => '[Judul Program Kerja 1]',
                        'desc' => '[Deskripsi Program Kerja 1: Penjelasan fokus inisiatif dan layanan advokasi masyarakat.]',
                        'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    ],
                    [
                        'title' => '[Judul Program Kerja 2]',
                        'desc' => '[Deskripsi Program Kerja 2: Penjelasan fokus inisiatif dan layanan advokasi masyarakat.]',
                        'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    ],
                    [
                        'title' => '[Judul Program Kerja 3]',
                        'desc' => '[Deskripsi Program Kerja 3: Penjelasan fokus inisiatif dan layanan advokasi masyarakat.]',
                        'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    ],
                    [
                        'title' => '[Judul Program Kerja 4]',
                        'desc' => '[Deskripsi Program Kerja 4: Penjelasan fokus inisiatif dan layanan advokasi masyarakat.]',
                        'icon' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
                    ],
                    [
                        'title' => '[Judul Program Kerja 5]',
                        'desc' => '[Deskripsi Program Kerja 5: Penjelasan fokus inisiatif dan layanan advokasi masyarakat.]',
                        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                    ],
                    [
                        'title' => '[Judul Program Kerja 6]',
                        'desc' => '[Deskripsi Program Kerja 6: Penjelasan fokus inisiatif dan layanan advokasi masyarakat.]',
                        'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                    ],
                ];
                $homePrograms = $homeSettings['programs'] ?? ($profileSettings['programs'] ?? []);
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                @foreach ($defaultPrograms as $idx => $def)
                    @php
                        $progTitle = !empty($homePrograms[$idx]['title']) ? $homePrograms[$idx]['title'] : $def['title'];
                        $progDesc = !empty($homePrograms[$idx]['desc']) ? $homePrograms[$idx]['desc'] : $def['desc'];
                    @endphp
                    <div
                        class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center group-hover:bg-[#BC0202] group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $def['icon'] }}" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="font-bold text-base sm:text-lg text-zinc-950 flex items-center tracking-tight"><span
                                    class="text-[#BC0202] font-black mr-2">|</span>
                                {{ $progTitle }}</h3>
                            <p class="text-xs sm:text-[13px] text-zinc-600 mt-2.5 leading-relaxed">
                                {{ $progDesc }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 5. KOLASE FOTO DOKUMENTASI (BENTO UI STYLE)              -->
    <!-- ======================================================== -->
    <section id="dokumentasi" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 sm:mb-12 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">
                        Dokumentasi <span class="text-[#BC0202]">Aksi</span> Nyata di <span
                            class="text-[#BC0202]">Lapangan</span></h2>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('galeri.index') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-white border border-zinc-300 hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-2xs transition-colors">
                        Lihat Seluruh Galeri Foto &rarr;
                    </a>
                </div>
            </div>

            @php
                $homeCollage = [];
                foreach ([0, 1, 2, 3] as $cIdx) {
                    if (!empty($homeSettings['collage'][$cIdx]['image'])) {
                        $homeCollage[] = [
                            'url' => asset($homeSettings['collage'][$cIdx]['image']),
                            'title' => $homeSettings['collage'][$cIdx]['label'] ?? ('Dokumentasi Kegiatan ' . ($cIdx + 1)),
                        ];
                    }
                }
                if (!empty($homeSettings['hero']['heroImage'])) {
                    $homeCollage[] = [
                        'url' => asset($homeSettings['hero']['heroImage']),
                        'title' => 'Sidang Paripurna & Pengawasan APBD di Parlemen',
                    ];
                }
            @endphp
            <!-- Bento UI Grid: Modular layout with varying card spans -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-5">
                <!-- Bento Card 1 (Large Feature Card: Spans 7 cols on lg, 2 rows) -->
                <div
                    @if (!empty($homeSettings['collage'][0]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($homeCollage) }}, index: 0 })"
                    @endif
                    class="lg:col-span-7 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[320px] sm:min-h-[380px] lg:min-h-[420px] flex flex-col justify-end">
                    @if (!empty($homeSettings['collage'][0]['image']))
                        <img src="{{ asset($homeSettings['collage'][0]['image']) }}"
                            alt="{{ $homeSettings['collage'][0]['label'] ?? '[Dokumentasi Kegiatan 1]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                        <div class="absolute inset-0 w-full h-full bg-zinc-800 flex items-center justify-center text-zinc-600">
                            <div class="w-14 h-14 rounded-xl bg-zinc-700/50 flex items-center justify-center text-zinc-500">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
                </div>

                <!-- Bento Card 2 (Spans 5 cols on lg, Medium Height) -->
                <div
                    @if (!empty($homeSettings['collage'][1]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($homeCollage) }}, index: 1 })"
                    @endif
                    class="lg:col-span-5 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[250px] sm:min-h-[300px] lg:min-h-[420px] flex flex-col justify-end">
                    @if (!empty($homeSettings['collage'][1]['image']))
                        <img src="{{ asset($homeSettings['collage'][1]['image']) }}"
                            alt="{{ $homeSettings['collage'][1]['label'] ?? '[Dokumentasi Kegiatan 2]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                        <div class="absolute inset-0 w-full h-full bg-zinc-800 flex items-center justify-center text-zinc-600">
                            <div class="w-14 h-14 rounded-xl bg-zinc-700/50 flex items-center justify-center text-zinc-500">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
                </div>

                <!-- Bento Card 3 (Spans 4 cols on lg) -->
                <div
                    @if (!empty($homeSettings['collage'][2]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($homeCollage) }}, index: 2 })"
                    @endif
                    class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
                    @if (!empty($homeSettings['collage'][2]['image']))
                        <img src="{{ asset($homeSettings['collage'][2]['image']) }}"
                            alt="{{ $homeSettings['collage'][2]['label'] ?? '[Dokumentasi Kegiatan 3]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                        <div class="absolute inset-0 w-full h-full bg-zinc-800 flex items-center justify-center text-zinc-600">
                            <div class="w-12 h-12 rounded-xl bg-zinc-700/50 flex items-center justify-center text-zinc-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
                </div>

                <!-- Bento Card 4 (Spans 4 cols on lg) -->
                <div
                    @if (!empty($homeSettings['collage'][3]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($homeCollage) }}, index: 3 })"
                    @endif
                    class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
                    @if (!empty($homeSettings['collage'][3]['image']))
                        <img src="{{ asset($homeSettings['collage'][3]['image']) }}"
                            alt="{{ $homeSettings['collage'][3]['label'] ?? '[Dokumentasi Kegiatan 4]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                        <div class="absolute inset-0 w-full h-full bg-zinc-800 flex items-center justify-center text-zinc-600">
                            <div class="w-12 h-12 rounded-xl bg-zinc-700/50 flex items-center justify-center text-zinc-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/30 to-transparent"></div>
                </div>

                <!-- Bento Card 5 (Spans 4 cols on lg) -->
                <div
                    @if (!empty($homeSettings['hero']['heroImage']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($homeCollage) }}, index: {{ count($homeCollage) - 1 }} })"
                    @endif
                    class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
                    @if (!empty($homeSettings['hero']['heroImage']))
                        <img src="{{ asset($homeSettings['hero']['heroImage']) }}"
                            alt="Sidang Paripurna & Pengawasan APBD di Parlemen"
                            class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" />
                    @else
                        <div class="absolute inset-0 w-full h-full bg-zinc-800 flex items-center justify-center text-zinc-600">
                            <div class="w-12 h-12 rounded-xl bg-zinc-700/50 flex items-center justify-center text-zinc-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/90 via-zinc-950/40 to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 6. TESTIMONI -> SUARA & ASPIRASI WARGA                   -->
    <!-- ======================================================== -->
    @php
        $testimonials = !empty($homeSettings['testimonials']) ? $homeSettings['testimonials'] : [
            [
                'name' => '[Nama Tokoh / Warga 1]',
                'role' => '[Peran / Wilayah 1]',
                'quote' =>
                    '[Kutipan Testimoni Warga 1: Komentar atau aspirasi warga mengenai pelayanan kedewanan dan program pengabdian.]',
            ],
            [
                'name' => '[Nama Tokoh / Warga 2]',
                'role' => '[Peran / Wilayah 2]',
                'quote' =>
                    '[Kutipan Testimoni Warga 2: Komentar atau aspirasi warga mengenai pelayanan kedewanan dan program pengabdian.]',
            ],
            [
                'name' => '[Nama Tokoh / Warga 3]',
                'role' => '[Peran / Wilayah 3]',
                'quote' =>
                    '[Kutipan Testimoni Warga 3: Komentar atau aspirasi warga mengenai pelayanan kedewanan dan program pengabdian.]',
            ],
        ];
    @endphp
    <section id="suara-warga" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <!-- Section Header -->
            <div class="max-w-2xl mb-10">
                <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">
                    Testimoni <span class="text-[#BC0202]">Banu</span> Lesmana <span
                        class="text-[#BC0202]">Bagaskara</span></h2>
            </div>

            <!-- Testimonial Section with Alpine Interactivity & Touch Gestures -->
            <div
                x-data="{
                    activeIndex: 0,
                    total: {{ count($testimonials) }},
                    touchStartX: 0,
                    next() {
                        this.activeIndex = (this.activeIndex + 1) % this.total;
                    },
                    prev() {
                        this.activeIndex = (this.activeIndex - 1 + this.total) % this.total;
                    },
                    handleTouchStart(e) {
                        this.touchStartX = e.changedTouches[0].screenX;
                    },
                    handleTouchEnd(e) {
                        const diffX = e.changedTouches[0].screenX - this.touchStartX;
                        if (diffX < -40) this.next();
                        if (diffX > 40) this.prev();
                    }
                }"
                class="w-full"
            >
                <!-- Desktop: Standard 3-Column Grid -->
                <div class="hidden md:grid md:grid-cols-3 gap-5 lg:gap-6 items-stretch">
                    @foreach ($testimonials as $testi)
                        <div
                            class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-6 sm:p-7 shadow-xs hover:shadow-sm hover:border-zinc-300 transition-all flex flex-col justify-between min-h-[240px]">
                            <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed">
                                &ldquo;{{ $testi['quote'] }}&rdquo;
                            </p>
                            <div class="flex items-center gap-3 mt-6 pt-5 border-t border-zinc-200/60">
                                <div class="flex flex-col">
                                    <span class="font-bold text-xs sm:text-sm text-zinc-950">{{ $testi['name'] }}</span>
                                    <span class="text-[11px] text-zinc-500">{{ $testi['role'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Mobile / Tablet (< md): Touch-Swipeable Single-Card Carousel with Dot Indicators -->
                <div
                    class="md:hidden relative"
                    @touchstart="handleTouchStart($event)"
                    @touchend="handleTouchEnd($event)"
                >
                    @foreach ($testimonials as $idx => $testi)
                        <div
                            x-show="activeIndex === {{ $idx }}"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-x-4"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-4"
                            class="rounded-xl border border-zinc-200 bg-[#fafafa] p-6 shadow-xs flex flex-col justify-between min-h-[240px]"
                        >
                            <p class="text-xs sm:text-[13px] text-zinc-700 leading-relaxed">
                                &ldquo;{{ $testi['quote'] }}&rdquo;
                            </p>
                            <div class="flex items-center gap-3 mt-6 pt-5 border-t border-zinc-200/60">
                                <div class="flex flex-col">
                                    <span class="font-bold text-xs sm:text-sm text-zinc-950">{{ $testi['name'] }}</span>
                                    <span class="text-[11px] text-zinc-500">{{ $testi['role'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Navigation Controls: Dot Indicators & Prev/Next Buttons (No Pill, Rounded-lg) -->
                    <div class="flex items-center justify-between mt-4 px-1">
                        <div class="flex items-center gap-1.5">
                            @foreach ($testimonials as $idx => $testi)
                                <button
                                    type="button"
                                    @click="activeIndex = {{ $idx }}"
                                    aria-label="Pilih testimoni {{ $idx + 1 }}"
                                    class="h-1.5 rounded-sm transition-all duration-200"
                                    :class="activeIndex === {{ $idx }} ? 'w-6 bg-[#BC0202]' : 'w-2 bg-zinc-300'"
                                ></button>
                            @endforeach
                        </div>
                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                @click="prev()"
                                aria-label="Sebelumnya"
                                class="w-8 h-8 rounded-lg border border-zinc-200 bg-white text-zinc-700 hover:bg-zinc-100 flex items-center justify-center shadow-2xs transition-colors active:scale-95 cursor-pointer"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                type="button"
                                @click="next()"
                                aria-label="Berikutnya"
                                class="w-8 h-8 rounded-lg border border-zinc-200 bg-white text-zinc-700 hover:bg-zinc-100 flex items-center justify-center shadow-2xs transition-colors active:scale-95 cursor-pointer"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 7. CTA KOTAK ASPIRASI (MINIMALIS)                        -->
    <!-- ======================================================== -->
    <section class="w-full bg-[#fafafa] py-14 sm:py-16 border-t border-b border-zinc-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 tracking-tight">Ada Masukan atau Keluhan di
                Lingkunganmu?</h2>
            <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 max-w-xl mx-auto leading-relaxed">Sampaikan usulan perbaikan
                jalan, lampu mati, saluran air, atau keluhan lainnya langsung ke Kotak Aspirasi Warga.</p>

            <div class="mt-7 max-w-lg mx-auto">
                <a href="{{ route('kontak.index') }}"
                    class="w-full inline-block rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors shrink-0 active:scale-98">Kirim
                    Aspirasi</a>
            </div>
        </div>
    </section>
@endsection
