<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_desc'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
