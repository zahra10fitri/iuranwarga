@extends('officer.template')

@section('content')
<h3 class="mb-4">Edit Pembayaran</h3>

<form action="{{ route('admin.payment.update', $payment->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="iduser" class="form-label">Nama Warga</label>
        <select name="iduser" id="iduser" class="form-control" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $payment->iduser == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="period" class="form-label">Periode</label>
        <select name="period" id="period" class="form-control" required>
            <option value="mingguan" {{ $payment->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
            <option value="bulanan" {{ $payment->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
            <option value="tahunan" {{ $payment->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $payment->nominal }}" required>
    </div>

    <div class="mb-3">
        <label for="petugas" class="form-label">Petugas</label>
        <input type="text" name="petugas" id="petugas" class="form-control" value="{{ $payment->petugas }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('admin.payment') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
