<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus'; // pastikan sesuai

    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',          
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }

}
