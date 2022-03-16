<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Ghema Allan",
            'email' => "ghemaallan@gmail.com",
            'password' => Hash::make('masukdong'),
        ]);
        
        Category::create([
            'name' => "Makanan"
        ]);
        Category::create([
            'name' => "Minuman"
        ]);
        Category::create([
            'name' => "Cemilan"
        ]);

    }
}
