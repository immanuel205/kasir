@extends('layouts.app')

@section('content')
<h4>Edit Produk</h4>

<form method="POST" action="{{ route('produk.update', $produk->ProdukID) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="NamaProduk" class="form-control" value="{{ $produk->NamaProduk }}">
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="Harga" class="form-control" value="{{ $produk->Harga }}">
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="Stok" class="form-control" value="{{ $produk->Stok }}">
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
