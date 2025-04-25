@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Pelanggan</h4>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">+ Tambah Pelanggan</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pelanggans as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->NamaPelanggan }}</td>
            <td>{{ $p->Alamat }}</td>
            <td>{{ $p->NomorTelepon }}</td>
            <td>
                <a href="{{ route('pelanggan.edit', $p->PelangganID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pelanggan.destroy', $p->PelangganID) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin ingin hapus?')">
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
