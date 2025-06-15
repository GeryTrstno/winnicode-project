<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\News;
use App\Models\CategoryNews;
use App\Models\SubCategory;
use App\Models\SubCategoryNews;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryNews::factory(60)->recycle([News::all()->random(50), Category::all()->random(5)])->create();

        SubCategoryNews::factory(100)->recycle([News::all()->random(50), SubCategory::all()->random(10)])->create();
    }
}
