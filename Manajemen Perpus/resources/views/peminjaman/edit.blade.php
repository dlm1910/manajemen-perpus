@include('layout.header')

<h3>Edit Peminjaman</h3>

<form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Anggota</label>
        <select name="anggota_id" class="form-control">
    @foreach($anggota as $a)
        <option value="{{ $a->id }}" {{ isset($peminjaman) && $peminjaman->anggota_id == $a->id ? 'selected' : '' }}>
            {{ $a->nama }} </option>
    @endforeach
</select>
    </div>
    

    <div class="form-group">
        <label>Buku</label>
        <select name="buku_id">
            @foreach($buku as $b)
                <option value="{{ $b->id }}"
                    {{ $peminjaman->buku_id == $b->id ? 'selected' : '' }}>
                    {{ $b->judul }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam"
               value="{{ $peminjaman->tanggal_pinjam }}">
    </div>

    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali"
               value="{{ $peminjaman->tanggal_kembali }}">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>
                Dipinjam
            </option>
            <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>
                Dikembalikan
            </option>
        </select>
    </div>

    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('peminjaman.index') }}" class="tombol">Kembali</a>

@include('layout.footer')
