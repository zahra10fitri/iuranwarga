@extends('template')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="fw-bold mb-3">Mencatat pemasukan, pengeluaran, iuran dan Arisan</h1>
    <p class="mb-4">
        Aplikasi keuangan digital pribadi, mencatat pemasukan, biaya / pengeluaran, kartu iuran dan arisan dengan mudah
    </p>

    <div class="d-flex justify-content-center">
        <img src="{{ asset('assets/google-play.png') }}" alt="Google Play" style="height:60px; margin-right:10px;">
        <img src="{{ asset('assets/app-store.png') }}" alt="App Store" style="height:60px;">
    </div>
</div>
@endsection
