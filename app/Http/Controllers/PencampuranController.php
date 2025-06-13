<?php

namespace App\Http\Controllers;

use App\Models\Pencampuran;
use App\Models\Obat;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class PencampuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = Pencampuran::with(['obat', 'bahanbaku']);

    if ($search) {
        $query->whereHas('obat', function ($q) use ($search) {
            $q->where('nama_obat', 'like', '%' . $search . '%');
        })->orWhereHas('bahanbaku', function ($q) use ($search) {
            $q->where('nama_bahan', 'like', '%' . $search . '%');
        });
    }

    $pencampuran = $query->orderBy('tanggal_pencampuran', 'desc')->paginate(10);

    return view('pencampuran.index', compact('pencampuran'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $obat = Obat::all();
    $bahanbaku = BahanBaku::all();

    return view('pencampuran.create', compact('obat', 'bahanbaku'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|integer',
            'bahanbaku_id' => 'required|integer',
            'jumlah_bahanbaku' => 'required|numeric',
            'tanggal_pencampuran' => 'required|date',
        ]);

        Pencampuran::create($request->all());

        return redirect()->route('pencampuran.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pencampuran = Pencampuran::findOrFail($id);
        return view('pencampuran.edit', compact('pencampuran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required|integer',
            'bahanbaku_id' => 'required|integer',
            'jumlah_bahanbaku' => 'required|numeric',
            'tanggal_pencampuran' => 'required|date',
        ]);

        $pencampuran = Pencampuran::findOrFail($id);
        $pencampuran->update($request->all());

        return redirect()->route('pencampuran.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pencampuran = Pencampuran::findOrFail($id);
        $pencampuran->delete();

        return redirect()->route('pencampuran.index')->with('success', 'Data berhasil dihapus.');
    }
}
