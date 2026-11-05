<?php

use App\Models\Aspiration;

it('creates an aspiration record and redirects with ticket number for valid payload', function () {
    $payload = [
        'sender_name' => 'Ahmad Fauzi',
        'phone_number' => '081234567890',
        'address' => 'Jl. Kebon Pedes No. 12, RT 02/RW 03',
        'category' => 'Infrastruktur',
        'subject' => 'Perbaikan Lampu PJU Gang Melati',
        'description' => 'Mohon bantuan perbaikan lampu penerangan jalan umum di gang melati yang sudah mati selama 2 minggu.',
    ];

    $response = $this->post(route('aspirasi.store'), $payload);

    $response->assertRedirect(route('kontak.index', '#aspirasi'));
    $response->assertSessionHas('ticket_number');

    $this->assertDatabaseHas('aspirations', [
        'sender_name' => 'Ahmad Fauzi',
        'phone_number' => '081234567890',
        'subject' => 'Perbaikan Lampu PJU Gang Melati',
    ]);

    $aspiration = Aspiration::first();
    expect($aspiration->ticket_number)->toStartWith('BLB-');
});

it('requires sender_name, phone_number, address, subject, and description', function () {
    $response = $this->post(route('aspirasi.store'), []);

    $response->assertSessionHasErrors([
        'sender_name',
        'phone_number',
        'address',
        'subject',
        'description',
    ]);

    expect(Aspiration::count())->toBe(0);
});

it('validates phone_number must follow Indonesian cellular format', function () {
    $invalidPayload = [
        'sender_name' => 'Ahmad Fauzi',
        'phone_number' => '021123456', // telephone, not cellular 08...
        'address' => 'Jl. Kebon Pedes No. 12',
        'subject' => 'Perbaikan Lampu PJU',
        'description' => 'Mohon bantuan perbaikan jalan umum.',
    ];

    $response = $this->post(route('aspirasi.store'), $invalidPayload);

    $response->assertSessionHasErrors(['phone_number']);
    expect(Aspiration::count())->toBe(0);
});

it('does not require kelurahan field when submitting aspiration', function () {
    $payload = [
        'sender_name' => 'Ahmad Fauzi',
        'phone_number' => '081234567890',
        'address' => 'Jl. Pajajaran No. 12',
        'subject' => 'Perbaikan Lampu PJU',
        'description' => 'Mohon bantuan perbaikan jalan umum.',
    ];

    $response = $this->post(route('aspirasi.store'), $payload);

    $response->assertRedirect(route('kontak.index', '#aspirasi'));
    $this->assertDatabaseHas('aspirations', [
        'sender_name' => 'Ahmad Fauzi',
    ]);
});

it('silently ignores spam bots when honeypot field is filled without saving to database', function () {
    $botPayload = [
        'sender_name' => 'Spam Bot',
        'phone_number' => '081299998888',
        'address' => 'Jl. Cyber Bot No. 1',
        'subject' => 'Buy Crypto Now',
        'description' => 'Great deals on crypto currencies visit our website now.',
        'website_hp' => 'http://malicious-spam-url.com', // Honeypot filled!
    ];

    $response = $this->post(route('aspirasi.store'), $botPayload);

    $response->assertRedirect(route('kontak.index'));
    $response->assertSessionHas('ticket_number');

    expect(Aspiration::count())->toBe(0);
});

it('rate limits submissions to prevent flooding', function () {
    $payload = [
        'sender_name' => 'Warga Peduli',
        'phone_number' => '081234567890',
        'address' => 'Jl. Sukaresmi No. 4',
        'subject' => 'Aspirasi Warga',
        'description' => 'Usulan pembangunan pos ronda warga.',
    ];

    // Submit 3 times successfully
    for ($i = 0; $i < 3; $i++) {
        $res = $this->post(route('aspirasi.store'), $payload);
        $res->assertRedirect();
    }

    // 4th time should trigger 429 Too Many Requests
    $response = $this->post(route('aspirasi.store'), $payload);
    $response->assertStatus(429);
});
