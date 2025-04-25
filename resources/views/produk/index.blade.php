@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Produk</h4>
    <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->NamaProduk }}</td>
            <td>Rp {{ number_format($p->Harga, 0, ',', '.') }}</td>
            <td>{{ $p->Stok }}</td>
            <td>
                <a href="{{ route('produk.edit', $p->ProdukID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('produk.destroy', $p->ProdukID) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin hapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
