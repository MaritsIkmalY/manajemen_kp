<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\mahasiswa;

class form_mhs extends Controller
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
        return view('register.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData =
            $request->validate([
                'nama' => 'required',
                'nrp' => 'required',
                'kelas' => 'required',
                'email' => 'required|unique:users',
                'jurusan' => 'required',
                'password' => 'required',
                'level' => 'required',
            ]);
        $validateData['password'] = Hash::make($request->password);
        $user = User::create([
            'email' => $validateData['email'],
            'nama' => $validateData['nama'],
            'password' => $validateData['password'],
            'level' => $validateData['level'],
        ]);

        mahasiswa::create([
            'id_user' => $user->id,
            'nrp' => $validateData['nrp'],
            'kelas' => $validateData['kelas'],
            'jurusan' => $validateData['jurusan'],
        ]);
        return redirect('/admin');
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
