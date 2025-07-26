<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);
        Category::create([
            'name' => 'Politics',
            'slug' => 'politics'
        ]);
        Category::create([
            'name' => 'Health',
            'slug' => 'health'
        ]);
        Category::create([
            'name' => 'Economy',
            'slug' => 'economy'
        ]);
        Category::create([
            'name' => 'History',
            'slug' => 'history'
        ]);
        Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);
    }
}
