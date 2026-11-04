<?php

namespace App\Http\Controllers;

use App\Enums\TanahSarealKelurahan;
use App\Services\SiteSettingsService;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(
        public SiteSettingsService $settingsService,
    ) {
    }

    public function index(): View
    {
        $generalSettings = $this->settingsService->getGroup('general');
        $kelurahanList = TanahSarealKelurahan::values();

        return view('public.kontak', compact('generalSettings', 'kelurahanList'));
    }
}
