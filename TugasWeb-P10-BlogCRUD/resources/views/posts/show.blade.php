@extends('layouts.app')

@section('title', $post->judul)

@section('content')
    <div class="card">
        @if ($post->gambar)
            <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top" style="height: 350px;" alt="{{ $post->judul }}">
        @endif
        <div class="card-body">
            <span class="badge bg-primary">{{ $post->kategori }}</span>
            <h2 class="mt-2">{{ $post->judul }}</h2>
            <p class="text-muted">
                Ditulis oleh {{ $post->penulis }} pada {{ $post->created_at->format('d M Y, H:i') }}
            </p>
            <hr>
            <p style="white-space: pre-line;">{{ $post->isi }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus artikel ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
