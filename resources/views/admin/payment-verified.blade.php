@extends('admin.template')

@section('content')
<h3 class="mb-4">Daftar Pembayaran (Sudah Dibayar)</h3>
<a href="{{ route('admin.payment') }}" class="btn btn-warning mb-3">Lihat Belum Dibayar</a>

<table class="table table-bordered">
     <thead class="table-dark">  
        <tr>
            <th>Nama Warga</th>
            <th>Periode</th>
            <th>Nominal</th>
            <th>Level</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($payments as $payment)
        <tr>
            <td>{{ $payment->user?->name ?? '-' }}</td>
            <td>{{ ucfirst($payment->period) }}</td>
            <td>Rp{{ number_format($payment->nominal, 0, ',', '.') }}</td>
            <td>{{ $payment->petugas }}</td>
            <td><span class="badge bg-success">Sudah Dibayar</span></td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">Belum ada pembayaran berhasil</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
