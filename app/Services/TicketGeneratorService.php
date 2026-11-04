<?php

namespace App\Services;

use App\Models\Aspiration;

class TicketGeneratorService
{
    /**
     * Generate a unique ticket number formatted as BLB-xxxxxx.
     */
    public function generate(): string
    {
        do {
            $number = random_int(100000, 999999);
            $ticket = 'BLB-'.$number;
        } while (Aspiration::where('ticket_number', $ticket)->exists());

        return $ticket;
    }
}
