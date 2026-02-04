@include('layout.header')
<h3>Tambah Peminjaman</h3>

<form action="{{ route('peminjaman.store') }}" method="POST">
    @csrf 
    
    <div class="form-group">
        <label>Anggota</label>
        <select name="anggota_id" class="form-control">
            @foreach($anggota as $a)
                <option value="{{ $a->id }}">{{ $a->nama }}</option>
            @endforeach
        </select>
    </div> <div class="form-group">
        <label>Buku</label>
        <select name="buku_id" class="form-control">
            @foreach($buku as $b)
                <option value="{{ $b->id }}">{{ $b->judul }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="form-control">
    </div>

    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="dipinjam">Dipinjam</option>
            <option value="dikembalikan">Dikembalikan</option>
        </select>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form> @include('layout.footer')