<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('homes.provinsi.index', compact('provinsi'));
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
            'kode_provinsi' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $provinsi =  new Provinsi();
            $provinsi->id = $request->kode_provinsi;
            $provinsi->name = $request->name;
            $provinsi->save();
            return redirect()->route('provinsis.index')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('provinsis.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
        $provinsi = Provinsi::findOrFail($provinsi->id);
        return response()->json($provinsi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        //
        $validasiData = $request->validate([
            'kode_provinsi' => 'required',
            'name' => 'required',
        ]);

        if ($validasiData) {
            $provinsi = Provinsi::findOrFail($provinsi->id);
            $provinsi->id = $request->kode_provinsi;
            $provinsi->name = $request->name;
            $provinsi->save();
            return redirect()->route('provinsis.index')->with('success', "Data berhasil diubah");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        // destroy
        $provinsi->delete();
        return redirect()->route('provinsis.index')->with('success', "Data berhasil dihapus");
    }
}
