<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::orderBy('judul')->paginate(15); // Perbaikan: gunakan Laporan::
        return view('laporan.index', [
            "laporan" => $laporan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_laporan' => 'required',
        ]);
        Laporan::create($data);

        return redirect('/laporan');
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
        $laporan = Laporan::find($id); // Ambil data berdasarkan ID
        if (!$laporan) {
            return redirect()->route('laporan.index')->with('error', 'Laporan not found.');
        }
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laporan = Laporan::find($id); // Ambil data berdasarkan ID
        if (!$laporan) {
            return redirect()->route('laporan.index')->with('error', 'Laporan not found.');
        }

        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_laporan' => 'required',
        ]);

        $laporan->update($data); // Gunakan $data untuk update

        return redirect()->route('laporan.index')->with('success', 'Laporan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::find($id); // Ambil data berdasarkan ID
        if (!$laporan) {
            return redirect()->route('laporan.index')->with('error', 'Laporan not found.');
        }

        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan deleted successfully.');
    }
}