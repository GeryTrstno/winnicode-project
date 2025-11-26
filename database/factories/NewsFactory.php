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

        // Menentukan status random
        $status = fake()->randomElement(['published', 'rejected', 'pending']);

        // Menentukan komentar berdasarkan status
        $comment = $status === 'pending' ? null : match($status) {
            'published' => fake()->randomElement([
                'Artikel ini sudah sangat bagus, lanjutkan!',
                'Konten yang menarik, diterima!',
                'Penyajian informasi sangat jelas, diterima!',
                'Artikel diterima, namun ada sedikit revisi yang perlu dilakukan',
            ]),
            'rejected' => fake()->randomElement([
                'Ada beberapa bagian yang perlu diperbaiki.',
                'Sumber kurang jelas, coba periksa kembali.',
                'Artikel perlu penyempurnaan lebih lanjut.',
                'Konten kurang relevan, perlu perubahan besar.',
                'Tolong perbaiki dan sertakan referensi yang lebih jelas.',
            ]),
            'pending' => null, // Tidak ada komentar untuk status pending
            default => 'Komentar tidak tersedia',
        };

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'content' => $content,
            'caption' => fake()->sentence(),
            'slug' => Str::slug($title),
            'status' => $status,
            'comment' => $comment,
        ];
    }
}
