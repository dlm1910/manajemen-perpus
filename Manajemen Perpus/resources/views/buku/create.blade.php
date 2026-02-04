@include('layout.header')

<h3>Tambah Buku</h3>

<form action="{{ route('buku.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" name="judul" required>
    </div>

    <div class="form-group">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label>Kategori:</label>
        <select name="kategori_id">
            @foreach($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" required>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" required>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form>

@include('layout.footer')
