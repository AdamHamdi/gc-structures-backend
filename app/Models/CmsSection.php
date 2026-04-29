<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CmsSection extends Model
{
    protected $fillable = ['page', 'section', 'content'];

    protected $casts = [
        'content' => 'array',
    ];
}
