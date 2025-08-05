@extends('template')

@section('title', 'Beranda')

@section('content')
    <div class="text-center">
        <h1>Selamat Datang di Aplikasi Iuran Warga</h1>
        <p class="mt-3">Aplikasi ini membantu mencatat pemasukan, pengeluaran, iuran, dan arisan warga dengan mudah dan rapi.</p>
        
        <div class="d-flex justify-content-center mt-4">
            <img src="{{ asset('assets/google-play.png') }}" alt="Google Play" height="60" class="me-3">
            <img src="{{ asset('assets/app-store.png') }}" alt="App Store" height="60">
        </div>
    </div>
@endsection
