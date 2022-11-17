<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengajuan_mhs_model;
use App\Models\dosen;
use App\Models\mahasiswa;


class halaman_pengajuan_mhs_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Disesuaikan dengan ID Mahasiswa
        $data = pengajuan_mhs_model::where('id_mhs', 1)
            ->get();
        // $data = pengajuan_mhs_model::where('id_mhs', id_user)->get();
        return view('mahasiswa.pengajuan.index', [
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
        //Ini nanti diperbaiki sesuai dengan jurusan Mahasiswa
        $dosen = dosen::where('jurusan', 'Teknik Informatika')->get();
        // $mahasiswa = mahasiswa::where('id', id_user)->get();	
        return view('mahasiswa.pengajuan.create', [
            'dosens' => $dosen
            // 'mahasiswas' => $mahasiswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return ($request);
        // Perlu diperbaiki saat kita menginputkan sesuai dengan id mahasiswanya
        $validateData =
            $request->validate([
                "nama_tempat" => "required",
                "job" => "required",
                "id_dosen" => 'required',
                // 'id_mhs' => "required",
            ]);
        pengajuan_mhs_model::create($validateData);
        return redirect('mahasiswa/pengajuan_mahasiswa/');
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

        // $pending = pengajuan_mhs_model::where('status', null)->get();
        // $rejected = pengajuan_mhs_model::where('status', false)->get();
        // 'dataPending' => $pending,
        // 'dataRejected' => $rejected,