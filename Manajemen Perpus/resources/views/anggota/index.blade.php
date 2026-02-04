@include('layout.header')

<h3>Anggota</h3>
<a href="{{ route('anggota.create') }}" class="tombol">Tambah</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Alamat Anggota</th>
            <th>Nomer Anggota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allAnggota as $key => $r)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $r->nama }}</td>
            <td>{{ $r->alamat }}</td>
            <td>{{ $r->no_hp }}</td>
            <td>
                <a href="{{ route('anggota.edit', $r->id) }}" class="tombol">Edit</a>

                <form action="{{ route('anggota.destroy', $r->id) }}"
                      method="POST"
                      style="display:inline;">
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
