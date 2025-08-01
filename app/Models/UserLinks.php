<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLinks extends Model
{
    /** @use HasFactory<\Database\Factories\UserLinksFactory> */
    use HasFactory;

    protected $fillable = [
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
