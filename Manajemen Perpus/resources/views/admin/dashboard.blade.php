@extends('layout.dashboard')

@section('content')
<h2>Selamat Datang, {{ auth()->user()->name }}</h2>

<div class="cards">
    <div class="card blue">
        <h3>Jumlah Buku</h3>
        <p>{{ $jumlahBuku }}</p>
    </div>

    <div class="card blue">
        <h3>Kategori</h3>
        <p>{{ $jumlahKategori }}</p>
    </div>

    <div class="card blue">
        <h3>Anggota</h3>
        <p>{{ $jumlahAnggota }}</p>
    </div>
    

    <div class="card blue">
        <h3>Pinjaman</h3>
        <p>{{ $jumlahPeminjaman }}
</p>
    </div>
</div>

<div class="info-box">
    <h3>Informasi Aturan Peminjaman</h3>
    <ol>
        <li>Maksimal peminjaman 1 minggu</li>
        <li>Maksimal 3 buku</li>
        <li>Denda Rp 15.000 / minggu</li>
        <li>Konfirmasi ke petugas</li>
    </ol>
</div>
@endsection
