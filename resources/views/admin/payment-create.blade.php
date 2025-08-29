@extends('admin.template')

@section('content')
<h3 class="mb-4">Tambah Pembayaran</h3>

<form action="{{ route('admin.payment.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="iduser" class="form-label">Nama Warga</label>
        <select name="iduser" id="iduser" class="form-control" required>
            <option value="">-- Pilih Warga --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="period" class="form-label">Periode</label>
        <select name="period" id="period" class="form-control" required>
            <option value="mingguan">Mingguan</option>
            <option value="bulanan">Bulanan</option>
            <option value="tahunan">Tahunan</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" name="nominal" id="nominal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="petugas" class="form-label">Petugas</label>
        <input type="text" name="petugas" id="petugas" class="form-control" value="warga" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.payment') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
