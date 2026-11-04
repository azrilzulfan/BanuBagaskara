@extends('layouts.admin')

@section('title', 'Pengaturan Halaman Website | Dasbor Admin Banu Lesmana Bagaskara, S.M.')

@php
  $defaultUmum = [
    'siteTitle' => 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024-2029',
    'slogan' => 'Bogor Lebih Baik',
    'visionSlogan' => 'Kota Bogor yang Maju dan Nyaman untuk Semua',
    'officeRole' => 'Anggota DPRD Kota Bogor (Dapil Kota Bogor 4 / Tanah Sareal, Komisi 1)',
    'party' => 'PDI Perjuangan',
    'address' => 'Kelurahan Kedung Badak, Kecamatan Tanah Sareal, Kota Bogor, Jawa Barat',
    'phone' => '+62 812-8888-0000',
    'email' => 'aspirasi@banubagaskara.id',
    'socials' => [
      'instagram' => 'https://instagram.com/banubagaskara',
      'tiktok' => 'https://tiktok.com/@banubagaskara',
      'facebook' => 'https://facebook.com/banubgsk',
    ],
    'footerQuote' => 'Mengabdi dengan integritas, hadir memberi solusi nyata untuk warga Kota Bogor.',
    'logo' => null,
    'favicon' => null,
  ];

  $defaultBeranda = [
    'hero' => [
      'headline' => 'Mengabdi dengan Integritas, Bekerja Nyata untuk Warga Bogor',
      'description' => 'Kanal transparansi kinerja, advokasi aspirasi masyarakat, dan informasi program kerja kedewanan Banu Lesmana Bagaskara, S.M. di DPRD Kota Bogor.',
      'ctaSecondaryText' => 'Kenali Banu Bagaskara',
      'ctaSecondaryLink' => route('profile'),
      'heroImage' => 'assets/banu/hero_banu.jpg',
    ],
    'banner' => [
      'enabled' => true,
      'title' => 'Layanan Ambulance Siaga 24 Jam Gratis',
      'subtitle' => 'Tanggap darurat medis & pendampingan rujukan pasien RSUD se-Kecamatan Tanah Sareal',
      'image' => 'assets/banu/banner_serbaguna.jpg',
      'linkUrl' => route('kontak.index'),
      'buttonText' => 'Hubungi Hotline Ambulance',
    ],
    'collage' => [
      ['label' => 'Dialog Serap Aspirasi Warga', 'image' => 'assets/banu/testi_dialog.jpg', 'tag' => 'Aspirasi'],
      ['label' => 'Armada Ambulance Siaga 24 Jam', 'image' => 'assets/banu/program_ambulance.jpg', 'tag' => 'Layanan'],
      ['label' => 'Bimbingan NIB & Usaha UMKM', 'image' => 'assets/banu/program_umkm.jpg', 'tag' => 'Ekonomi'],
      ['label' => 'Guyub Gotong Royong Komunitas', 'image' => 'assets/banu/footer_community.jpg', 'tag' => 'Sosial'],
    ],
    'programs' => [
      ['no' => 1, 'title' => 'Rumah Aspirasi Rakyat', 'desc' => 'Rumah singgah terbuka di Kedung Badak buat warga yang mau ngobrol santai, sampaikan unek-unek lingkungan, atau butuh bantuan advokasi dewan.'],
      ['no' => 2, 'title' => 'Ambulance Siaga 24 Jam', 'desc' => 'Layanan ambulance gratis bareng relawan yang siap antar jemput warga sakit atau darurat medis kapan saja tanpa dipungut biaya.'],
      ['no' => 3, 'title' => 'Transparansi APBD & E-Gov', 'desc' => 'Mendorong pengawasan publik terbuka dan digitalisasi administrasi Kota Bogor agar alokasi anggaran tepat sasaran dan terbebas dari kebocoran.'],
      ['no' => 4, 'title' => 'Wajib Belajar Anak Kota Bogor', 'desc' => 'Mencegah anak putus sekolah melalui advokasi alokasi beasiswa daerah serta perlindungan hak anak untuk menuntaskan pendidikan 12 tahun.'],
      ['no' => 5, 'title' => 'Kota Bogor Tanpa Tawuran', 'desc' => 'Membina generasi muda melalui wadah riset kreatif, pelatihan keahlian kerja, dan kompetisi olahraga lingkungan yang positif dan bebas kekerasan.'],
      ['no' => 6, 'title' => 'Digitalisasi UMKM RT/RW', 'desc' => 'Pendampingan izin NIB resmi, sertifikasi halal gratis, pelatihan pemasaran produk digital, serta akses kemitraan permodalan usaha keluarga.'],
    ],
    'testimonials' => [
      [
        'name' => 'Ibu Suryati Ningsih',
        'role' => 'Warga Kel. Kedung Badak, Tanah Sareal',
        'quote' => 'Waktu keluarga kami membutuhkan rujukan darurat tengah malam, tim Ambulance Siaga Rumah Aspirasi langsung sigap datang menjemput dan mengawal proses administrasi di RSUD tanpa biaya sepeser pun. Nyata manfaatnya bagi warga kecil.',
      ],
      [
        'name' => 'Bpk. Rahmat Hidayat',
        'role' => 'Ketua RW 05, Kel. Kebon Pedes',
        'quote' => 'Saat kami menyampaikan masalah drainase gang yang kerap meluap ketika hujan lebat di Kebon Pedes, beliau langsung turun meninjau bersama dinas terkait. Responnya cepat dan komunikasinya sangat terbuka tanpa birokrasi berbelit.',
      ],
      [
        'name' => 'Bpk. Hendra Gunawan',
        'role' => 'Tokoh Masyarakat Kel. Sukadamai',
        'quote' => 'Usulan perbaikan drainase lingkungan dan penerangan jalan gang yang kami sampaikan di reses dewan benar-benar dikawal serius hingga masuk prioritas realisasi APBD Kota Bogor. Komunikatif dan tidak berjarak dengan warga.',
      ],
    ],
  ];

  $defaultProfil = [
    'hero' => [
      'subtitle' => 'Pemuda berintegritas, wakil rakyat yang senantiasa hadir dan mendengarkan denyut suara warga Kota Bogor.',
      'heroImage' => 'assets/banu/hero_banu.jpg',
    ],
    'quote' => [
      'text' => 'Kursi di parlemen bukan privilese kekuasaan, melainkan mandat pengabdian rakyat yang harus dipertanggungjawabkan secara terbuka setiap waktu.',
      'author' => 'Banu Lesmana Bagaskara, S.M.',
      'role' => 'Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal',
    ],
    'vision' => 'Mewujudkan Kota Bogor yang maju, berkeadilan sosial, dan nyaman untuk semua warga melalui tata kelola kebijakan publik yang transparan dan akuntabel.',
    'mission' => [
      'Memperjuangkan pemenuhan hak-hak dasar warga di bidang pendidikan gratis, fasilitas kesehatan cepat, dan infrastruktur lingkungan yang tertata.',
      'Mendorong transparansi kebijakan publik dan keterbukaan alokasi anggaran APBD Kota Bogor yang berpihak penuh pada kepentingan rakyat.',
      'Menggerakkan potensi ekonomi rakyat melalui fasilitasi legalitas gratis, permodalan, dan digitalisasi UMKM berbasis RT/RW.',
      'Menjaga harmoni sosial, perlindungan perempuan dan anak, serta mewujudkan lingkungan Kota Bogor yang aman dan bebas tawuran.',
    ],
    'newMissionItem' => '',
    'historyTrack' => [
      'education' => [
        ['period' => '2015 – 2019', 'title' => 'Sarjana Manajemen (S.M.)', 'institution' => 'IBI Kesatuan Bogor'],
        ['period' => '2011 – 2014', 'title' => 'Sekolah Menengah Atas (SMA)', 'institution' => 'SMA Negeri 4 Bogor'],
        ['period' => '2008 – 2011', 'title' => 'Sekolah Menengah Pertama (SMP)', 'institution' => 'SMP Mardi Yuana Bogor'],
        ['period' => '2002 – 2008', 'title' => 'Sekolah Dasar (SD)', 'institution' => 'SD Mardi Yuana Bogor'],
      ],
      'experience' => [
        ['period' => '2024 – Sekarang', 'title' => 'Anggota DPRD Kota Bogor', 'institution' => 'DPRD Kota Bogor (Dapil 4 Tanah Sareal)'],
        ['period' => '2018 – 2023', 'title' => 'Direktur Utama', 'institution' => 'PT. Kreasi Baraya Mandiri'],
        ['period' => '2020 – 2023', 'title' => 'Direktur', 'institution' => 'CV. Putra Baraya Mandiri'],
        ['period' => '2015 – 2023', 'title' => 'Pimpinan', 'institution' => 'KSU Karya Mandiri'],
      ],
    ],
    'issues' => [
      ['no' => 1, 'title' => 'Aparat Daerah (DPRD, Pemda)', 'desc' => 'Pengawasan kinerja birokrasi pemda, percepatan digitalisasi pelayanan publik (e-gov), serta transparansi alokasi belanja APBD Kota Bogor agar berdampak nyata bagi warga.'],
      ['no' => 2, 'title' => 'Korupsi, KPK', 'desc' => 'Mendukung pencegahan kebocoran anggaran publik, menolak praktik pungutan liar dalam perizinan UMKM, serta memastikan proses pengadaan barang dan jasa berjalan bersih.'],
      ['no' => 3, 'title' => 'Polisi & Peradilan', 'desc' => 'Mendorong penegakan hukum yang adil dan humanis tanpa diskriminasi, serta penyediaan fasilitas bantuan hukum advokasi bagi warga tidak mampu di Kota Bogor.'],
      ['no' => 4, 'title' => 'Berita Hoax yang Meresahkan', 'desc' => 'Penguatan literasi digital warga dan kanal verifikasi informasi resmi lingkungan untuk menangkal disinformasi provokatif demi ketenangan sosial di tingkat RT/RW.'],
      ['no' => 5, 'title' => 'Rawat Orang Tua, Disabilitas, Yatim, Orang Miskin', 'desc' => 'Penyediaan jaminan perlindungan sosial terpadu, pendampingan kesehatan lansia melalui ambulans siaga 24 jam, pemenuhan hak anak yatim, dan aksesibilitas ramah disabilitas.'],
      ['no' => 6, 'title' => 'Kebebasan & Kerukunan Beragama', 'desc' => 'Merawat harmoni antarumat beragama, menjamin hak beribadah secara aman bagi semua kalangan, dan mempererat dialog lintas keyakinan di wilayah Tanah Sareal.'],
      ['no' => 7, 'title' => 'Pancasila, Terorisme, Keamanan', 'desc' => 'Pengamalan nilai-nilai ideologis Pancasila dalam keseharian, pencegahan radikalisme, serta penguatan pos ronda dan ketertiban lingkungan permukiman warga.'],
      ['no' => 8, 'title' => 'Isu Moralitas Masyarakat', 'desc' => 'Aksi konkret penanganan dan pencegahan tawuran pelajar melalui wadah riset kreatif, pelatihan vokasi pemuda, dan kompetisi olahraga antar-kelurahan yang terarah.'],
      ['no' => 9, 'title' => 'Kebersihan Lingkungan', 'desc' => 'Revitalisasi saluran air gang untuk mengatasi genangan banjir saat hujan deras, peremajaan armada pengangkut sampah, dan dukungan penguatan bank sampah RT/RW.'],
      ['no' => 10, 'title' => 'Polusi Udara, Sampah, dlsb.', 'desc' => 'Pemantauan kualitas udara di koridor padat Tanah Sareal, pembatasan timbulan sampah plastik sekali pakai, serta tata kelola pembuangan limbah terintegrasi.'],
      ['no' => 11, 'title' => 'Ruang Terbuka Hijau, Taman', 'desc' => 'Memperjuangkan penambahan taman tematik kelurahan, ruang bermain ramah anak yang aman, serta penghijauan peneduh di ruas-ruas jalan utama Kecamatan Tanah Sareal.'],
      ['no' => 12, 'title' => 'Perubahan Iklim & SDA', 'desc' => 'Konservasi daerah tangkapan dan resapan air di bantaran sungai, mitigasi risiko bencana tanah longsor saat musim hujan, serta pelestarian sumber daya alam lokal.'],
    ],
    'programs' => [
      ['no' => 1, 'title' => 'Rumah Aspirasi Rakyat', 'desc' => 'Rumah singgah terbuka di Kedung Badak buat warga yang mau ngobrol santai, sampaikan unek-unek lingkungan, atau butuh bantuan advokasi dewan.'],
      ['no' => 2, 'title' => 'Ambulance Siaga 24 Jam', 'desc' => 'Layanan ambulance gratis bareng relawan yang siap antar jemput warga sakit atau darurat medis kapan saja tanpa dipungut biaya.'],
      ['no' => 3, 'title' => 'Transparansi APBD & E-Gov', 'desc' => 'Mendorong pengawasan publik terbuka dan digitalisasi administrasi Kota Bogor agar alokasi anggaran tepat sasaran dan terbebas dari kebocoran.'],
      ['no' => 4, 'title' => 'Wajib Belajar Anak Kota Bogor', 'desc' => 'Mencegah anak putus sekolah melalui advokasi alokasi beasiswa daerah serta perlindungan hak anak untuk menuntaskan pendidikan 12 tahun.'],
      ['no' => 5, 'title' => 'Kota Bogor Tanpa Tawuran', 'desc' => 'Membina generasi muda melalui wadah riset kreatif, pelatihan keahlian kerja, dan kompetisi olahraga lingkungan yang positif dan bebas kekerasan.'],
      ['no' => 6, 'title' => 'Digitalisasi UMKM RT/RW', 'desc' => 'Pendampingan izin NIB resmi, sertifikasi halal gratis, pelatihan pemasaran produk digital, serta akses kemitraan permodalan usaha keluarga.'],
    ],
    'collage' => [
      ['label' => 'Dialog Aspirasi Warga Kebon Pedes', 'image' => 'assets/banu/testi_dialog.jpg', 'tag' => 'Aspirasi'],
      ['label' => 'Sidang Paripurna & Pengawasan APBD di Parlemen', 'image' => 'assets/banu/hero_banu.jpg', 'tag' => 'Parlemen'],
      ['label' => 'Operasional Ambulance Siaga 24 Jam', 'image' => 'assets/banu/program_ambulance.jpg', 'tag' => 'Layanan'],
      ['label' => 'Pelatihan Digitalisasi UMKM RT/RW', 'image' => 'assets/banu/program_umkm.jpg', 'tag' => 'Ekonomi'],
      ['label' => 'Rembug Guyub Komunitas Warga', 'image' => 'assets/banu/footer_community.jpg', 'tag' => 'Komunitas'],
    ],
  ];

  $defaultSeo = [
    'metaTitle' => 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor Dapil 4 Tanah Sareal',
    'metaDescription' => 'Website resmi kanal informasi profil, rekam jejak, transparansi hasil kinerja, rilis berita, galeri kegiatan, dan formulir kotak aspirasi warga Banu Lesmana Bagaskara, S.M.',
    'keywords' => 'Banu Lesmana Bagaskara, DPRD Kota Bogor, Tanah Sareal, PDI Perjuangan, Rumah Aspirasi, Ambulance Siaga Bogor, Hasil Kinerja DPRD, Aspirasi Warga Bogor',
    'ogImage' => 'assets/banu/hero_banu.jpg',
    'canonicalUrl' => 'https://banubagaskara.id',
    'enableIndexing' => true,
    'googleSearchConsoleTag' => 'google-site-verification=SAMPLE_CODE_BLB_2026',
  ];

  $initialUmum = array_replace_recursive($defaultUmum, is_array($general) ? $general : []);
  $initialBeranda = array_replace_recursive($defaultBeranda, is_array($home) ? $home : []);
  $initialProfil = array_replace_recursive($defaultProfil, is_array($profile) ? $profile : []);
  $initialSeo = array_replace_recursive($defaultSeo, is_array($seo) ? $seo : []);

  // Pastikan programs ada pada beranda bila belum tersimpan
  if (empty($initialBeranda['programs']) && !empty($initialProfil['programs'])) {
      $initialBeranda['programs'] = $initialProfil['programs'];
  }
  // Pastikan testimonials ada pada beranda
  if (empty($initialBeranda['testimonials'])) {
      $initialBeranda['testimonials'] = $defaultBeranda['testimonials'];
  }
  // Pastikan collage ada pada profil bila belum tersimpan
  if (empty($initialProfil['collage'])) {
      $initialProfil['collage'] = $defaultProfil['collage'];
  }
  // Pastikan quote pada profil berbentuk terstruktur
  if (isset($initialProfil['quote']) && is_string($initialProfil['quote'])) {
      $initialProfil['quote'] = [
          'text' => $initialProfil['quote'],
          'author' => 'Banu Lesmana Bagaskara, S.M.',
          'role' => 'Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal',
      ];
  } elseif (empty($initialProfil['quote'])) {
      $initialProfil['quote'] = $defaultProfil['quote'];
  }
@endphp

@section('content')
<div
  x-data="adminPengaturan()"
  class="w-full flex-1 flex flex-col bg-[#fafafa]"
>
  <!-- Uploading Overlay Modal -->
  <div
    x-show="isUploading"
    x-cloak
    class="fixed inset-0 z-50 bg-black/40 backdrop-blur-xs flex items-center justify-center"
  >
    <div class="rounded-xl bg-white px-6 py-5 shadow-2xl flex items-center gap-4 text-xs font-semibold text-zinc-900 border border-zinc-200">
      <svg class="animate-spin h-5 w-5 text-[#BC0202]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
      </svg>
      <span x-text="uploadProgressText || 'Sedang mengunggah file gambar...'"></span>
    </div>
  </div>

  <!-- Notification Toast -->
  <div
    x-show="saveToast"
    x-transition
    x-cloak
    class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
  >
    <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
    <div>
      <span class="font-bold block" x-text="toastMessage"></span>
      <span class="text-emerald-800">Pembaruan telah tersimpan pada konfigurasi website.</span>
    </div>
  </div>

  @if (session('success'))
    <div
      x-data="{ show: true }"
      x-show="show"
      x-init="setTimeout(() => show = false, 4000)"
      class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
    >
      <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
      <div>
        <span class="font-bold block">{{ session('success') }}</span>
        <span class="text-emerald-800">Perubahan berhasil diperbarui pada sistem.</span>
      </div>
    </div>
  @endif

  <!-- Page Header & Action Bar -->
  <header class="bg-white border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-7">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-5">
      <div>
        <div class="flex items-center gap-2 text-xs font-semibold text-zinc-500 mb-1.5">
          <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-900 transition-colors">Dasbor Admin</a>
          <span>&rsaquo;</span>
          <span class="text-[#BC0202]">Pengaturan Website</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">
          Pengaturan Halaman Website &bull; <span class="text-[#BC0202]">Konfigurasi Konten</span>
        </h1>
        <p class="text-xs sm:text-sm text-zinc-600 mt-1 max-w-2xl leading-relaxed">
          Kelola data informasi umum, logo, favicon, narasi hero, upload foto, rekam jejak pendidikan/pengalaman, testimoni warga, kutipan dewan, dan optimasi SEO.
        </p>
      </div>

      <!-- Action Save Button -->
      <div class="flex items-center gap-3 shrink-0">
        <button
          type="button"
          @click="saveSettings()"
          class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-2 cursor-pointer"
        >
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          <span>Simpan Perubahan</span>
        </button>
      </div>
    </div>
  </header>

  <!-- Main Workspace Area with Category Tabs -->
  <div class="max-w-7xl mx-auto w-full px-4 sm:px-8 lg:px-10 py-8 space-y-6 flex-1">
    <!-- 4 Category Tabs Navigation -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-zinc-200 text-xs sm:text-sm font-semibold">
      <!-- Tab 1: Umum -->
      <button
        type="button"
        @click="activeTab = 'umum'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'umum' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <span>1. Informasi Umum &amp; Kontak</span>
      </button>

      <!-- Tab 2: Beranda -->
      <button
        type="button"
        @click="activeTab = 'beranda'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'beranda' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span>2. Halaman Beranda</span>
      </button>

      <!-- Tab 3: Profil -->
      <button
        type="button"
        @click="activeTab = 'profil'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'profil' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span>3. Halaman Profil (Kenali Saya)</span>
      </button>

      <!-- Tab 4: SEO -->
      <button
        type="button"
        @click="activeTab = 'seo'"
        class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0 cursor-pointer"
        :class="activeTab === 'seo' ? 'bg-[#BC0202] text-white shadow-xs' : 'bg-white border border-zinc-200 text-zinc-700 hover:bg-zinc-50 hover:text-zinc-950'"
      >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span>4. SEO &amp; Mesin Pencari</span>
      </button>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 1: PENGATURAN UMUM & KONTAK RESMI                    -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'umum'" x-cloak class="space-y-6">
      <!-- 1. Logo & Favicon Situs -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Logo &amp; Ikon Website (Favicon)</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Unggah identitas visual logo resmi untuk navigasi publik dan favicon peramban.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Logo Website -->
          <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
            <div class="flex items-center justify-between">
              <label class="text-xs font-bold text-zinc-900">Logo Website Utama</label>
              <span class="text-[11px] text-zinc-500">PNG / SVG Transparan</span>
            </div>

            <div class="h-28 rounded-lg border border-zinc-200 bg-white flex items-center justify-center p-3 overflow-hidden">
              <template x-if="umum.logo">
                <img :src="assetUrl(umum.logo)" alt="Logo Website" class="max-h-full max-w-full object-contain" />
              </template>
              <template x-if="!umum.logo">
                <div class="flex items-center gap-2.5 text-zinc-400 text-xs">
                  <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">BLB</div>
                  <span class="font-bold text-zinc-700">banubagaskara. (Default)</span>
                </div>
              </template>
            </div>

            <div class="flex items-center gap-2">
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Pilih &amp; Unggah Logo</span>
                <input
                  type="file"
                  accept="image/png,image/jpeg,image/svg+xml,image/webp"
                  @change="uploadFile($event, (path) => umum.logo = path)"
                  class="hidden"
                />
              </label>

              <button
                type="button"
                x-show="umum.logo"
                @click="umum.logo = null"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-red-50 hover:border-red-300 hover:text-red-700 text-zinc-700 text-xs font-semibold px-3 py-2 cursor-pointer transition-colors"
              >
                Reset Default
              </button>
            </div>
            <p class="text-[11px] text-zinc-500">Direkomendasikan rasio mendatar (horizontal) dengan latar belakang transparan.</p>
          </div>

          <!-- Favicon / Ikon Tab Browser -->
          <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
            <div class="flex items-center justify-between">
              <label class="text-xs font-bold text-zinc-900">Favicon (Ikon Tab Browser)</label>
              <span class="text-[11px] text-zinc-500">ICO / PNG / SVG</span>
            </div>

            <div class="h-28 rounded-lg border border-zinc-200 bg-white flex items-center justify-center p-3 overflow-hidden">
              <template x-if="umum.favicon">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 rounded-lg border border-zinc-200 p-1 flex items-center justify-center bg-zinc-50">
                    <img :src="assetUrl(umum.favicon)" alt="Favicon" class="w-8 h-8 object-contain" />
                  </div>
                  <span class="text-xs text-zinc-600 font-mono text-[11px] truncate max-w-[180px]" x-text="umum.favicon"></span>
                </div>
              </template>
              <template x-if="!umum.favicon">
                <div class="flex items-center gap-2 text-zinc-400 text-xs">
                  <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs">B</div>
                  <span class="text-zinc-600 font-medium">Favicon Default</span>
                </div>
              </template>
            </div>

            <div class="flex items-center gap-2">
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Pilih &amp; Unggah Favicon</span>
                <input
                  type="file"
                  accept="image/x-icon,image/png,image/svg+xml,image/jpeg,image/webp"
                  @change="uploadFile($event, (path) => umum.favicon = path)"
                  class="hidden"
                />
              </label>

              <button
                type="button"
                x-show="umum.favicon"
                @click="umum.favicon = null"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-red-50 hover:border-red-300 hover:text-red-700 text-zinc-700 text-xs font-semibold px-3 py-2 cursor-pointer transition-colors"
              >
                Reset Default
              </button>
            </div>
            <p class="text-[11px] text-zinc-500">Ikon kecil yang muncul di sebelah kiri judul tab peramban dan bookmark (32x32 atau 64x64 px).</p>
          </div>
        </div>
      </div>

      <!-- 2. Identitas Tokoh & Lembaga -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Identitas Tokoh &amp; Lembaga</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Informasi dasar nama, fraksi, komisi kedewanan, dan slogan kampanye resmi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <!-- Site Title -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Website Resmi</label>
            <input
              type="text"
              x-model="umum.siteTitle"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Slogan & Vision Tagline -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Slogan Gerakan</label>
            <input
              type="text"
              x-model="umum.slogan"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tagline Visi</label>
            <input
              type="text"
              x-model="umum.visionSlogan"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Jabatan Kedewanan & Partai -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Jabatan / Amanah Kedewanan</label>
            <input
              type="text"
              x-model="umum.officeRole"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Fraksi Partai</label>
            <input
              type="text"
              x-model="umum.party"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>
        </div>
      </div>

      <!-- 3. Kontak Rumah Aspirasi & Media Sosial -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Saluran Kontak &amp; Media Sosial</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Alamat sekretariat Rumah Aspirasi Rakyat, nomor hotline WhatsApp, email, dan akun medsos resmi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <!-- Alamat Sekretariat -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Alamat Rumah Aspirasi Rakyat (Tanah Sareal)</label>
            <textarea
              rows="2"
              x-model="umum.address"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            ></textarea>
          </div>

          <!-- Telepon & Email -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nomor Telepon / Hotline WhatsApp Warga</label>
            <input
              type="text"
              x-model="umum.phone"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Email Resmi Aduan</label>
            <input
              type="email"
              x-model="umum.email"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>

          <!-- Media Sosial -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Instagram URL</label>
            <input
              type="url"
              x-model="umum.socials.instagram"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">TikTok URL</label>
            <input
              type="url"
              x-model="umum.socials.tiktok"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Facebook Page URL</label>
            <input
              type="url"
              x-model="umum.socials.facebook"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 2: PENGATURAN HALAMAN BERANDA                        -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'beranda'" x-cloak class="space-y-6">
      <!-- 1. Hero Section Beranda -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section Beranda</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Teks tajuk pembuka, deskripsi pengantar, dan foto utama halaman beranda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Headline Utama (Judul Besar)</label>
            <input
              type="text"
              x-model="beranda.hero.headline"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Deskripsi Ringkas</label>
            <textarea
              rows="3"
              x-model="beranda.hero.description"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <!-- Hero Image Upload (Tanpa Select) -->
          <div class="md:col-span-2 pt-2 border-t border-zinc-100">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Hero Image (Foto Profil Utama Beranda)</label>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
              <div class="w-32 h-36 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden shrink-0">
                <img :src="assetUrl(beranda.hero.heroImage)" alt="Hero Preview" class="w-full h-full object-cover object-top" />
              </div>
              <div class="flex-1 space-y-2">
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Hero Beranda</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => beranda.hero.heroImage = path)"
                    class="hidden"
                  />
                </label>
                <p class="text-[11px] text-zinc-500">Unggah file foto potret resolusi tinggi (format JPG, PNG, atau WebP).</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Banner Program Beranda (Ambulance Siaga 24 Jam) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Banner Program Prioritas</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Banner visual penekanan program ambulance siaga 24 jam &amp; hotline darurat warga.</p>
          </div>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" x-model="beranda.banner.enabled" class="sr-only peer" />
            <div class="w-11 h-6 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#BC0202]"></div>
            <span class="ml-2 text-xs font-bold text-zinc-700" x-text="beranda.banner.enabled ? 'Aktif' : 'Nonaktif'"></span>
          </label>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5" x-show="beranda.banner.enabled">
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Banner</label>
            <input
              type="text"
              x-model="beranda.banner.title"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Sub-teks Keterangan</label>
            <input
              type="text"
              x-model="beranda.banner.subtitle"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Banner Image Upload (Tanpa Select) -->
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">File Banner Visual (Panorama)</label>
            <div class="aspect-[21/9] max-h-48 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden mb-3">
              <img :src="assetUrl(beranda.banner.image)" alt="Banner Preview" class="w-full h-full object-cover" />
            </div>
            <div>
              <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Unggah Foto Banner</span>
                <input
                  type="file"
                  accept="image/*"
                  @change="uploadFile($event, (path) => beranda.banner.image = path)"
                  class="hidden"
                />
              </label>
            </div>
            <p class="text-[11px] text-zinc-500 mt-1.5">Unggah foto berdimensi panorama (lebar) untuk banner sorotan.</p>
          </div>
        </div>
      </div>

      <!-- 3. Kolase Foto Bento Grid Beranda (Tanpa Select) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Kolase Foto Bento Grid Beranda</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Empat kartu visual yang menampilkan dokumentasi kegiatan nyata di halaman utama.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <template x-for="(card, cIdx) in beranda.collage" :key="cIdx">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
              <div class="flex items-center justify-between text-xs font-bold text-zinc-700">
                <span x-text="'Slot ' + (cIdx + 1) + ' (' + card.tag + ')'"></span>
              </div>
              <div class="aspect-[16/10] rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                <img :src="assetUrl(card.image)" :alt="card.label" class="w-full h-full object-cover" />
              </div>
              <div>
                <label class="block text-[11px] font-bold text-zinc-700 mb-1">Judul / Caption:</label>
                <input
                  type="text"
                  x-model="card.label"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                />
              </div>
              <div>
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-[11px] font-semibold px-2.5 py-1.5 cursor-pointer shadow-2xs transition-colors gap-1.5 w-full">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Slot Ini</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => card.image = path)"
                    class="hidden"
                  />
                </label>
              </div>
            </div>
          </template>
        </div>
      </div>

      <!-- 4. 6 Program Fokus Pengabdian (Tersinkronisasi dengan Profil) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <div class="flex items-center gap-2">
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">6 Program Fokus Pengabdian</h2>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-red-100 text-[#BC0202]">Sinkron dengan Profil</span>
          </div>
          <p class="text-xs text-zinc-500 mt-0.5">Enam program pengabdian utama warga Tanah Sareal yang tampil di Beranda dan Halaman Profil (otomatis tersinkron).</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <template x-for="(prog, pIdx) in beranda.programs" :key="prog.no">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-2.5">
              <div class="flex items-center gap-2">
                <span class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0" x-text="prog.no"></span>
                <input
                  type="text"
                  x-model="prog.title"
                  class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
              <textarea
                rows="3"
                x-model="prog.desc"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202] leading-relaxed"
              ></textarea>
            </div>
          </template>
        </div>
      </div>

      <!-- 5. Kelola Testimoni Warga (Suara & Aspirasi) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div class="flex items-center justify-between pb-1">
          <div>
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">Testimoni Warga (Suara &amp; Aspirasi)</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Kelola kartu testimoni apresiasi masyarakat Tanah Sareal yang tampil pada Bagian 6 Halaman Beranda.</p>
          </div>
          <button
            type="button"
            @click="addTestimonial()"
            class="inline-flex items-center gap-1.5 text-xs font-bold text-white bg-[#BC0202] hover:bg-[#830000] px-3.5 py-2 rounded-lg shadow-xs transition-colors cursor-pointer"
          >
            + Tambah Testimoni
          </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <template x-for="(testi, tIdx) in (beranda.testimonials || [])" :key="tIdx">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3 relative group flex flex-col justify-between">
              <div class="space-y-2.5">
                <div class="flex items-center justify-between">
                  <span class="text-xs font-bold text-zinc-700" x-text="'Testimoni #' + (tIdx + 1)"></span>
                  <button
                    type="button"
                    @click="removeTestimonial(tIdx)"
                    class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                    title="Hapus Testimoni Ini"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Nama Warga / Tokoh:</label>
                  <input
                    type="text"
                    x-model="testi.name"
                    placeholder="Contoh: Ibu Suryati Ningsih"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 font-bold focus:outline-none focus:border-[#BC0202]"
                  />
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Keterangan / Kelurahan:</label>
                  <input
                    type="text"
                    x-model="testi.role"
                    placeholder="Contoh: Warga Kel. Kedung Badak, Tanah Sareal"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202]"
                  />
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Isi Kutipan Testimoni:</label>
                  <textarea
                    rows="4"
                    x-model="testi.quote"
                    placeholder="Tulis kutipan testimoni warga..."
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-700 focus:outline-none focus:border-[#BC0202] leading-relaxed"
                  ></textarea>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 3: PENGATURAN HALAMAN PROFIL (KENALI SAYA)           -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'profil'" x-cloak class="space-y-6">
      <!-- 1. Hero Profil & Foto Profil Utama (Tanpa Select) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section Profil</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Subjudul narasi pengantar dan foto hero profil resmi Banu Lesmana Bagaskara, S.M.</p>
        </div>

        <div class="space-y-5">
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Subjudul Pengantar Profil</label>
            <textarea
              rows="3"
              x-model="profil.hero.subtitle"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <!-- Hero Image Profil Upload (Tanpa Select) -->
          <div class="pt-4 border-t border-zinc-100">
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Foto Hero Profil Resmi</label>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
              <div class="w-32 h-36 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden shrink-0">
                <img :src="assetUrl(profil.hero.heroImage)" alt="Hero Profil Preview" class="w-full h-full object-cover object-top" />
              </div>
              <div class="flex-1 space-y-2">
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold px-3.5 py-2 cursor-pointer shadow-2xs transition-colors gap-1.5">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Profil</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => profil.hero.heroImage = path)"
                    class="hidden"
                  />
                </label>
                <p class="text-[11px] text-zinc-500">Unggah foto potret resmi dewan beresolusi tinggi (format JPG, PNG, atau WebP).</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Kelola Kutipan Banu Lesmana Bagaskara, S.M. -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Kutipan Banu Lesmana Bagaskara, S.M.</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Kelola pernyataan kutipan integritas dan komitmen moral pengabdian dewan yang tampil pada Bagian 7 Halaman Profil.</p>
        </div>

        <div class="space-y-4">
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Kutipan Integritas</label>
            <textarea
              rows="3"
              x-model="profil.quote.text"
              placeholder="Tulis kalimat kutipan komitmen dewan..."
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nama Tokoh</label>
              <input
                type="text"
                x-model="profil.quote.author"
                placeholder="Banu Lesmana Bagaskara, S.M."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Keterangan / Jabatan</label>
              <input
                type="text"
                x-model="profil.quote.role"
                placeholder="Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- 3. Visi & Misi Resmi -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Visi &amp; Misi Resmi</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Rumusan visi pembangunan Kota Bogor dan poin-poin misi pengabdian.</p>
        </div>

        <div>
          <label class="block text-xs font-bold text-zinc-900 mb-1.5">Visi Pembangunan</label>
          <textarea
            rows="2"
            x-model="profil.vision"
            class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
          ></textarea>
        </div>

        <div>
          <label class="block text-xs font-bold text-zinc-900 mb-1.5">Daftar Poin Misi:</label>
          <div class="space-y-2.5">
            <template x-for="(m, mIdx) in profil.mission" :key="mIdx">
              <div class="flex items-start gap-2">
                <span class="w-6 h-6 rounded-md bg-zinc-100 text-zinc-700 flex items-center justify-center font-bold text-xs shrink-0 mt-2" x-text="mIdx + 1"></span>
                <textarea
                  rows="2"
                  x-model="profil.mission[mIdx]"
                  class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                ></textarea>
                <button
                  type="button"
                  @click="removeMission(mIdx)"
                  class="p-2 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors shrink-0 mt-1 cursor-pointer"
                  title="Hapus Misi"
                >
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </template>
          </div>

          <!-- Input Tambah Misi Baru -->
          <div class="mt-3 flex items-center gap-2">
            <input
              type="text"
              x-model="profil.newMissionItem"
              placeholder="Tulis poin misi baru..."
              class="flex-1 rounded-lg border border-zinc-300 bg-white px-3.5 py-2 text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
            />
            <button
              type="button"
              @click="addMission()"
              class="px-4 py-2 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold shadow-2xs transition-colors shrink-0 cursor-pointer"
            >
              + Tambah Misi
            </button>
          </div>
        </div>
      </div>

      <!-- 4. Rekam Jejak (Pendidikan & Pengalaman - Dapat Ditambah & Dikurang) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Rekam Jejak Pengalaman &amp; Riwayat Pendidikan</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Daftar riwayat akademis dan rekam jejak organisasi kemasyarakatan &amp; kedewanan. Anda dapat menambah dan menghapus entri.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Riwayat Pendidikan (Dapat Ditambah & Dikurang) -->
          <div class="space-y-3">
            <div class="flex items-center justify-between pb-1">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Riwayat Pendidikan</span>
              <button
                type="button"
                @click="addEducation()"
                class="inline-flex items-center gap-1 text-xs font-bold text-[#BC0202] hover:text-[#830000] cursor-pointer"
              >
                + Tambah Pendidikan
              </button>
            </div>

            <template x-for="(edu, eIdx) in profil.historyTrack.education" :key="eIdx">
              <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2 relative group">
                <div class="flex items-center justify-between">
                  <input
                    type="text"
                    x-model="edu.period"
                    placeholder="2015 – 2019"
                    class="w-36 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700 focus:outline-none focus:border-[#BC0202]"
                  />
                  <button
                    type="button"
                    @click="removeEducation(eIdx)"
                    class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                    title="Hapus Pendidikan Ini"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                <input
                  type="text"
                  x-model="edu.title"
                  placeholder="Gelar / Jenjang Pendidikan"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
                <input
                  type="text"
                  x-model="edu.institution"
                  placeholder="Nama Lembaga / Universitas"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
            </template>
          </div>

          <!-- Pengalaman Organisasi & Kerja (Dapat Ditambah & Dikurang) -->
          <div class="space-y-3">
            <div class="flex items-center justify-between pb-1">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Pengalaman Organisasi &amp; Amanah</span>
              <button
                type="button"
                @click="addExperience()"
                class="inline-flex items-center gap-1 text-xs font-bold text-[#BC0202] hover:text-[#830000] cursor-pointer"
              >
                + Tambah Pengalaman
              </button>
            </div>

            <template x-for="(exp, expIdx) in profil.historyTrack.experience" :key="expIdx">
              <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2 relative group">
                <div class="flex items-center justify-between">
                  <input
                    type="text"
                    x-model="exp.period"
                    placeholder="2024 – Sekarang"
                    class="w-36 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700 focus:outline-none focus:border-[#BC0202]"
                  />
                  <button
                    type="button"
                    @click="removeExperience(expIdx)"
                    class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                    title="Hapus Pengalaman Ini"
                  >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                <input
                  type="text"
                  x-model="exp.title"
                  placeholder="Posisi / Amanah Jabatan"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
                <input
                  type="text"
                  x-model="exp.institution"
                  placeholder="Instansi / Organisasi / Perusahaan"
                  class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
            </template>
          </div>
        </div>
      </div>

      <!-- 5. Kolase Foto Bento Grid Profil (5 Slot - Tanpa Select) -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Kolase Foto Dokumentasi Lapangan (Bento UI Profil)</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Lima slot kartu visual dokumentasi aksi nyata dan tinjauan lapangan di Halaman Profil.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <template x-for="(card, cIdx) in (profil.collage || [])" :key="cIdx">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-3">
              <div class="flex items-center justify-between text-xs font-bold text-zinc-700">
                <span x-text="'Slot ' + (cIdx + 1) + (card.tag ? ' (' + card.tag + ')' : '')"></span>
              </div>
              <div class="aspect-[16/10] rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                <img :src="assetUrl(card.image)" :alt="card.label" class="w-full h-full object-cover" />
              </div>
              <div>
                <label class="block text-[11px] font-bold text-zinc-700 mb-1">Judul / Caption:</label>
                <input
                  type="text"
                  x-model="card.label"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                />
              </div>
              <div>
                <label class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-[11px] font-semibold px-2.5 py-1.5 cursor-pointer shadow-2xs transition-colors gap-1.5 w-full">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                  <span>Unggah Foto Slot Ini</span>
                  <input
                    type="file"
                    accept="image/*"
                    @change="uploadFile($event, (path) => card.image = path)"
                    class="hidden"
                  />
                </label>
              </div>
            </div>
          </template>
        </div>
      </div>

      <!-- 6. 12 Isu Penting Strategis -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">12 Isu Penting Strategis</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Daftar 12 agenda prioritas advokasi warga Kota Bogor (berdasarkan data Goodkind KPU).</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <template x-for="(issue, iIdx) in profil.issues" :key="issue.no">
            <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
              <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-md bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0" x-text="issue.no"></span>
                <input
                  type="text"
                  x-model="issue.title"
                  class="flex-1 rounded border border-zinc-300 bg-white px-2.5 py-1 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
              <textarea
                rows="2"
                x-model="issue.desc"
                class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202] leading-relaxed"
              ></textarea>
            </div>
          </template>
        </div>
      </div>

      <!-- 7. 6 Program Fokus -->
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <div class="flex items-center gap-2">
            <h2 class="text-base sm:text-lg font-bold text-zinc-950">6 Program Fokus Pengabdian</h2>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-red-100 text-[#BC0202]">Sinkron dengan Beranda</span>
          </div>
          <p class="text-xs text-zinc-500 mt-0.5">Enam program andalan yang dijalankan secara konsisten untuk masyarakat Tanah Sareal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <template x-for="(prog, pIdx) in profil.programs" :key="prog.no">
            <div class="p-4 rounded-xl border border-zinc-200 bg-[#fafafa] space-y-2.5">
              <div class="flex items-center gap-2">
                <span class="w-7 h-7 rounded-lg bg-zinc-900 text-white flex items-center justify-center font-bold text-xs shrink-0" x-text="prog.no"></span>
                <input
                  type="text"
                  x-model="prog.title"
                  class="flex-1 rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs font-bold text-zinc-950 focus:outline-none focus:border-[#BC0202]"
                />
              </div>
              <textarea
                rows="3"
                x-model="prog.desc"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-600 focus:outline-none focus:border-[#BC0202] leading-relaxed"
              ></textarea>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- TAB 4: PENGATURAN SEO & METADATA MESIN PENCARI           -->
    <!-- ======================================================== -->
    <div x-show="activeTab === 'seo'" x-cloak class="space-y-6">
      <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
        <div>
          <h2 class="text-base sm:text-lg font-bold text-zinc-950">Optimasi Mesin Pencari (Search Engine Optimization)</h2>
          <p class="text-xs text-zinc-500 mt-0.5">Atur judul meta, deskripsi pencarian Google, kata kunci target, dan gambar pratinjau media sosial (OpenGraph).</p>
        </div>

        <div class="space-y-5">
          <!-- Meta Title -->
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block text-xs font-bold text-zinc-900">Meta Title Default</label>
              <span class="text-[11px] text-zinc-500" x-text="seo.metaTitle.length + '/60 karakter disarankan'"></span>
            </div>
            <input
              type="text"
              x-model="seo.metaTitle"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Meta Description -->
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block text-xs font-bold text-zinc-900">Meta Description</label>
              <span class="text-[11px] text-zinc-500" x-text="seo.metaDescription.length + '/160 karakter disarankan'"></span>
            </div>
            <textarea
              rows="3"
              x-model="seo.metaDescription"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
            ></textarea>
          </div>

          <!-- Keywords -->
          <div>
            <label class="block text-xs font-bold text-zinc-900 mb-1.5">Target Kata Kunci (Dipisahkan Tanda Koma)</label>
            <input
              type="text"
              x-model="seo.keywords"
              class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
            />
          </div>

          <!-- Canonical URL & Search Console Code -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Canonical URL Domain</label>
              <input
                type="url"
                x-model="seo.canonicalUrl"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Google Search Console Verification Tag</label>
              <input
                type="text"
                x-model="seo.googleSearchConsoleTag"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
              />
            </div>
          </div>

          <!-- Google Search Result Simulation Preview -->
          <div class="pt-4 border-t border-zinc-100">
            <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block mb-2.5">Pratinjau Hasil Pencarian Google (SERP Preview)</span>
            <div class="p-4 rounded-xl border border-zinc-200 bg-white shadow-2xs max-w-2xl font-sans">
              <div class="flex items-center gap-2 text-xs text-zinc-600 mb-1">
                <span class="w-4 h-4 rounded-full bg-[#BC0202] text-white flex items-center justify-center font-bold text-[9px]">B</span>
                <span class="truncate" x-text="seo.canonicalUrl">https://banubagaskara.id</span>
                <span>&rsaquo; profil</span>
              </div>
              <div class="text-base sm:text-lg font-semibold text-[#1a0dab] hover:underline cursor-pointer truncate" x-text="seo.metaTitle"></div>
              <div class="text-xs text-zinc-600 mt-1 line-clamp-2 leading-relaxed" x-text="seo.metaDescription"></div>
            </div>
          </div>

          <!-- Indexing Toggle -->
          <div class="pt-4 border-t border-zinc-100 flex items-center justify-between">
            <div>
              <span class="text-xs font-bold text-zinc-900 block">Izinkan Mesin Pencari Mengindeks Website (Index / Noindex)</span>
              <span class="text-[11px] text-zinc-500 block mt-0.5">Aktifkan agar Googlebot dapat merayapi seluruh halaman publik.</span>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" x-model="seo.enableIndexing" class="sr-only peer" />
              <div class="w-11 h-6 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#BC0202]"></div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Minimalist Admin Footer (#000000) -->
  <footer class="w-full bg-[#000000] text-white py-8 border-t border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-[11px]">BLB</div>
        <span class="text-xs font-semibold text-zinc-300">Modul Pengaturan Halaman Website &bull; Banu Lesmana Bagaskara, S.M.</span>
      </div>
      <div class="text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
    </div>
  </footer>
</div>
@endsection

@push('scripts')
<script>
  function adminPengaturan() {
    return {
      activeTab: 'umum',
      saveToast: false,
      toastMessage: 'Pengaturan berhasil disimpan!',
      isUploading: false,
      uploadProgressText: '',

      umum: @json($initialUmum),
      beranda: @json($initialBeranda),
      profil: @json($initialProfil),
      seo: @json($initialSeo),

      assetUrl(path) {
        if (!path) return '';
        if (path.startsWith('http://') || path.startsWith('https://')) return path;
        const clean = path.replace(/^\/+/, '');
        return '{{ url('/') }}/' + clean;
      },

      uploadFile(event, callback) {
        const file = event.target.files && event.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('file', file);

        this.isUploading = true;
        this.uploadProgressText = 'Mengunggah ' + file.name + '...';

        fetch('{{ route("admin.upload") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          this.isUploading = false;
          if (data && data.success) {
            callback(data.path);
            this.toastMessage = 'File berhasil diunggah!';
            this.saveToast = true;
            setTimeout(() => { this.saveToast = false; }, 3000);
          } else {
            alert((data && data.message) ? data.message : 'Gagal mengunggah file.');
          }
        })
        .catch(err => {
          this.isUploading = false;
          alert('Terjadi kesalahan koneksi saat mengunggah file.');
        })
        .finally(() => {
          event.target.value = '';
        });
      },

      addMission() {
        if (this.profil.newMissionItem && this.profil.newMissionItem.trim() !== '') {
          this.profil.mission.push(this.profil.newMissionItem.trim());
          this.profil.newMissionItem = '';
        }
      },

      removeMission(index) {
        this.profil.mission.splice(index, 1);
      },

      addEducation() {
        if (!this.profil.historyTrack) {
          this.profil.historyTrack = { education: [], experience: [] };
        }
        if (!Array.isArray(this.profil.historyTrack.education)) {
          this.profil.historyTrack.education = [];
        }
        this.profil.historyTrack.education.push({
          period: '2024 – Sekarang',
          title: 'Gelar / Jenjang Pendidikan Baru',
          institution: 'Nama Sekolah / Perguruan Tinggi'
        });
      },

      removeEducation(index) {
        if (confirm('Apakah Anda yakin ingin menghapus riwayat pendidikan ini?')) {
          this.profil.historyTrack.education.splice(index, 1);
        }
      },

      addExperience() {
        if (!this.profil.historyTrack) {
          this.profil.historyTrack = { education: [], experience: [] };
        }
        if (!Array.isArray(this.profil.historyTrack.experience)) {
          this.profil.historyTrack.experience = [];
        }
        this.profil.historyTrack.experience.push({
          period: '2024 – Sekarang',
          title: 'Posisi / Amanah Jabatan Baru',
          institution: 'Instansi / Organisasi / Komunitas'
        });
      },

      removeExperience(index) {
        if (confirm('Apakah Anda yakin ingin menghapus rekam jejak pengalaman ini?')) {
          this.profil.historyTrack.experience.splice(index, 1);
        }
      },

      addTestimonial() {
        if (!Array.isArray(this.beranda.testimonials)) {
          this.beranda.testimonials = [];
        }
        this.beranda.testimonials.push({
          name: 'Nama Warga Baru',
          role: 'Warga Kelurahan / Komunitas',
          quote: 'Tuliskan pengalaman atau manfaat nyata yang dirasakan oleh warga di sini...'
        });
      },

      removeTestimonial(index) {
        if (confirm('Apakah Anda yakin ingin menghapus testimoni ini?')) {
          this.beranda.testimonials.splice(index, 1);
        }
      },

      saveSettings() {
        // Sinkronkan 6 program antara Beranda dan Profil secara client-side
        if (this.activeTab === 'beranda' && Array.isArray(this.beranda.programs)) {
          this.profil.programs = JSON.parse(JSON.stringify(this.beranda.programs));
        } else if (this.activeTab === 'profil' && Array.isArray(this.profil.programs)) {
          this.beranda.programs = JSON.parse(JSON.stringify(this.profil.programs));
        }

        const groupMap = {
          'umum': 'general',
          'beranda': 'home',
          'profil': 'profile',
          'seo': 'seo'
        };
        const currentGroup = groupMap[this.activeTab] || this.activeTab;
        const currentData = this[this.activeTab];

        fetch('{{ route("admin.pengaturan.update") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            group: currentGroup,
            data: currentData
          })
        }).then(r => r.json()).then(data => {
          if (data && data.success) {
            this.toastMessage = data.message || 'Pengaturan berhasil disimpan!';
            this.saveToast = true;
            setTimeout(() => { this.saveToast = false; }, 3500);
          } else {
            alert((data && data.message) ? data.message : 'Gagal menyimpan pengaturan.');
          }
        }).catch(() => {
          alert('Terjadi kesalahan jaringan.');
        });
      }
    };
  }
</script>
@endpush
