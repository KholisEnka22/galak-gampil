<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Kitab;
use Illuminate\Http\Request;

class KitabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'page' => 'Daftar Kitab',
            'title' => 'Daftar Kitab',
            'kitab' => Kitab::all()
        ];
        return view('admin.kitab.index',$data);
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
        $validatedData = $request->validate([
            'nama_kitab' => 'required',
        ]);

        $kitab = new Kitab();
        $kitab->nama_kitab = $validatedData['nama_kitab'];

        $kitab->save();

        return redirect()->route('kitab')->with('success', 'Kitab berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id,$slug)
    {
        $data = [
            'page' => 'Detail Kitab',
            'title' => 'Detail Kitab',
            'kitab' => Kitab::find($id),
            'bab' => Bab::find('kitab_id')
        ];
        
        return view('admin.kitab.detail', $data);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kitab $kitab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kitab' => 'required',
        ]);

        $kitab = Kitab::findOrFail($id);
        $kitab->nama_kitab = $validatedData['nama_kitab'];
        // Tambahkan atribut lainnya jika ada

        $kitab->update();

        return redirect()->route('kitab')->with('success', 'Kitab berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kitab = Kitab::findOrFail($id);
        $kitab->delete();

        return redirect()->route('kitab')->with('success', 'Kitab berhasil dihapus.');
    }

}