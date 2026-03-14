<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // 1. Buat User Admin (Jika belum ada) agar kamu bisa login
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Utama',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Buat Kategori dummy agar Post memiliki relasi yang valid
        $categories = ['Makanan Tradisional', 'Minuman Viral', 'Tips Memasak', 'Review Resto'];
        
        foreach ($categories as $cat) {
            Category::firstOrCreate(['nama_kategori' => $cat]);
        }

        // 3. Jalankan PostFactory untuk membuat 10 artikel kuliner palsu
        // Ini akan mengambil user_id dan category_id yang sudah kita buat di atas
        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => Category::all()->random()->id,
        ]);
    }
}