<?php

namespace Database\Factories;

use App\Models\SubCategoryNews;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategoryNews>
 */
class SubCategoryNewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = SubCategoryNews::class;
    public function definition(): array
    {
        return [
            'news_id' => News::factory(),
            'sub_category_id' => SubCategory::factory(),
        ];
    }
}
