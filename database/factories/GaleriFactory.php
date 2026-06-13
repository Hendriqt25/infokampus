<?php

namespace Database\Factories;

use App\Models\Galeri;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul_galeri' => fake()->sentence(4),
            'foto' => '/uploads/galeri/dummy-' . fake()->uuid() . '.jpg',
            'deskripsi' => fake()->paragraphs(2, true),
        ];
    }
}
