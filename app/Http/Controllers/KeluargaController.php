<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keluarga = Keluarga::all();
        return view('homes.keluarga.index', compact('keluarga'));
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
            'nama_kepala_keluarga' => 'required',
            'no_urut_bangunan' => 'required',
            'no_verifikasi' => 'required',
            'status' => 'required',
            'jml_anggota_keluarga' => 'required',
            'id_landmark' => 'required',
            'no_kk' => 'required',
            'kode_kk' => 'required',
            'alamat' => 'required'
        ]);
        if ($validasiData) {
            $keluarga =  new Keluarga();
            $keluarga->nama_kepala_keluarga = $request->nama_kepala_keluarga;
            $keluarga->no_urut_bangunan = $request->no_urut_bangunan;
            $keluarga->no_urut_keluarga_verifikasi = $request->no_verifikasi;
            $keluarga->status = $request->status;
            $keluarga->jml_anggota_keluarga = $request->jml_anggota_keluarga;
            $keluarga->landmark = $request->id_landmark;
            $keluarga->no_kk = $request->no_kk;
            $keluarga->kode_kk = $request->kode_kk;
            $keluarga->alamat = $request->alamat;
            $keluarga->save();
            return redirect()->route('keluargas.index')->with('success', "Data berhasil ditambahkan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        //
        $keluarga = Keluarga::findOrfail($keluarga->id);
        return response()->json($keluarga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        //
        $validasiData = $request->validate([
            'nama_kepala_keluarga' => 'required',
            'no_urut_bangunan' => 'required',
            'no_verifikasi' => 'required',
            'status' => 'required',
            'jml_anggota_keluarga' => 'required',
            'id_landmark' => 'required',
            'no_kk' => 'required',
            'kode_kk' => 'required',
            'alamat' => 'required'
        ]);
        if ($validasiData) {
            $keluarga =  Keluarga::findOrfail($keluarga->id);
            $keluarga->nama_kepala_keluarga = $request->nama_kepala_keluarga;
            $keluarga->no_urut_bangunan = $request->no_urut_bangunan;
            $keluarga->no_urut_keluarga_verifikasi = $request->no_verifikasi;
            $keluarga->status = $request->status;
            $keluarga->jml_anggota_keluarga = $request->jml_anggota_keluarga;
            $keluarga->landmark = $request->id_landmark;
            $keluarga->no_kk = $request->no_kk;
            $keluarga->kode_kk = $request->kode_kk;
            $keluarga->alamat = $request->alamat;
            $keluarga->save();
            return redirect()->route('keluargas.index')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('keluargas.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga)
    {
        //
        $keluarga->delete();
        return redirect()->route('keluargas.index')->with('success', "Data berhasil dihapus");
    }
}
