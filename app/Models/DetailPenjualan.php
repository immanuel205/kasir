<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $primaryKey = 'DetailID';

    protected $fillable = ['PenjualanID', 'ProdukID', 'JumlahProduk', 'Subtotal'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'ProdukID');
    }

}
