<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand  text-dark" href="{{ route('warga.dashboard') }}">Iuran Warga</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('beranda') }}">beranda</a></li>
                    <li class="nav-item"><a class="nav-link  text-dark" href="#">Iuran Saya</a></li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>
</body>
</html>
