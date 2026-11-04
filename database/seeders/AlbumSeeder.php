<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\AlbumPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            [
                'title' => 'Dialog Reses Masa Sidang II di Kebon Pedes',
                'slug' => Str::slug('Dialog Reses Masa Sidang II di Kebon Pedes'),
                'event_date' => '2026-02-28',
                'description' => 'Dokumentasi kegiatan serap aspirasi warga RW 04 Kebon Pedes terkait penanganan saluran air dan penerangan jalan umum.',
                'cover_image' => 'assets/banu/testi_dialog.jpg',
                'status' => 'published',
                'sort_order' => 1,
                'photos' => [
                    ['image_path' => 'assets/banu/testi_dialog.jpg', 'caption' => 'Tatap muka dialog bersama ketua RT, RW, dan tokoh warga Kebon Pedes.'],
                    ['image_path' => 'assets/banu/hero_banu.jpg', 'caption' => 'Penyampaian komitmen pengawalan Pokir APBD oleh Banu Lesmana Bagaskara.'],
                    ['image_path' => 'assets/banu/footer_community.jpg', 'caption' => 'Sesi ramah tamah dan foto bersama seluruh perwakilan warga lingkungan.'],
                    ['image_path' => 'assets/banu/banner_serbaguna.jpg', 'caption' => 'Spanduk komitmen pengawalan aspirasi pembangunan lingkungan.'],
                ],
            ],
            [
                'title' => 'Armada Ambulance Siaga 24 Jam & Layanan Pasien',
                'slug' => Str::slug('Armada Ambulance Siaga 24 Jam & Layanan Pasien'),
                'event_date' => '2026-02-24',
                'description' => 'Aktivitas kesiapsiagaan armada ambulans darurat gratis dan relawan medis Rumah Aspirasi di Kecamatan Tanah Sareal.',
                'cover_image' => 'assets/banu/program_ambulance.jpg',
                'status' => 'published',
                'sort_order' => 2,
                'photos' => [
                    ['image_path' => 'assets/banu/program_ambulance.jpg', 'caption' => 'Unit operasional Ambulance Siaga 24 Jam bersiaga di Kedung Badak.'],
                    ['image_path' => 'assets/banu/footer_community.jpg', 'caption' => 'Briefing relawan pendamping kesehatan sebelum evakuasi darurat.'],
                    ['image_path' => 'assets/banu/testi_dialog.jpg', 'caption' => 'Koordinasi bersama perwakilan keluarga pasien di RSUD Kota Bogor.'],
                    ['image_path' => 'assets/banu/banner_serbaguna.jpg', 'caption' => 'Layanan siaga ambulance bebas biaya untuk warga Tanah Sareal.'],
                ],
            ],
            [
                'title' => 'Fasilitasi NIB Gratis & Pelatihan Foto Produk UMKM',
                'slug' => Str::slug('Fasilitasi NIB Gratis & Pelatihan Foto Produk UMKM'),
                'event_date' => '2026-02-19',
                'description' => 'Bimbingan teknis legalitas perizinan usaha dan kelas fotografi produk bagi 120+ pelaku UMKM rumahan.',
                'cover_image' => 'assets/banu/program_umkm.jpg',
                'status' => 'published',
                'sort_order' => 3,
                'photos' => [
                    ['image_path' => 'assets/banu/program_umkm.jpg', 'caption' => 'Praktik pemotretan produk olahan makanan warga dengan studio mini.'],
                    ['image_path' => 'assets/banu/hero_banu.jpg', 'caption' => 'Penyerahan simbolis sertifikat NIB OSS RBA kepada pelaku usaha mikro.'],
                    ['image_path' => 'assets/banu/testi_dialog.jpg', 'caption' => 'Sesi konsultasi pendaftaran sertifikasi halal self-declare.'],
                    ['image_path' => 'assets/banu/banner_serbaguna.jpg', 'caption' => 'Suasana kelas pelatihan pemasaran digital berbasis RT/RW.'],
                ],
            ],
            [
                'title' => 'Pertemuan Tokoh & Silaturahmi Komunitas Sukadamai',
                'slug' => Str::slug('Pertemuan Tokoh & Silaturahmi Komunitas Sukadamai'),
                'event_date' => '2026-02-10',
                'description' => 'Rembug guyub warga dan tokoh pemuda Sukadamai untuk penguatan kerukunan dan fasilitas kepemudaan lingkungan.',
                'cover_image' => 'assets/banu/footer_community.jpg',
                'status' => 'published',
                'sort_order' => 4,
                'photos' => [
                    ['image_path' => 'assets/banu/footer_community.jpg', 'caption' => 'Rembug guyub warga dan tokoh pemuda Kelurahan Sukadamai.'],
                    ['image_path' => 'assets/banu/testi_dialog.jpg', 'caption' => 'Penyampaian usulan perbaikan jembatan penyeberangan gang.'],
                    ['image_path' => 'assets/banu/hero_banu.jpg', 'caption' => 'Sambutan evaluasi penyerapan pokok pikiran dewan tahun 2026.'],
                ],
            ],
        ];

        foreach ($albums as $albumData) {
            $photos = $albumData['photos'];
            unset($albumData['photos']);

            $album = Album::updateOrCreate(
                ['slug' => $albumData['slug']],
                $albumData
            );

            AlbumPhoto::where('album_id', $album->id)->delete();
            foreach ($photos as $idx => $photoData) {
                AlbumPhoto::create([
                    'album_id' => $album->id,
                    'image_path' => $photoData['image_path'],
                    'caption' => $photoData['caption'],
                    'sort_order' => $idx + 1,
                ]);
            }
        }
    }
}
