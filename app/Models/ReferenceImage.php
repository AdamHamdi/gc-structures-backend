<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
