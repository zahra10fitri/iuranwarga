@extends('admin.template')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Tambah Iuran Warga</h3>

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah --}}
    <form action="{{ route('admin.dues.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="iduser" class="form-label">Nama Warga</label>
            <select name="iduser" id="iduser" class="form-control" required>
                <option value="">-- Pilih Warga --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->username }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idduescategory" class="form-label">Kategori Iuran</label>
            <select name="idduescategory" id="idduescategory" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Iuran</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah iuran" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="belum">Belum Lunas</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
