<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\TagSeeder;
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

       $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'test@example.com',
        ]);

        $admin->assignRole('Admin');

       $users = User::factory()->count(10)->create();

       foreach($users as $user)
        {
            $user->assignRole('Author');
        }



        $this->call([
            TagSeeder::class,
            PostSeeder::class,
        ]);
    }
}
