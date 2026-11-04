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
    ) {
    }

    public function index(): View
    {
        $homeSettings = $this->settingsService->getGroup('home');
        $generalSettings = $this->settingsService->getGroup('general');

        $featuredReports = PerformanceReport::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestNews = News::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.home', compact('homeSettings', 'generalSettings', 'featuredReports', 'latestNews'));
    }
}
