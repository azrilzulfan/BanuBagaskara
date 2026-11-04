<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Galeri &amp; Album Foto | Dasbor Admin Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI & Photo Lightbox -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine Component for Kelola Galeri Album & Foto -->
    <script>
      function adminGaleri() {
        return {
          mobileMenu: false,
          currentView: 'list', // 'list' atau 'editor'
          searchQuery: '',
          statusFilter: 'all', // 'all', 'published', 'draft'
          saveSuccessNotification: false,

          // Lightbox Modal State
          lightboxModal: false,
          activePhotoIndex: 0,
          previewAlbumData: null,

          // Form State for Album & Photos
          formMode: 'create', // 'create' atau 'edit'
          currentAlbumId: null,
          form: {
            title: '',
            date: '',
            desc: '',
            cover: '/assets/banu/testi_dialog.jpg',
            status: 'Terbit', // 'Terbit' atau 'Draf'
            photos: []
          },

          // Preset pilihan gambar dari aset lokal yang tersedia
          availablePhotos: [
            { label: 'Dialog Warga Kebon Pedes', url: '/assets/banu/testi_dialog.jpg' },
            { label: 'Ambulance Siaga 24 Jam', url: '/assets/banu/program_ambulance.jpg' },
            { label: 'Pelatihan UMKM RT/RW', url: '/assets/banu/program_umkm.jpg' },
            { label: 'Sidang Parlemen & Paripurna', url: '/assets/banu/hero_banu.jpg' },
            { label: 'Rembug Komunitas Warga', url: '/assets/banu/footer_community.jpg' },
            { label: 'Banner Serbaguna', url: '/assets/banu/banner_serbaguna.jpg' }
          ],

          // Data Awal Album Galeri (Sesuai dengan Data Resmi di Template Publik galeri.html)
          albums: [
            {
              id: 1,
              title: 'Dialog Reses Masa Sidang II di Kebon Pedes',
              date: '2026-02-28',
              dateFormatted: '28 Februari 2026',
              desc: 'Penyerapan usulan drainase lingkungan, PJU, dan penataan saluran air bersama warga serta pengurus RW 05 Kelurahan Kebon Pedes.',
              cover: '/assets/banu/testi_dialog.jpg',
              status: 'Terbit',
              photos: [
                { id: 'p1', url: '/assets/banu/testi_dialog.jpg', caption: 'Tatap muka dialog bersama ketua RT, RW, dan tokoh warga Kebon Pedes.' },
                { id: 'p2', url: '/assets/banu/hero_banu.jpg', caption: 'Penyampaian komitmen pengawalan Pokir APBD oleh Banu Lesmana Bagaskara.' },
                { id: 'p3', url: '/assets/banu/footer_community.jpg', caption: 'Sesi ramah tamah dan foto bersama seluruh perwakilan warga lingkungan.' },
                { id: 'p4', url: '/assets/banu/banner_serbaguna.jpg', caption: 'Spanduk komitmen pengawalan aspirasi pembangunan lingkungan.' }
              ]
            },
            {
              id: 2,
              title: 'Armada Ambulance Siaga 24 Jam & Layanan Pasien',
              date: '2026-02-24',
              dateFormatted: '24 Februari 2026',
              desc: 'Pendampingan tanggap darurat medis dan rujukan warga sakit se-Kecamatan Tanah Sareal menuju RSUD Kota Bogor secara gratis.',
              cover: '/assets/banu/program_ambulance.jpg',
              status: 'Terbit',
              photos: [
                { id: 'p21', url: '/assets/banu/program_ambulance.jpg', caption: 'Unit operasional Ambulance Siaga 24 Jam bersiaga di Kedung Badak.' },
                { id: 'p22', url: '/assets/banu/footer_community.jpg', caption: 'Briefing relawan pendamping kesehatan sebelum evakuasi darurat.' },
                { id: 'p23', url: '/assets/banu/testi_dialog.jpg', caption: 'Koordinasi bersama perwakilan keluarga pasien di RSUD Kota Bogor.' },
                { id: 'p24', url: '/assets/banu/banner_serbaguna.jpg', caption: 'Layanan siaga ambulance bebas biaya untuk warga Tanah Sareal.' }
              ]
            },
            {
              id: 3,
              title: 'Fasilitasi NIB Gratis & Pelatihan Foto Produk UMKM',
              date: '2026-02-19',
              dateFormatted: '19 Februari 2026',
              desc: 'Pendampingan legalitas izin usaha resmi serta pelatihan foto katalog produk digital bagi pedagang kecil di Kedung Badak.',
              cover: '/assets/banu/program_umkm.jpg',
              status: 'Terbit',
              photos: [
                { id: 'p31', url: '/assets/banu/program_umkm.jpg', caption: 'Praktik pemotretan produk olahan makanan warga dengan studio mini.' },
                { id: 'p32', url: '/assets/banu/hero_banu.jpg', caption: 'Penyerahan simbolis sertifikat NIB OSS RBA kepada pelaku usaha mikro.' },
                { id: 'p33', url: '/assets/banu/testi_dialog.jpg', caption: 'Sesi konsultasi pendaftaran sertifikasi halal self-declare.' },
                { id: 'p34', url: '/assets/banu/banner_serbaguna.jpg', caption: 'Suasana kelas pelatihan pemasaran digital berbasis RT/RW.' }
              ]
            },
            {
              id: 4,
              title: 'Pertemuan Tokoh & Silaturahmi Komunitas Sukadamai',
              date: '2026-02-10',
              dateFormatted: '10 Februari 2026',
              desc: 'Diskusi langsung mengenai penertiban fasilitas umum, penerangan gang, dan pembinaan kepemudaan bersama tokoh masyarakat.',
              cover: '/assets/banu/footer_community.jpg',
              status: 'Terbit',
              photos: [
                { id: 'p41', url: '/assets/banu/footer_community.jpg', caption: 'Rembug guyub warga dan tokoh pemuda Kelurahan Sukadamai.' },
                { id: 'p42', url: '/assets/banu/testi_dialog.jpg', caption: 'Penyampaian usulan perbaikan jembatan penyeberangan gang.' },
                { id: 'p43', url: '/assets/banu/hero_banu.jpg', caption: 'Sambutan evaluasi penyerapan pokok pikiran dewan tahun 2026.' }
              ]
            },
            {
              id: 5,
              title: 'Sidang Paripurna & Pengawasan Anggaran DPRD',
              date: '2026-02-04',
              dateFormatted: '04 Februari 2026',
              desc: 'Menyampaikan pandangan umum fraksi terkait efisiensi belanja publik dan perlindungan alokasi bantuan sosial masyarakat.',
              cover: '/assets/banu/hero_banu.jpg',
              status: 'Terbit',
              photos: [
                { id: 'p51', url: '/assets/banu/hero_banu.jpg', caption: 'Penyampaian pandangan umum fraksi di mimbar Sidang Paripurna.' },
                { id: 'p52', url: '/assets/banu/testi_dialog.jpg', caption: 'Koordinasi bersama komisi terkait evaluasi belanja prioritas daerah.' }
              ]
            },
            {
              id: 6,
              title: 'Dokumentasi Draf Rencana Penataan Bank Sampah Kedung Waringin',
              date: '2026-03-02',
              dateFormatted: '02 Maret 2026',
              desc: 'Foto dokumentasi awal survei lokasi perintisan pos bank sampah terpadu warga sebelum pengesahan program pembinaan.',
              cover: '/assets/banu/footer_community.jpg',
              status: 'Draf',
              photos: [
                { id: 'p61', url: '/assets/banu/footer_community.jpg', caption: 'Survei lokasi lahan fasum bersama pengurus RT 04.' },
                { id: 'p62', url: '/assets/banu/program_umkm.jpg', caption: 'Contoh produk olahan daur ulang kerajinan plastik warga.' }
              ]
            }
          ],

          get filteredAlbums() {
            return this.albums.filter(item => {
              const matchesSearch = item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                    item.desc.toLowerCase().includes(this.searchQuery.toLowerCase());
              if (this.statusFilter === 'all') return matchesSearch;
              if (this.statusFilter === 'published') return matchesSearch && item.status === 'Terbit';
              if (this.statusFilter === 'draft') return matchesSearch && item.status === 'Draf';
              return matchesSearch;
            });
          },

          get totalPhotosCount() {
            return this.albums.reduce((acc, curr) => acc + (curr.photos ? curr.photos.length : 0), 0);
          },

          // Buka Form Buat Album Baru
          openCreate() {
            this.formMode = 'create';
            this.currentAlbumId = null;
            this.form = {
              title: '',
              date: new Date().toISOString().split('T')[0],
              desc: '',
              cover: '/assets/banu/testi_dialog.jpg',
              status: 'Terbit',
              photos: [
                { id: 'p_' + Date.now() + '_1', url: '/assets/banu/testi_dialog.jpg', caption: 'Foto dokumentasi utama kegiatan.' },
                { id: 'p_' + Date.now() + '_2', url: '/assets/banu/hero_banu.jpg', caption: 'Foto dokumentasi interaksi di lapangan.' }
              ]
            };
            this.currentView = 'editor';
            window.scrollTo({ top: 0, behavior: 'smooth' });
          },

          // Buka Form Sunting Album & Foto
          openEdit(item) {
            this.formMode = 'edit';
            this.currentAlbumId = item.id;
            this.form = {
              title: item.title,
              date: item.date,
              desc: item.desc,
              cover: item.cover,
              status: item.status,
              // Deep clone photos
              photos: JSON.parse(JSON.stringify(item.photos || []))
            };
            this.currentView = 'editor';
            window.scrollTo({ top: 0, behavior: 'smooth' });
          },

          // Simpan Album & Foto
          saveAlbum() {
            if (!this.form.title.trim()) {
              alert('Judul album wajib diisi!');
              return;
            }
            if (this.form.photos.length === 0) {
              alert('Album harus memiliki minimal 1 foto dokumentasi!');
              return;
            }

            const formattedDate = new Date(this.form.date).toLocaleDateString('id-ID', {
              day: 'numeric',
              month: 'long',
              year: 'numeric'
            });

            // Pastikan cover album valid, jika tidak pakai foto pertama
            const coverImage = this.form.cover || this.form.photos[0].url;

            if (this.formMode === 'create') {
              const newAlbum = {
                id: Date.now(),
                title: this.form.title,
                date: this.form.date,
                dateFormatted: formattedDate,
                desc: this.form.desc,
                cover: coverImage,
                status: this.form.status,
                photos: JSON.parse(JSON.stringify(this.form.photos))
              };
              this.albums.unshift(newAlbum);
            } else {
              const idx = this.albums.findIndex(a => a.id === this.currentAlbumId);
              if (idx !== -1) {
                this.albums[idx].title = this.form.title;
                this.albums[idx].date = this.form.date;
                this.albums[idx].dateFormatted = formattedDate;
                this.albums[idx].desc = this.form.desc;
                this.albums[idx].cover = coverImage;
                this.albums[idx].status = this.form.status;
                this.albums[idx].photos = JSON.parse(JSON.stringify(this.form.photos));
              }
            }

            this.saveSuccessNotification = true;
            setTimeout(() => { this.saveSuccessNotification = false; }, 3500);
            this.currentView = 'list';
            window.scrollTo({ top: 0, behavior: 'smooth' });
          },

          // Hapus Album
          deleteAlbum(id) {
            if (confirm('Apakah Anda yakin ingin menghapus album galeri ini beserta seluruh fotonya?')) {
              this.albums = this.albums.filter(a => a.id !== id);
            }
          },

          // Manajemen Foto di Dalam Form Editor
          addPhotoToForm() {
            const newId = 'photo_' + Date.now();
            this.form.photos.push({
              id: newId,
              url: '/assets/banu/testi_dialog.jpg',
              caption: 'Keterangan dokumentasi kegiatan baru.'
            });
          },

          removePhotoFromForm(index) {
            if (this.form.photos.length <= 1) {
              alert('Album harus memiliki minimal 1 foto dokumentasi.');
              return;
            }
            const removed = this.form.photos.splice(index, 1)[0];
            // Jika foto yang dihapus adalah cover, alihkan ke foto pertama
            if (this.form.cover === removed.url && this.form.photos.length > 0) {
              this.form.cover = this.form.photos[0].url;
            }
          },

          setAsCover(url) {
            this.form.cover = url;
          },

          // Buka Lightbox Modal Pratinjau
          openLightbox(album) {
            this.previewAlbumData = album;
            this.activePhotoIndex = 0;
            this.lightboxModal = true;
            document.body.style.overflow = 'hidden';
          },

          openPreviewFromForm() {
            this.previewAlbumData = {
              title: this.form.title || 'Pratinjau Album Galeri',
              dateFormatted: this.form.date,
              desc: this.form.desc,
              cover: this.form.cover,
              photos: this.form.photos
            };
            this.activePhotoIndex = 0;
            this.lightboxModal = true;
            document.body.style.overflow = 'hidden';
          },

          closeLightbox() {
            this.lightboxModal = false;
            document.body.style.overflow = '';
          },

          nextPhoto() {
            if (this.previewAlbumData && this.activePhotoIndex < this.previewAlbumData.photos.length - 1) {
              this.activePhotoIndex++;
            }
          },

          prevPhoto() {
            if (this.activePhotoIndex > 0) {
              this.activePhotoIndex--;
            }
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
    x-data="adminGaleri()"
    @keydown.escape.window="if (lightboxModal) closeLightbox(); else mobileMenu = false;"
    @keydown.arrow-left.window="if(lightboxModal) prevPhoto()"
    @keydown.arrow-right.window="if(lightboxModal) nextPhoto()"
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

              <!-- 2. Hasil Kinerja -->
              <li>
                <a
                  href="/kinerja"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                      />
                    </svg>
                    <span>Hasil Kinerja</span>
                  </span>
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

              <!-- 4. Galeri (Active) -->
              <li>
                <a
                  href="/galeri"
                  aria-current="page"
                  class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-zinc-100 text-zinc-950 text-xs font-bold transition-colors"
                >
                  <span class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-[#BC0202] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                    <span>Galeri</span>
                  </span>
                  <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
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
              href="/galeri"
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
            <a href="/kinerja" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja (Kanvas Blok)</a>
            <a href="/berita" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita Resmi</a>
            <a href="/galeri" @click="mobileMenu = false" class="py-2 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors flex items-center justify-between">
              <span>Galeri Album &amp; Foto</span>
              <span class="w-1.5 h-4 rounded-sm bg-[#BC0202]"></span>
            </a>
            <a href="/admin/aspirasi" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors flex items-center justify-between">
              <span>Kotak Aspirasi</span>
              <span class="inline-block text-[11px] font-bold px-2 py-0.5 rounded-md bg-red-50 text-[#BC0202] border border-red-100">2 Baru</span>
            </a>
            <a href="/admin/pengaturan" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Pengaturan Halaman Website</a>
            <div class="pt-3 mt-1 border-t border-zinc-100 grid grid-cols-2 gap-2.5">
              <a href="/galeri" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-900 py-2 text-xs font-semibold">
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
              <span class="font-bold block">Album Galeri Berhasil Disimpan!</span>
              <span class="text-emerald-800">Album beserta koleksi foto di dalamnya telah diperbarui.</span>
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
                    <span>Modul Galeri &bull; Dokumentasi Visual</span>
                  </div>
                  <h1 class="text-2xl sm:text-4xl lg:text-[38px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
                    Kelola <span class="text-[#BC0202]">Album Galeri</span>
                  </h1>
                  <p class="text-xs sm:text-sm text-zinc-600 mt-2.5 leading-relaxed">
                    Kelola album kegiatan pengabdian masyarakat beserta rangkaian foto-foto di dalamnya, lengkap dengan keterangan gambar, tanggal kegiatan, dan pratinjau teater foto interaktif.
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
                      <span>Tambah Album Baru</span>
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
          <!-- 2. VIEW A: DAFTAR ALBUM GALERI (LIST VIEW)               -->
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
                    placeholder="Cari judul album atau deskripsi kegiatan..."
                    class="w-full pl-9 pr-3.5 py-2 rounded-lg border border-zinc-300 bg-white text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                  />
                </div>

                <!-- Status Filter Buttons (Strictly No Pill) -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0">
                  <button
                    type="button"
                    @click="statusFilter = 'all'"
                    :class="statusFilter === 'all' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Semua Album (<span x-text="albums.length"></span>)
                  </button>
                  <button
                    type="button"
                    @click="statusFilter = 'published'"
                    :class="statusFilter === 'published' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Terbit (<span x-text="albums.filter(a => a.status === 'Terbit').length"></span>)
                  </button>
                  <button
                    type="button"
                    @click="statusFilter = 'draft'"
                    :class="statusFilter === 'draft' ? 'bg-[#BC0202] text-white border-[#BC0202] font-bold shadow-sm' : 'bg-white text-zinc-700 hover:bg-zinc-100 border-zinc-200 font-semibold'"
                    class="rounded-lg border px-3 py-1.5 text-xs transition-colors shrink-0"
                  >
                    Draf (<span x-text="albums.filter(a => a.status === 'Draf').length"></span>)
                  </button>
                </div>
              </div>
            </section>

            <!-- Albums Grid Container -->
            <section class="w-full bg-[#f4f4f5] py-10 sm:py-12 flex-1">
              <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                  <template x-for="(item, idx) in filteredAlbums" :key="item.id">
                    <div class="bg-white border border-zinc-200 hover:border-zinc-300 rounded-xl p-4 sm:p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                      <div>
                        <!-- Album Cover with Quick Lightbox Trigger -->
                        <div
                          class="aspect-[4/3] w-full bg-zinc-100 rounded-lg overflow-hidden relative border border-zinc-200 shadow-2xs cursor-pointer"
                          @click="openLightbox(item)"
                        >
                          <img :src="item.cover" :alt="item.title" class="w-full h-full object-cover group-hover:scale-104 transition-transform duration-500" />
                          <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity bg-white/95 backdrop-blur-sm text-zinc-900 text-xs font-semibold px-3 py-1.5 rounded-lg shadow-sm flex items-center gap-1.5">
                              <svg class="w-3.5 h-3.5 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>Buka Teater Foto</span>
                            </div>
                          </div>

                          <!-- Badge Jumlah Foto -->
                          <div class="absolute bottom-2.5 right-2.5 bg-zinc-950/80 backdrop-blur-xs text-white text-[11px] font-bold px-2 py-0.5 rounded-md flex items-center gap-1">
                            <svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                            <span x-text="item.photos.length + ' Foto'"></span>
                          </div>
                        </div>

                        <!-- Album Information -->
                        <div class="pt-4">
                          <div class="flex items-center justify-between gap-2 mb-2">
                            <span class="text-xs text-zinc-500 font-medium" x-text="item.dateFormatted"></span>
                            <span
                              class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-md border"
                              :class="item.status === 'Terbit' ? 'bg-[#fafafa] text-zinc-800 border-zinc-200' : 'bg-amber-50 text-amber-800 border-amber-200'"
                              x-text="item.status"
                            ></span>
                          </div>

                          <h2 class="text-base font-bold text-zinc-950 group-hover:text-[#BC0202] transition-colors leading-snug line-clamp-2" x-text="item.title"></h2>
                          <p class="text-xs text-zinc-600 mt-2 line-clamp-2 leading-relaxed" x-text="item.desc"></p>
                        </div>
                      </div>

                      <!-- Action Buttons -->
                      <div class="mt-5 pt-4 border-t border-zinc-100 flex items-center justify-between gap-2">
                        <button
                          type="button"
                          @click="openLightbox(item)"
                          class="inline-flex items-center gap-1 px-3 py-2 rounded-lg border border-zinc-200 bg-[#fafafa] hover:bg-zinc-100 text-zinc-700 text-xs font-semibold transition-colors"
                          title="Lihat Pratinjau Foto"
                        >
                          <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                          <span>Pratinjau</span>
                        </button>

                        <div class="flex items-center gap-1.5">
                          <button
                            type="button"
                            @click="openEdit(item)"
                            class="inline-flex items-center gap-1 px-3 py-2 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold shadow-sm transition-colors active:scale-98"
                          >
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Kelola Foto</span>
                          </button>

                          <button
                            type="button"
                            @click="deleteAlbum(item.id)"
                            title="Hapus Album"
                            class="p-2 rounded-lg border border-zinc-200 bg-white text-zinc-500 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors"
                          >
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                  </template>
                </div>

                <!-- Empty State -->
                <div x-show="filteredAlbums.length === 0" class="text-center py-16 bg-white rounded-xl border border-zinc-200 p-8">
                  <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-400 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <h3 class="font-bold text-base text-zinc-950">Tidak ada album galeri yang ditemukan</h3>
                  <p class="text-xs text-zinc-500 mt-1">Coba kata kunci pencarian lain atau pilih filter status yang berbeda.</p>
                </div>
              </div>
            </section>
          </div>

          <!-- ======================================================== -->
          <!-- 3. VIEW B: FORM EDITOR ALBUM & FOTO (EDITOR VIEW)        -->
          <!-- ======================================================== -->
          <div x-show="currentView === 'editor'" x-cloak class="w-full flex-1 flex flex-col bg-[#f4f4f5]">
            <!-- Top Form Toolbar -->
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
                  <span class="text-[11px] font-bold uppercase tracking-wider text-[#BC0202]" x-text="formMode === 'create' ? 'Tambah Album Baru' : 'Menyunting Album & Koleksi Foto'"></span>
                  <h2 class="text-sm sm:text-base font-bold text-zinc-950 tracking-tight leading-none" x-text="form.title ? form.title : 'Judul Album Belum Diisi'"></h2>
                </div>
              </div>

              <div class="flex items-center gap-2.5">
                <!-- Tombol Pratinjau Lightbox Teater Foto -->
                <button
                  type="button"
                  @click="openPreviewFromForm()"
                  class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-900 text-xs font-semibold px-3.5 py-2 shadow-2xs transition-colors gap-1.5"
                >
                  <svg class="w-3.5 h-3.5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <span>Pratinjau Teater Foto</span>
                </button>

                <!-- Tombol Simpan Album -->
                <button
                  type="button"
                  @click="saveAlbum()"
                  class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors active:scale-98 gap-1.5"
                >
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>Simpan Album</span>
                </button>
              </div>
            </div>

            <!-- Form Body: 2 Kolom Layout (Kelola Foto 8 Cols + Informasi Album 4 Cols) -->
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-10 xl:px-12 py-8 sm:py-10 w-full flex-1">
              <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- ============================================== -->
                <!-- LEFT/CENTER: KELOLA FOTO-FOTO DI ALBUM (8 COLS) -->
                <!-- ============================================== -->
                <div class="lg:col-span-8 space-y-6">
                  <div class="rounded-xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-sm">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-5 mb-6 border-b border-zinc-100">
                      <div>
                        <h3 class="font-bold text-base sm:text-lg text-zinc-950 tracking-tight flex items-center">
                          <span class="text-[#BC0202] font-black mr-2">|</span>
                          Foto-Foto Dokumentasi di Dalam Album
                        </h3>
                        <p class="text-xs text-zinc-500 mt-1">Total <strong class="text-zinc-900" x-text="form.photos.length"></strong> foto terpasang dalam album ini.</p>
                      </div>

                      <button
                        type="button"
                        @click="addPhotoToForm()"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-4 py-2 shadow-sm transition-colors active:scale-98 self-start sm:self-auto"
                      >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah Foto ke Album</span>
                      </button>
                    </div>

                    <!-- Grid List Foto dalam Album -->
                    <div class="space-y-4">
                      <template x-for="(photo, pIdx) in form.photos" :key="photo.id">
                        <div class="rounded-xl border border-zinc-200 bg-[#fafafa] hover:bg-white p-4 sm:p-5 transition-all flex flex-col sm:flex-row items-start gap-4 sm:gap-5 group">
                          <!-- Foto Thumbnail -->
                          <div class="w-full sm:w-44 aspect-[4/3] rounded-lg overflow-hidden bg-zinc-200 border border-zinc-200 shrink-0 relative shadow-2xs">
                            <img :src="photo.url" alt="Foto Dokumentasi" class="w-full h-full object-cover" />
                            <span
                              x-show="form.cover === photo.url"
                              class="absolute top-2 left-2 bg-[#BC0202] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm"
                            >
                              Cover Album
                            </span>
                          </div>

                          <!-- Detail Form Foto (Pilihan Sumber & Keterangan) -->
                          <div class="min-w-0 flex-1 w-full space-y-3">
                            <div class="flex items-center justify-between gap-2">
                              <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-500" x-text="'Foto #' + (pIdx + 1)"></span>

                              <div class="flex items-center gap-2">
                                <!-- Tombol Jadikan Cover -->
                                <button
                                  type="button"
                                  @click="setAsCover(photo.url)"
                                  :disabled="form.cover === photo.url"
                                  :class="form.cover === photo.url ? 'opacity-40 cursor-default bg-zinc-200 text-zinc-600 border-zinc-200' : 'bg-white text-zinc-700 hover:text-zinc-950 border-zinc-300 hover:bg-zinc-50'"
                                  class="text-[11px] font-semibold px-2.5 py-1 rounded-md border shadow-2xs transition-colors"
                                >
                                  <span x-text="form.cover === photo.url ? 'Sampul Aktif' : 'Jadikan Sampul'"></span>
                                </button>

                                <!-- Tombol Hapus Foto -->
                                <button
                                  type="button"
                                  @click="removePhotoFromForm(pIdx)"
                                  class="p-1 rounded text-zinc-400 hover:text-red-600 hover:bg-red-50 transition-colors"
                                  title="Hapus foto dari album"
                                >
                                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                                </button>
                              </div>
                            </div>

                            <!-- Pilih Foto Aset -->
                            <div>
                              <label class="block text-[11px] font-bold text-zinc-700 mb-1">Pilih File Dokumentasi:</label>
                              <select
                                x-model="photo.url"
                                class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                              >
                                <template x-for="c in availablePhotos" :key="c.url">
                                  <option :value="c.url" x-text="c.label"></option>
                                </template>
                              </select>
                            </div>

                            <!-- Keterangan / Caption Foto -->
                            <div>
                              <label class="block text-[11px] font-bold text-zinc-700 mb-1">Keterangan Foto (Caption):</label>
                              <input
                                type="text"
                                x-model="photo.caption"
                                placeholder="Tuliskan keterangan suasana atau pihak pada foto ini..."
                                class="w-full rounded-lg border border-zinc-300 bg-white text-xs px-3 py-2 text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                              />
                            </div>
                          </div>
                        </div>
                      </template>
                    </div>

                    <!-- Tombol Tambah Foto di Bawah -->
                    <div class="mt-6 pt-5 border-t border-zinc-200/80 text-center">
                      <button
                        type="button"
                        @click="addPhotoToForm()"
                        class="inline-flex items-center gap-1.5 rounded-lg border-2 border-dashed border-zinc-300 hover:border-[#BC0202] hover:text-[#BC0202] bg-white text-zinc-700 text-xs font-semibold px-5 py-3 transition-colors w-full justify-center"
                      >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah Foto Dokumentasi Lainnya ke Album Ini</span>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- ============================================== -->
                <!-- RIGHT: INFORMASI & PENGATURAN ALBUM (4 COLS)   -->
                <!-- ============================================== -->
                <div class="lg:col-span-4 space-y-6">
                  <!-- Panel Pengaturan Meta Album -->
                  <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-5">
                    <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Informasi Album
                    </h3>

                    <!-- Judul Album -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5 uppercase tracking-wider">Judul Album Kegiatan *</label>
                      <input
                        type="text"
                        x-model="form.title"
                        placeholder="Contoh: Dialog Reses di Kebon Pedes..."
                        class="w-full font-bold rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-950 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                      />
                    </div>

                    <!-- Tanggal Kegiatan -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5">Tanggal Pelaksanaan:</label>
                      <input
                        type="date"
                        x-model="form.date"
                        class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs text-zinc-900 focus:outline-none focus:border-[#FF0000]"
                      />
                    </div>

                    <!-- Deskripsi Album -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5">Deskripsi Singkat Album:</label>
                      <textarea
                        x-model="form.desc"
                        rows="4"
                        placeholder="Uraian singkat mengenai rangkaian kegiatan atau momentum pada album foto ini..."
                        class="w-full rounded-lg border border-zinc-300 bg-white p-3 text-xs text-zinc-900 leading-relaxed focus:outline-none focus:border-[#FF0000]"
                      ></textarea>
                    </div>

                    <!-- Status Terbit / Draf -->
                    <div>
                      <label class="block text-xs font-bold text-zinc-900 mb-1.5">Status Album:</label>
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

                    <!-- Tombol Simpan -->
                    <div class="pt-3 border-t border-zinc-100">
                      <button
                        type="button"
                        @click="saveAlbum()"
                        class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold py-2.5 shadow-sm transition-colors active:scale-98"
                      >
                        Simpan Album Galeri
                      </button>
                    </div>
                  </div>

                  <!-- Panel Sampul Album Terpilih -->
                  <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm space-y-4">
                    <h3 class="font-bold text-sm text-zinc-950 pb-3 border-b border-zinc-100 flex items-center tracking-tight">
                      <span class="text-[#BC0202] font-black mr-2">|</span> Sampul Album Terpilih
                    </h3>

                    <!-- Pratinjau Sampul Aktif -->
                    <div class="aspect-[4/3] bg-zinc-100 rounded-lg overflow-hidden border border-zinc-200 shadow-2xs">
                      <img :src="form.cover" alt="Sampul Album" class="w-full h-full object-cover" />
                    </div>

                    <p class="text-[11px] text-zinc-500 leading-normal">
                      Sampul ini akan menjadi foto utama kartu album pada grid Galeri publik. Klik tombol <strong>"Jadikan Sampul"</strong> pada salah satu foto di sisi kiri untuk mengubahnya.
                    </p>
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
              <span class="text-xs font-semibold text-zinc-300">Modul Pengelolaan Galeri &bull; Banu Lesmana Bagaskara, S.M.</span>
            </div>
            <div class="text-xs text-zinc-500">&copy; 2026 banubagaskara.</div>
          </div>
        </footer>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- MODAL PRATINJAU LIGHTBOX FOTO (1:1 DENGAN HALAMAN PUBLIK) -->
    <!-- ======================================================== -->
    <div
      x-show="lightboxModal"
      x-cloak
      role="dialog"
      aria-modal="true"
      aria-labelledby="modal-lightbox-title"
      class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-zinc-950/85 backdrop-blur-md select-none"
    >
      <div @click.away="closeLightbox()" class="bg-zinc-900 border border-zinc-800 text-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[92vh] flex flex-col overflow-hidden">
        <!-- Top Bar: Judul Album & Close Button -->
        <div class="px-5 py-3.5 sm:px-6 sm:py-4 border-b border-zinc-800 flex items-center justify-between gap-4 bg-zinc-900 shrink-0">
          <div class="min-w-0 flex-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-red-500 block">Pratinjau Teater Foto Publik</span>
            <h3 id="modal-lightbox-title" class="text-sm sm:text-base font-bold text-white tracking-tight truncate mt-0.5" x-text="previewAlbumData?.title"></h3>
          </div>
          <button
            type="button"
            @click="closeLightbox()"
            aria-label="Tutup Pratinjau"
            class="rounded-lg p-2 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors shrink-0"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Main Photo Preview (Large Center Display) -->
        <div class="relative bg-black flex-1 min-h-[260px] sm:min-h-[400px] max-h-[56vh] flex items-center justify-center overflow-hidden">
          <template x-if="previewAlbumData && previewAlbumData.photos && previewAlbumData.photos.length > 0">
            <img
              :src="previewAlbumData.photos[activePhotoIndex]?.url"
              :alt="previewAlbumData.title"
              class="w-full h-full max-h-[56vh] object-contain transition-all duration-200"
            />
          </template>

          <!-- Prev Button -->
          <button
            type="button"
            x-show="activePhotoIndex > 0"
            @click.stop="prevPhoto()"
            aria-label="Foto Sebelumnya"
            class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md hover:scale-105"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <!-- Next Button -->
          <button
            type="button"
            x-show="previewAlbumData && activePhotoIndex < previewAlbumData.photos.length - 1"
            @click.stop="nextPhoto()"
            aria-label="Foto Berikutnya"
            class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-zinc-900/80 hover:bg-zinc-900 text-white flex items-center justify-center border border-zinc-700 transition-all shadow-md hover:scale-105"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        <!-- Caption Foto Aktif -->
        <div class="bg-zinc-900 px-5 py-2.5 border-t border-zinc-800/80 text-center">
          <p class="text-xs text-zinc-300 italic" x-text="previewAlbumData?.photos[activePhotoIndex]?.caption || 'Dokumentasi kegiatan resmi'"></p>
        </div>

        <!-- Thumbnail Strip di Bawah -->
        <div class="bg-zinc-950/95 border-t border-zinc-800 px-4 py-3 sm:px-6 sm:py-3.5 shrink-0">
          <div class="flex items-center gap-2.5 overflow-x-auto pb-1">
            <template x-for="(photo, idx) in (previewAlbumData ? previewAlbumData.photos : [])" :key="idx">
              <button
                type="button"
                @click="activePhotoIndex = idx"
                class="relative w-16 h-12 sm:w-20 sm:h-14 shrink-0 rounded-lg overflow-hidden border-2 transition-all duration-200 focus:outline-none"
                :class="activePhotoIndex === idx ? 'border-[#BC0202] scale-102 ring-1 ring-[#BC0202]' : 'border-zinc-800 opacity-60 hover:opacity-100 hover:border-zinc-600'"
              >
                <img :src="photo.url" :alt="previewAlbumData?.title" class="w-full h-full object-cover" />
              </button>
            </template>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
