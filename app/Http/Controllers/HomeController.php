<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Keluarga;
use App\Models\Sl;
use App\Models\Ppl;
use App\Models\Pml;
use App\Models\Kuisioner;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Result::where('user_id', Auth::user()->id)->first();
        if($result){
            return redirect()->route('afterResult');
        }
        return view('index');
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

    public function getDataProvinsi($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return response()->json($provinsi);
    }

    public function getDataKabupaten($id)
    {
        $kabupaten = Kabupaten::findOrfail($id);
        return response()->json($kabupaten);
    }

    public function getDataKecamatan($id)
    {
        $kecamatan = Kecamatan::findOrfail($id);
        return response()->json($kecamatan);
    }

    public function getDataDesa($id)
    {
        $desa = Desa::findOrfail($id);
        return response()->json($desa);
    }

    public function getDataKeluarga($id)
    {
        $keluarga = Keluarga::findOrfail($id);
        return response()->json($keluarga);
    }

    public function getDataSl($kode, $sub)
    {
        $sl = Sl::where('id', $kode)->where('sub_sls', $sub)->first();
        return response()->json($sl);
    }

    public function getDataPpl($id)
    {
        $ppl = Ppl::findOrfail($id);
        return response()->json($ppl);
    }

    public function getDataPml($id)
    {
        $pml = Pml::findOrfail($id);
        return response()->json($pml);
    }

    public function getDataKuisioner($id)
    {
        $kuisioner = Kuisioner::findOrfail($id);
        return response()->json($kuisioner);
    }



}
