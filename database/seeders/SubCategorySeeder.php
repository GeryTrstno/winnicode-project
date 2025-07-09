<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create([
            'name' => 'Artificial Intelligence',
            'slug' => 'ai',
            'category_id' => 1,
        ]);
        SubCategory::create([
            'name' => 'Cyber Security',
            'slug' => 'cyber-security',
            'category_id' => 1,
        ]);
        SubCategory::create([
            'name' => 'Cloud Computing',
            'slug' => 'cloud-computing',
            'category_id' => 1,
        ]);
        SubCategory::create([
            'name' => 'United Kingdom',
            'slug' => 'united-kingdom',
            'category_id' => 2,
        ]);
        SubCategory::create([
            'name' => 'United States',
            'slug' => 'united-states',
            'category_id' => 2,
        ]);
        SubCategory::create([
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux-design',
            'category_id' => 6,
        ]);
        SubCategory::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'category_id' => 6,
        ]);
        SubCategory::create([
            'name' => 'Accounting',
            'slug' => 'accounting',
            'category_id' => 4,
        ]);
        SubCategory::create([
            'name' => 'CryptoCurrency',
            'slug' => 'crypto-currency',
            'category_id' => 4,
        ]);
         SubCategory::create([
            'name' => 'Hospital',
            'slug' => 'hospital',
            'category_id' => 3,
        ]);
        SubCategory::create([
            'name' => 'Food',
            'slug' => 'food',
            'category_id' => 3,
        ]);
        SubCategory::create([
            'name' => 'National',
            'slug' => 'national-history',
            'category_id' => 5,
        ]);
        SubCategory::create([
            'name' => 'Event',
            'slug' => 'event-history',
            'category_id' => 5,
        ]);
    }
}
