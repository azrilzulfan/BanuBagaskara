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
            ->select(['id', 'title', 'slug', 'published_at', 'description', 'cover_image', 'source', 'source_url', 'is_featured', 'view_count'])
            ->latest('published_at')
            ->first();

        $newsQuery = News::published()
            ->select(['id', 'title', 'slug', 'published_at', 'description', 'cover_image', 'source', 'source_url', 'is_featured', 'view_count'])
            ->latest('published_at');

        if ($featuredNews) {
            $newsQuery->where('id', '!=', $featuredNews->id);
        }

        $newsList = $newsQuery->paginate(9);

        return view('public.berita.index', compact('featuredNews', 'newsList'));
    }

    public function show(string $slug): View|RedirectResponse
    {
        $news = News::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $news->timestamps = false;
        $news->incrementQuietly('view_count');

        $targetUrl = $news->source_url ?: $news->source;

        if ($targetUrl && filter_var($targetUrl, FILTER_VALIDATE_URL)) {
            $scheme = parse_url($targetUrl, PHP_URL_SCHEME);
            if (in_array(strtolower((string) $scheme), ['http', 'https'], true)) {
                return redirect()->away($targetUrl);
            }
        }

        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.berita.show', compact('news', 'relatedNews'));
    }
}
