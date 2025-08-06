@extends('admin.template')

@section('content')
<h3 class="mb-4">Verifikasi Pembayaran</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $pay)
        <tr>
            <td>{{ $pay->user->name }}</td>
            <td>{{ $pay->category->name }}</td>
            <td>Rp{{ number_format($pay->amount) }}</td>
            <td>
                @if($pay->verified)
                    <span class="badge bg-success">Terverifikasi</span>
                @else
                    <span class="badge bg-warning text-dark">Menunggu</span>
                @endif
            </td>
            <td>
                @if(!$pay->verified)
                <form action="{{ route('payments.verify', $pay->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-success">Verifikasi</button>
                </form>
                @else
                <em>-</em>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
