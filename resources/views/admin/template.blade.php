<!DOCTYPE html>
<html lang="id">
@php
    use Illuminate\Support\Facades\Auth;
@endphp
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Iuran Warga - Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>         

    {{-- Navbar khusus admin --}}
    @if (Auth::check() && Auth::user()->level === 'admin')
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">ADMIN - IURANWARGA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                {{-- Menu Navigasi Admin --}}
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Kategori Iuran</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Data Warga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Petugas</a></li>
                </ul>

                {{-- Info User & Logout --}}
                <div class="d-flex gap-2">
                    <span class="navbar-text me-2">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endif

    {{-- Konten Dinamis --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
