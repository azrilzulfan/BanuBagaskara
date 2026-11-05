<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AspirationStatus;
use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use App\Models\AspirationNote;
use App\Services\ActivityLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AspirationController extends Controller
{
    public function __construct(
        public ActivityLogService $activityLog,
    ) {}

    public function index(Request $request): View
    {
        Aspiration::where('status', AspirationStatus::Baru->value)
            ->update(['status' => AspirationStatus::Ditinjau->value]);

        $aspirations = Aspiration::latest('created_at')
            ->get()
            ->map(function ($item) {
                // Generate WhatsApp URL
                $rawPhone = preg_replace('/[^0-9]/', '', (string) $item->phone_number);
                if (str_starts_with($rawPhone, '0')) {
                    $waPhone = '62'.substr($rawPhone, 1);
                } elseif (str_starts_with($rawPhone, '62')) {
                    $waPhone = $rawPhone;
                } else {
                    $waPhone = '62'.$rawPhone;
                }

                $waText = "Halo Bapak/Ibu {$item->sender_name},\n\nTerima kasih telah menyampaikan aspirasi ke Rumah Aspirasi Banu Lesmana Bagaskara, S.M. (DPRD Kota Bogor Dapil 4 Tanah Sareal).\n\nNomor Tiket: *{$item->ticket_number}*\nPerihal: *{$item->subject}*\n\nTim kami siap menindaklanjuti aspirasi ini lebih lanjut. Mohon konfirmasi kelengkapan data berikut jika diperlukan.";
                $waUrl = "https://wa.me/{$waPhone}?text=".rawurlencode($waText);

                return [
                    'id' => $item->id,
                    'ticket' => $item->ticket_number,
                    'date' => $item->created_at ? $item->created_at->format('d M Y, H:i').' WIB' : '-',
                    'sender' => $item->sender_name,
                    'phone' => $item->phone_number,
                    'address' => $item->address,
                    'subject' => $item->subject,
                    'description' => $item->description,
                    'waUrl' => $waUrl,
                ];
            });

        return view('admin.aspirasi', compact('aspirations'));
    }

    public function updateStatus(Request $request, Aspiration $aspiration): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:Baru,Ditinjau,Selesai'],
        ]);

        $oldStatus = $aspiration->status instanceof AspirationStatus ? $aspiration->status->value : $aspiration->status;
        $aspiration->status = AspirationStatus::from($validated['status']);
        $aspiration->save();

        $this->activityLog->log(
            action: 'UPDATE_ASPIRATION_STATUS',
            description: "Memperbarui status tiket {$aspiration->ticket_number} dari {$oldStatus} ke {$validated['status']}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Status tiket {$aspiration->ticket_number} berhasil diubah ke {$validated['status']}.",
                'status' => $validated['status'],
            ]);
        }

        return back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    public function storeNote(Request $request, Aspiration $aspiration): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'note' => ['required', 'string', 'max:1000'],
            'author' => ['nullable', 'string', 'max:100'],
        ]);

        $authorName = $validated['author'] ?? (auth()->user()?->name ?? 'Staf Rumah Aspirasi');

        $note = AspirationNote::create([
            'aspiration_id' => $aspiration->id,
            'author_name' => $authorName,
            'note_text' => $validated['note'],
        ]);

        $this->activityLog->log(
            action: 'ADD_ASPIRATION_NOTE',
            description: "Menambahkan catatan disposisi pada tiket {$aspiration->ticket_number}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Catatan disposisi berhasil ditambahkan.',
                'note' => [
                    'id' => $note->id,
                    'date' => $note->created_at->format('d M Y, H:i').' WIB',
                    'author' => $note->author_name,
                    'text' => $note->note_text,
                ],
            ]);
        }

        return back()->with('success', 'Catatan disposisi berhasil ditambahkan.');
    }

    public function destroy(Request $request, Aspiration $aspiration): JsonResponse|RedirectResponse
    {
        $ticket = $aspiration->ticket_number;
        $aspiration->notes()->delete();
        $aspiration->delete();

        $this->activityLog->log(
            action: 'DELETE_ASPIRATION',
            description: "Menghapus aspirasi warga: {$ticket}",
            userId: auth()->id(),
            ip: $request->ip()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Aspirasi tiket {$ticket} berhasil dihapus.",
            ]);
        }

        return back()->with('success', 'Aspirasi berhasil dihapus.');
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'exists:aspirations,id'],
        ]);

        $count = count($validated['ids']);
        AspirationNote::whereIn('aspiration_id', $validated['ids'])->delete();
        Aspiration::whereIn('id', $validated['ids'])->delete();

        $this->activityLog->log(
            action: 'BULK_DELETE_ASPIRATIONS',
            description: "Menghapus {$count} data aspirasi warga secara massal",
            userId: auth()->id(),
            ip: $request->ip()
        );

        return response()->json([
            'success' => true,
            'message' => "{$count} aspirasi berhasil dihapus.",
        ]);
    }

    public function exportCsv(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="rekap-aspirasi-warga-'.date('Ymd-His').'.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');
            // Write UTF-8 BOM for Excel compatibility
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($handle, [
                'No Tiket',
                'Tanggal Masuk',
                'Nama Pengirim',
                'Nomor Telepon / WA',
                'Alamat Lengkap',
                'Perihal Aspirasi',
                'Deskripsi Usulan',
            ]);

            Aspiration::latest('created_at')->chunk(100, function ($aspirations) use ($handle) {
                foreach ($aspirations as $a) {
                    fputcsv($handle, [
                        $a->ticket_number,
                        $a->created_at ? $a->created_at->format('Y-m-d H:i:s') : '',
                        $a->sender_name,
                        $a->phone_number,
                        $a->address,
                        $a->subject,
                        $a->description,
                    ]);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }
}
