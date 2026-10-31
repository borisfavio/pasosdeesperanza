<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $fillable = ['name', 'position', 'bio', 'photo_url', 'is_visible'];

    protected function casts(): array
    {
        return ['is_visible' => 'boolean'];
    }
}
