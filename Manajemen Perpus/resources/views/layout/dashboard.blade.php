<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>koleksiku</title> 
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2><span>k</span>oleksiku</h2>

        <a href="{{ route('dashboard') }}">Home</a>

        {{-- MENU ADMIN --}}
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('buku.index') }}">Buku</a>
            <a href="{{ route('kategori.index') }}">Kategori</a>
            <a href="{{ route('anggota.index') }}">Anggota</a>
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
        @endif

        {{-- MENU ANGGOTA --}}
        @if(auth()->user()->role === 'anggota')
            <a href="{{ route('buku.index') }}">Buku</a>
            <a href="{{ route('peminjaman.index') }}">Peminjaman Saya</a>
        @endif
    </div>

    <div class="main">
        <nav class="navbar">
            <div class="nav-left">
                <a href="{{ route('dashboard') }}" class="btn-home" style="text-decoration:none;">🏠 Home</a>
            </div>

            <div class="nav-right">
                <span>
                    Login sebagai: <b>{{ auth()->user()->name }}</b>
                    ({{ auth()->user()->role }})
                </span>

                <form action="{{ route('logout') }}" method="POST" style="display:inline; margin-left: 10px;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </nav>

        <hr style="opacity: 0.1;">

        <main class="content">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>