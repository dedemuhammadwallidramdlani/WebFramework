<?php

namespace App\Http\Controllers;

use App\Models\Ekstraksi;
use App\Models\Bahanbaku;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EkstraksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekstraksi = Ekstraksi::with('bahanbaku')->orderBy('id', 'asc')->paginate(15);
        return view('ekstraksi.index', compact('ekstraksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahanbakus = Bahanbaku::orderBy('nama')->get();
        return view('ekstraksi.create', compact('bahanbakus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'bahanbaku_id' => ['required', 'integer', Rule::exists('bahanbakus', 'id')],
            'hasil_ekstraksi' => 'required|numeric',
            'satuan_hasil' => 'required|string',
            'tanggal_ekstraksi' => 'required|date',
        ]);

        Ekstraksi::create($data);

        return redirect()->route('ekstraksi.index')->with('success', 'Ekstraksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ekstraksi = Ekstraksi::with('bahanbaku')->findOrFail($id);
        return view('ekstraksi.show', compact('ekstraksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ekstraksi = Ekstraksi::findOrFail($id);
        $bahanbakus = Bahanbaku::orderBy('nama')->get();
        return view('ekstraksi.edit', compact('ekstraksi', 'bahanbakus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bahanbaku_id' => ['required', 'integer', Rule::exists('bahanbakus', 'id')],
            'hasil_ekstraksi' => 'required|numeric',
            'satuan_hasil' => 'required|string',
            'tanggal_ekstraksi' => 'required|date',
        ]);

        $ekstraksi = Ekstraksi::findOrFail($id);
        $ekstraksi->update([
            'bahanbaku_id' => $request->bahanbaku_id,
            'hasil_ekstraksi' => $request->hasil_ekstraksi,
            'satuan_hasil' => $request->satuan_hasil,
            'tanggal_ekstraksi' => $request->tanggal_ekstraksi,
        ]);

        return redirect()->route('ekstraksi.index')->with('success', 'Ekstraksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekstraksi = Ekstraksi::findOrFail($id);
        $ekstraksi->delete();

        return redirect()->route('ekstraksi.index')->with('success', 'Ekstraksi berhasil dihapus.');
    }
}
