<?php

namespace App\Http\Controllers;

use App\Models\Pencampuran;
use Illuminate\Http\Request;

class PencampuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pencampuran = Pencampuran::orderBy('obat_id')->paginate(15);
        return view('pencampuran.index', [
            "pencampuran" => $pencampuran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pencampuran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'obat_id' => 'required',
            'bahanbaku_id' => 'required',
            'jumlah_bahanbaku' => 'required',
            'tanggal_pencampuran' => 'required',
        ]);
        Pencampuran::create($data);

        return redirect('/pencampuran');
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
        $pencampuran = Pencampuran::find($id);
        if (!$pencampuran) {
            return redirect()->route('pencampuran.index')->with('error', 'Pencampuran not found.');
        }
        return view('pencampuran.edit', compact('pencampuran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pencampuran = Pencampuran::find($id);
        if (!$pencampuran) {
            return redirect()->route('pencampuran.index')->with('error', 'Pencampuran not found.');
        }

        $data = $request->validate([
            'obat_id' => 'required',
            'bahanbaku_id' => 'required',
            'jumlah_bahanbaku' => 'required',
            'tanggal_pencampuran' => 'required',
        ]);

        $pencampuran->update($data);

        return redirect()->route('pencampuran.index')->with('success', 'Pencampuran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pencampuran = Pencampuran::find($id);
        if (!$pencampuran) {
            return redirect()->route('pencampuran.index')->with('error', 'Pencampuran not found.');
        }

        $pencampuran->delete();

        return redirect()->route('pencampuran.index')->with('success', 'Pencampuran deleted successfully.');
    }
}