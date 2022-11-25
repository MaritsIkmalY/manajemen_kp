@include('layouts_dsn.head')
@include('layouts_dsn.sidebar')


<section class="main-section">
    <div class="text">
        <h5>Monitoring Mahasiswa</h5>
    </div>
    <div class="content">

        <table>
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
            @if (count($datas) == 0)
                <tr>
                    <td colspan='6'>Data Kosong</td>
                </tr>
            @else
                @foreach ($datas as $data)
                    <tr>
                        <td>
                            {{ $data->mhs->user->nama }}
                        </td>
                        <td>
                            {{ $data->mhs->kelas }}
                        </td>
                        <td>
                            {{ $data->dosen->user->nama }}
                        </td>
                        <td>
                            {{ $data->keterangan }}
                        </td>
                        <td>
                            <a href="/storage/{{ $data->file_mhs }}" download>Download</a>
                        </td>
                        <td>
                            {{ $data->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</section>
@include('layouts_dsn.foot')
