<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        'guild_id'
    ];

    public function articles()
    {
        return $this->belongsTo(Guild::class);
    }
}
