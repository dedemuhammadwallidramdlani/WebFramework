<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Obat;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiExport;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc')->paginate(15);
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $dataobat = Obat::all();
        return view('transaksi.create', compact('dataobat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        $obat = Obat::findOrFail($request->obat_id);
        $totalHarga = $obat->harga * $request->jumlah;

        Transaksi::create([
            'obat_id' => $obat->id,
            'jumlah' => $request->jumlah,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
    }

    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $dataobat = Obat::all();
        return view('transaksi.edit', compact('transaksi', 'dataobat'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $obat = Obat::findOrFail($request->obat_id);
        $totalHarga = $obat->harga * $request->jumlah;

        $transaksi->update([
            'obat_id' => $obat->id,
            'jumlah' => $request->jumlah,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function laporan(Request $request)
    {
        $query = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc');

        if ($request->start_date) {
            $query->whereDate('tanggal_transaksi', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('tanggal_transaksi', '<=', $request->end_date);
        }

        if ($request->obat_id) {
            $query->where('obat_id', $request->obat_id);
        }

        $transaksi = $query->paginate(15);
        $totalJumlah = $query->sum('jumlah');
        $totalHarga = $query->sum('total_harga');
        $dataobat = Obat::all();

        return view('laporan.index', [
            "transaksi" => $transaksi,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "dataobat" => $dataobat,
            "totalJumlah" => $totalJumlah,
            "totalHarga" => $totalHarga,
            "selected_obat_id" => $request->obat_id,
        ]);
    }

    public function exportPdf(Request $request)
    {
        $query = Transaksi::with('obat')->orderBy('tanggal_transaksi', 'desc');

        if ($request->start_date) {
            $query->whereDate('tanggal_transaksi', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('tanggal_transaksi', '<=', $request->end_date);
        }

        if ($request->obat_id) {
            $query->where('obat_id', $request->obat_id);
        }

        $transaksi = $query->get();
        $totalJumlah = $transaksi->sum('jumlah');
        $totalHarga = $transaksi->sum('total_harga');

        $pdf = PDF::loadView('laporan.pdf', compact('transaksi', 'totalJumlah', 'totalHarga', 'request'));
        return $pdf->stream('laporan-transaksi-' . date('Ymd') . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new TransaksiExport(
            $request->start_date,
            $request->end_date,
            $request->obat_id
        ), 'laporan-transaksi-' . date('Ymd-His') . '.xlsx');
    }
}
