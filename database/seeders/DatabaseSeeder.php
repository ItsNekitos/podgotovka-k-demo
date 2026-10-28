<?php

namespace Database\Seeders;

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            "name" => "Conf2027",
            "email" => "admin@admin",
            "phone"=>"89507458234",
            "password" => 'Demo77',
            "role" => 'admin',
        ]);
        Place::create([
            "name"=>"Маленький зал для конференций",
            "desc"=>"Небольшой и удобный зал для проведения ваших конференций",
            "photo"=>"storage/photos/JhvSiyzO0jDOh2ayf7MAUVJ9sPINHNIyooodIvgn.jpg"
        ]);
    }
}
