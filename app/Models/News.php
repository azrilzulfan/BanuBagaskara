<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'published_at',
        'description',
        'cover_image',
        'source_url',
        'source',
        'is_featured',
        'status',
        'view_count',
    ];

    /**
     * Get the source URL fallback.
     */
    public function getSourceUrlAttribute(?string $value): ?string
    {
        return $value ?: $this->attributes['source'] ?? null;
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'is_featured' => 'boolean',
            'view_count' => 'integer',
        ];
    }

    /**
     * Scope for published news.
     *
     * @param  Builder<News>  $query
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published');
    }

    /**
     * Scope for featured news.
     *
     * @param  Builder<News>  $query
     */
    public function scopeFeatured(Builder $query): void
    {
        $query->where('is_featured', true);
    }
}
