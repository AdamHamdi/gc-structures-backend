<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

class Reference extends Model
{
    protected $fillable = [
        'title',
        'description',
        'client',
        'location',
        'category',
        'year',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ReferenceImage::class)->orderBy('order');
    }

    public function coverImage()
    {
        return $this->images()->where('is_cover', true)->first();
    }
}
