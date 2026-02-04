@include('layout.header')

<h3>Edit Anggota</h3>

<form action="{{ route('anggota.update', $anggota) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama Anggota:</label>
        <input type="text" name="nama" value="{{ $anggota->nama }}">
    </div>

    <div class="form-group">
        <label>Alamat:</label>
        <input type="text" name="alamat" value="{{ $anggota->alamat }}">
    </div>

    <div class="form-group">
        <label>No HP:</label>
        <input type="text" name="no_hp" value="{{ $anggota->no_hp }}">
    </div>

    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('anggota.index') }}" class="tombol">Kembali</a>
@include('layout.footer')
