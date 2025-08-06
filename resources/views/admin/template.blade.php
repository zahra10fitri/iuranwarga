<!DOCTYPE html>
<html lang="id">
@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Request;
@endphp
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Iuran Warga')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>         

    {{-- Navbar (hanya tampil jika bukan di halaman login/register) --}}
    @if (!Request::is('login') && !Request::is('register'))
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">IURANWARGA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                {{-- Menu Navigasi --}}
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/beranda') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categoriesi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Member</a></li>
                </ul>

                {{-- Auth: Login/Register atau Nama & Logout --}}
                <div class="d-flex gap-2">
                    @if(Auth::check())
                        <span class="navbar-text me-2">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-dark" type="submit">Logout</button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-outline-dark">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-dark">Register</a>
                    @endif
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
