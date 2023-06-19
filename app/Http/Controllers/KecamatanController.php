<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kecamatan = Kecamatan::with('kabupaten')->get();
        $kabupaten = Kabupaten::all();
        return view('homes.kecamatan.index', compact('kecamatan', 'kabupaten'));
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
            'kabupaten_id' => 'required',
            'kode_kecamatan' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $kecamatan =  new Kecamatan();
            $kecamatan->id = $request->kode_kecamatan;
            $kecamatan->kabupaten_id = $request->kabupaten_id;
            $kecamatan->name = $request->name;
            $kecamatan->save();
            return redirect()->route('kecamatans.index')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('kecamatans.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
        $kecamatan = Kecamatan::findOrfail($kecamatan->id);
        return response()->json($kecamatan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        //
        $validasiData = $request->validate([
            'kabupaten_id' => 'required',
            'kode_kecamatan' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $kecamatan =  Kecamatan::findOrfail($kecamatan->id);
            $kecamatan->id = $request->kode_kecamatan;
            $kecamatan->kabupaten_id = $request->kabupaten_id;
            $kecamatan->name = $request->name;
            $kecamatan->save();
            return redirect()->route('kecamatans.index')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('kecamatans.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        //
        $kecamatan->delete();
        return redirect()->route('kecamatans.index')->with('success', "Data berhasil dihapus");
    }
}
