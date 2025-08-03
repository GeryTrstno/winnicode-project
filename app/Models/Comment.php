<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    protected $guarded = [
        'id',
        'user_id',
        'news_id',
        'created_at',
        'updated_at',
        'parent_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
}
