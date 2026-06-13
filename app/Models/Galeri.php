<?php

namespace App\Models;

use Database\Factories\GaleriFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table('galeri')]
#[Fillable(['judul_galeri', 'deskripsi', 'foto'])]
class Galeri extends Model
{
    /** @use HasFactory<GaleriFactory> */
    use HasFactory;
}
