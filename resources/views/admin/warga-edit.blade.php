@extends('admin.template')

@section('content')
<h3>Edit Data Warga</h3>

<form action="{{ route('admin.warga.update', $warga->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $warga->name }}" required>
    </div>

    <div class="mb-3">
        <label for="nohp" class="form-label">No HP</label>
        <input type="text" name="nohp" class="form-control" value="{{ $warga->nohp }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea name="address" class="form-control" required>{{ $warga->address }}</textarea>
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select name="level" class="form-control" required>
            <option value="warga" {{ $warga->level == 'warga' ? 'selected' : '' }}>Warga</option>
            <option value="admin" {{ $warga->level == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('admin.warga.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
