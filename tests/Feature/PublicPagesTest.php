<?php

use App\Enums\PublicationStatus;
use App\Models\News;
use App\Models\PerformanceReport;

it('renders home page successfully with HTTP 200', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Banu Lesmana Bagaskara');
    $response->assertSee('Bogor');
    $response->assertSee('Lebih');
    $response->assertSee('Baik');
});

it('renders kenali saya page successfully with HTTP 200', function () {
    $response = $this->get(route('profile'));

    $response->assertOk();
    $response->assertSee('Banu Lesmana Bagaskara, S.M.');
    $response->assertSee('Tanah Sareal');
    $response->assertSee('Visi');
});

it('renders kinerja index page with active reports', function () {
    $response = $this->get(route('kinerja.index'));

    $response->assertOk();
    $response->assertSee('Hasil');
    $response->assertSee('Kinerja');
    $response->assertSee('Ambulance Siaga 24 Jam');
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

it('filters kinerja by kelurahan parameter', function () {
    $response = $this->get(route('kinerja.index', ['kelurahan' => 'Kedungbadak']));

    $response->assertOk();
    $response->assertSee('Hasil');
    $response->assertSee('Kinerja');
});

it('renders berita index page and searches by query keyword', function () {
    $response = $this->get(route('berita.index', ['q' => 'Drainase']));

    $response->assertOk();
    $response->assertSee('Berita');
});

it('renders single berita detail page and increments view count', function () {
    $news = News::factory()->create([
        'title' => 'Sidang Paripurna DPRD Kota Bogor Terkait APBD Perubahan',
        'slug' => 'sidang-paripurna-dprd-apbd-perubahan',
        'status' => PublicationStatus::Published->value,
        'view_count' => 0,
    ]);

    $response = $this->get(route('berita.show', $news->slug));

    $response->assertOk();
    $response->assertSee('Sidang Paripurna DPRD Kota Bogor Terkait APBD Perubahan');

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
    $response = $this->get(route('galeri.index'));

    $response->assertOk();
    $response->assertSee('Galeri');
});

it('renders kontak dan aspirasi page with form', function () {
    $response = $this->get(route('kontak.index'));

    $response->assertOk();
    $response->assertSee('Kontak');
    $response->assertSee('Aspirasi');
    $response->assertSee('Kirim Aspirasi');
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
