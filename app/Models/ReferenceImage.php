<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class ReferenceImage extends Model
{
    protected $fillable = [
        'reference_id',
        'path',
        'alt',
        'is_cover',
        'order',
    ];

    protected $casts = [
        'is_cover' => 'boolean',
    ];

    public function reference(): BelongsTo
    {
        return $this->belongsTo(Reference::class);
    }
}
