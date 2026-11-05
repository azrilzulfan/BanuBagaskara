<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogService;
use App\Services\SiteSettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
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

        // Sinkronisasi otomatis 6 program kerja antara Beranda dan Profil
        if ($group === 'home' && isset($data['programs']) && is_array($data['programs'])) {
            $profileData = $this->settings->getGroup('profile');
            $profileData['programs'] = $data['programs'];
            $this->settings->updateGroup('profile', $profileData);
        } elseif ($group === 'profile' && isset($data['programs']) && is_array($data['programs'])) {
            $homeData = $this->settings->getGroup('home');
            $homeData['programs'] = $data['programs'];
            $this->settings->updateGroup('home', $homeData);
        }

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

    public function upload(Request $request): JsonResponse
    {
        $file = $request->file('file');
        $extension = $file ? strtolower($file->getClientOriginalExtension() ?: '') : '';
        $mimeType = $file ? strtolower($file->getMimeType() ?: '') : '';

        $isImage = in_array($extension, ['jpeg', 'png', 'jpg', 'webp', 'svg', 'ico'], true)
            || str_starts_with($mimeType, 'image/');

        $maxKilobytes = $isImage ? 2048 : 10240;

        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:jpeg,png,jpg,webp,svg,ico,pdf,doc,docx,xls,xlsx,zip',
                'max:'.$maxKilobytes,
            ],
        ], [
            'file.max' => $isImage
                ? 'Ukuran file gambar maksimal 2 MB.'
                : 'Ukuran berkas dokumen maksimal 10 MB.',
            'file.mimes' => 'Format file tidak didukung.',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = strtolower($file->getClientOriginalExtension() ?: 'bin');

        // Validasi keamanan berkas SVG dari injeksi skrip/XSS/XXE
        if ($extension === 'svg') {
            $content = file_get_contents($file->getRealPath());
            if ($content !== false && preg_match('/<script|javascript:|<!ENTITY|onload|onerror|onclick|onmouseover/i', $content)) {
                throw ValidationException::withMessages([
                    'file' => 'Berkas SVG mengandung skrip atau instruksi berbahaya yang tidak diizinkan.',
                ]);
            }
        }

        $sizeInBytes = $file->getSize();

        // Format file size readable
        if ($sizeInBytes >= 1048576) {
            $formattedSize = round($sizeInBytes / 1048576, 1).' MB';
        } elseif ($sizeInBytes >= 1024) {
            $formattedSize = round($sizeInBytes / 1024).' KB';
        } else {
            $formattedSize = $sizeInBytes.' B';
        }

        $folder = in_array($extension, ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip'], true) ? 'documents' : 'settings';
        $filename = time().'_'.Str::random(10).'.'.$extension;
        $path = $file->storeAs($folder, $filename, 'public');

        $relativePath = 'storage/'.$path;

        $this->activityLog->log(
            action: 'UPLOAD_SETTING_ASSET',
            description: "Mengunggah aset berkas: {$filename}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        return response()->json([
            'success' => true,
            'message' => 'File berhasil diunggah.',
            'path' => $relativePath,
            'url' => asset($relativePath),
            'filename' => $originalName,
            'file_type' => strtoupper($extension),
            'file_size' => $formattedSize,
        ]);
    }
}
