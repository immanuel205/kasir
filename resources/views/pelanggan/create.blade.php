@extends('layouts.app')

@section('content')
<h4>Tambah Pelanggan</h4>

<form method="POST" action="{{ route('pelanggan.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Pelanggan</label>
        <input type="text" name="NamaPelanggan" class="form-control">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="Alamat" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="number" name="NomorTelepon" class="form-control" pattern="^\+?[0-9]{10,15}$" title="Nomor telepon harus terdiri dari 10 sampai 15 digit" required>
    </div>
    
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
