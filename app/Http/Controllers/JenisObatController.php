<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_obats = JenisObat::paginate(10);
        return view('jenis-obat.index', compact('jenis_obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenis'    => 'required|min:1',
            'keterangan'   => 'required|min:5',
        ]);

        JenisObat::create($validated);
        return redirect()->route('jenis-obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisObat $jenisObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisObat $jenisObat)
    {
        return view('jenis-obat.edit', compact('jenisObat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisObat $jenisObat)
    {
        $validated = $request->validate([
            'nama_jenis'    => 'required|min:1',
            'keterangan'   => 'required|min:5',
        ]);

        $jenisObat->update($validated);
        return redirect()->route('jenis-obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisObat $jenisObat)
    {
        $jenisObat->delete();
        return redirect()->route('jenis-obat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
