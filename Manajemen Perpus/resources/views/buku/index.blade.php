@include('layout.header')
<h3>Data Buku</h3>
@auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('buku.create') }}" class="tombol">Tambah</a>
    @endif
@endauth
<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun</th>
        <th>Stok</th>
        {{-- Sembunyikan header Aksi jika bukan admin --}}
        @if(auth()->user()->role === 'admin')
            <th>Aksi</th>
        @endif
    </tr>
@foreach($buku as $b)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $b->judul }}</td>
    <td>{{ $b->penulis }}</td>
    <td>{{ $b->tahun_terbit }}</td>
    <td>{{ $b->stok }}</td>
    <td>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('buku.show', $b->id) }}" class="tombol">Detail</a>
            <a href="{{ route('buku.edit', $b->id) }}" class="tombol">Edit</a>
            <form action="{{ route('buku.destroy', $b->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="tombol" onclick="return confirm('Yakin hapus data?')">
            Hapus
        </button>
              </form>
        @endif
    </td>
</tr>
@endforeach
</table>
<br>
<a href="{{ route('dashboard') }}" class="tombol">Home</a>
@include('layout.footer')
