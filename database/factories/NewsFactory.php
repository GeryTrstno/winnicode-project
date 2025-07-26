<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\news>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        $content = collect(range(1, 100)) // Kurangi jumlah paragraf untuk testing
            ->map(fn() => fake()->sentence())
            ->implode('');


        return [
            'user_id' => User::factory(),
            'title' => $title,
            'content' => $content,
            'caption' => fake()->sentence(),
            'image' => fake()->imageUrl(),
            'slug' => Str::slug($title),
        ];
    }
}
