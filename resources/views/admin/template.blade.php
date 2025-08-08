<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
        }
        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
       
        .content {
            flex-grow: 1;
            padding: 30px;
        }
        .sidebar .logo {
            font-size: 1.5rem;
            text-align: center;
            padding: 15px 0;
            font-weight: bold;
            background-color: #212529;
           
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">Iuran Warga</div>
    <a href="{{ route('dashboard') }}"><i class="fas fa-home me-2"></i> Dashboard</a>
    <a href="{{ route('admin.warga') }}"><i class="fas fa-users me-2"></i> Data Warga</a>
    <a href="{{ route('admin.payment') }}"><i class="fas fa-money-bill-wave me-2"></i> Pembayaran</a>
    <a href="{{ route('admin.categories') }}"><i class="fas fa-layer-group me-2"></i> Kategori Iuran</a>
    <a href="{{ route('admin.officer') }}"><i class="fas fa-user-shield me-2"></i> Data Officer</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
