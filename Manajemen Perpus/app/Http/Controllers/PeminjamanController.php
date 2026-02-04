<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // app/Http/Controllers/PeminjamanController.php

public function index()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        // Admin melihat semua data
        $allPeminjaman = Peminjaman::with(['anggota', 'buku'])->get();
    } else {
        // Anggota HANYA melihat data miliknya sendiri
        // Kita asumsikan ID user sama dengan ID di tabel anggota
        $allPeminjaman = Peminjaman::with(['anggota', 'buku'])
                            ->where('anggota_id', $user->id)
                            ->get();
    }

    // Pastikan nama variabel di compact adalah 'allPeminjaman'
    return view('peminjaman.index', compact('allPeminjaman'));
}

public function create()
{
    // Ambil semua data dari model Anggota
    $anggota = \App\Models\Anggota::all(); 
    $buku = \App\Models\Buku::all();

    return view('peminjaman.create', compact('anggota', 'buku'));
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'anggota_id' => 'required|exists:anggotas,id', // Validasi bahwa ID benar-benar ada di tabel users
        'buku_id' => 'required|exists:bukus,id',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'nullable|date',
        'status' => 'required',
    ]);

    // Jika baris ini merah, berarti validasi di atas gagal atau ID tidak ditemukan di tabel users
    Peminjaman::create($validatedData);

    return redirect()->route('peminjaman.index');
}

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index');
    }

public function edit($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $anggota = \App\Models\Anggota::all(); // Mengambil data anggota
    $buku = \App\Models\Buku::all();

    return view('peminjaman.edit', compact('peminjaman', 'anggota', 'buku'));
}
public function show(Peminjaman $peminjaman)
{
    return view('peminjaman.show', compact('peminjaman'));
}
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'anggota_id'      => 'required|exists:anggotas,id',
        'buku_id'         => 'required|exists:bukus,id',
        'tanggal_pinjam'  => 'required|date',
        'tanggal_kembali' => 'nullable|date',
        'status'          => 'required',
    ]);

    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->update($validatedData);

    return redirect()->route('peminjaman.index')->with('success', 'Data berhasil diperbarui');
}

}
