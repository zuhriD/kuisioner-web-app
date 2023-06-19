<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Sl;
use Illuminate\Http\Request;

class SlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sls = Sl::with('desa')->get();
        $desa = Desa::all();
        return view('homes.sls.index', compact('sls', 'desa'));
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
            'desa_id' => 'required',
            'kode_sls' => 'required',
            'kode_sub_sls' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $sls = new Sl();
            $sls->id = $request->kode_sls;
            $sls->desa_id = $request->desa_id;
            $sls->sub_sls = $request->kode_sub_sls;
            $sls->name = $request->name;
            $sls->save();
            return redirect()->route('sls.index')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('sls.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sl  $sls
     * @return \Illuminate\Http\Response
     */
    public function show(Sl $sl)
    {
        //
        $sl = Sl::findOrfail($sl->id);
        return response()->json($sl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sl  $sls
     * @return \Illuminate\Http\Response
     */
    public function edit(Sl $sls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sl  $sls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sl $sl)
    {
        //
        $validasiData = $request->validate([
            'desa_id' => 'required',
            'kode_sls' => 'required',
            'kode_sub_sls' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $sl = Sl::findOrfail($sl->id);
            $sl->id = $request->kode_sls;
            $sl->desa_id = $request->desa_id;
            $sl->sub_sls = $request->kode_sub_sls;
            $sl->name = $request->name;
            $sl->save();
            return redirect()->route('sls.index')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('sls.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sl  $sl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sl $sl)
    {
        //
        $sl->delete();
        return redirect()->route('sls.index')->with('success', "Data berhasil dihapus");
    }
}
