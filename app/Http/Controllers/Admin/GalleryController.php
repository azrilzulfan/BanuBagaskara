<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumPhoto;
use App\Services\ActivityLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct(
        public ActivityLogService $activityLog,
    ) {}

    public function index(): View
    {
        $albums = Album::with('photos')->latest('event_date')->get()->map(function ($album) {
            return [
                'id' => $album->id,
                'title' => $album->title,
                'slug' => $album->slug,
                'date' => $album->event_date ? $album->event_date->format('Y-m-d') : '',
                'dateFormatted' => $album->event_date ? $album->event_date->translatedFormat('d F Y') : '-',
                'desc' => $album->description,
                'cover' => $album->cover_image,
                'status' => $album->status === 'published' ? 'Terbit' : 'Draf',
                'photos' => $album->photos->map(function ($photo) {
                    return [
                        'id' => $photo->id,
                        'url' => $photo->image_path,
                        'caption' => $photo->caption ?? '',
                    ];
                })->values()->all(),
            ];
        });

        return view('admin.galeri', compact('albums'));
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'desc' => ['nullable', 'string'],
            'cover' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string'],
            'photos' => ['nullable', 'array'],
            'photos.*.url' => ['required', 'string'],
            'photos.*.caption' => ['nullable', 'string', 'max:255'],
        ]);

        $status = ($validated['status'] ?? 'Terbit') === 'Terbit' ? 'published' : 'draft';
        $cover = $validated['cover'] ?? ($validated['photos'][0]['url'] ?? 'uploads/default_album_cover.jpg');

        $album = Album::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']).'-'.time(),
            'event_date' => $validated['date'] ?? now(),
            'description' => $validated['desc'] ?? '',
            'cover_image' => $cover,
            'status' => $status,
        ]);

        if (! empty($validated['photos'])) {
            foreach ($validated['photos'] as $idx => $photoData) {
                AlbumPhoto::create([
                    'album_id' => $album->id,
                    'image_path' => $photoData['url'],
                    'caption' => $photoData['caption'] ?? '',
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        $this->activityLog->log(
            action: 'CREATE_ALBUM',
            description: "Membuat album galeri baru: {$album->title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Album galeri berhasil disimpan.',
                'album' => $album->load('photos'),
            ]);
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Album galeri berhasil disimpan.');
    }

    public function update(Request $request, Album $album): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'desc' => ['nullable', 'string'],
            'cover' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string'],
            'photos' => ['nullable', 'array'],
            'photos.*.url' => ['required', 'string'],
            'photos.*.caption' => ['nullable', 'string', 'max:255'],
        ]);

        $status = ($validated['status'] ?? 'Terbit') === 'Terbit' ? 'published' : 'draft';
        $cover = $validated['cover'] ?? ($validated['photos'][0]['url'] ?? $album->cover_image);

        $album->update([
            'title' => $validated['title'],
            'event_date' => $validated['date'] ?? $album->event_date,
            'description' => $validated['desc'] ?? $album->description,
            'cover_image' => $cover,
            'status' => $status,
        ]);

        // Sync photos
        $album->photos()->delete();
        if (! empty($validated['photos'])) {
            foreach ($validated['photos'] as $idx => $photoData) {
                AlbumPhoto::create([
                    'album_id' => $album->id,
                    'image_path' => $photoData['url'],
                    'caption' => $photoData['caption'] ?? '',
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        $this->activityLog->log(
            action: 'UPDATE_ALBUM',
            description: "Memperbarui album galeri: {$album->title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Album galeri berhasil diperbarui.',
                'album' => $album->load('photos'),
            ]);
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Album galeri berhasil diperbarui.');
    }

    public function destroy(Request $request, Album $album): JsonResponse|RedirectResponse
    {
        $title = $album->title;
        $album->photos()->delete();
        $album->delete();

        $this->activityLog->log(
            action: 'DELETE_ALBUM',
            description: "Menghapus album galeri: {$title}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Album galeri berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Album galeri berhasil dihapus.');
    }

    public function toggleStatus(Request $request, Album $album): JsonResponse
    {
        $album->status = $album->status === 'published' ? 'draft' : 'published';
        $album->save();

        return response()->json(['success' => true, 'status' => $album->status]);
    }
}
