<?php

use App\Enums\PublicationStatus;
use App\Models\Album;
use App\Models\News;
use App\Models\PerformanceReport;

it('renders home page successfully with HTTP 200', function () {
    $report = PerformanceReport::factory()->create([
        'title' => 'Pengadaan Mobil Siaga RW 05',
        'status' => PublicationStatus::Published->value,
    ]);

    $news = News::factory()->create([
        'title' => 'Kunjungan Kerja Komisi 1 ke Sukadamai',
        'status' => PublicationStatus::Published->value,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Banu Lesmana Bagaskara, S.M.');
    $response->assertSee('Pengadaan Mobil Siaga RW 05');
    $response->assertSee('Kunjungan Kerja Komisi 1 ke Sukadamai');
});

it('renders kenali saya page successfully with HTTP 200', function () {
    $response = $this->get(route('profile'));

    $response->assertOk();
    $response->assertSee('Banu Lesmana Bagaskara, S.M.');
    $response->assertSee('Tanah Sareal');
});

it('renders kinerja index page with active reports', function () {
    PerformanceReport::factory()->create([
        'title' => 'Renovasi Posyandu Mawar',
        'status' => PublicationStatus::Published->value,
    ]);

    $response = $this->get(route('kinerja.index'));

    $response->assertOk();
    $response->assertSee('Laporan Hasil');
    $response->assertSee('Renovasi Posyandu Mawar');
});

it('renders single kinerja detail page for published report and increments view count', function () {
    $report = PerformanceReport::factory()->create([
        'title' => 'Bantuan Sarana Olahraga Kencana',
        'slug' => 'bantuan-sarana-olahraga-kencana',
        'status' => PublicationStatus::Published->value,
        'view_count' => 0,
    ]);

    $response = $this->get(route('kinerja.show', $report->slug));

    $response->assertOk();
    $response->assertSee('Bantuan Sarana Olahraga Kencana');

    expect($report->fresh()->view_count)->toBe(1);
});

it('returns 404 for draft kinerja report', function () {
    $report = PerformanceReport::factory()->draft()->create([
        'slug' => 'draft-laporan-rahasia',
    ]);

    $response = $this->get(route('kinerja.show', $report->slug));

    $response->assertNotFound();
});

it('filters kinerja by kelurahan tag in content blocks', function () {
    PerformanceReport::factory()->create([
        'title' => 'Program Kedungbadak Bersih',
        'content_blocks' => [
            [
                'type' => 'paragraph',
                'data' => ['text' => 'Program khusus untuk Kelurahan Kedungbadak'],
            ],
        ],
        'status' => PublicationStatus::Published->value,
    ]);

    $response = $this->get(route('kinerja.index', ['kelurahan' => 'Kedungbadak']));

    $response->assertOk();
    $response->assertSee('Kedungbadak');
});

it('renders berita index page and searches by query keyword', function () {
    News::factory()->create([
        'title' => 'Sosialisasi Perda Kawasan Tanpa Rokok',
        'status' => PublicationStatus::Published->value,
    ]);

    News::factory()->create([
        'title' => 'Pembangunan Saluran Drainase Cibadak',
        'status' => PublicationStatus::Published->value,
    ]);

    $response = $this->get(route('berita.index', ['q' => 'Drainase']));

    $response->assertOk();
    $response->assertSee('Pembangunan Saluran Drainase Cibadak');
});

it('redirects single berita to source url and increments view count', function () {
    $news = News::factory()->create([
        'title' => 'Sidang Paripurna DPRD Kota Bogor Terkait APBD Perubahan',
        'slug' => 'sidang-paripurna-dprd-apbd-perubahan',
        'source_url' => 'https://kotabogor.go.id/berita-sidang-paripurna',
        'status' => PublicationStatus::Published->value,
        'view_count' => 0,
    ]);

    $response = $this->get(route('berita.show', $news->slug));

    $response->assertRedirect('https://kotabogor.go.id/berita-sidang-paripurna');

    expect($news->fresh()->view_count)->toBe(1);
});

it('returns 404 for draft berita', function () {
    $news = News::factory()->draft()->create([
        'slug' => 'draf-berita-internal',
    ]);

    $response = $this->get(route('berita.show', $news->slug));

    $response->assertNotFound();
});

it('renders galeri page with albums', function () {
    Album::factory()->create([
        'title' => 'Dokumentasi Rapat Dengar Pendapat Warga',
    ]);

    $response = $this->get(route('galeri.index'));

    $response->assertOk();
    $response->assertSee('Dokumentasi Rapat Dengar Pendapat Warga');
});

it('renders kontak dan aspirasi page with 11 kelurahan options', function () {
    $response = $this->get(route('kontak.index'));

    $response->assertOk();
    $response->assertSee('Kotak Aspirasi');
    $response->assertSee('Cibadak');
    $response->assertSee('Kayumanis');
    $response->assertSee('Kebonpedes');
    $response->assertSee('Kedungbadak');
    $response->assertSee('Kedungjaya');
    $response->assertSee('Kedungwaringin');
    $response->assertSee('Kencana');
    $response->assertSee('Mekarwangi');
    $response->assertSee('Sukadamai');
    $response->assertSee('Sukaresmi');
    $response->assertSee('Tanah Sareal');
});

it('renders dynamic XML sitemap with correct XML content type and URLs', function () {
    $report = PerformanceReport::factory()->create([
        'slug' => 'kinerja-teruji-sitemap',
        'status' => PublicationStatus::Published->value,
    ]);

    $news = News::factory()->create([
        'slug' => 'berita-terkini-sitemap',
        'status' => PublicationStatus::Published->value,
    ]);

    $response = $this->get('/sitemap.xml');

    $response->assertOk();
    $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
    $response->assertSee(url('/'));
    $response->assertSee(url('/kenali'));
    $response->assertSee(url('/kinerja'));
    $response->assertSee(url('/berita'));
    $response->assertSee(url('/galeri'));
    $response->assertSee(url('/kontak'));
    $response->assertSee(route('kinerja.show', $report->slug));
    $response->assertSee(route('berita.show', $news->slug));
});
