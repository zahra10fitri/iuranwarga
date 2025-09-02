@extends('officer.template')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Kategori Iuran</h3>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="period" class="form-label">Periode</label>
            <select name="period" class="form-control" required>
                <option value="harian" {{ $category->period == 'harian' ? 'selected' : '' }}>Harian</option>
                <option value="mingguan" {{ $category->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $category->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $category->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" name="nominal" value="{{ $category->nominal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ $category->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $category->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
