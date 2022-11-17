<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengajuan_mhs_model;
use App\Models\dosen;
use App\Models\mahasiswa;

class pengajuan_dosen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Nanti diedit sesuai dengan id dosennya
        $data = pengajuan_mhs_model::where('id_dosen', 2)
            ->get();
        return view('dosen.pengajuan.index', [
            'datas' => $data,
        ]);
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
        $status = null;
        $pengajuan = pengajuan_mhs_model::where('id', $id)->get();
        if ($request->accepted == 'accept') {
            $status = true;
        } else {
            $status = false;
        }

        pengajuan_mhs_model::where('id', $id)->update([
            'status' => $status
        ]);
        return back();
        // ->with('success', 'mantap')
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
