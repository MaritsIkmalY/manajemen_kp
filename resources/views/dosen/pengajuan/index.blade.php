<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengajuan Dosen Index</title>
</head>
<body>
    {{-- @if( Session::has('success') )
    <div>
        {{ Session::get('success')}}
    </div>
    @endif --}}
    <h1>
        Pengajuan Tempat KP 
    </h1>
    <table border='1'>
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Kelas</th>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Job</th>
            <th>Aksi</th>
        </tr>
        <tr>
            @if(count($datas) == 0)
                    <td colspan='6'>Data Kosong</td>
        </tr>
        @else
            @foreach($datas as $data)
        <tr>
                <td>
                    {{$data->mhs->user->nama}}
                </td>
                <td>
                    {{$data->mhs->kelas}}
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
                        <form action="/dosen/pengajuan_dosen/{{$data->id}}" method="post" >
                            @csrf
                            @method('put')
                            <input type="submit" name="accepted" value="accept">
                            <input type="submit" name="rejected" value="reject">
                        </form>
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
{{-- 
    <a href="{{route('pengajuan_dosen.create')}}">Mengajukan KP</a>
</body>
</html>


    <h1>
        Diterima
    </h1>
    <table border='1'>
        <tr>
            <th>Nama Mahasiswa</th>
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
                    {{$data->mhs->nama_mhs}}
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
            <th>Nama Mahasiswa</th>
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
                {{$data->mhs->nama_mhs}}
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
    </table> --}}
