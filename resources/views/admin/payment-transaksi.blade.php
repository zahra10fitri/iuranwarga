@extends('officer.template')

@section('content')
<h3 class="mb-4">Detail Transaksi Pembayaran</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 mb-3">
    <p><strong>Nama Warga:</strong> {{ $payment->user?->name ?? '-' }}</p>
    <p><strong>Periode:</strong> {{ ucfirst($payment->period) }}</p>
    <p><strong>Nominal:</strong> Rp{{ number_format($payment->nominal, 0, ',', '.') }}</p>
    <p><strong>Petugas:</strong> {{ $payment->petugas }}</p>
    <p><strong>Status:</strong> 
        <span class="badge bg-success">Sudah Diverifikasi</span>
    </p>
</div>

{{-- Tombol Bayar --}}
<form action="{{ route('admin.payment.complete', $payment->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">
        Bayar Sekarang
    </button>
</form>
@endsection
