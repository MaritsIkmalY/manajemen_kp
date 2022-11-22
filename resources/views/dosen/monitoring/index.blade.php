<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Monitoring Dosen</title>
</head>
<body>
    <h1>
        Monitoring Dosen
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
                    {{$data->mhs->nama_mhs}}
                </td>
                <td>
                    {{$data->dosen->nama_dsn}}
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