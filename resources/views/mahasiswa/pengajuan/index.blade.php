<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengajuan Mahasiswa Index</title>
</head>
<body>
    <h1>
        Data Pengajuan
    </h1>
    <table border='1'>
        <tr>
            <th>Nama Dosen</th>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Job</th>
            <th>Status</th>
        </tr>
        <tr>
            @if(count($datas) == 0)
                    <td colspan='5'>Data Kosong</td>
        </tr>
        @else
            @foreach($datas as $data)
            <tr>
                <td>
                    {{$data->dosen->nama_dsn}}
                </td>
                <td>
                    {{$data->nama_tempat}}
                </td>
                <td>
                    {{$data->alamat}}
                </td>
                <td>
                    {{$data->job}}
                </td>
                <td>
                    @if(is_null($data->status))
                        Diproses
                    @elseif($data->status == true)
                        Diterima
                    @elseif($data->status == false)
                        Ditolak
                    @endif
                </td>
            </tr>
            @endforeach
        @endif
    </table>

    <a type="button" href="{{route('pengajuan_mahasiswa.create')}}">Mengajukan KP</a>
</body>
</html>



    {{-- <h1>
        Diterima
    </h1>
    <table border='1'>
        <tr>
            <th>Nama Dosen</th>
            <th>Nama Tempat</th>
            <th>Job</th>
        </tr>
        <tr>
            @if(count($dataAccepted) == 0)
                <td colspan='3'>Data Kosong</td>
        </tr>
        @else
            @foreach($dataAccepted as $data)
        <tr>
                <td>
                    {{$data->dosen->nama_dsn}}
                </td>
                <td>
                    {{$data->nama_tempat}}
                </td>
                <td>
                    {{$data->job}}
                </td>
            </tr>
            @endforeach
        @endif
    </table>

    <h1>
        Ditolak
    </h1>
    <table border='1'>
        <tr>
            <th>Nama Dosen</th>
            <th>Nama Tempat</th>
            <th>Job</th>
        </tr>
        <tr>
            @if(count($dataRejected) == 0)
                <td colspan='3'>Data Kosong</td>
        </tr>
        @else
            @foreach($dataRejected as $data)
            <tr>  
            <td>
                {{$data->dosen->nama_dsn}}
            </td>
            <td>
                {{$data->nama_tempat}}
            </td>
            <td>
                {{$data->job}}
            </td>
        </tr>
            @endforeach
        @endif --}}
    {{-- </table> --}}