<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfiles;
Use Illuminate\Support\Str;

class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            UserProfiles::create([
                'user_id' => $user->id,
                'followers' => rand(0, 1000), // Random number of followers
                'following' => rand(0, 1000), // Random number of following
                'bio' => Str::random(100), // Random bio text
                'image' => 'https://placehold.co/200x200?text=' . urlencode($user->name), // Placeholder image
            ]);
        }
    }
}
