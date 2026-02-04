<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $allKategori = Kategori::all();
        return view('kategori.index', compact('allKategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        Kategori::create($validatedData);

        return redirect()->route('kategori.index');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        $kategori->update($validatedData);

        return redirect()->route('kategori.index');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
