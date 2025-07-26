<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /** @use HasFactory<\Database\Factories\SubCategoryFactory> */
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = [
        'name'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'subcategory_news', 'subcategory_id', 'news_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
