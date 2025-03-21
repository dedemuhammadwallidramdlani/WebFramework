<?php

namespace App\Http\Controllers;

use App\Models\Ekstraksi;
use Illuminate\Http\Request;

class EkstraksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Urutkan berdasarkan kolom yang valid, misalnya 'id' atau 'tanggal_ekstraksi'
        $ekstraksi = Ekstraksi::orderBy('id', 'asc')->paginate(15);
        return view('ekstraksi.index', [
            "ekstraksi" => $ekstraksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ekstraksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $data = $request->validate([
            'bahanbaku_id' => 'required|integer',
            'hasil_ekstraksi' => 'required|numeric',
            'satuan_hasil' => 'required|string', 
            'tanggal_ekstraksi' => 'required|date', 
        ]);

        // Simpan data ke database
        Ekstraksi::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('ekstraksi.index')->with('success', 'Ekstraksi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail data
        $ekstraksi = Ekstraksi::findOrFail($id);
        return view('ekstraksi.show', compact('ekstraksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data untuk diedit
        $ekstraksi = Ekstraksi::findOrFail($id);
        return view('ekstraksi.edit', compact('ekstraksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'bahanbaku_id' => 'required|integer',
            'hasil_ekstraksi' => 'required|numeric',
            'satuan_hasil' => 'required|string', 
            'tanggal_ekstraksi' => 'required|date',
        ]);

        // Ambil data dan update
        $ekstraksi = Ekstraksi::findOrFail($id);
        $ekstraksi->update([
            'bahanbaku_id' => $request->bahanbaku_id,
            'hasil_ekstraksi' => $request->hasil_ekstraksi,
            'satuan_hasil' => $request->satuan_hasil,
            'tanggal_ekstraksi' => $request->tanggal_ekstraksi,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('ekstraksi.index')->with('success', 'Ekstraksi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data
        $ekstraksi = Ekstraksi::findOrFail($id);
        $ekstraksi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('ekstraksi.index')->with('success', 'Ekstraksi deleted successfully.');
    }
}