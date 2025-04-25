<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data total penjualan, total pelanggan, dan total produk
        $totalPenjualan = Penjualan::sum('TotalHarga');
        $totalPelanggan = Pelanggan::count();
        $totalProduk = Produk::count();

        // Ambil data 7 hari terakhir untuk grafik penjualan
        $grafik = Penjualan::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('SUM(TotalHarga) as total_harian')
        )
        ->where('created_at', '>=', Carbon::now()->subDays(6))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy('tanggal')
        ->get();

        return view('dashboard', [
            'total_penjualan' => $totalPenjualan,
            'total_pelanggan' => $totalPelanggan,
            'total_produk' => $totalProduk,
            'grafik' => $grafik, 
        ]);
    }
}
