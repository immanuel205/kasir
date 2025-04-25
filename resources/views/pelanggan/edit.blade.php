@extends('layouts.app')

@section('content')
<h4>Edit Pelanggan</h4>

<form method="POST" action="{{ route('pelanggan.update', $pelanggan->PelangganID) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Pelanggan</label>
        <input type="text" name="NamaPelanggan" class="form-control" value="{{ $pelanggan->NamaPelanggan }}">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="Alamat" class="form-control">{{ $pelanggan->Alamat }}</textarea>
    </div>
    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="number" name="NomorTelepon" class="form-control" value="{{ $pelanggan->NomorTelepon }}">
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
