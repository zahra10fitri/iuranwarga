@extends('warga.template')

@section('content')
<div class="container mt-4">
    <!-- Selamat Datang -->
    <div class="text-center mb-4">
        <h3>Selamat Datang, <strong>{{ Auth::user()->name }}</strong> 👋</h3>
        <p class="text-muted">Ini adalah dashboard iuran warga Anda</p>
    </div>

    <div class="row justify-content-center">
        <!-- Total Warga -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $totalWarga }}</h4>
                        <small>Total Warga</small>
                    </div>
                    <i class="fas fa-users fa-2x opacity-75"></i>
                </div>
            </div>
        </div>

        <!-- Total Pembayaran Keseluruhan -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $totalPembayaran }}</h4>
                        <small>Total Pembayaran Keseluruhan</small>
                    </div>
                    <i class="fas fa-money-bill-wave fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- (Opsional) Total pembayaran saya -->
        @isset($pembayaranSaya)
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $pembayaranSaya }}</h4>
                        <small>Pembayaran Saya</small>
                    </div>
                    <i class="fas fa-wallet fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
        @endisset
    </div>
</div>
@endsection
