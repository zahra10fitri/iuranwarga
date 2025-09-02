@extends('warga.template')

@section('content')
<div class="container mt-4">
    <!-- Selamat Datang -->
    <div class="text-center mb-4">
        <h3>Selamat Datang, <strong>{{ Auth::user()->name }}</strong> 👋</h3>
        <p class="text-muted">Ini adalah dashboard iuran warga Anda</p>
    </div>

    <!-- Row utama -->
    <div class="row justify-content-center">
        <!-- Data Warga -->
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card text-white bg-success shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">{{ $totalWarga }}</h4>
                        <small>Data Warga</small>
                    </div>
                    <i class="fas fa-users fa-2x opacity-75"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ route('admin.warga') }}" class="text-white text-decoration-none">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

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

        <!-- Total Pembayaran Keseluruhan -->
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card text-white bg-primary shadow-sm h-100">
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
                    <a href="{{ route('admin.payment') }}" class="text-white text-decoration-none">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- (Opsional) Total pembayaran saya -->
        @isset($pembayaranSaya)
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card text-white bg-info shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">
                            Rp {{ number_format($pembayaranSaya, 0, ',', '.') }}
                        </h4>
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
