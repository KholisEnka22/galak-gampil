<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Kitab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Bab';
        $kitab = Kitab::all();
        $bab = Bab::all();

        return view('admin.bab.index', compact('kitab', 'bab','title'));
    }
    public function show($id)
    {
        // $title = 'Daftar Bab';
        // $kitab = Kitab::all();
        $bab = Bab::with('kitab_id',$id)->get();
        
        $data = [
            'title' =>'Daftar Bab',
            'kitab' => new Kitab(),
            'bab' => $bab
        ];
        // $murid = Murid::with('ting_id', $id)->get();

        return view('admin.bab.index', $data);
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
        $validator = Validator::make($request->all(), [
            'kitab_id' => 'required',
            'bab' => 'required|unique:babs,bab,NULL,id,kitab_id,'. $request->input('kitab_id')
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Custom error message');
        }
        $bab = new Bab;
        $bab->kitab_id = $request->input('kitab_id');
        $bab->bab = $request->input('bab');
        $bab->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Bab berhasil ditambahkan.');
    
    }

    /**
     * Display the specified resource.
     */
    // public function show(Bab $bab)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bab $bab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bab $bab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bab $bab)
    {
        //
    }
}
