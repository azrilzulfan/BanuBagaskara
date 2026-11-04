<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'event_date',
        'description',
        'cover_image',
        'status',
        'sort_order',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'sort_order' => 'integer',
        ];
    }

    /**
     * @return HasMany<AlbumPhoto, $this>
     */
    public function photos(): HasMany
    {
        return $this->hasMany(AlbumPhoto::class)->orderBy('sort_order', 'asc');
    }

    /**
     * Scope for published albums.
     *
     * @param  Builder<Album>  $query
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published');
    }
}
