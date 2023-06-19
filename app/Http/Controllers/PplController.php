<?php

namespace App\Http\Controllers;

use App\Models\Ppl;
use Illuminate\Http\Request;

class PplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ppl = Ppl::all();
        return view('homes.ppl.index', compact('ppl'));
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
            'kode_ppl' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $ppl =  new Ppl();
            $ppl->id = $request->kode_ppl;
            $ppl->name = $request->name;
            $ppl->save();
            return redirect()->route('ppl.index')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('ppl.index')->with('error', "Data gagal ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ppl  $ppl
     * @return \Illuminate\Http\Response
     */
    public function show(Ppl $ppl)
    {
        //
        $ppl = Ppl::findOrFail($ppl->id);
        return response()->json($ppl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ppl  $ppl
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppl $ppl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ppl  $ppl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ppl $ppl)
    {
        //
        $validasiData = $request->validate([
            'kode_ppl' => 'required',
            'name' => 'required',
        ]);
        if ($validasiData) {
            $ppl =  Ppl::findOrFail($ppl->id);
            $ppl->id = $request->kode_ppl;
            $ppl->name = $request->name;
            $ppl->save();
            return redirect()->route('ppl.index')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('ppl.index')->with('error', "Data gagal diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ppl  $ppl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppl $ppl)
    {
        //
        $ppl->delete();
        return redirect()->route('ppl.index')->with('success', "Data berhasil dihapus");
    }
}
