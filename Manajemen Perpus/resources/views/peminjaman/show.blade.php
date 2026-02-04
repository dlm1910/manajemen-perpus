@include('layout.header')

<h3>Detail Peminjaman</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td width="150">Nama Anggota</td>
        <td width="10">:</td>
        <td>{{ $peminjaman->anggota->nama }}</td>
    </tr>

    <tr>
        <td>Judul Buku</td>
        <td>:</td>
        <td>{{ $peminjaman->buku->judul }}</td>
    </tr>

    <tr>
        <td>Tanggal Pinjam</td>
        <td>:</td>
        <td>{{ $peminjaman->tanggal_pinjam }}</td>
    </tr>

    <tr>
        <td>Tanggal Kembali</td>
        <td>:</td>
        <td>{{ $peminjaman->tanggal_kembali ?? '-' }}</td>
    </tr>

    <tr>
        <td>Status</td>
        <td>:</td>
        <td>{{ $peminjaman->status }}</td>
    </tr>
</table>

<br>
<a href="{{ route('peminjaman.index') }}" class="tombol">Kembali</a>

@include('layout.footer')
