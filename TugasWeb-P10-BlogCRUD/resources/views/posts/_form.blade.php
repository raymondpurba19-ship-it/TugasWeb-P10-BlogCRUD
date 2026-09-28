<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $post->judul ?? '') }}">
    @error('judul')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Penulis</label>
    <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $post->penulis ?? '') }}">
    @error('penulis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
        <option value="">-- Pilih Kategori --</option>
        @foreach (['Teknologi', 'Tutorial', 'Kuliah', 'Lainnya'] as $kat)
            <option value="{{ $kat }}" {{ old('kategori', $post->kategori ?? '') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
        @endforeach
    </select>
    @error('kategori')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Isi Artikel</label>
    <textarea name="isi" rows="8" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $post->isi ?? '') }}</textarea>
    @error('isi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Gambar (opsional)</label>
    @if (isset($post) && $post->gambar)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $post->gambar) }}" width="150" class="rounded">
            <small class="text-muted d-block">Kosongkan kalau tidak mau ganti gambar</small>
        </div>
    @endif
    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
    @error('gambar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
