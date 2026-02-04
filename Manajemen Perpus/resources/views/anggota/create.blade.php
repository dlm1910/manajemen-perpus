@include('layout.header')
    <h3>Buat Anggota</h3>
    <form action="{{ route('anggota.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama Anggota:</label>
            <input type="text" name="nama" id="" placeholder="Masukkan nama anggota">
</div>
<div class="form-group">
            <label for="">Alamat:</label>
            <input type="text" name="alamat" id="" placeholder="Masukkan alamat anggota">
</div>
<div class="form-group">
            <label for="">No Hp:</label>
            <input type="text" name="no_hp" id="" placeholder="Masukkan nomor anggota">
</div>
<button type="submit" class="tombol">submit</button>
</form>

@include('layout.footer')
    
