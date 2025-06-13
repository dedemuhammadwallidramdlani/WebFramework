<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Obat;
use App\Models\Bahanbaku;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gudang = Gudang::orderBy('obat_id', 'asc')->paginate(15);
        return view('gudang.index', [
            "gudang" => $gudang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obats = Obat::all();
        $bahanbakus = Bahanbaku::all();
        return view('gudang.create', compact('obats', 'bahanbakus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'obat_id' => 'required',
            'bahanbaku_id' => 'required',
            'jumlah' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        Gudang::create($data);

        return redirect()->route('gudang.index')->with('success', 'Gudang berhasil ditambahkan.');
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
        $gudang = Gudang::findOrFail($id);
        $obats = Obat::all();
        $bahanbakus = Bahanbaku::all();
        return view('gudang.edit', compact('gudang', 'obats', 'bahanbakus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'obat_id' => 'required',
            'bahanbaku_id' => 'required',
            'jumlah' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $gudang = Gudang::findOrFail($id);
        $gudang->update($request->all());

        return redirect()->route('gudang.index')->with('success', 'Gudang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gudang = Gudang::findOrFail($id);
        $gudang->delete();

        return redirect()->route('gudang.index')->with('success', 'Gudang berhasil dihapus.');
    }
}
