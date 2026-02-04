@extends('layout.dashboard')


@section('content')
<div class="dashboard-anggota">
    <h2>Dashboard Anggota</h2>
    <p>Selamat datang, <b>{{ auth()->user()->name }}</b>. Anda login sebagai Anggota.</p>

    

    <div class="cards">
    <div class="card blue">
        <h3>Jumlah Buku</h3>
        <p>{{ $jumlahBuku }}</p>
    </div>

    <div class="card blue">
        <h3>Kategori</h3>
        <p>{{ $jumlahKategori }}</p>
    </div>
    

        <div class="card red">
            <h3>Pinjaman Saya</h3>
            <p>{{ $pinjamanSaya ?? 0 }}</p>
        </div>
    </div>


    <div class="info-box">
        <h3 style="margin-top: 0;">Informasi Aturan Peminjaman</h3>
        <ol style="line-height: 2; padding-left: 20px;">
            <li>Maksimal peminjaman 1 minggu</li>
            <li>Maksimal 3 buku</li>
            <li>Denda Rp 15.000 / minggu</li>
            <li>Konfirmasi ke petugas</li>
        </ol>
    </div>
</div>
@endsection