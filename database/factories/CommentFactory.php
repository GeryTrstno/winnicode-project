<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'news_id' => News::factory(),
            'content' => $this->faker->paragraph(rand(1, 3)),
            'parent_comment_id' => null,
            'is_active' => $this->faker->boolean(90), // 90% kemungkinan aktif
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * State untuk komentar yang pasti aktif
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => true,
            ];
        });
    }

    /**
     * State untuk komentar yang tidak aktif
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }

    /**
     * State untuk reply comment
     */
    public function reply($parentCommentId)
    {
        return $this->state(function (array $attributes) use ($parentCommentId) {
            return [
                'parent_comment_id' => $parentCommentId,
            ];
        });
    }
}
