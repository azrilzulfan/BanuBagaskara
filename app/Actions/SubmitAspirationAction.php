<?php

namespace App\Actions;

use App\Enums\AspirationPriority;
use App\Enums\AspirationStatus;
use App\Enums\TanahSarealKelurahan;
use App\Models\Aspiration;
use App\Services\ActivityLogService;
use App\Services\TicketGeneratorService;

class SubmitAspirationAction
{
    public function __construct(
        public TicketGeneratorService $ticketGenerator,
        public ActivityLogService $activityLog,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public function execute(array $data, ?string $ipAddress = null, ?string $userAgent = null): Aspiration
    {
        $ticketNumber = $this->ticketGenerator->generate();

        $kelurahan = $data['kelurahan'] ?? null;
        if (! $kelurahan && ! empty($data['address'])) {
            foreach (TanahSarealKelurahan::values() as $k) {
                if (stripos($data['address'], $k) !== false) {
                    $kelurahan = $k;
                    break;
                }
            }
        }

        $aspiration = Aspiration::create([
            'ticket_number' => $ticketNumber,
            'sender_name' => $data['sender_name'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'kelurahan' => $kelurahan,
            'category' => $data['category'] ?? 'Umum',
            'subject' => $data['subject'],
            'description' => $data['description'],
            'status' => AspirationStatus::Baru,
            'priority' => AspirationPriority::Sedang,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
        ]);

        $this->activityLog->log(
            action: 'SUBMIT_ASPIRATION',
            description: "Aspirasi baru disampaikan oleh {$aspiration->sender_name} (Tiket: {$aspiration->ticket_number})",
            ip: $ipAddress
        );

        return $aspiration;
    }
}
