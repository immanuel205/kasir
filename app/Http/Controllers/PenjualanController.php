<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.create', compact('pelanggans', 'produks'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Simpan ke tabel penjualan
            $penjualan = Penjualan::create([
                'TanggalPenjualan' => now(),
                'TotalHarga' => 0,
                'PelangganID' => $request->PelangganID,
            ]);

            $total = 0;

            foreach ($request->produk as $index => $produkID) {
                $jumlah = $request->jumlah[$index];
                $produk = Produk::findOrFail($produkID);
                $subtotal = $produk->Harga * $jumlah;

                // Kurangi stok
                if ($produk->Stok < $jumlah) {
                    throw new \Exception("Stok untuk {$produk->NamaProduk} tidak cukup.");
                }

                $produk->Stok -= $jumlah;
                $produk->save();

                // Simpan detail
                DetailPenjualan::create([
                    'PenjualanID' => $penjualan->PenjualanID,
                    'ProdukID' => $produkID,
                    'JumlahProduk' => $jumlah,
                    'Subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }

            // Update total
            $penjualan->update(['TotalHarga' => $total]);

            DB::commit();

            // DI SINI YANG PERLU DIUBAH!
            return redirect()->route('penjualan.struk', $penjualan->PenjualanID);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    public function struk($id)
    {
        // Ambil data penjualan beserta relasi pelanggan dan detail produk
        $penjualan = Penjualan::with(['pelanggan', 'details.produk'])->findOrFail($id);

        // Tampilkan view struk
        return view('penjualan.struk', compact('penjualan'));
    }

    
}
