@extends('admin.template')

@section('content')
<h3 class="mb-4">Daftar Pembayaran</h3>
<a href="{{ route('admin.payments-create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Warga</th>
            <th>Periode</th>
            <th>Nominal</th>
            <th>Petugas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $payment)
        <tr>
            <td>{{ $payment->user?->name ?? '-' }}</td>
            <td>{{ ucfirst($payment->period) }}</td>
            <td>Rp{{ number_format($payment->nominal, 0, ',', '.') }}</td>
            <td>{{ $payment->petugas }}</td>
            <td>
                <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pembayaran ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
