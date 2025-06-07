<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; text-align: center; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 18px; font-weight: bold; }
        .period { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">LAPORAN TRANSAKSI OBAT</div>
        <div class="period">
            Periode: {{ request('start_date') ? date('d/m/Y', strtotime(request('start_date'))) : 'Semua' }} 
            - {{ request('end_date') ? date('d/m/Y', strtotime(request('end_date'))) : 'Semua' }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->obat->nama_obat }}</td>
                <td class="text-center">{{ $item->jumlah }}</td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d/m/Y') }}
                </td>
                <td class="text-right">
                    Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td class="text-right">
                    <strong>Rp {{ number_format($transaksi->sum('total_harga'), 0, ',', '.') }}</strong>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>