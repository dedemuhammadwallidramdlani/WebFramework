<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Obat;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel; // <--- TAMBAHKAN INI
use App\Exports\TransaksiExport;  // Make sure you have the 'barryvdh/laravel-dompdf' package installed and aliased

class TransaksiController extends Controller
{
    /**
     * Display a listing of the Transaksi resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc')->paginate(15);
        return view('transaksi.index', [
            "transaksi" => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new Transaksi.
     */
    public function create()
    {
        $dataobat = Obat::all(); // Sudah benar
        return view('transaksi.create', compact('dataobat'));
    }

    /**
     * Store a newly created Transaksi resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
        ]);
        
        Transaksi::create($data);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not implemented, placeholder
    }

    /**
     * Show the form for editing the specified Transaksi resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak ditemukan.');
        }
        
        $dataobat = Obat::all(); // Sudah benar
        return view('transaksi.edit', compact('transaksi', 'dataobat')); // Sudah benar perbaikannya
    }

    /**
     * Update the specified Transaksi resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak ditemukan.');
        }

        $data = $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $transaksi->update($data);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified Transaksi resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak ditemukan.');
        }

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
    ## Reporting Functionality

    /**
     * Display the report page for transactions.
     */
    public function laporan(Request $request)
    {
        $query = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc');
        
        if ($request->start_date) {
            $query->whereDate('tanggal_transaksi', '>=', $request->start_date);
        }
        
        if ($request->end_date) {
            $query->whereDate('tanggal_transaksi', '<=', $request->end_date);
        }

        // Tambahkan filter berdasarkan obat_id jika ada di request
        if ($request->obat_id) {
            $query->where('obat_id', $request->obat_id);
        }
        
        $transaksi = $query->paginate(15);

        // Hitung total jumlah dan total harga dari hasil query saat ini (sebelum pagination)
        // Lakukan perhitungan ini pada koleksi data yang sudah difilter
        $totalJumlah = $query->sum('jumlah'); // Menggunakan $query sebelum paginate untuk sum semua data yang difilter
        $totalHarga = $query->sum('total_harga'); // Menggunakan $query sebelum paginate untuk sum semua data yang difilter

        $dataobat = Obat::all(); // Ambil semua data obat untuk dropdown filter

        return view('laporan.index', [
            "transaksi" => $transaksi,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "dataobat" => $dataobat, // <--- TERUSKAN VARIABEL INI KE VIEW
            "totalJumlah" => $totalJumlah, // <--- TERUSKAN VARIABEL INI
            "totalHarga" => $totalHarga,   // <--- TERUSKAN VARIABEL INI
            "selected_obat_id" => $request->obat_id, // Teruskan juga obat_id yang sedang dipilih untuk pre-fill dropdown
        ]);
    }

    /**
     * Export the filtered transaction report to PDF.
     */
    public function exportPdf(Request $request)
    {
        $query = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc');
        
        // Apply date filters if present
        if ($request->start_date) {
            $query->whereDate('tanggal_transaksi', '>=', $request->start_date);
        }
        
        if ($request->end_date) {
            $query->whereDate('tanggal_transaksi', '<=', $request->end_date);
        }

        // Tambahkan filter berdasarkan obat_id juga untuk PDF export
        if ($request->obat_id) {
            $query->where('obat_id', $request->obat_id);
        }
        
        $transaksi = $query->get(); // Get semua data yang difilter (tanpa pagination)

        // Perhitungan total untuk PDF (optional, tergantung layout PDF Anda)
        $totalJumlah = $transaksi->sum('jumlah');
        $totalHarga = $transaksi->sum('total_harga');
        
        // Pastikan view laporan.pdf juga menerima variabel yang dibutuhkan
        $pdf = PDF::loadView('laporan.pdf', compact('transaksi', 'totalJumlah', 'totalHarga', 'request'));
        // Jika Anda ingin mengunduh langsung, gunakan download(). Jika ingin menampilkan di browser, gunakan stream().
        return $pdf->stream('laporan-transaksi-'.date('Ymd').'.pdf');
    }
    
    public function exportExcel(Request $request)
    {
        // Buat instance dari TransaksiExport dengan filter yang diterima dari request
        return Excel::download(new TransaksiExport(
            $request->start_date, 
            $request->end_date, 
            $request->obat_id
        ), 'laporan-transaksi-'.date('Ymd-His').'.xlsx');
    }
}