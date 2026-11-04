<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsList = [
            [
                'title' => 'Serap Aspirasi di Kebon Pedes: Banu Lesmana Pastikan Usulan Drainase & PJU Masuk Prioritas APBD Perubahan',
                'slug' => Str::slug('Serap Aspirasi di Kebon Pedes: Banu Lesmana Pastikan Usulan Drainase & PJU Masuk Prioritas APBD Perubahan'),
                'published_at' => '2026-02-28',
                'description' => "Dalam rangkaian kegiatan reses masa sidang kedua di RW 04 Kelurahan Kebon Pedes, Anggota DPRD Kota Bogor Banu Lesmana Bagaskara, S.M. bertatap muka langsung dengan tokoh masyarakat, pengurus RT/RW, dan kader posyandu.\n\nDalam forum dialog warga tersebut, dua isu utama yang paling banyak disuarakan adalah perbaikan saluran pembuangan air (drainase) lingkungan yang kerap meluap ke pemukiman saat hujan deras, serta kebutuhan penambahan titik Penerangan Jalan Umum (PJU) di gang-gang sempit.\n\n\"Seluruh aspirasi konkret ini sudah dicatat secara sistematis oleh tim Rumah Aspirasi. Kami akan mengawal langsung agar dokumen usulan ini dimasukkan ke dalam prioritas pembahasan APBD Perubahan Kota Bogor, sehingga manfaatnya dapat segera dirasakan secara nyata oleh warga,\" tegas Banu.",
                'cover_image' => 'assets/banu/testi_dialog.jpg',
                'source' => 'Rilis Resmi Sekretariat Dapil 4',
                'is_featured' => true,
                'status' => 'published',
                'view_count' => 450,
            ],
            [
                'title' => 'Ambulance Siaga Banu Bagaskara Respon Cepat Rujukan Pasien Darurat di Kedung Badak',
                'slug' => Str::slug('Ambulance Siaga Banu Bagaskara Respon Cepat Rujukan Pasien Darurat di Kedung Badak'),
                'published_at' => '2026-02-24',
                'description' => "Tim relawan Ambulance Siaga 24 Jam Rumah Aspirasi Banu Bagaskara bergerak cepat mengevakuasi salah seorang warga lansia yang mengalami sesak napas darurat di wilayah Kelurahan Kedung Badak menuju IGD RSUD Kota Bogor pada dini hari.\n\nSelain menyediakan transportasi darurat secara gratis tanpa dipungut biaya sepeser pun, relawan kesehatan Rumah Aspirasi turut mendampingi proses administrasi kepesertaan jaminan kesehatan agar pasien langsung mendapatkan penanganan medis intensif tanpa hambatan birokrasi.",
                'cover_image' => 'assets/banu/program_ambulance.jpg',
                'source' => 'Relawan Kesehatan 24 Jam',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 380,
            ],
            [
                'title' => 'Rumah Aspirasi Fasilitasi 120+ NIB Gratis dan Pelatihan Foto Produk Bagi Pelaku Usaha',
                'slug' => Str::slug('Rumah Aspirasi Fasilitasi 120+ NIB Gratis dan Pelatihan Foto Produk Bagi Pelaku Usaha'),
                'published_at' => '2026-02-19',
                'description' => "Sebagai bagian dari realisasi 6 Program Unggulan terkait pemberdayaan ekonomi kerakyatan, Rumah Aspirasi Banu Bagaskara menggelar bimbingan teknis legalitas usaha mikro di wilayah Tanah Sareal. Sebanyak lebih dari 120 pelaku usaha kecil sukses diterbitkan Nomor Induk Berusaha (NIB) berbasis risiko OSS RBA secara cuma-cuma.\n\nKegiatan ini juga dirangkaikan dengan workshop praktis teknik foto produk katalog smartphone dan pendaftaran etalase digital guna mendorong produk UMKM lokal menjangkau pangsa pasar yang lebih luas.",
                'cover_image' => 'assets/banu/program_umkm.jpg',
                'source' => 'Divisi Advokasi UMKM RT/RW',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 295,
            ],
            [
                'title' => 'Rapat Badan Anggaran: Banu Soroti Alokasi Bantuan Pendidikan Agar Tepat Sasaran',
                'slug' => Str::slug('Rapat Badan Anggaran: Banu Soroti Alokasi Bantuan Pendidikan Agar Tepat Sasaran'),
                'published_at' => '2026-02-14',
                'description' => "Dalam rapat kerja Badan Anggaran DPRD Kota Bogor bersama Tim Anggaran Pemerintah Daerah (TAPD), Banu Lesmana Bagaskara menekankan pentingnya akurasi basis data penerima bantuan beasiswa pendidikan dan penebusan ijazah tertahan bagi siswa prasejahtera di Kota Bogor.\n\nBanu mengingatkan agar alokasi belanja pendidikan tidak hanya terfokus pada belanja fisik seremonial, tetapi benar-benar menjamin tidak ada lagi anak di Kota Bogor yang putus sekolah karena kendala biaya administrasi sekolah.",
                'cover_image' => 'assets/banu/hero_banu.jpg',
                'source' => 'Fraksi PDI Perjuangan DPRD Kota Bogor',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 310,
            ],
            [
                'title' => 'Draf Liputan Kunjungan Kerja Lapangan Peninjauan Turap Longsor',
                'slug' => Str::slug('Draf Liputan Kunjungan Kerja Lapangan Peninjauan Turap Longsor'),
                'published_at' => '2026-03-01',
                'description' => 'Peninjauan lokasi tebing sungai rawan longsor pasca intensitas hujan tinggi bersama BPBD Kota Bogor dan aparatur wilayah kelurahan.',
                'cover_image' => 'assets/banu/footer_community.jpg',
                'source' => 'Catatan Lapangan Sekretariat',
                'is_featured' => false,
                'status' => 'draft',
                'view_count' => 15,
            ],
        ];

        foreach ($newsList as $data) {
            News::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
