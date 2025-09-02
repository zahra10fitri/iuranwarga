@extends('officer.template')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Dashboard Aplikasi Iuran Warga</h2>

    <div class="row">
        <!-- Data Warga -->
        <div class="col-md-3">
            <div class="card text-dark bg-warning mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $totalWarga }}</h4>
                        <small>Data Warga</small>
                    </div>
                    <i class="fas fa-users fa-2x opacity-75"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ route('admin.warga') }}" class="text-dark text-decoration-none">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
            <div class="col-md-3">
            <div class="card text-dark bg-warning mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                       <h4 class="card-title mb-0">
                            Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                            </h4>
                            <small>Total Pembayaran Masuk</small>

                    </div>
                    <i class="fas fa-money-bill-wave fa-2x opacity-75"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ route('admin.payment') }}" class="text-dark text-decoration-none">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>


        <!-- Kategori Iuran -->
        <div class="col-md-3">
            <div class="card text-dark bg-warning mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $totalKategori }}</h4>
                        <small>Kategori Iuran</small>
                    </div>
                    <i class="fas fa-layer-group fa-2x opacity-75"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ route('admin.categories') }}" class="text-dark text-decoration-none">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Petugas / Officer -->
        <div class="col-md-3">
            <div class="card text-dark bg-warning mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $totalPetugas }}</h4>
                        <small>Data Officer</small>
                    </div>
                    <i class="fas fa-user-shield fa-2x opacity-75"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ route('admin.officer') }}" class="text-dark text-decoration-none">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
