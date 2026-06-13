<?php

namespace App\Models;

use Database\Factories\AdminFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

#[Table('admin')]
#[Fillable(['nama', 'email', 'password', 'jabatan', 'no_hp'])]
#[Hidden(['password'])]
class Admin extends Authenticatable
{
    /** @use HasFactory<AdminFactory> */
    use HasFactory, HasApiTokens;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
