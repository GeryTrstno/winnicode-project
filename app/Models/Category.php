<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function news() {
        return $this->belongsToMany(News::class, 'category_news', 'category_id', 'news_id');
    }
    public function subcategories() {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
