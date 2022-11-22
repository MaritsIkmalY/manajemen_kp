<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Proposal Mahasiswa</title>
</head>
<body>
    <h1>
        Proposal Mahasiswa
    </h1>
    <table border='1'>
        <tr>
            <th>
                Nama Mahasiswa
            </th>
            <th>
                Nama Dosen
            </th>
            <th>
                Keterangan
            </th>
            <th>
                Catatan Dosen
            </th>
            <th>
                File
            </th>
            <th>
                Waktu
            </th>
        </tr>
        @if (count($datas)==0)
            <tr>
                <td colspan='6'>Data Kosong</td>
            </tr>
        @else
            @foreach ($datas as $data)
            <tr>
                <td>
                    {{$data->mhs->nama_mhs}}
                </td>
                <td>
                    {{$data->dsn->nama_dsn}}
                </td>
                <td>
                    {{$data->keterangan}}
                </td>
                <td>
                    @if(is_null($data->catatan_dosen))
                        <p>-</p>
                    @else
                        {{$data->catatan_dosen}}
                    @endif
                </td>
                <td>
                    <a href="/storage/{{$data->file_mhs}}" download>Download</a>
                    <a href="/mahasiswa/proposal_mahasiswa/{{$data->id}}/edit" name="update" value="update">update</a>
                </td>
                <td>
                    {{$data->created_at->diffForHumans()}}
                </td>
            </tr>
            @endforeach
        @endif
        </table>
        <br>
        <form action="{{route("proposal_mahasiswa.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="dosen">Dosen Pembimbing</label>
                <select name="id_dosen" id="dosen">
                    @foreach ($dosens as $dosen)
                        <option value="{{$dosen->id}}">{{$dosen->nama_dsn}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="file" name="file_mhs">
            </div>
            <div>
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan">
            </div>
            <button type="submit" name="submit">submit</button>
        </form>
    </body>
    </html>