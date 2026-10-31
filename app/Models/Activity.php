<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    protected $fillable = ['title', 'slug', 'summary', 'content', 'image_url', 'published_at', 'is_published', 'program_id'];

    protected function casts(): array
    {
        return ['published_at' => 'date', 'is_published' => 'boolean'];
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
