@include('layout.header')
<h3>Detail Buku</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td width="150">Judul Buku</td>
        <td width="10">:</td>
        <td>{{ $buku->judul }}</td>
    </tr>
    <tr>
        <td>Tahun Terbit</td>
        <td>:</td>
        <td>{{ $buku->tahun_terbit }}</td>
    </tr>
    <tr>
        <td>Penulis</td>
        <td>:</td>
        <td>{{ $buku->penulis }}</td>
    </tr>
    <tr>
        <td>Stok</td>
        <td>:</td>
        <td>{{ $buku->stok }}</td>
    </tr>
    
</table>
<br>
<a href="{{ route('buku.index') }}" class="tombol">Kembali</a>
@include('layout.footer')
