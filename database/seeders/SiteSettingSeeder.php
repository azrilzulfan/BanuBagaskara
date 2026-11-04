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
                        'badge' => 'Amanah Warga Tanah Sareal • Periode 2024–2029',
                        'headline' => 'Mengabdi dengan Integritas, Bekerja Nyata untuk Warga Bogor',
                        'description' => 'Kanal transparansi kinerja, advokasi aspirasi masyarakat, dan informasi program kerja kedewanan Banu Lesmana Bagaskara, S.M. di DPRD Kota Bogor.',
                        'ctaPrimaryText' => 'Sampaikan Aspirasi',
                        'ctaPrimaryLink' => '/kontak#aspirasi',
                        'ctaSecondaryText' => 'Lihat Kinerja',
                        'ctaSecondaryLink' => '/kinerja',
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
                ],
            ],
            [
                'group' => 'profile',
                'key' => 'site_profile',
                'type' => 'json',
                'value' => [
                    'hero' => [
                        'title' => 'Kenali Banu Lesmana Bagaskara, S.M.',
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
                            ['period' => '2018 - 2022', 'title' => 'Sarjana Manajemen (S.M.)', 'institution' => 'Fakultas Ekonomi dan Bisnis'],
                            ['period' => '2015 - 2018', 'title' => 'Sekolah Menengah Atas (SMA)', 'institution' => 'SMA Negeri di Kota Bogor'],
                            ['period' => '2012 - 2015', 'title' => 'Sekolah Menengah Pertama (SMP)', 'institution' => 'SMP Negeri di Kota Bogor'],
                        ],
                        'experience' => [
                            ['period' => '2024 - Sekarang', 'title' => 'Anggota Komisi 1 DPRD Kota Bogor', 'institution' => 'Fraksi PDI Perjuangan - Dapil 4 Tanah Sareal'],
                            ['period' => '2023 - Sekarang', 'title' => 'Inisiator Rumah Aspirasi Rakyat & Ambulance Siaga', 'institution' => 'Kecamatan Tanah Sareal, Kota Bogor'],
                            ['period' => '2021 - Sekarang', 'title' => 'Penggerak Pemberdayaan UMKM & Pemuda Kreatif', 'institution' => 'Komunitas Bogor Lebih Baik'],
                        ],
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
