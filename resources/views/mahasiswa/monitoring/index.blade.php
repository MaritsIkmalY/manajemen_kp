@include('layouts_mhs.head')
@include('layouts_mhs.sidebar')
<section class="main-section">
    <div class="text">
        <h5>Monitoring</h5>
    </div>
    <div class="content">
        <table class='table table-striped table-bordered table-hover'>
            <thead class='table-dark'>
                <tr class='text-center'>
                    <th>
                        #
                    </th>
                    <th>
                        NRP
                    </th>
                    <th>
                        Mahasiswa
                    </th>
                    <th>
                        File
                    </th>
                    <th>
                        Keterangan
                    </th>
                    <th>
                        Dosen
                    </th>
                    <th>
                        Catatan
                    </th>
                    <th>
                        Waktu
                    </th>
                </tr>
            </thead>
            <tbody>

                @if (count($datas) == 0)
                    <tr>
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
                                <a href="/storage/{{ $data->file_mhs }}" download>
                                    <button class='btn btn-primary'>
                                        Download
                                    </button>
                                </a>
                                {{-- This is when using another page in Editing --}}
                                {{-- <a href="/mahasiswa/monitoring_mahasiswa/{{$data->id}}/edit" name="update" value="update">
                            <button class="btn btn-secondary">
                                Edit
                            </button>                            
                            </a> --}}

                                {{-- This is  when using modal in Editing --}}
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#editMonitoring" onClick="editMonitoring({{ $data->id }})">
                                    Edit
                                </button>

                                <!-- Modal Edit-->
                                <div class="modal fade" id="editMonitoring" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Monitoring
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/mahasiswa/monitoring_mahasiswa/{{ $data->id }}"
                                                    method="post" enctype="multipart/form-data" id='form-edit'
                                                    class='form'>
                                                    @csrf
                                                    @method('put')
                                                    <div class='mb-3'>
                                                        <label class='form-label'for="file">File</label>
                                                        <p id='filename' class='filename'>
                                                            {{ $data->file_mhs }}
                                                        </p>
                                                        <input class='form-control' type="file" id="file"
                                                            name='file_mhs' value="{{ $data->file_mhs }}">
                                                    </div>
                                                    <div class='mb-3'>
                                                        <label class='form-label' for="keterangan">keterangan</label>
                                                        <textarea class='form-control' rows='3' name="keterangan" id='keterangan'>{{ $data->keterangan }}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="edit"
                                                    class='btn btn-secondary'>Edit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                {{ $data->keterangan }}
                            </td>
                            <td>
                                {{ $data->dosen->user->nama }}
                            </td>
                            <td>
                                @if (is_null($data->catatan))
                                    -
                                @else
                                    {{ $data->catatan }}
                                @endif
                            </td>
                            <td>
                                {{ $data->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
            </tbody>
            @endif
        </table>
        <br>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMonitoring">
            Laporkan Kegiatan
        </button>

        <!-- Modal Create-->
        <div class="modal fade" id="createMonitoring" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Monitoring</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('monitoring_mahasiswa.store') }}" method="POST"
                            enctype="multipart/form-data" class='form'>
                            @csrf
                            <div class='mb-3'>
                                <label class='form-label' for="dosen">Dosen Pembimbing</label>
                                <select class='form-select' name="id_dosen" id="dosen">
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for="file">File</label>
                                <input class='form-control' id='file' type="file" name="file_mhs">
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for="keterangan">Keterangan</label>
                                <textarea class='form-control' rows='3'name="keterangan" id="keterangan"></textarea>
                            </div>
                            <input type="hidden" name='id_mhs' value={{ $id_mhs[0]->id }}>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class='submit'>Laporkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts_mhs.foot')
