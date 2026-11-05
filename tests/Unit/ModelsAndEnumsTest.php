<?php

use App\Enums\AspirationPriority;
use App\Enums\AspirationStatus;
use App\Enums\PublicationStatus;
use App\Enums\TanahSarealKelurahan;
use App\Models\ActivityLog;
use App\Models\Album;
use App\Models\AlbumPhoto;
use App\Models\Aspiration;
use App\Models\AspirationNote;
use App\Models\News;
use App\Models\PerformanceReport;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Carbon;

describe('PerformanceReport Model', function () {
    it('casts attributes properly', function () {
        $report = PerformanceReport::factory()->create([
            'content_blocks' => [['type' => 'paragraph', 'text' => 'Testing']],
            'is_featured' => 1,
            'view_count' => '42',
            'published_at' => '2026-03-01 10:00:00',
        ]);

        expect($report->content_blocks)->toBeArray()
            ->and($report->content_blocks[0]['type'])->toBe('paragraph')
            ->and($report->is_featured)->toBeTrue()
            ->and($report->view_count)->toBe(42)
            ->and($report->published_at)->toBeInstanceOf(Carbon::class);
    });

    it('scopes published and featured queries correctly', function () {
        PerformanceReport::factory()->create(['status' => 'published', 'is_featured' => true]);
        PerformanceReport::factory()->create(['status' => 'published', 'is_featured' => false]);
        PerformanceReport::factory()->create(['status' => 'draft', 'is_featured' => false]);

        expect(PerformanceReport::published()->count())->toBe(2)
            ->and(PerformanceReport::featured()->count())->toBe(1);
    });
});

describe('News Model', function () {
    it('casts attributes properly', function () {
        $news = News::factory()->create([
            'published_at' => '2026-03-01',
            'is_featured' => 0,
            'view_count' => '100',
        ]);

        expect($news->published_at)->toBeInstanceOf(Carbon::class)
            ->and($news->is_featured)->toBeFalse()
            ->and($news->view_count)->toBe(100);
    });

    it('scopes published and featured news correctly', function () {
        News::factory()->create(['status' => 'published', 'is_featured' => true]);
        News::factory()->create(['status' => 'published', 'is_featured' => false]);
        News::factory()->create(['status' => 'draft', 'is_featured' => false]);

        expect(News::published()->count())->toBe(2)
            ->and(News::featured()->count())->toBe(1);
    });

    it('provides source_url fallback logic via accessor', function () {
        $newsWithUrl = new News(['source_url' => 'https://example.com/press', 'source' => 'Radar Bogor']);
        expect($newsWithUrl->source_url)->toBe('https://example.com/press');

        $newsWithOnlySource = new News(['source' => 'https://radar.id/article']);
        expect($newsWithOnlySource->source_url)->toBe('https://radar.id/article');

        $newsWithoutAny = new News([]);
        expect($newsWithoutAny->source_url)->toBeNull();
    });
});

describe('Album and AlbumPhoto Models', function () {
    it('orders album photos by sort_order ascending', function () {
        $album = Album::factory()->create(['event_date' => '2026-02-15']);
        $photo2 = AlbumPhoto::factory()->create(['album_id' => $album->id, 'sort_order' => 2]);
        $photo1 = AlbumPhoto::factory()->create(['album_id' => $album->id, 'sort_order' => 1]);

        expect($album->photos)->toHaveCount(2)
            ->and($album->photos->first()->id)->toBe($photo1->id)
            ->and($album->photos->last()->id)->toBe($photo2->id)
            ->and($album->event_date)->toBeInstanceOf(Carbon::class);
    });

    it('associates photo back to album', function () {
        $album = Album::factory()->create();
        $photo = AlbumPhoto::factory()->create(['album_id' => $album->id]);

        expect($photo->album->id)->toBe($album->id);
    });

    it('scopes published albums', function () {
        Album::factory()->create(['status' => 'published']);
        Album::factory()->create(['status' => 'draft']);

        expect(Album::published()->count())->toBe(1);
    });
});

describe('Aspiration and AspirationNote Models', function () {
    it('casts status and priority to enum instances', function () {
        $aspiration = Aspiration::factory()->create([
            'status' => AspirationStatus::Baru,
            'priority' => AspirationPriority::Sedang,
        ]);

        expect($aspiration->status)->toBe(AspirationStatus::Baru)
            ->and($aspiration->priority)->toBe(AspirationPriority::Sedang);
    });

    it('manages aspiration notes relationship in latest order', function () {
        $aspiration = Aspiration::factory()->create();
        $note1 = AspirationNote::create([
            'aspiration_id' => $aspiration->id,
            'author_name' => 'Staf A',
            'note_text' => 'Catatan pertama',
        ]);
        $note1->created_at = now()->subHour();
        $note1->save();

        $note2 = AspirationNote::create([
            'aspiration_id' => $aspiration->id,
            'author_name' => 'Staf B',
            'note_text' => 'Catatan kedua',
        ]);

        expect($aspiration->notes)->toHaveCount(2)
            ->and($aspiration->notes->first()->note_text)->toBe('Catatan kedua')
            ->and($note1->aspiration->id)->toBe($aspiration->id);
    });

    it('scopes aspirations by status', function () {
        Aspiration::factory()->create(['status' => AspirationStatus::Baru]);
        Aspiration::factory()->create(['status' => AspirationStatus::Selesai]);

        expect(Aspiration::status('Baru')->count())->toBe(1)
            ->and(Aspiration::status('Selesai')->count())->toBe(1);
    });
});

describe('SiteSetting Model', function () {
    it('casts value JSON array properly and scopes by group', function () {
        SiteSetting::create([
            'group' => 'home',
            'key' => 'site_home',
            'type' => 'json',
            'value' => ['hero_title' => 'Judul Beranda'],
        ]);
        SiteSetting::create([
            'group' => 'profile',
            'key' => 'site_profile',
            'type' => 'json',
            'value' => ['biography' => 'Biografi Singkat'],
        ]);

        $homeSetting = SiteSetting::group('home')->first();
        expect($homeSetting)->not->toBeNull()
            ->and($homeSetting->value)->toBeArray()
            ->and($homeSetting->value['hero_title'])->toBe('Judul Beranda');
    });
});

describe('User and ActivityLog Models', function () {
    it('hashes passwords and relates to activity logs', function () {
        $user = User::factory()->create([
            'password' => 'secret12345',
        ]);

        expect(password_verify('secret12345', $user->password))->toBeTrue();

        $log = ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'TEST_LOG',
            'description' => 'Test Deskripsi',
            'ip_address' => '127.0.0.1',
            'created_at' => now(),
        ]);

        expect($user->activityLogs)->toHaveCount(1)
            ->and($log->user->id)->toBe($user->id)
            ->and($log->created_at)->toBeInstanceOf(Carbon::class);
    });
});

describe('System Enums', function () {
    it('validates AspirationStatus enum values and badges', function () {
        expect(AspirationStatus::values())->toBe(['Baru', 'Ditinjau', 'Selesai'])
            ->and(AspirationStatus::Baru->badgeClasses())->toContain('bg-red-50')
            ->and(AspirationStatus::Ditinjau->badgeClasses())->toContain('bg-amber-50')
            ->and(AspirationStatus::Selesai->badgeClasses())->toContain('bg-emerald-50');
    });

    it('validates AspirationPriority enum values', function () {
        expect(AspirationPriority::values())->toBe(['Biasa', 'Sedang', 'Tinggi']);
    });

    it('validates PublicationStatus enum values and Indonesian labels', function () {
        expect(PublicationStatus::values())->toBe(['draft', 'published'])
            ->and(PublicationStatus::Draft->label())->toBe('Draf')
            ->and(PublicationStatus::Published->label())->toBe('Terbit');
    });

    it('validates TanahSarealKelurahan enum covers all 11 kelurahan of Tanah Sareal', function () {
        $kelurahans = TanahSarealKelurahan::values();

        expect($kelurahans)->toHaveCount(11)
            ->and($kelurahans)->toContain('Cibadak')
            ->and($kelurahans)->toContain('Kayumanis')
            ->and($kelurahans)->toContain('Kebonpedes')
            ->and($kelurahans)->toContain('Kedungbadak')
            ->and($kelurahans)->toContain('Kedungjaya')
            ->and($kelurahans)->toContain('Kedungwaringin')
            ->and($kelurahans)->toContain('Kencana')
            ->and($kelurahans)->toContain('Mekarwangi')
            ->and($kelurahans)->toContain('Sukadamai')
            ->and($kelurahans)->toContain('Sukaresmi')
            ->and($kelurahans)->toContain('Tanah Sareal');
    });
});
