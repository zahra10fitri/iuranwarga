@extends('template')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="mb-4 text-center">Register</h3>

        {{-- Tampilkan pesan jika ada --}}
        @if (session('status'))
            <div class="alert alert-info">{{ session('status') }}</div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username unik" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
            </div>

            <div class="mb-3">
                <label for="nohp" class="form-label">No. HP</label>
                <input type="text" name="nohp" class="form-control" placeholder="Masukkan nomor HP" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Buat kata sandi" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Sandi</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi kata sandi" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Daftar</button>
            </div>

            <p class="text-center mt-3">Sudah punya akun? <a href="{{ url('/login') }}">Masuk di sini</a></p>
        </form>
    </div>
</div>
@endsection
