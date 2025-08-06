@extends('admin.template')

@section('content')
<h3 class="mb-4">Data Warga</h3>
<a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">Tambah Warga</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wargas as $warga)
        <tr>
            <td>{{ $warga->name }}</td>
            <td>{{ $warga->nohp }}</td>
            <td>{{ $warga->address }}</td>
            <td>
                <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('warga.destroy', $warga->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
