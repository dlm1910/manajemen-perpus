<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;


class AnggotaController extends Controller
{
    public function index()
    {
        $allAnggota = Anggota::all();
        return view('anggota.index', compact('allAnggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Anggota::create($validatedData);

        return redirect()->route('anggota.index');
    }

    public function show(Anggota $anggota)
{
    return view('anggota.show', compact('anggota'));
}


public function edit($id)
{
    $anggota = Anggota::findOrFail($id);
    return view('anggota.edit', compact('anggota'));
}


public function update(Request $request, $id)
{
    $anggota = Anggota::findOrFail($id);

    $anggota->update([
        'nama' => $request->nama,
    ]);
    $anggota->update([
        'alamat' => $request->alamat,
    ]);
    $anggota->update([
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('anggota.index')
                     ->with('success', 'Data anggota berhasil diupdate');
}


    public function destroy($id)
{
    $anggota = Anggota::findOrFail($id);
    $anggota->delete();

    return redirect()->route('anggota.index')
                     ->with('success', 'Data anggota berhasil dihapus');
}
public function dashboard()
{
    $jumlahBuku = Buku::count();
    $jumlahKategori = Kategori::count();
    $jumlahAnggota = Anggota::count();
    $jumlahPeminjaman = Peminjaman::count();

    return view('anggota.dashboard', compact(
        'jumlahBuku',
        'jumlahKategori',
        'jumlahAnggota',
        'jumlahPeminjaman'
    ));
}

}