<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        // Daftar makanan agar data terlihat nyata dan tidak membosankan
        $daftarMakanan = [
            'Resep Ayam Goreng Lengkuas', 'Cara Membuat Pempek Palembang', 
            'Rahasia Bakso Kenyal', 'Soto Ayam Lamongan Enak', 
            'Tips Memasak Rendang Empuk', 'Es Cendol Segar Rumahan',
            'Martabak Manis Anti Gagal', 'Nasi Goreng Spesial Resto'
        ];

        return [
            'judul' => $this->faker->randomElement($daftarMakanan) . ' ' . $this->faker->sentence(2),
            'isi' => $this->faker->paragraphs(5, true), // Menghasilkan teks artikel yang panjang
            'user_id' => User::first()->id ?? User::factory(), // Mengambil user pertama atau buat baru
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(), // Ambil kategori acak
            'gambar' => null, // Dikosongkan karena file fisik harus diupload manual
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}