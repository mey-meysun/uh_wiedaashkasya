<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisObat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_obat = JenisObat::all();
        $obat = Obat::all();
        return view('obat.index', compact('obat', 'jenis_obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_obat = JenisObat::all();
        return view('obat.index', compact('jenis_obat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|min:1',
            'harga'    => 'required|numeric',
            'pabrik'    => 'required|min:1',
            'jenis'    => 'required',
            'gambar'    => 'required|image|mimes:jpeg,jpg,png|max:20048',

        ]);

        $gambar = $request->file('gambar')->store('obats', 'public');

        $validated['gambar'] = $gambar;

        Obat::create($validated);
        return redirect()->route('obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        $jenis_obats = JenisObat::all();
        return view('obat.edit', compact('obat', 'jenis_obats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $validated = $request->validate([
            'nama'    => 'required|min:1',
            'harga'    => 'required|numeric',
            'pabrik'    => 'required|min:1',
            'jenis'    => 'required',
            'gambar'    => 'required|image|mimes:jpeg,jpg,png|max:20048',

        ]);

        if ($request->hasFile('foto')) {
            $gambar = $request->file('gambar')->store('obats', 'public');
            $validated['gambar'] = $gambar;
        }


        $obat->update($validated);
        return redirect()->route('obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
