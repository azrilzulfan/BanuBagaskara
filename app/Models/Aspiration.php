<?php

namespace App\Models;

use App\Enums\AspirationPriority;
use App\Enums\AspirationStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aspiration extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'ticket_number',
        'sender_name',
        'phone_number',
        'address',
        'kelurahan',
        'category',
        'subject',
        'description',
        'status',
        'priority',
        'ip_address',
        'user_agent',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => AspirationStatus::class,
            'priority' => AspirationPriority::class,
        ];
    }

    /**
     * @return HasMany<AspirationNote, $this>
     */
    public function notes(): HasMany
    {
        return $this->hasMany(AspirationNote::class)->latest();
    }

    /**
     * @param  Builder<Aspiration>  $query
     */
    public function scopeStatus(Builder $query, string $status): void
    {
        $query->where('status', $status);
    }
}
