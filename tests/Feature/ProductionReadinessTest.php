<?php

use App\Enums\AspirationStatus;
use App\Models\Aspiration;
use App\Models\SiteSetting;
use App\Models\User;
use App\Services\BlockEngineService;
use App\Services\SiteSettingsService;
use Illuminate\Support\Facades\Hash;

describe('Production Security & Secret Admin Path Protection', function () {
    it('does not leak the secret admin login URL on the 403 error page', function () {
        $html = view('errors.403')->render();

        expect($html)
            ->not->toContain(route('admin.login'))
            ->not->toContain('Masuk Dasbor Admin')
            ->toContain(route('home'))
            ->toContain(route('kontak.index'));
    });

    it('escapes XSS payloads in home hero headline even when span tags are present while allowing safe brand span', function () {
        /** @var SiteSettingsService $settings */
        $settings = app(SiteSettingsService::class);
        $settings->updateGroup('home', [
            'hero' => [
                'headline' => 'Bogor <span class="text-[#BC0202]">Lebih</span> Baik <span onmouseover="evil()">Aman</span><script>alert("xss")</script>',
            ],
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $content = $response->getContent();

        expect($content)
            ->toContain('<span class="text-[#BC0202]">Lebih</span>')
            ->not->toContain('<script>alert("xss")</script>')
            ->not->toContain('<span onmouseover="evil()">')
            ->toContain('&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;');
    });

    it('escapes XSS payloads in profile hero title and quote role while rendering bullet entity cleanly', function () {
        /** @var SiteSettingsService $settings */
        $settings = app(SiteSettingsService::class);
        $settings->updateGroup('profile', [
            'hero' => [
                'title' => '<span class="text-[#BC0202]">Banu</span> <span onclick="hack()">Lesmana</span><script>alert(1)</script>',
                'subtitle' => 'Subjudul resmi',
            ],
            'quote' => [
                'text' => 'Komitmen pelayanan publik.',
                'author' => 'Banu Lesmana Bagaskara, S.M.',
                'role' => 'Anggota DPRD &bull; Dapil 4 <script>alert("role-xss")</script>',
            ],
        ]);

        $response = $this->get(route('profile'));

        $response->assertOk();
        $content = $response->getContent();

        expect($content)
            ->toContain('<span class="text-[#BC0202]">Banu</span>')
            ->toContain('Anggota DPRD • Dapil 4')
            ->not->toContain('<script>alert(1)</script>')
            ->not->toContain('<script>alert("role-xss")</script>')
            ->not->toContain('<span onclick="hack()">');
    });

    it('blocks HTML-entity-encoded javascript URIs and handles empty or external URLs safely in BlockEngineService', function () {
        /** @var BlockEngineService $service */
        $service = app(BlockEngineService::class);

        $html = $service->renderToHtml([
            [
                'type' => 'paragraph',
                'format' => 'html',
                'text' => '<a href="&#106;avascript:alert(1)">Klik Berbahaya</a> dan <a href="https://banubagaskara.id">Klik Aman</a>',
            ],
            [
                'type' => 'image',
                'url' => '',
                'caption' => 'Gambar belum diunggah',
            ],
            [
                'type' => 'image',
                'url' => 'https://cdn.example.com/foto-kegiatan.jpg',
                'caption' => 'Foto Eksternal',
            ],
            [
                'type' => 'attachment',
                'title' => 'Dokumen Eksternal',
                'url' => 'https://cdn.example.com/dokumen.pdf',
                'fileType' => 'PDF',
            ],
        ]);

        expect($html)
            ->toContain('href="#"')
            ->toContain('href="https://banubagaskara.id"')
            ->not->toContain('javascript:')
            ->not->toContain('&#106;avascript:')
            ->not->toContain('src="/"')
            ->toContain('src="https://cdn.example.com/foto-kegiatan.jpg"')
            ->toContain('href="https://cdn.example.com/dokumen.pdf"');
    });
});

describe('Production Data Safety & Operational UX', function () {
    it('does not overwrite existing admin password or live site settings when seeders are re-executed', function () {
        $admin = User::factory()->create([
            'email' => 'admin@banubagaskara.id',
            'password' => Hash::make('StrongLiveProductionPass!99'),
        ]);

        SiteSetting::create([
            'group' => 'general',
            'key' => 'site_general',
            'type' => 'json',
            'value' => [
                'siteTitle' => 'Judul Kustom Produksi Aktif',
                'site_status' => 'online',
            ],
        ]);

        $this->artisan('db:seed', ['--force' => true])->assertSuccessful();

        expect(Hash::check('StrongLiveProductionPass!99', $admin->fresh()->password))->toBeTrue();

        $general = SiteSetting::where('key', 'site_general')->firstOrFail()->value;
        expect($general['siteTitle'])->toBe('Judul Kustom Produksi Aktif');

        $seo = SiteSetting::where('key', 'site_seo')->firstOrFail()->value;
        expect($seo['googleSearchConsoleTag'])->toBe('');
    });

    it('automatically marks unread aspirations as Ditinjau and clears sidebar unread badge when inbox is opened', function () {
        $admin = User::factory()->create();

        $unread = Aspiration::factory()->create([
            'status' => AspirationStatus::Baru,
            'subject' => 'Perbaikan Drainase Lingkungan',
        ]);

        $dashboardBefore = $this->actingAs($admin)->get(route('admin.dashboard'));
        $dashboardBefore->assertOk()->assertSeeText('1 Baru');

        $inboxResponse = $this->actingAs($admin)->get(route('admin.aspirasi.index'));
        $inboxResponse->assertOk()->assertSee('Perbaikan Drainase Lingkungan');

        expect($unread->fresh()->status)->toBe(AspirationStatus::Ditinjau);

        $dashboardAfter = $this->actingAs($admin)->get(route('admin.dashboard'));
        $dashboardAfter->assertOk()->assertSeeText('Semua Terbaca');
    });

    it('uses Asia/Jakarta timezone and Indonesian locale by default', function () {
        expect(config('app.timezone'))->toBe('Asia/Jakarta')
            ->and(config('app.locale'))->toBe('id');
    });
});
