@extends('layouts.app')

@section('content')
<h4>Tambah Produk</h4>

<form method="POST" action="{{ route('produk.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="NamaProduk" class="form-control">
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="Harga" class="form-control">
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="Stok" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
