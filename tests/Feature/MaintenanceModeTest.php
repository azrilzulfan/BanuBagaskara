<?php

use App\Models\User;
use App\Services\SiteSettingsService;

beforeEach(function () {
    $this->admin = User::factory()->create([
        'email' => 'admin@banubagaskara.id',
    ]);
});

it('allows public access when site status is online', function () {
    $settingsService = app(SiteSettingsService::class);
    $settingsService->updateGroup('general', [
        'site_status' => 'online',
    ]);

    $this->get(route('home'))->assertOk();
    $this->get(route('profile'))->assertOk();
    $this->get(route('kontak.index'))->assertOk();
});

it('returns 503 service unavailable on public routes when maintenance mode is active', function () {
    $settingsService = app(SiteSettingsService::class);
    $settingsService->updateGroup('general', [
        'site_status' => 'maintenance',
        'maintenance_message' => 'Sistem sedang dalam peningkatan performa berkala.',
    ]);

    $response = $this->get(route('home'));
    $response->assertStatus(503);
    $response->assertSee('Situs Dalam Pemeliharaan');
    $response->assertSee('Sistem sedang dalam peningkatan performa berkala.');

    $this->get(route('profile'))->assertStatus(503);
    $this->get(route('kinerja.index'))->assertStatus(503);
    $this->get(route('berita.index'))->assertStatus(503);
    $this->get(route('galeri.index'))->assertStatus(503);
    $this->get(route('kontak.index'))->assertStatus(503);
});

it('allows access to admin login even when maintenance mode is active', function () {
    $settingsService = app(SiteSettingsService::class);
    $settingsService->updateGroup('general', [
        'site_status' => 'maintenance',
    ]);

    $this->get(route('admin.login'))->assertOk();
});

it('allows authenticated admin to bypass maintenance mode on public and admin routes', function () {
    $settingsService = app(SiteSettingsService::class);
    $settingsService->updateGroup('general', [
        'site_status' => 'maintenance',
    ]);

    $this->actingAs($this->admin)
        ->get(route('admin.dashboard'))
        ->assertOk();

    $this->actingAs($this->admin)
        ->get(route('home'))
        ->assertOk();

    $this->actingAs($this->admin)
        ->get(route('kontak.index'))
        ->assertOk();
});

it('allows admin to toggle maintenance mode via setting controller', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.pengaturan.update'), [
            'group' => 'general',
            'data' => [
                'siteTitle' => 'Banu Bagaskara',
                'site_status' => 'maintenance',
                'maintenance_message' => 'Peningkatan database.',
            ],
        ])
        ->assertSessionHas('success');

    // Log out so subsequent request is as a guest
    auth()->logout();

    // Guest should now be blocked
    $this->get(route('home'))
        ->assertStatus(503)
        ->assertSee('Peningkatan database.');

    // Toggle back to online as admin
    $this->actingAs($this->admin)
        ->post(route('admin.pengaturan.update'), [
            'group' => 'general',
            'data' => [
                'siteTitle' => 'Banu Bagaskara',
                'site_status' => 'online',
            ],
        ])
        ->assertSessionHas('success');

    auth()->logout();

    // Guest can now access
    $this->get(route('home'))->assertOk();
});

it('renders custom error 404 page correctly', function () {
    $response = $this->get('/halaman-yang-tidak-pernah-ada-12345');
    $response->assertStatus(404);
    $response->assertSee('Halaman Tidak Ditemukan');
    $response->assertSee('Error 404');
    $response->assertSee('Kembali ke Beranda');
});
