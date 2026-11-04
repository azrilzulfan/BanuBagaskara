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

        $recentAspirations = Aspiration::latest()->take(5)->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'ticket' => $item->ticket_number,
                'date' => $item->created_at ? $item->created_at->translatedFormat('d F Y') : '-',
                'sender' => $item->sender_name,
                'phone' => $item->phone_number,
                'address' => $item->address,
                'kelurahan' => $item->kelurahan,
                'subject' => $item->subject,
                'description' => $item->description,
                'status' => is_object($item->status) ? $item->status->value : (string) $item->status,
            ];
        });

        $latestReports = PerformanceReport::latest('created_at')->take(3)->get();
        $latestNews = News::latest('published_at')->take(3)->get();
        $recentActivities = ActivityLog::latest('created_at')->take(5)->get();

        return view('admin.dashboard', compact('metrics', 'recentAspirations', 'recentActivities', 'latestReports', 'latestNews'));
    }
}
