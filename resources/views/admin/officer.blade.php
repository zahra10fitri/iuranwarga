@extends('admin.template')

@section('title', 'Data Petugas')

@section('content')
<div class="container">
    <h1 class="my-4">Data Petugas</h1>

    <a href="{{ route('admin.officer.create') }}" class="btn btn-warning mb-3">+ Tambah Petugas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>level</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($officers as $officer)
            <tr>
                <td>{{ $loop->iteration }}</td>
               <td>{{ $officer->user->name }}</td>
                <td>{{ $officer->user->username }}</td>
                <td>{{ $officer->user->email }}</td>
                <td>{{ $officer->user->nohp }}</td>
                <td>{{ $officer->user->address }}</td>
                 <td>{{ $officer->user->level }}</td>
                  <td>
                    <a href="{{ route('admin.officer.edit', $officer->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.officer.destroy', $officer->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus petugas ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data petugas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
