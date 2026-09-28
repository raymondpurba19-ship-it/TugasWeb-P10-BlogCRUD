@extends('layouts.app')

@section('title', 'Semua Artikel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Artikel</h3>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Tambah Artikel</a>
    </div>

    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari judul atau penulis..." value="{{ $cari }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
            @if ($cari)
                <a href="{{ route('posts.index') }}" class="btn btn-outline-danger">Reset</a>
            @endif
        </div>
    </form>

    @if ($cari)
        <p>Hasil pencarian untuk: <b>{{ $cari }}</b></p>
    @endif

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-4">
                <x-card :post="$post">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus artikel ini?')">Hapus</button>
                    </form>
                </x-card>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary">Belum ada artikel.</div>
            </div>
        @endforelse
    </div>

    {{ $posts->links() }}
@endsection
