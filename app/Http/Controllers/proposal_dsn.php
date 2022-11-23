<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proposal_kp;
use App\Models\dosen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class proposal_dsn extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = proposal_kp::where('id_dosen', 1)
            ->get();
        return view('dosen.proposal.index', [
            'datas' => $datas,
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
        $data = proposal_kp::where('id', $id)->get();
        return view('dosen.proposal.edit', [
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
        // $path = storage_path('app/public/monitoring/') . $file[0]->file_mhs;
        $validateData =
            $request->validate([
                'catatan_dosen' => 'required',
                'file_dsn' => ['required', 'mimes:pdf, docx'],
            ]);
        // dd($file[0]->file_mhs);
        $nama_file = $request->file('file_dsn')->getClientOriginalName();
        $validateData['file_dsn'] = $request->file('file_dsn')->storeAs('proposal', $nama_file, 'public');
        proposal_kp::where('id', $id)->update($validateData);
        return redirect('/proposal/proposal_mahasiswa/');
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
