<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{
    /** @use HasFactory<\Database\Factories\UserProfilesFactory> */
    use HasFactory;

    protected $fillable = [
        'location',
        'company',
        'bio',
        'image',
        'cover_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
