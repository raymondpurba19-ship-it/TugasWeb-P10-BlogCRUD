@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Artikel</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('posts._form')

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
