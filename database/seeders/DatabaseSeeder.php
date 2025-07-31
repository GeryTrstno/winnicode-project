<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,       // Seed users
            CategorySeeder::class,   // Seed categories
            SubCategorySeeder::class, // Seed subcategories
            NewsSeeder::class,       // Seed news
            CategoryNewsSeeder::class, // Seed category_news pivot table
            SubCategoryNewsSeeder::class, // Seed subcategory_news pivot table
            UserProfilesSeeder::class,
            CommentSeeder::class, // Seed comments
        ]);

    }
}
