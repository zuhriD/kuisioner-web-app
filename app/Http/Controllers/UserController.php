<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
        $validasiData = $request->validate([
            'kode_user' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validasiData) {
            $user =  new User();
            $user->id = $request->kode_user;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role_id = 2;
            $user->save();
            return redirect()->route('homeAdmin')->with('success', "Data berhasil ditambahkan");
        }
        return redirect()->route('homeAdmin')->with('error', "Data gagal ditambahkan");
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
        $user = User::findOrFail($id); // Query ke database untuk mengambil data sesuai id
        return response()->json($user); 
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
        $validasiData = $request->validate([
            'kode_user' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validasiData) {
            $user = User::findOrFail($id);
            $user->id = $request->kode_user;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role_id = 2;
            $user->save();
            return redirect()->route('homeAdmin')->with('success', "Data berhasil diubah");
        }
        return redirect()->route('homeAdmin')->with('error', "Data gagal diubah");
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
        $user  = User::findOrFail($id);
        $user->delete();
        return redirect()->route('homeAdmin')->with('success', "Data berhasil dihapus");
    }
}
