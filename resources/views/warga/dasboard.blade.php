@extends('warga.template')

@section('content')
<div class="container mt-4">
    <h3>Selamat Datang, {{ $user->name }}</h3>
    <p class="text-muted">Ini adalah dashboard warga untuk memantau iuran Anda.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pembayaran</h5>
                    <p class="card-text">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Iuran</h5>
                    <p class="card-text">{{ $totalIuran }} Kategori</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Iuran Lunas</h5>
                    <p class="card-text">{{ $lunas }} Pembayaran</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
