<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PerformanceReport;
use App\Services\SiteSettingsService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        public SiteSettingsService $settingsService,
    ) {}

    public function index(): View
    {
        $homeSettings = $this->settingsService->getGroup('home');
        $generalSettings = $this->settingsService->getGroup('general');

        $reports = PerformanceReport::published()
            ->select(['id', 'title', 'slug', 'excerpt', 'cover_image', 'published_at', 'created_at'])
            ->latest('published_at')
            ->take(4)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'type' => 'kinerja',
                    'badge' => 'Hasil Kinerja',
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'excerpt' => $item->excerpt,
                    'published_at' => $item->published_at ?? $item->created_at,
                    'date' => $item->published_at ? $item->published_at->translatedFormat('d F Y') : ($item->created_at ? $item->created_at->translatedFormat('d F Y') : ''),
                    'url' => route('kinerja.show', $item->slug),
                    'image' => $item->cover_image,
                    'btnText' => 'Baca Selengkapnya',
                    'isExternal' => false,
                ];
            });

        $news = News::published()
            ->select(['id', 'title', 'slug', 'description', 'cover_image', 'source_url', 'source', 'published_at', 'created_at'])
            ->latest('published_at')
            ->take(4)
            ->get()
            ->map(function ($item) {
                $sourceUrl = $item->source_url ?: $item->source;

                return (object) [
                    'type' => 'berita',
                    'badge' => 'Berita Terkini',
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'excerpt' => $item->description,
                    'published_at' => $item->published_at ?? $item->created_at,
                    'date' => $item->published_at ? $item->published_at->translatedFormat('d F Y') : ($item->created_at ? $item->created_at->translatedFormat('d F Y') : ''),
                    'url' => $sourceUrl ?: route('berita.index'),
                    'image' => $item->cover_image,
                    'btnText' => $sourceUrl ? 'Baca di Sumber Asli' : 'Baca Selengkapnya',
                    'isExternal' => ! empty($sourceUrl),
                ];
            });

        $latestArticles = $reports->concat($news)
            ->sortByDesc('published_at')
            ->take(4)
            ->values();

        return view('public.home', compact('homeSettings', 'generalSettings', 'latestArticles'));
    }
}
