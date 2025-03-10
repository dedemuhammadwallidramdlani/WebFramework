<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
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
        return view('gudang.create');
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
            'tanggal_kadaluarsa' => 'required|date', //Perbaikan validasi
        ]);
        Gudang::create($data);

        return redirect('/gudang');
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
        $gudang = Gudang::find($id); // Ambil data gudang berdasarkan ID
        return view('gudang.edit', compact('gudang'));
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
            'tanggal_kadaluarsa' => 'required|date', //Perbaikan validasi
        ]);

        $gudang = Gudang::find($id); // Ambil data gudang berdasarkan ID
        $gudang->update($request->all());

        return redirect()->route('gudang.index')->with('success', 'Gudang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gudang = Gudang::find($id); // Ambil data gudang berdasarkan ID
        $gudang->delete();

        return redirect()->route('gudang.index')->with('success', 'Gudang deleted successfully.');
    }
}