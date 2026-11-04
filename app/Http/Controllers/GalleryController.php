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

        return view('public.galeri.index', compact('albums'));
    }
}
