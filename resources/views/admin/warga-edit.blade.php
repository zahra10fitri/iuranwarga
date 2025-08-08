@extends('admin.template')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Data Warga</h3>

    <form action="{{ route('admin.warga.update', $warga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $warga->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $warga->username) }}" required>
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">No HP</label>
            <input type="text" name="nohp" class="form-control" value="{{ old('nohp', $warga->nohp) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" required>{{ old('address', $warga->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.warga') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
