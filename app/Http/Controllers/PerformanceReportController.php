<?php

namespace App\Http\Controllers;

use App\Models\PerformanceReport;
use App\Services\BlockEngineService;
use Illuminate\View\View;

class PerformanceReportController extends Controller
{
    public function __construct(
        public BlockEngineService $blockEngine,
    ) {}

    public function index(): View
    {
        $featuredReport = PerformanceReport::published()
            ->featured()
            ->select(['id', 'title', 'slug', 'excerpt', 'cover_image', 'published_at', 'created_at', 'is_featured', 'view_count'])
            ->latest('published_at')
            ->first();

        $reportsQuery = PerformanceReport::published()
            ->select(['id', 'title', 'slug', 'excerpt', 'cover_image', 'published_at', 'created_at', 'is_featured', 'view_count'])
            ->latest('published_at');

        if ($featuredReport) {
            $reportsQuery->where('id', '!=', $featuredReport->id);
        }

        $reports = $reportsQuery->paginate(9);

        return view('public.kinerja.index', compact('featuredReport', 'reports'));
    }

    public function show(string $slug): View
    {
        $report = PerformanceReport::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $report->timestamps = false;
        $report->incrementQuietly('view_count');

        $renderedContent = $this->blockEngine->renderToHtml($report->content_blocks);

        $relatedReports = PerformanceReport::published()
            ->select(['id', 'title', 'slug', 'excerpt', 'cover_image', 'published_at', 'created_at'])
            ->where('id', '!=', $report->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.kinerja.show', compact('report', 'renderedContent', 'relatedReports'));
    }
}
