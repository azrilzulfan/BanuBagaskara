<?php

use App\Models\PerformanceReport;
use App\Models\User;
use App\Services\BlockEngineService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

it('includes enhanced security headers on responses', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->assertHeader('X-Permitted-Cross-Domain-Policies', 'none');
});

it('sanitizes dangerous schemes and style attributes in BlockEngine', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        [
            'type' => 'paragraph',
            'format' => 'html',
            'text' => 'Aman <a href="javascript:alert(1)">Link Bahaya</a> dan <a href="vbscript:msgbox(1)">VBS</a> dan <span style="background:url(javascript:alert(2))">CSS Hijack</span>',
        ],
        [
            'type' => 'attachment',
            'title' => 'Berkas Uji',
            'url' => 'javascript:alert(3)',
            'fileType' => 'PDF',
            'fileSize' => '1 MB',
        ],
        [
            'type' => 'image',
            'url' => 'javascript:alert(4)',
            'caption' => 'Gambar Uji',
        ],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)
        ->not->toContain('javascript:alert')
        ->not->toContain('vbscript:msgbox')
        ->not->toContain('style="background:')
        ->toContain('href="#"');
});

it('rejects malicious SVG file uploads containing scripts', function () {
    Storage::fake('public');

    $admin = User::create([
        'name' => 'Banu Admin',
        'email' => 'admin@banubagaskara.id',
        'password' => bcrypt('AdminPassword123!'),
    ]);

    $maliciousSvg = '<svg xmlns="http://www.w3.org/2000/svg"><script>alert("XSS")</script></svg>';
    $file = UploadedFile::fake()->createWithContent('badge.svg', $maliciousSvg);

    $response = $this->actingAs($admin)
        ->postJson(route('admin.upload'), [
            'file' => $file,
        ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['file']);
});

it('allows clean SVG file uploads without scripts', function () {
    Storage::fake('public');

    $admin = User::create([
        'name' => 'Banu Admin',
        'email' => 'admin@banubagaskara.id',
        'password' => bcrypt('AdminPassword123!'),
    ]);

    $cleanSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" /></svg>';
    $file = UploadedFile::fake()->createWithContent('clean_icon.svg', $cleanSvg);

    $response = $this->actingAs($admin)
        ->postJson(route('admin.upload'), [
            'file' => $file,
        ]);

    $response->assertOk();
    $response->assertJson(['success' => true]);
});

it('increments view count quietly without changing updated_at', function () {
    Carbon::setTestNow('2026-03-01 10:00:00');

    $report = PerformanceReport::factory()->create([
        'status' => 'published',
        'view_count' => 5,
        'published_at' => now(),
    ]);

    $originalUpdatedAt = $report->fresh()->updated_at;

    // Fast-forward 10 days
    Carbon::setTestNow('2026-03-11 15:30:00');

    $this->get(route('kinerja.show', $report->slug))->assertOk();

    $refreshed = $report->fresh();
    expect($refreshed->view_count)->toBe(6)
        ->and($refreshed->updated_at->toDateTimeString())->toBe($originalUpdatedAt->toDateTimeString());

    Carbon::setTestNow();
});

it('renders accessibility skip to content link and correct landmarks on public layout', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Lewati ke konten utama');
    $response->assertSee('id="main-content"', false);
    $response->assertSee('<main id="main-content"', false);
    $response->assertSee('aria-label="Navigasi Cepat Sticky"', false);
});

it('renders proper canonical url for subpages rather than home fallback', function () {
    $response = $this->get(route('profile'));

    $response->assertOk();
    $response->assertSee('<link rel="canonical" href="'.route('profile').'" />', false);
});

it('renders schema.org structured data on contact and profile pages', function () {
    $contactResponse = $this->get(route('kontak.index'));
    $contactResponse->assertOk();
    $contactResponse->assertSee('"@type": "GovernmentService"', false);

    $profileResponse = $this->get(route('profile'));
    $profileResponse->assertOk();
    $profileResponse->assertSee('"@type": "Person"', false);
});
