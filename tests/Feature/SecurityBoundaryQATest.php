<?php

use App\Models\Aspiration;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->admin = User::factory()->create([
        'email' => 'admin@banubagaskara.id',
        'password' => Hash::make('ValidAdminPassword123!'),
    ]);
});

describe('Guest Admin Route Protection Matrix', function () {
    $routes = [
        ['GET', '/admin'],
        ['GET', '/admin/kinerja'],
        ['POST', '/admin/kinerja'],
        ['PUT', '/admin/kinerja/1'],
        ['DELETE', '/admin/kinerja/1'],
        ['PATCH', '/admin/kinerja/1/toggle-featured'],
        ['PATCH', '/admin/kinerja/1/toggle-status'],
        ['GET', '/admin/berita'],
        ['POST', '/admin/berita'],
        ['PUT', '/admin/berita/1'],
        ['DELETE', '/admin/berita/1'],
        ['PATCH', '/admin/berita/1/toggle-featured'],
        ['PATCH', '/admin/berita/1/toggle-status'],
        ['GET', '/admin/galeri'],
        ['POST', '/admin/galeri'],
        ['PUT', '/admin/galeri/1'],
        ['DELETE', '/admin/galeri/1'],
        ['PATCH', '/admin/galeri/1/toggle-status'],
        ['GET', '/admin/aspirasi'],
        ['GET', '/admin/aspirasi/export'],
        ['PATCH', '/admin/aspirasi/1/status'],
        ['POST', '/admin/aspirasi/1/notes'],
        ['DELETE', '/admin/aspirasi/1'],
        ['POST', '/admin/aspirasi/bulk-delete'],
        ['GET', '/admin/pengaturan'],
        ['POST', '/admin/pengaturan'],
        ['POST', '/admin/upload'],
        ['PUT', '/admin/password'],
    ];

    foreach ($routes as [$method, $uri]) {
        it("strictly redirects unauthenticated {$method} {$uri} to admin login", function () use ($method, $uri) {
            $response = $this->call($method, $uri);
            $response->assertRedirect(route('admin.login'));
        });
    }

    it('returns 404 for any register attempt enforcing single admin architecture', function () {
        $this->get('/register')->assertNotFound();
        $this->post('/register')->assertNotFound();
    });
});

describe('Admin Password Management Security', function () {
    it('rejects password update when current password is wrong', function () {
        $response = $this->actingAs($this->admin)->put(route('admin.password.update'), [
            'current_password' => 'WrongPassword!',
            'password' => 'NewSecurePassword123!',
            'password_confirmation' => 'NewSecurePassword123!',
        ]);

        $response->assertSessionHasErrors('current_password');
        expect(Hash::check('ValidAdminPassword123!', $this->admin->fresh()->password))->toBeTrue();
    });

    it('rejects password update when new password is under 8 characters', function () {
        $response = $this->actingAs($this->admin)->put(route('admin.password.update'), [
            'current_password' => 'ValidAdminPassword123!',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors('password');
    });

    it('rejects password update when confirmation does not match', function () {
        $response = $this->actingAs($this->admin)->put(route('admin.password.update'), [
            'current_password' => 'ValidAdminPassword123!',
            'password' => 'NewSecurePassword123!',
            'password_confirmation' => 'DifferentPassword123!',
        ]);

        $response->assertSessionHasErrors('password');
    });

    it('successfully updates password and logs activity when input is valid', function () {
        $response = $this->actingAs($this->admin)->put(route('admin.password.update'), [
            'current_password' => 'ValidAdminPassword123!',
            'password' => 'BrandNewPassword999!',
            'password_confirmation' => 'BrandNewPassword999!',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        expect(Hash::check('BrandNewPassword999!', $this->admin->fresh()->password))->toBeTrue();

        $this->assertDatabaseHas('activity_logs', [
            'action' => 'PASSWORD_CHANGE',
            'user_id' => $this->admin->id,
        ]);
    });
});

describe('Admin Upload Security Boundary', function () {
    beforeEach(function () {
        Storage::fake('public');
    });

    it('rejects unauthenticated upload requests', function () {
        $file = UploadedFile::fake()->image('test.png');
        $this->postJson(route('admin.upload'), ['file' => $file])
            ->assertUnauthorized();
    });

    it('rejects dangerous executable files', function () {
        $dangerousFile = UploadedFile::fake()->create('malicious.php', 100, 'application/x-php');

        $response = $this->actingAs($this->admin)->postJson(route('admin.upload'), [
            'file' => $dangerousFile,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('file');
    });

    it('rejects SVG files containing script or XXE injection', function () {
        $maliciousSvg = '<svg xmlns="http://www.w3.org/2000/svg"><script>alert("XSS")</script></svg>';
        $file = UploadedFile::fake()->createWithContent('exploit.svg', $maliciousSvg);

        $response = $this->actingAs($this->admin)->postJson(route('admin.upload'), [
            'file' => $file,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('file');
    });

    it('accepts valid image upload and returns relative storage path', function () {
        $image = UploadedFile::fake()->image('banner.jpg', 800, 600);

        $response = $this->actingAs($this->admin)->postJson(route('admin.upload'), [
            'file' => $image,
        ]);

        $response->assertOk()
            ->assertJsonStructure(['success', 'message', 'path']);

        $path = str_replace('storage/', '', $response->json('path'));
        Storage::disk('public')->assertExists($path);
    });
});

describe('Aspirations Export QA', function () {
    it('streams CSV export with UTF-8 BOM and headers for Excel compatibility', function () {
        Aspiration::factory()->create([
            'ticket_number' => 'BLB-998877',
            'sender_name' => 'Warga Tanah Sareal',
            'phone_number' => '081234567890',
            'address' => 'Jl. Dadali No. 1',
            'subject' => 'Drainase Mampet',
            'description' => 'Mohon bantuan pembersihan gorong-gorong.',
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.aspirasi.export'));

        $response->assertOk();
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');

        $content = $response->streamedContent();

        // Verify UTF-8 BOM
        $expectedBom = chr(0xEF).chr(0xBB).chr(0xBF);
        expect(str_starts_with($content, $expectedBom))->toBeTrue();

        // Verify CSV header columns
        expect($content)->toContain('No Tiket')
            ->and($content)->toContain('Nama Pengirim')
            ->and($content)->toContain('BLB-998877')
            ->and($content)->toContain('Warga Tanah Sareal')
            ->and($content)->toContain('Drainase Mampet');
    });
});

describe('Local News Detail Fallback QA', function () {
    it('renders public detail page when news has no external source_url and increments view_count quietly', function () {
        $originalUpdatedAt = now()->subDays(5)->startOfSecond();

        $news = News::factory()->create([
            'title' => 'Rilis Pers Lokal Internal',
            'slug' => 'rilis-pers-lokal-internal',
            'source_url' => null,
            'source' => null,
            'status' => 'published',
            'view_count' => 5,
            'updated_at' => $originalUpdatedAt,
        ]);

        $response = $this->get(route('berita.show', $news->slug));

        $response->assertOk();
        $response->assertSee('Rilis Pers Lokal Internal');

        $fresh = $news->fresh();
        expect($fresh->view_count)->toBe(6)
            ->and($fresh->updated_at->timestamp)->toBe($originalUpdatedAt->timestamp);
    });
});
