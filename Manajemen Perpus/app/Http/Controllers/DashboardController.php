<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Anggota; // 1. PASTIKAN MODEL ANGGOTA DIPANGGIL
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $data = [
            'jumlahBuku'     => Buku::count(),
            'jumlahKategori' => Kategori::count(),
            
            // 2. UBAH INI: Menghitung data dari tabel Anggota (hasilnya akan 4)
            'jumlahAnggota'  => Anggota::count(), 
            
            'jumlahPeminjaman' => ($user->role === 'admin') 
                                    ? Peminjaman::count() 
                                    : Peminjaman::where('anggota_id', $user->id)->count(),
        ];

        // 3. Tambahkan pinjamanSaya untuk tampilan Dashboard Anggota
        if ($user->role == 'anggota') {
            $data['pinjamanSaya'] = Peminjaman::where('anggota_id', $user->id)->count();
        } else {
            // Beri nilai default 0 untuk admin agar tidak error saat view dipanggil
            $data['pinjamanSaya'] = 0;
        }

        if ($user->role === 'admin') {
            return view('admin.dashboard', $data);
        } else {
            return view('anggota.dashboard', $data);
        }
    }
}