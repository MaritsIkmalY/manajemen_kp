@include('layouts_mhs.head')
@include('layouts_mhs.sidebar')
<section class="main-section">
    <div class="text">
        <h5>Pengajuan Tempat KP</h5>
    </div>
    <div class="content">
        <table class='table table-striped table-bordered table-hover table-responsive'>
            <thead class='table-dark'>
                <tr>
                    <th>#</th>
                    <th>Tempat</th>
                    <th>Alamat</th>
                    <th>Job</th>
                    <th>Status</th>
                    <th>Dosen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (count($datas) == 0)
                        <td colspan='5'>Data Kosong</td>
                </tr>
            @else
                <?php $i = 1; ?>
                @foreach ($datas as $data)
                    <tr>
                        <td>
                            {{ $i++ }}
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
                                Diproses
                            @elseif($data->status == true)
                                Diterima
                            @elseif($data->status == false)
                                Ditolak
                            @endif
                        </td>
                        <td>
                            {{ $data->dosen->user->nama }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Mengajukan KP
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Tempat KP</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengajuan_mahasiswa.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="Nama-Tempat">Nama Tempat</label>
                                <input type="text" name="nama_tempat" id="Nama-Tempat" />
                            </div>
                            <div>
                                <label for="Job">Job</label>
                                <input type="text" name="job" id="Job" />
                            </div>
                            <div>
                                <label for="Alamat">Alamat</label>
                                <textarea name="alamat" id="Alamat" placeholder="alamat lengkap"></textarea>
                            </div>
                            <div>
                                <label for="dosen">Dosen Pembimbing</label>
                                <select name="id_dosen" id="dosen">
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name='id_mhs' value={{ $id_mhs[0]->id }}>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class='submit'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts_mhs.foot')











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
            @if (count($dataAccepted) == 0)
                <td colspan='3'>Data Kosong</td>
        </tr>
        @else
            @foreach ($dataAccepted as $data)
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
            @if (count($dataRejected) == 0)
                <td colspan='3'>Data Kosong</td>
        </tr>
        @else
            @foreach ($dataRejected as $data)
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
