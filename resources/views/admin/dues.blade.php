@extends('officer.template')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Iuran Warga</h3>

    {{-- Ganti route di bawah ke `admin.dues.create` kalau kamu masih pakai prefix admin --}}
   <a href="{{ route('admin.dues.create') }}" class="btn btn-primary mb-3">Tambah Iuran</a>


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Warga</th>
                <th>Kategori Iuran</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dues as $d)
                <tr>
                   <td>{{ $d->user->name ?? '-' }}</td>
                   <td>{{ $d->category ? $d->category->period : '-' }}</td>
                   <td>Rp {{ number_format($d->jumlah, 0, ',', '.') }}</td>

                    </td>
                    <td>
                        @if(($d->status ?? 'belumBayar') === 'verified')
                            <span class="badge bg-success">Lunas</span>
                        @else
                            <span class="badge bg-danger">Belum</span>
                        @endif
                    </td>
                    <td>{{ optional($d->created_at)->format('d-m-Y') ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data iuran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
