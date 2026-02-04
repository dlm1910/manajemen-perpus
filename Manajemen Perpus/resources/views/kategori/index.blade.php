@include('layout.header')



<h3>Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="tombol">Tambah</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

@foreach ($allKategori as $key => $r)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $r->nama_kategori }}</td>
    <td>
        <form action="{{ route('kategori.destroy', $r->id) }}" method="POST">
            <a href="{{ route('kategori.edit', $r->id) }}" class="tombol">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="tombol" onclick="return confirm('Yakin hapus data?')">
            Hapus
        </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
    </table>

    <br>
<a href="{{ route('dashboard') }}" class="tombol">Home</a>
@include('layout.footer')
    
