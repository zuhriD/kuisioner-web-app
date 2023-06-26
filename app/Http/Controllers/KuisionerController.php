<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Keluarga;
use App\Models\Sl;
use App\Models\Ppl;
use App\Models\Pml;
use Illuminate\Http\Request;


class KuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kuisioner = Kuisioner::with('provinsi', 'kabupaten', 'kecamatan',
         'desa', 'keluarga', 'sls', 'keluarga', 'ppl', 'pml')->get();
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $keluarga = Keluarga::all();
        $sls = Sl::all();
        $ppl = Ppl::all();
        $pml = Pml::all();
        return view('homes.kuisioner.index', compact('kuisioner', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'keluarga', 'sls', 'ppl', 'pml'));
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
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'sls_id' => 'required',
            'keluarga_id' => 'required',
            'ppl_id' => 'required',
            'pml_id' => 'required',
            'status_pendataan_id' => 'required',
            'tanggal_pendataan' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'no_hp' => 'required',
        ]);
        if ($validasiData) {
            Kuisioner::create($validasiData);
            return redirect()->route('kuisioners.index')->with('success', "Data berhasil ditambahkan");
        }

        return redirect()->route('kuisioners.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuisioner $kuisioner)
    {
        //
        $kuisioner = Kuisioner::with('provinsi', 'kabupaten', 'kecamatan',
         'desa', 'keluarga', 'sls', 'keluarga', 'ppl', 'pml')->findOrfail($kuisioner->id);
        return response()->json($kuisioner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuisioner $kuisioner)
    {
        //
        $validasiData = $request->validate([
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'sls_id' => 'required',
            'keluarga_id' => 'required',
            'ppl_id' => 'required',
            'pml_id' => 'required',
            'status_pendataan' => 'required',
            'tanggal_pendataan' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ]);
        if ($validasiData) {
            Kuisioner::where('id', $kuisioner->id)->update($validasiData);
            return redirect()->route('kuisioners.index')->with('success', "Data berhasil diubah");
        }

        return redirect()->route('kuisioners.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuisioner $kuisioner)
    {
        //
        Kuisioner::destroy($kuisioner->id);
        return redirect()->route('kuisioners.index')->with('success', "Data berhasil dihapus");
    }
}
