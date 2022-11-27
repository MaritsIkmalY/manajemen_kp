<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proposal_kp;
use App\Models\dosen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class proposal_dsn extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $id_dsn = dosen::where('id_user', $id_user)->get('id');
        $datas = proposal_kp::where('id_dosen', $id_dsn[0]->id)
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
        return $data;
        // return view('dosen.proposal.edit', [
        //     'data' => $data,
        // ]);
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

        // dd($request['files']);
        // dd($request['file_dsn']);
        // dd($request['catatan_dosen']);
        if (is_null($request['file_dsn'])) {
            proposal_kp::where('id', $id)->update([
                'catatan_dosen' => $request['catatan_dosen'],
            ]);
        } else {

            $validateData =
                $request->validate([
                    'catatan_dosen' => 'required',
                    'file_dsn' => ['required', 'mimes:pdf, docx'],
                ]);
            // dd($file[0]->file_mhs);
            $nama_file = $request->file('file_dsn')->getClientOriginalName();
            $validateData['file_dsn'] = $request->file('file_dsn')->storeAs('proposal', $nama_file, 'public');
            proposal_kp::where('id', $id)->update($validateData);
        }
        return redirect('/dosen/proposal_dosen/');
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
