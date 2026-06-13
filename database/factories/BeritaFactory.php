<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul_berita' => fake()->sentence(6),
            'deskripsi' => fake()->paragraphs(3, true),
            'penulis' => fake()->name(),
            'foto' => null,
            'jenis_berita' => fake()->randomElement(['pengumuman-akademik', 'beasiswa-karir', 'events', 'prestasi', 'aktivitas', 'lainnya']),
            'tanggal' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
