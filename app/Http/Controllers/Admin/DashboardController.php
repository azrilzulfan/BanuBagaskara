<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Album;
use App\Models\Aspiration;
use App\Models\News;
use App\Models\PerformanceReport;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $metrics = [
            'totalAspirations' => Aspiration::count(),
            'newAspirations' => Aspiration::where('status', 'Baru')->count(),
            'totalReports' => PerformanceReport::count(),
            'publishedReports' => PerformanceReport::published()->count(),
            'totalNews' => News::count(),
            'totalAlbums' => Album::count(),
        ];

        $recentAspirations = Aspiration::latest()->take(5)->get();
        $recentActivities = ActivityLog::latest('created_at')->take(5)->get();
        $recentReports = PerformanceReport::latest('updated_at')->take(3)->get();
        $recentNews = News::latest('updated_at')->take(3)->get();

        return view('admin.dashboard', compact('metrics', 'recentAspirations', 'recentActivities', 'recentReports', 'recentNews'));
    }
}
