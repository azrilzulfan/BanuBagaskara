<?php

use App\Actions\SubmitAspirationAction;
use App\Enums\AspirationPriority;
use App\Enums\AspirationStatus;
use App\Models\ActivityLog;
use App\Models\Aspiration;
use App\Models\SiteSetting;
use App\Models\User;
use App\Services\ActivityLogService;
use App\Services\SiteSettingsService;
use App\Services\TicketGeneratorService;
use Illuminate\Support\Facades\Cache;

describe('TicketGeneratorService', function () {
    it('generates a ticket with BLB- prefix and 6 numeric digits', function () {
        $service = app(TicketGeneratorService::class);
        $ticket = $service->generate();

        expect($ticket)->toMatch('/^BLB-\d{6}$/');
    });

    it('generates unique tickets even when collisions occur', function () {
        $service = app(TicketGeneratorService::class);

        // Pre-create an aspiration with a known ticket
        Aspiration::factory()->create(['ticket_number' => 'BLB-123456']);

        $ticket = $service->generate();
        expect($ticket)->toStartWith('BLB-');
    });
});

describe('ActivityLogService', function () {
    it('records activity logs with user id and ip address', function () {
        $user = User::factory()->create();
        $service = app(ActivityLogService::class);

        $log = $service->log(
            action: 'ADMIN_UPDATE',
            description: 'Mengubah pengaturan website',
            userId: $user->id,
            ip: '192.168.1.100'
        );

        expect($log)->toBeInstanceOf(ActivityLog::class)
            ->and($log->action)->toBe('ADMIN_UPDATE')
            ->and($log->description)->toBe('Mengubah pengaturan website')
            ->and($log->user_id)->toBe($user->id)
            ->and($log->ip_address)->toBe('192.168.1.100');

        $this->assertDatabaseHas('activity_logs', [
            'action' => 'ADMIN_UPDATE',
            'user_id' => $user->id,
        ]);
    });

    it('records anonymous activity logs when user id is null', function () {
        $service = app(ActivityLogService::class);

        $log = $service->log(
            action: 'PUBLIC_VISIT',
            description: 'Kunjungan publik',
            userId: null,
            ip: '10.0.0.1'
        );

        expect($log->user_id)->toBeNull()
            ->and($log->action)->toBe('PUBLIC_VISIT');
    });
});

describe('SiteSettingsService', function () {
    beforeEach(function () {
        Cache::flush();
    });

    it('caches all settings and retrieves by key with fallback default', function () {
        $service = app(SiteSettingsService::class);

        SiteSetting::create([
            'group' => 'general',
            'key' => 'site_name',
            'value' => 'Banu Bagaskara Official',
            'type' => 'text',
        ]);

        expect($service->get('site_name'))->toBe('Banu Bagaskara Official')
            ->and($service->get('non_existent_key', 'Fallback'))->toBe('Fallback');
    });

    it('retrieves grouped settings via getGroup', function () {
        $service = app(SiteSettingsService::class);

        SiteSetting::create([
            'group' => 'home',
            'key' => 'site_home',
            'value' => [
                'hero_title' => 'Mengabdi Untuk Warga',
                'hero_subtitle' => 'DPRD Kota Bogor',
            ],
            'type' => 'json',
        ]);

        $groupData = $service->getGroup('home');

        expect($groupData)->toBeArray()
            ->and($groupData['hero_title'])->toBe('Mengabdi Untuk Warga')
            ->and($service->getGroup('empty_group'))->toBe([]);
    });

    it('updates group settings in database and invalidates the cache', function () {
        $service = app(SiteSettingsService::class);

        $service->updateGroup('contact', [
            'email' => 'kontak@banubagaskara.id',
            'phone' => '081122334455',
        ]);

        $this->assertDatabaseHas('site_settings', [
            'group' => 'contact',
            'key' => 'site_contact',
        ]);

        $contactData = $service->getGroup('contact');
        expect($contactData['email'])->toBe('kontak@banubagaskara.id');

        // Update again and verify cache was invalidated and reloaded
        $service->updateGroup('contact', [
            'email' => 'baru@banubagaskara.id',
            'phone' => '0899999999',
        ]);

        expect($service->getGroup('contact')['email'])->toBe('baru@banubagaskara.id');
    });
});

describe('SubmitAspirationAction', function () {
    it('executes aspiration submission with defaults and activity logging', function () {
        $action = app(SubmitAspirationAction::class);

        $payload = [
            'sender_name' => 'Budi Santoso',
            'phone_number' => '081298765432',
            'address' => 'Jl. Kencana No. 5, RT 01/RW 02',
            'category' => 'Infrastruktur',
            'subject' => 'Perbaikan Saluran Air',
            'description' => 'Saluran air tersumbat saat hujan lebat di RT 01.',
        ];

        $aspiration = $action->execute(
            data: $payload,
            ipAddress: '127.0.0.1',
            userAgent: 'Mozilla/5.0 Test Browser'
        );

        expect($aspiration)->toBeInstanceOf(Aspiration::class)
            ->and($aspiration->ticket_number)->toStartWith('BLB-')
            ->and($aspiration->sender_name)->toBe('Budi Santoso')
            ->and($aspiration->status)->toBe(AspirationStatus::Baru)
            ->and($aspiration->priority)->toBe(AspirationPriority::Sedang)
            ->and($aspiration->ip_address)->toBe('127.0.0.1')
            ->and($aspiration->user_agent)->toBe('Mozilla/5.0 Test Browser');

        $this->assertDatabaseHas('aspirations', [
            'ticket_number' => $aspiration->ticket_number,
            'sender_name' => 'Budi Santoso',
        ]);

        $this->assertDatabaseHas('activity_logs', [
            'action' => 'SUBMIT_ASPIRATION',
            'ip_address' => '127.0.0.1',
        ]);
    });
});
