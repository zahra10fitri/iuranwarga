@extends('admin.template')

@section('content')
<h3 class="mb-4">Edit Officer</h3>

<form action="{{ route('admin.officer.update', $officer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{ old('name', $officer->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username"
               value="{{ old('username', $officer->username) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email"
               value="{{ old('email', $officer->email) }}" required>
    </div>

    <div class="mb-3">
        <label for="nohp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="nohp" name="nohp"
               value="{{ old('nohp', $officer->nohp) }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $officer->address) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-select" id="level" name="level" required>
            <option value="warga" {{ old('level', $officer->level) == 'warga' ? 'selected' : '' }}>Warga</option>
            <option value="admin" {{ old('level', $officer->level) == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('admin.officer.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
