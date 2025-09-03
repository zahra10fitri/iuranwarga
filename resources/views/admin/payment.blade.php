@extends('officer.template')


@section('content')
<h3 class="mb-4">
    @if (request()->routeIs('admin.payment.verified'))
        Daftar Pembayaran <span class="text-success">Sudah Bayar</span>
    @elseif (request()->routeIs('admin.payment'))
        Daftar Pembayaran <span class="text-warning">Belum Bayar</span>
    @endif
</h3>

<div class="mb-3 d-flex justify-content-between">
    <div>
        <a href="{{ route('admin.payment.verified') }}" 
           class="btn {{ request()->routeIs('admin.payment.verified') ? 'btn-dark' : 'btn-success' }}">
           Sudah Bayar
        </a>
        <a href="{{ route('admin.payment.create') }}" class="btn btn-warning">
            Tambah Pembayaran
        </a>
    </div>
</div>

<table class="table table-bordered">
     <thead class="table-dark">  
        <tr>
            <th>Nama Warga</th>
            <th>Periode</th>
            <th>Nominal</th>
            <th>Level</th>
            <th>Status</th>
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
                @if($payment->status === 'verified')
                    <span class="badge bg-success">Sudah Dibayar</span>
                @else
                    <span class="badge bg-warning text-dark">Belum Dibayar</span>
                @endif
            </td>
            <td>
                @if($payment->status !== 'verified')
                    {{-- Tombol Verify --}}
                    <form action="{{ route('admin.payment.verify', $payment->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Verifikasi pembayaran ini?')">
                            Verify
                        </button>
                    </form>
                @else
                    <span class="text-muted">✔ Sudah Diverifikasi</span>
                @endif

                {{-- Tombol Edit --}}
                <a href="{{ route('admin.payment.edit', $payment->id) }}" class="btn btn-primary btn-sm">
                    Edit
                </a>

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.payment.destroy', $payment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pembayaran ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
