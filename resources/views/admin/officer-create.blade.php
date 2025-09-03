@extends('admin.template')

@section('content')
<h3 class="mb-4">Tambah Officer</h3>

<form action="{{ route('admin.officer.store') }}" method="POST">
    @csrf

    {{-- Nama --}}
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{ old('name') }}" required>
    </div>

    {{-- Username --}}
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username"
               value="{{ old('username') }}" required>
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email"
               value="{{ old('email') }}" required>
    </div>

    {{-- Password --}}
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    {{-- Nomor HP --}}
    <div class="mb-3">
        <label for="nohp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="nohp" name="nohp"
               value="{{ old('nohp') }}" required>
    </div>

    {{-- Alamat --}}
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
    </div>

    {{-- Level --}}
    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-select" id="level" name="level" required>
            <option value="officer" {{ old('level') == 'officer' ? 'selected' : '' }}>Officer</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.officer') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
