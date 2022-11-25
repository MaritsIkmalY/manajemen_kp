@include('layouts_mhs.head')
@include('layouts_mhs.sidebar')
<section class="main-section">
    <div class="text">
        <h5>Pengajuan</h5>
    </div>
    <div class="content">
        <table class='table table-striped table-bordered table-hover table-responsive'>
            <thead class='table-dark'>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Tempat</th>
                    <th>Alamat</th>
                    <th>Job</th>
                    <th>Dosen</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (count($datas) == 0)
                        <td colspan='8' class='text-center'>Data Kosong</td>
                </tr>
            @else
                <?php $i = 1; ?>
                @foreach ($datas as $data)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $data->mhs->nrp }}
                        </td>
                        <td>
                            {{ $data->mhs->user->nama }}
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
                            {{ $data->dosen->user->nama }}
                        </td>
                        <td>
                            @if (is_null($data->status))
                                <p class='text-secondary'>
                                    Diproses
                                </p>
                            @elseif($data->status == true)
                                <p class='text-primary'>
                                    Diterima
                                </p>
                            @elseif($data->status == false)
                                <p class='text-danger'>
                                    Ditolak
                                </p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajukan KP
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Pengajuan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengajuan_mahasiswa.store') }}" method="post" class='form'>
                            @csrf
                            <div class='mb-3'>
                                <label class='form-label' for="Nama-Tempat">Nama Tempat</label>
                                <input class='form-control' type="text" name="nama_tempat" id="Nama-Tempat" />
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for="Job">Job</label>
                                <input class='form-control' type="text" name="job" id="Job" />
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for="Alamat">Alamat</label>
                                <textarea class='form-control' rows='3' name="alamat" id="Alamat" placeholder="alamat lengkap"></textarea>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label'for="dosen">Dosen Pembimbing</label>
                                <select class="form-select" aria-label="Default select example" name="id_dosen"
                                    id="dosen">
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name='id_mhs' value={{ $id_mhs[0]->id }}>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class='submit'>Ajukan</button>
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
