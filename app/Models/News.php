<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_news', 'news_id', 'category_id');
    }
    public function subCategories() {
        return $this->belongsToMany(SubCategory::class, 'category_news', 'news_id', 'sub_category_id');
    }
}
