<?php

namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogService
{
    public function log(string $action, ?string $description = null, ?int $userId = null, ?string $ip = null): ActivityLog
    {
        return ActivityLog::create([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
            'ip_address' => $ip,
            'created_at' => now(),
        ]);
    }
}
