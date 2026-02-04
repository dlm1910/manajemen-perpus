@include('layout.header')

<h3>Data Peminjaman</h3>

{{-- Tombol Tambah hanya untuk Admin --}}
@if(auth()->user()->role === 'admin')
    <a href="{{ route('peminjaman.create') }}" class="tombol">Tambah</a>
@endif

<table>
<thead>
    <tr>
        <th>No</th>
        <th>Anggota</th>
        <th>Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        {{-- Header Aksi hanya untuk Admin --}}
        @if(auth()->user()->role === 'admin')
            <th>Aksi</th>
        @endif
    </tr>
</thead>

<tbody>
@foreach ($allPeminjaman as $key => $p)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $p->anggota->nama }}</td>
    <td>{{ $p->buku->judul }}</td>
    <td>{{ $p->tanggal_pinjam }}</td>
    <td>{{ $p->tanggal_kembali ?? '-' }}</td>
    <td>{{ $p->status ?? '-' }}</td>

    {{-- Kolom Aksi hanya untuk Admin --}}
    @if(auth()->user()->role === 'admin')
    <td>
        <a href="{{ route('peminjaman.show', $p->id) }}" class="tombol">Detail</a>
        <a href="{{ route('peminjaman.edit', $p->id) }}" class="tombol">Edit</a>

        <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="tombol" onclick="return confirm('Yakin hapus data?')">
                Hapus
            </button>
        </form>
    </td>
    @endif
</tr>
@endforeach
</tbody>
</table>
<br>
<a href="{{ route('dashboard') }}" class="tombol">Home</a>
@include('layout.footer')