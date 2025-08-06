@extends('admin.template')

@section('content')
<h3 class="mb-4">Catat Iuran Warga</h3>
<form action="{{ route('payments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">Warga</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach($wargas as $warga)
                <option value="{{ $warga->id }}">{{ $warga->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori Iuran</label>
        <select name="category_id" id="category_id" class="form-select" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Jumlah</label>
        <input type="number" name="amount" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Catat Iuran</button>
</form>
@endsection
