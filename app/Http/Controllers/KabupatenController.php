<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kabupaten = Kabupaten::with('provinsi')->get();
        $provinsi = Provinsi::all();
        return view('homes.kabupaten.index', compact('kabupaten', 'provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasiData = $request->validate([
            'kode_kabupaten' => 'required',
            'name' => 'required',
            'provinsi_id' => 'required',
        ]);
        if ($validasiData) {
            $kabupaten =  new Kabupaten();
            $kabupaten->id = $request->kode_kabupaten;
            $kabupaten->provinsi_id = $request->provinsi_id;
            $kabupaten->name = $request->name;
            $kabupaten->save();
            return redirect()->route('kabupatens.index')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('kabupatens.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        //
        $kabupaten = Kabupaten::findOrfail($kabupaten->id);
        return response()->json($kabupaten);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        //
        $validasiData = $request->validate([
            'kode_kabupaten' => 'required',
            'name' => 'required',
            'provinsi_id' => 'required',
        ]);
        if ($validasiData) {
            $kabupaten =  Kabupaten::findOrfail($kabupaten->id);
            $kabupaten->id = $request->kode_kabupaten;
            $kabupaten->provinsi_id = $request->provinsi_id;
            $kabupaten->name = $request->name;
            $kabupaten->save();
            return redirect()->route('kabupatens.index')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('kabupatens.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->route('kabupatens.index')->with('success', "Data berhasil dihapus");
    }
}
