@props(['post'])

<div class="card h-100 shadow-sm">
    @if ($post->gambar)
        <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top" alt="{{ $post->judul }}">
    @endif

    <div class="card-body">
        <span class="badge bg-primary mb-2">{{ $post->kategori }}</span>
        <h5 class="card-title">{{ $post->judul }}</h5>
        <p class="text-muted small mb-2">
            Oleh {{ $post->penulis }} | {{ $post->created_at->format('d M Y') }}
        </p>
        <p class="card-text">{{ Str::limit($post->isi, 100) }}</p>
    </div>

    <div class="card-footer bg-white">
        {{ $slot }}
    </div>
</div>
