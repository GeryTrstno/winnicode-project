<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryNews;
use App\Models\News;
use App\Models\Category;

class CategoryNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $news = News::all();

        foreach ($news as $newsItem) {
            $randomCategories = $categories->random(rand(1, 3))->pluck('id');
            $newsItem->categories()->sync($randomCategories);
        }
    }
}
