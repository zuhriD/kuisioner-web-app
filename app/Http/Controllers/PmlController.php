<?php

namespace App\Http\Controllers;

use App\Models\Pml;
use Illuminate\Http\Request;

class PmlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pml = Pml::all();
        return view('homes.pml.index', compact('pml'));
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
     * @param  \App\Models\Plm  $plm
     * @return \Illuminate\Http\Response
     */
    public function show(Pml $pml)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plm  $plm
     * @return \Illuminate\Http\Response
     */
    public function edit(Pml $pml)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plm  $plm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pml $pml)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plm  $plm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pml $pml)
    {
        //
    }
}
