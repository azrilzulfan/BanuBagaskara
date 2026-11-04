<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PerformanceReport;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $reports = PerformanceReport::published()->latest('published_at')->get();
        $newsList = News::published()->latest('published_at')->get();

        $content = view('sitemap', compact('reports', 'newsList'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
