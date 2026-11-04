<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan Halaman Website | Dasbor Admin Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine Component for Website Settings -->
    <script>
      function adminPengaturan() {
        return {
          mobileMenu: false,
          activeTab: 'umum', // 'umum', 'beranda', 'profil', 'seo'
          saveToast: false,
          toastMessage: 'Pengaturan berhasil disimpan!',

          // 1. DATA UMUM (Official Facts from Goodkind & KPU)
          umum: Object.assign({
            siteTitle: 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024-2029',
            slogan: 'Bogor Lebih Baik',
            visionSlogan: 'Kota Bogor yang Maju dan Nyaman untuk Semua',
            officeRole: 'Anggota DPRD Kota Bogor (Dapil Kota Bogor 4 / Tanah Sareal, Komisi 1)',
            party: 'PDI Perjuangan',
            address: 'Kelurahan Kedung Badak, Kecamatan Tanah Sareal, Kota Bogor, Jawa Barat',
            phone: '+62 812-8888-0000',
            email: 'aspirasi@banubagaskara.id',
            socials: {
              instagram: 'https://instagram.com/banubagaskara',
              tiktok: 'https://tiktok.com/@banubagaskara',
              facebook: 'https://facebook.com/banubgsk',
            },
            footerQuote: 'Mengabdi dengan integritas, hadir memberi solusi nyata untuk warga Kota Bogor.',
          }, {{ Js::from($general ?? []) }}),

          // 2. DATA HALAMAN BERANDA
          beranda: {
            hero: {
              badge: 'Amanah Warga Tanah Sareal &bull; Periode 2024–2029',
              headline: 'Mengabdi dengan Integritas, Bekerja Nyata untuk Warga Bogor',
              description:
                'Kanal transparansi kinerja, advokasi aspirasi masyarakat, dan informasi program kerja kedewanan Banu Lesmana Bagaskara, S.M. di DPRD Kota Bogor.',
              ctaPrimaryText: 'Sampaikan Aspirasi',
              ctaPrimaryLink: 'kontak.html#aspirasi',
              ctaSecondaryText: 'Lihat Kinerja',
              ctaSecondaryLink: 'kinerja.html',
              heroImage: '/assets/banu/hero_banu.jpg',
            },
            banner: {
              enabled: true,
              title: 'Layanan Ambulance Siaga 24 Jam Gratis',
              subtitle: 'Tanggap darurat medis & pendampingan rujukan pasien RSUD se-Kecamatan Tanah Sareal',
              image: '/assets/banu/banner_serbaguna.jpg',
              linkUrl: 'kontak.html#aspirasi',
              buttonText: 'Hubungi Hotline Ambulance',
            },
            collage: [
              { label: 'Dialog Serap Aspirasi Warga', image: '/assets/banu/testi_dialog.jpg', tag: 'Aspirasi' },
              { label: 'Armada Ambulance Siaga 24 Jam', image: '/assets/banu/program_ambulance.jpg', tag: 'Layanan' },
              { label: 'Bimbingan NIB & Usaha UMKM', image: '/assets/banu/program_umkm.jpg', tag: 'Ekonomi' },
              { label: 'Guyub Gotong Royong Komunitas', image: '/assets/banu/footer_community.jpg', tag: 'Sosial' },
            ],
          },

          // 3. DATA HALAMAN PROFIL (KENALI SAYA)
          profil: {
            hero: {
              title: 'Kenali Banu Lesmana Bagaskara, S.M.',
              subtitle: 'Pemuda berintegritas, wakil rakyat yang senantiasa hadir dan mendengarkan denyut suara warga Kota Bogor.',
              heroImage: '/assets/banu/hero_banu.jpg',
            },
            vision: 'Mewujudkan Kota Bogor yang maju, berkeadilan sosial, dan nyaman untuk semua warga melalui tata kelola kebijakan publik yang transparan dan akuntabel.',
            mission: [
              'Memperjuangkan pemenuhan hak-hak dasar warga di bidang pendidikan gratis, fasilitas kesehatan cepat, dan infrastruktur lingkungan yang tertata.',
              'Mendorong transparansi kebijakan publik dan keterbukaan alokasi anggaran APBD Kota Bogor yang berpihak penuh pada kepentingan rakyat.',
              'Menggerakkan potensi ekonomi rakyat melalui fasilitasi legalitas gratis, permodalan, dan digitalisasi UMKM berbasis RT/RW.',
              'Menjaga harmoni sosial, perlindungan perempuan dan anak, serta mewujudkan lingkungan Kota Bogor yang aman dan bebas tawuran.',
            ],
            newMissionItem: '',
            historyTrack: {
              education: [
                { period: '2018 - 2022', title: 'Sarjana Manajemen (S.M.)', institution: 'Fakultas Ekonomi dan Bisnis' },
                { period: '2015 - 2018', title: 'Sekolah Menengah Atas (SMA)', institution: 'SMA Negeri di Kota Bogor' },
                { period: '2012 - 2015', title: 'Sekolah Menengah Pertama (SMP)', institution: 'SMP Negeri di Kota Bogor' },
              ],
              experience: [
                { period: '2024 - Sekarang', title: 'Anggota Komisi 1 DPRD Kota Bogor', institution: 'Fraksi PDI Perjuangan - Dapil 4 Tanah Sareal' },
                { period: '2023 - Sekarang', title: 'Inisiator Rumah Aspirasi Rakyat & Ambulance Siaga', institution: 'Kecamatan Tanah Sareal, Kota Bogor' },
                { period: '2021 - Sekarang', title: 'Penggerak Pemberdayaan UMKM & Pemuda Kreatif', institution: 'Komunitas Bogor Lebih Baik' },
              ],
            },
            issues: [
              { no: 1, title: 'Infrastruktur & Drainase Bebas Genangan', desc: 'Normalisasi saluran air dan drainase gang di pemukiman padat rawan luapan.' },
              { no: 2, title: 'Penerangan Jalan Umum (PJU) Merata', desc: 'Pemasangan dan pemeliharaan lampu jalan lingkungan agar gang aman di malam hari.' },
              { no: 3, title: 'Layanan Kesehatan Cepat & Ambulance Gratis', desc: 'Akses rujukan RSUD dan tanggap darurat tanpa hambatan birokrasi bagi warga tak mampu.' },
              { no: 4, title: 'Wajib Belajar 12 Tahun & Bebas Ijazah Tertahan', desc: 'Advokasi beasiswa dan mediasi penebusan ijazah siswa dari keluarga kurang mampu.' },
              { no: 5, title: 'Penguatan Legalitas & Modal Usaha UMKM', desc: 'Pendampingan jemput bola NIB OSS, sertifikasi halal, dan pelatihan foto katalog produk.' },
              { no: 6, title: 'Kota Bogor Aman Tanpa Tawuran Remaja', desc: 'Penyediaan ruang ekspresi positif, fasilitas sarana olahraga, dan dialog pemuda di tingkat RW.' },
              { no: 7, title: 'Transparansi APBD & Pokir Terbuka', desc: 'Publikasi terbuka usulan pokok-pokok pikiran dewan agar dapat diawasi bersama masyarakat.' },
              { no: 8, title: 'Pengelolaan Sampah Berbasis Lingkungan', desc: 'Dukungan bank sampah warga dan optimalisasi armada pengangkutan TPS lingkungan.' },
              { no: 9, title: 'Ruang Terbuka Hijau & Sarana Publik Guyub', desc: 'Revitalisasi taman RW dan area serbaguna ramah anak serta lansia.' },
              { no: 10, title: 'Pelayanan Publik Digital & E-Government', desc: 'Mempermudah pengurusan administrasi kependudukan tanpa pungli dan antrean panjang.' },
              { no: 11, title: 'Perlindungan Sosial Lansia & Disabilitas', desc: 'Penyaluran bantuan sosial tepat sasaran dan layanan jemput bola pemeriksaan medis lansia.' },
              { no: 12, title: 'Perubahan Iklim, Kelestarian SDA & SDG', desc: 'Penanaman pohon sempadan sungai dan mitigasi bencana longsor tebing di titik rawan Bogor.' },
            ],
            programs: [
              { no: 1, title: 'Rumah Aspirasi Rakyat', desc: 'Pusat advokasi, pengaduan, dan pendampingan warga yang buka setiap hari di Kelurahan Kedung Badak.' },
              { no: 2, title: 'Ambulance Siaga 24 Jam & Relawan Medis', desc: 'Armada siaga tanggap darurat medis antar-jemput pasien rujukan RSUD bebas biaya se-Tanah Sareal.' },
              { no: 3, title: 'Mendorong E-Government & Transparansi APBD', desc: 'Transparansi anggaran daerah, pengawasan perda, dan kanal aduan daring interaktif.' },
              { no: 4, title: 'Wajib Belajar Anak Kota Bogor', desc: 'Pengawalan hak bersekolah anak usia dini hingga SMA, penanganan putus sekolah dan ijazah tertahan.' },
              { no: 5, title: 'Kota Bogor Tanpa Tawuran', desc: 'Program edukasi pemuda, sarana olahraga serbaguna RT/RW, dan pembinaan komunitas positif.' },
              { no: 6, title: 'Digitalisasi UMKM Berbasis RT/RW', desc: 'Fasilitasi penerbitan NIB gratis, sertifikasi halal resmi, dan pelatihan digital marketing produk warga.' },
            ],
            quote: 'Bagi saya, jabatan di dewan bukan panggung kehormatan pribadi, melainkan amanah tulus untuk melayani dan memperjuangkan harapan warga Kota Bogor.',
          },

          // 4. DATA PENGATURAN SEO & METADATA
          seo: {
            metaTitle: 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor Dapil 4 Tanah Sareal',
            metaDescription: 'Website resmi kanal informasi profil, rekam jejak, transparansi hasil kinerja, rilis berita, galeri kegiatan, dan formulir kotak aspirasi warga Banu Lesmana Bagaskara, S.M.',
            keywords: 'Banu Lesmana Bagaskara, DPRD Kota Bogor, Tanah Sareal, PDI Perjuangan, Rumah Aspirasi, Ambulance Siaga Bogor, Hasil Kinerja DPRD, Aspirasi Warga Bogor',
            ogImage: '/assets/banu/hero_banu.jpg',
            canonicalUrl: 'https://banubagaskara.id',
            enableIndexing: true,
            googleSearchConsoleTag: 'google-site-verification=SAMPLE_CODE_BLB_2026',
          },

          // Preset Images for Hero/Banner Selection
          availableAssets: [
            { label: 'Foto Resmi Profil Banu (Portrait)', path: '/assets/banu/hero_banu.jpg' },
            { label: 'Banner Serbaguna Ambulance 24 Jam', path: '/assets/banu/banner_serbaguna.jpg' },
            { label: 'Dokumentasi Dialog Reses Warga', path: '/assets/banu/testi_dialog.jpg' },
            { label: 'Armada Ambulance Siaga & Relawan', path: '/assets/banu/program_ambulance.jpg' },
            { label: 'Pendampingan Usaha Mikro UMKM', path: '/assets/banu/program_umkm.jpg' },
            { label: 'Gotong Royong Guyub Komunitas', path: '/assets/banu/footer_community.jpg' },
          ],

          // Methods for Dynamic Mission Items
          addMission() {
            if (this.profil.newMissionItem.trim() !== '') {
              this.profil.mission.push(this.profil.newMissionItem.trim());
              this.profil.newMissionItem = '';
            }
          },

          removeMission(index) {
            this.profil.mission.splice(index, 1);
          },

          // Save settings to backend
          async saveSettings() {
            let group = 'general';
            let data = this.umum;
            if (this.activeTab === 'beranda') {
              group = 'home';
              data = this.beranda;
            } else if (this.activeTab === 'profil') {
              group = 'profile';
              data = this.profil;
            } else if (this.activeTab === 'seo') {
              group = 'seo';
              data = this.seo;
            }

            try {
              const res = await fetch('/admin/pengaturan', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ group: group, data: data })
              });

              if (res.ok) {
                this.toastMessage = `Pengaturan ${this.activeTab.toUpperCase()} berhasil disimpan!`;
              } else {
                this.toastMessage = `Gagal menyimpan pengaturan ${this.activeTab}.`;
              }
            } catch (e) {
              console.error(e);
              this.toastMessage = 'Pengaturan berhasil diperbarui.';
            }

            this.saveToast = true;
            setTimeout(() => {
              this.saveToast = false;
            }, 3000);
          },
        };
      }
    </script>

    <style>
      [x-cloak] {
        display: none !important;
      }
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
      }
    </style>
  </head>
  <body class="min-h-screen bg-[#fafafa] text-zinc-900 antialiased font-normal selection:bg-[#BC0202] selection:text-white" x-data="adminPengaturan()">
    <!-- Toast Notification (Top Right Floating) -->
    <div
      x-show="saveToast"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-[-12px]"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-[-12px]"
      x-cloak
      class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border border-zinc-200 bg-white text-zinc-900 text-xs sm:text-sm font-medium"
    >
      <div class="w-6 h-6 rounded-lg bg-[#BC0202] text-white flex items-center justify-center shrink-0">
        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <span x-text="toastMessage"></span>
    </div>

    <!-- Main Shell Layout (Desktop Sidebar + Main Content) -->
    <div class="flex min-h-screen">
      <!-- ========================================== -->
      <!-- 1. LEFT SIDEBAR NAVIGATION (DESKTOP)       -->
      <!-- ========================================== -->
      <aside class="hidden lg:flex flex-col justify-between w-64 border-r border-zinc-200 bg-white shrink-0 h-screen sticky top-0 z-30">
        <!-- Top Section: Brand Identity -->
        <div>
          <div class="px-6 pt-7 pb-6 border-b border-zinc-200 bg-[#faf5f5]">
            <a href="/admin" class="flex items-center gap-3 text-zinc-950 group min-w-0">
              <div class="w-9 h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
                B
              </div>
              <div class="flex flex-col min-w-0">
                <span class="font-bold text-xs sm:text-sm tracking-tight truncate group-hover:text-[#BC0202] transition-colors">
                  Banu Bagaskara, S.M.
                </span>
                <span class="text-[11px] text-zinc-600 font-medium truncate">
                  Admin Panel &bull; DPRD Kota Bogor
                </span>
              </div>
            </a>
          </div>

          <!-- Navigation Menu Links -->
          <nav class="px-4 py-5 space-y-1.5">
            <div class="px-2 pb-2 text-[10px] font-bold uppercase tracking-wider text-zinc-400">
              Menu Utama
            </div>

            <!-- 1. Ringkasan -->
            <a
              href="/admin"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Ringkasan</span>
              </div>
            </a>

            <!-- 2. Hasil Kinerja -->
            <a
              href="/kinerja"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Hasil Kinerja</span>
              </div>
              <span class="text-[10px] font-bold px-1.5 py-0.5 rounded-md bg-zinc-100 text-zinc-600">Blok</span>
            </a>

            <!-- 3. Berita -->
            <a
              href="/berita"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span>Berita</span>
              </div>
            </a>

            <!-- 4. Galeri -->
            <a
              href="/galeri"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Galeri Album</span>
              </div>
            </a>

            <!-- 5. Kotak Aspirasi -->
            <a
              href="/admin/aspirasi"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <span>Kotak Aspirasi</span>
              </div>
            </a>

            <!-- 6. Pengaturan Halaman (ACTIVE) -->
            <a
              href="/admin/pengaturan"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-[#faf5f5] text-[#BC0202] text-xs font-bold border border-red-200/80 shadow-2xs"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Pengaturan Halaman</span>
              </div>
            </a>
          </nav>
        </div>

        <!-- Bottom Section: Back to Public & Admin Profile -->
        <div class="p-4 border-t border-zinc-200 bg-white">
          <a
            href="/"
            target="_blank"
            class="flex items-center justify-between w-full px-3 py-2 rounded-lg border border-zinc-200 text-zinc-700 hover:text-zinc-950 hover:bg-zinc-50 text-xs font-semibold transition-colors mb-3 group"
          >
            <span class="flex items-center gap-2">
              <svg class="w-3.5 h-3.5 text-zinc-400 group-hover:text-zinc-950 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg>
              <span>Lihat Web Publik</span>
            </span>
            <span class="text-[10px] text-zinc-400">&nearr;</span>
          </a>

          <div class="flex items-center justify-between pt-2 border-t border-zinc-100">
            <div class="flex items-center gap-2.5 min-w-0">
              <div class="w-8 h-8 rounded-lg bg-zinc-900 text-white font-bold text-xs flex items-center justify-center shrink-0">
                ADM
              </div>
              <div class="flex flex-col min-w-0">
                <span class="text-xs font-bold text-zinc-950 truncate">Administrator</span>
                <span class="text-[10px] text-zinc-600 truncate">Single Account</span>
              </div>
            </div>
            <a
              href="/admin/login"
              title="Keluar dari Panel Admin"
              class="p-1.5 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors"
            >
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
            </a>
          </div>
        </div>
      </aside>

      <!-- ========================================== -->
      <!-- 2. MAIN CONTENT AREA                       -->
      <!-- ========================================== -->
      <main class="flex-1 min-w-0 flex flex-col bg-[#fafafa]">
        <!-- Top Navbar for Mobile & Tablet (< lg) -->
        <div class="lg:hidden sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 py-3.5 flex items-center justify-between gap-2">
          <a href="/admin" class="flex items-center gap-2.5 text-zinc-950 group min-w-0 flex-1">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
              B
            </div>
            <div class="flex flex-col min-w-0">
              <span class="font-bold text-xs sm:text-sm tracking-tight truncate">Banu Bagaskara, S.M.</span>
              <span class="text-[10px] text-zinc-600 font-medium">Pengaturan Halaman</span>
            </div>
          </a>

          <button
            @click="mobileMenu = !mobileMenu"
            aria-label="Toggle Menu"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200 shrink-0"
          >
            <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:inline ml-1.5">Menu</span>
          </button>
        </div>

        <!-- Mobile Navigation Drawer Overlay (Alpine.js) -->
        <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
          <nav class="flex flex-col space-y-2.5 text-sm font-medium text-zinc-800">
            <a href="/admin" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Ringkasan (Beranda Dasbor)</a>
            <a href="/kinerja" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja (Kanvas Blok)</a>
            <a href="/berita" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Kelola Berita</a>
            <a href="/galeri" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Kelola Galeri &amp; Album</a>
            <a href="/admin/aspirasi" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Kotak Aspirasi</a>
            <a href="/admin/pengaturan" @click="mobileMenu = false" class="py-2 px-3 rounded-lg bg-[#faf5f5] text-[#BC0202] font-bold">Pengaturan Halaman Website</a>
            <div class="pt-3 mt-1 border-t border-zinc-100 grid grid-cols-2 gap-2.5">
              <a href="/" target="_blank" class="text-center py-2 px-3 rounded-lg border border-zinc-200 text-xs font-semibold text-zinc-700 hover:bg-zinc-50">Web Publik &nearr;</a>
              <a href="/admin/login" class="text-center py-2 px-3 rounded-lg bg-zinc-900 text-white text-xs font-semibold hover:bg-zinc-800">Keluar</a>
            </div>
          </nav>
        </div>

        <!-- Page Header & Action Bar -->
        <header class="bg-white border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-7">
          <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-5">
            <div>
              <div class="flex items-center gap-2 text-xs font-semibold text-zinc-500 mb-1.5">
                <a href="/admin" class="hover:text-zinc-900 transition-colors">Dasbor Admin</a>
                <span>&rsaquo;</span>
                <span class="text-[#BC0202]">Pengaturan Website</span>
              </div>
              <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">
                Pengaturan Konten &amp; <span class="text-[#BC0202]">Halaman Website</span>
              </h1>
              <p class="text-xs sm:text-sm text-zinc-600 mt-1 max-w-2xl leading-relaxed">
                Kelola data statis, narasi hero section, foto kolase bento, visi misi, 12 isu strategis, 6 program kerja, dan konfigurasi optimasi mesin pencari (SEO).
              </p>
            </div>

            <!-- Sticky/Action Save Button -->
            <div class="flex items-center gap-3 shrink-0">
              <button
                type="button"
                @click="saveSettings()"
                class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors gap-2"
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
              class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0"
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
              class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0"
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
              class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0"
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
              class="flex items-center gap-2 px-4 py-2.5 rounded-lg transition-all shrink-0"
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

            <!-- Kontak Rumah Aspirasi & Media Sosial -->
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
                <p class="text-xs text-zinc-500 mt-0.5">Teks tajuk pembuka, deskripsi pengantar, tombol ajakan bertindak (CTA), dan foto utama.</p>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Badge / Label Atas</label>
                  <input
                    type="text"
                    x-model="beranda.hero.badge"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  />
                </div>

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

                <!-- Tombol CTA 1 & 2 -->
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Teks Tombol Utama (CTA 1)</label>
                  <input
                    type="text"
                    x-model="beranda.hero.ctaPrimaryText"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  />
                </div>
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tautan Tombol Utama (Link)</label>
                  <input
                    type="text"
                    x-model="beranda.hero.ctaPrimaryLink"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-mono"
                  />
                </div>

                <!-- Hero Image Selection -->
                <div class="md:col-span-2 pt-2 border-t border-zinc-100">
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Hero Image (Foto Profil Utama Beranda)</label>
                  <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <div class="w-32 h-36 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden shrink-0">
                      <img :src="beranda.hero.heroImage" alt="Hero Preview" class="w-full h-full object-cover" />
                    </div>
                    <div class="flex-1 space-y-2">
                      <select
                        x-model="beranda.hero.heroImage"
                        class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                      >
                        <template x-for="asset in availableAssets" :key="asset.path">
                          <option :value="asset.path" x-text="asset.label"></option>
                        </template>
                      </select>
                      <p class="text-[11px] text-zinc-500">Pilih dari katalog foto beresolusi tinggi terverifikasi di folder aset lokal.</p>
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

                <!-- Banner Image Selection -->
                <div class="md:col-span-2">
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">File Banner Visual (Panorama)</label>
                  <div class="aspect-[21/9] max-h-48 rounded-xl border border-zinc-200 bg-zinc-100 overflow-hidden mb-3">
                    <img :src="beranda.banner.image" alt="Banner Preview" class="w-full h-full object-cover" />
                  </div>
                  <select
                    x-model="beranda.banner.image"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  >
                    <template x-for="asset in availableAssets" :key="asset.path">
                      <option :value="asset.path" x-text="asset.label"></option>
                    </template>
                  </select>
                </div>
              </div>
            </div>

            <!-- 3. Kolase Foto Bento Grid Beranda -->
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
                      <img :src="card.image" :alt="card.label" class="w-full h-full object-cover" />
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
                      <label class="block text-[11px] font-bold text-zinc-700 mb-1">Pilih Gambar:</label>
                      <select
                        x-model="card.image"
                        class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-1.5 text-xs text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202]"
                      >
                        <template x-for="asset in availableAssets" :key="asset.path">
                          <option :value="asset.path" x-text="asset.label"></option>
                        </template>
                      </select>
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
            <!-- 1. Hero & Kutipan Profil -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
              <div>
                <h2 class="text-base sm:text-lg font-bold text-zinc-950">Hero Section &amp; Kutipan Integritas Profil</h2>
                <p class="text-xs text-zinc-500 mt-0.5">Teks pembuka halaman kenali saya dan pernyataan kutipan komitmen dewan.</p>
              </div>

              <div class="space-y-4">
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Judul Header Profil</label>
                  <input
                    type="text"
                    x-model="profil.hero.title"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  />
                </div>
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Subjudul Pengantar</label>
                  <input
                    type="text"
                    x-model="profil.hero.subtitle"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  />
                </div>
                <div>
                  <label class="block text-xs font-bold text-zinc-900 mb-1.5">Kutipan Integritas (Quote Utama)</label>
                  <textarea
                    rows="2"
                    x-model="profil.quote"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
                  ></textarea>
                </div>
              </div>
            </div>

            <!-- 2. Visi & Misi Resmi -->
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
                        class="p-2 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors shrink-0 mt-1"
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
                    class="px-4 py-2 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold shadow-2xs transition-colors shrink-0"
                  >
                    + Tambah Misi
                  </button>
                </div>
              </div>
            </div>

            <!-- 3. Rekam Jejak (Pendidikan & Pengalaman) -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
              <div>
                <h2 class="text-base sm:text-lg font-bold text-zinc-950">Rekam Jejak Pengalaman &amp; Riwayat Pendidikan</h2>
                <p class="text-xs text-zinc-500 mt-0.5">Daftar riwayat akademis dan rekam jejak organisasi kemasyarakatan &amp; kedewanan.</p>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Riwayat Pendidikan -->
                <div class="space-y-3">
                  <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block">Riwayat Pendidikan</span>
                  <template x-for="(edu, eIdx) in profil.historyTrack.education" :key="eIdx">
                    <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
                      <div class="flex items-center justify-between">
                        <input
                          type="text"
                          x-model="edu.period"
                          class="w-32 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700"
                        />
                      </div>
                      <input
                        type="text"
                        x-model="edu.title"
                        class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950"
                      />
                      <input
                        type="text"
                        x-model="edu.institution"
                        class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600"
                      />
                    </div>
                  </template>
                </div>

                <!-- Pengalaman Organisasi & Kerja -->
                <div class="space-y-3">
                  <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block">Pengalaman Organisasi &amp; Amanah</span>
                  <template x-for="(exp, expIdx) in profil.historyTrack.experience" :key="expIdx">
                    <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
                      <div class="flex items-center justify-between">
                        <input
                          type="text"
                          x-model="exp.period"
                          class="w-36 rounded border border-zinc-300 bg-white px-2 py-1 text-[11px] font-mono text-zinc-700"
                        />
                      </div>
                      <input
                        type="text"
                        x-model="exp.title"
                        class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs font-bold text-zinc-950"
                      />
                      <input
                        type="text"
                        x-model="exp.institution"
                        class="w-full rounded border border-zinc-300 bg-white px-2.5 py-1.5 text-xs text-zinc-600"
                      />
                    </div>
                  </template>
                </div>
              </div>
            </div>

            <!-- 4. 12 Isu Penting Strategis -->
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

            <!-- 5. 6 Program Fokus -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs space-y-6">
              <div>
                <h2 class="text-base sm:text-lg font-bold text-zinc-950">6 Program Fokus Pengabdian</h2>
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
      </main>
    </div>
  </body>
</html>
