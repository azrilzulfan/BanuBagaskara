<?php

namespace Database\Seeders;

use App\Models\PerformanceReport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PerformanceReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = [
            [
                'title' => 'Ambulance Siaga 24 Jam & Pendampingan Administrasi Pasien BPJS Bebas Biaya',
                'slug' => Str::slug('Ambulance Siaga 24 Jam & Pendampingan Administrasi Pasien BPJS Bebas Biaya'),
                'published_at' => '2026-01-20 09:00:00',
                'cover_image' => 'assets/banu/program_ambulance.jpg',
                'excerpt' => 'Menyikapi keluhan mendesak warga saat mengalami sakit parah di jam-jam genting, Banu Lesmana Bagaskara menyiagakan unit ambulans darurat gratis yang siap beroperasi 24 jam penuh di wilayah Kecamatan Tanah Sareal.',
                'is_featured' => true,
                'status' => 'published',
                'view_count' => 342,
                'content_blocks' => [
                    [
                        'id' => 'b1',
                        'type' => 'heading',
                        'level' => 'h2',
                        'text' => 'Latar Belakang & Komitmen Pelayanan Kesehatan Warga',
                    ],
                    [
                        'id' => 'b2',
                        'type' => 'paragraph',
                        'text' => 'Kesehatan merupakan hak mendasar setiap warga yang tidak boleh terhalang oleh kendala finansial maupun rumitnya administrasi rujukan. Melalui koordinasi intensif bersama jajaran RSUD Kota Bogor dan Dinas Kesehatan, layanan Ambulance Siaga Rumah Aspirasi dioperasikan secara penuh selama 24 jam untuk melayani panggilan darurat warga di 11 kelurahan se-Kecamatan Tanah Sareal tanpa dipungut biaya sepeser pun.',
                    ],
                    [
                        'id' => 'b3',
                        'type' => 'image',
                        'url' => 'assets/banu/program_ambulance.jpg',
                        'caption' => 'Armada Ambulance Siaga 24 Jam siap siaga di Posko Rumah Aspirasi Rakyat, Kelurahan Kedung Badak.',
                    ],
                    [
                        'id' => 'b4',
                        'type' => 'heading',
                        'level' => 'h3',
                        'text' => 'Cakupan Pelayanan & Pendampingan yang Diberikan',
                    ],
                    [
                        'id' => 'b5',
                        'type' => 'list',
                        'items' => [
                            'Antar-jemput pasien darurat medis dari kediaman warga menuju IGD rumah sakit rujukan terdekat.',
                            'Pendampingan kelengkapan dokumen administrasi jaminan kesehatan BPJS PBI dan penjaminan daerah.',
                            'Fasilitasi koordinasi ketersediaan ruang rawat inap kelas 3 bagi pasien prasejahtera.',
                            'Layanan siaga tanggap darurat bencana lokal dan evakuasi lansia berisiko.',
                        ],
                    ],
                    [
                        'id' => 'b6',
                        'type' => 'quote',
                        'quote' => 'Mandat di parlemen harus langsung terasa di depan pintu rumah warga, terutama saat mereka menghadapi saat-saat paling genting.',
                        'author' => 'Banu Lesmana Bagaskara, S.M.',
                    ],
                ],
            ],
            [
                'title' => 'Pendampingan Penerbitan NIB & Sertifikasi Halal Gratis untuk UMKM RT/RW',
                'slug' => Str::slug('Pendampingan Penerbitan NIB & Sertifikasi Halal Gratis untuk UMKM RT/RW'),
                'published_at' => '2026-01-16 10:30:00',
                'cover_image' => 'assets/banu/program_umkm.jpg',
                'excerpt' => 'Fasilitasi legalitas usaha mikro dan pedagang kecil di Tanah Sareal melalui pengurusan Nomor Induk Berusaha (NIB) gratis, sertifikasi produk halal, serta pelatihan pemasaran digital agar produk lokal mampu bersaing.',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 218,
                'content_blocks' => [
                    [
                        'id' => 'b21',
                        'type' => 'heading',
                        'level' => 'h2',
                        'text' => 'Penguatan Kemandirian Usaha Keluarga Berbasis Lingkungan',
                    ],
                    [
                        'id' => 'b22',
                        'type' => 'paragraph',
                        'text' => 'Mayoritas pelaku ekonomi kerakyatan di tingkat RT/RW menghadapi kendala administratif saat ingin memperluas usahanya. Rumah Aspirasi menghadirkan posko terpadu untuk mendampingi pengurusan izin usaha legal secara langsung.',
                    ],
                    [
                        'id' => 'b23',
                        'type' => 'grid',
                        'columns' => '2',
                        'col1Title' => 'Fasilitas Legalitas Resmi',
                        'col1Text' => 'Penerbitan Nomor Induk Berusaha (NIB) OSS RBA dan pendampingan self-declare sertifikasi halal bebas biaya.',
                        'col2Title' => 'Pelatihan Foto & Pasar Digital',
                        'col2Text' => 'Bimbingan teknis foto produk katalog smartphone dan pendaftaran toko daring pada etalase marketplace lokal.',
                    ],
                ],
            ],
            [
                'title' => 'Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase & Pencegahan Banjir',
                'slug' => Str::slug('Pengawalan Pokir APBD untuk Normalisasi Saluran Drainase & Pencegahan Banjir'),
                'published_at' => '2026-01-12 14:15:00',
                'cover_image' => 'assets/banu/testi_dialog.jpg',
                'excerpt' => 'Mengawal langsung usulan warga dari forum reses agar masuk ke dalam rencana kerja anggaran daerah untuk perbaikan dan normalisasi drainase gang pemukiman yang kerap meluap saat intensitas hujan tinggi.',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 195,
                'content_blocks' => [
                    [
                        'id' => 'b31',
                        'type' => 'heading',
                        'level' => 'h2',
                        'text' => 'Respon Cepat Usulan Drainase Pemukiman Padat',
                    ],
                    [
                        'id' => 'b32',
                        'type' => 'paragraph',
                        'text' => 'Peninjauan lapangan bersama tokoh masyarakat dan dinas teknis memastikan bahwa titik sumbatan saluran air gang langsung masuk dalam prioritas penanganan pemeliharaan berkala APBD Kota Bogor.',
                    ],
                ],
            ],
            [
                'title' => 'Mendorong Transparansi Alokasi Belanja Publik Raperda APBD Kota Bogor',
                'slug' => Str::slug('Mendorong Transparansi Alokasi Belanja Publik Raperda APBD Kota Bogor'),
                'published_at' => '2026-01-08 11:00:00',
                'cover_image' => 'assets/banu/banner_serbaguna.jpg',
                'excerpt' => 'Memperjuangkan efisiensi dan transparansi anggaran daerah di Badan Anggaran DPRD agar pos belanja publik lebih diprioritaskan untuk pemenuhan hak dasar warga, layanan kesehatan, dan infrastruktur lingkungan.',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 280,
                'content_blocks' => [
                    [
                        'id' => 'b41',
                        'type' => 'heading',
                        'level' => 'h2',
                        'text' => 'Pengawasan Alokasi Anggaran Berbasis Kepentingan Rakyat',
                    ],
                    [
                        'id' => 'b42',
                        'type' => 'paragraph',
                        'text' => 'Alokasi APBD harus difokuskan pada belanja yang langsung dirasakan manfaatnya oleh masyarakat dan memangkas anggaran seremonial yang tidak mendesak.',
                    ],
                ],
            ],
            [
                'title' => 'Draf Rancangan Advokasi Pelayanan Fasilitas Puskesmas Pembantu',
                'slug' => Str::slug('Draf Rancangan Advokasi Pelayanan Fasilitas Puskesmas Pembantu'),
                'published_at' => '2026-01-25 08:30:00',
                'cover_image' => 'assets/banu/hero_banu.jpg',
                'excerpt' => 'Rancangan catatan telaah dan usulan peningkatan jam operasional serta kelengkapan obat-obatan di pos layanan kesehatan kelurahan se-Tanah Sareal.',
                'is_featured' => false,
                'status' => 'draft',
                'view_count' => 12,
                'content_blocks' => [
                    [
                        'id' => 'b51',
                        'type' => 'heading',
                        'level' => 'h2',
                        'text' => 'Catatan Awal Telaah Fasilitas Kesehatan Lingkungan',
                    ],
                    [
                        'id' => 'b52',
                        'type' => 'paragraph',
                        'text' => 'Laporan ini masih dalam tahap pengumpulan data hasil kunjungan lapangan bersama ketua-ketua RW di wilayah Tanah Sareal.',
                    ],
                ],
            ],
        ];

        foreach ($reports as $data) {
            PerformanceReport::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
