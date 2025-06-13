<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryNews>
 */
class CategoryNewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = CategoryNews::class;

    public function definition(): array
    {
        return [
            'news_id' => News::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
