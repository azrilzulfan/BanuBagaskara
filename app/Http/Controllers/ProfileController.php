<?php

namespace App\Http\Controllers;

use App\Services\SiteSettingsService;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(
        public SiteSettingsService $settingsService,
    ) {}

    public function index(): View
    {
        $profileSettings = $this->settingsService->getGroup('profile');
        $generalSettings = $this->settingsService->getGroup('general');

        return view('public.kenali', compact('profileSettings', 'generalSettings'));
    }
}
