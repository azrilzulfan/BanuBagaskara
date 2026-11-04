<?php

namespace App\Http\Controllers;

use App\Actions\SubmitAspirationAction;
use App\Http\Requests\StoreAspirationRequest;
use Illuminate\Http\RedirectResponse;

class AspirationSubmissionController extends Controller
{
    public function __construct(
        public SubmitAspirationAction $submitAspirationAction,
    ) {}

    public function store(StoreAspirationRequest $request): RedirectResponse
    {
        // Honeypot anti-bot check: silent drop if bot filled website_hp
        if ($request->filled('website_hp')) {
            return redirect()->route('kontak.index')
                ->with('ticket_number', 'BLB-'.random_int(100000, 999999));
        }

        $validated = $request->validated();
        unset($validated['website_hp']);

        $aspiration = $this->submitAspirationAction->execute(
            data: $validated,
            ipAddress: $request->ip(),
            userAgent: $request->userAgent()
        );

        return redirect()->route('kontak.index', '#aspirasi')
            ->with('ticket_number', $aspiration->ticket_number)
            ->with('sender_name', $aspiration->sender_name);
    }
}
