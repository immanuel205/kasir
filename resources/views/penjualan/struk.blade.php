<!DOCTYPE html>
<html>
<head>
    <title>Struk Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 400px; margin: auto; border: 1px solid #ccc; padding: 20px; }
        table { width: 100%; margin-top: 10px; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #ddd; padding: 8px; text-align: left; font-size: 14px; }
        .total { font-weight: bold; font-size: 16px; }
        .center { text-align: center; }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <h3 class="center">Struk Penjualan</h3>
        <p><strong>Tanggal:</strong> {{ $penjualan->TanggalPenjualan }}</p>
        <p><strong>Pelanggan:</strong> {{ $penjualan->pelanggan->NamaPelanggan }}</p>

        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan->details as $d)
                <tr>
                    <td>{{ $d->produk->NamaProduk }}</td>
                    <td>{{ $d->JumlahProduk }}</td>
                    <td>Rp{{ number_format($d->produk->Harga, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($d->Subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr class="total">
                    <td colspan="3">Total</td>
                    <td>Rp{{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <p class="center">Terima kasih sudah berbelanja!</p>
    </div>
</body>
</html>
