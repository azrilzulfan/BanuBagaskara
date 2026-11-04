<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kotak Aspirasi Warga | Dasbor Admin Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Font: Plus Jakarta Sans (Clean, Modern, Disciplined Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN for Lightweight Reactive UI -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine Component for Kotak Aspirasi Management -->
    <script>
      function adminAspirasi() {
        return {
          mobileMenu: false,
          searchQuery: '',
          statusFilter: 'all', // 'all', 'Baru', 'Ditinjau', 'Selesai'
          categoryFilter: 'all',
          kelurahanFilter: 'all',
          selectedIds: [],
          selectAll: false,

          // Modals state
          detailModal: false,
          deleteModal: false,
          targetDeleteId: null,
          selectedAspiration: null,

          // Internal note form inside modal
          newNote: '',
          statusDraft: 'Baru',

          // Toast Notification
          toast: {
            show: false,
            message: '',
            type: 'success', // 'success', 'info', 'danger'
          },

          triggerToast(msg, type = 'success') {
            this.toast.message = msg;
            this.toast.type = type;
            this.toast.show = true;
            setTimeout(() => {
              this.toast.show = false;
            }, 3500);
          },

          // Initial Real Data from Tanah Sareal, Kota Bogor
          aspirations: @if(isset($aspirations) && count($aspirations) > 0) {{ Js::from($aspirations) }} @else [
            {
              id: 1,
              ticket: 'BLB-842910',
              date: '04 Nov 2026, 09:15 WIB',
              sender: 'Hendra Gunawan',
              role: 'Ketua RT 03 / RW 05',
              phone: '081283928190',
              address: 'Jl. Kebon Pedes Gang Madrasah No. 14, RT 03 / RW 05',
              kelurahan: 'Kebon Pedes',
              category: 'Infrastruktur & Drainase',
              subject: 'Usulan Normalisasi Saluran Drainase Gang Saat Hujan Deras',
              description:
                'Mohon peninjauan saluran air di lingkungan RT 03/RW 05 Kelurahan Kebon Pedes yang mengalami pendangkalan sedimen parah. Setiap hujan lebat lebih dari 45 menit, air meluap setinggi mata kaki masuk ke teras rumah warga. Kami sudah swadaya keruk manual namun butuh pengerukan alat dan penggantian tutup gorong-gorong beton.',
              status: 'Baru',
              priority: 'Tinggi',
              notes: [
                {
                  date: '04 Nov 2026, 10:00 WIB',
                  author: 'Staf Sekretariat',
                  text: 'Aduan masuk dan diverifikasi valid. Warga aktif dapat dihubungi via WA.',
                },
              ],
            },
            {
              id: 2,
              ticket: 'BLB-842765',
              date: '02 Nov 2026, 14:30 WIB',
              sender: 'Siti Aminah, S.Pd.',
              role: 'Pengurus Lingkungan RW 04',
              phone: '081394821102',
              address: 'Komplek Sukadamai Indah Blok C2, RT 02 / RW 04',
              kelurahan: 'Sukadamai',
              category: 'Penerangan Jalan (PJU)',
              subject: 'Perbaikan 3 Titik Lampu Penerangan Jalan Lingkungan (PJU) Padam',
              description:
                'Terdapat 3 tiang lampu PJU lingkungan di akses gang utama warga Sukadamai menuju jalan raya yang mati total selama sepekan terakhir. Kondisi jalan cukup gelap dan rawan tindak kejahatan malam hari. Mohon bantuan pengawalan disposisi ke Dinas Perhubungan / Disperumkim.',
              status: 'Baru',
              priority: 'Sedang',
              notes: [
                {
                  date: '02 Nov 2026, 15:10 WIB',
                  author: 'Staf Lapangan',
                  text: 'Foto lokasi tiang padam sudah diterima via WA pengirim.',
                },
              ],
            },
            {
              id: 3,
              ticket: 'BLB-842519',
              date: '29 Okt 2026, 11:20 WIB',
              sender: 'Bambang Sutrisno',
              role: 'Koordinator Paguyuban Pengrajin Tempe',
              phone: '085712903341',
              address: 'Kp. Muara RT 01 / RW 02',
              kelurahan: 'Kedung Badak',
              category: 'UMKM & Usaha Warga',
              subject: 'Pendaftaran Pendampingan NIB & Fasilitasi Sertifikasi Halal Gratis',
              description:
                'Kelompok pengrajin tempe dan olahan kedelai rumahan kami beranggotakan 9 keluarga di Kedung Badak ingin mendaftarkan program fasilitasi penerbitan Nomor Induk Berusaha (NIB) dan bimbingan sertifikasi halal yang diselenggarakan Rumah Aspirasi Kang Banu.',
              status: 'Ditinjau',
              priority: 'Sedang',
              notes: [
                {
                  date: '30 Okt 2026, 09:30 WIB',
                  author: 'Admin UMKM',
                  text: 'Data 9 pelaku usaha sudah direkap ke form izin berusaha OSS.',
                },
                {
                  date: '01 Nov 2026, 13:00 WIB',
                  author: 'Kang Banu',
                  text: 'Jadwalkan kunjungan tim pendamping lapangan pada hari Sabtu depan ke lokasi produksi Kp. Muara.',
                },
              ],
            },
            {
              id: 4,
              ticket: 'BLB-842402',
              date: '27 Okt 2026, 08:05 WIB',
              sender: 'Ibu Ratna Dewi',
              role: 'Warga RW 07',
              phone: '082190847712',
              address: 'Jl. Pemuda Gang Melati RT 04 / RW 07',
              kelurahan: 'Kedung Waringin',
              category: 'Layanan Ambulance Siaga',
              subject: 'Permohonan Pengantaran Pasien Lansia Cuci Darah ke RSUD Kota Bogor',
              description:
                'Memerlukan bantuan armada ambulance siaga untuk antar-jemput rutin orang tua kami lansia yang harus menjalani terapi hemodialisa (cuci darah) di RSUD Kota Bogor. Kondisi pasien tirah baring dan keluarga tidak memiliki kendaraan roda empat.',
              status: 'Selesai',
              priority: 'Tinggi',
              notes: [
                {
                  date: '27 Okt 2026, 08:20 WIB',
                  author: 'Koordinator Driver Ambulance',
                  text: 'Armada Siaga 01 meluncur ke lokasi penjemputan didampingi relawan Rumah Aspirasi.',
                },
                {
                  date: '27 Okt 2026, 12:45 WIB',
                  author: 'Koordinator Driver Ambulance',
                  text: 'Pasien telah diantar kembali ke rumah dengan selamat pasca tindakan medis. Layanan bebas biaya.',
                },
              ],
            },
            {
              id: 5,
              ticket: 'BLB-842288',
              date: '25 Okt 2026, 16:40 WIB',
              sender: 'Drs. M. Taufik Hidayat',
              role: 'Pengurus Komite Madrasah & Warga RW 06',
              phone: '081298412389',
              address: 'Kp. Kencana Asri RT 02 / RW 06',
              kelurahan: 'Kencana',
              category: 'Infrastruktur & Drainase',
              subject: 'Usulan Pengaspalan Hotmix Gang Akses Menuju PAUD & Madrasah',
              description:
                'Jalan gang sepanjang kurang lebih 180 meter yang menjadi lalu lalang anak-anak santri madrasah dan PAUD kondisinya sudah rusak berbatu dan berlubang licin saat musim hujan. Kami mengusulkan agar masuk dalam daftar Pokok Pikiran (Pokir) APBD Perubahan.',
              status: 'Ditinjau',
              priority: 'Sedang',
              notes: [
                {
                  date: '26 Okt 2026, 11:15 WIB',
                  author: 'Staf Fraksi',
                  text: 'Usulan dimasukkan ke dalam rekap inventarisir Musrenbang & Pokir Komisi 1 untuk verifikasi teknis Disperumkim.',
                },
              ],
            },
            {
              id: 6,
              ticket: 'BLB-841980',
              date: '22 Okt 2026, 10:15 WIB',
              sender: 'Wahyudi Kusuma',
              role: 'Relawan Lingkungan RW 01',
              phone: '087819208311',
              address: 'Bantaran Sungai Cibuluh RT 03 / RW 01',
              kelurahan: 'Mekarwangi',
              category: 'Lingkungan Hidup & Kebencanaan',
              subject: 'Advokasi Pemangkasan Ranting Pohon Besar Rawan Tumbang',
              description:
                'Terdapat dua pohon angsana tua dengan dahan besar yang condong ke badan jalan dan kabel listrik PLN di tepi jalan Mekarwangi. Menjelang puncak musim hujan angin kencang di Kota Bogor, warga khawatir tumbang menimpa pengguna jalan.',
              status: 'Baru',
              priority: 'Tinggi',
              notes: [
                {
                  date: '22 Okt 2026, 11:00 WIB',
                  author: 'Staf Sekretariat',
                  text: 'Surat rekomendasi tindak darurat ke BPBD Kota Bogor & Disperumkim Pertamanan sedang disiapkan.',
                },
              ],
            },
            {
              id: 7,
              ticket: 'BLB-841750',
              date: '18 Okt 2026, 13:50 WIB',
              sender: 'Ahmad Fauzi',
              role: 'Kepala Keluarga Buruh Harian Lepas',
              phone: '081377889900',
              address: 'Kp. Kayumanis Tengah RT 01 / RW 03',
              kelurahan: 'Kayumanis',
              category: 'Pendidikan & Beasiswa',
              subject: 'Permohonan Advokasi Bantuan Biaya Ijazah Tertahan di Sekolah Swasta',
              description:
                'Anak kami telah lulus SMK swasta di Kota Bogor tahun lalu namun belum dapat mengambil lembar ijazah asli karena kendala tunggakan SPP sebesar 1,8 juta. Anak kami sangat membutuhkan ijazah asli untuk melamar pekerjaan resmi.',
              status: 'Ditinjau',
              priority: 'Tinggi',
              notes: [
                {
                  date: '19 Okt 2026, 10:20 WIB',
                  author: 'Staf Advokasi Pendidikan',
                  text: 'Berkas SKTM dan bukti tunggakan sekolah sudah diverifikasi. Dijadwalkan komunikasi mediasi dengan pihak yayasan sekolah.',
                },
              ],
            },
            {
              id: 8,
              ticket: 'BLB-841520',
              date: '15 Okt 2026, 15:10 WIB',
              sender: 'Rizky Pratama',
              role: 'Ketua Karang Taruna Kelurahan Cibadak',
              phone: '085611223344',
              address: 'Sekretariat Karang Taruna RW 03, Kel. Cibadak',
              kelurahan: 'Cibadak',
              category: 'Pemuda & Olahraga',
              subject: 'Permohonan Fasilitasi Sarana Olahraga Bola Voli & Tenis Meja Pemuda',
              description:
                'Dalam rangka mendukung program Kota Bogor Sehat dan Positif Bebas Tawuran, pemuda Cibadak ingin mengaktifkan lapangan serbaguna RW dengan bantuan net voli, bola, dan meja tenis meja untuk turnamen antar RT.',
              status: 'Selesai',
              priority: 'Biasa',
              notes: [
                {
                  date: '16 Okt 2026, 14:00 WIB',
                  author: 'Staf Aspirasi',
                  text: 'Disposisi bantuan paket sarana olahraga telah disetujui Kang Banu.',
                },
                {
                  date: '20 Okt 2026, 16:30 WIB',
                  author: 'Relawan Komunitas',
                  text: 'Paket perlengkapan olahraga diserahkan langsung di lapangan RW 03 Cibadak.',
                },
              ],
            },
          ] @endif,

          // Get filtered list based on tabs, search, categories, and kelurahan
          get filteredAspirations() {
            return this.aspirations.filter((item) => {
              // Status filter
              const matchStatus = this.statusFilter === 'all' || item.status === this.statusFilter;

              // Category filter
              const matchCategory = this.categoryFilter === 'all' || item.category === this.categoryFilter;

              // Kelurahan filter
              const matchKelurahan = this.kelurahanFilter === 'all' || item.kelurahan === this.kelurahanFilter;

              // Search query filter (matches ticket, sender, address, subject, description, phone)
              const query = this.searchQuery.trim().toLowerCase();
              const matchQuery =
                query === '' ||
                item.ticket.toLowerCase().includes(query) ||
                item.sender.toLowerCase().includes(query) ||
                item.phone.toLowerCase().includes(query) ||
                item.address.toLowerCase().includes(query) ||
                item.subject.toLowerCase().includes(query) ||
                item.description.toLowerCase().includes(query);

              return matchStatus && matchCategory && matchKelurahan && matchQuery;
            });
          },

          // Metric Counters
          get countTotal() {
            return this.aspirations.length;
          },
          get countBaru() {
            return this.aspirations.filter((a) => a.status === 'Baru').length;
          },
          get countDitinjau() {
            return this.aspirations.filter((a) => a.status === 'Ditinjau').length;
          },
          get countSelesai() {
            return this.aspirations.filter((a) => a.status === 'Selesai').length;
          },

          // Open detail modal
          openDetail(item) {
            this.selectedAspiration = JSON.parse(JSON.stringify(item));
            this.statusDraft = item.status;
            this.newNote = '';
            this.detailModal = true;
          },

          // Update status & notes from detail modal
          async saveModalChanges() {
            if (!this.selectedAspiration) return;

            const index = this.aspirations.findIndex((a) => a.id === this.selectedAspiration.id);
            if (index !== -1) {
              const oldStatus = this.aspirations[index].status;
              const newStatus = this.statusDraft;
              this.aspirations[index].status = newStatus;

              try {
                if (oldStatus !== newStatus) {
                  await fetch(`/admin/aspirasi/${this.selectedAspiration.id}/status`, {
                    method: 'PATCH',
                    headers: {
                      'Content-Type': 'application/json',
                      'Accept': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status: newStatus })
                  });
                }

                // If a new note was entered, append it and persist
                if (this.newNote.trim() !== '') {
                  const now = new Date();
                  const timeString = now.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }) + ', ' +
                    now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) + ' WIB';

                  const noteText = this.newNote.trim();
                  this.aspirations[index].notes.unshift({
                    date: timeString,
                    author: 'Admin / Staf',
                    text: noteText,
                  });

                  await fetch(`/admin/aspirasi/${this.selectedAspiration.id}/notes`, {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'Accept': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ note_text: noteText })
                  });
                }

                this.triggerToast(`Perubahan aspirasi ${this.selectedAspiration.ticket} berhasil disimpan!`);
              } catch (e) {
                console.error(e);
                this.triggerToast(`Perubahan aspirasi ${this.selectedAspiration.ticket} disimpan lokal.`);
              }
            }
            this.detailModal = false;
          },

          // Quick status update directly from the table row
          async quickSetStatus(item, newStatus) {
            item.status = newStatus;
            try {
              await fetch(`/admin/aspirasi/${item.id}/status`, {
                method: 'PATCH',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: newStatus })
              });
            } catch (e) {
              console.error(e);
            }
            this.triggerToast(`Status tiket ${item.ticket} diubah menjadi "${newStatus}"`);
          },

          // Direct WhatsApp click-to-chat with pre-filled respectful greeting
          openWhatsApp(item) {
            const cleanPhone = item.phone.replace(/[^0-9]/g, '');
            let intlPhone = cleanPhone;
            if (intlPhone.startsWith('0')) {
              intlPhone = '62' + intlPhone.slice(1);
            }
            const message = encodeURIComponent(
              `Halo Bapak/Ibu ${item.sender},\n\nTerima kasih telah menyampaikan aspirasi ke Rumah Aspirasi Rakyat Banu Lesmana Bagaskara, S.M. (Anggota DPRD Kota Bogor).\n\nPerihal: ${item.subject} (No. Tiket: ${item.ticket}).\n\nSaat ini laporan Anda sedang kami tindak lanjuti bersama tim. Mohon kesediaannya jika kami memerlukan konfirmasi data lanjutan.\n\nSalam hangat,\nRumah Aspirasi Banu Lesmana Bagaskara, S.M.`
            );
            window.open(`https://wa.me/${intlPhone}?text=${message}`, '_blank');
          },

          // Toggle selection
          toggleSelectAll() {
            if (this.selectAll) {
              this.selectedIds = this.filteredAspirations.map((a) => a.id);
            } else {
              this.selectedIds = [];
            }
          },

          // Batch Mark As Selesai
          batchMarkDone() {
            if (this.selectedIds.length === 0) return;
            this.aspirations.forEach((item) => {
              if (this.selectedIds.includes(item.id)) {
                item.status = 'Selesai';
              }
            });
            this.triggerToast(`${this.selectedIds.length} aspirasi ditandai selesai!`);
            this.selectedIds = [];
            this.selectAll = false;
          },

          // Confirm and trigger delete
          promptDelete(id) {
            this.targetDeleteId = id;
            this.deleteModal = true;
          },

          async confirmDelete() {
            if (this.targetDeleteId !== null) {
              const deletedItem = this.aspirations.find((a) => a.id === this.targetDeleteId);
              try {
                await fetch(`/admin/aspirasi/${this.targetDeleteId}`, {
                  method: 'DELETE',
                  headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
                });
              } catch (e) {
                console.error(e);
              }
              this.aspirations = this.aspirations.filter((a) => a.id !== this.targetDeleteId);
              this.triggerToast(`Aspirasi ${deletedItem ? deletedItem.ticket : ''} berhasil dihapus dari sistem.`, 'danger');
              this.targetDeleteId = null;
            }
            this.deleteModal = false;
          },

          // Export Simulated Data
          exportCSV() {
            const dataToExport = this.filteredAspirations;
            let csvContent = 'data:text/csv;charset=utf-8,';
            csvContent += 'No Tiket,Tanggal,Nama Warga,No Telepon,Kelurahan,Alamat,Kategori,Subjek,Status\n';

            dataToExport.forEach((row) => {
              const cleanSubjek = row.subject.replace(/"/g, '""');
              const cleanAlamat = row.address.replace(/"/g, '""');
              csvContent += `"${row.ticket}","${row.date}","${row.sender}","${row.phone}","${row.kelurahan}","${cleanAlamat}","${row.category}","${cleanSubjek}","${row.status}"\n`;
            });

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', `Rekap_Aspirasi_BLB_${new Date().toISOString().slice(0, 10)}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            this.triggerToast(`Berhasil mengekspor ${dataToExport.length} data aspirasi ke file CSV!`);
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
  <body class="min-h-screen bg-[#fafafa] text-zinc-900 antialiased font-normal selection:bg-[#BC0202] selection:text-white" x-data="adminAspirasi()">
    <!-- Toast Notification (Top Right Floating) -->
    <div
      x-show="toast.show"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-[-12px]"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-[-12px]"
      x-cloak
      class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border text-xs sm:text-sm font-medium"
      :class="{
        'bg-white text-zinc-900 border-zinc-200 shadow-zinc-200/50': toast.type === 'success',
        'bg-red-50 text-red-900 border-red-200 shadow-red-200/50': toast.type === 'danger',
        'bg-zinc-900 text-white border-zinc-800 shadow-zinc-900/40': toast.type === 'info'
      }"
    >
      <div
        class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0"
        :class="toast.type === 'danger' ? 'bg-red-600 text-white' : 'bg-[#BC0202] text-white'"
      >
        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <span x-text="toast.message"></span>
    </div>

    <!-- Main Admin Shell Layout (Desktop Sidebar + Content) -->
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

            <!-- 5. Kotak Aspirasi (ACTIVE) -->
            <a
              href="/admin/aspirasi"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-[#faf5f5] text-[#BC0202] text-xs font-bold border border-red-200/80 shadow-2xs"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <span>Kotak Aspirasi</span>
              </div>
              <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-[#BC0202] text-white" x-text="countBaru + ' baru'">
                6 baru
              </span>
            </a>

            <!-- 6. Pengaturan Halaman -->
            <a
              href="/admin/pengaturan"
              class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 text-xs font-semibold transition-colors group"
            >
              <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-zinc-400 group-hover:text-zinc-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
              <span class="text-[10px] text-zinc-600 font-medium">Kotak Aspirasi Warga</span>
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
            <a href="/admin/aspirasi" @click="mobileMenu = false" class="py-2 px-3 rounded-lg bg-[#faf5f5] text-[#BC0202] font-bold flex items-center justify-between">
              <span>Kotak Aspirasi</span>
              <span class="text-xs bg-[#BC0202] text-white px-2 py-0.5 rounded-md" x-text="countBaru + ' baru'"></span>
            </a>
            <a href="/admin/pengaturan" @click="mobileMenu = false" class="py-2 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Pengaturan Halaman Website</a>
            <div class="pt-3 mt-1 border-t border-zinc-100 grid grid-cols-2 gap-2.5">
              <a href="/" target="_blank" class="text-center py-2 px-3 rounded-lg border border-zinc-200 text-xs font-semibold text-zinc-700 hover:bg-zinc-50">Web Publik &nearr;</a>
              <a href="/admin/login" class="text-center py-2 px-3 rounded-lg bg-zinc-900 text-white text-xs font-semibold hover:bg-zinc-800">Keluar</a>
            </div>
          </nav>
        </div>

        <!-- Page Header & Hero Subtitle -->
        <header class="bg-white border-b border-zinc-200 px-4 sm:px-8 lg:px-10 py-7">
          <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-5">
            <div>
              <div class="flex items-center gap-2 text-xs font-semibold text-zinc-500 mb-1.5">
                <a href="/admin" class="hover:text-zinc-900 transition-colors">Dasbor Admin</a>
                <span>&rsaquo;</span>
                <span class="text-[#BC0202]">Kotak Aspirasi</span>
              </div>
              <h1 class="text-2xl sm:text-3xl font-bold text-zinc-950 tracking-tight">
                Kotak <span class="text-[#BC0202]">Aspirasi</span> &amp; Aduan Warga
              </h1>
              <p class="text-xs sm:text-sm text-zinc-600 mt-1 max-w-2xl leading-relaxed">
                Kelola formulir pengaduan, permohonan layanan publik, dan aspirasi masyarakat dari Dapil Kota Bogor 4 (Kecamatan Tanah Sareal) yang masuk secara daring.
              </p>
            </div>

            <!-- Header Quick Action: Export CSV & Live Counter -->
            <div class="flex items-center gap-3 shrink-0">
              <button
                type="button"
                @click="exportCSV()"
                class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs font-semibold px-4 py-2.5 shadow-2xs transition-colors gap-2"
              >
                <svg class="w-4 h-4 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Unduh Rekap CSV</span>
              </button>
            </div>
          </div>
        </header>

        <!-- Main Body Workspace -->
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-8 lg:px-10 py-8 space-y-8 flex-1">
          <!-- ========================================== -->
          <!-- 3. KPI & STATUS METRICS CARDS              -->
          <!-- ========================================== -->
          <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
            <!-- Metric 1: Total Aspirasi -->
            <div
              @click="statusFilter = 'all'"
              class="cursor-pointer rounded-xl border border-zinc-200 bg-white p-5 sm:p-6 shadow-xs hover:border-zinc-300 hover:shadow-sm transition-all"
              :class="statusFilter === 'all' ? 'ring-2 ring-[#BC0202] border-transparent' : ''"
            >
              <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-zinc-500">Total Masuk</span>
                <span class="w-7 h-7 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                  </svg>
                </span>
              </div>
              <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-zinc-950 tracking-tight" x-text="countTotal">8</span>
                <span class="text-xs text-zinc-600">tiket terdata</span>
              </div>
              <div class="mt-2 text-[11px] text-zinc-600">
                Semua laporan warga tersimpan
              </div>
            </div>

            <!-- Metric 2: Aspirasi Baru (Red / Urgent) -->
            <div
              @click="statusFilter = 'Baru'"
              class="cursor-pointer rounded-xl border border-red-200/90 bg-white p-5 sm:p-6 shadow-xs hover:border-red-300 hover:shadow-sm transition-all"
              :class="statusFilter === 'Baru' ? 'ring-2 ring-[#BC0202] border-transparent bg-red-50/20' : ''"
            >
              <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-red-800">Perlu Tindakan (Baru)</span>
                <span class="w-7 h-7 rounded-lg bg-red-50 text-[#BC0202] flex items-center justify-center">
                  <span class="w-2 h-2 rounded-full bg-[#BC0202] animate-pulse"></span>
                </span>
              </div>
              <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-[#BC0202] tracking-tight" x-text="countBaru">3</span>
                <span class="text-xs text-red-600 font-semibold">belum diproses</span>
              </div>
              <div class="mt-2 text-[11px] text-zinc-600">
                Memerlukan verifikasi &amp; respons cepat
              </div>
            </div>

            <!-- Metric 3: Sedang Ditinjau / Koordinasi -->
            <div
              @click="statusFilter = 'Ditinjau'"
              class="cursor-pointer rounded-xl border border-amber-200/90 bg-white p-5 sm:p-6 shadow-xs hover:border-amber-300 hover:shadow-sm transition-all"
              :class="statusFilter === 'Ditinjau' ? 'ring-2 ring-amber-500 border-transparent bg-amber-50/20' : ''"
            >
              <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-amber-900">Sedang Ditinjau</span>
                <span class="w-7 h-7 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </span>
              </div>
              <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-amber-950 tracking-tight" x-text="countDitinjau">3</span>
                <span class="text-xs text-amber-700 font-medium">proses advokasi</span>
              </div>
              <div class="mt-2 text-[11px] text-zinc-600">
                Koordinasi dinas &amp; survei lapangan
              </div>
            </div>

            <!-- Metric 4: Selesai / Teradvokasi -->
            <div
              @click="statusFilter = 'Selesai'"
              class="cursor-pointer rounded-xl border border-emerald-200/90 bg-white p-5 sm:p-6 shadow-xs hover:border-emerald-300 hover:shadow-sm transition-all"
              :class="statusFilter === 'Selesai' ? 'ring-2 ring-emerald-600 border-transparent bg-emerald-50/20' : ''"
            >
              <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-emerald-900">Selesai / Teradvokasi</span>
                <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center">
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </span>
              </div>
              <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-emerald-950 tracking-tight" x-text="countSelesai">2</span>
                <span class="text-xs text-emerald-700 font-medium">tuntas</span>
              </div>
              <div class="mt-2 text-[11px] text-zinc-600">
                Solusi terealisasi ke masyarakat
              </div>
            </div>
          </div>

          <!-- ========================================== -->
          <!-- 4. SEARCH, FILTERS & BATCH ACTIONS TOOLBAR -->
          <!-- ========================================== -->
          <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
              <!-- Search Bar -->
              <div class="relative flex-1 min-w-0">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-400">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </div>
                <input
                  type="text"
                  x-model="searchQuery"
                  placeholder="Cari nomor tiket (BLB-xxxx), nama warga, telepon, kelurahan, atau isi aspirasi..."
                  class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-zinc-300 bg-white text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] transition-colors shadow-2xs"
                />
                <button
                  type="button"
                  x-show="searchQuery.length > 0"
                  @click="searchQuery = ''"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-zinc-400 hover:text-zinc-600"
                >
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>

              <!-- Filter Dropdowns: Kategori & Kelurahan -->
              <div class="flex flex-wrap sm:flex-nowrap items-center gap-3">
                <!-- Dropdown Kelurahan (Tanah Sareal) -->
                <div class="w-full sm:w-auto">
                  <select
                    x-model="kelurahanFilter"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  >
                    <option value="all">Semua Kelurahan (Dapil 4)</option>
                    <option value="Kedung Badak">Kedung Badak</option>
                    <option value="Kebon Pedes">Kebon Pedes</option>
                    <option value="Sukadamai">Sukadamai</option>
                    <option value="Kedung Waringin">Kedung Waringin</option>
                    <option value="Kencana">Kencana</option>
                    <option value="Mekarwangi">Mekarwangi</option>
                    <option value="Kayumanis">Kayumanis</option>
                    <option value="Cibadak">Cibadak</option>
                  </select>
                </div>

                <!-- Dropdown Kategori Isu -->
                <div class="w-full sm:w-auto">
                  <select
                    x-model="categoryFilter"
                    class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-xs font-medium text-zinc-800 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                  >
                    <option value="all">Semua Kategori</option>
                    <option value="Infrastruktur & Drainase">Infrastruktur & Drainase</option>
                    <option value="Penerangan Jalan (PJU)">Penerangan Jalan (PJU)</option>
                    <option value="UMKM & Usaha Warga">UMKM & Usaha Warga</option>
                    <option value="Layanan Ambulance Siaga">Layanan Ambulance Siaga</option>
                    <option value="Lingkungan Hidup & Kebencanaan">Lingkungan & Bencana</option>
                    <option value="Pendidikan & Beasiswa">Pendidikan & Beasiswa</option>
                    <option value="Pemuda & Olahraga">Pemuda & Olahraga</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Status Tabs & Batch Actions Row -->
            <div class="pt-3 border-t border-zinc-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
              <!-- Status Pill Tabs -->
              <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0 text-xs font-semibold">
                <button
                  type="button"
                  @click="statusFilter = 'all'"
                  class="px-3 py-1.5 rounded-lg transition-colors shrink-0"
                  :class="statusFilter === 'all' ? 'bg-zinc-900 text-white' : 'bg-zinc-100 text-zinc-600 hover:text-zinc-900 hover:bg-zinc-200'"
                >
                  Semua (<span x-text="countTotal"></span>)
                </button>
                <button
                  type="button"
                  @click="statusFilter = 'Baru'"
                  class="px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5 shrink-0"
                  :class="statusFilter === 'Baru' ? 'bg-[#BC0202] text-white' : 'bg-red-50 text-red-700 hover:bg-red-100'"
                >
                  <span class="w-1.5 h-1.5 rounded-full" :class="statusFilter === 'Baru' ? 'bg-white' : 'bg-[#BC0202]'"></span>
                  <span>Baru (<span x-text="countBaru"></span>)</span>
                </button>
                <button
                  type="button"
                  @click="statusFilter = 'Ditinjau'"
                  class="px-3 py-1.5 rounded-lg transition-colors shrink-0"
                  :class="statusFilter === 'Ditinjau' ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-800 hover:bg-amber-100'"
                >
                  Ditinjau (<span x-text="countDitinjau"></span>)
                </button>
                <button
                  type="button"
                  @click="statusFilter = 'Selesai'"
                  class="px-3 py-1.5 rounded-lg transition-colors shrink-0"
                  :class="statusFilter === 'Selesai' ? 'bg-emerald-700 text-white' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100'"
                >
                  Selesai (<span x-text="countSelesai"></span>)
                </button>
              </div>

              <!-- Batch Action Buttons (Shown when rows are selected) -->
              <div x-show="selectedIds.length > 0" x-cloak class="flex items-center gap-2">
                <span class="text-xs text-zinc-500 font-medium">
                  <span class="font-bold text-zinc-900" x-text="selectedIds.length"></span> dipilih:
                </span>
                <button
                  type="button"
                  @click="batchMarkDone()"
                  class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-2xs transition-colors"
                >
                  <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>Tandai Selesai</span>
                </button>
              </div>
            </div>
          </div>

          <!-- ========================================== -->
          <!-- 5. ASPIRATION DATA TABLE (DESKTOP)        -->
          <!-- ========================================== -->
          <div class="rounded-xl border border-zinc-200 bg-white shadow-xs overflow-hidden">
            <!-- Desktop Table View (Hidden on mobile/tablet) -->
            <div class="hidden md:block overflow-x-auto">
              <table class="w-full text-left border-collapse">
                <thead>
                  <tr class="border-b border-zinc-200 bg-[#fafafa] text-[11px] font-bold uppercase tracking-wider text-zinc-500">
                    <th class="py-3.5 pl-5 pr-2 w-10">
                      <input
                        type="checkbox"
                        x-model="selectAll"
                        @change="toggleSelectAll()"
                        class="rounded border-zinc-300 text-[#BC0202] focus:ring-[#BC0202] focus:ring-offset-0"
                      />
                    </th>
                    <th class="py-3.5 px-4 font-semibold">Tiket &amp; Waktu</th>
                    <th class="py-3.5 px-4 font-semibold">Pelapor &amp; Wilayah</th>
                    <th class="py-3.5 px-4 font-semibold">Perihal &amp; Kategori</th>
                    <th class="py-3.5 px-4 font-semibold">Status</th>
                    <th class="py-3.5 pl-4 pr-5 font-semibold text-right">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 text-xs">
                  <template x-for="item in filteredAspirations" :key="item.id">
                    <tr class="hover:bg-zinc-50/80 transition-colors group">
                      <!-- Checkbox -->
                      <td class="py-4 pl-5 pr-2">
                        <input
                          type="checkbox"
                          :value="item.id"
                          x-model="selectedIds"
                          class="rounded border-zinc-300 text-[#BC0202] focus:ring-[#BC0202] focus:ring-offset-0"
                        />
                      </td>

                      <!-- Tiket & Waktu -->
                      <td class="py-4 px-4 whitespace-nowrap">
                        <div class="flex flex-col">
                          <span class="font-mono font-bold text-xs text-zinc-950 flex items-center gap-1.5">
                            <span x-text="item.ticket"></span>
                          </span>
                          <span class="text-[11px] text-zinc-600 mt-1" x-text="item.date"></span>
                        </div>
                      </td>

                      <!-- Pelapor & Wilayah -->
                      <td class="py-4 px-4 min-w-[200px]">
                        <div class="flex flex-col">
                          <div class="flex items-center gap-2">
                            <span class="font-bold text-zinc-900" x-text="item.sender"></span>
                            <!-- WhatsApp Quick Icon Button -->
                            <button
                              type="button"
                              @click.stop="openWhatsApp(item)"
                              title="Buka Chat WhatsApp Warga"
                              class="text-emerald-600 hover:text-emerald-700 p-0.5 rounded transition-colors"
                            >
                              <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.586 1.838.878 2.796.878 3.18 0 5.766-2.586 5.766-5.766 0-3.18-2.586-5.765-5.766-5.765zm0 10.334c-.886 0-1.748-.256-2.493-.739l-.178-.115-1.579.414.421-1.538-.117-.187c-.52-.829-.795-1.789-.795-2.775 0-2.827 2.301-5.127 5.13-5.127 2.828 0 5.129 2.3 5.129 5.127 0 2.828-2.301 5.128-5.129 5.128z" />
                              </svg>
                            </button>
                          </div>
                          <span class="text-[11px] text-zinc-600 mt-0.5">
                            <span class="font-medium text-zinc-700" x-text="item.kelurahan"></span> &bull; <span x-text="item.phone"></span>
                          </span>
                        </div>
                      </td>

                      <!-- Perihal & Kategori -->
                      <td class="py-4 px-4 max-w-sm">
                        <div class="flex flex-col">
                          <span class="font-bold text-zinc-950 truncate" x-text="item.subject"></span>
                          <span class="text-[11px] text-zinc-600 truncate mt-0.5" x-text="item.description"></span>
                          <div class="mt-1.5 flex items-center gap-2">
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-600" x-text="item.category"></span>
                          </div>
                        </div>
                      </td>

                      <!-- Status Badge & Inline Toggle -->
                      <td class="py-4 px-4 whitespace-nowrap">
                        <div class="inline-flex items-center">
                          <template x-if="item.status === 'Baru'">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-red-50 text-[#BC0202] border border-red-200">
                              <span class="w-1.5 h-1.5 rounded-full bg-[#BC0202]"></span>
                              <span>Baru</span>
                            </span>
                          </template>
                          <template x-if="item.status === 'Ditinjau'">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200">
                              <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                              <span>Ditinjau</span>
                            </span>
                          </template>
                          <template x-if="item.status === 'Selesai'">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                              <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                              <span>Selesai</span>
                            </span>
                          </template>
                        </div>
                      </td>

                      <!-- Action Buttons -->
                      <td class="py-4 pl-4 pr-5 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-1.5">
                          <!-- Tombol Lihat Detail (Modal) -->
                          <button
                            type="button"
                            @click="openDetail(item)"
                            class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-700 text-xs font-semibold shadow-2xs transition-colors"
                            title="Buka Inspeksi & Disposisi Aspirasi"
                          >
                            <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Detail</span>
                          </button>

                          <!-- Tombol Hubungi WhatsApp Warga Langsung -->
                          <button
                            type="button"
                            @click="openWhatsApp(item)"
                            class="inline-flex items-center p-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 text-zinc-600 text-xs font-medium shadow-2xs transition-colors"
                            title="Chat WhatsApp Warga"
                          >
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                              <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                            </svg>
                          </button>

                          <!-- Tombol Hapus / Arsip -->
                          <button
                            type="button"
                            @click="promptDelete(item.id)"
                            class="p-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-red-50 hover:text-red-700 hover:border-red-200 text-zinc-400 text-xs transition-colors"
                            title="Hapus Aspirasi"
                          >
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </template>
                </tbody>
              </table>
            </div>

            <!-- Mobile & Tablet Card View (Shown on screens < md) -->
            <div class="md:hidden divide-y divide-zinc-200">
              <template x-for="item in filteredAspirations" :key="item.id">
                <div class="p-5 space-y-3 hover:bg-zinc-50 transition-colors">
                  <!-- Header Card: Tiket, Waktu & Status -->
                  <div class="flex items-start justify-between gap-3">
                    <div>
                      <span class="font-mono font-bold text-xs text-zinc-950" x-text="item.ticket"></span>
                      <span class="text-[11px] text-zinc-600 block mt-0.5" x-text="item.date"></span>
                    </div>

                    <!-- Status Badge -->
                    <div>
                      <template x-if="item.status === 'Baru'">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-red-50 text-[#BC0202] border border-red-200">
                          <span class="w-1.5 h-1.5 rounded-full bg-[#BC0202]"></span>
                          <span>Baru</span>
                        </span>
                      </template>
                      <template x-if="item.status === 'Ditinjau'">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800 border border-amber-200">
                          <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                          <span>Ditinjau</span>
                        </span>
                      </template>
                      <template x-if="item.status === 'Selesai'">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                          <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                          <span>Selesai</span>
                        </span>
                      </template>
                    </div>
                  </div>

                  <!-- Pengirim & Wilayah -->
                  <div class="text-xs">
                    <div class="font-bold text-zinc-900" x-text="item.sender"></div>
                    <div class="text-[11px] text-zinc-600 mt-0.5">
                      <span class="font-medium text-zinc-800" x-text="item.kelurahan"></span> &bull; <span x-text="item.phone"></span>
                    </div>
                  </div>

                  <!-- Perihal & Uraian Singkat -->
                  <div>
                    <h3 class="text-xs font-bold text-zinc-950" x-text="item.subject"></h3>
                    <p class="text-xs text-zinc-600 mt-1 line-clamp-2 leading-relaxed" x-text="item.description"></p>
                    <div class="mt-2 flex items-center gap-2">
                      <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-600" x-text="item.category"></span>
                    </div>
                  </div>

                  <!-- Action Buttons Row -->
                  <div class="pt-3 border-t border-zinc-100 flex items-center justify-between gap-2">
                    <button
                      type="button"
                      @click="openWhatsApp(item)"
                      class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-800 hover:bg-emerald-100 text-xs font-semibold transition-colors"
                    >
                      <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.586 1.838.878 2.796.878 3.18 0 5.766-2.586 5.766-5.766 0-3.18-2.586-5.765-5.766-5.765zm0 10.334c-.886 0-1.748-.256-2.493-.739l-.178-.115-1.579.414.421-1.538-.117-.187c-.52-.829-.795-1.789-.795-2.775 0-2.827 2.301-5.127 5.13-5.127 2.828 0 5.129 2.3 5.129 5.127 0 2.828-2.301 5.128-5.129 5.128z" />
                      </svg>
                      <span>WhatsApp</span>
                    </button>

                    <div class="flex items-center gap-2">
                      <button
                        type="button"
                        @click="openDetail(item)"
                        class="px-3 py-1.5 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-semibold transition-colors"
                      >
                        Detail &amp; Disposisi
                      </button>
                      <button
                        type="button"
                        @click="promptDelete(item.id)"
                        class="p-1.5 rounded-lg border border-zinc-200 text-zinc-400 hover:text-red-700 hover:bg-red-50 transition-colors"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </template>
            </div>

            <!-- Empty State (When no data matches search/filter) -->
            <div x-show="filteredAspirations.length === 0" class="text-center py-16 px-6">
              <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-400 flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
              </div>
              <h3 class="text-sm font-bold text-zinc-900">Tidak ada aspirasi yang cocok</h3>
              <p class="text-xs text-zinc-500 mt-1 max-w-sm mx-auto">
                Coba sesuaikan kata kunci pencarian atau ubah filter kelurahan dan kategori untuk menampilkan data lainnya.
              </p>
              <button
                type="button"
                @click="searchQuery = ''; statusFilter = 'all'; categoryFilter = 'all'; kelurahanFilter = 'all';"
                class="mt-4 inline-flex items-center px-3.5 py-1.5 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-xs font-semibold text-zinc-700 shadow-2xs transition-colors"
              >
                Reset Semua Filter
              </button>
            </div>
          </div>
        </div>
      </main>
    </div>

    <!-- ======================================================== -->
    <!-- 6. DETAIL INSPECTION & DISPOSITION MODAL (POPUP SHEET)   -->
    <!-- ======================================================== -->
    <div
      x-show="detailModal"
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto bg-zinc-950/60 backdrop-blur-sm flex items-center justify-center p-4 sm:p-6"
    >
      <div
        x-show="detailModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="detailModal = false"
        class="w-full max-w-3xl rounded-2xl bg-white border border-zinc-200 shadow-2xl overflow-hidden flex flex-col max-h-[90vh]"
      >
        <!-- Modal Header -->
        <div class="px-6 py-5 border-b border-zinc-200 bg-[#fafafa] flex items-center justify-between gap-4 shrink-0">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center shrink-0">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-mono font-bold text-sm text-zinc-950" x-text="selectedAspiration?.ticket"></span>
                <span class="text-xs text-zinc-400">&bull;</span>
                <span class="text-xs text-zinc-500" x-text="selectedAspiration?.date"></span>
              </div>
              <h2 class="text-base font-bold text-zinc-950 tracking-tight mt-0.5" x-text="selectedAspiration?.subject"></h2>
            </div>
          </div>

          <button
            type="button"
            @click="detailModal = false"
            class="p-2 rounded-lg text-zinc-400 hover:text-zinc-700 hover:bg-zinc-100 transition-colors"
          >
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Body (Scrollable Content) -->
        <div class="p-6 overflow-y-auto space-y-6 text-xs sm:text-sm">
          <!-- Section 1: Profil Pelapor & Kontak -->
          <div class="rounded-xl border border-zinc-200 bg-[#fafafa] p-4 sm:p-5">
            <div class="flex items-center justify-between mb-3 border-b border-zinc-200/80 pb-2.5">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Informasi Pelapor</span>
              <button
                type="button"
                @click="openWhatsApp(selectedAspiration)"
                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-2xs transition-colors"
              >
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                  <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.586 1.838.878 2.796.878 3.18 0 5.766-2.586 5.766-5.766 0-3.18-2.586-5.765-5.766-5.765zm0 10.334c-.886 0-1.748-.256-2.493-.739l-.178-.115-1.579.414.421-1.538-.117-.187c-.52-.829-.795-1.789-.795-2.775 0-2.827 2.301-5.127 5.13-5.127 2.828 0 5.129 2.3 5.129 5.127 0 2.828-2.301 5.128-5.129 5.128z" />
                </svg>
                <span>Buka WhatsApp Warga</span>
              </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <span class="text-[11px] text-zinc-600 block">Nama Lengkap &amp; Peran:</span>
                <span class="font-bold text-zinc-950 text-xs sm:text-sm mt-0.5 block" x-text="selectedAspiration?.sender"></span>
                <span class="text-xs text-zinc-600" x-text="selectedAspiration?.role"></span>
              </div>
              <div>
                <span class="text-[11px] text-zinc-600 block">Nomor Telepon / WhatsApp:</span>
                <span class="font-semibold text-zinc-950 text-xs sm:text-sm mt-0.5 block font-mono" x-text="selectedAspiration?.phone"></span>
              </div>
              <div class="sm:col-span-2">
                <span class="text-[11px] text-zinc-600 block">Alamat Tinggal / Lokasi Masalah:</span>
                <span class="font-medium text-zinc-900 text-xs sm:text-sm mt-0.5 block leading-relaxed" x-text="selectedAspiration?.address"></span>
                <span class="inline-block mt-1.5 text-[10px] font-bold px-2 py-0.5 rounded bg-zinc-200 text-zinc-800" x-text="'Kelurahan ' + selectedAspiration?.kelurahan"></span>
              </div>
            </div>
          </div>

          <!-- Section 2: Uraian Lengkap Masalah / Aspirasi -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <span class="text-xs font-bold uppercase tracking-wider text-zinc-500">Isi Pengaduan / Aspirasi Warga</span>
              <span class="text-xs font-semibold px-2 py-0.5 rounded bg-zinc-100 text-zinc-700" x-text="selectedAspiration?.category"></span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl border border-zinc-200 bg-white leading-relaxed text-zinc-800 text-xs sm:text-sm whitespace-pre-line shadow-2xs" x-text="selectedAspiration?.description"></div>
          </div>

          <!-- Section 3: Disposisi Status & Catatan Tindak Lanjut -->
          <div class="rounded-xl border border-zinc-200 bg-white p-4 sm:p-5 shadow-2xs space-y-4">
            <span class="text-xs font-bold uppercase tracking-wider text-zinc-500 block">Tindak Lanjut &amp; Catatan Internal Staf</span>

            <!-- Status Selector -->
            <div>
              <label class="block text-xs font-bold text-zinc-800 mb-1.5">Ubah Status Tiket:</label>
              <div class="grid grid-cols-3 gap-3">
                <label
                  class="cursor-pointer border rounded-lg p-2.5 flex items-center justify-center gap-2 text-xs font-bold transition-all text-center"
                  :class="statusDraft === 'Baru' ? 'border-[#BC0202] bg-red-50 text-[#BC0202] ring-1 ring-[#BC0202]' : 'border-zinc-200 hover:bg-zinc-50 text-zinc-700'"
                >
                  <input type="radio" value="Baru" x-model="statusDraft" class="sr-only" />
                  <span class="w-2 h-2 rounded-full bg-[#BC0202]"></span>
                  <span>Baru</span>
                </label>

                <label
                  class="cursor-pointer border rounded-lg p-2.5 flex items-center justify-center gap-2 text-xs font-bold transition-all text-center"
                  :class="statusDraft === 'Ditinjau' ? 'border-amber-500 bg-amber-50 text-amber-900 ring-1 ring-amber-500' : 'border-zinc-200 hover:bg-zinc-50 text-zinc-700'"
                >
                  <input type="radio" value="Ditinjau" x-model="statusDraft" class="sr-only" />
                  <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                  <span>Ditinjau</span>
                </label>

                <label
                  class="cursor-pointer border rounded-lg p-2.5 flex items-center justify-center gap-2 text-xs font-bold transition-all text-center"
                  :class="statusDraft === 'Selesai' ? 'border-emerald-600 bg-emerald-50 text-emerald-900 ring-1 ring-emerald-600' : 'border-zinc-200 hover:bg-zinc-50 text-zinc-700'"
                >
                  <input type="radio" value="Selesai" x-model="statusDraft" class="sr-only" />
                  <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                  <span>Selesai</span>
                </label>
              </div>
            </div>

            <!-- New Internal Note Input -->
            <div>
              <label class="block text-xs font-bold text-zinc-800 mb-1.5">Tambah Catatan Disposisi / Hasil Lapangan:</label>
              <textarea
                x-model="newNote"
                rows="3"
                placeholder="Tuliskan catatan tindak lanjut, misal: 'Sudah dikoordinasikan dengan Lurah & Dinas PUPR untuk pengecekan saluran air besok pagi...'"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
              ></textarea>
            </div>

            <!-- Log / Riwayat Catatan Terdahulu -->
            <div x-show="selectedAspiration?.notes && selectedAspiration?.notes.length > 0" class="pt-3 border-t border-zinc-100">
              <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-400 block mb-2">Riwayat Catatan Sebelumnya</span>
              <div class="space-y-2.5 max-h-48 overflow-y-auto pr-1">
                <template x-for="(note, nIdx) in selectedAspiration?.notes" :key="nIdx">
                  <div class="p-3 rounded-lg bg-zinc-50 border border-zinc-200 text-xs">
                    <div class="flex items-center justify-between text-[11px] text-zinc-500 mb-1">
                      <span class="font-bold text-zinc-800" x-text="note.author"></span>
                      <span x-text="note.date"></span>
                    </div>
                    <p class="text-zinc-700 leading-relaxed" x-text="note.text"></p>
                  </div>
                </template>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Footer Actions -->
        <div class="px-6 py-4 border-t border-zinc-200 bg-[#fafafa] flex items-center justify-between gap-3 shrink-0">
          <button
            type="button"
            @click="detailModal = false"
            class="px-4 py-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-100 text-xs font-semibold text-zinc-700 transition-colors"
          >
            Tutup
          </button>

          <button
            type="button"
            @click="saveModalChanges()"
            class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs font-semibold px-5 py-2 shadow-sm transition-colors gap-1.5"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Simpan Pembaruan</span>
          </button>
        </div>
      </div>
    </div>

    <!-- ======================================================== -->
    <!-- 7. DELETE CONFIRMATION MODAL                             -->
    <!-- ======================================================== -->
    <div
      x-show="deleteModal"
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto bg-zinc-950/60 backdrop-blur-sm flex items-center justify-center p-4"
    >
      <div
        x-show="deleteModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="deleteModal = false"
        class="w-full max-w-md rounded-2xl bg-white border border-zinc-200 shadow-2xl p-6 text-center"
      >
        <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4">
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-zinc-950">Hapus Aspirasi Ini?</h3>
        <p class="text-xs text-zinc-600 mt-2 leading-relaxed">
          Apakah kamu yakin ingin menghapus tiket aduan warga ini? Data yang telah dihapus tidak dapat dipulihkan kembali dari sistem.
        </p>
        <div class="mt-6 flex items-center justify-center gap-3">
          <button
            type="button"
            @click="deleteModal = false; targetDeleteId = null;"
            class="px-4 py-2 rounded-lg border border-zinc-300 bg-white hover:bg-zinc-100 text-xs font-semibold text-zinc-700 transition-colors"
          >
            Batal
          </button>
          <button
            type="button"
            @click="confirmDelete()"
            class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-semibold shadow-sm transition-colors"
          >
            Ya, Hapus Data
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
