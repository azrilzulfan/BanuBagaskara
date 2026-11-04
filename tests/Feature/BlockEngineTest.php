<?php

use App\Services\BlockEngineService;

it('renders empty string when blocks is null or empty', function () {
    $service = app(BlockEngineService::class);

    expect($service->renderToHtml(null))->toBe('')
        ->and($service->renderToHtml([]))->toBe('');
});

it('renders heading blocks with h2 and h3 levels correctly', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        ['type' => 'heading', 'level' => 'h2', 'text' => 'Judul Subbab Utama'],
        ['type' => 'heading', 'level' => 'h3', 'text' => 'Sub Judul Tingkat Tiga'],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)
        ->toContain('<h2 class="text-xl sm:text-2xl font-bold text-zinc-950 mt-10 mb-4 tracking-tight">Judul Subbab Utama</h2>')
        ->toContain('<h3 class="text-lg sm:text-xl font-bold text-zinc-950 mt-8 mb-3.5 tracking-tight">Sub Judul Tingkat Tiga</h3>');
});

it('renders paragraph blocks with nl2br formatting', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        ['type' => 'paragraph', 'text' => "Baris pertama.\nBaris kedua."],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)->toContain('Baris pertama.<br />'."\n".'Baris kedua.');
});

it('renders image blocks with caption and normalized relative paths', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        ['type' => 'image', 'url' => '../assets/banu/program_ambulance.jpg', 'caption' => 'Ambulance Siaga 24 Jam'],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)
        ->toContain('src="/assets/banu/program_ambulance.jpg"')
        ->toContain('alt="Ambulance Siaga 24 Jam"')
        ->toContain('Ambulance Siaga 24 Jam');
});

it('renders list blocks with checkmark bullets', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        ['type' => 'list', 'items' => ['Poin 1: Peninjauan Lokasi', 'Poin 2: Pengawalan Anggaran']],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)
        ->toContain('Poin 1: Peninjauan Lokasi')
        ->toContain('Poin 2: Pengawalan Anggaran')
        ->toContain('&check;');
});

it('renders two-column grid blocks', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        [
            'type' => 'grid',
            'col1Title' => 'Sebelum Intervensi',
            'col1Text' => 'Kondisi drainase tersumbat',
            'col2Title' => 'Sesudah Intervensi',
            'col2Text' => 'Aliran air lancar dan normal',
        ],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)
        ->toContain('Sebelum Intervensi')
        ->toContain('Kondisi drainase tersumbat')
        ->toContain('Sesudah Intervensi')
        ->toContain('Aliran air lancar dan normal');
});

it('renders quote blocks with author attribution', function () {
    $service = app(BlockEngineService::class);

    $blocks = [
        [
            'type' => 'quote',
            'quote' => 'Transparansi adalah kunci kepercayaan publik.',
            'author' => 'Banu Bagaskara',
        ],
    ];

    $html = $service->renderToHtml($blocks);

    expect($html)
        ->toContain('“Transparansi adalah kunci kepercayaan publik.”')
        ->toContain('— Banu Bagaskara');
});

it('sanitizes malicious script tags and XSS injections across blocks', function () {
    $service = app(BlockEngineService::class);

    $maliciousBlocks = [
        ['type' => 'heading', 'level' => 'h2', 'text' => '<script>alert("Hacked Heading")</script>'],
        ['type' => 'paragraph', 'text' => '<img src=x onerror=alert("XSS")>'],
        ['type' => 'quote', 'quote' => '<b onmouseover=evil()>Kutipan</b>', 'author' => '<script>steal()</script>'],
    ];

    $html = $service->renderToHtml($maliciousBlocks);

    expect($html)
        ->not->toContain('<script>')
        ->not->toContain('<img src=x')
        ->toContain('&lt;script&gt;alert(&quot;Hacked Heading&quot;)&lt;/script&gt;')
        ->toContain('&lt;img src=x onerror=alert(&quot;XSS&quot;)&gt;');
});
