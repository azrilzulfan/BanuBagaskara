<?php

namespace Database\Seeders;

use App\Enums\AspirationPriority;
use App\Enums\AspirationStatus;
use App\Models\Aspiration;
use App\Models\AspirationNote;
use Illuminate\Database\Seeder;

class AspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aspirations = [
            [
                'ticket_number' => 'BLB-842910',
                'sender_name' => 'Ahmad Suhendar',
                'phone_number' => '081283928190',
                'address' => 'RT 03 / RW 04, Gang Musholla Al-Barokah',
                'kelurahan' => 'Kebonpedes',
                'category' => 'Infrastruktur & Drainase',
                'subject' => 'Usulan Normalisasi Saluran Drainase Gang Saat Hujan Deras',
                'description' => 'Saluran drainase utama di depan gang mengalami penyempitan sedimen pasir dan sampah padat. Setiap kali hujan intensitas lebat turun lebih dari 1 jam, genangan air setinggi mata kaki masuk ke teras rumah warga. Mohon advokasi pengurukan atau pemasangan u-ditch baru.',
                'status' => AspirationStatus::Baru,
                'priority' => AspirationPriority::Tinggi,
                'ip_address' => '180.252.164.21',
                'created_at' => '2026-03-01 10:15:00',
                'notes' => [
                    ['author_name' => 'Staf Bidang Pokir', 'note_text' => 'Laporan diterima tim sekretariat. Telah diagendakan peninjauan lapangan bersama ketua RT 03 pada akhir pekan ini.'],
                ],
            ],
            [
                'ticket_number' => 'BLB-842765',
                'sender_name' => 'Siti Nurjanah',
                'phone_number' => '081394821102',
                'address' => 'RT 02 / RW 07, Jalan Lingkungan Sukadamai Permai',
                'kelurahan' => 'Sukadamai',
                'category' => 'Penerangan Jalan (PJU)',
                'subject' => 'Perbaikan 3 Titik Lampu Penerangan Jalan Lingkungan (PJU) Padam',
                'description' => 'Ada tiga titik tiang penerangan jalan lingkungan padam sejak dua pekan lalu. Gang menjadi sangat gelap dan rawan tindak kejahatan malam hari bagi anak-anak dan warga yang pulang kerja. Mohon bantuannya.',
                'status' => AspirationStatus::Baru,
                'priority' => AspirationPriority::Sedang,
                'ip_address' => '114.125.72.88',
                'created_at' => '2026-02-28 19:40:00',
                'notes' => [],
            ],
            [
                'ticket_number' => 'BLB-842519',
                'sender_name' => 'Bambang Irawan',
                'phone_number' => '085712903341',
                'address' => 'RT 01 / RW 02, Sentra Kuliner Keripik Rumahan',
                'kelurahan' => 'Kedungbadak',
                'category' => 'UMKM & Usaha Warga',
                'subject' => 'Pendaftaran Pendampingan NIB & Fasilitasi Sertifikasi Halal Gratis',
                'description' => 'Kami kelompok ibu-ibu pengrajin olahan makanan ringan keripik pisang ingin mendaftar program legalitas NIB dan sertifikasi halal self-declare agar bisa menitipkan produk di etalase toko oleh-oleh.',
                'status' => AspirationStatus::Ditinjau,
                'priority' => AspirationPriority::Biasa,
                'ip_address' => '182.1.204.15',
                'created_at' => '2026-02-26 14:00:00',
                'notes' => [
                    ['author_name' => 'Koordinator Relawan UMKM', 'note_text' => 'Telah dihubungi via WhatsApp. Berkas KTP dan foto produk sudah dikirimkan via chat. Jadwal pendampingan input OSS dijadwalkan Rabu depan di Posko Rumah Aspirasi.'],
                ],
            ],
            [
                'ticket_number' => 'BLB-842402',
                'sender_name' => 'Hj. Rohanah',
                'phone_number' => '082190847712',
                'address' => 'RT 04 / RW 05, Belakang Lapangan Bulutangkis',
                'kelurahan' => 'Kedungwaringin',
                'category' => 'Layanan Ambulance Siaga',
                'subject' => 'Permohonan Pengantaran Pasien Lansia Cuci Darah ke RSUD Kota Bogor',
                'description' => 'Ibu kami membutuhkan bantuan antar-jemput ambulance untuk jadwal hemodialisa rutin di RSUD Kota Bogor setiap hari Selasa pagi jam 06.30 WIB.',
                'status' => AspirationStatus::Selesai,
                'priority' => AspirationPriority::Tinggi,
                'ip_address' => '180.244.133.90',
                'created_at' => '2026-02-24 08:30:00',
                'notes' => [
                    ['author_name' => 'Driver Unit Ambulance 01', 'note_text' => 'Unit ambulance telah sukses menjemput dan mengantar pasien ke poli cuci darah RSUD Kota Bogor. Pasien kembali ke rumah dengan selamat.'],
                ],
            ],
            [
                'ticket_number' => 'BLB-842288',
                'sender_name' => 'Deddy Kurniawan',
                'phone_number' => '081298412389',
                'address' => 'RT 05 / RW 09, Akses Jalur Pendidikan Kencana',
                'kelurahan' => 'Kencana',
                'category' => 'Infrastruktur & Drainase',
                'subject' => 'Usulan Pengaspalan Hotmix Gang Akses Menuju PAUD & Madrasah',
                'description' => 'Jalan paving gang sepanjang kurang lebih 150 meter rusak berlubang dan licin saat hujan, membahayakan anak-anak yang berangkat sekolah ke PAUD.',
                'status' => AspirationStatus::Ditinjau,
                'priority' => AspirationPriority::Sedang,
                'ip_address' => '114.79.48.112',
                'created_at' => '2026-02-22 11:20:00',
                'notes' => [
                    ['author_name' => 'Staf Bidang Pokir', 'note_text' => 'Sudah disurvei tim lapangan. Pengukuran panjang jalan dan estimasi anggaran telah dimasukkan ke lembar telaah Pokir Dinas PUPR.'],
                ],
            ],
        ];

        foreach ($aspirations as $item) {
            $notes = $item['notes'];
            unset($item['notes']);

            $aspiration = Aspiration::updateOrCreate(
                ['ticket_number' => $item['ticket_number']],
                $item
            );

            AspirationNote::where('aspiration_id', $aspiration->id)->delete();
            foreach ($notes as $noteData) {
                AspirationNote::create([
                    'aspiration_id' => $aspiration->id,
                    'author_name' => $noteData['author_name'],
                    'note_text' => $noteData['note_text'],
                ]);
            }
        }
    }
}
