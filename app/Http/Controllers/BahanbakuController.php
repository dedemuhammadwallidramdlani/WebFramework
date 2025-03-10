<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahanbaku = Bahanbaku::orderBy('nama', 'asc')->paginate(15);
        return view('bahanbaku.index', [
            "bahanbaku" => $bahanbaku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahanbaku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
        ]);
        Bahanbaku::create($data);

        return redirect('/bahanbaku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Anda mungkin ingin menampilkan detail bahan baku di sini
        $bahanbaku = Bahanbaku::find($id);
        if (!$bahanbaku) {
            return redirect()->route('bahanbaku.index')->with('error', 'Bahan baku tidak ditemukan.');
        }

        return view('bahanbaku.show', compact('bahanbaku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bahanbaku $bahanbaku) // Menggunakan model binding
    {
        return view('bahanbaku.edit', compact('bahanbaku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bahanbaku $bahanbaku) // Menggunakan model binding
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
        ]);

        $bahanbaku->update($request->all());

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahanbaku $bahanbaku) // Menggunakan model binding
    {
        $bahanbaku->delete();

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku deleted successfully.');
    }
}   