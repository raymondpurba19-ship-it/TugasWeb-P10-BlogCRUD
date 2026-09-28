@extends('layouts.app')

@section('title', 'Sampah')

@section('content')
    <h3 class="mb-3">Artikel yang Dihapus</h3>

    <table class="table table-bordered bg-white">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Dihapus Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $posts->firstItem() + $loop->index }}</td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->penulis }}</td>
                    <td>{{ $post->deleted_at->format('d M Y H:i') }}</td>
                    <td>
                        <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-success">Kembalikan</button>
                        </form>
                        <form action="{{ route('posts.hapusPermanen', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus permanen? Data tidak bisa dikembalikan')">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Sampah kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
