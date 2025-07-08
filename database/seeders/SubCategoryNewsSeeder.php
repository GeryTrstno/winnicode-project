<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategoryNews;
use App\Models\SubCtaegory;
use App\Model\Category;
use App\Models\News;

class SubCategoryNewsSeeder extends Seeder
{
    public function run()
    {
        // Get all news items
        $news = News::all();

        foreach ($news as $newsItem) {
            // Get categories of the current news item
            $categories = $newsItem->categories;

            // Initialize an array to store the selected subcategory IDs
            $selectedSubCategoryIds = [];

            // Loop through each category of the news
            foreach ($categories as $category) {
                // Get subcategories for the current category
                $subCategories = $category->subcategories;

                // Check if subcategories exist
                if ($subCategories->isNotEmpty()) {
                    // Get a random number of subcategories (1 to 5), but don't exceed the number of subcategories available
                    $numberOfSubCategoriesToSelect = min(rand(1, 5), $subCategories->count());

                    // Randomly select subcategories, ensuring we don't try to select more than are available
                    $randomSubCategories = $subCategories->random($numberOfSubCategoriesToSelect);

                    // Add the IDs of the selected subcategories to the array
                    $selectedSubCategoryIds = array_merge($selectedSubCategoryIds, $randomSubCategories->pluck('id')->toArray());
                }
            }

            // Remove duplicate subcategory IDs (if any)
            $selectedSubCategoryIds = array_unique($selectedSubCategoryIds);

            // Attach the selected subcategories to the news item
            if (!empty($selectedSubCategoryIds)) {
                $newsItem->subcategories()->sync($selectedSubCategoryIds);
            }
        }
    }
}
