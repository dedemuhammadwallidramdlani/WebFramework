<?php

namespace App\Exports;

use App\Models\Transaksi; // Import model Transaksi
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // Untuk menambahkan header kolom
use Maatwebsite\Excel\Concerns\WithMapping; // Untuk memetakan data ke baris

class TransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $start_date;
    protected $end_date;
    protected $obat_id;

    public function __construct($start_date, $end_date, $obat_id)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->obat_id = $obat_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc');

        if ($this->start_date) {
            $query->whereDate('tanggal_transaksi', '>=', $this->start_date);
        }
        
        if ($this->end_date) {
            $query->whereDate('tanggal_transaksi', '<=', $this->end_date);
        }

        if ($this->obat_id) {
            $query->where('obat_id', $this->obat_id);
        }
        
        return $query->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Obat',
            'Jumlah',
            'Tanggal Transaksi',
            'Total Harga',
        ];
    }

    /**
     * @param mixed $transaksi
     * @return array
     */
    public function map($transaksi): array
    {
        // Pastikan format tanggal sesuai yang diinginkan di Excel
        $tanggal_formatted = \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y');

        return [
            $transaksi->id, // Atau $loop->iteration jika Anda butuh nomor urut dari 1, tapi biasanya ID lebih relevan untuk data
            $transaksi->obat->nama_obat,
            $transaksi->jumlah,
            $tanggal_formatted,
            $transaksi->total_harga,
        ];
    }
}