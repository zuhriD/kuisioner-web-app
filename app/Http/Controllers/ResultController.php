<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $provinsi_id = $request->input('provinsi_id');
        $kabupaten_id = $request->input('kabupaten_id');
        $kecamatan_id = $request->input('kecamatan_id');
        $desa_id = $request->input('desa_id');
        $kepala_keluarga = $request->input('kepala_keluarga');
        $no_urut_bangunan = $request->input('no_urut_bangunan');
        $no_urut_keluarga_verifikasi = $request->input('no_urut_keluarga_verifikasi');
        $status_keluarga = $request->input('status_keluarga');
        $kode_sls = $request->input('kode_sls');
        $kode_sub_sls = $request->input('kode_sub_sls');
        $jml_anggota_keluarga = $request->input('jml_anggota_keluarga');
        $nama_sls = $request->input('nama_sls');
        $landmark = $request->input('landmark');
        $alamat = $request->input('alamat');
        $no_kk = $request->input('no_kk');
        $kode_kk = $request->input('kode_kk');
        $pendataan_tgl = $request->input('pendataan_tgl');
        $pendataan_bln = $request->input('pendataan_bln');
        $pendataan_thn = $request->input('pendataan_thn');
        $pemeriksaan_tgl = $request->input('pemeriksaan_tgl');
        $pemeriksaan_bln = $request->input('pemeriksaan_bln');
        $pemeriksaan_thn = $request->input('pemeriksaan_thn');
        $prosedur_pendataan = $request->input('prosedur_pendataan');
        $prosedur_pemeriksaan = $request->input('prosedur_pemeriksaan');
        $ppl_nama = $request->input('ppl_nama');
        $pml_nama = $request->input('pml_nama');
        $kode_ppl = $request->input('kode_ppl');
        $kode_pml = $request->input('kode_pml');
        $hasil_pendataan = $request->input('hasil_pendataan');
        $status_informasi = $request->input('status_informasi');
        $no_hp = $request->input('no_hp');
        $durationInput = $request->input('durationInput');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
