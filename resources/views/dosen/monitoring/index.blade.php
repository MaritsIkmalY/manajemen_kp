<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Monitoring Dosen</title>
</head>
<body>
    @if(Auth::user()->level==1)
        
    @endif
    <h1>
        Monitoring Dosen
    </h1>
    <table border='1'>
        <tr>
            <th>
                Nama Mahasiswa
            </th>
            <th>
                Kelas
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
                <td colspan='6'>Data Kosong</td>
            </tr>
        @else
            @foreach ($datas as $data)
            <tr>
                <td>
                    {{$data->mhs->user->nama}}
                </td>
                <td>
                    {{$data->mhs->kelas}}
                </td>
                <td>
                    {{$data->dosen->user->nama}}
                </td>
                <td>
                    {{$data->keterangan}}
                </td>
                <td>
                    <a href="/storage/{{$data->file_mhs}}" download>Download</a>
                </td>
                <td>
                    {{$data->created_at->diffForHumans()}}
                </td>
            </tr>
            @endforeach
        @endif
        </table>
    </body>
    </html>