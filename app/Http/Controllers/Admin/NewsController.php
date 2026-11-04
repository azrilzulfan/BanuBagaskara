<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\ActivityLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function __construct(
        public ActivityLogService $activityLog,
    ) {}

    public function index(): View
    {
        $articles = News::latest('published_at')->get()->map(function ($news) {
            return [
                'id' => $news->id,
                'title' => $news->title,
                'slug' => $news->slug,
                'date' => $news->published_at ? $news->published_at->format('Y-m-d') : '',
                'dateFormatted' => $news->published_at ? $news->published_at->translatedFormat('d F Y') : '-',
                'source' => $news->source,
                'sourceUrl' => $news->source_url ?: $news->source,
                'coverImage' => $news->cover_image,
                'description' => $news->description,
                'isFeatured' => (bool) $news->is_featured,
                'status' => $news->status === 'published' ? 'Terbit' : 'Draf',
                'viewCount' => $news->view_count,
            ];
        });

        return view('admin.berita', compact('articles'));
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'sourceUrl' => ['nullable', 'string', 'max:500'],
            'source_url' => ['nullable', 'string', 'max:500'],
            'source' => ['nullable', 'string', 'max:500'],
            'coverImage' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'isFeatured' => ['nullable', 'boolean'],
            'status' => ['nullable', 'string'],
        ]);

        $sourceUrl = $validated['sourceUrl'] ?? $validated['source_url'] ?? $validated['source'] ?? null;
        if (empty($sourceUrl)) {
            throw ValidationException::withMessages([
                'sourceUrl' => 'Tautan / URL Sumber berita wajib diisi.',
            ]);
        }

        $status = ($validated['status'] ?? 'Terbit') === 'Terbit' ? 'published' : 'draft';
        $isFeatured = (bool) ($validated['isFeatured'] ?? false);

        // Hanya boleh ada 1 artikel berita yang berstatus is_featured
        if ($isFeatured) {
            News::where('is_featured', true)->update(['is_featured' => false]);
        }

        $news = News::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']).'-'.time(),
            'published_at' => $validated['date'],
            'source' => $sourceUrl,
            'source_url' => $sourceUrl,
            'cover_image' => $validated['coverImage'],
            'description' => $validated['description'],
            'is_featured' => $isFeatured,
            'status' => $status,
        ]);

        $this->activityLog->log(
            action: 'CREATE_NEWS',
            description: "Membuat rilis berita baru: {$news->title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil disimpan.',
                'news' => $news,
            ]);
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil disimpan.');
    }

    public function update(Request $request, News $news): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'sourceUrl' => ['nullable', 'string', 'max:500'],
            'source_url' => ['nullable', 'string', 'max:500'],
            'source' => ['nullable', 'string', 'max:500'],
            'coverImage' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'isFeatured' => ['nullable', 'boolean'],
            'status' => ['nullable', 'string'],
        ]);

        $sourceUrl = $validated['sourceUrl'] ?? $validated['source_url'] ?? $validated['source'] ?? $news->source_url ?? $news->source;
        if (empty($sourceUrl)) {
            throw ValidationException::withMessages([
                'sourceUrl' => 'Tautan / URL Sumber berita wajib diisi.',
            ]);
        }

        $status = ($validated['status'] ?? 'Terbit') === 'Terbit' ? 'published' : 'draft';
        $isFeatured = (bool) ($validated['isFeatured'] ?? false);

        // Hanya boleh ada 1 artikel berita yang berstatus is_featured
        if ($isFeatured) {
            News::where('id', '!=', $news->id)->where('is_featured', true)->update(['is_featured' => false]);
        }

        $news->update([
            'title' => $validated['title'],
            'published_at' => $validated['date'],
            'source' => $sourceUrl,
            'source_url' => $sourceUrl,
            'cover_image' => $validated['coverImage'],
            'description' => $validated['description'],
            'is_featured' => $isFeatured,
            'status' => $status,
        ]);

        $this->activityLog->log(
            action: 'UPDATE_NEWS',
            description: "Memperbarui berita: {$news->title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil diperbarui.',
                'news' => $news,
            ]);
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Request $request, News $news): JsonResponse|RedirectResponse
    {
        $title = $news->title;
        $news->delete();

        $this->activityLog->log(
            action: 'DELETE_NEWS',
            description: "Menghapus berita: {$title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function toggleFeatured(Request $request, News $news): JsonResponse
    {
        $newFeatured = ! $news->is_featured;

        // Jika diaktifkan menjadi featured, nonaktifkan artikel berita featured lainnya
        if ($newFeatured) {
            News::where('id', '!=', $news->id)->where('is_featured', true)->update(['is_featured' => false]);
        }

        $news->is_featured = $newFeatured;
        $news->save();

        return response()->json(['success' => true, 'is_featured' => $news->is_featured]);
    }

    public function toggleStatus(Request $request, News $news): JsonResponse
    {
        $news->status = $news->status === 'published' ? 'draft' : 'published';
        $news->save();

        return response()->json(['success' => true, 'status' => $news->status]);
    }
}
