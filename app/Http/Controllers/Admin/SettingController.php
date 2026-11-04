<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogService;
use App\Services\SiteSettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function __construct(
        public SiteSettingsService $settings,
        public ActivityLogService $activityLog,
    ) {}

    public function index(): View
    {
        $general = $this->settings->getGroup('general');
        $home = $this->settings->getGroup('home');
        $profile = $this->settings->getGroup('profile');
        $seo = $this->settings->getGroup('seo');

        return view('admin.pengaturan', compact('general', 'home', 'profile', 'seo'));
    }

    public function update(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'group' => ['required', 'string', 'in:general,home,profile,seo'],
            'data' => ['required', 'array'],
        ]);

        $group = $validated['group'];
        $data = $validated['data'];

        $this->settings->updateGroup($group, $data);

        $this->activityLog->log(
            action: 'UPDATE_SETTINGS',
            description: "Memperbarui pengaturan website untuk kelompok: {$group}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Pengaturan {$group} berhasil disimpan.",
                'group' => $group,
                'data' => $data,
            ]);
        }

        return back()->with('success', "Pengaturan {$group} berhasil diperbarui.");
    }
}
