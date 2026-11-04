<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AspirationNote extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'aspiration_id',
        'author_name',
        'note_text',
    ];

    /**
     * @return BelongsTo<Aspiration, $this>
     */
    public function aspiration(): BelongsTo
    {
        return $this->belongsTo(Aspiration::class);
    }
}
