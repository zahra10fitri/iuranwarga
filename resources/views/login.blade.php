@extends('template')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="mb-4 text-center">Login</h3>

        {{-- Tampilkan pesan sukses/error jika ada --}}
        @if (session('status'))
            <div class="alert alert-info">{{ session('status') }}</div>
        @endif

        {{-- Form Login --}}
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email / Username</label>
                <input type="text" name="email" class="form-control" placeholder="Masukkan email atau username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Masuk</button>
            </div>
        </form>

        <p class="text-center mt-3">Belum punya akun? <a href="{{ url('/register') }}">Daftar sekarang</a></p>
    </div>
</div>
@endsection
