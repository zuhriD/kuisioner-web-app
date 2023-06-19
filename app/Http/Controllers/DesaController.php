<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $desa = Desa::with('kecamatan')->get();
        $kecamatan = Kecamatan::all();
        return view('homes.desa.index', compact('desa', 'kecamatan'));
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
        $validateData = [
            'kecamatan_id' => 'required',
            'kode_desa' => 'required',
            'name' => 'required',
        ];
        if ($validateData) {
            $desa = new Desa();
            $desa->id = $request->kode_desa;
            $desa->kecamatan_id = $request->kecamatan_id;
            $desa->name = $request->name;
            $desa->save();
            return redirect()->route('desas.index')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('desas.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
        $desa = Desa::findOrfail($desa->id);
        return response()->json($desa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        //
        $validateData = [
            'kecamatan_id' => 'required',
            'kode_desa' => 'required',
            'name' => 'required',
        ];
        if ($validateData) {
            $desa = Desa::findOrfail($desa->id);
            $desa->id = $request->kode_desa;
            $desa->kecamatan_id = $request->kecamatan_id;
            $desa->name = $request->name;
            $desa->save();
            return redirect()->route('desas.index')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('desas.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        //
        $desa->delete();
        return redirect()->route('desas.index')->with('success', "Data berhasil dihapus");
    }
}
