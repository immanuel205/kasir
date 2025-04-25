@extends('layouts.app')

@section('content')
<h4>Transaksi Penjualan</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('penjualan.store') }}">
    @csrf
    <div class="mb-3">
        <label>Pilih Pelanggan</label>
        <select name="PelangganID" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach($pelanggans as $p)
                <option value="{{ $p->PelangganID }}">{{ $p->NamaPelanggan }}</option>
            @endforeach
        </select>
    </div>

    <div id="produk-wrapper">
        <div class="row mb-2">
            <div class="col-md-6">
                <select name="produk[]" class="form-select" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produks as $p)
                        <option value="{{ $p->ProdukID }}">{{ $p->NamaProduk }} - Rp{{ $p->Harga }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-produk">✕</button>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" id="tambah-produk">+ Tambah Produk</button>
    <br>
    <button class="btn btn-primary">Simpan Transaksi</button>
</form>

<script>
    document.getElementById('tambah-produk').addEventListener('click', function () {
        let wrapper = document.getElementById('produk-wrapper');
        let clone = wrapper.children[0].cloneNode(true);
        clone.querySelectorAll('input, select').forEach(el => el.value = '');
        wrapper.appendChild(clone);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-produk')) {
            let row = e.target.closest('.row');
            if (document.querySelectorAll('#produk-wrapper .row').length > 1) {
                row.remove();
            }
        }
    });
</script>
@endsection
