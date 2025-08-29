@extends('admin.template')

@section('content')
<h3 class="mb-4">Daftar Pembayaran (Belum Dibayar)</h3>
<a href="{{ route('admin.payment.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
<a href="{{ route('admin.payment.verified') }}" class="btn btn-success mb-3">Lihat Sudah Dibayar</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Warga</th>
            <th>Periode</th>
            <th>Nominal</th>
            <th>Petugas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($payments as $payment)
        <tr>
            <td>{{ $payment->user?->name ?? '-' }}</td>
            <td>{{ ucfirst($payment->period) }}</td>
            <td>Rp{{ number_format($payment->nominal, 0, ',', '.') }}</td>
            <td>{{ $payment->petugas }}</td>
            <td><span class="badge bg-warning text-dark">Belum Dibayar</span></td>
            <td>
                <form action="{{ route('admin.payment.verify', $payment->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Verifikasi pembayaran ini?')">
                        Verify
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Tidak ada data</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
