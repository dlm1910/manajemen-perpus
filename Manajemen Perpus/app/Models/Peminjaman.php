<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\Buku;

class Peminjaman extends Model
{
    protected $table = 'peminjamans'; // PENTING (lihat poin 2)

    protected $fillable = [
        'anggota_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function anggota()
{
    // Pastikan menggunakan Anggota::class dan foreign key 'anggota_id'
    return $this->belongsTo(\App\Models\Anggota::class, 'anggota_id');
}


    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}


