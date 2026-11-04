<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $featuredNews = News::published()
            ->featured()
            ->latest('published_at')
            ->first();

        $newsQuery = News::published()->latest('published_at');

        if ($featuredNews) {
            $newsQuery->where('id', '!=', $featuredNews->id);
        }

        $newsList = $newsQuery->paginate(9);

        return view('public.berita.index', compact('featuredNews', 'newsList'));
    }

    public function show(string $slug): RedirectResponse
    {
        $news = News::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $news->increment('view_count');

        $targetUrl = $news->source_url ?: $news->source;

        if ($targetUrl && filter_var($targetUrl, FILTER_VALIDATE_URL)) {
            return redirect()->away($targetUrl);
        }

        return redirect()->route('berita.index');
    }
}
