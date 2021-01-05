<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer l'utilisateur admin
        User::factory()->create();

        // Créer 50 post par rapport à l'utilisateur "admin"
        Post::factory()
            ->times(50)
            ->create();
    }
}
