@include('layout.header')

<h3>Edit Buku</h3>

<form action="{{ route('buku.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" required>
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" required>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Penulis</label>
        <input type="text" name="penulis"
               value="{{ $buku->penulis }}" required>
    </div>

    <div class="form-group">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit"
               value="{{ $buku->tahun_terbit }}" required>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ $buku->stok }}" required>
    </div>

    <button type="submit" class="tombol">Update</button>
</form>

<br>
<a href="{{ route('buku.index') }}" class="tombol">Kembali</a>

@include('layout.footer')
