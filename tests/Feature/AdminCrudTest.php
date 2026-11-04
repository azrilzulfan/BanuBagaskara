<?php

use App\Enums\AspirationStatus;
use App\Enums\PublicationStatus;
use App\Models\Album;
use App\Models\AlbumPhoto;
use App\Models\Aspiration;
use App\Models\News;
use App\Models\PerformanceReport;
use App\Models\User;
use App\Services\SiteSettingsService;

beforeEach(function () {
    $this->admin = User::factory()->create([
        'email' => 'admin@banubagaskara.id',
    ]);
});

// ==========================================
// 1. PERFORMANCE REPORTS (KINERJA)
// ==========================================

it('allows admin to view performance reports index', function () {
    PerformanceReport::factory()->count(3)->create();

    $response = $this->actingAs($this->admin)->get(route('admin.kinerja.index'));

    $response->assertOk();
    $response->assertSee('Kelola Hasil Kinerja');
});

it('allows admin to create a performance report with modular blocks', function () {
    $payload = [
        'title' => 'Advokasi Anggaran Revitalisasi Drainase Kebonpedes',
        'date' => '2026-03-15',
        'coverImage' => 'assets/banu/program_ambulance.jpg',
        'excerpt' => 'Pengawalan alokasi APBD untuk penanganan genangan air di Kebonpedes.',
        'isFeatured' => true,
        'status' => 'Terbit',
        'blocks' => [
            [
                'type' => 'heading',
                'level' => 'h2',
                'text' => 'Latar Belakang Permasalahan',
            ],
            [
                'type' => 'paragraph',
                'text' => 'Genangan air telah terjadi selama bertahun-tahun saat musim hujan.',
            ],
            [
                'type' => 'quote',
                'quote' => 'Hak warga atas lingkungan yang aman adalah prioritas utama.',
                'author' => 'Banu Bagaskara',
            ],
        ],
    ];

    $response = $this->actingAs($this->admin)->post(route('admin.kinerja.store'), $payload);

    $response->assertRedirect(route('admin.kinerja.index'));

    $this->assertDatabaseHas('performance_reports', [
        'title' => 'Advokasi Anggaran Revitalisasi Drainase Kebonpedes',
        'is_featured' => 1,
        'status' => 'published',
    ]);

    $report = PerformanceReport::where('title', 'Advokasi Anggaran Revitalisasi Drainase Kebonpedes')->first();
    expect($report->content_blocks)->toHaveCount(3);
});

it('allows admin to update an existing performance report', function () {
    $report = PerformanceReport::factory()->create([
        'title' => 'Judul Awal',
        'status' => PublicationStatus::Draft->value,
    ]);

    $updatePayload = [
        'title' => 'Judul Diperbarui',
        'date' => '2026-04-01',
        'coverImage' => 'assets/banu/news_1.jpg',
        'excerpt' => 'Ringkasan baru.',
        'isFeatured' => false,
        'status' => 'Terbit',
        'blocks' => [
            ['type' => 'paragraph', 'text' => 'Paragraf revisi.'],
        ],
    ];

    $response = $this->actingAs($this->admin)->put(route('admin.kinerja.update', $report), $updatePayload);

    $response->assertRedirect(route('admin.kinerja.index'));

    $report->refresh();
    expect($report->title)->toBe('Judul Diperbarui')
        ->and($report->status)->toBe('published');
});

it('allows admin to toggle featured status of a performance report via JSON API', function () {
    $report = PerformanceReport::factory()->create(['is_featured' => false]);

    $response = $this->actingAs($this->admin)->patchJson(route('admin.kinerja.toggle-featured', $report));

    $response->assertOk();
    $response->assertJson(['success' => true, 'is_featured' => true]);

    expect($report->fresh()->is_featured)->toBeTrue();
});

it('allows admin to toggle publication status of a performance report via JSON API', function () {
    $report = PerformanceReport::factory()->create(['status' => 'draft']);

    $response = $this->actingAs($this->admin)->patchJson(route('admin.kinerja.toggle-status', $report));

    $response->assertOk();
    $response->assertJson(['success' => true, 'status' => 'published']);

    expect($report->fresh()->status)->toBe('published');
});

it('allows admin to delete a performance report', function () {
    $report = PerformanceReport::factory()->create();

    $response = $this->actingAs($this->admin)->delete(route('admin.kinerja.destroy', $report));

    $response->assertRedirect(route('admin.kinerja.index'));
    $this->assertModelMissing($report);
});

// ==========================================
// 2. NEWS (BERITA)
// ==========================================

it('allows admin to view news index', function () {
    News::factory()->count(2)->create();

    $response = $this->actingAs($this->admin)->get(route('admin.berita.index'));

    $response->assertOk();
    $response->assertSee('Kelola Artikel Berita');
});

it('allows admin to create news article', function () {
    $payload = [
        'title' => 'Banu Bagaskara Tinjau Lokasi Rawan Longsor Kedungwaringin',
        'date' => '2026-03-20',
        'source' => 'Media Center',
        'coverImage' => 'assets/banu/news_1.jpg',
        'description' => 'Peninjauan langsung ke tebing sungai di Kedungwaringin yang terancam longsor.',
        'isFeatured' => true,
        'status' => 'Terbit',
    ];

    $response = $this->actingAs($this->admin)->post(route('admin.berita.store'), $payload);

    $response->assertRedirect(route('admin.berita.index'));

    $this->assertDatabaseHas('news', [
        'title' => 'Banu Bagaskara Tinjau Lokasi Rawan Longsor Kedungwaringin',
        'source' => 'Media Center',
        'status' => 'published',
        'is_featured' => 1,
    ]);
});

it('allows admin to update news article', function () {
    $news = News::factory()->create([
        'title' => 'Judul Berita Lama',
    ]);

    $payload = [
        'title' => 'Judul Berita Baru Hasil Revisi',
        'date' => '2026-03-21',
        'source' => 'Radar Bogor',
        'coverImage' => 'assets/banu/news_2.jpg',
        'description' => 'Deskripsi baru setelah revisi redaksi.',
        'isFeatured' => false,
        'status' => 'Draf',
    ];

    $response = $this->actingAs($this->admin)->put(route('admin.berita.update', $news), $payload);

    $response->assertRedirect(route('admin.berita.index'));

    $news->refresh();
    expect($news->title)->toBe('Judul Berita Baru Hasil Revisi')
        ->and($news->status)->toBe('draft');
});

it('allows admin to toggle news featured and publication status', function () {
    $news = News::factory()->create([
        'is_featured' => false,
        'status' => 'draft',
    ]);

    $this->actingAs($this->admin)->patchJson(route('admin.berita.toggle-featured', $news))
        ->assertOk()
        ->assertJson(['success' => true, 'is_featured' => true]);

    $this->actingAs($this->admin)->patchJson(route('admin.berita.toggle-status', $news))
        ->assertOk()
        ->assertJson(['success' => true, 'status' => 'published']);

    $news->refresh();
    expect($news->is_featured)->toBeTrue()
        ->and($news->status)->toBe('published');
});

it('allows admin to delete news', function () {
    $news = News::factory()->create();

    $response = $this->actingAs($this->admin)->delete(route('admin.berita.destroy', $news));

    $response->assertRedirect(route('admin.berita.index'));
    $this->assertModelMissing($news);
});

// ==========================================
// 3. GALLERY (ALBUM & PHOTOS)
// ==========================================

it('allows admin to view gallery album index', function () {
    Album::factory()->create(['title' => 'Pemberian Bantuan Sembako']);

    $response = $this->actingAs($this->admin)->get(route('admin.galeri.index'));

    $response->assertOk();
    $response->assertSee('Kelola Galeri');
});

it('allows admin to create album with nested photos', function () {
    $payload = [
        'title' => 'Musrenbang Kecamatan Tanah Sareal 2026',
        'date' => '2026-02-10',
        'desc' => 'Dokumentasi kehadiran dan pemaparan pokok pikiran dewan.',
        'cover' => 'assets/banu/hero_banu.jpg',
        'status' => 'Terbit',
        'photos' => [
            ['url' => 'assets/banu/hero_banu.jpg', 'caption' => 'Pemaparan materi'],
            ['url' => 'assets/banu/testi_dialog.jpg', 'caption' => 'Sesi tanya jawab'],
        ],
    ];

    $response = $this->actingAs($this->admin)->post(route('admin.galeri.store'), $payload);

    $response->assertRedirect(route('admin.galeri.index'));

    $this->assertDatabaseHas('albums', [
        'title' => 'Musrenbang Kecamatan Tanah Sareal 2026',
        'status' => 'published',
    ]);

    $album = Album::where('title', 'Musrenbang Kecamatan Tanah Sareal 2026')->first();
    expect($album->photos)->toHaveCount(2);
});

it('allows admin to delete album and cascade delete its photos', function () {
    $album = Album::factory()->create();
    AlbumPhoto::factory()->count(3)->create(['album_id' => $album->id]);

    $response = $this->actingAs($this->admin)->delete(route('admin.galeri.destroy', $album));

    $response->assertRedirect(route('admin.galeri.index'));
    $this->assertModelMissing($album);
    expect(AlbumPhoto::where('album_id', $album->id)->count())->toBe(0);
});

// ==========================================
// 4. ASPIRATIONS (ASPIRASI WARGA)
// ==========================================

it('allows admin to view aspirations index', function () {
    Aspiration::factory()->count(3)->create();

    $response = $this->actingAs($this->admin)->get(route('admin.aspirasi.index'));

    $response->assertOk();
    $response->assertSee('Kotak Aspirasi Warga');
});

it('allows admin to update aspiration status', function () {
    $aspiration = Aspiration::factory()->create([
        'status' => AspirationStatus::Baru,
    ]);

    $response = $this->actingAs($this->admin)->patchJson(route('admin.aspirasi.update-status', $aspiration), [
        'status' => 'Ditinjau',
    ]);

    $response->assertOk();
    $response->assertJson(['success' => true, 'status' => 'Ditinjau']);

    $aspiration->refresh();
    expect($aspiration->status->value)->toBe('Ditinjau');
});

it('allows admin to add internal disposition note to an aspiration', function () {
    $aspiration = Aspiration::factory()->create();

    $response = $this->actingAs($this->admin)->postJson(route('admin.aspirasi.store-note', $aspiration), [
        'note' => 'Telah dikoordinasikan dengan Dinas PUPR Kota Bogor untuk jadwal survei lapangan.',
    ]);

    $response->assertOk();
    $response->assertJson(['success' => true]);

    $this->assertDatabaseHas('aspiration_notes', [
        'aspiration_id' => $aspiration->id,
        'note_text' => 'Telah dikoordinasikan dengan Dinas PUPR Kota Bogor untuk jadwal survei lapangan.',
    ]);
});

it('allows admin to export aspirations as CSV file', function () {
    Aspiration::factory()->count(2)->create();

    $response = $this->actingAs($this->admin)->get(route('admin.aspirasi.export'));

    $response->assertOk();
    $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
});

it('allows admin to bulk delete aspirations', function () {
    $aspirations = Aspiration::factory()->count(3)->create();
    $ids = $aspirations->pluck('id')->all();

    $response = $this->actingAs($this->admin)->postJson(route('admin.aspirasi.bulk-delete'), [
        'ids' => $ids,
    ]);

    $response->assertOk();
    $response->assertJson(['success' => true]);

    expect(Aspiration::whereIn('id', $ids)->count())->toBe(0);
});

// ==========================================
// 5. SETTINGS (PENGATURAN SITUS)
// ==========================================

it('allows admin to view settings index', function () {
    $response = $this->actingAs($this->admin)->get(route('admin.pengaturan.index'));

    $response->assertOk();
    $response->assertSee('Pengaturan Halaman Website');
});

it('allows admin to update site settings group', function () {
    $payload = [
        'group' => 'general',
        'data' => [
            'siteTitle' => 'Portal Resmi Banu Bagaskara',
            'slogan' => 'Bogor Lebih Maju dan Berkeadilan',
            'phone' => '+6281288880000',
        ],
    ];

    $response = $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), $payload);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $settingsService = app(SiteSettingsService::class);
    $general = $settingsService->getGroup('general');

    expect($general['siteTitle'])->toBe('Portal Resmi Banu Bagaskara')
        ->and($general['slogan'])->toBe('Bogor Lebih Maju dan Berkeadilan');
});
