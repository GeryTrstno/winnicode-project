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
            CategorySeeder::class,
            SubCategorySeeder::class,
            UserSeeder::class,
        ]);

        // Seed news
        News::factory(50)->recycle(User::all())->create();

        // Ambil semua kategori dan subkategori
        $categories = Category::all();
        $subcategories = SubCategory::all();

        // Untuk setiap news, attach kategori & subkategori acak (tanpa duplikat)
        News::all()->each(function ($news) use ($categories, $subcategories) {
            // Ambil 1 atau lebih kategori acak, tanpa duplikat
            $categoryIds = $categories->random(rand(1, min(3, $categories->count())))->pluck('id')->toArray();
            $news->categories()->sync($categoryIds); // Sinkronkan kategori dengan pivot `category_news`

            // Ambil 1 atau lebih subkategori acak, tanpa duplikat
            if (method_exists($news, 'subcategories')) {
                // Pilih subkategori yang terkait dengan kategori yang sudah dipilih
                $subCategoryIds = $subcategories->random(rand(1, min(3, $subcategories->count())))->pluck('id')->toArray();
                // Sinkronkan subkategori dengan tabel pivot yang benar (sub_category_news)
                $news->subcategories()->sync($subCategoryIds); // Sinkronkan subkategori dengan pivot `sub_category_news`
            }
        });
    }
}
