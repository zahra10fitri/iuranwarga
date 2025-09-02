@extends('admin.template')

@section('content')
<h3 class="mb-4">Tambah Pembayaran</h3>

<form action="{{ route('admin.payment.store') }}" method="POST">
    @csrf

  {{-- Pilih Warga --}}
<div class="mb-3">
    <label for="iduser" class="form-label">Nama Warga</label>
    <select name="iduser" id="iduser" class="form-control" required>
        <option value="">-- Cari & Pilih Warga --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>


    {{-- Pilih Periode --}}
    <div class="mb-3">
        <label for="idduescategory" class="form-label">Periode</label>
        <select name="idduescategory" id="idduescategory" class="form-control" required>
            <option value="">-- Pilih Periode --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" data-nominal="{{ $cat->nominal }}">
                    {{ $cat->period }} (Rp {{ number_format($cat->nominal,0,',','.') }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- Nominal bisa otomatis atau manual --}}
    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" name="nominal" id="nominal" class="form-control" required>
    </div>

    {{-- Petugas --}}
<div class="mb-3">
    <label for="petugas" class="form-label">Petugas</label>
    <select name="petugas" id="petugas" class="form-control" required>
        <option value="">-- Pilih Petugas --</option>
        <option value="warga">Warga</option>
        <option value="officer">Officer</option>
        <option value="admin">Admin</option>
    </select>
</div>


    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.payment') }}" class="btn btn-secondary">Batal</a>
</form>

<script>
    document.getElementById('idduescategory').addEventListener('change', function() {
        let nominal = this.options[this.selectedIndex].getAttribute('data-nominal');
        document.getElementById('nominal').value = nominal;
    });
</script>
@endsection
