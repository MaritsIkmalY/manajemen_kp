<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Monitoring Mahasiswa</title>
</head>
<body>
    <h1>
        Monitoring Mahasiswa
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
                File
            </th>
            <th>
                Waktu
            </th>
        </tr>
        @if (count($datas)==0)
            <tr>
                <td colspan='5'>Data Kosong</td>
            </tr>
        @else
            @foreach ($datas as $data)
            <tr>
                <td>
                    {{$data->mhs->user->nama}}
                </td>
                <td>
                    {{$data->dosen->user->nama}}
                </td>
                <td>
                    {{$data->keterangan}}
                </td>
                <td>
                    <a href="/storage/{{$data->file_mhs}}" download>Download</a>
                    <a href="/mahasiswa/monitoring_mahasiswa/{{$data->id}}/edit" name="update" value="update">update</a>
                </td>
                <td>
                    {{$data->created_at->diffForHumans()}}
                </td>
            </tr>
            @endforeach
        @endif
        </table>
        <br>
        <form action="{{route("monitoring_mahasiswa.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="dosen">Dosen Pembimbing</label>
                <select name="id_dosen" id="dosen">
                    @foreach ($dosens as $dosen)
                        <option value="{{$dosen->id}}">{{$dosen->user->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="file" name="file_mhs">
            </div>
            <div>
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan"></textarea>
            </div>
            <button type="submit" name="submit">submit</button>
        </form>
    </body>
    </html>