<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Hasil Kinerja | Dasbor Admin Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI & Canvas Block Management -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine Component for Hasil Kinerja & Block Modular Canvas Editor -->
    <script>
      function adminKinerja() {
        return {
          mobileMenu: false,
          currentView: 'list', // 'list' atau 'editor'
          searchQuery: '',
          statusFilter: 'all', // 'all', 'published', 'draft', 'featured'
          previewModal: false,
          saveSuccessNotification: false,
          
          // Form / Canvas State
          formMode: 'create', // 'create' atau 'edit'
          currentArticleId: null,
          form: {
            title: '',
            date: '',
            coverImage: '/assets/banu/program_ambulance.jpg',
            excerpt: '',
            isFeatured: false,
            status: 'Terbit', // 'Terbit' atau 'Draf'
            blocks: []
          },

          // Preset gambar dari direktori aset yang tersedia
          availableCovers: [
            { label: 'Ambulance Siaga 24 Jam', url: '/assets/banu/program_ambulance.jpg' },
            { label: 'Pelatihan UMKM RT/RW', url: '/assets/banu/program_umkm.jpg' },
            { label: 'Dialog Warga Kebon Pedes', url: '/assets/banu/testi_dialog.jpg' },
            { label: 'Foto Parlemen / Sidang', url: '/assets/banu/hero_banu.jpg' },
            { label: 'Rembug Komunitas Warga', url: '/assets/banu/footer_community.jpg' },
            { label: 'Banner Serbaguna Pengabdian', url: '/assets/banu/banner_serbaguna.jpg' }
          ],

          // Data Awal Daftar Hasil Kinerja (Sesuai dengan Laporan Nyata pada Template Publik)
          articles: @if(isset($articles) && count($articles) > 0) {{ Js::from($articles) }} @else [
            {
              id: 1,
              title: 'Ambulance Siaga 24 Jam & Pendampingan Administrasi Pasien BPJS Bebas Biaya',
              date: '2026-01-20',
              dateFormatted: '20 Januari 2026',
              coverImage: '/assets/banu/program_ambulance.jpg',
              excerpt: 'Menyikapi keluhan mendesak warga saat mengalami sakit parah di jam-jam genting, Banu Lesmana Bagaskara menyiagakan unit ambulans darurat gratis yang siap beroperasi 24 jam penuh di wilayah Kecamatan Tanah Sareal.',
              isFeatured: true,
              status: 'Terbit',
              blocks: [
                {
                  id: 'b1',
                  type: 'heading',
                  level: 'h2',
                  text: 'Latar Belakang & Komitmen Pelayanan Kesehatan Warga'
                },
                {
                  id: 'b2',
                  type: 'paragraph',
                  text: 'Kesehatan merupakan hak mendasar setiap warga yang tidak boleh terhalang oleh kendala finansial maupun rumitnya administrasi rujukan. Melalui koordinasi intensif bersama jajaran RSUD Kota Bogor dan Dinas Kesehatan, layanan Ambulance Siaga Rumah Aspirasi dioperasikan secara penuh selama 24 jam untuk melayani panggilan darurat warga di 11 kelurahan se-Kecamatan Tanah Sareal tanpa dipungut biaya sepeser pun.'
                },
                {
                  id: 'b3',
                  type: 'image',
                  url: '/assets/banu/program_ambulance.jpg',
                  caption: 'Armada Ambulance Siaga 24 Jam siap siaga di Posko Rumah Aspirasi Rakyat, Kelurahan Kedung Badak.'
                },
                {
                  id: 'b4',
                  type: 'heading',
                  level: 'h3',
                  text: 'Cakupan Pelayanan & Pendampingan yang Diberikan'
                },
                {
                  id: 'b5',
                  type: 'list',
                  items: [
                    'Antar-jemput pasien darurat medis dari kediaman warga menuju IGD rumah sakit rujukan terdekat.',
                    'Pendampingan kelengkapan dokumen administrasi jaminan kesehatan BPJS PBI dan penjaminan daerah.',
                    'Fasilitasi koordinasi ketersediaan ruang rawat inap kelas 3 bagi pasien prasejahtera.',
                    'Layanan siaga tanggap darurat bencana lokal dan evakuasi lansia berisiko.'
                  ]
                },
                {
                  id: 'b6',
                  type: 'quote',
                  quote: 'Mandat di parlemen harus langsung terasa di depan pintu rumah warga, terutama saat mereka menghadapi saat-saat paling genting.',
                  author: 'Banu Lesmana Bagaskara, S.M.'
                }
              ]
            },
            {
              id: 2,
              title: 'Pendampingan Penerbitan NIB & Sertifikasi Halal Gratis untuk UMKM RT/RW',
              date: '2026-01-16',
              dateFormatted: '16 Januari 2026',
              coverImage: '/assets/banu/program_umkm.jpg',
              excerpt: 'Fasilitasi legalitas usaha mikro dan pedagang kecil di Tanah Sareal melalui pengurusan Nomor Induk Berusaha (NIB) gratis, sertifikasi produk halal, serta pelatihan pemasaran digital agar produk lokal mampu bersaing.',
              isFeatured: false,
              status: 'Terbit',
              blocks: [
                {
                  id: 'b21',
                  type: 'heading',
                  level: 'h2',
                  text: 'Penguatan Kemandirian Usaha Keluarga Berbasis Lingkungan'
                },
                {
                  id: 'b22',
                  type: 'paragraph',
                  text: 'Mayoritas pelaku ekonomi kerakyatan di tingkat RT/RW menghadapi kendala administratif saat ingin memperluas usahanya. Rumah Aspirasi menghadirkan posko terpadu untuk mendampingi pengurusan izin usaha legal secara langsung.'
                },
                {
                  id: 'b23',
                  type: 'grid',
                  columns: '2',
                  col1Title: 'Fasilitas Legalitas Resmi',
                  col1Text: 'Penerbitan Nomor Induk Berusaha (NIB) OSS RBA dan pendampingan self-declare sertifikasi halal bebas biaya.',
                  col2Title: 'Pelatihan Foto & Pasar Digital',
                  col2Text: 'Bimbingan teknis foto produk katalog smartphone dan pendaftaran toko daring pada etalase marketplace lokal.'
                }
              ]
            },
            {
              id: 3,
              title: 'Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase & Pencegahan Banjir',
              date: '2026-01-12',
              dateFormatted: '12 Januari 2026',
              coverImage: '/assets/banu/testi_dialog.jpg',
              excerpt: 'Mengawal langsung usulan warga dari forum reses agar masuk ke dalam rencana kerja anggaran daerah untuk perbaikan dan normalisasi drainase gang pemukiman yang kerap meluap saat intensitas hujan tinggi.',
              isFeatured: false,
              status: 'Terbit',
              blocks: [
                {
                  id: 'b31',
                  type: 'heading',
                  level: 'h2',
                  text: 'Respon Cepat Usulan Drainase Pemukiman Padat'
                },
                {
                  id: 'b32',
                  type: 'paragraph',
                  text: 'Peninjauan lapangan bersama tokoh masyarakat dan dinas teknis memastikan bahwa titik sumbatan saluran air gang langsung masuk dalam prioritas penanganan pemeliharaan berkala APBD Kota Bogor.'
                }
              ]
            },
            {
              id: 4,
              title: 'Mendorong Transparansi Alokasi Belanja Publik Raperda APBD Kota Bogor',
              date: '2026-01-08',
              dateFormatted: '08 Januari 2026',
              coverImage: '/assets/banu/banner_serbaguna.jpg',
              excerpt: 'Memperjuangkan efisiensi dan transparansi anggaran daerah di Badan Anggaran DPRD agar pos belanja publik lebih diprioritaskan untuk pemenuhan hak dasar warga, layanan kesehatan, dan infrastruktur lingkungan.',
              isFeatured: false,
              status: 'Terbit',
              blocks: [
                {
                  id: 'b41',
                  type: 'heading',
                  level: 'h2',
                  text: 'Pengawasan Alokasi Anggaran Berbasis Kepentingan Rakyat'
                },
                {
                  id: 'b42',
                  type: 'paragraph',
                  text: 'Alokasi APBD harus difokuskan pada belanja yang langsung dirasakan manfaatnya oleh masyarakat dan memangkas anggaran seremonial yang tidak mendesak.'
                }
              ]
            },
            {
              id: 5,
              title: 'Draf Rancangan Advokasi Pelayanan Fasilitas Puskesmas Pembantu',
              date: '2026-01-25',
              dateFormatted: '25 Januari 2026',
              coverImage: '/assets/banu/hero_banu.jpg',
              excerpt: 'Rancangan catatan telaah dan usulan peningkatan jam operasional serta kelengkapan obat-obatan di pos layanan kesehatan kelurahan se-Tanah Sareal.',
              isFeatured: false,
              status: 'Draf',
              blocks: [
                {
                  id: 'b51',
                  type: 'heading',
                  level: 'h2',
                  text: 'Catatan Awal Telaah Fasilitas Kesehatan Lingkungan'
                },
                {
                  id: 'b52',
                  type: 'paragraph',
                  text: 'Laporan ini masih dalam tahap pengumpulan data hasil kunjungan lapangan bersama ketua-ketua RW di wilayah Tanah Sareal.'
                }
              ]
            }
          ] @endif,

          get filteredArticles() {
            return this.articles.filter(item => {
              const matchesSearch = item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                    item.excerpt.toLowerCase().includes(this.searchQuery.toLowerCase());
              if (this.statusFilter === 'all') return matchesSearch;
              if (this.statusFilter === 'published') return matchesSearch && item.status === 'Terbit';
              if (this.statusFilter === 'draft') return matchesSearch && item.status === 'Draf';
              if (this.statusFilter === 'featured') return matchesSearch && item.isFeatured;
              return matchesSearch;
            });
          },

          // Buka Form Baru
          openCreate() {
            this.formMode = 'create';
            this.currentArticleId = null;
            this.form = {
              title: '',
              date: new Date().toISOString().split('T')[0],
              coverImage: '/assets/banu/program_ambulance.jpg',
              excerpt: '',
              isFeatured: false,
              status: 'Terbit',
              blocks: [
                {
                  id: 'b_' + Date.now() + '_1',
                  type: 'heading',
                  level: 'h2',
                  text: 'Judul Pembuka Laporan Kinerja'
                },
                {
                  id: 'b_' + Date.now() + '_2',
                  type: 'paragraph',
                  text: 'Tuliskan deskripsi narasi hasil kinerja, latar belakang aksi lapangan, atau kebijakan yang diperjuangkan di sini...'
                }
              ]
            };
            this.currentView = 'editor';
            window.scrollTo({ top: 0, behavior: 'smooth' });
          },

          // Sunting Artikel
          openEdit(item) {
            this.formMode = 'edit';
            this.currentArticleId = item.id;
            this.form = {
              title: item.title,
              date: item.date,
              coverImage: item.coverImage,
              excerpt: item.excerpt,
              isFeatured: item.isFeatured,
              status: item.status,
              // Deep clone blocks
              blocks: JSON.parse(JSON.stringify(item.blocks || []))
            };
            this.currentView = 'editor';
            window.scrollTo({ top: 0, behavior: 'smooth' });
          },

          // Simpan Artikel (Create / Update)
          async saveArticle() {
            if (!this.form.title.trim()) {
              alert('Judul tulisan hasil kinerja wajib diisi!');
              return;
            }

            const formattedDate = new Date(this.form.date).toLocaleDateString('id-ID', {
              day: 'numeric',
              month: 'long',
              year: 'numeric'
            });

            const payload = {
              title: this.form.title,
              date: this.form.date,
              coverImage: this.form.coverImage,
              excerpt: this.form.excerpt || (this.form.blocks.find(b => b.type === 'paragraph')?.text || '').slice(0, 160) + '...',
              isFeatured: this.form.isFeatured,
              status: this.form.status,
              blocks: this.form.blocks
            };

            try {
              const url = this.formMode === 'create' ? '/admin/kinerja' : `/admin/kinerja/${this.currentArticleId}`;
              const method = this.formMode === 'create' ? 'POST' : 'PUT';
              const res = await fetch(url, {
                method: method,
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
              });

              if (res.ok) {
                const data = await res.json();
                const savedId = data.report ? data.report.id : (this.formMode === 'create' ? Date.now() : this.currentArticleId);

                if (this.formMode === 'create') {
                  const newArticle = {
                    id: savedId,
                    title: this.form.title,
                    date: this.form.date,
                    dateFormatted: formattedDate,
                    coverImage: this.form.coverImage,
                    excerpt: payload.excerpt,
                    isFeatured: this.form.isFeatured,
                    status: this.form.status,
                    blocks: JSON.parse(JSON.stringify(this.form.blocks))
                  };
                  this.articles.unshift(newArticle);
                } else {
                  const idx = this.articles.findIndex(a => a.id === this.currentArticleId);
                  if (idx !== -1) {
                    this.articles[idx].title = this.form.title;
                    this.articles[idx].date = this.form.date;
                    this.articles[idx].dateFormatted = formattedDate;
                    this.articles[idx].coverImage = this.form.coverImage;
                    this.articles[idx].excerpt = this.form.excerpt;
                    this.articles[idx].isFeatured = this.form.isFeatured;
                    this.articles[idx].status = this.form.status;
                    this.articles[idx].blocks = JSON.parse(JSON.stringify(this.form.blocks));
                  }
                }

                this.saveSuccessNotification = true;
                setTimeout(() => { this.saveSuccessNotification = false; }, 3500);
                this.currentView = 'list';
                window.scrollTo({ top: 0, behavior: 'smooth' });
              } else {
                alert('Gagal menyimpan laporan kinerja ke database.');
              }
            } catch (err) {
              console.error(err);
              if (this.formMode === 'create') {
                this.articles.unshift({
                  id: Date.now(),
                  title: this.form.title,
                  date: this.form.date,
                  dateFormatted: formattedDate,
                  coverImage: this.form.coverImage,
                  excerpt: payload.excerpt,
                  isFeatured: this.form.isFeatured,
                  status: this.form.status,
                  blocks: JSON.parse(JSON.stringify(this.form.blocks))
                });
              }
              this.saveSuccessNotification = true;
              setTimeout(() => { this.saveSuccessNotification = false; }, 3500);
              this.currentView = 'list';
            }
          },

          // Hapus Artikel
          async deleteArticle(id) {
            if (confirm('Apakah Anda yakin ingin menghapus tulisan hasil kinerja ini?')) {
              try {
                await fetch(`/admin/kinerja/${id}`, {
                  method: 'DELETE',
                  headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
                });
              } catch (e) {
                console.error(e);
              }
              this.articles = this.articles.filter(a => a.id !== id);
            }
          },

          // Toggle Sorotan Utama Langsung dari Daftar
          async toggleFeatured(item) {
            item.isFeatured = !item.isFeatured;
            try {
              await fetch(`/admin/kinerja/${item.id}/toggle-featured`, {
                method: 'PATCH',
                headers: {
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
              });
            } catch (e) {
              console.error(e);
            }
          },

          // Toggle Status Terbit/Draf
          async toggleStatus(item) {
            item.status = item.status === 'Terbit' ? 'Draf' : 'Terbit';
            try {
              await fetch(`/admin/kinerja/${item.id}/toggle-status`, {
                method: 'PATCH',
                headers: {
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
              });
            } catch (e) {
              console.error(e);
            }
          },

          // Manajemen Blok Modular Kanvas
          addBlock(type) {
            const id = 'block_' + Date.now();
            if (type === 'heading') {
              this.form.blocks.push({ id, type, level: 'h2', text: 'Subjudul Baru' });
            } else if (type === 'paragraph') {
              this.form.blocks.push({ id, type, text: 'Tuliskan paragraf penjelasan rinci mengenai kegiatan atau advokasi yang dilakukan...' });
            } else if (type === 'image') {
              this.form.blocks.push({ id, type, url: '/assets/banu/testi_dialog.jpg', caption: 'Keterangan dokumentasi kegiatan lapangan.' });
            } else if (type === 'list') {
              this.form.blocks.push({ id, type, items: ['Poin rincian capaian pertama', 'Poin rincian capaian kedua'] });
            } else if (type === 'grid') {
              this.form.blocks.push({
                id,
                type,
                columns: '2',
                col1Title: 'Rincian Aspek A',
                col1Text: 'Keterangan ringkas mengenai aspek capaian pertama.',
                col2Title: 'Rincian Aspek B',
                col2Text: 'Keterangan ringkas mengenai aspek capaian kedua.'
              });
            } else if (type === 'quote') {
              this.form.blocks.push({
                id,
                type,
                quote: 'Tuliskan kutipan pernyataan penting atau janji advokasi rakyat di sini.',
                author: 'Banu Lesmana Bagaskara, S.M.'
              });
            }
          },

          removeBlock(index) {
            this.form.blocks.splice(index, 1);
          },

          moveBlockUp(index) {
            if (index > 0) {
              const el = this.form.blocks.splice(index, 1)[0];
              this.form.blocks.splice(index - 1, 0, el);
            }
          },

          moveBlockDown(index) {
            if (index < this.form.blocks.length - 1) {
              const el = this.form.blocks.splice(index, 1)[0];
              this.form.blocks.splice(index + 1, 0, el);
            }
          },

          // Menambah & Menghapus item pada blok List
          addListItem(block) {
            if (!block.items) block.items = [];
            block.items.push('Poin capaian baru');
          },

          removeListItem(block, itemIndex) {
            if (block.items && block.items.length > 1) {
              block.items.splice(itemIndex, 1);
            }
          },

          // Modal Pratinjau Publik
          openPreview() {
            this.previewModal = true;
            document.body.style.overflow = 'hidden';
          },

          closePreview() {
            this.previewModal = false;
            document.body.style.overflow = '';
          }
        };
      }
    </script>

    <!-- Tailwind & Shadcn Configuration (100% Identik dengan Public Templates) -->
    <script>
      tailwind.config = {
        darkMode: ['class'],
        theme: {
          extend: {
            fontFamily: {
              sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
              border: 'hsl(240 5.9% 90%)',
              input: 'hsl(240 5.9% 90%)',
              ring: '#FF0000',
              background: '#ffffff',
              foreground: '#000000',
              brand: {
                bright: '#FF0000',
                DEFAULT: '#BC0202', // Warna Utama Merah
                dark: '#830000',
                black: '#000000',
              },
              primary: {
                DEFAULT: '#BC0202', // Warna Utama Merah
                foreground: '#ffffff',
                hover: '#830000',
                bright: '#FF0000',
                dark: '#830000',
                subtle: '#fee2e2',
              },
              secondary: {
                DEFAULT: 'hsl(240 4.8% 95.9%)',
                foreground: 'hsl(240 5.9% 10%)',
              },
              muted: {
                DEFAULT: 'hsl(240 4.8% 95.9%)',
                foreground: 'hsl(240 3.8% 46.1%)',
              },
              accent: {
                DEFAULT: 'hsl(240 4.8% 95.9%)',
                foreground: 'hsl(240 5.9% 10%)',
              },
              card: {
                DEFAULT: 'hsl(0 0% 100%)',
                foreground: '#000000',
              },
            },
            borderRadius: {
              '2xl': '1.25rem' /* 20px */,
              xl: '1rem' /* 16px */,
              lg: '0.625rem' /* 10px */,
              md: '0.5rem' /* 8px */,
              sm: '0.375rem' /* 6px */,
            },
          },
        },
      };
    </script>

    <style>
      *,
      *::before,
      *::after {
        box-sizing: border-box;
      }
      html,
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #ffffff;
        color: #000000;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        overflow-x: hidden;
        width: 100%;
        margin: 0;
        padding: 0;
      }

      /* Clean custom scrollbar */
      ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
      }
      ::-webkit-scrollbar-track {
        background: #f4f4f5;
      }
      ::-webkit-scrollbar-thumb {
        background: #d4d4d8;
        border-radius: 3px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: #a1a1aa;
      }
      [x-cloak] {
        display: none !important;
      }
    </style>
  </head>
  <body
    class="min-h-screen w-full bg-white text-zinc-950 overflow-x-hidden"
    x-data="adminKinerja()"
    @keydown.escape.window="if (previewModal) closePreview(); else mobileMenu = false;"
  >
    <div class="min-h-screen w-full flex flex-col lg:flex-row">
      <!-- ======================================================== -->
      <!-- DESKTOP SIDEBAR NAVIGATION (Identik dengan Dashboard)     -->
      <!-- ======================================================== -->
      <aside class="hidden lg:flex lg:w-64 xl:w-72 lg:flex-col lg:fixed lg:inset-y-0 bg-white border-r border-zinc-200 z-40 select-none">
        <!-- Brand Logo Header -->
        <div class="px-6 pt-7 pb-6 border-b border-zinc-200 bg-[#faf5f5]">
          <a href="/admin" class="flex items-center gap-3 text-zinc-950 group min-w-0">
            <div class="w-9 h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
              </svg>
            </div>
            <div class="flex flex-col leading-tight min-w-0">
              <span class="font-bold text-base tracking-tight text-zinc-950 truncate">banubagaskara.</span>
              <span class="text-[11px] font-semibold uppercase tracking-wider text-[#830000] mt-0.5">Dasbor Admin</span>
            </div>
          </a>
        </div>

        <!-- Navigation Links (6 Core Admin Modules) -->
        <nav aria-label="Menu Utama Dasbor" class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
          <!-- Group 1: Pengelolaan Konten -->
          <div>
            <span class="px-3 text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-2.5">Menu Utama</span>
            <ul class="space-y-1">
              <!-- 1. Ringkasan -->
              <li>
                <a
                  href="/admin"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                      />
                    </svg>
                    <span>Ringkasan</span>
                  </span>
                </a>
              </li>

              <!-- 2. Hasil Kinerja (Active) -->
              <li>
                <a
                  href="/kinerja"
                  aria-current="page"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-zinc-100 text-zinc-950 text-xs font-bold transition-colors"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-[#BC0202] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                      />
                    </svg>
                    <span>Hasil Kinerja</span>
                  </span>
                  <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
                </a>
              </li>

              <!-- 3. Berita -->
              <li>
                <a
                  href="/berita"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                      />
                    </svg>
                    <span>Berita</span>
                  </span>
                </a>
              </li>

              <!-- 4. Galeri -->
              <li>
                <a
                  href="/galeri"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                    <span>Galeri</span>
                  </span>
                </a>
              </li>

              <!-- 5. Kotak Aspirasi -->
              <li>
                <a
                  href="/admin/aspirasi"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                      />
                    </svg>
                    <span>Kotak Aspirasi</span>
                  </span>
                  <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">2</span>
                </a>
              </li>
            </ul>
          </div>

          <!-- Group 2: Pengaturan Halaman Website -->
          <div class="pt-4 border-t border-zinc-200/80">
            <span class="px-3 text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-2.5">Konfigurasi Portal</span>
            <ul class="space-y-1">
              <li>
                <a
                  href="/admin/pengaturan"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                      />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Pengaturan Halaman</span>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Single Admin Profile & Quick Exit -->
        <div class="p-4 border-t border-zinc-200 bg-[#fafafa] space-y-3">
          <div class="flex items-center gap-3 px-2 py-1.5">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-xs shrink-0">BLB</div>
            <div class="min-w-0 flex-1">
              <span class="font-bold text-xs text-zinc-950 block truncate">Administrator Utama</span>
              <span class="text-[11px] text-zinc-500 block truncate">Akun Tunggal Resmi</span>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <a
              href="/kinerja"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1"
            >
              <span>Lihat Publik</span>
              <svg class="w-3 h-3 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg>
            </a>
            <a
              href="/admin/login"
              class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-red-50 hover:text-[#BC0202] hover:border-red-200 text-zinc-700 text-[11px] font-semibold px-3 py-2 shadow-2xs transition-colors gap-1"
            >
              <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span>Keluar</span>
            </a>
          </div>
        </div>
      </aside>

      <!-- ======================================================== -->
      <!-- MAIN CONTENT WRAPPER                                     -->
      <!-- ======================================================== -->
      <div class="flex-1 flex flex-col min-w-0 lg:pl-64 xl:pl-72">
        <!-- Mobile Top Bar (< lg) -->
        <div class="lg:hidden sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 py-3.5 flex items-center justify-between gap-2">
          <a href="/admin" class="flex items-center gap-2.5 text-zinc-950 group min-w-0 flex-1">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
              </svg>
            </div>
            <div class="flex items-center gap-2 min-w-0">
              <span class="font-bold text-sm sm:text-base tracking-tight text-zinc-950 truncate">banubagaskara.</span>
              <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100 shrink-0">Admin</span>
            </div>
          </a>

          <button
            @click="mobileMenu = !mobileMenu"
            aria-label="Buka Menu Admin"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200 shrink-0"
          >
            <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:inline ml-1.5">Menu</span>
          </button>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
          <nav class="flex flex-col space-y-2.5 text-sm font-medium text-zinc-800">
            <a href="/admin" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Ringkasan (Beranda Dasbor)</a>
            <a href="/kinerja" @click="mobileMenu = false" class="py-2 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors flex items-center justify-between">
              <span>Hasil Kinerja (Kanvas Blok)</span>
              <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
            </a>
            <a href="/berita" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita Resmi</a>
            <a href="/galeri" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Album &amp; Foto</a>
            <a href="/admin/aspirasi" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors flex items-center justify-between">
              <span>Kotak Aspirasi</span>
              <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">2 Baru</span>
            </a>
            <a href="/admin/pengaturan" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Pengaturan Halaman Website</a>
            <div class="pt-3 mt-1 border-t border-zinc-100 grid grid-cols-2 gap-2.5">
              <a href="/kinerja" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-900 py-2 text-xs font-semibold">
                Lihat Halaman Publik
              </a>
              <a href="/admin/login" class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold">Keluar</a>
            </div>
          </nav>
        </div>

        <main class="w-full flex-1 flex flex-col">
          <!-- Notification Toast -->
          <div
            x-show="saveSuccessNotification"
            x-transition
            x-cloak
            class="fixed top-5 right-5 z-50 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-lg flex items-center gap-3 text-xs text-emerald-950"
          >
            <div class="w-6 h-6 rounded-md bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">&check;</div>
            <div>
              <span class="font-bold block">Perubahan Berhasil Disimpan!</span>
              <span class="text-emerald-800">Tulisan hasil kinerja telah diperbarui ke dalam sistem.</span>
            </div>
          </div>

          <!-- ========================================== -->
          <!-- 1. EDITORIAL HEADER SECTION (#faf5f5)      -->
          <!-- ========================================== -->
          <header class="w-full bg-[#faf5f5] border-b border-zinc-200 py-8 sm:py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
              <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                <div class="max-w-2xl">
                  <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#830000] mb-2.5">
                    <span>Modul Kanvas Artikel &bull; Hasil Kinerja</span>
                  </div>
                  <h1 class="text-2xl sm:text-4xl lg:text-[38px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
                    Kelola <span class="text-[#BC0202]">Hasil Kinerja</span>
                  </h1>
                  <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 leading-relaxed">
                    Tulis laporan advokasi parlemen dan aksi nyata warga dengan format kanvas blok modular bebas (Judul, Paragraf, Gambar, Daftar Poin, Grid, dan Kutipan).
                  </p>
                </div>

                <!-- Action Button in Header -->
                <div class="shrink-0 flex items-center gap-3">
                  <template x-if="currentView === 'list'">
                    <button
                      type="button"
                      @click="openCreate()"
                      class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors active:scale-98 gap-2"
                    >
                      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                      </svg>
                      <span>Tulis Hasil Kinerja Baru</span>
                    </button>
                  </template>

                  <template x-if="currentView === 'editor'">
                    <button
                      type="button"
                      @click="currentView = 'list'"
                      class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs sm:text-sm font-semibold px-4 py-2.5 shadow-2xs transition-colors gap-1.5"
                    >
                      <svg class="w-4 h-4 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                      </svg>
                      <span>Kembali ke Daftar</span>
                    </button>
                  </template>
                </div>
              </div>
            </div>
          </header>

          <!-- ======================================================== -->
          <!-- 2. VIEW A: DAFTAR TULISAN HASIL KINERJA (LIST VIEW)     -->
          <!-- ======================================================== -->
          <div x-show="currentView === 'list'" class="w-full flex-1 flex flex-col">
            <!-- Filter & Search Toolbar -->
            <section class="w-full bg-[#fafafa] py-6 border-b border-zinc-200">
              <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <!-- Search Input -->
                <div class="relative w-full md:w-80">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </div>
                  <input
                    type="text"
                    x-model="searchQuery"
                    placeholder="Cari judul atau ringkasan kinerja..."
                    class="w-full pl-9 pr-3.5 py-2 rounded-lg border border-zinc-300 bg-white text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                  />
                </div>

                <!-- Status Filter Buttons (No Pill) -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0">
                  <button
                    type="button"
                    @click="statusFilter = 'all'"
                    :class="statusFilter === 'all' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Semua (<span x-text="articles.length"></span>)
                  </button>
                  <button
                    type="button"
                    @click="statusFilter = 'published'"
                    :class="statusFilter === 'published' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Terbit (<span x-text="articles.filter(a => a.status === 'Terbit').length"></span>)
                  </button>
                  <button
                    type="button"
                    @click="statusFilter = 'draft'"
                    :class="statusFilter === 'draft' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Draf (<span x-text="articles.filter(a => a.status === 'Draf').length"></span>)
                  </button>
                  <button
                    type="button"
                    @click="statusFilter = 'featured'"
                    :class="statusFilter === 'featured' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Sorotan Utama (<span x-text="articles.filter(a => a.isFeatured).length"></span>)
                  </button>
                </div>
              </div>
            </section>

            <!-- Articles List Container -->
            <section class="w-full bg-[#f4f4f5] py-10 sm:py-12 flex-1">
              <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 space-y-4">
                <template x-for="(item, idx) in filteredArticles" :key="item.id">
                  <div class="rounded-xl border border-zinc-200 bg-white p-5 sm:p-6 shadow-sm hover:border-zinc-300 transition-all flex flex-col md:flex-row items-start md:items-center justify-between gap-6 group">
                    <!-- Left: Thumbnail & Details -->
                    <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 min-w-0 flex-1">
                      <div class="w-full sm:w-44 md:w-48 aspect-[16/10] rounded-lg overflow-hidden bg-zinc-100 border border-zinc-200 shrink-0 relative">
                        <img :src="item.coverImage" :alt="item.title" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300" />
                        <span
                          x-show="item.isFeatured"
                          class="absolute top-2 left-2 bg-[#BC0202] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm"
                        >
                          Sorotan
                        </span>
                      </div>

                      <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2 mb-2">
                          <span class="text-xs text-zinc-500 font-medium" x-text="item.dateFormatted"></span>
                          <span class="text-zinc-300">&bull;</span>
                          <span
                            class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md border"
                            :class="item.status === 'Terbit' ? 'bg-[#fafafa] text-zinc-800 border-zinc-200' : 'bg-amber-50 text-amber-800 border-amber-200'"
                            x-text="item.status"
                          ></span>
                          <span class="text-zinc-300">&bull;</span>
                          <span class="text-[11px] text-zinc-500 font-semibold" x-text="item.blocks.length + ' Blok Kanvas'"></span>
                        </div>

                        <h2 class="text-base sm:text-lg font-bold text-zinc-950 leading-snug tracking-tight group-hover:text-[#BC0202] transition-colors" x-text="item.title"></h2>
                        <p class="text-xs text-zinc-600 mt-2 line-clamp-2 leading-relaxed" x-text="item.excerpt"></p>
                      </div>
                    </div>

                    <!-- Right: Quick Actions -->
                    <div class="flex items-center gap-2 w-full md:w-auto justify-end pt-4 md:pt-0 border-t md:border-t-0 border-zinc-100 shrink-0">
                      <!-- Tombol Toggle Sorotan -->
                      <button
                        type="button"
                        @click="toggleFeatured(item)"
                        :title="item.isFeatured ? 'Batalkan Sorotan Utama' : 'Jadikan Sorotan Utama Beranda/Kinerja'"
                        class="p-2 rounded-lg border text-xs font-semibold transition-colors"
                        :class="item.isFeatured ? 'bg-red-50 text-[#BC0202] border-red-200' : 'bg-white text-zinc-500 hover:text-zinc-900 border-zinc-200'"
                      >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                      </button>

                      <!-- Tombol Sunting (Masuk ke Canvas Editor) -->
                      <button
                        type="button"
                        @click="openEdit(item)"
                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm transition-colors active:scale-98"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Sunting Kanvas</span>
                      </button>

                      <!-- Tombol Hapus -->
                      <button
                        type="button"
                        @click="deleteArticle(item.id)"
                        title="Hapus Tulisan"
                        class="p-2 rounded-lg border border-zinc-200 bg-white text-zinc-500 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors"
                      >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </template>

                <!-- Empty State jika tidak ada artikel yang cocok -->
                <div x-show="filteredArticles.length === 0" class="text-center py-16 bg-white rounded-xl border border-zinc-200 p-8">
                  <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-400 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                  </div>
                  <h3 class="font-bold text-base text-zinc-950">Tidak ada tulisan hasil kinerja yang ditemukan</h3>
                  <p class="text-xs text-zinc-500 mt-1">Coba kata kunci pencarian lain atau pilih filter status yang berbeda.</p>
                </div>
              </div>
            </section>
          </div>

          <!-- ======================================================== -->
          <!-- 3. VIEW B: EDITOR KANVAS BLOK MODULAR (CANVAS VIEW)       -->
          <!-- ======================================================== -->
          <div x-show="currentView === 'editor'" x-cloak class="w-full flex-1 flex flex-col bg-[#f4f4f5]">
            <!-- Top Form Toolbar: Judul, Status & Action Buttons -->
            <div class="sticky top-0 z-30 bg-white/95 backdrop-blur-md border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-3.5 flex flex-wrap items-center justify-between gap-4">
              <div class="flex items-center gap-3">
                <button
                  type="button"
                  @click="currentView = 'list'"
                  class="rounded-lg p-1.5 text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors"
                  title="Kembali ke Daftar"
                >
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
                </button>
                <div>
                  <span class="text-[11px] font-bold uppercase tracking-wider text-[#BC0202]" x-text="formMode === 'create' ? 'Tulis Laporan Baru' : 'Menyunting Laporan'"></span>
                  <h2 class="text-sm sm:text-base font-bold text-zinc-950 tracking-tight leading-none" x-text="form.title ? form.title : 'Judul Laporan Kinerja Belum Diisi'"></h2>
                </div>
              </div>

              <div class="flex items-center gap-2.5">
                <!-- Tombol Pratinjau Publik -->
                <button
                  type="button"
                  @click="openPreview()"
                  class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-3.5 py-2 shadow-2xs transition-colors gap-1.5"
                >
                  <svg class="w-3.5 h-3.5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <span>Pratinjau Publik</span>
                </button>

                <!-- Tombol Simpan -->
                <button
                  type="button"
                  @click="saveArticle()"
                  class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors active:scale-98 gap-1.5"
                >
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>Simpan Perubahan</span>
                </button>
              </div>
            </div>

            <!-- Canvas Container: 2 Kolom (Kolom Utama Kanvas + Kolom Pengaturan Samping) -->
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 py-8 sm:py-10 w-full flex-1">
              <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- ============================================== -->
                <!-- LEFT/CENTER: AREA KANVAS BLOK MODULAR (8 COLS) -->
                <!-- ============================================== -->
                <div class="lg:col-span-8 space-y-6">
                  <!-- Header Laporan (Judul Utama & Cuplikan) -->
                  <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm space-y-4">
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Judul Utama Laporan Kinerja *</label>
                      <input
                        type="text"
                        x-model="form.title"
                        placeholder="Masukkan judul hasil kinerja yang jelas & lugas..."
                        class="w-full text-lg sm:text-xl font-bold rounded-lg border border-zinc-300 bg-white px-4 py-3 text-zinc-950 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs leading-snug"
                      />
                    </div>

                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Ringkasan / Cuplikan Laporan (Excerpt)</label>
                      <textarea
                        x-model="form.excerpt"
                        rows="3"
                        placeholder="Ringkasan singkat 2-3 kalimat yang akan tampil di kartu pratinjau Beranda dan halaman Kinerja..."
                        class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs leading-relaxed"
                      ></textarea>
                    </div>
                  </div>

                  <!-- ========================================== -->
                  <!-- DAFTAR BLOK MODULAR KANVAS AKTIF           -->
                  <!-- ========================================== -->
                  <div class="space-y-4">
                    <div class="flex items-center justify-between pb-1">
                      <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-500">
                        Isi Konten Kanvas (<span x-text="form.blocks.length"></span> Blok Terpasang)
                      </h3>
                      <span class="text-[11px] text-zinc-400">Susun tata letak bebas layaknya artikel modular</span>
                    </div>

                    <template x-for="(block, bIdx) in form.blocks" :key="block.id">
                      <div class="rounded-xl border border-zinc-200 bg-white shadow-sm overflow-hidden group hover:border-zinc-300 transition-all">
                        <!-- Block Toolbar Header -->
                        <div class="px-4 py-2.5 bg-[#faf5f5] border-b border-zinc-200 flex items-center justify-between gap-3 select-none">
                          <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#BC0202]"></span>
                            <span class="font-bold text-[11px] uppercase tracking-wider text-zinc-800" x-text="'Blok #' + (bIdx + 1) + ': ' + block.type"></span>
                          </div>

                          <!-- Action Controls (Move Up, Move Down, Delete) -->
                          <div class="flex items-center gap-1">
                            <!-- Pindah Ke Atas -->
                            <button
                              type="button"
                              @click="moveBlockUp(bIdx)"
                              :disabled="bIdx === 0"
                              :class="bIdx === 0 ? 'opacity-30 cursor-not-allowed text-zinc-400' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-200/60'"
                              class="p-1 rounded transition-colors"
                              title="Pindahkan ke atas"
                            >
                              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                              </svg>
                            </button>

                            <!-- Pindah Ke Bawah -->
                            <button
                              type="button"
                              @click="moveBlockDown(bIdx)"
                              :disabled="bIdx === form.blocks.length - 1"
                              :class="bIdx === form.blocks.length - 1 ? 'opacity-30 cursor-not-allowed text-zinc-400' : 'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-200/60'"
                              class="p-1 rounded transition-colors"
                              title="Pindahkan ke bawah"
                            >
                              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                              </svg>
                            </button>

                            <!-- Hapus Blok -->
                            <button
                              type="button"
                              @click="removeBlock(bIdx)"
                              class="p-1 rounded text-zinc-500 hover:text-red-600 hover:bg-red-50 transition-colors ml-1"
                              title="Hapus blok ini"
                            >
                              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                            </button>
                          </div>
                        </div>

                        <!-- Block Body: Render form input berdasarkan tipe blok -->
                        <div class="p-5">
                          <!-- 1. TIPE: JUDUL / HEADING -->
                          <template x-if="block.type === 'heading'">
                            <div class="space-y-3">
                              <div class="flex items-center gap-3">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Tingkat Subjudul:</label>
                                <select
                                  x-model="block.level"
                                  class="rounded-md border border-zinc-300 bg-white text-xs px-2.5 py-1 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                                >
                                  <option value="h2">H2 (Subjudul Utama)</option>
                                  <option value="h3">H3 (Sub-bagian Kecil)</option>
                                </select>
                              </div>
                              <input
                                type="text"
                                x-model="block.text"
                                placeholder="Ketik subjudul paragraf..."
                                class="w-full text-base font-bold rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-zinc-950 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                              />
                            </div>
                          </template>

                          <!-- 2. TIPE: PARAGRAF -->
                          <template x-if="block.type === 'paragraph'">
                            <div>
                              <textarea
                                x-model="block.text"
                                rows="4"
                                placeholder="Tuliskan isi teks atau uraian kebijakan..."
                                class="w-full rounded-lg border border-zinc-300 bg-white p-3 text-xs sm:text-sm text-zinc-900 leading-relaxed focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                              ></textarea>
                            </div>
                          </template>

                          <!-- 3. TIPE: GAMBAR / IMAGE -->
                          <template x-if="block.type === 'image'">
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-start">
                              <div class="sm:col-span-5 aspect-[16/10] bg-zinc-100 rounded-lg overflow-hidden border border-zinc-200">
                                <img :src="block.url" alt="Pratinjau Foto Blok" class="w-full h-full object-cover" />
                              </div>
                              <div class="sm:col-span-7 space-y-3">
                                <div>
                                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Pilih Foto Dokumentasi:</label>
                                  <select
                                    x-model="block.url"
                                    class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                                  >
                                    <template x-for="c in availableCovers" :key="c.url">
                                      <option :value="c.url" x-text="c.label"></option>
                                    </template>
                                  </select>
                                </div>
                                <div>
                                  <label class="block text-[11px] font-bold text-zinc-700 mb-1">Keterangan Gambar (Caption):</label>
                                  <input
                                    type="text"
                                    x-model="block.caption"
                                    placeholder="Penjelasan kegiatan pada foto..."
                                    class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                                  />
                                </div>
                              </div>
                            </div>
                          </template>

                          <!-- 4. TIPE: LIST / DAFTAR POIN -->
                          <template x-if="block.type === 'list'">
                            <div class="space-y-2.5">
                              <div class="flex items-center justify-between">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Poin-poin Capaian / Program:</label>
                                <button
                                  type="button"
                                  @click="addListItem(block)"
                                  class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#BC0202] hover:text-[#830000]"
                                >
                                  + Tambah Poin
                                </button>
                              </div>
                              <div class="space-y-2">
                                <template x-for="(item, itemIdx) in block.items" :key="itemIdx">
                                  <div class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#BC0202] shrink-0"></span>
                                    <input
                                      type="text"
                                      x-model="block.items[itemIdx]"
                                      class="flex-1 rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                                    />
                                    <button
                                      type="button"
                                      @click="removeListItem(block, itemIdx)"
                                      class="p-1.5 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-zinc-100"
                                      title="Hapus poin ini"
                                    >
                                      &times;
                                    </button>
                                  </div>
                                </template>
                              </div>
                            </div>
                          </template>

                          <!-- 5. TIPE: GRID 2 KOLOM -->
                          <template x-if="block.type === 'grid'">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                              <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#BC0202] block">Kolom Kiri</span>
                                <input
                                  type="text"
                                  x-model="block.col1Title"
                                  placeholder="Judul Kolom Kiri..."
                                  class="w-full font-bold rounded-lg border border-zinc-300 bg-white text-xs px-3 py-1.5 text-zinc-900"
                                />
                                <textarea
                                  x-model="block.col1Text"
                                  rows="3"
                                  placeholder="Keterangan singkat kolom kiri..."
                                  class="w-full rounded-lg border border-zinc-300 bg-white text-xs p-2.5 text-zinc-700"
                                ></textarea>
                              </div>

                              <div class="p-3.5 rounded-lg border border-zinc-200 bg-[#fafafa] space-y-2">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#BC0202] block">Kolom Kanan</span>
                                <input
                                  type="text"
                                  x-model="block.col2Title"
                                  placeholder="Judul Kolom Kanan..."
                                  class="w-full font-bold rounded-lg border border-zinc-300 bg-white text-xs px-3 py-1.5 text-zinc-900"
                                />
                                <textarea
                                  x-model="block.col2Text"
                                  rows="3"
                                  placeholder="Keterangan singkat kolom kanan..."
                                  class="w-full rounded-lg border border-zinc-300 bg-white text-xs p-2.5 text-zinc-700"
                                ></textarea>
                              </div>
                            </div>
                          </template>

                          <!-- 6. TIPE: KUTIPAN / BLOCKQUOTE -->
                          <template x-if="block.type === 'quote'">
                            <div class="p-4 rounded-lg bg-[#fafafa] border-l-4 border-[#BC0202] space-y-2">
                              <label class="text-[11px] font-bold uppercase tracking-wider text-zinc-600 block">Isi Kutipan / Pernyataan:</label>
                              <textarea
                                x-model="block.quote"
                                rows="2"
                                placeholder="Kutipan komitmen dewan..."
                                class="w-full font-serif italic rounded-lg border border-zinc-300 bg-white text-xs sm:text-sm p-2.5 text-zinc-900"
                              ></textarea>
                              <div class="flex items-center gap-2 pt-1">
                                <span class="text-xs text-zinc-500 font-medium">Sumber / Tokoh:</span>
                                <input
                                  type="text"
                                  x-model="block.author"
                                  placeholder="Nama narasumber kutipan..."
                                  class="flex-1 rounded-md border border-zinc-300 bg-white text-xs px-2.5 py-1 text-zinc-900"
                                />
                              </div>
                            </div>
                          </template>
                        </div>
                      </div>
                    </template>
                  </div>

                  <!-- ========================================== -->
                  <!-- TOOLBAR TAMBAH BLOK MODULAR (WORDPRESS UI) -->
                  <!-- ========================================== -->
                  <div class="rounded-xl border-2 border-dashed border-zinc-300 bg-white p-6 text-center">
                    <span class="text-xs font-bold text-zinc-700 block mb-1">Tambah Blok Modular ke Kanvas</span>
                    <p class="text-[11px] text-zinc-500 mb-4">Pilih jenis blok konten yang ingin dimasukkan ke dalam tulisan:</p>

                    <div class="flex flex-wrap items-center justify-center gap-2">
                      <button
                        type="button"
                        @click="addBlock('heading')"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-[#BC0202] hover:text-[#BC0202] text-xs font-semibold px-3 py-2 shadow-2xs transition-all"
                      >
                        <span class="font-mono font-bold text-xs">H</span>
                        <span>Judul / Heading</span>
                      </button>

                      <button
                        type="button"
                        @click="addBlock('paragraph')"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-[#BC0202] hover:text-[#BC0202] text-xs font-semibold px-3 py-2 shadow-2xs transition-all"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        <span>Paragraf</span>
                      </button>

                      <button
                        type="button"
                        @click="addBlock('image')"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-[#BC0202] hover:text-[#BC0202] text-xs font-semibold px-3 py-2 shadow-2xs transition-all"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Gambar / Image</span>
                      </button>

                      <button
                        type="button"
                        @click="addBlock('list')"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-[#BC0202] hover:text-[#BC0202] text-xs font-semibold px-3 py-2 shadow-2xs transition-all"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Daftar Poin (List)</span>
                      </button>

                      <button
                        type="button"
                        @click="addBlock('grid')"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-[#BC0202] hover:text-[#BC0202] text-xs font-semibold px-3 py-2 shadow-2xs transition-all"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z" />
                        </svg>
                        <span>Grid 2 Kolom</span>
                      </button>

                      <button
                        type="button"
                        @click="addBlock('quote')"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-white hover:border-[#BC0202] hover:text-[#BC0202] text-xs font-semibold px-3 py-2 shadow-2xs transition-all"
                      >
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <span>Kutipan (Quote)</span>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- ============================================== -->
                <!-- RIGHT: PENGATURAN PUBLIKASI & COVER (4 COLS)  -->
                <!-- ============================================== -->
                <div class="lg:col-span-4 space-y-6">
                  <!-- Panel Status & Publikasi -->
                  <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-5">
                    <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Status Publikasi
                    </h3>

                    <!-- Tanggal Terbit -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1">Tanggal Rilis Laporan:</label>
                      <input
                        type="date"
                        x-model="form.date"
                        class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                      />
                    </div>

                    <!-- Status Radio (Terbit vs Draf) -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5">Status Tulisan:</label>
                      <div class="grid grid-cols-2 gap-2">
                        <label
                          :class="form.status === 'Terbit' ? 'bg-[#BC0202] text-white border-[#BC0202]' : 'bg-white text-zinc-700 border-zinc-200'"
                          class="rounded-lg border px-3 py-2 text-xs font-semibold cursor-pointer text-center transition-colors flex items-center justify-center gap-1.5"
                        >
                          <input type="radio" value="Terbit" x-model="form.status" class="hidden" />
                          <span>&bull; Terbit</span>
                        </label>

                        <label
                          :class="form.status === 'Draf' ? 'bg-zinc-900 text-white border-zinc-900' : 'bg-white text-zinc-700 border-zinc-200'"
                          class="rounded-lg border px-3 py-2 text-xs font-semibold cursor-pointer text-center transition-colors flex items-center justify-center gap-1.5"
                        >
                          <input type="radio" value="Draf" x-model="form.status" class="hidden" />
                          <span>Draf</span>
                        </label>
                      </div>
                    </div>

                    <!-- Sorotan Utama Switch/Checkbox -->
                    <div class="pt-3 border-t border-zinc-100">
                      <label class="flex items-start gap-3 cursor-pointer">
                        <input
                          type="checkbox"
                          x-model="form.isFeatured"
                          class="w-4 h-4 mt-0.5 rounded text-[#BC0202] focus:ring-[#FF0000] border-zinc-300"
                        />
                        <div>
                          <span class="font-bold text-xs text-zinc-950 block">Sorotan Utama (Featured)</span>
                          <span class="text-[11px] text-zinc-500 leading-normal block mt-0.5">
                            Menampilkan artikel ini di kartu besar halaman Beranda &amp; bagian teratas halaman Kinerja.
                          </span>
                        </div>
                      </label>
                    </div>

                    <!-- Tombol Simpan di Sidebar -->
                    <div class="pt-3 border-t border-zinc-100">
                      <button
                        type="button"
                        @click="saveArticle()"
                        class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold py-2.5 shadow-sm transition-colors active:scale-98"
                      >
                        Simpan Laporan Kinerja
                      </button>
                    </div>
                  </div>

                  <!-- Panel Cover Image -->
                  <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-4">
                    <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Cover Image (Gambar Sampul)
                    </h3>

                    <!-- Pratinjau Cover -->
                    <div class="aspect-[16/10] bg-zinc-100 rounded-lg overflow-hidden border border-zinc-200 shadow-2xs">
                      <img :src="form.coverImage" alt="Cover Image Laporan" class="w-full h-full object-cover" />
                    </div>

                    <!-- Pilihan Cover dari Aset Lokal -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5">Pilih Gambar Sampul:</label>
                      <select
                        x-model="form.coverImage"
                        class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                      >
                        <template x-for="c in availableCovers" :key="c.url">
                          <option :value="c.url" x-text="c.label"></option>
                        </template>
                      </select>
                      <p class="text-[11px] text-zinc-500 mt-1.5">Format rasio 16:9 atau 16:10 untuk tampilan ideal pada kartu publik.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

        <!-- ========================================== -->
        <!-- 4. MINIMALIST ADMIN FOOTER (#000000)       -->
        <!-- ========================================== -->
        <footer class="w-full bg-[#000000] text-white py-8 border-t border-zinc-800">
          <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
              <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-[11px]">BLB</div>
              <span class="text-xs font-semibold text-zinc-300">Modul Pengelolaan Hasil Kinerja &bull; Banu Lesmana Bagaskara, S.M.</span>
            </div>
            <div class="text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
          </div>
        </footer>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- MODAL PRATINJAU PUBLIK (TAMPILAN SESUAI HALAMAN PUBLIK)   -->
    <!-- ======================================================== -->
    <div
      x-show="previewModal"
      x-cloak
      role="dialog"
      aria-modal="true"
      aria-labelledby="modal-preview-title"
      class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-zinc-950/85 backdrop-blur-sm overflow-y-auto"
    >
      <div @click.away="closePreview()" class="bg-white border border-zinc-200 text-zinc-950 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[92vh] flex flex-col overflow-hidden my-auto">
        <!-- Modal Top Bar -->
        <div class="px-6 py-4 bg-[#faf5f5] border-b border-zinc-200 flex items-center justify-between gap-4 shrink-0">
          <div class="flex items-center gap-2.5">
            <span class="w-2.5 h-2.5 rounded-full bg-[#BC0202]"></span>
            <span class="font-bold text-xs sm:text-sm text-zinc-900 tracking-tight">Pratinjau Tampilan Artikel Hasil Kinerja (Mode Publik)</span>
          </div>
          <button
            type="button"
            @click="closePreview()"
            aria-label="Tutup Pratinjau"
            class="rounded-lg p-1.5 text-zinc-500 hover:text-zinc-950 hover:bg-zinc-200/60 transition-colors"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Content: Simulasi Halaman Baca Detail Publik -->
        <div class="p-6 sm:p-10 overflow-y-auto space-y-6">
          <!-- Metadata Tanggal & Kategori -->
          <div class="flex items-center text-xs font-medium text-zinc-500 gap-2">
            <span x-text="form.date"></span>
            <span>&bull;</span>
            <span class="text-[#BC0202] font-semibold">Laporan Kinerja Dewan</span>
          </div>

          <!-- Judul Utama -->
          <h1 id="modal-preview-title" class="text-2xl sm:text-3xl lg:text-4xl font-bold text-zinc-950 leading-tight tracking-tight" x-text="form.title ? form.title : 'Judul Laporan Kinerja'"></h1>

          <!-- Gambar Sampul Besar -->
          <div class="aspect-[16/9] w-full rounded-xl overflow-hidden border border-zinc-200 bg-zinc-100">
            <img :src="form.coverImage" :alt="form.title" class="w-full h-full object-cover" />
          </div>

          <!-- Cuplikan Pembuka -->
          <p x-show="form.excerpt" class="text-sm sm:text-base text-zinc-700 font-medium leading-relaxed border-l-2 border-[#BC0202] pl-4 py-1" x-text="form.excerpt"></p>

          <!-- Render Blok-Blok Kanvas Sesuai Tipenya -->
          <div class="space-y-6 pt-2">
            <template x-for="block in form.blocks" :key="block.id">
              <div>
                <!-- Heading Block -->
                <template x-if="block.type === 'heading'">
                  <div>
                    <h2 x-show="block.level === 'h2'" class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight leading-snug mt-6 mb-2" x-text="block.text"></h2>
                    <h3 x-show="block.level === 'h3'" class="text-lg sm:text-xl font-bold text-zinc-950 tracking-tight leading-snug mt-4 mb-2" x-text="block.text"></h3>
                  </div>
                </template>

                <!-- Paragraph Block -->
                <template x-if="block.type === 'paragraph'">
                  <p class="text-xs sm:text-sm text-zinc-700 leading-relaxed" x-text="block.text"></p>
                </template>

                <!-- Image Block -->
                <template x-if="block.type === 'image'">
                  <figure class="my-4 space-y-2">
                    <div class="aspect-[16/10] w-full rounded-xl overflow-hidden border border-zinc-200 bg-zinc-100">
                      <img :src="block.url" :alt="block.caption" class="w-full h-full object-cover" />
                    </div>
                    <figcaption x-show="block.caption" class="text-center text-xs text-zinc-500 italic" x-text="block.caption"></figcaption>
                  </figure>
                </template>

                <!-- List Block -->
                <template x-if="block.type === 'list'">
                  <ul class="space-y-2 my-3 pl-2">
                    <template x-for="item in block.items" :key="item">
                      <li class="flex items-start gap-2.5 text-xs sm:text-sm text-zinc-700 leading-relaxed">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#BC0202] mt-2 shrink-0"></span>
                        <span x-text="item"></span>
                      </li>
                    </template>
                  </ul>
                </template>

                <!-- Grid Block -->
                <template x-if="block.type === 'grid'">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                    <div class="p-5 rounded-xl border border-zinc-200 bg-[#fafafa]">
                      <h4 class="font-bold text-sm sm:text-base text-zinc-950 tracking-tight" x-text="block.col1Title"></h4>
                      <p class="text-xs text-zinc-600 mt-2 leading-relaxed" x-text="block.col1Text"></p>
                    </div>
                    <div class="p-5 rounded-xl border border-zinc-200 bg-[#fafafa]">
                      <h4 class="font-bold text-sm sm:text-base text-zinc-950 tracking-tight" x-text="block.col2Title"></h4>
                      <p class="text-xs text-zinc-600 mt-2 leading-relaxed" x-text="block.col2Text"></p>
                    </div>
                  </div>
                </template>

                <!-- Quote Block -->
                <template x-if="block.type === 'quote'">
                  <blockquote class="p-5 sm:p-6 rounded-xl bg-[#fafafa] border-l-4 border-[#BC0202] my-4">
                    <p class="text-sm sm:text-base font-bold italic text-zinc-950 leading-relaxed" x-text="'“' + block.quote + '”'"></p>
                    <span x-show="block.author" class="block text-xs font-semibold text-[#BC0202] mt-2" x-text="'— ' + block.author"></span>
                  </blockquote>
                </template>
              </div>
            </template>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-3.5 bg-[#fafafa] border-t border-zinc-200 flex items-center justify-between shrink-0">
          <span class="text-xs text-zinc-500">Pratinjau render otomatis berbasis konfigurasi blok kanvas.</span>
          <button
            type="button"
            @click="closePreview()"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors"
          >
            Tutup Pratinjau
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
