<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $albums = Album::published()
            ->with('photos')
            ->orderBy('sort_order', 'asc')
            ->latest('event_date')
            ->get();

        $albumsData = $albums->map(function ($album) {
            return [
                'title' => $album->title,
                'date' => $album->event_date ? $album->event_date->translatedFormat('d F Y') : '-',
                'desc' => $album->description ?? '',
                'cover' => str_starts_with((string) $album->cover_image, '/') || str_starts_with((string) $album->cover_image, 'http') ? (string) $album->cover_image : '/'.(string) $album->cover_image,
                'photos' => $album->photos->map(function ($p) {
                    return [
                        'url' => str_starts_with((string) $p->image_path, '/') || str_starts_with((string) $p->image_path, 'http') ? (string) $p->image_path : '/'.(string) $p->image_path,
                        'caption' => $p->caption ?? '',
                    ];
                })->values()->all(),
            ];
        })->values()->all();

        return view('public.galeri.index', compact('albums', 'albumsData'));
    }
}
