<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Blog Ku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        footer {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Blog Ku</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('posts.index') }}">Semua Artikel</a>
                <a class="nav-link" href="{{ route('posts.create') }}">Tulis Artikel</a>
                <a class="nav-link" href="{{ route('posts.sampah') }}">Sampah</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('sukses'))
            <x-alert type="success" :message="session('sukses')" />
        @endif

        @if (session('gagal'))
            <x-alert type="danger" :message="session('gagal')" />
        @endif

        @yield('content')
    </div>

    <footer class="text-center text-muted py-3 border-top">
        <small>Tugas Pertemuan 10 - Blog CRUD Laravel</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
