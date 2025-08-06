@extends('template.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Aplikasi Iuran Kas</h2>
    
    <div class="row">
        <!-- Data Warga Card -->
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title font-weight-bold">15</h3>
                        <p class="card-text">Data Warga</p>
                    </div>
                    <i class="fas fa-user fa-3x opacity-50"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ route('warga.index') }}" class="text-white">
                        Lihat Data <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Iuran Kas Card -->
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title font-weight-bold">6</h3>
                        <p class="card-text">Iuran Kas</p>
                    </div>
                    <i class="fas fa-cash-register fa-3x opacity-50"></i>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ route('iuran.index') }}" class="text-white">
                        Lihat Data <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
