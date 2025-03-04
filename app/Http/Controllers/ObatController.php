<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Obat = Obat::when(request()->search, function ($Obat) {
            $Obat = $Obat->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);
        return view('Obat.index', compact('Obat'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string',
            'deskripsi' => 'required|string',
            'stok' => 'required|string',
            'harga' => 'required|integer',
        ]);

        try {
            $user = new User([
                'nama_obat'  => $request->nama_Obat,
                'deskripsi' => $request->deskripsi,
                'stock' => $request->stock,
                'harga' => $request->harga,
                
            ]);

            $user->save();
            return redirect()->route('obat.index')
            ->with('success', 'User '.$user->name.' has been added successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
