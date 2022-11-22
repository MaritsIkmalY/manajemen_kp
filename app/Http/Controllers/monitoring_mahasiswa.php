<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monitoring_mhs;
use App\Models\dosen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class monitoring_mahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('Halo');
        // Disesuaikan dengan Id Mahasiswa dan Jurusan Mahasiswa
        $data = monitoring_mhs::where('id_mhs', 1)
            ->get();
        $dosen = dosen::where('jurusan', 'Teknik Informatika')
            ->get();
        return view('mahasiswa.monitoring.index', [
            'datas' => $data,
            'dosens' => $dosen,
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
        // dd($request);
        $validateData =
            $request->validate([
                'keterangan' => 'required',
                'id_dosen' => 'required',
                // 'id_mhs' => 'required',
                'file_mhs' => ['required', 'mimes:pdf, docx'],
            ]);
        $nama_file = $request->file('file_mhs')->getClientOriginalName();
        $validateData['file_mhs'] = $request->file('file_mhs')->storeAs('monitoring', $nama_file, 'public');
        monitoring_mhs::create($validateData);
        return redirect('mahasiswa/monitoring_mahasiswa/');
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
        $data = monitoring_mhs::where('id', $id)->get();
        return view('mahasiswa.monitoring.edit', [
            'data' => $data,
        ]);
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
        $file = monitoring_mhs::where('id', $id)->get();
        // $path = storage_path('app/public/monitoring/') . $file[0]->file_mhs;
        $validateData =
            $request->validate([
                'keterangan' => 'required',
                'file_mhs' => ['required', 'mimes:pdf, docx'],
            ]);
        // dd($file[0]->file_mhs);
        Storage::disk('public')->delete($file[0]->file_mhs);
        $nama_file = $request->file('file_mhs')->getClientOriginalName();
        $validateData['file_mhs'] = $request->file('file_mhs')->storeAs('monitoring', $nama_file, 'public');
        monitoring_mhs::where('id', $id)->update($validateData);
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
