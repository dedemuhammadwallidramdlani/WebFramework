<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('obat_id')->paginate(15);
        return view('transaksi.index', [
            "transaksi" => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'obat_id' => 'required',
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required',
            'total_harga' => 'required',
        ]);
        Transaksi::create($data);

        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi not found.');
        }
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi not found.');
        }

        $data = $request->validate([
            'obat_id' => 'required',
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required',
            'total_harga' => 'required',
        ]);

        $transaksi->update($data);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi not found.');
        }

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}