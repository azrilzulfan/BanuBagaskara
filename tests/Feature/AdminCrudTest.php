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
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

it('enforces only one performance report can be featured at any time', function () {
    $existingFeatured = PerformanceReport::factory()->create(['is_featured' => true]);
    $newReport = PerformanceReport::factory()->create(['is_featured' => false]);

    // 1. Toggling new report to featured un-features existing one
    $response = $this->actingAs($this->admin)->patchJson(route('admin.kinerja.toggle-featured', $newReport));
    $response->assertOk();

    expect($newReport->fresh()->is_featured)->toBeTrue()
        ->and($existingFeatured->fresh()->is_featured)->toBeFalse();

    // 2. Creating another report with isFeatured = true un-features active one
    $this->actingAs($this->admin)->post(route('admin.kinerja.store'), [
        'title' => 'Laporan Featured Terbaru',
        'isFeatured' => true,
        'status' => 'Terbit',
    ]);

    expect($newReport->fresh()->is_featured)->toBeFalse();
    $created = PerformanceReport::where('title', 'Laporan Featured Terbaru')->first();
    expect($created->is_featured)->toBeTrue();

    // 3. Updating existing report to isFeatured = true un-features others
    $this->actingAs($this->admin)->put(route('admin.kinerja.update', $existingFeatured), [
        'title' => 'Laporan Lama Dijadikan Featured Lagi',
        'isFeatured' => true,
        'status' => 'Terbit',
    ]);

    expect($existingFeatured->fresh()->is_featured)->toBeTrue()
        ->and($created->fresh()->is_featured)->toBeFalse();
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
    $response->assertSee('Kelola Berita');
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

it('enforces only one news article can be featured at any time', function () {
    $existingFeatured = News::factory()->create(['is_featured' => true]);
    $newNews = News::factory()->create(['is_featured' => false]);

    // 1. Toggling new news to featured un-features existing one
    $this->actingAs($this->admin)->patchJson(route('admin.berita.toggle-featured', $newNews))
        ->assertOk();

    expect($newNews->fresh()->is_featured)->toBeTrue()
        ->and($existingFeatured->fresh()->is_featured)->toBeFalse();

    // 2. Creating another news with isFeatured = true un-features active one
    $this->actingAs($this->admin)->post(route('admin.berita.store'), [
        'title' => 'Berita Featured Terbaru',
        'date' => '2026-03-25',
        'sourceUrl' => 'https://kotabogor.go.id/berita-baru',
        'coverImage' => 'assets/banu/news_1.jpg',
        'description' => 'Deskripsi rilis berita terbaru.',
        'isFeatured' => true,
        'status' => 'Terbit',
    ]);

    expect($newNews->fresh()->is_featured)->toBeFalse();
    $created = News::where('title', 'Berita Featured Terbaru')->first();
    expect($created->is_featured)->toBeTrue();

    // 3. Updating existing news to isFeatured = true un-features others
    $this->actingAs($this->admin)->put(route('admin.berita.update', $existingFeatured), [
        'title' => 'Berita Lama Kembali Menjadi Sorotan',
        'date' => '2026-03-26',
        'sourceUrl' => 'https://kotabogor.go.id/berita-lama',
        'coverImage' => 'assets/banu/news_2.jpg',
        'description' => 'Deskripsi pembaruan berita.',
        'isFeatured' => true,
        'status' => 'Terbit',
    ]);

    expect($existingFeatured->fresh()->is_featured)->toBeTrue()
        ->and($created->fresh()->is_featured)->toBeFalse();
});

it('requires sourceUrl when creating news article', function () {
    $response = $this->actingAs($this->admin)->post(route('admin.berita.store'), [
        'title' => 'Berita Tanpa URL Sumber',
        'date' => '2026-03-25',
        'sourceUrl' => '',
        'coverImage' => 'assets/banu/news_1.jpg',
        'description' => 'Deskripsi.',
        'status' => 'Terbit',
    ]);

    $response->assertSessionHasErrors('sourceUrl');
});

// ==========================================
// 3. GALLERY (ALBUM & PHOTOS)
// ==========================================

it('allows admin to view gallery album index', function () {
    Album::factory()->create(['title' => 'Pemberian Bantuan Sembako']);

    $response = $this->actingAs($this->admin)->get(route('admin.galeri.index'));

    $response->assertOk();
    $response->assertSee('Kelola Galeri');
    $response->assertSee('Pemberian Bantuan Sembako');
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

it('ensures admin gallery page has direct upload buttons and no select tags for images', function () {
    $response = $this->actingAs($this->admin)->get(route('admin.galeri.index'));

    $response->assertOk();
    $response->assertSee('Unggah Foto Baru');
    $response->assertSee('Pilih & Unggah Sampul Album', false);
    $response->assertDontSee('availablePhotos');
    $response->assertDontSee('<select', false);
});

it('allows admin to upload image and create album with the uploaded file', function () {
    Storage::fake('public');
    $file = UploadedFile::fake()->image('kegiatan.jpg');

    $uploadResponse = $this->actingAs($this->admin)->postJson(route('admin.upload'), [
        'file' => $file,
    ]);

    $uploadResponse->assertOk();
    $uploadResponse->assertJson(['success' => true]);
    $uploadedPath = $uploadResponse->json('path');

    $payload = [
        'title' => 'Dokumentasi Kunjungan Lapangan Terbaru',
        'date' => '2026-03-30',
        'desc' => 'Dokumentasi kunjungan lapangan dengan berkas foto hasil unggahan.',
        'cover' => $uploadedPath,
        'status' => 'Terbit',
        'photos' => [
            ['url' => $uploadedPath, 'caption' => 'Foto hasil unggahan'],
        ],
    ];

    $response = $this->actingAs($this->admin)->post(route('admin.galeri.store'), $payload);
    $response->assertRedirect(route('admin.galeri.index'));

    $this->assertDatabaseHas('albums', [
        'title' => 'Dokumentasi Kunjungan Lapangan Terbaru',
        'cover_image' => $uploadedPath,
    ]);

    $this->assertDatabaseHas('album_photos', [
        'image_path' => $uploadedPath,
        'caption' => 'Foto hasil unggahan',
    ]);
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

it('ensures admin aspirasi module does not have kelurahan, kategori, status or disposition notes', function () {
    $aspiration = Aspiration::factory()->create([
        'sender_name' => 'Budi Santoso',
        'subject' => 'Lampu Jalan Rusak',
        'description' => 'Tiga titik lampu jalan padam.',
    ]);

    $response = $this->actingAs($this->admin)->get(route('admin.aspirasi.index'));

    $response->assertOk();
    $response->assertSee('Budi Santoso');
    $response->assertSee('Lampu Jalan Rusak');
    // Ensure Kelurahan filter/column is removed
    $response->assertDontSee('Semua Kelurahan (Dapil 4)');
    $response->assertDontSee('kelurahanFilter');
    // Ensure Category filter/column is removed
    $response->assertDontSee('Semua Kategori');
    $response->assertDontSee('categoryFilter');
    // Ensure Status cards/tabs are removed
    $response->assertDontSee('Perlu Tindakan (Baru)');
    $response->assertDontSee('statusFilter');
    $response->assertDontSee('Tandai Selesai');
    // Ensure Tindak Lanjut & Catatan Internal Staf is removed
    $response->assertDontSee('Tindak Lanjut &amp; Catatan Internal Staf', false);
    $response->assertDontSee('Tindak Lanjut & Catatan Internal Staf', false);
    $response->assertDontSee('Tambah Catatan Disposisi');
    $response->assertDontSee('Ubah Status Tiket');
    // Ensure only viewing, deleting, and opening WhatsApp are present
    $response->assertSee('openDetail', false);
    $response->assertSee('promptDelete', false);
    $response->assertSee('openWhatsApp', false);
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

it('reflects updated site settings on public frontend pages', function () {
    // 1. Update general settings
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'general',
        'data' => [
            'siteTitle' => 'Situs Resmi Banu Bagaskara DPRD',
            'slogan' => 'Bogor Guyub Rukun',
            'visionSlogan' => 'Nyaman Tanpa Hambatan',
            'address' => 'Jl. Pemuda No. 45, Kedung Badak, Tanah Sareal',
            'phone' => '+62 811-9999-8888',
            'email' => 'aduan@banubagaskara.id',
            'socials' => [
                'instagram' => 'https://instagram.com/banubagaskara_official',
                'tiktok' => 'https://tiktok.com/@banubagaskara_official',
                'facebook' => 'https://facebook.com/banubgsk_official',
            ],
        ],
    ])->assertRedirect();

    // 2. Update home settings
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'home',
        'data' => [
            'hero' => [
                'headline' => 'Mengabdi Sepenuh Hati untuk Warga Tanah Sareal',
                'description' => 'Transparansi penuh pengabdian dan kerja lapangan bersama warga.',
                'ctaPrimaryText' => 'Adukan Masalahmu',
                'ctaPrimaryLink' => '/kontak#aspirasi',
                'ctaSecondaryText' => 'Ketahui Kinerjaku',
                'ctaSecondaryLink' => '/kinerja',
            ],
            'banner' => [
                'enabled' => true,
                'title' => 'Ambulans Darurat Gratis 24 Jam Nonstop',
            ],
        ],
    ])->assertRedirect();

    // 3. Update profile settings
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'profile',
        'data' => [
            'vision' => 'Bogor Maju Berdaya dan Sejahtera Tanpa Pungli',
            'quote' => 'Amanah rakyat adalah pertanggungjawaban dunia akhirat.',
        ],
    ])->assertRedirect();

    // Verify Home page
    $homeResponse = $this->get(route('home'));
    $homeResponse->assertOk();
    $homeResponse->assertSee('Mengabdi Sepenuh Hati untuk Warga Tanah Sareal');
    $homeResponse->assertSee('Transparansi penuh pengabdian dan kerja lapangan bersama warga.');
    $homeResponse->assertSee('Adukan Masalahmu');
    $homeResponse->assertSee('Bogor Guyub Rukun');

    // Verify Profile page
    $profileResponse = $this->get(route('profile'));
    $profileResponse->assertOk();
    $profileResponse->assertSee('Bogor Maju Berdaya dan Sejahtera Tanpa Pungli');
    $profileResponse->assertSee('Amanah rakyat adalah pertanggungjawaban dunia akhirat.');

    // Verify Contact page
    $contactResponse = $this->get(route('kontak.index'));
    $contactResponse->assertOk();
    $contactResponse->assertSee('Jl. Pemuda No. 45, Kedung Badak, Tanah Sareal');
    $contactResponse->assertSee('+62 811-9999-8888');
    $contactResponse->assertSee('aduan@banubagaskara.id');
    $contactResponse->assertSee('https://instagram.com/banubagaskara_official');
});

it('allows admin to upload image assets for settings', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('custom_hero.jpg', 800, 600);

    $response = $this->actingAs($this->admin)->post(route('admin.upload'), [
        'file' => $file,
    ]);

    $response->assertOk()
        ->assertJson([
            'success' => true,
            'message' => 'File berhasil diunggah.',
        ]);

    $data = $response->json();
    expect($data['path'])->toStartWith('storage/settings/')
        ->and($data['url'])->toContain('storage/settings/');

    $storedFileName = str_replace('storage/', '', $data['path']);
    Storage::disk('public')->assertExists($storedFileName);
});

it('allows admin to configure logo and favicon and reflects in layout', function () {
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'general',
        'data' => [
            'siteTitle' => 'Portal Banu Bagaskara',
            'logo' => 'storage/settings/official_logo.png',
            'favicon' => 'storage/settings/favicon_custom.ico',
            'slogan' => 'Bogor Lebih Baik',
        ],
    ])->assertRedirect();

    $response = $this->get(route('home'));
    $response->assertOk();
    $response->assertSee('storage/settings/favicon_custom.ico');
    $response->assertSee('storage/settings/official_logo.png');
});

it('synchronizes 6 programs bidirectionally between home and profile settings', function () {
    $customPrograms = [
        ['no' => 1, 'title' => 'Program Inovatif A', 'desc' => 'Deskripsi Program Inovatif A'],
        ['no' => 2, 'title' => 'Program Inovatif B', 'desc' => 'Deskripsi Program Inovatif B'],
        ['no' => 3, 'title' => 'Program Inovatif C', 'desc' => 'Deskripsi Program Inovatif C'],
        ['no' => 4, 'title' => 'Program Inovatif D', 'desc' => 'Deskripsi Program Inovatif D'],
        ['no' => 5, 'title' => 'Program Inovatif E', 'desc' => 'Deskripsi Program Inovatif E'],
        ['no' => 6, 'title' => 'Program Inovatif F', 'desc' => 'Deskripsi Program Inovatif F'],
    ];

    // 1. Update programs through home group
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'home',
        'data' => [
            'hero' => ['headline' => 'Test Headline'],
            'programs' => $customPrograms,
        ],
    ])->assertRedirect();

    $settingsService = app(SiteSettingsService::class);
    $profileSettings = $settingsService->getGroup('profile');
    expect($profileSettings['programs'][0]['title'])->toBe('Program Inovatif A')
        ->and($profileSettings['programs'][5]['title'])->toBe('Program Inovatif F');

    // Both home and profile public pages should reflect the synchronized programs
    $homeResponse = $this->get(route('home'));
    $homeResponse->assertSee('Program Inovatif A');
    $homeResponse->assertSee('Program Inovatif F');

    $profileResponse = $this->get(route('profile'));
    $profileResponse->assertSee('Program Inovatif A');
    $profileResponse->assertSee('Program Inovatif F');

    // 2. Update programs through profile group
    $customPrograms[0]['title'] = 'Program Terupdate dari Profil';
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'profile',
        'data' => [
            'vision' => 'Visi Baru',
            'programs' => $customPrograms,
        ],
    ])->assertRedirect();

    $homeSettings = $settingsService->getGroup('home');
    expect($homeSettings['programs'][0]['title'])->toBe('Program Terupdate dari Profil');

    $homeResponseUpdated = $this->get(route('home'));
    $homeResponseUpdated->assertSee('Program Terupdate dari Profil');
});

it('allows admin to manage dynamic education and experience entries in profile', function () {
    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'profile',
        'data' => [
            'historyTrack' => [
                'education' => [
                    ['period' => '2022 – 2024', 'title' => 'Magister Manajemen (M.M.)', 'institution' => 'Universitas Indonesia'],
                    ['period' => '2015 – 2019', 'title' => 'Sarjana Manajemen (S.M.)', 'institution' => 'IBI Kesatuan Bogor'],
                ],
                'experience' => [
                    ['period' => '2024 – 2029', 'title' => 'Ketua Fraksi & Anggota Komisi 1', 'institution' => 'DPRD Kota Bogor'],
                    ['period' => '2021 – 2024', 'title' => 'Ketua Yayasan Pemuda Bogor Maju', 'institution' => 'Bogor Lebih Baik'],
                ],
            ],
        ],
    ])->assertRedirect();

    $profileResponse = $this->get(route('profile'));
    $profileResponse->assertOk();
    $profileResponse->assertSee('Magister Manajemen (M.M.)');
    $profileResponse->assertSee('Universitas Indonesia');
    $profileResponse->assertSee('Ketua Fraksi &amp; Anggota Komisi 1', false);
    $profileResponse->assertSee('Ketua Yayasan Pemuda Bogor Maju');
});

it('allows admin to manage testimonials in home page settings', function () {
    $customTestimonials = [
        [
            'name' => 'Bpk. Ahmad Sobari',
            'role' => 'Ketua RT 02 Kedung Jaya',
            'quote' => 'Pelayanan ambulans siaga 24 jam sangat cepat membantu warga yang membutuhkan pertolongan.',
        ],
        [
            'name' => 'Ibu Nurhayati',
            'role' => 'Pelaku UMKM Cibadak',
            'quote' => 'Fasilitasi penerbitan legalitas NIB dan sertifikasi halal gratis sangat bermanfaat untuk usaha kecil kami.',
        ],
    ];

    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'home',
        'data' => [
            'testimonials' => $customTestimonials,
        ],
    ])->assertRedirect();

    $response = $this->get(route('home'));
    $response->assertOk();
    $response->assertSee('Bpk. Ahmad Sobari');
    $response->assertSee('Ketua RT 02 Kedung Jaya');
    $response->assertSee('Pelayanan ambulans siaga 24 jam sangat cepat');
    $response->assertSee('Ibu Nurhayati');
    $response->assertSee('Pelaku UMKM Cibadak');
});

it('allows admin to manage quote of Banu Lesmana Bagaskara in profile settings', function () {
    $customQuote = [
        'text' => 'Bekerja dengan kejujuran dan keberanian untuk kesejahteraan nyata rakyat Kota Bogor.',
        'author' => 'Banu Lesmana Bagaskara, S.M.',
        'role' => 'Fraksi PDI Perjuangan &bull; DPRD Kota Bogor',
    ];

    $this->actingAs($this->admin)->post(route('admin.pengaturan.update'), [
        'group' => 'profile',
        'data' => [
            'quote' => $customQuote,
        ],
    ])->assertRedirect();

    $response = $this->get(route('profile'));
    $response->assertOk();
    $response->assertSee('Bekerja dengan kejujuran dan keberanian untuk kesejahteraan nyata rakyat Kota Bogor.');
    $response->assertSee('Banu Lesmana Bagaskara, S.M.');
    $response->assertSee('Fraksi PDI Perjuangan');
});
