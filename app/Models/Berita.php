<?php

namespace App\Models;

use Database\Factories\BeritaFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table('berita')]
#[Fillable(['judul_berita', 'deskripsi', 'penulis', 'foto', 'jenis_berita', 'tanggal'])]
class Berita extends Model
{
    /** @use HasFactory<BeritaFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'tanggal' => 'datetime',
        ];
    }
}
