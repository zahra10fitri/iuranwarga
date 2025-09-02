@extends('officer.template')

@section('content')
<h3 class="mb-4">Kategori Iuran</h3>
<!-- <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a> -->

<table class="table table-bordered">
   <thead class="table-dark">  
    <tr>
        <th>Periode</th>
        <th>Nominal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->period }}</td>
        <td>Rp {{ number_format($cat->nominal, 0, ',', '.') }}</td>
        <td>{{ ucfirst($cat->status) }}</td>
        <td>
                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
