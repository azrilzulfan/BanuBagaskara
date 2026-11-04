<?php

namespace App\Http\Controllers;

use App\Models\News;
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

        $newsList = $newsQuery->paginate(6);

        return view('public.berita.index', compact('featuredNews', 'newsList'));
    }

    public function show(string $slug): View
    {
        $news = News::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $news->increment('view_count');

        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.berita.show', compact('news', 'relatedNews'));
    }
}
