@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Tambah Artikel Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('posts._form')

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
