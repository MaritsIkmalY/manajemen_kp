@include('layouts_dsn.head')
@include('layouts_dsn.sidebar')


<section class="main-section">
    <div class="text">
        <h5>Pengajuan Tempat KP Mahasiswa</h5>
    </div>
    <div class="content">
        <table class='table table-striped table-bordered table-hover'>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Mahasiswa</th>
                    <th>Kelas</th>
                    <th>Tempat</th>
                    <th>Alamat</th>
                    <th>Job</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (count($datas) == 0)
                        <td colspan='7'>Data Kosong</td>
                </tr>
            @else
                <?php $i = 1; ?>
                @foreach ($datas as $data)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $data->mhs->user->nama }}
                        </td>
                        <td>
                            {{ $data->mhs->kelas }}
                        </td>
                        <td>
                            {{ $data->nama_tempat }}
                        </td>
                        <td>
                            {{ $data->alamat }}
                        </td>
                        <td>
                            {{ $data->job }}
                        </td>
                        <td>
                            @if (is_null($data->status))
                                <form action="/dosen/pengajuan_dosen/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button name="accepted" value="accept" class='btn btn-primary'>
                                        Terima
                                    </button>
                                    <button name="rejected" value="reject" class='btn btn-danger'>
                                        Tolak
                                    </button>
                                </form>
                            @elseif($data->status == true)
                                <p class="text-primary">
                                    Diterima
                                </p>
                            @elseif($data->status == false)
                                <p class="text-danger">
                                    Ditolak
                                </p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</section>
@include('layouts_dsn.foot')

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
            @if (count($dataAccepted) == 0)
                <td colspan='3'>Data Kosong</td>
        </tr>
        @else
        @foreach ($dataAccepted as $data)
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
            @if (count($dataRejected) == 0)
                <td colspan='3'>Data Kosong</td>
        </tr>
        @else
            @foreach ($dataRejected as $data)
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
