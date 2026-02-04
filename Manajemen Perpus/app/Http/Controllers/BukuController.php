<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    public function create()
{
    $kategori  = Kategori::all();

    return view('buku.create', compact('kategori'));
}

    public function show(Buku $buku)
    {
    return view('buku.show', compact('buku'));
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'penulis' => 'required', // Pastikan ini 'penulis', bukan 'pengarang'
        'tahun_terbit' => 'required',
        'stok' => 'required',
        'kategori_id' => 'required',
    ]);

    Buku::create($request->all());
    return redirect()->route('buku.index');
}

    public function edit($id)
{
    $buku = Buku::findOrFail($id);
    $kategori = Kategori::all(); 

    return view('buku.edit', compact('buku', 'kategori'));

}


    public function update(Request $request, Buku $buku)
    {
        $buku->update($request->all());
        return redirect()->route('buku.index');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
