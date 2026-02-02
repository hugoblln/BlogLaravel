<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'test@example.com',
        ]);

        $user->assignRole('Admin');

        User::factory()->count(10)->create();

        $this->call([
            PostSeeder::class
        ]);
    }
}
