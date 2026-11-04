<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerformanceReport;
use App\Services\ActivityLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PerformanceReportController extends Controller
{
    public function __construct(
        public ActivityLogService $activityLog,
    ) {}

    public function index(Request $request): View
    {
        $articles = PerformanceReport::latest('created_at')->get()->map(function ($report) {
            return [
                'id' => $report->id,
                'title' => $report->title,
                'slug' => $report->slug,
                'date' => $report->published_at ? $report->published_at->format('Y-m-d') : '',
                'dateFormatted' => $report->published_at ? $report->published_at->translatedFormat('d F Y') : '-',
                'coverImage' => $report->cover_image,
                'excerpt' => $report->excerpt,
                'isFeatured' => (bool) $report->is_featured,
                'status' => $report->status === 'published' ? 'Terbit' : 'Draf',
                'blocks' => $report->content_blocks ?? [],
            ];
        });

        return view('admin.kinerja', compact('articles'));
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'coverImage' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'isFeatured' => ['nullable', 'boolean'],
            'status' => ['nullable', 'string'],
            'blocks' => ['nullable', 'array'],
        ]);

        $status = ($validated['status'] ?? 'Terbit') === 'Terbit' ? 'published' : 'draft';

        $report = PerformanceReport::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']).'-'.time(),
            'published_at' => $validated['date'] ?? now(),
            'cover_image' => $validated['coverImage'] ?? 'assets/banu/program_ambulance.jpg',
            'excerpt' => $validated['excerpt'] ?? Str::limit(collect($validated['blocks'] ?? [])->firstWhere('type', 'paragraph')['text'] ?? '', 160),
            'is_featured' => (bool) ($validated['isFeatured'] ?? false),
            'status' => $status,
            'content_blocks' => $validated['blocks'] ?? [],
        ]);

        $this->activityLog->log(
            action: 'CREATE_REPORT',
            description: "Membuat laporan kinerja baru: {$report->title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Laporan kinerja berhasil disimpan.',
                'report' => $report,
            ]);
        }

        return redirect()->route('admin.kinerja.index')->with('success', 'Laporan kinerja berhasil disimpan.');
    }

    public function update(Request $request, PerformanceReport $report): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'coverImage' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'isFeatured' => ['nullable', 'boolean'],
            'status' => ['nullable', 'string'],
            'blocks' => ['nullable', 'array'],
        ]);

        $status = ($validated['status'] ?? 'Terbit') === 'Terbit' ? 'published' : 'draft';

        $report->update([
            'title' => $validated['title'],
            'published_at' => $validated['date'] ?? $report->published_at,
            'cover_image' => $validated['coverImage'] ?? $report->cover_image,
            'excerpt' => $validated['excerpt'] ?? $report->excerpt,
            'is_featured' => (bool) ($validated['isFeatured'] ?? false),
            'status' => $status,
            'content_blocks' => $validated['blocks'] ?? $report->content_blocks,
        ]);

        $this->activityLog->log(
            action: 'UPDATE_REPORT',
            description: "Memperbarui laporan kinerja: {$report->title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Laporan kinerja berhasil diperbarui.',
                'report' => $report,
            ]);
        }

        return redirect()->route('admin.kinerja.index')->with('success', 'Laporan kinerja berhasil diperbarui.');
    }

    public function destroy(Request $request, PerformanceReport $report): JsonResponse|RedirectResponse
    {
        $title = $report->title;
        $report->delete();

        $this->activityLog->log(
            action: 'DELETE_REPORT',
            description: "Menghapus laporan kinerja: {$title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Laporan kinerja berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.kinerja.index')->with('success', 'Laporan kinerja berhasil dihapus.');
    }

    public function toggleFeatured(Request $request, PerformanceReport $report): JsonResponse
    {
        $report->is_featured = ! $report->is_featured;
        $report->save();

        return response()->json(['success' => true, 'is_featured' => $report->is_featured]);
    }

    public function toggleStatus(Request $request, PerformanceReport $report): JsonResponse
    {
        $report->status = $report->status === 'published' ? 'draft' : 'published';
        $report->save();

        return response()->json(['success' => true, 'status' => $report->status]);
    }
}
