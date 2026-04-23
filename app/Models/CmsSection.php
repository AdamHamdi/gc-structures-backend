<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsSection extends Model
{
    protected $fillable = ['page', 'section', 'content'];

    protected $casts = [
        'content' => 'array',
    ];
}
