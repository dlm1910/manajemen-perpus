<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    use HasFactory;

    // Karena kamu pakai create() & update()
    protected $guarded = [];

    /**
     * Relasi:
     * 1 anggota bisa memiliki banyak peminjaman
     */
    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
    
}
