<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'group' => 'general',
                'key' => 'site_general',
                'type' => 'json',
                'value' => [
                    'siteTitle' => 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029',
                    'logo' => null,
                    'favicon' => null,
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
                ],
            ],
            [
                'group' => 'home',
                'key' => 'site_home',
                'type' => 'json',
                'value' => [
                    'hero' => [
                        'headline' => 'Mengabdi dengan Integritas, Bekerja Nyata untuk Warga Bogor',
                        'description' => 'Kanal transparansi kinerja, advokasi aspirasi masyarakat, dan informasi program kerja kedewanan Banu Lesmana Bagaskara, S.M. di DPRD Kota Bogor.',
                        'ctaSecondaryText' => 'Kenali Banu Bagaskara',
                        'ctaSecondaryLink' => '/kenali',
                        'heroImage' => 'assets/banu/hero_banu.jpg',
                    ],
                    'banner' => [
                        'enabled' => true,
                        'title' => 'Layanan Ambulance Siaga 24 Jam Gratis',
                        'subtitle' => 'Tanggap darurat medis & pendampingan rujukan pasien RSUD se-Kecamatan Tanah Sareal',
                        'image' => 'assets/banu/banner_serbaguna.jpg',
                        'linkUrl' => '/kontak#aspirasi',
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
                ],
            ],
            [
                'group' => 'profile',
                'key' => 'site_profile',
                'type' => 'json',
                'value' => [
                    'hero' => [
                        'subtitle' => 'Pemuda berintegritas, wakil rakyat yang senantiasa hadir dan mendengarkan denyut suara warga Kota Bogor.',
                        'heroImage' => 'assets/banu/hero_banu.jpg',
                    ],
                    'vision' => 'Mewujudkan Kota Bogor yang maju, berkeadilan sosial, dan nyaman untuk semua warga melalui tata kelola kebijakan publik yang transparan dan akuntabel.',
                    'mission' => [
                        'Memperjuangkan pemenuhan hak-hak dasar warga di bidang pendidikan gratis, fasilitas kesehatan cepat, dan infrastruktur lingkungan yang tertata.',
                        'Mendorong transparansi kebijakan publik dan keterbukaan alokasi anggaran APBD Kota Bogor yang berpihak penuh pada kepentingan rakyat.',
                        'Menggerakkan potensi ekonomi rakyat melalui fasilitasi legalitas gratis, permodalan, dan digitalisasi UMKM berbasis RT/RW.',
                        'Menjaga harmoni sosial, perlindungan perempuan dan anak, serta mewujudkan lingkungan Kota Bogor yang aman dan bebas tawuran.',
                    ],
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
                        ['label' => 'Dialog Aspirasi Warga Kebon Pedes', 'image' => 'assets/banu/testi_dialog.jpg'],
                        ['label' => 'Sidang Paripurna & Pengawasan APBD di Parlemen', 'image' => 'assets/banu/hero_banu.jpg'],
                        ['label' => 'Operasional Ambulance Siaga 24 Jam', 'image' => 'assets/banu/program_ambulance.jpg'],
                        ['label' => 'Pelatihan Digitalisasi UMKM RT/RW', 'image' => 'assets/banu/program_umkm.jpg'],
                        ['label' => 'Rembug Guyub Komunitas Warga', 'image' => 'assets/banu/footer_community.jpg'],
                    ],
                    'quote' => [
                        'text' => 'Kursi di parlemen bukan privilese kekuasaan, melainkan mandat pengabdian rakyat yang harus dipertanggungjawabkan secara terbuka setiap waktu.',
                        'author' => 'Banu Lesmana Bagaskara, S.M.',
                        'role' => 'Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal',
                    ],
                ],
            ],
            [
                'group' => 'seo',
                'key' => 'site_seo',
                'type' => 'json',
                'value' => [
                    'metaTitle' => 'Banu Lesmana Bagaskara, S.M. | Anggota DPRD Kota Bogor 2024–2029',
                    'metaDescription' => 'Website resmi kanal informasi profil, rekam jejak, transparansi hasil kinerja, rilis berita, galeri kegiatan, dan formulir kotak aspirasi warga Banu Lesmana Bagaskara, S.M.',
                    'keywords' => 'Banu Lesmana Bagaskara, DPRD Kota Bogor, Tanah Sareal, PDI Perjuangan, Rumah Aspirasi, Ambulance Siaga Bogor, Hasil Kinerja DPRD, Aspirasi Warga Bogor',
                    'ogImage' => 'assets/banu/hero_banu.jpg',
                    'canonicalUrl' => 'https://banubagaskara.id',
                    'enableIndexing' => true,
                    'googleSearchConsoleTag' => 'google-site-verification=SAMPLE_CODE_BLB_2026',
                ],
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
