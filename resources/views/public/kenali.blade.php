@extends('layouts.public')

@section('title', 'Profil Banu Lesmana Bagaskara, S.M. | Kenali Rekam Jejak, Visi & Program')
@section('meta_description', 'Profil resmi, riwayat pendidikan S1 Manajemen, pengalaman organisasi, 12 isu strategis, dan 6 program fokus pengabdian warga Kota Bogor bersama Banu Lesmana Bagaskara, S.M.')

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
  "url": "{{ route('profile') }}",
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

                <!-- Menu Button for Mobile & Tablet (< lg) - Shadcn Button (No Pill, Rounded-lg) -->
                <div class="lg:hidden shrink-0 ml-2">
                    <button
                        @click="mobileMenu = !mobileMenu"
                        :aria-expanded="mobileMenu ? 'true' : 'false'"
                        aria-controls="mobile-nav-drawer"
                        aria-label="Buka Menu Navigasi"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200 cursor-pointer">
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
                <!-- Official Mandate Eyebrow Text (No Badge) -->
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-4">
                    <span>Profil &amp; Biografi Resmi</span>
                </div>

                @php
                    $profileTitle = $profileSettings['hero']['title'] ?? 'Banu Lesmana Bagaskara, S.M.';
                    if (
                        $profileTitle === 'Banu Lesmana Bagaskara, S.M.' ||
                        $profileTitle === 'Kenali Banu Lesmana Bagaskara, S.M.'
                    ) {
                        $renderedProfileTitle =
                            '<span class="text-[#BC0202]">Banu</span> Lesmana <span class="text-[#BC0202]">Bagaskara</span>, S.M.';
                    } else {
                        $escapedProfileTitle = e($profileTitle);
                        $escapedProfileTitle = preg_replace('/&lt;br\s*\/?&gt;/i', '<br />', $escapedProfileTitle) ?? $escapedProfileTitle;
                        $renderedProfileTitle = preg_replace(
                            '/&lt;span\s+class=(?:&quot;|&#039;)text-\[#BC0202\](?:&quot;|&#039;)&gt;(.*?)&lt;\/span&gt;/is',
                            '<span class="text-[#BC0202]">$1</span>',
                            $escapedProfileTitle
                        ) ?? $escapedProfileTitle;
                    }
                @endphp
                <!-- Main Slogan & Headline (Disciplined Sans-Serif Typography) -->
                <h1
                    class="text-2xl sm:text-4xl md:text-[44px] lg:text-[40px] xl:text-[48px] text-zinc-950 font-bold leading-[1.15] tracking-tight">
                    {!! $renderedProfileTitle !!}
                </h1>

                <!-- Subtitle / Executive Summary -->
                <p
                    class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-zinc-600 font-normal leading-relaxed mt-4 sm:mt-5 max-w-[480px]">
                    {{ !empty($profileSettings['hero']['subtitle']) ? $profileSettings['hero']['subtitle'] : '[Subjudul Profil Anggota Dewan]' }}
                </p>

                <!-- Key Metadata Grid (Clean 2x2, Rounded-xl Cards, No Pill) -->
                <div class="grid grid-cols-2 gap-3 mt-6 pt-5 border-t border-zinc-200/80">
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Daerah Pemilihan</span>
                        <span class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">{{ !empty($generalSettings['dapil']) ? $generalSettings['dapil'] : '[Daerah Pemilihan]' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Partai Politik</span>
                        <span
                            class="font-bold text-xs sm:text-sm text-[#BC0202] mt-0.5">{{ !empty($generalSettings['party']) ? $generalSettings['party'] : '[Partai Politik]' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Domisili Warga</span>
                        <span
                            class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">{{ !empty($generalSettings['address']) ? $generalSettings['address'] : '[Domisili / Wilayah]' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Komisi DPRD</span>
                        <span
                            class="font-bold text-xs sm:text-sm text-zinc-950 mt-0.5">{{ !empty($generalSettings['officeRole']) ? $generalSettings['officeRole'] : '[Komisi DPRD / Jabatan]' }}</span>
                    </div>
                </div>

                <!-- CTA Buttons: Shadcn Button Style (No Pill, Rounded-lg) -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 mt-7 sm:mt-8">
                    <a href="#visi-misi"
                        class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-sm transition-colors active:scale-98 text-center">
                        Lihat Visi Pengabdian
                    </a>
                    <a href="#pengalaman"
                        class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-5 sm:px-6 py-2.5 sm:py-3 shadow-2xs transition-colors active:scale-98 text-center">
                        Rekam Jejak &amp; 12 Isu Penting
                    </a>
                </div>
            </div>

            <!-- Spacer for vertical alignment -->
            <div class="h-2"></div>
        </div>

        <!-- Hero Right: Edge-to-Edge Photo Side with Top-Right Menu Button on Desktop -->
        <div class="relative min-h-[360px] sm:min-h-[440px] lg:min-h-full w-full bg-zinc-800 overflow-hidden">
            @if (!empty($profileSettings['hero']['heroImage']))
                <img src="{{ asset($profileSettings['hero']['heroImage']) }}"
                    alt="Banu Lesmana Bagaskara, S.M. - Profil Resmi"
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
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
                    <a href="{{ route('profile') }}"
                        class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Profil</a>
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

    <!-- ========================================== -->
    <!-- 2. VISI PENGABDIAN                         -->
    <!-- ========================================== -->
    <section id="visi-misi" class="w-full bg-[#fafafa] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <!-- Section Header -->
            <div class="max-w-2xl mb-10 sm:mb-12">
                <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight"><span
                        class="text-[#BC0202]">Visi</span> Pengabdian</h2>
            </div>

            <!-- Official Vision Highlight Card (Rounded-xl, No Badge, No Gradient) -->
            <div class="rounded-xl border border-zinc-200 bg-white p-7 sm:p-10 shadow-sm relative overflow-hidden">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="max-w-3xl">
                        <h3
                            class="text-xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-950 tracking-tight leading-tight">
                            &ldquo;{{ !empty($profileSettings['vision']) ? $profileSettings['vision'] : '[Visi Pengabdian]' }}&rdquo;
                        </h3>
                    </div>
                    <div
                        class="shrink-0 flex flex-col justify-center items-start lg:items-end border-t lg:border-t-0 lg:border-l border-zinc-200 pt-4 lg:pt-0 lg:pl-8">
                        <span
                            class="text-lg sm:text-xl font-black text-[#BC0202] mt-1">{{ !empty($generalSettings['slogan']) ? $generalSettings['slogan'] : '[Slogan]' }}</span>
                    </div>
                </div>
            </div>

            <!-- Misi Pokok Grid dari Database (Hanya tampil jika ada data di database, tanpa raw/dummy fallback) -->
            @if (!empty($profileSettings['mission']) && is_array($profileSettings['mission']) && count($profileSettings['mission']) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ count($profileSettings['mission']) > 3 ? '4' : '3' }} gap-5 lg:gap-6 items-stretch mt-8">
                    @foreach ($profileSettings['mission'] as $m)
                        @php
                            $mText = is_array($m) ? $m['desc'] ?? ($m['text'] ?? '') : $m;
                        @endphp
                        @if (!empty(trim((string)$mText)))
                            <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-7 shadow-sm flex flex-col justify-between hover:border-zinc-300 transition-colors">
                                <div>
                                    <div class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm">
                                        {{ sprintf('%02d', $loop->iteration) }}
                                    </div>
                                    <p class="text-xs sm:text-[13px] text-zinc-700 mt-4 leading-relaxed font-semibold">
                                        {{ $mText }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 3. REKAM JEJAK PENGALAMAN & PENDIDIKAN     -->
    <!-- ========================================== -->
    <section id="pengalaman" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <!-- Section Header -->
            <div class="max-w-2xl mb-10 sm:mb-12">
                <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Rekam
                    <span class="text-[#BC0202]">Jejak</span> Pengalaman &amp; <span
                        class="text-[#BC0202]">Pendidikan</span>
                </h2>
            </div>

            @php
                $experiences = !empty($profileSettings['historyTrack']['experience']) ? $profileSettings['historyTrack']['experience'] : [
                    [
                        'title' => '[Pengalaman Karir / Organisasi 1]',
                        'institution' => '[Nama Lembaga / Instansi 1]',
                        'period' => '2024 – Sekarang',
                    ],
                    [
                        'title' => '[Pengalaman Karir / Organisasi 2]',
                        'institution' => '[Nama Lembaga / Instansi 2]',
                        'period' => '2018 – 2023',
                    ],
                    ['title' => '[Pengalaman Karir / Organisasi 3]', 'institution' => '[Nama Lembaga / Instansi 3]', 'period' => '2020 – 2023'],
                    ['title' => '[Pengalaman Karir / Organisasi 4]', 'institution' => '[Nama Lembaga / Instansi 4]', 'period' => '2015 – 2023'],
                ];
                $educations = !empty($profileSettings['historyTrack']['education']) ? $profileSettings['historyTrack']['education'] : [
                    [
                        'title' => '[Pendidikan Sarjana / Tinggi (S.M.)]',
                        'institution' => '[Nama Perguruan Tinggi]',
                        'period' => '2015 – 2019',
                    ],
                    [
                        'title' => '[Pendidikan Menengah Atas (SMA)]',
                        'institution' => '[Nama SMA / Sederajat]',
                        'period' => '2011 – 2014',
                    ],
                    [
                        'title' => '[Pendidikan Menengah Pertama (SMP)]',
                        'institution' => '[Nama SMP / Sederajat]',
                        'period' => '2008 – 2011',
                    ],
                    [
                        'title' => '[Pendidikan Tingkat Dasar (SD)]',
                        'institution' => '[Nama SD / Sederajat]',
                        'period' => '2002 – 2008',
                    ],
                ];
            @endphp

            <!-- 2 Separate Columns: Rekam Jejak Pengalaman & Riwayat Pendidikan -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">
                <!-- Column 1: Rekam Jejak Pengalaman -->
                <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
                    <div class="flex items-center justify-between pb-5 mb-5 border-b border-zinc-100">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base sm:text-lg font-bold text-zinc-950 tracking-tight">Rekam Jejak
                                    Pengalaman</h3>
                            </div>
                        </div>
                    </div>

                    <!-- List: Pengalaman -->
                    <div class="space-y-3">
                        @foreach ($experiences as $exp)
                            <div
                                class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3">
                                <div class="min-w-0 flex-1">
                                    <div class="font-bold text-xs sm:text-sm text-zinc-950 tracking-tight">
                                        {{ $exp['title'] }}</div>
                                    <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">
                                        {{ $exp['institution'] }}</div>
                                </div>
                                <div class="text-right shrink-0">
                                    <span
                                        class="inline-block text-[11px] sm:text-xs font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs">
                                        {{ $exp['period'] }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Column 2: Riwayat Pendidikan -->
                <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
                    <div class="flex items-center justify-between pb-5 mb-5 border-b border-zinc-100">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base sm:text-lg font-bold text-zinc-950 tracking-tight">Riwayat Pendidikan
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- List: Pendidikan -->
                    <div class="space-y-3">
                        @foreach ($educations as $edu)
                            <div
                                class="p-4 rounded-lg border border-zinc-200/90 bg-[#fafafa] hover:bg-white hover:border-zinc-300 transition-colors flex items-center justify-between gap-3">
                                <div class="min-w-0 flex-1">
                                    <div class="font-bold text-xs sm:text-sm text-zinc-950 tracking-tight">
                                        {{ $edu['title'] }}</div>
                                    <div class="text-[11px] sm:text-xs text-zinc-600 mt-0.5 truncate">
                                        {{ $edu['institution'] }}</div>
                                </div>
                                <div class="text-right shrink-0">
                                    <span
                                        class="inline-block text-[11px] sm:text-xs font-semibold px-2.5 py-1 rounded-md bg-white text-zinc-800 border border-zinc-200 shadow-2xs">
                                        {{ $edu['period'] }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 4. DUA BELAS ISU PENTING (GOODKIND.ID)     -->
    <!-- ========================================== -->
    <section id="isu-penting" class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200"
        x-data="{ isuFilter: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <!-- Section Header -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 sm:mb-12">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">
                        12 <span class="text-[#BC0202]">Isu</span> Penting</h2>
                </div>

                <!-- Filter Tabs for Isu Strategis (Horizontal Scroll on Mobile, Strictly No Pill) -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 max-w-full">
                    <button
                        type="button"
                        @click="isuFilter = 'all'"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-colors cursor-pointer shrink-0"
                        :class="isuFilter === 'all' ? 'bg-zinc-950 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                    >
                        Semua (12)
                    </button>
                    <button
                        type="button"
                        @click="isuFilter = 'gov'"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-colors cursor-pointer shrink-0"
                        :class="isuFilter === 'gov' ? 'bg-[#BC0202] text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                    >
                        Tata Kelola &amp; Hukum
                    </button>
                    <button
                        type="button"
                        @click="isuFilter = 'soc'"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-colors cursor-pointer shrink-0"
                        :class="isuFilter === 'soc' ? 'bg-[#BC0202] text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                    >
                        Sosial &amp; Warga
                    </button>
                    <button
                        type="button"
                        @click="isuFilter = 'env'"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-colors cursor-pointer shrink-0"
                        :class="isuFilter === 'env' ? 'bg-[#BC0202] text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                    >
                        Lingkungan &amp; Tata Kota
                    </button>
                </div>
            </div>

            @php
                $issues = !empty($profileSettings['issues']) ? $profileSettings['issues'] : array_map(function ($i) {
                    return [
                        'no' => $i,
                        'title' => '[Fokus Isu & Advokasi ' . $i . ']',
                        'desc' => '[Deskripsi Advokasi Isu ' . $i . ': Komitmen dan langkah kebijakan terkait isu ini.]',
                    ];
                }, range(1, 12));
            @endphp
            <!-- 12 Isu Grid (3 Columns Responsive) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                @foreach ($issues as $issue)
                    @php
                        $no = $issue['no'] ?? $loop->iteration;
                        $cat = $no <= 4 ? 'gov' : ($no <= 8 ? 'soc' : 'env');
                    @endphp
                    <div x-show="isuFilter === 'all' || isuFilter === '{{ $cat }}'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-zinc-300 p-6 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-base text-zinc-950 tracking-tight">{{ $issue['title'] }}</h3>
                            <p class="text-xs text-zinc-600 mt-2.5 leading-relaxed">
                                {{ $issue['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 5. ENAM PILAR PROGRAM PENGABDIAN           -->
    <!-- ========================================== -->
    <section class="w-full bg-white py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <h2 class="text-2xl sm:text-4xl lg:text-[40px] text-zinc-950 font-bold leading-[1.18] tracking-tight">Enam
                    <span class="text-[#BC0202]">Fokus</span> Program
                </h2>
            </div>

            @php
                $programs = !empty($profileSettings['programs']) ? $profileSettings['programs'] : array_map(function ($i) {
                    return [
                        'no' => $i,
                        'title' => '[Program Kerja ' . $i . ']',
                        'desc' => '[Deskripsi Program Kerja ' . $i . ': Penjelasan inisiatif program pengabdian masyarakat.]',
                    ];
                }, range(1, 6));
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                @foreach ($programs as $progIdx => $prog)
                    <div
                        class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:border-zinc-300 transition-colors flex flex-col justify-between">
                        <div>
                            <div
                                class="w-10 h-10 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center font-bold text-sm">
                                {{ sprintf('%02d', $prog['no'] ?? $progIdx + 1) }}</div>
                            <h3 class="font-bold text-base text-zinc-950 mt-4 flex items-center tracking-tight"><span
                                    class="text-[#BC0202] font-black mr-2">|</span> {{ $prog['title'] }}</h3>
                            <p class="text-xs text-zinc-600 mt-2.5 leading-relaxed">{{ $prog['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('kinerja.index') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-6 py-3 shadow-sm transition-colors">
                    Lihat Laporan Pelaksanaan Program &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 6. KOLASE FOTO DOKUMENTASI & PROFIL LAPANGAN (BENTO UI)  -->
    <!-- ======================================================== -->
    <section id="dokumentasi-profil" class="w-full bg-[#f4f4f5] py-16 sm:py-20 lg:py-24 border-b border-zinc-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
            @php
                $profileCollage = [];
                foreach ([0, 1, 2, 3, 4] as $pIdx) {
                    if (!empty($profileSettings['collage'][$pIdx]['image'])) {
                        $profileCollage[] = [
                            'url' => asset($profileSettings['collage'][$pIdx]['image']),
                            'title' => $profileSettings['collage'][$pIdx]['label'] ?? ('Dokumentasi Profil ' . ($pIdx + 1)),
                        ];
                    }
                }
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-5">
                <div
                    @if (!empty($profileSettings['collage'][0]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($profileCollage) }}, index: 0 })"
                    @endif
                    class="lg:col-span-7 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[320px] sm:min-h-[380px] lg:min-h-[420px] flex flex-col justify-end">
                    @if (!empty($profileSettings['collage'][0]['image']))
                        <img src="{{ asset($profileSettings['collage'][0]['image']) }}"
                            alt="{{ $profileSettings['collage'][0]['label'] ?? '[Dokumentasi Profil 1]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
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

                <div
                    @if (!empty($profileSettings['collage'][1]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($profileCollage) }}, index: 1 })"
                    @endif
                    class="lg:col-span-5 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[250px] sm:min-h-[300px] lg:min-h-[420px] flex flex-col justify-end">
                    @if (!empty($profileSettings['collage'][1]['image']))
                        <img src="{{ asset($profileSettings['collage'][1]['image']) }}"
                            alt="{{ $profileSettings['collage'][1]['label'] ?? '[Dokumentasi Profil 2]' }}"
                            class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
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

                <div
                    @if (!empty($profileSettings['collage'][2]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($profileCollage) }}, index: 2 })"
                    @endif
                    class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
                    @if (!empty($profileSettings['collage'][2]['image']))
                        <img src="{{ asset($profileSettings['collage'][2]['image']) }}"
                            alt="{{ $profileSettings['collage'][2]['label'] ?? '[Dokumentasi Profil 3]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
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

                <div
                    @if (!empty($profileSettings['collage'][3]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($profileCollage) }}, index: 3 })"
                    @endif
                    class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
                    @if (!empty($profileSettings['collage'][3]['image']))
                        <img src="{{ asset($profileSettings['collage'][3]['image']) }}"
                            alt="{{ $profileSettings['collage'][3]['label'] ?? '[Dokumentasi Profil 4]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
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

                <div
                    @if (!empty($profileSettings['collage'][4]['image']))
                        @click="$dispatch('open-lightbox', { images: {{ json_encode($profileCollage) }}, index: 4 })"
                    @endif
                    class="lg:col-span-4 rounded-2xl border border-zinc-200 bg-white overflow-hidden shadow-sm relative group cursor-pointer min-h-[240px] sm:min-h-[280px] flex flex-col justify-end">
                    @if (!empty($profileSettings['collage'][4]['image']))
                        <img src="{{ asset($profileSettings['collage'][4]['image']) }}"
                            alt="{{ $profileSettings['collage'][4]['label'] ?? '[Dokumentasi Profil 5]' }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
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

    <!-- ========================================== -->
    <!-- 7. KUTIPAN BANU LESMANA BAGASKARA, S.M.   -->
    <!-- ========================================== -->
    @php
        $quoteData = !empty($profileSettings['quote']) ? $profileSettings['quote'] : [
            'text' =>
                '[Kutipan Komitmen Pengabdian: Nilai integritas, kerja nyata, dan dedikasi penuh untuk kemaslahatan warga Kota Bogor.]',
            'author' => '[Nama Anggota Dewan]',
            'role' => '[Komisi / Fraksi DPRD]',
        ];
        $quoteText = is_array($quoteData) ? $quoteData['text'] ?? '' : $quoteData;
        $quoteAuthor = is_array($quoteData)
            ? $quoteData['author'] ?? '[Nama Anggota Dewan]'
            : '[Nama Anggota Dewan]';
        $quoteRole = is_array($quoteData) ? $quoteData['role'] ?? '' : '';
    @endphp
    <section class="w-full bg-[#fafafa] py-16 sm:py-20 border-b border-zinc-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
            <div class="w-12 h-1 bg-[#BC0202] mx-auto mb-6 rounded-sm"></div>
            <blockquote class="text-lg sm:text-2xl lg:text-[26px] font-bold text-zinc-950 leading-snug tracking-tight">
                &ldquo;{{ $quoteText }}&rdquo;
            </blockquote>
            <div class="mt-6 flex flex-col items-center justify-center">
                <span class="font-bold text-sm text-zinc-950">{{ $quoteAuthor }}</span>
                @if (!empty($quoteRole))
                    <span class="text-xs text-zinc-500 mt-0.5">{{ str_replace('&bull;', '•', $quoteRole) }}</span>
                @endif
            </div>
        </div>
    </section>

    <!-- ======================================================== -->
    <!-- 8. CTA KOTAK ASPIRASI (MINIMALIS)                        -->
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
