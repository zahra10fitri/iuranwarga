@extends('admin.template')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Iuran Warga</h3>

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
            @foreach($dues as $d)
            <tr>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->category->nama_kategori }}</td>
                <td>Rp {{ number_format($d->jumlah, 0, ',', '.') }}</td>
                <td>
                    @if($d->status == 'lunas')
                        <span class="badge bg-success">Lunas</span>
                    @else
                        <span class="badge bg-danger">Belum</span>
                    @endif
                </td>
                <td>{{ $d->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
