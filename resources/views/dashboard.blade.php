@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="h1">Welcome Back! {{ Auth::user()->name }}</h1>
    
    <!-- Row for the cards -->
    <div class="row mt-4">
        <!-- Total Penjualan Card -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Penjualan</h5>
                    <p class="fs-3 text-success">Rp {{ number_format($total_penjualan, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
        
        <!-- Total Pelanggan Card -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Pelanggan</h5>
                    <p class="fs-3 text-info">{{ $total_pelanggan }} Orang</p>
                </div>
            </div>
        </div>

        <!-- Total Produk Card -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Produk</h5>
                    <p class="fs-3 text-warning">{{ $total_produk }} Item</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
